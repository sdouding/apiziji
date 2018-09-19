<?php
	//接收请求 响应数据 json
	$pdo = new PDO('mysql:host=localhost;dbname=api;charset=utf8','root','');

	$stmt = $pdo->query('select * from user1');
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

	//定义标准化产出数据格式函数
	function resp($data,$status,$message){
		
		$res =[
			'status'=>$status,//服务器响应状态码 200 401 404
			'data'=>$data,// 此次api请求的描述
			'message'=>$message
		];

		echo json_encode($res,JSON_UNESCAPED_UNICODE);
	}

	resp($data,200,'ok');

?>