<?php
require_once "include.php";
$act=$_REQUEST['act'];
if($act=="reg"){
	$mes=reg();
}elseif($act=="adduser"){
	$mes=adduser();
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="css/backstage.css">
</head>
<body>
<div class="warning_message">
<?php
if($mes){
	echo $mes;
	}
?>
</div>
</body>
</html>