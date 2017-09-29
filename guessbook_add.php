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
		//接收提交的留言信息
		if($_POST['sub']){
			$name = trim($_POST['guesser']);
			$title = trim($_POST['title']);
			$content = trim($_POST['content']);
			$time = time();
			$ip = $_SERVER['SERVER_ADDR'];
		}
	//拼接留言信息为字符串
	$info_note = $name."##".$title."##".$content."##".$time."##".$ip."@@";
	//获取要存入的文件里的原来的内容
	$note = file_get_contents('./info.txt');
	//把新内容拼接在原来的内容后边
	$res = file_put_contents('./info.txt',$note.$info_note);
		if($res==flase){
			echo "留言失败！!!";
			$url = 'guessbook_show.php';
			echo "<a href='$url'>进入留言列表</a>";
		}else{
			echo "留言成功!!！";
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