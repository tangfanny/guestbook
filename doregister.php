<?php

/*
*处理注册流程
*/


     include('function.php');//加载公共函数文件
     include('config.php');

     //判断必须从注册页面提交
     if(empty($_POST)){
       	$msg = "提交方式有误";
       	$jumpUrl = "login.php";
       	$waitSecond = 3;
       	include('tips.php');
       	exit;
     }

    //接收注册数据进行处理
     $name = trim($_POST['username']);
     $pass = md5($_POST['pwd']);
     $rpass = md5($_POST['rpwd']);
     $phone = trim($_POST['tel']);
     $email = trim($_POST['email']);

    //简单判断用户名、密码不能为空，密码确认密码必须一致
     if($name=='' || $pass=='' || $pass != $rpass){
       	$msg = "用户名或者密码格式不正确！";
       	$jumpUrl = "login.php";
       	$waitSecond = 3;
       	include('tips.php'); //加载提示跳转页面
       	exit;
     }

    //正则表达式匹配手机号
     if(!preg_match("/^((13[0-9])|(15[1-3,5-9])|(17[7])|(18[0-9]))\d{8}$/", $phone)){
       	$msg = "手机号码格式不正确！";
       	$jumpUrl = "login.php";
       	$waitSecond = 3;
       	include('tips.php');
       	exit;
     }

    //匹配邮箱格式
     if(!preg_match("/^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/", $email)){
       	$msg = "邮箱格式不正确！";
       	$jumpUrl = "login.php";
       	$waitSecond = 3;
       	include('tips.php');
       	exit;
     }

    //判断用户名是否存在
     if(isParamExists($user_dir,$name,'user') == true){
       	$msg = "当前用户已注册，请直接登录！";
       	$jumpUrl = "login.php";
       	$waitSecond = 3;
       	include('tips.php');
       	exit;
     }

     //判断是否存在相同用户名的文件
     if(file_exists($user_dir.'/'.$name.'.txt')){
       	$msg = "已存在相同用户名的文件，请重新输入";
       	$jumpUrl = "login.php";
       	$waitSecond = 3;
       	include('tips.php');
       	exit;
     }

    	//将注册信息写入文件
      $handle = fopen($user_dir."/".$name.'.txt','a'); //以写模式，文件不存在自动创建
      $str = '';
      $str .= getUserId($user_dir)."\r\n";
      $str .= $name."\r\n";
      $str .= $pass."\r\n";
      $str .= $phone."\r\n";
      $str .= $email."\r\n";
      $str .= time(); //注册时间
     
      $res = fwrite($handle, $str); //返回写入的字符数
      fclose($handle);

      if($res>0){ //判断是否写入成功
      	$msg = "注册成功，请登录！";
       	$jumpUrl = "login.php";
       	$waitSecond = 3;
       	include('tips.php');
       	exit;
      }else{
      	unlink($user_dir."/".$name.'.txt');  //操作失败则删除创建的垃圾文件
      	$msg = "操作失败，请重新注册！";
       	$jumpUrl = "login.php";
       	$waitSecond = 3;
       	include('tips.php');
       	exit;
      }










