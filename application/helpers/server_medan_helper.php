<?php

function set_global_noti($message,$type){
	$CI =& get_instance();
	$CI->session->set_flashdata("global_notification",array("message"=>$message,"type"=>$type));	
}