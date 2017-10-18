<?php

//公共函数文件


	/*
	* 判断当前类型是否已存在(用户名 手机号 或者邮箱之类)
	* @param string $user_dir
	* @param string $paramer 
	* @param string $type
	*
	*/
	function isParamExists($user_dir, $paramer, $type){
		$dir_arr = scandir($user_dir);
		$is_exists = false;  //默认不存在
		foreach ($dir_arr as $key => $value) {  //$value=readdir($dir_handle);
			if($value == '.' || $value == '..'){  
				continue; 
			}
			$file = $user_dir.'/'.$value;
			$file_info = file($file); //索引数组，每一行一个元素
			if($type == 'user'){
				// var_dump($file);die;
				$exists_value = str_replace(PHP_EOL, "", $file_info[1]);  //用户名
			}elseif($type == 'phone'){
				$exists_value = str_replace(PHP_EOL, "", $file_info[3]);  //取手机号
			}elseif($type == 'email'){
				$exists_value = str_replace(PHP_EOL, "", $file_info[4]);  //去除换行符，取邮箱
			}
			if($exists_value == $paramer){
				$is_exists = true;  //判断用户名、手机号、或者邮箱是否存在,存在返回true
			}
		}
		
		return $is_exists;
	}


	// isParamExists('./data/user','tang','user');


	/*
	* 给用户分配id
	* @param string $user_dir 
	* @return int
	*/
	function getUserId($user_dir){
		$dir_arr = scandir($user_dir);
		$id = array();
		foreach ($dir_arr as $key => $value) {
			if($value == '.' || $value == '..'){
				continue;
			}
			$file = $user_dir.'/'.$value;
			$file_info = file($file);

			$id[] = str_replace(PHP_EOL,"",$file_info[0]);  //取的id
		}
		// var_dump($id);die;
		sort($id); //返回true或者false 给已存在的id排序
		$id = empty($id)?1:max($id)+1; //如果没有就默认为1 有就最大值加1
		return $id;
	}


// getUserId('./data/user');
	/*
	* 获取用户信息
	* @param string $name
	* @param string $dir
	* @return array
	*/
	function getUserInfo($name, $dir){
		if(!file_exists($dir.'/'.$name.'.txt')){
			return false;
			exit;
		}else{
			$arr = file($dir.'/'.$name.'.txt');
			foreach ($arr as $key => $value) {
				$data[] = str_replace(PHP_EOL,"",$value);
			}
		}
		return $data;

	}