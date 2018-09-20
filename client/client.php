<?php
	
	include './vendor/autoload.php';
	include 'setsing.php';
phpinfo();exit;
	//定义秘钥
	$token = 'test';
	//生成一个加密签名
	$sing = setsing($token);
	// die($sing);

	//请求的api地址
	$url = 'http://localhost/git/apiziji/server/server.php?sing='.$sing;

	$curl = new Curl\Curl();
	$curl->post($url, array(
	    'username'=>'sdouding',
	    'password'=>'123'
	));

	if ($curl->error) {
	    echo $curl->error_code;
	}
	else {
	    echo $curl->response;
	}


	//客户端发起api请求
	// phpinfo();
?>