<?php
require_once "../include.php";
$id=$_REQUEST['id'];
$sql="select id,username,password,email from cyan_admin where id='{$id}'";
$row=fetchone($sql);
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
       <div class="title">编辑管理员</div>
                <div class="details">
                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <tbody>
                        <form method="post" action="doadminaction.php?act=editadmin&id=<?php echo $row['id'];?>">
                        <tr>
                        <td><label>姓名：</label></td>
                        <td><input type="text" name="username"  value="<?php echo $row['username'];?>"/></td>
                        </tr>
                        <tr>
                        <td><label>密码：</label></td>
                        <td><input type="password" name="password"  value="<?php echo $row['password'];?>"/></td>
                        </tr>
                        <tr>
                        <td><label>邮箱：</label></td>
                        <td><input type="email" name="email"  value="<?php echo $row['email'];?>"/></td>
                        </tr>
                        <tr>
                        <td colspan="2" style="text-align:center;">
                        <input type="submit"value="提交" style="cursor:pointer;" />
                        </td>
                        </tr>
                        </form>
                        </tbody>
                    </table>
                </div>
				</div>
</body>
</html>