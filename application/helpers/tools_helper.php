<?php

function convertToSEO($text){

    $turkce = array("ç","Ç","ğ","Ğ","ü","Ü","ö","Ö","İ","ı","ş","Ş",".",",","!","'","\""," ","?","*","_","|","=","(",")","[","]","{","}");

    $convert = array("c","c","g","g","u","u","o","o","i","i","s","s","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-","-");

    return $seo = strtolower(str_replace($turkce,$convert,$text));

}

function get_readable_date($date){

    setlocale(LC_ALL, 'tr_TR.UTF-8');
    return strftime('%e %B %Y', strtotime($date));
}

function get_active_user(){
    $t = &get_instance();

    $user = $t->session->userdata("user");

    if ($user){
        return $user;
    }else{
        return false;
    }
}

function send_email($toEmail = "", $subject = "", $message = "")
{

    $t = &get_instance();

    $t->load->model("emailsettings_model");

    $email_settings = $t->emailsettings_model->get(
        array(
            "isActive" => 1
        )
    );

    $config = array(

        "protocol" => $email_settings->protocol,
        "smtp_host" => $email_settings->host,
        "smtp_port" => $email_settings->port,
        "smtp_user" => $email_settings->user,
        "smtp_pass" => $email_settings->password,
        "starttls" => true,
        "charset" => "utf-8",
        "mailtype" => "html",
        "wordwrap" => true,
        "newline" => "\r\n"
    );

    $t->load->library("email", $config);

    $t->email->from($email_settings->from, $email_settings->user_name);
    $t->email->to($toEmail);
    $t->email->subject($subject);
    $t->email->message($message);

    return $t->email->send();
}

function get_settings(){
    $t = &get_instance();

    $t->load->model("settings_model");

    if ($t->session->userdata("settings")){
        $settings = $t->session->userdata("settings");
    }else {

    $settings = $t->settings_model->get();


    if ($settings){
        $t->session->set_userdata("settings", $settings);
    }else{
        $settings = new stdClass();

        $settings->company_name = "CMS";
        $settings->logo = "default";
    }


    }
    return $settings;

}

function get_category_title($category_id = 0){
    $t = &get_instance();

    $t ->load->model("portfolio_category_model");

    $category =$t -> portfolio_category_model->get(
        array(
            "id" => $category_id
        )
    );

    if ($category)
        return $category->title;
    else
        return "<b style='color:red'>Tanımlı Değil</b>";

}
//$_FILES["img_url"]["tmp_name"]
//uploads/$t->viewFolder/deneme.png
//670,520,
function upload_picture($file,$uploadPath,$width,$height,$name){
    
    $t = &get_instance();

    $t->load->library("simpleimagelib");


    if (!is_dir("{$uploadPath}/{$width}x{$height}")){
        mkdir("{$uploadPath}/{$width}x{$height}");
    }


    $upload_error = false;
    try {
        $simpleImage = $t->simpleimagelib->get_simple_image_instance();


        $simpleImage
            ->fromFile($file)
            ->thumbnail($width,$height,'center')
            ->toFile("{$uploadPath}/{$width}x{$height}/$name", 'image/png') ;
    } catch(Exception $err) {
        $error = $err->getMessage();

        $upload_error = true;
    }

    if ($upload_error){
        echo $error;
    }else{
        return true;
    }
}

function get_product_service_title($service_id = 0){
    $t = &get_instance();

    $t ->load->model("service_model");

    $service =$t -> service_model->get(
        array(
            "id" => $service_id
        )
    );

    if ($service)
        return $service->title;
    else
        return "<b style='color:red'>Tanımlı Değil</b>";

}

function get_picture($path = "",$picture="",$resouliton = "50x50"){

    if ($picture != ""){

        if (file_exists(FCPATH . "uploads/$path/$resouliton/$picture")){
            $picture = base_url("uploads/$path/$resouliton/$picture");
        }else{
            $picture = base_url("assets/images/default_image.png");
        }

    }else{
        $picture = base_url("assets/images/default_image.png");
    }

    return $picture;

}

function get_slides(){
    $t = &get_instance();
    $t ->load->model("slide_model");
    $slides = $t->slide_model->get_all(array(("isActive") => 1));

    return $slides;
}

function upload_reference_picture($file,$uploadPath,$width,$height,$name){

    $t = &get_instance();

    $t->load->library("simpleimagelib");

    if (!is_dir("{$uploadPath}/{$width}x{$height}")){
        mkdir("{$uploadPath}/{$width}x{$height}");
    }


    $upload_error = false;
    try {
        $simpleImage = $t->simpleimagelib->get_simple_image_instance();

        $simpleImage
            ->fromFile($file)
            ->thumbnail($width,$height,'center')
            ->toFile("{$uploadPath}/{$width}x{$height}/$name", null,75) ;
    } catch(Exception $err) {
        $error = $err->getMessage();

        $upload_error = true;
    }

    if ($upload_error){
        echo $error;
    }else{
        return true;
    }
}

function deletePicture($deletePath,$width,$height,$fileName){
        $file = FCPATH . "uploads/{$deletePath}/{$width}x{$height}/$fileName";
        $deletion = false;
    if (is_file($file)){
        $deletion = unlink($file);
    }
        return $deletion;
}

function upload_poster_picture($file,$uploadPath,$width,$height,$name){

    $t = &get_instance();

    $t->load->library("simpleimagelib");

    if (!is_dir("{$uploadPath}/{$width}x{$height}")){
        mkdir("{$uploadPath}/{$width}x{$height}");
    }


    $upload_error = false;
    try {
        $simpleImage = $t->simpleimagelib->get_simple_image_instance();

        $simpleImage
            ->fromFile($file)
            ->thumbnail($width,$height,'center')
            ->toFile("{$uploadPath}/{$width}x{$height}/$name", null,75) ;
    } catch(Exception $err) {
        $error = $err->getMessage();

        $upload_error = true;
    }

    if ($upload_error){
        echo $error;
    }else{
        return true;
    }
}

function upload_caption($file,$uploadPath,$width,$height,$name){

    $t = &get_instance();

    $t->load->library("simpleimagelib");


    if (!is_dir("{$uploadPath}/{$width}x{$height}")){
        mkdir("{$uploadPath}/{$width}x{$height}");
    }


    $upload_error = false;
    try {
        $simpleImage = $t->simpleimagelib->get_simple_image_instance();


        $simpleImage
            ->fromFile($file)
            ->resize($width,$height,'center')
            ->toFile("{$uploadPath}/{$width}x{$height}/$name", 'image/png') ;
    } catch(Exception $err) {
        $error = $err->getMessage();

        $upload_error = true;
    }

    if ($upload_error){
        echo $error;
    }else{
        return true;
    }
}

function get_article_pdf($article_id){
    $t = &get_instance();
    $t ->load->model("article_model");
    $article = $t->article_model->get(array(("id") => $article_id));

    if($article->file_url != ''){
        $pdf_path = base_url('uploads/articles_v/files/') . $article->file_url;
    }

    return $pdf_path;
}

function get_writer($w_id){
    $t = & get_instance();
    $t->load->model('writer_model');
    $writer = $t->writer_model->get(array('id' => $w_id));

    return $writer->title;
}

function get_topic($t_id){
    $t = & get_instance();
    $t->load->model('topic_model');
    $topic = $t->topic_model->get(array('id' => $t_id));

    return $topic->title;
}

