<?php
require_once "../include.php";
$id=$_REQUEST['id'];
$sql="select * from cyan_user where id='{$id}'";
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
       <div class="title">添加管理员</div>
                <div class="details">
                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <tbody>
                        <form method="post" action="doadminaction.php?act=edituser&id=<?php echo $row['id'];?>" enctype="multipart/form-data">
                        <tr>
                        <td><label>姓名：</label></td>
                        <td><input type="text" name="username" value="<?php echo $row['username']?>"/></td>
                        </tr>
                        <tr>
                        <td><label>密码：</label></td>
                        <td><input type="password" name="password"  value="<?php echo $row['password']?>"/></td>
                        </tr>
                        <tr>
                        <td><label>邮箱：</label></td>
                        <td><input type="email" name="email"  value="<?php echo $row['email']?>"/></td>
                        </tr>
                        <tr>
                        <td><label>性别：</label></td>
                        <td>
                            <input type="radio" name="sex" value="1" <?php echo $row['sex']=='boy'?"checked='checked'":null;?> >boy
                            <input type="radio" name="sex" value="2" <?php echo $row['sex']=='gail'?"checked='checked'":null;?>>girl
                            <input type="radio" name="sex" value="3" <?php echo $row['sex']=='secriet'?"checked='checked'":null;?>>serect
                        </td>
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