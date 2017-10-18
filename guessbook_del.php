<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body background="./images/icecastles5.jpg">
<center>
	<h2>我的留言板</h2>
	<a href="index.php">添加留言</a>
	<a href="guessbook_show.php">显示留言</a>
	<hr width="90%">
	<h2>添加留言</h2>

	<?php
		//接收要删除的元素的id
		$id = $_GET['id'];
		//取出留言文件里的内容
		$notes = file_get_contents('./info.txt');
		//通过@@分割为一个数组，每个元素为一条留言
		$notes_arr = explode("@@", $notes);
		// var_dump($notes_arr);die;

		//删除接收的id对应下标的留言
		unset($notes_arr[$id]);

		$note_str = implode("@@", $notes_arr);//最后把留言重组

		$res = file_put_contents('./info.txt',$note_str);//重组后写入源文件

		if($res == false){
			echo "删除失败！";
			$url = 'guessbook_show.php';
			echo "<a href='$url'>进入留言列表</a>";
		}else{
			echo "删除成功！";
			$url = 'guessbook_show.php';
			echo "<a href='$url'>进入留言列表</a>";
		}

		


	?>
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
	}
</style>
</html>