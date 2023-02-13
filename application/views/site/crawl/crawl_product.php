
<?php 
    //function tự động dịch google
    function translate($q, $sl, $tl){
        $res= file_get_contents("https://translate.googleapis.com/translate_a/single?client=gtx&ie=UTF-8&oe=UTF-8&dt=bd&dt=ex&dt=ld&dt=md&dt=qca&dt=rw&dt=rm&dt=ss&dt=t&dt=at&sl=".$sl."&tl=".$tl."&hl=hl&q=".urlencode($q), $_SERVER['DOCUMENT_ROOT']."/transes.html");
        $res= json_decode($res);
        return $res[0][0][0];
    }

    function downloadFile($url, $path)
    {
        //save về folder upload/product
        $newfname = './upload/product/'.$path;
        $file = fopen ($url, 'rb');
        if ($file) {
            $newf = fopen ($newfname, 'wb');
            if ($newf) {
                while(!feof($file)) {
                    fwrite($newf, fread($file, 1024 * 8), 1024 * 8);
                }
            }
        }
        if ($file) {
            fclose($file);
        }
        if ($newf) {
            fclose($newf);
        }
    }

    function create_slug($string)
    {
        $search = array(
            '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
            '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
            '#(ì|í|ị|ỉ|ĩ)#',
            '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
            '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
            '#(ỳ|ý|ỵ|ỷ|ỹ)#',
            '#(đ)#',
            '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
            '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
            '#(Ì|Í|Ị|Ỉ|Ĩ)#',
            '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
            '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
            '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
            '#(Đ)#',
            "/[^a-zA-Z0-9\-\_]/",
        );
        $replace = array(
            'a',
            'e',
            'i',
            'o',
            'u',
            'y',
            'd',
            'A',
            'E',
            'I',
            'O',
            'U',
            'Y',
            'D',
            '-',
        );
        $string = preg_replace($search, $replace, $string);
        $string = preg_replace('/(-)+/', '-', $string);
        $string = strtolower($string);
        return $string;
    }

    function rename_product($string){
        $new_name = str_replace(array('"',"'"),'&quot;',$string);
        return $new_name;
    }

    function make_meta_key($string){
        $meta_key = str_replace(' ',',',$string);
        return $meta_key;
    }

    include('./simplehtmldom_1_9_1/simple_html_dom.php');
    if(isset($_GET['url']) && $_GET['catalog_id']){
        $product_url =  urldecode($_GET['url']);
        $html = file_get_html($product_url);

        $product_name       = rename_product($html->find('h1',0)->plaintext);
        $product_alias      = create_slug($product_name);
        $meta_key           = make_meta_key($product_name);
        $meta_desc          = translate(rename_product($html->find( "meta[property=og:description]",'0' )->content), "en", "vi").'. ';
        $catalog_id         = trim($_GET['catalog_id']);
        $sort_order         = '0';

        //định dạng layout
        $layout_type        = '0';
        if(str_contains($html, 'woocommerce-product-gallery__wrapper')){
            $layout_type    = '2';    
        }else{
            $layout_type    = '0';
        }

        //lấy ảnh -- price & option
        $image_link         = '';
        $image_list         = array();

        $option_name_1      = '';
        $option_name_2      = '';
        $option_name_3      = '';
        $option_name_4      = '';
        $option_price_1     = '0';
        $option_price_2     = '0';
        $option_price_3     = '0';
        $option_price_4     = '0';


        $list_image     = $html->find('.entry-image img');
        $count_image    = '0';
        foreach($list_image as $row){
            $count_image++;
            if($count_image == '1'){
                $url_image_link = $row->src;
                downloadFile($url_image_link, basename($url_image_link));

                $image_link     = basename($url_image_link);
            }else{
                $url_image_link = $row->src;
                downloadFile($url_image_link, basename($url_image_link));

                $image_list[] = basename($url_image_link);
            }
        }

        $image_list = json_encode($image_list);

        //import dữ liệu
        $data_import = array(
            'name'              => $product_name,
            'alias'             => $product_alias,
            'meta_key'          => $meta_key,
            'meta_desc'         => $meta_desc,
            'layout_type'       => $layout_type,
            'image_link'        => $image_link,
            'social_image_link' => $image_link,
            'image_list'        => $image_list,

            'option_name_1'     => $option_name_1,
            'option_name_2'     => $option_name_2,
            'option_name_3'     => $option_name_3,
            'option_name_4'     => $option_name_4,

            'option_price_1'    => $option_price_1,
            'option_price_2'    => $option_price_2,
            'option_price_3'    => $option_price_3,
            'option_price_4'    => $option_price_4,
        );
        
        print_r($data_import);
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crawl sản phẩm từ morel</title>
</head>
<body style="background-color: black;color:#01ff01;">
    <h1>Nhập Link để crawl sản phẩm</h1>
    <form method="get" action="">
        <input style="width:50%;"  name="url" placeholder="link sản phẩm từ morel" required />
        <select name="catalog_id" required>
        <?php foreach($catalog_list as $row): ?>
            <option value="<?php echo $row->id ?>" <?php if($row->status !== '0') { echo 'disabled';}?>><strong><?php echo $row->name ?></strong></option>
            <?php foreach($row->subs as $subs): ?>
            <option value="<?php echo $subs->id ?>" <?php if($subs->status !== '0') { echo 'disabled';}else{if($subs->redirect_link !== ''){echo 'disabled';}}?>>-- <i><?php echo $subs->name ?></i></option>
            <?php foreach($subs->subss as $subss): ?>
                <option value="<?php echo $subss->id ?>" <?php if($subss->status !== '0') { echo 'disabled';}else{if($subss->redirect_link  !== ''){echo 'disabled';}}?>><i>--  -- <?php echo $subss->name ?></i></option>
            <?php endforeach; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
        </select>
        <button type="submit">Gửi</button>
    </form>
</body>
</html>