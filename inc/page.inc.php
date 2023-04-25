<?php 
/*
調用：$page=page(100,10,9);
返回值：array('limit','html')
 參數說明：
$count：總記錄數
$page_size：每頁顯示的記錄數
$num_btn：要展示的頁碼按鈕數目
$page：分頁的get參數
*/
function page($count,$page_size,$num_btn=10,$page='page'){
	if(!isset($_GET[$page]) || !is_numeric($_GET[$page]) || $_GET[$page]<1){
		$_GET[$page]=1;
	}
	if($count==0){//如果沒有記錄則直接返回空的字符串
		$data=array(
				'limit'=>'',
				'html'=>''
		);
		return $data;
	}
	//總頁數
	$page_num_all=ceil($count/$page_size);
	if($_GET[$page]>$page_num_all){
		$_GET[$page]=$page_num_all;
	}
	$start=($_GET[$page]-1)*$page_size;
	$limit="limit {$start},{$page_size}";

	$current_url=$_SERVER['REQUEST_URI'];//獲取當前url地址
	$arr_current=parse_url($current_url);//將當前url拆分到數組裡面
	$current_path=$arr_current['path'];//將文件路徑部分保存起來
	$url='';
	if(isset($arr_current['query'])){
		parse_str($arr_current['query'],$arr_query);
		unset($arr_query[$page]);
		if(empty($arr_query)){
			$url="{$current_path}?{$page}=";
		}else{
			$other=http_build_query($arr_query);
			$url="{$current_path}?{$other}&{$page}=";
		}
	}else{
		$url="{$current_path}?{$page}=";
	}
	$html=array();
	if($num_btn>=$page_num_all){
		//把所有的頁碼按鈕全部顯示
		for($i=1;$i<=$page_num_all;$i++){//這邊的$page_num_all是限制循環次數以控制顯示按鈕數目的變量,$i是記錄頁碼號
			if($_GET[$page]==$i){
				$html[$i]="<span>{$i}</span>";
			}else{
				$html[$i]="<a href='{$url}{$i}'>{$i}</a>";
			}
		}
	}else{
		$num_left=floor(($num_btn-1)/2);
		$start=$_GET[$page]-$num_left;
		$end=$start+($num_btn-1);
		if($start<1){
			$start=1;
		}
		if($end>$page_num_all){
			$start=$page_num_all-($num_btn-1);
		}
		for($i=0;$i<$num_btn;$i++){
			if($_GET[$page]==$start){
				$html[$start]="<span>{$start}</span>";
			}else{
				$html[$start]="<a href='{$url}{$start}'>{$start}</a>";
			}
			$start++;
		}
		//如果按鈕數目大於等於3的時候做省略號效果
		if(count($html)>=3){
			reset($html);
			$key_first=key($html);
			end($html);
			$key_end=key($html);
			if($key_first!=1){
				array_shift($html);
				array_unshift($html,"<a href='{$url}=1'>1...</a>");
			}
			if($key_end!=$page_num_all){
				array_pop($html);
				array_push($html,"<a href='{$url}={$page_num_all}'>...{$page_num_all}</a>");
			}
		}
	}
	if($_GET[$page]!=1){
		$prev=$_GET[$page]-1;
		array_unshift($html,"<a href='{$url}{$prev}'>« 上一頁</a>");
	}
	if($_GET[$page]!=$page_num_all){
		$next=$_GET[$page]+1;
		array_push($html,"<a href='{$url}{$next}'>下一頁 »</a>");
	}
	$html=implode(' ',$html);
	$data=array(
			'limit'=>$limit,
			'html'=>$html
	);
	return $data;
}
?>