<?php
include('config.php');
include('function.php');
session_start();
define('IN_ADMIN',true);

$timezone = "Asia/Ho_Chi_Minh";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$thoigiannow=date('H:i-d/m/Y');
?>
<!DOCTYPE html>
	<!--[if IE 8]>
		<html xmlns="http://www.w3.org/1999/xhtml" class="ie8" lang="vi">
	<![endif]-->
	<!--[if !(IE 8) ]><!-->
		<html xmlns="http://www.w3.org/1999/xhtml" lang="vi">
	<!--<![endif]-->
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Đăng nhập &lsaquo; Nông nghiệp An Giang &#8212; WordPress</title>
	    <style type="text/css">
 
        .login #nav a, .login #backtoblog a, .login label {
            color: #666464 !important;
        }
        .wp-core-ui .button-primary {
            background: #31b36b !important;
            border: none !important;
            text-shadow: none !important;
            box-shadow: none !important;
 
        }
        .login form {
            box-shadow: none !important;
            background: transparent !important;
        }
        #login h1 a {
            background-image: url(../img/logo_dataman.png);
            background-size: 350px 300px;
            width: 350px;
            height: 300px;
        }
    </style>
	
<link rel='dns-prefetch' href='//s.w.org' />
<link rel='stylesheet' href='http://girs.vn:3600/angiang-agriweb/portal/wp-admin/load-styles.php?c=1&amp;dir=ltr&amp;load%5B%5D=dashicons,buttons,forms,l10n,login&amp;ver=4.9.5' type='text/css' media='all' />
<meta name='robots' content='noindex,follow' />
	<meta name="viewport" content="width=device-width" />
	<link rel="icon" href="http://girs.vn:3600/angiang-agriweb/portal/wp-content/uploads/2018/03/NongnghiepAnGiang_Logo_2018-06-120x120.png" sizes="32x32" />
<link rel="icon" href="http://girs.vn:3600/angiang-agriweb/portal/wp-content/uploads/2018/03/NongnghiepAnGiang_Logo_2018-06-300x300.png" sizes="192x192" />
<link rel="apple-touch-icon-precomposed" href="http://girs.vn:3600/angiang-agriweb/portal/wp-content/uploads/2018/03/NongnghiepAnGiang_Logo_2018-06-300x300.png" />
<meta name="msapplication-TileImage" content="http://girs.vn:3600/angiang-agriweb/portal/wp-content/uploads/2018/03/NongnghiepAnGiang_Logo_2018-06-300x300.png" />
	</head>
	<body class="login login-action-login wp-core-ui  locale-vi">
	
<?php
function check_login(){
//$sql="SELECT * from \"users\" where email='".$_SESSION['email']."' and password='".$_SESSION['password']."' and usertype = 'admin'";
$sql="SELECT * from \"users\" where email='".$_SESSION['email']."' and password='".$_SESSION['password']."'";
$dbcon = pg_connect("dbname=".PG_DB." password=".PG_PASS." host=".PG_HOST." user=".PG_USER." port=".PG_PORT);
$q = pg_query($dbcon,$sql);

if(pg_num_rows($q) > 0){
	return true;
}
	return false;
}

if(isset($_POST['thoat']))
{
	session_destroy();
	$page = 'index.php';
	header('Location: '.$page, true, 303);
	exit;
}
if (@$_SESSION['login'] == true && check_login() == true){
	include('main.php');
	echo '<form name="form1" method="post" action="">
	<input name="thoat" value="Thoát" type="submit">
	</div>
	</form>';
	header("Location: ../manage/");
}else{
	include('login_template.html');
}

?>
		<div class="clear"></div>
	</body>
	</html>
	