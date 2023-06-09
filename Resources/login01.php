<?php 
include_once 'inc/config.inc.php';
include_once 'inc/mysql.inc.php';
include_once 'inc/tool.inc.php';
include_once 'inc/page.inc.php';
$link=connect();
$member_id=is_login($link);

if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
	skip('index.php', 'error', '父版塊id參數不合法!');
}
$query="select * from ntc_father_module where id={$_GET['id']}";
$result_father=execute($link, $query);
if(mysqli_num_rows($result_father)==0){
	skip('index.php', 'error', '父版塊不存在!');
}
$data_father=mysqli_fetch_assoc($result_father);

$query="select * from ntc_son_module where father_module_id={$_GET['id']}";
$result_son=execute($link,$query);
$id_son='';
$son_list='';
while($data_son=mysqli_fetch_assoc($result_son)){
	$id_son.=$data_son['id'].',';
	$son_list.="<a href='list_son.php?id={$data_son['id']}'>{$data_son['module_name']}</a> ";
}
$id_son=trim($id_son,',');
if($id_son==''){
	$id_son='-1';
}
$query="select count(*) from ntc_content where module_id in({$id_son})";
$count_all=num($link,$query);
$query="select count(*) from ntc_content where module_id in({$id_son}) and time>CURDATE()";
$count_today=num($link,$query);

$template['title']='父版塊列表頁';
$template['css']=array('style/public.css','style/list.css');
?>
<?php include 'inc/header.inc.php'?>
<div id="position" class="auto">
	 <a href="index.php">首頁</a> &gt; <?php echo $data_father['module_name']?>
</div>
<div id="main" class="auto">
	<div id="left">
		<div class="box_wrap">
			<h3><?php echo $data_father['module_name']?></h3>
			<div class="num">
			    今日：<span><?php echo $count_today?></span>&nbsp;&nbsp;&nbsp;
			    總貼文：<span><?php echo $count_all?></span>
			  <div class="moderator"> 子板塊：  <?php echo $son_list?></div>
			</div>
			<div class="pages_wrap">
				<a class="btn publish" href=""></a>
				<div class="pages">
					<?php 
					$page=page($count_all,1);
					echo $page['html'];
					?>
				</div>
				<div style="clear:both;"></div>
			</div>
		</div>
		<div style="clear:both;"></div>
		<ul class="postsList">
			<?php 
			$query="select 
				ntc_content.title,ntc_content.id,ntc_content.time,ntc_content.times,ntc_member.name,ntc_member.photo,ntc_son_module.module_name 
				from ntc_content,ntc_member,ntc_son_module where 
				ntc_content.module_id in({$id_son}) and 
				ntc_content.member_id=ntc_member.id and 
				ntc_content.module_id=ntc_son_module.id {$page['limit']}";
			$result_content=execute($link,$query);
			while($data_content=mysqli_fetch_assoc($result_content)){
			?>
			<li>
				<div class="smallPic">
					<a href="#">
						<img width="45" height="45"src="<?php if($data_content['photo']!=''){echo $data_content['photo'];}else{echo 'style/photo.jpg';}?>">
					</a>
				</div>
				<div class="subject">
					<div class="titleWrap"><a href="#">[<?php echo $data_content['module_name']?>]</a>&nbsp;&nbsp;<h2><a href="#"><?php echo $data_content['title']?></a></h2></div>
					<p>
						樓主：<?php echo $data_content['name']?>&nbsp;<?php echo $data_content['time']?>&nbsp;&nbsp;&nbsp;&nbsp;最后回复：2014-12-08
					</p>
				</div>
				<div class="count">
					<p>
						回覆<br /><span>41</span>
					</p>
					<p>
						瀏覽<br /><span><?php echo $data_content['times']?></span>
					</p>
				</div>
				<div style="clear:both;"></div>
			</li>
			<?php 
			}
			?>
		</ul>
		<div class="pages_wrap">
			<a class="btn publish" href=""></a>
			<div class="pages">
				<?php 
				echo $page['html'];
				?>
			</div>
			<div style="clear:both;"></div>
		</div>
	</div>
	<div id="right">
		<div class="classList">
			<div class="title">版塊列表</div>
			<ul class="listWrap">
				<?php 
				$query="select * from ntc_father_module";
				$result_father=execute($link, $query);
				while($data_father=mysqli_fetch_assoc($result_father)){
				?>
				<li>
					<h2><a href="list_father.php?id=<?php echo $data_father['id']?>"><?php echo $data_father['module_name']?></a></h2>
					<ul>
						<?php 
						$query="select * from ntc_son_module where father_module_id={$data_father['id']}";
						$result_son=execute($link, $query);
						while($data_son=mysqli_fetch_assoc($result_son)){
						?>
						<li><h3><a href="list_son.php?id=<?php echo $data_son['id']?>"><?php echo $data_son['module_name']?></a></h3></li>
						<?php 
						}
						?>
					</ul>
				</li>
				<?php 
				}
				?>
			</ul>
		</div>
	</div>
	<div style="clear:both;"></div>
</div>
<?php include 'inc/footer.inc.php'?>