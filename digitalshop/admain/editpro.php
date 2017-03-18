<?php
require_once '../include.php';
$rows=getallcate();
if(!$rows){
	alertmsg("无分类请添加","addcate.php");
	}
$id=$_REQUEST['id'];
$pros=getprobyid($id);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link href="css/global.css"  rel="stylesheet"  type="text/css" media="all" />
<script type="text/javascript" charset="utf-8" src="plugins/kindeditor/kindeditor.js"></script>
<script type="text/javascript" charset="utf-8" src="plugins/kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript" src="js/jquery-1.6.4.js"></script>
<script>
        KindEditor.ready(function(K) {
                window.editor = K.create('#editor_id');
        });
</script>
</head>
<body>
<h3>添加商品</h3>
<form action="doadminaction.php?act=editpro&id=<?php echo $pros['id'];?>" method="post" enctype="multipart/form-data">
<table width="70%"  border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">商品名称</td>
		<td><input type="text" name="pname" value="<?php echo $pros['pname']?>"/></td>
	</tr>
	<tr>
		<td align="right">商品分类</td>
		<td>
		<select name="cid">
        <?php foreach($rows as $row):?>
        <option value="<?php echo $row['id'];?>" <?php echo $row['id']==$pros['cid']?"selected='selected'":null;?>><?php echo $row['cname'];?></option>
        <?php endforeach;?>
		</select>
		</td>
	</tr>
	<tr>
		<td align="right">商品货号</td>
		<td><input type="text" name="psn" value="<?php echo $pros['psn']?>" </td>
	</tr>
	<tr>
		<td align="right">商品数量</td>
		<td><input type="text" name="pnum" value="<?php echo $pros['pnum']?>" </td>
	</tr>
	<tr>
		<td align="right">商品市场价</td>
		<td><input type="text" name="pprice" value="<?php echo $pros['pprice']?>"</td>
	</tr>
	<tr>
		<td align="right">商品慕课价</td>
		<td><input type="text" name="cprice" value="<?php echo $pros['cprice']?>"</td>
	</tr>
	<tr>
		<td align="right">商品描述</td>
		<td>
			<textarea name="pdesc" id="editor_id" style="width:100%;height:150px;"><?php echo $pros['pdesc']?></textarea>
		</td>
	</tr>
	<tr>
		<td align="right">商品图像</td>
		<td>
			<input type="file" name="mainpic">
            <input type="file" name="backpic">
		</td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit"  value="修改商品"/></td>
	</tr>
</table>
</form>
</body>
</html>