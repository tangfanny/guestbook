<?php

	/*
	* 处理登录流程
	*/
	session_start();
	include('function.php');
	include('config.php');

	$name = trim($_POST['username']);
	$pass = md5($_POST['password']);

	if($name=='' || $pass == ''){
		$msg = "用户名密码不能为空";
		$jumpUrl = "login.php";
		$waitSecond = 3;
		include('tips.php');
		exit;
	}

	$user_data = getUserInfo($name, $user_dir); //获取用户信息 索引数组

	if(!$user_data){
		$msg = "这个用户不存在，请注册";
		$jumpUrl = "login.php";
		$waitSecond = 3;
		include('tips.php');
		exit;
	}

	if($user_data[2] != $pass){  //判断密码输入是否正确
		$msg = "密码输入有误";
		$jumpUrl = "login.php";
		$waitSecond = 3;
		include('tips.php');
		exit;
	}

	$_SESSION['uid'] = $user_data[0];
	$_SESSION['name'] = $user_data[1];
	$_SESSION['phone'] = $user_data[3];
	$_SESSION['email'] = $user_data[4];

	$msg = "登录成功！";
	$jumpUrl = "index.php";
	$waitSecond = 3;
	include('tips.php');
	exit;






