<?php
function reg(){
	$arr=$_POST;
	$arr['password']=md5($_POST['password']);
	$arr['regtime']=time();
	$uploadfile=douploade();
	//var_dump($uploadfile);die;
	if($uploadfile&&is_array($uploadfile)){
		$arr['face']=$uploadfile[0]['name'];
		}else{
			return "未上传头像";
			}
	if(insert("cyan_user",$arr)){
		$mes="注册成功，</br>3秒钟后自动跳转登录<meta http-equiv='refresh' content='3;url=login.php'>";
		}else{
			$facefile="upload/".$uploadfile[0]['name'];
			if(file_exists($facefile)){
				unlink($facefile);
				}
			$mes="注册失败， |  <a href='registe.php'> 点击重新注册</a>  |  <a href='index.php'>返回首页</a>";
			}
	return $mes;
	}
	
