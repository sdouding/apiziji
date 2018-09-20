<?php
	include './aes.php';

	//使用redis存储$sing
	$red = new Redis();
	$red->connect('127.0.0.1',6379);
	
	// 检测秘钥
	try{
		if(empty($_GET['sing'])){
			throw new Exception("加密签名不存在");
		}

		check($_GET['sing'],$red);
	}catch(Exception $e){
		resp([],401,$e->getMessage());
		exit;
	}

	//校验签名
	function check($sing,$red){
// ac637d50290092e0c0a530e55eb2668e
		
		$sing = str_replace(' ','+', $sing);

		//解密
		$sing_tmp = AES::decrypt($sing, 'g87y65ki6e8p93av8zjdrtfdrtgdwetd');
		// echo $decrypt;
		$sing_arr = explode('/',$sing_tmp);
		
		//用户身份识别
		if($sing_arr[0]!=Token){
			throw new Exception("加密签名不正确");
		}

		//防止api暴露
		if((time()-$sing_arr[1]) > 20){
			throw new Exception("加密签名sing失效");
		}

		//多次请求
		if($red->get($sing)){
			throw new Exception("sing已经被使用");
			
		}
		$red->set($sing,'1');
	}
?>