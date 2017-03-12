<?php
require_once "string.func.php";
//通过GD库做验证码
/*
$width画布宽度，
$height 画布高度，
$type 验证码类型，
$length 验证码长度，
$pixel 干扰点数,
$line 干扰线条数
*/
function verification($width=80,$height=30,$type=1,$length=4,$pixel=10,$line=5,$sess_name="verify"){
//创建画布
$image=imagecreatetruecolor($width,$height);
$white=imagecolorallocate($image,255,255,255);
$black=imagecolorallocate($image,0,0,0);
//用填充矩形填充画布.$fontfiles[mt_rand(0,count($fontfiles)-1)]
imagefilledrectangle($image,1,1,$width-2,$height-2,$white);
$chars=buildrandomstring($type,$length);
$_SESSION[$sess_name]=$chars;
//$fontfiles=array("SIMYOU.TTF","STXINGKA.TTF","STLITI.TTF","STXINGKA");
$fontfiles=array("STLITI.TTF");
for($i=0;$i<$length;$i++){
	$size=mt_rand(14,18);
	$angle=mt_rand(-15,15);
	$x=5+$i*$size;
	$y=mt_rand(20,26);
	$color=imagecolorallocate($image,mt_rand(50,90),mt_rand(80,200),mt_rand(90,100));
	$fontfile="../fonts/".$fontfiles[mt_rand(0,count($fontfiles)-1)];
	$text=substr($chars,$i,1);
	imagettftext( $image, $size, $angle, $x, $y, $color, $fontfile, $text);
}
if($pixel){
	for($i=0;$i<$pixel;$i++){
	  imagesetpixel($image,mt_rand(0,$width-1),mt_rand(0,$width-1),$black);
	}
}
if($line){
	for($i=0;$i<$line;$i++){
		$color=imagecolorallocate($image,mt_rand(50,90),mt_rand(80,200),mt_rand(90,100));
		imageline($image,mt_rand(0,$width-1),mt_rand(0,$width-1),mt_rand(0,$width-1),mt_rand(0,$width-1),$color);
	}
}
ob_clean(); 
header("content-type:image/gif");
imagegif($image);
imagedestroy($image);
}
