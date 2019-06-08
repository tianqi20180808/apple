<?php
sleep(1);
$name = '123456';
$word = '123456';

$username = $_POST['username'];
$password = $_POST['password'];

if($username == $name && $password == $word){
	$response = [ 
		'code' => 200,
		'message' =>'登录成功'
	];
}else{
	$response = [ 
		'code' => -1,
		'message' =>'Apple ID或密码错误'
	];
}
echo json_encode($response);
?>