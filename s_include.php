<?php
error_reporting(E_ERROR | E_PARSE);
$pubid = 1620374;
$using_cloudflare = false; //change this to true if you are using cloudflare to host this site.
$custom_domain = ''; //this is the url used for the offer links and exit splash(if enabled) leave blank to allow cpagrip to choose best domain. (domain must belong to cpagrip since assets and click-through logic is managed by cpagrip servers)
//--------------------------------
//DO NOT EDIT BELOW THIS LINE.
$id = $_REQUEST['id'];
if($using_cloudflare){
	$visitor_ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
}else{
	$visitor_ip = $_SERVER['REMOTE_ADDR'];
}
$ref = getenv("HTTP_REFERER");
$ref = base64_encode($ref);
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$user_agent = base64_encode($user_agent);
$script_remote_url = 'http://www.cpagrip.com/script_include_proxy.php?custom_domain='.$custom_domain.'&id='.$id.'&visitor_ip='.$visitor_ip.'&pubid='.$pubid.'&ref='.$ref.'&user_agent='.$user_agent.'&tracking_id='.$_REQUEST['tracking_id'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $script_remote_url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$return_string = curl_exec($ch);
curl_close($ch);
echo $return_string;
?>
