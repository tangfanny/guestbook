<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
	<script type="text/javascript">
			function dodel(id_num){
				if(confirm("确定要删除吗？")){
					location.href = "guessbook_del.php?id="+id_num;
				}
			}
	</script>
<body background="./images/icecastles5.jpg" id="body">
<center>
	<h2>MINE--留言板管理</h2>
	<a href="index.php">添加留言</a>
	<a href="guessbook_show.php">显示留言</a>
	<hr width="90%">
	<h2 >留言列表展示</h2>
	<table border="1">
		<tr>
			<th>留言者</th>
			<th>标题</th>
			<th>内容</th>
			<th>时间</th>
			<th>IP</th>
			<th>操作</th>
		</tr>
	
	<?php
		$note_info = file_get_contents('./info.txt'); //取出留言信息
		$note_info2 = rtrim($note_info,"@@"); //去掉最后两个字符
		$note_arr = explode('@@',$note_info2); //分割留言为一个数组，每个元素是一条留言
		// var_dump($note_info2);die;
		foreach ($note_arr as $key => $value) { //遍历分割的数组，每次取出一条赋值给$value
			$notes = explode("##",$value);  //返回一个索引数组
			echo "<tr>";
			echo "<td>".$notes[0]."</td>";
			echo "<td>".$notes[1]."</td>";
			echo "<td>".$notes[2]."</td>";
			echo "<td>".date("Y-m-d H:i:s",$notes[3])."</td>";
			echo "<td>".$notes[4]."</td>";
			echo "<td><a href='javascript:dodel(".$key.")'>删除</a></td>";
			echo "</tr>";
		}
	?>
	</table>
</center>
</body>
<style type="text/css">
	td{
		color: #BFF;
		font-size: 18px;
	}
	a{
		color: #BFF;
		font-size: 18px;
		text-decoration: none;
	}
</style>
</html>