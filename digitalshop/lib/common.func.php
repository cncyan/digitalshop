<?php
function alertmsg($msg,$url){
	echo "<script>alert('{$msg}');</script>";//此处有问题
	echo "<script>window.location='{$url}';</script>";
}