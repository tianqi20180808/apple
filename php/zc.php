<?php 
mysql_connect('127.0.0.1','root','root');
mysql_query("use news");

$username = $_POST['username'];
$password = $_POST['password'];

//1.先查询用户名是否占用
$sql1 = "select * from user where username = '$username'";
$result =mysql_query($sql);
$row =mysql_fetch_assoc($result);
if($row){
	$res = [
		'code' => -1,
		'message' =>'用户名占用'
	];
	echo json_encode($res); die;
}



//2.没有被占用，才可以直接入库
$sql2 = "insert into user(username,password) values('$username','$password')";

mysql_query($sql2);

$num = mysql_affected_rows();
if($num > 0){
	$res = [
		'code' => 200,
		'message' =>'注册成功'
	];
}else{
	$res = [
		'code' => -2,
		'message' =>'网络异常,请稍后重试'
	];
}

echo json_encode($res);

?>