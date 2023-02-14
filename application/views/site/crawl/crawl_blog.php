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
        $newfname = './upload/news/'.$path;
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
    if(isset($_GET['url'])){
        $blog_url =  urldecode($_GET['url']);
        $html = file_get_html($blog_url);

        $name               = translate(rename_product($html->find('h1','0')->plaintext),'en','vi');
        $alias              = create_slug($name);
        $status             = '0';
        $sort_order         = '0';
        $meta_key           = make_meta_key($name);
        $meta_desc          = translate(rename_product($html->find( "meta[property=og:description]",'0' )->content), "en", "vi").'. ';
        $content            = '';
        $image_link         = '';
        //$social_image_link  = '';

        //lấy ảnh đại diện & social
        $social_image_url = $html->find( "meta[property=og:image]",'0')->content;
        if(isset($social_image_url)){
            downloadFile($social_image_url, basename($social_image_url));
            $image_link = basename($social_image_url);
        }

        //hiệu chỉnh html trước khi tách nội dung
        $content_html       = $html->find('.entry-content','0')->innertext ;

        //thay ảnh trong bài viết
        foreach($html->find('.wp-block-image') as $figure){
            $img_url    = $figure->find('img','0')->src;
            downloadFile($img_url, basename($img_url));
            $new_img_tag = "<img src='../upload/news/".basename($img_url)."' style='width:100%;' />";
            $content_html = str_replace($figure->find('img','0'),$new_img_tag, $content_html );
            
        }

        //dịch thẻ h2 trong bài viết
        foreach($html->find('.entry-content h2') as $row){
            $h2_text = translate(rename_product($row->plaintext),'en','vi');
            $content_html = str_replace($row,'<h2>'.$h2_text.'</h2>',$content_html);
        }

        //dịch thẻ h3 trong bài viết
        foreach($html->find('.entry-content h3') as $row){
            $h2_text = translate(rename_product($row->plaintext),'en','vi');
            $content_html = str_replace($row,'<h3>'.$h2_text.'</h3>',$content_html);
        }

        //dịch thẻ h4 trong bài viết
        foreach($html->find('.entry-content h4') as $row){
            $h2_text = translate(rename_product($row->plaintext),'en','vi');
            $content_html = str_replace($row,'<h4>'.$h2_text.'</h4>',$content_html);
        }

        //dịch thẻ h5 trong bài viết
        foreach($html->find('.entry-content h5') as $row){
            $h2_text = translate(rename_product($row->plaintext),'en','vi');
            $content_html = str_replace($row,'<h5>'.$h2_text.'</h5>',$content_html);
        }

        //dịch thẻ p trong bài viết
        foreach($html->find('.entry-content p') as $row){
            $row_text = $row->text();
            $array_row_text = explode('. ',$row_text);
            foreach($array_row_text as $text){
                if(strlen($text) > '0'){
                    $trans_text = translate(rename_product($text),'en','vi');
                    $row_text = str_replace($text, $trans_text, $row_text);
                }
            }

            $new_p_row = '<p>'.$row_text.'</p>';
            $content_html = str_replace($row, '{new_row_text}', $content_html);
            $content_html = str_replace('{new_row_text}',$new_p_row,$content_html);
        }



        $content = $content_html;

        $data_import = array(
            'name'              => $name,
            'alias'             => $alias,
            'status'            => $status,
            'meta_key'          => $meta_key,
            'meta_desc'         => $meta_desc,
            'content'           => $content,
            'image_link'        => $image_link,
            'social_image_link' => $image_link,
        );

        print_r($data_import);
        if($this->news_model->create($data_import)){
            echo '<h1>Cập Nhật Dữ Liệu Thành Công cho sản phẩm: '.$name.'</h1>';
        }else{
            echo '<h1>Cập Nhật Dữ Liệu Không Thành Công cho sản phẩm: '.$name.'</h1>';
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="wid
    th=device-width, initial-scale=1.0">
    <title>Crawl bài viết từ morel</title>
</head>
<body style="background-color: black;color:#01ff01;">
    <h1>Nhập Link để crawl bài viết</h1>
    <form method="get" action="">
        <input style="width:50%;"  name="url" placeholder="link bài viết từ morel" required />
        <button type="submit">Gửi</button>
    </form>
</body>
</html>