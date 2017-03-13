<?php
require_once "../include.php";
$act=$_REQUEST['act'];
$id=$_REQUEST['id'];
if($act=="logout"){
	logout();
}elseif($act=="addadmin"){
	$mes=addadmin();
	}elseif($act=="editadmin"){
		$mes=editadmin($id);
		}elseif($act=="deladmin"){
			$mes=deladmin($id);
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