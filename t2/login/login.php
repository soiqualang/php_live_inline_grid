<?php
include('../manage/check.php'); //kết nối csdl
//session_start();
//insert into "users"(id,email,password,level) values(1,'den',2679191,1);
$email = addslashes($_POST['email']);
$password = addslashes($_POST['password']);

//$sql="SELECT * from \"users\" where email='".$email."' and password='".$password."' and usertype = 'admin'";

$sql="SELECT * from \"users\" where email='".$email."' and password='".$password."'";

//echo $sql;

$dbcon = pg_connect("dbname=".PG_DB." password=".PG_PASS." host=".PG_HOST." user=".PG_USER." port=".PG_PORT);
$q = pg_query($dbcon,$sql);
/* 
echo $sql;
echo pg_num_rows($q); */

//neu thong tin lon hon 0 thi tao session cho phep xu li du lieu
if(pg_num_rows($q) > 0){
	$_SESSION['email'] = $email;
	$_SESSION['username'] = getElement($tbl,'username','email',$email);
	$_SESSION['password'] = $password;
	$_SESSION['login'] = true;
	$tbl='users';
	$id=getElement($tbl,'id','email',$email);
	$_SESSION['id'] = $id;
	
	echo 'Chao mung ban '.$_SESSION['email'].'<br>';
	//echo '<a href="index.php">Quay ve trang chu</a>';
	header("Location: index.php");
}else{
//echo 'Rat tiec, ban da dang nhap sai<br><a href="index.php">Quay ve trang chu</a>';
echo 'Rat tiec, ban da nhap sai';
session_destroy();
header("Location: index.php");
}
?>