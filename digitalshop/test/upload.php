 <!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>文件上传</title>
<link rel="stylesheet" href="css/backstage.css">
</head>

<body>
<form action="doaction1.php" method="post" enctype="multipart/form-data">
   <!--<input type="hidden" name="MAX_FILE_SIZE" value="1012000">限制文件大小-->
   请选择文件：<input type="file" name="file1[]"><!--accept="image/*,text/*,audio/*,vedio/*,application/*"限制文件类型-->
   请选择文件：<input type="file" name="file2[]">
   请选择文件：<input type="file" name="file[]">
   <input type="submit" value="上传文件">
</form>
</body>
</html>