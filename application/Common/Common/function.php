<?php
//截取标题
function truncate($title,$num)
{
	$len = mb_strlen($title,"utf-8");
	if($len > $num)
	{
		$title = mb_substr($title,0,$num-1,"utf-8")."...";
	}
	return $title;
}
