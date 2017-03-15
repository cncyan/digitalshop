<?php
require_once '../lib/string.func.php';
header("content-type=text/htme;charset=utf-8");
//文件上传原理
function uploadeone($fileinfo,$path="upload",$allowtype=array("jpg","png","gif"),$maxsize=512000,$imgflag=true){
	if($fileinfo['error']==0){
		if(!file_exists($path)){                //如果文件夹不存在先创建文件夹
				mkdir($path,0777,true);
				}
		if($imgflag){                     //判断是否为真正图片类型,传图片可用
			@$info=getimagesize($fileinfo['tmp_name']);
			if(!$info){
				exit("不是真正图片");
				}
			}
		
		$ext=getext($fileinfo['name']);
		if(!in_array($ext,$allowtype)){
			exit("文件格式错误");
			}
		if($fileinfo['size']>$maxsize){
			exit("文件过大");
			}
		$filename=getunidstr().".".$ext;
		//判断是不是通过http post上传的
		if(is_uploaded_file($fileinfo['tmp_name'])){                                          
			$destination=$path.'/'.$filename;
			 if(move_uploaded_file($fileinfo['tmp_name'],$destination)){
				 $mes="文件上传成功";			 
				 }else{
					 $mes="文件移动失败";
					 }
			}else{
				$mes="文件非HTTP POST方式上传";
				}
		}else{
			switch($fileinfo['error']){
				case(1):$mes="文件超出配置要求大小";break;  //UPLOAD_ERR_INI_SIZE
				case(2):$mes="文件超出表单要求大小";break;  //UPLOAD_ERR_FORM_SIZE
				case(3):$mes="文件超出部分被上传";break;    //UPLOAD_ERR_PARTICAL
				case(4):$mes="没有文件被上传";break;  //UPLOAD_ERR_NO_SIZE
				case(6):$mes="没有找到临时文件夹";break;  //UPLOAD_ERR_NO_TMP_DIR
				case(7):$mes="文件不可写";break;    //UPLOAD_ERR_CANT_WRITE
				case(8):$mes="由于php的扩展程序中断上传";break;    //UPLOAD_ERR_EXTENTION
				}
			}
		return $mes;
	}
//文件上传实施应用
function buildfile(){            //上传文件的集体整合
    if(!$_FILES){
		return ;
	}
	$i=0;
	foreach($_FILES as $v){
		if(is_string($v['name'])){
			$files[$i]=$v;
			$i++;
			}else{
				foreach($v['name'] as $key=>$val){
					$files[$i]['name']=$val;
					$files[$i]['size']=$v['size'][$key];
					$files[$i]['type']=$v['type'][$key];
					$files[$i]['tmp_name']=$v['tmp_name'][$key];
					$files[$i]['error']=$v['error'][$key];
					$i++;
					}
				}
		}
	return $files;
}
	
function douploade($path="upload",$allowtype=array("jpg","png","gif","txt"),$maxsize=1012000,$imgflag=false){
	if(!file_exists($path)){                //如果文件夹不存在先创建文件夹
			mkdir($path,0777,true);
			}
	$i=0;
	$fileinfos=buildfile();
	var_dump($fileinfos);die;
	if(!($fileinfos&&is_array($fileinfos))){
		return ;
	}
	foreach($fileinfos as $fileinfo){
		if($fileinfo['error']===UPLOAD_ERR_OK){
			$ext=getext($fileinfo['name']);
			//检测文件的扩展名
			if(!in_array($ext,$allowtype)){
				exit("非法文件类型");
			}
			//校验是否是一个真正的图片类型
			if($imgflag){
				if(!getimagesize($fileinfo['tmp_name'])){
					exit("不是真正的图片类型");
				}
			}
			//上传文件的大小
			if($fileinfo['size']>$maxsize){
				exit("上传文件过大");
			}
			if(!is_uploaded_file($fileinfo['tmp_name'])){
				exit("不是通过HTTP POST方式上传上来的");
			}
			$filename=getunidstr().".".$ext;
			$destination=$path."/".$filename;
			if(move_uploaded_file($fileinfo['tmp_name'], $destination)){
				$fileinfo['name']=$filename;
				$uploadedFiles[$i]=$fileinfo;
				$i++;
			}
		}else{
			switch($fileinfo['error']){
					case 1:
						exit("超过了配置文件上传文件的大小");//UPLOAD_ERR_INI_SIZE
						break;
					case 2:
						exit("超过了表单设置上传文件的大小");			//UPLOAD_ERR_FORM_SIZE
						break;
					case 3:
						exit("文件部分被上传");//UPLOAD_ERR_PARTIAL
						break;
					case 4:
						exit("没有文件被上传1111");//UPLOAD_ERR_NO_FILE
						break;
					case 6:
						exit("没有找到临时目录");//UPLOAD_ERR_NO_TMP_DIR
						break;
					case 7:
						exit("文件不可写");//UPLOAD_ERR_CANT_WRITE;
						break;
					case 8:
						exit("由于PHP的扩展程序中断了文件上传");//UPLOAD_ERR_EXTENSION
						break;
				}
			}
	}
	return $uploadedFiles;
	}