<?php
/*生成缩略图原理
$filename="des_big.jpg";
list($src_w,$src_h,$imagetype)=getimagesize($filename);
$mime=image_type_to_mime_type($imagetype);//多用途互联网扩展邮件类型
$createfun=str_replace("/","createfrom",$mime);//形成imagecreatefrmjpeg()函数,由文件或 URL 创建一个新图象
$outfun=str_replace("/",null,$mime);//形成imagejpeg ( resource $image [, string $filename]] ))函数,输出图象到浏览器或文件
$src_image=$createfun($filename);
$dsc_50_image=imagecreatetruecolor(50,50);//imagecreatetruecolor ( int $width , int $height )函数,形成一个真彩图像
$dsc_220_image=imagecreatetruecolor(220,220);
$dsc_350_image=imagecreatetruecolor(350,350);
$dsc_800_image=imagecreatetruecolor(800,800);
//imagecopyresampled ( resource $dst_image , resource $src_image , int $dst_x , int $dst_y , int $src_x , int $src_y , int $dst_w //, int $dst_h , int $src_w , int $src_h )重采样拷贝部分图像并调整大小
imagecopyresampled($dsc_50_image,$src_image,0,0,0,0,50,50,$src_w,$src_h);
imagecopyresampled($dsc_220_image,$src_image,0,0,0,0,220,220,$src_w,$src_h);
imagecopyresampled($dsc_350_image,$src_image,0,0,0,0,350,350,$src_w,$src_h);
imagecopyresampled($dsc_800_image,$src_image,0,0,0,0,800,800,$src_w,$src_h);
$outfun($dsc_50_image,"upload/image_50/".$filename);
$outfun($dsc_220_image,"upload/image_220/".$filename);
$outfun($dsc_350_image,"upload/image_350/".$filename);
$outfun($dsc_800_image,"upload/image_800/".$filename);
imagedestroy($src_image);//释放与 image 关联的内存
imagedestroy($dsc_50_image);
imagedestroy($dsc_220_image);
imagedestroy($dsc_350_image);
imagedestroy($dsc_800_image);*/



require_once '../lib/string.func.php';





function thumb($filename,$destination=null,$dsc_w=null,$dsc_h=null,$isreservedsource=true,$scale=0.5){
	list($src_w,$src_h,$imagetype)=getimagesize($filename);
	if(is_null($dsc_w)||is_null($dsc_h)){
		$dsc_w=ceil($src_w*$scale);
		$dsc_h=ceil($src_h*$scale);
		}
	$mime=image_type_to_mime_type($imagetype);
	$createfun=str_replace("/","createfrom",$mime);
	$outfun=str_replace("/",null,$mime);
	$src_image=$createfun($filename);
	$dsc_image=imagecreatetruecolor($dsc_w,$dsc_h);
	imagecopyresampled($dsc_image,$src_image,0,0,0,0,$dsc_h,$dsc_w,$src_w,$src_h);
	if($destination&&!file_exists(dirname($destination))){
		mkdir(dirname($destination),0777,true);
		}
		$dstfilename=$destination==null?getunidstr().".".getext($filename):$destination;
		$outfun($dsc_image,$dstfilename);
		imagedestroy($src_image);
		imagedestroy($dsc_image);
		if(!$isreservedsource){
			unlink($filename);
			}
		return $dstfilename;
	}








