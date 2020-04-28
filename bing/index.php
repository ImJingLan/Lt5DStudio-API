<?php
function b() {
    $ago = '0';
	$data = json_decode(file_get_contents('https://cn.bing.com/HPImageArchive.aspx?format=js&idx=$ago&n=1'), true); // 从 Bing 获取日图 JSON
    	return "https://cn.bing.com".$data['images'][0]['url']; // 返回 URL
};
$url = b(); 
header("Location:$url"); // 302 跳转
?>