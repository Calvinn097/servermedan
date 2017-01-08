<?php

function set_global_noti($message,$type){
	$CI =& get_instance();
	$CI->session->set_flashdata("global_notification",array("message"=>$message,"type"=>$type));	
}

function slugify($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, '-');

    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}

if(!function_exists('storage_path'))
{
    function storage_path($path='',$bucket='rumahdewi-us')
    {
//        if(ENVIRONMENT=='production' || ENVIRONMENT=='beta')
//        {
//            return 'gs://'.$bucket.'/'.$path;
//        }
//        else
//        {
//            echo str_replace('\\','/',realpath(APPPATH.'../') .  $path)."<br>";
            return str_replace('\\','/',realpath(APPPATH.'../') .  $path);
//            return $path;
//        }
    }
}

if(!function_exists('delete_folder'))
{
    function delete_folder($directory,$brand=false)
    {
        if(!isset($directory))
        {
            trigger_error('Cannot Be NULL');
            return false;
        }
        elseif(!is_string($directory))
        {
            trigger_error('No,Must use string');
            return false;
        }
        elseif (!is_dir($directory) || $directory==NULL || empty($directory))
        {
            trigger_error($directory.' Folder not exists');
            return false;
        }
        elseif($directory=='/')
        {
            trigger_error($directory.' , WILL DELETE ALL YOUR LOCAL DISC');
            return false;
        }
        elseif($directory==storage_path())
        {
            trigger_error($directory.' , WILL DELETE ALL YOUR STORAGE');
            return false;
        }
        elseif(strpos($directory,storage_path())!== false)
        {
//            die("here");
            foreach(glob("{$directory}/*") as $file)
            {
                $name=substr($file,strrpos($file,"/")+1);
                if(file_exists($file))
                {

                    if(is_dir($file))
                    {
                        if($brand && $name=="restaurant_cover") {
                        }
                        else{
                            delete_folder($file);
                        }
                    }
                    else
                    {
//                        echo $file." file<br>";
                        unlink($file);
                    }
                }
            }

            if(file_exists($directory))
            {
//                echo $directory." dir<br>";
//                vd("brand",$brand);

                if($brand==true){

                }
                else{
//                    die();
                    rmdir($directory);
                }
            }
        }
    }
}

function move_folder($src,$dst=null) {
    if($dst!=null) {
        $dir = opendir($src);
        if (!file_exists($dst)) {
            @mkdir($dst, 0777, true);
        }
        @mkdir($dst,0777, true);
        while (false !== ($file = readdir($dir))) {
            if (($file != '.') && ($file != '..')) {
                if (is_dir($src . '/' . $file)) {
                    move_folder($src . '/' . $file, $dst . '/' . $file);
                } else {
                    copy($src . '/' . $file, $dst . '/' . $file);

                }
            }
        }

        closedir($dir);
    }
    foreach (glob("{$src}/*") as $direc) {
        if (file_exists($direc)) {

            if (is_dir($direc)) {

                move_folder($direc);

            } else {
                unlink($direc);
            }
        }
    }


    if(file_exists($src))
    {
        rmdir($src);

    }


}


function toMoney($val,$symbol='S$',$r=0){
    $symbol_arr=array("SG"=>"S$","ID"=>"Rp");
    $no_decimal = array(
        "ID"
    );
    if(in_array(country_code,$no_decimal)) {
        $decimal=0;
        $n = $val;
    }else{
        $decimal=2;
        $n = round((double)$val,2);;
    }

    $c = is_float($n) ? 1 : number_format($n,$r);
    $d = '.';
    $t = ',';
    $sign = ($n < 0) ? '-' : '';
//    $i = $n=number_format(abs($n),$r);
    $i=number_format(abs($n),$decimal,$d,$t);
    $j = (($j = strlen($i)) > 3) ? $j % 2 : 0;

    return  $sign.$symbol_arr[country_code] .($j ? substr($i,0, $j) + $t : '').preg_replace('/(\d{3})(?=\d)/',"$1" + $t,substr($i,$j)) ;
}

function money_form($val){
    $no_decimal = array(
        "ID"
    );
    if(in_array(country_code,$no_decimal)) {
        return $val;
    }else{

        return round((double)$val, 2);
    }
}

function hsc($s){
    return htmlspecialchars($s,ENT_QUOTES);
}

function get_image_folder_path($path){
    $position=strrpos($path,'/',0);
    $newpath=substr("$path",0,$position);
    return $newpath;
}

function user_login_info(){
    $CI =& get_instance();
    if(isset($_COOKIE["sm_login"])){
        $cookie = json_decode($CI->input->cookie("sm_login"),true);
        if(isset($cookie["user_id"]) && $cookie["user_id"]!==null){
            $user_id=$cookie["user_id"];
        }else{
            return false;
        }
        if(isset($cookie["fb_id"]) && $cookie["fb_id"]!==null){
            $fb_id=$cookie["fb_id"];
        }else{
            $fb_id="";
        }
        if(isset($cookie["fb_access_token"])){
            $fb_access_token=$cookie["fb_access_token"];
        }else{
            $fb_access_token="";
        }
        $data = array(
            "user_id"=>$user_id,
            "fb_id"=>$fb_id,
            "fb_access_token"=>$fb_access_token

        );
        return $data;
    }else{
        return false;
    }
}
function send_email($name,$receiver,$subject,$message)
{
    $email_config = Array(
        'protocol'  => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_port' => '465',
        'smtp_user' => 'vlanzyvinz@gmail.com',
        'smtp_pass' => 'Vlanzyvinz1234#@!',
        'mailtype'  => 'html',
        'starttls'  => true,
        'charset' => 'iso-8859-1'
    );
    $name="ServerMedan";
    $CI=& get_instance();
    $CI->load->library('email',$email_config);
    $CI->email->set_newline("\r\n");

    $CI->email->from('vlanzyvinz@gmail.com', $name);
    $CI->email->to($receiver);
    $CI->email->subject($subject);
    $CI->email->message($message);
    while ( ! @$CI->email->send())
    {
        //echo"Error.. Retrying...";

    }
}

function send_email_custom($receiver,$subject,$message,$sendername,$msgtitle,$smtp_user,$smtp_pass)
{
    $email_config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_port' => '465',
        'smtp_user' => $smtp_user,
        'smtp_pass' => $smtp_pass,
        'mail_type' => 'html',
        'starttls' => true,
        'charset' => 'iso-8859-1'
    );

    $CI =& get_instance();
    $CI->load->library('email',$email_config);
    $CI->email->set_newline("\r\n");

    $CI->email->from($sendername,$msgtitle);
    $CI->email->to($receiver);
    $CI->email->subject($subject);
    $CI->email->message($message);
    while(! @$CI->email->send())
    {

    }
}