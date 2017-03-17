<?php
function addpro(){
	$arr=$_POST;
	$arr['pubtime']=time();
	$path="./uploads";
	$uploadfiles=douploade($path);
	if(is_array($uploadfiles)&&$uploadfiles){
		foreach($uploadfiles as $key=>$uploadfile){
			thumb($path."/".$uploadfile['name'],"../img_50/".$uploadfile['name'],50,50);
			thumb($path."/".$uploadfile['name'],"../img_220/".$uploadfile['name'],220,220);
			thumb($path."/".$uploadfile['name'],"../img_350/".$uploadfile['name'],350,350);
			thumb($path."/".$uploadfile['name'],"../img_800/".$uploadfile['name'],800,800);
			}
		}
	$res=insert("cyan_pro",$arr);
	$pid=getinsertid();
	if($res&&($pid>=0)){
		foreach($uploadfiles as $uploadfile){
			$arr1['pid']=$pid;
			$arr1['albumpath']=$uploadfile['name'];
			addablum($arr1);			
			}
			return $mes="<p>添加成功,   </p> <a href='addpro.php' target='myframe'>   继续添加   |</a><a href='prolist.php' target='myframe'>   查看列表  </a>";
		}else{
			foreach($uploadfiles as $uploadfile){
				if(file_exists("../img_800/".$uploadfile['name'])){
					unlink("../img_800/".$uploadfile['name']);
					}
				if(file_exists("../img_50/".$uploadfile['name'])){
					unlink("../img_50/".$uploadfile['name']);
					}
				if(file_exists("../img_220/".$uploadfile['name'])){
					unlink("../img_220/".$uploadfile['name']);
					}
				if(file_exists("../img_350/".$uploadfile['name'])){
					unlink("../img_350/".$uploadfile['name']);
					}
				}
			return $mes="<p>添加失败,   </p> <a href='addpro.php' target='myframe'>   重新添加 </a>";
			}
	}
	
/*找寻商品*/
function getallprobyadmin(){
	$sql="select p.id,p.pname,p.psn,p.pnum,p.pprice,p.cprice,p.pdesc,p.pubtime,p.isshow,p.ishot,c.cname from cyan_pro as p join cyan_cate c on p.cid=c.id";
	$rows=fetchall();
	return $rows;
	}