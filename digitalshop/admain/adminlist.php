<?php
require_once "../include.php";
$rows=getalladmin();
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
                <div class="title">管理员列表</div>
                <div class="details">
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="15%">编号</th>
                                <th width="25%">管理员账户</th>
                                <th width="30%">管理员邮箱</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=1;foreach($rows as $row):?>
                            <tr>
                                <td><input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php echo $i;?></label></td>
                                <td><?php echo $row['username'];?></td>
                                <td><?php echo $row['email'];?></td>
                                <td align="center"><input type="button" onClick="editadmin(<?php echo $row['id'];?>)" value="修改" class="btn"><input type="button" onClick="deladmin(<?php echo $row['id']?>)" value="删除" class="btn"></td>
                            </tr>
                            <?php $i++;endforeach;?>
                        </tbody>
                    </table>
                </div>
				</div>
                <script>
                function editadmin(id){
					window.location="editadmin.php?id="+id;
					}
				function deladmin(id){
					if(window.confirm("您确定要删除吗？不可恢复哦！！")){
						window.location="doadminaction.php?act=deladmin&id="+id;
						}
					}
                </script>
</body>
</html>