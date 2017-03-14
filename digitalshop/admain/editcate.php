<?php
require_once '../include.php';
$id=$_REQUEST['id'];
$sql="select id,cname from cyan_cate where id={$id}";
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
       <div class="title">编辑类别</div>
                <div class="details">
                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <tbody>
                        <form method="post" action="docateaction.php?act=editcate&id=<?php echo $row['id'];?>">
                        <tr>
                        <td><label>类别名称：</label></td>
                        <td><input type="text" name="cname" value="<?php echo $row['cname'];?>"/></td>
                        </tr>
                        <td colspan="2" style="text-align:center;">
                        <input type="submit"value="编辑类别" style="cursor:pointer;" />
                        </td>
                        </tr>
                        </form>
                        </tbody>
                    </table>
                </div>
				</div>
</body>
</html>