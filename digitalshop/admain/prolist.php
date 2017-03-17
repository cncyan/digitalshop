<?php
require_once '../include.php';
checklogin();
$sql="select p.id,p.pname,p.psn,p.pnum,p.pprice,p.cprice,p.pdesc,p.pubtime,p.isshow,p.ishot,c.cname from cyan_pro as p join cyan_cate c on p.cid=c.id";
$totalrows=getresultnum($sql);
$pagesize=2;
$page=$_REQUEST['page']?$_REQUEST['page']:1;
$totalpage=ceil($totalrows/$pagesize);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="css/backstage.css">
<link rel="stylesheet" href="js/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
<script src="js/jquery-ui/js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
<script src="js/jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
</head>

<body>
<div id="showDetail"  style="display:none;">

</div>
<div class="details">
                    <div class="details_operation clearfix">
                        <div class="bui_select">
                            <input type="button" value="添&nbsp;&nbsp;加" class="add" onclick="addPro()">
                        </div>
                        <div class="fr">
                            <div class="text">
                                <span>商品价格：</span>
                                <div class="bui_select">
                                    <select id="" class="select" onchange="change(this.value)">
                                    	<option>-请选择-</option>
                                        <option value="iPrice asc" >由低到高</option>
                                        <option value="iPrice desc">由高到底</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text">
                                <span>上架时间：</span>
                                <div class="bui_select">
                                 <select id="" class="select" onchange="change(this.value)">
                                 	<option>-请选择-</option>
                                        <option value="pubTime desc" >最新发布</option>
                                        <option value="pubTime asc">历史发布</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text">
                                <span>搜索</span>
                                <input type="text" value="" class="search"  id="search" onkeypress="search()" >
                            </div>
                        </div>
                    </div>
                    <!--表格-->
                    <table class="table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th width="10%">编号</th>
                                <th width="20%">商品名称</th>
                                <th width="10%">商品分类</th>
                                <th width="10%">是否上架</th>
                                <th width="15%">上架时间</th>
                                <th width="10%">慕课价格</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            <tr>
                                <!--这里的id和for里面的c1 需要循环出来-->
                                <td><input type="checkbox" id="c" class="check"><label for="c1" class="label"></label></td>
                                <td></td>
                                <td></td>
                                <td>
                                	
                                </td>
                                 <td></td>
                                  <td></td>
                                <td align="center">
                                				<input type="button" value="详情" class="btn" onclick="showDetail(')"><input type="button" value="修改" class="btn" onclick=""><input type="button" value="删除" class="btn"onclick="delPro()">
					                            <div id="s" style="display:none;">
					                        	<table class="table" cellspacing="0" cellpadding="0">
					                        		<tr>
					                        			<td width="20%" align="right">商品名称</td>
					                        			<td></td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">商品类别</td>
					                        			<td></td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">商品货号</td>
					                        			<td></td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">商品数量</td>
					                        			<td></td>
					                        		</tr>
					                        		<tr>
					                        			<td  width="20%"  align="right">商品价格</td>
					                        			<td></td>
					                        		</tr>
					                        		<tr>
					                        			<td  width="20%"  align="right">幕课网价格</td>
					                        			<td></td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">商品图片</td>
					                        			<td>
					                        			<img width="100" height="100" src="uploads/" alt=""/> &nbsp;&nbsp;
					                        			
					                        			</td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">是否上架</td>
					                        			<td>
					                        			</td>
					                        		</tr>
					                        		<tr>
					                        			<td width="20%"  align="right">是否热卖</td>
					                        			<td>
					                        			</td>
					                        		</tr>
					                        	</table>
					                        	<span style="display:block;width:80%; ">
					                        	商品描述<br/>
					                        	</span>
					                        </div>
                                
                                </td>
                            </tr>
                            <tr>
                            	<td colspan="7"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
<script type="text/javascript">
function showDetail(id,t){
	$("#showDetail"+id).dialog({
		  height:"auto",
	      width: "auto",
	      position: {my: "center", at: "center",  collision:"fit"},
	      modal:false,//是否模式对话框
	      draggable:true,//是否允许拖拽
	      resizable:true,//是否允许拖动
	      title:"商品名称："+t,//对话框标题
	      show:"slide",
	      hide:"explode"
	});
}
	function addPro(){
		window.location='addPro.php';
	}
	function editPro(id){
		window.location='editPro.php?id='+id;
	}
	function delPro(id){
		if(window.confirm("您确认要删除嘛？添加一次不易，且删且珍惜!")){
			window.location="doAdminAction.php?act=delPro&id="+id;
		}
	}
	function search(){
		if(event.keyCode==13){
			var val=document.getElementById("search").value;
			window.location="listPro.php?keywords="+val;
		}
	}
	function change(val){
		window.location="listPro.php?order="+val;
	}
</script>
</body>
</html>