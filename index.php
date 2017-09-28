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
	<form action="guessbook_add.php" method="post">
		<table width="400">
			<tr>
				<td align="right">留言者:</td>
				<td><input type="text" name="guesser" value="" style="width: 230px;height: 25px;" placeholder="请输入您的昵称"></td>
			</tr>
			<tr>
				<td align="right">标题:</td>
				<td><input type="text" name="title" style="width: 230px;height: 25px;" value="" placeholder="请输入留言标题"></td>
			</tr>
			<tr>
				<td align="right" valign="top">留言内容:</td>
				<td><textarea name="content" cols="30" rows="5"></textarea></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" value="确认添加" name="sub"> <input type="reset" value="重置"></td>
			</tr>
		</table>
	</form>
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