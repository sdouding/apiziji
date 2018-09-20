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


		$decrypt = AES::decrypt($sing, 'g87y65ki6e8p93av8zjdrtfdrtgdwetd');
		// echo $decrypt;
		//解密
	
		
		if($decrypt!=Token){
			throw new Exception("加密签名不正确");
		}
	}
?>