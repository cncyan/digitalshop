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
	$pid=insert("cyan_pro",$arr);
	if($pid>=0){
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
	
	
	
/*修改商品*/
function editpro($id){
	$arr=$_POST;
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
	$where="id={$id}";
	$res=update("cyan_pro",$arr,$where);
	$pid=$id;
	if($pid>=0){
		if(is_array($uploadfiles)&&$uploadfiles){
			foreach($uploadfiles as $uploadfile){
				$arr1['pid']=$pid;
				$arr1['albumpath']=$uploadfile['name'];
				addablum($arr1);			
				}
		}
			return $mes="<p>修改成功,   </p><a href='prolist.php' target='myframe'>   查看列表  </a>";
		}else{
			if(is_array($uploadfiles)&&$uploadfiles){
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
			}
			return $mes="<p>添加失败,   </p> <a href='addpro.php' target='myframe'>   重新添加 </a>";
			}
	}

/*删除商品*/
function delpro($id){
	$proimgs=getallproimg($id);
	if($proimgs&&is_array($proimgs)){
		foreach($proimgs as $proimg){
			if(file_exists("uploads/".$proimg['albumpath'])){
				unlink("uploads/".$proimg['albumpath']);
				}
		    if(file_exists("../img_50/".$proimg['albumpath'])){
				unlink("../img_50/".$proimg['albumpath']);
				}
			if(file_exists("../img_220/".$proimg['albumpath'])){
				unlink("../img_220/".$proimg['albumpath']);
				}
			if(file_exists("../img_350/".$proimg['albumpath'])){
				unlink("../img_350/".$proimg['albumpath']);
				}
			if(file_exists("../img_800/".$proimg['albumpath'])){
				unlink("../img_800/".$proimg['albumpath']);
				}
			}
		}
		
	$where="id={$id}";
	$res=delt("cyan_pro",$where);
	
	$res1=delt("cyan_album","pid={$id}");
	if($res&&$res1){
		$mes="<p>删除成功,   </p><a href='prolist.php' target='myframe'>   查看列表  </a>";
		}else{
			$mes="<p>删除失败,   </p><a href='prolist.php' target='myframe'>   查看列表  </a>";
			}
	return $mes;
	}
	
	
/*找寻商品
function getallprobyadmin(){
	$sql="select p.id,p.pname,p.psn,p.pnum,p.pprice,p.cprice,p.pdesc,p.pubtime,p.isshow,p.ishot,c.cname from cyan_pro as p join cyan_cate c on p.cid=c.id";
	$rows=fetchall($sql);
	return $rows;
	}*/
/*获取商品图片*/
function getallproimg($id){
	$sql="select * from cyan_album where pid={$id}";
	$imgs=fetchall($sql);
	return $imgs;
	}
/*获取商品通过id*/
function getprobyid($id){
	$sql="select p.id,p.pname,p.psn,p.pnum,p.pprice,p.cprice,p.pdesc,p.pubtime,p.isshow,p.ishot,c.cname,p.cid from cyan_pro as p join cyan_cate c on p.cid=c.id where p.id={$id}";
	$pros=fetchone($sql);
	return $pros;
	}