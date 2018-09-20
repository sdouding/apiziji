<?php
	include './aes.php';
	
	// 检测秘钥
	try{
		if(empty($_GET['sing'])){
			throw new Exception("加密签名不存在");
		}

		check($_GET['sing']);
	}catch(Exception $e){
		resp([],401,$e->getMessage());
		exit;
	}

	//校验签名
	function check($sing){
// ac637d50290092e0c0a530e55eb2668e
		
		$sing = str_replace(' ','+', $sing);

		//解密
		$sing_tmp = AES::decrypt($sing, 'g87y65ki6e8p93av8zjdrtfdrtgdwetd');
		// echo $decrypt;
		$sing_arr = explode('/',$sing_tmp);
		
		if($sing_arr[0]!=Token){
			throw new Exception("加密签名不正确");
		}

		//防止api暴露
		if((time()-$sing_arr[1]) > 5){
			throw new Exception("加密签名sing失效");
			
		}
	}
?>