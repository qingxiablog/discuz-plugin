<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
include_once 'function_upyun.php';
class plugin_upyun {
	function global_header() {
		global $_G;
		//防盗链 token 写入用户网站的一级域名
        $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME'];
		$cookie_domain = substr($host, strpos($host, '.'));
		setcookie('_upt', upyun_gen_sign(), $_SERVER['REQUEST_TIME'] + 180, '/', $cookie_domain);
	}

	function common() {
		global $_G;
		$upyun_config = $_G['cache']['plugin']['upyun'];
		$_G['setting']['ftp']['attachurl'] = rtrim($upyun_config['url'], '/') . '/';
	}
}

//mobile plugin is used for mobile access
class mobileplugin_upyun extends plugin_upyun{}
