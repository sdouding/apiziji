<?php
	include './aes.php';
	//加密签名
	function setsing($token){
		$sing = $token.'/'.time();

		//加密
		$sing = AES::encrypt($sing, 'g87y65ki6e8p93av8zjdrtfdrtgdwetd');
		
		return $sing;
	}
?>