<?php
require_once '../include.php';
$rows=getallcate();
if(!$rows){
	alertmsg("无分类请添加","addcate.php");
	}
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
<form action="doadminaction.php?act=addpro" method="post" enctype="multipart/form-data">
<table width="70%"  border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">商品名称</td>
		<td><input type="text" name="pname"  placeholder="请输入商品名称"/></td>
	</tr>
	<tr>
		<td align="right">商品分类</td>
		<td>
		<select name="cid">
        <?php foreach($rows as $row):?>
        <option value="<?php echo $row['id'];?>"><?php echo $row['cname'];?></option>
        <?php endforeach;?>
		</select>
		</td>
	</tr>
	<tr>
		<td align="right">商品货号</td>
		<td><input type="text" name="psn"  placeholder="请输入商品货号"/></td>
	</tr>
	<tr>
		<td align="right">商品数量</td>
		<td><input type="text" name="pnum"  placeholder="请输入商品数量"/></td>
	</tr>
	<tr>
		<td align="right">商品市场价</td>
		<td><input type="text" name="pprice"  placeholder="请输入商品市场价"/></td>
	</tr>
	<tr>
		<td align="right">商品慕课价</td>
		<td><input type="text" name="cprice"  placeholder="请输入商品慕课价"/></td>
	</tr>
	<tr>
		<td align="right">商品描述</td>
		<td>
			<textarea name="pdesc" id="editor_id" style="width:100%;height:150px;"></textarea>
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
		<td colspan="2"><input type="submit"  value="发布商品"/></td>
	</tr>
</table>
</form>
</body>
</html>