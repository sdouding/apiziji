<?php
	include './aes.php';
	//加密签名
	function setsing($token){

		//加密
		$sing = AES::encrypt($token, 'g87y65ki6e8p93av8zjdrtfdrtgdwetd');
		//解密
		// $sing = AES::decrypt($token);
		
		return $sing;
	}
?>