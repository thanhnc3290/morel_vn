
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
        $new_name = str_replace(array('"',"'",'″','’','”'),"'",$string);
        return $new_name;
    }

    function make_meta_key($string){
        $meta_key = str_replace(' ',',',$string);
        return $meta_key;
    }

    function clean($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
     
        return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
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

        

        //lấy ảnh -- price & option
        $image_link         = '';
        $image_list         = array();
        $social_image_link  = '';

        $option_name_1      = '';
        $option_name_2      = '';
        $option_name_3      = '';
        $option_name_4      = '';
        $option_price_1     = '0';
        $option_price_2     = '0';
        $option_price_3     = '0';
        $option_price_4     = '0';
        $content            = '';

        $technology_html    = '';
        $specification      = '';
        $documentary        = array();



        //định dạng layout
        $layout_type        = '0';
        if(str_contains($html, 'woocommerce-product-gallery__wrapper')){
            $layout_type    = '2';    
            //content
            if(str_contains($html, 'class="custom-content-data"')){
                $content_text   = rename_product($html->find('.custom-content-data p','0')->plaintext);
                $content_arrray     = explode(PHP_EOL,$content_text);
                foreach($content_arrray as $row){
                    if(strlen($row) > '3'){
                        $content .= translate($row, "en", "vi").'.<br/> ';
                    }
                }
                $content = nl2br($content);
            }
            //specifications
            if(str_contains($html, 'specifications_table')){
                foreach($html->find('.specifications_table') as $row){
                    $specification .= $row;
                }
            }

            //documentary
            if(str_contains($html, 'download-section')){
                foreach($html->find('.download-section li a') as $row){
                    $file_url       = $row->href;
                    $file_name      = basename($file_url);
                    downloadFile($file_url, $file_name);
                    $documentary[] = $file_name;
                }
            }
            
            


        }else{
            $layout_type    = '0';

            $count_option_name = '0';
            if(str_contains($html, 'id="pa_size-and-configuration"')){
                foreach($html->find("#pa_size-and-configuration option") as $row){
                    $count_option_name++;
                    if($count_option_name == '2'){
                        $option_name_1 = rename_product($row->plaintext);
                    }else{
                        if($count_option_name >= '3'){
                            $option_name_2 = rename_product($row->plaintext);
                        }
                    }
                }
            }

            $count_option_price = '0';
            if(str_contains($html, 'class="woocommerce-Price-amount amount"')){
                foreach($html->find( "span[class=woocommerce-Price-amount amount]") as $row){
                    $count_option_price++;
                    if($count_option_price == '1'){
                        $option_price_1 = str_replace('36-','',clean($row->plaintext));
                    }else{
                        $option_price_2 = str_replace('36-','',clean($row->plaintext));
                    }
                }
            }

            $content_text       = rename_product($html->find('.entry-content','0')->plaintext);
            $content_arrray     = explode('. ',$content_text);
            foreach($content_arrray as $row){
                if(strlen($row) > '3'){
                    $content .= translate($row, "en", "vi");
                }
            }

            $content = nl2br($content);

            //technology_html
            if(str_contains($html, 'class="section-product-tech"')){
                foreach($html->find('div[class="tech-col"]') as $row){
                    $row_input_tech = '';
                    $background_image = '';

                    //lấy ảnh background
                    if($row->find('.tech-item-in','0')){
                        $style_attr = $row->find('.tech-item-in','0')->style;
                        $background_image_link = str_replace(array('background-image:url(',')',';',' '),'',$style_attr);
                        downloadFile($background_image_link, basename($background_image_link));
                        $background_image     = '../upload/product/'.basename($background_image_link);
                        $style_attr_new = "background-image:url('".$background_image."');";

                        $row_input_tech = str_replace($style_attr,$style_attr_new,$row);
                    }

                    if($row->find('.tech-item-in','1')){
                        $style_attr = $row->find('.tech-item-in','1')->style;
                        $background_image_link = str_replace(array('background-image:url(',')',';',' '),'',$style_attr);
                        downloadFile($background_image_link, basename($background_image_link));
                        $background_image     = '../upload/product/'.basename($background_image_link);
                        $style_attr_new = "background-image:url('".$background_image."');";

                        $row_input_tech = str_replace($style_attr,$style_attr_new,$row_input_tech);
                    }

                    if($row->find('.tech-item-in','2')){
                        $style_attr = $row->find('.tech-item-in','2')->style;
                        $background_image_link = str_replace(array('background-image:url(',')',';',' '),'',$style_attr);
                        downloadFile($background_image_link, basename($background_image_link));
                        $background_image     = '../upload/product/'.basename($background_image_link);
                        $style_attr_new = "background-image:url('".$background_image."');";

                        $row_input_tech = str_replace($style_attr,$style_attr_new,$row_input_tech);
                    }

                    if($row->find('.tech-item-in','3')){
                        $style_attr = $row->find('.tech-item-in','3')->style;
                        $background_image_link = str_replace(array('background-image:url(',')',';',' '),'',$style_attr);
                        downloadFile($background_image_link, basename($background_image_link));
                        $background_image     = '../upload/product/'.basename($background_image_link);
                        $style_attr_new = "background-image:url('".$background_image."');";

                        $row_input_tech = str_replace($style_attr,$style_attr_new,$row_input_tech);
                    }

                    if($row->find('.tech-item-in','4')){
                        $style_attr = $row->find('.tech-item-in','4')->style;
                        $background_image_link = str_replace(array('background-image:url(',')',';',' '),'',$style_attr);
                        downloadFile($background_image_link, basename($background_image_link));
                        $background_image     = '../upload/product/'.basename($background_image_link);
                        $style_attr_new = "background-image:url('".$background_image."');";

                        $row_input_tech = str_replace($style_attr,$style_attr_new,$row_input_tech);
                    }

                    if($row->find('.tech-item-in','5')){
                        $style_attr = $row->find('.tech-item-in','5')->style;
                        $background_image_link = str_replace(array('background-image:url(',')',';',' '),'',$style_attr);
                        downloadFile($background_image_link, basename($background_image_link));
                        $background_image     = '../upload/product/'.basename($background_image_link);
                        $style_attr_new = "background-image:url('".$background_image."');";

                        $row_input_tech = str_replace($style_attr,$style_attr_new,$row_input_tech);
                    }

                    //dịch text
                    if($row->find('.entry-text','0')){
                        $row_text               = $row->find('.entry-text','0')->plaintext;
                        $row_reformat           = str_replace($row->find('.entry-text','0'),$row_text, $row_input_tech); 
                        $row_text_translate     = translate(rename_product($row_text),'en','vi');
                        $row_input_tech         = str_replace($row_text,$row_text_translate,$row_reformat);
                    }
                    if($row->find('.entry-text','1')){
                        $row_text       = $row->find('.entry-text','1')->plaintext;
                        $row_reformat   = str_replace($row->find('.entry-text','1'),$row_text, $row_input_tech); 
                        $row_text_translate = translate(rename_product($row_text),'en','vi');
                        $row_input_tech        = str_replace($row_text,$row_text_translate,$row_reformat);
                    }
                    if($row->find('.entry-text','2')){
                        $row_text       = $row->find('.entry-text','2')->plaintext;
                        $row_reformat   = str_replace($row->find('.entry-text','2'),$row_text, $row_input_tech); 
                        $row_text_translate = translate(rename_product($row_text),'en','vi');
                        $row_input_tech        = str_replace($row_text,$row_text_translate,$row_reformat);
                    }
                    if($row->find('.entry-text','3')){
                        $row_text       = $row->find('.entry-text','3')->plaintext;
                        $row_reformat   = str_replace($row->find('.entry-text','3'),$row_text, $row_input_1); 
                        $row_text_translate = translate(rename_product($row_text),'en','vi');
                        $row_input_tech        = str_replace($row_text,$row_text_translate,$row_reformat);
                    }

                    $technology_html .= $row_input_tech;
                }
            }

            //specifications
            if(str_contains($html, 'class="table-responsive"')){
               foreach($html->find('.table-responsive') as $row){
                    $specification .= $row;
               }
            }

            //documentary
            if(str_contains($html, 'class="downloads"')){
                foreach($html->find('.downloads li a') as $row){
                    $file_url       = $row->href;
                    $file_name      = basename($file_url);
                    downloadFile($file_url, $file_name);
                    $documentary[] = $file_name;
                }
            }
            
        }

        $documentary = json_encode($documentary);

        //các ảnh
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

        if($layout_type =='0'){
            if(str_contains($html, 'figure class="entry-image"')){
                $social_image_url = $html->find( "figure[class=entry-image] img",'0')->src;
                downloadFile($social_image_url, basename($social_image_url));

                $social_image_link = basename($social_image_url);
            }
        }else{
            $social_image_link = $image_link;
        }

        $image_list = json_encode($image_list);

        //import dữ liệu
        $data_import = array(
            'name'              => $product_name,
            'alias'             => $product_alias,
            'meta_key'          => $meta_key,
            'meta_desc'         => $meta_desc,
            'layout_type'       => $layout_type,
            'catalog_id'        => $catalog_id,
            'content'           => $content,

            'image_link'        => $image_link,
            'social_image_link' => $social_image_link,
            'image_list'        => $image_list,

            'option_name_1'     => $option_name_1,
            'option_name_2'     => $option_name_2,
            'option_name_3'     => $option_name_3,
            'option_name_4'     => $option_name_4,

            'option_price_1'    => $option_price_1,
            'option_price_2'    => $option_price_2,
            'option_price_3'    => $option_price_3,
            'option_price_4'    => $option_price_4,

            'technology_html'   => $technology_html,
            'specification'     => $specification,
            'documentary'       => $documentary,
        );
        
        //print_r($data_import);
        if($this->product_model->create($data_import)){
            echo '<h1>Cập Nhật Dữ Liệu Thành Công cho sản phẩm: '.$product_name.'</h1>';
        }else{
            echo '<h1>Cập Nhật Dữ Liệu Không Thành Công cho sản phẩm: '.$product_name.'</h1>';
        }
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