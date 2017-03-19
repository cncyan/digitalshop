<?php
require_once "../include.php";
$pagesize=2;
$rows=getalluserbypage($pagesize);
if($rows==null){
	echo "<script>alert('error');</script>";
	exit;
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
<div class="cont">
                <div class="title">用户列表</div>
                <div class="details">
                <div class="details_operation clearfix">
                        <div class="details_operation clearfix">
                        <div class="bui_select">
                            <input type="button" value="添&nbsp;&nbsp;加" onClick="turnadd()" class="add">
                        </div>
                      </div> 
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="10%">编号</th>
                                <th width="20%">头像</th>
                                <th width="20%">账户</th>
                                <th width="20%">邮箱</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($rows as $row):?>
                            <tr>
                                <td><input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php echo $row['id'];?></label></td>
                                <td align="center"><img src="../upload/<?php echo $row[face];?>" width="60" height="60"></td>
                                <td><?php echo $row['username'];?></td>
                                <td><?php echo $row['email'];?></td>
                                <td align="center"><input type="button" onClick="edituser(<?php echo $row['id'];?>)" value="修改" class="btn"><input type="button" onClick="deluser(<?php echo $row['id']?>)" value="删除" class="btn"></td>
                            </tr>
                            <?php endforeach;?>
                            <?php if($totalrows>$pagesize)://sizeof($rows)无效?>
                            <tr>
                                <td colspan="4"><?php echo showpage($page,$totalpage);?></td>
                            </tr>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
				</div>
                <script>
                function edituser(id){
					window.location="edituser.php?id="+id;
					}
				function deluser(id){
					if(window.confirm("您确定要删除吗？不可恢复哦！！")){
						window.location="doadminaction.php?act=deluser&id="+id;
						}
					}
			    function turnadd(){
					   window.location="adduser.php";
					   }
                </script>
</body>
</html>