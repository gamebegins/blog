
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8" />
	<meta charset="utf-8" />
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<title><?=$title;?></title>
	<script type="text/javascript" src="public/js/jquery-1.11.1.min.js"></script>

	<!-- ~~~~~~ icon图标 ~~~~~~ -->
	<link rel="shortcut icon" href="public/images/favicon.ico" />

	<!-- ~~~~~~ CSS 合并文件 ~~~~~~ -->
	<link rel="stylesheet" href="public/css/all_css.css" />
	
	<!-- ~~~~~~ 登陆注册 ~~~~~~ -->
	<link href="public/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<script src="public/js/jquery.min1.js"></script>
	<script src="public/js/login1.js"></script>
		
		<link type="text/css" rel="stylesheet" href="public/css/jquery.mmenu.all.css" />
		<!-- <script type="text/javascript" src="public/js/jquery.mmenu.js"></script> -->
			<script type="text/javascript">
				$(function() {
					$('#btn12').click(function(){
				 		var phone=$('#dx12').val();
				 		data={
				 			'phone':phone
				 		};
				 		$.post('index.php?m=user&a=duanxi',data,function(){
				 			
				 		})
				 	//alert(1);	
				 	})
				});
				//<!--  验证码  -->
				 window.onload = function () {
					var oBtn = document.getElementById('btn123');
					var oImg = document.getElementById('img123');
					oBtn.onclick = function ()
					{
						oImg.src='index.php?m=user&a=yzm';
					}
				}
		    </script> 

	


	<!-- JavaScript files start -->
	<!-- <script type="text/javascript" src="public/js/jquery.min.js"></script> -->
	<!-- JavaScript files end -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
	<div class="wrapper">

	


	<!-- 顶部header -->
<div id="header-wrapper">			
	<div id="header-bottom">
		<div class="header-bottom-wrapper">
			<div class="four columns omega">					
				<!-- logo / tagline-->
				<div class="two-thirds column">
					<div class="logo-slogan">
						<div class="logo"><a href="index.html">
						<img src="
						<?php if(!empty($data1[0]['picture']))
							{echo $data1[0]['picture'];}
							else{echo 'public/images/wenzhang.png';} ;?>" alt="" /></a></div>
					</div>
					<div class="tagline">
						
						<?php if(!empty($data1)): ?>
						<?=$data1[0]['xtitle'];?>
						<?php else : ?>
						下一秒，我不知道。
						<?php endif;?>
					</div>
				</div>
			</div>
			<div class="ninehalf columns alpha" id="main-menu-wrapper">
				<ul id="main-menu">
					<li><a href="index.php?m=index&a=index">首页</a></li>
					
					<li>
						<a class="active" href="index.php?m=details&a=details">文章</a>
					</li>
					<li>
						<a  href="index.php?m=moodlist&a=moodlist">说说</a>
						<ul>
							<li>吐槽</li>								
						</ul>

					</li>
					

					<?php if(!empty($_SESSION['username'])): ?>
					<li><a  href="index.php?m=message&a=message">留言</a>
						<ul>
							<li>沉默</li>								
						</ul>
					</li>

					<li>
						<a href="index.php?m=user&a=geren"><?=$_SESSION['username'];?></a>
						<ul>
							<li>完美</li>		
						</ul>							
					</li>

					<?php if($_SESSION['username'] == 'admin'): ?>
						<li>
							<a href="index.php?m=index&a=admin">后台管理</a>
							<ul>
								<li>完美</li>		
							</ul>							
						</li>
					<?php endif;?>

					<li>
						<a href="index.php?m=user&a=tuichu">退出</a>
						<ul>
							<li>完美</li>
						</ul>							
					</li>

					<?php else : ?>

					<li id="loginContainer"><a class="login" id="loginButton" href="#"><span>登录</span></a>
								 <div class="clear"> </div>
									<div id="loginBox">                
										<form id="loginForm" action="index.php?m=user&a=doLogin" method="post">
											<fieldset id="body">
												<fieldset>
													<label for="email">Username</label>
													<input type="text" name="username" id="email" required="required" />
												</fieldset>
												<fieldset>
													<label for="password">Password</label>
													<input type="password" name="password" id="password" />
												</fieldset>
												
												<input type="submit" id="login" value="login" required="required" />
											</fieldset>
											<span><a href="#">Forgot your password?</a></span>
										</form>
									</div>
								<!-- Login Ends Here -->
							</li>

					<li id="loginContainer"><a class="signup" id="signupButton" href="#"><span>注册</span></a>
								 <div class="clear"> </div>
									<div id="signupBox">                
										<form id="signupForm"  action="index.php?m=user&a=doRegister" method="post">
											<fieldset id="signupbody">
												<fieldset>
													<label for="email">Username <span>*</span></label>
													<input type="text" name="username" id="signupemail" placeholder="用户名长度为3~12位" required="required" />
												</fieldset>
												<fieldset>
													<label for="password">Choose Password <span>*</span></label>
													<input type="password" name="password" id="signuppassword" placeholder="请出入密码" required="required"/>
												</fieldset>
												 <fieldset>
													<label for="password">Confirm Password <span>*</span></label>
													<input type="password" name="rpwd" id="signuppassword1" placeholder="确认密码" required="required" />
												</fieldset>
												<fieldset>
													<label for="password">邮箱 <span>*</span></label>
													<input type="text" name="Email" id="signuppassword1" placeholder="如：110@qq.com" required="required" />
												</fieldset>
												<fieldset>
													<label for="password">验证码 <span>*</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="padding: 0px;float: right;" for="password" href="#" id="btn123">换一张</a></label>
													<img style="width: 100px;height: 30px;float: right;" src="index.php?m=user&a=yzm" id="img123" onclick="this.src='index.php?m=user&a=yzm'"/>
													<input style="width: 100px;height: 10px;" type="text" name="yzm" id="signuppassword1" placeholder="输入验证码" required="required"  />
													
												</fieldset>
												<fieldset>
													<label for="password">手机验证 <span>*</span>
													<a style="padding: 0px;float: right;" href="javascript:;" id="btn12">点击此处发送短信</a></label>
													<input type="text" name="phone" id="dx12"  placeholder="输入手机号" required="required" />
												</fieldset>
												<fieldset>
													<label for="password">手机验证码 <span>*</span></label>
													<input type="text" name="duanxin" id="signuppassword1"  placeholder="手机验证码" required="required" />
												</fieldset>
												<input type="submit" id="signup" value="Register Now!" />
											</fieldset>
										</form>
									</div>
								<!-- Login Ends Here -->
							</li>
						<?php endif;?>


					<!-- <li class="newsite"><a class="newsite" href="http://www.htmlsucai.com" target="_blank">退出</a>
						<ul>
							<li>商业</li>
						</ul>
					</li> -->
				</ul>
			</div>
		</div>					
	</div>		
</div>
<!-- end 顶部header -->
	<!-- 设置一个好的消息提示样式 -->
		
<!--内容 content-wrappe -->

<div id="content-wrapper">
	<div class="container">

		<!-- crumbs -->
		<div class="whole-width crumbs">

		</div>
	</div>

	<!-- title -->
	<div class="title">
		<div class="left-arr"></div>
		<div class="right-arr"></div>
		<div class="container">
			<div class="columns ten alpha title-inner">
				<h1>最新文章</h1>
				<p>好记性不如烂笔头。记录点滴，方便你我。 </p>
			</div>
			<div class="columns six omega">
				<div class="filtr-block">
					<div class="filtr-text-general">位置：</div>
					<div class="filtr-categories" id="filter-cats">
						<div class="filtr-categories-container" id="filter-cats-cont">
							<a href="http://www.htmlsucai.com" ><span>首页</span></a>
							<a href="http://www.htmlsucai.com" class="active"><span>文章列表</span></a> 
						</div>
					</div>
					<a href="#filter-cats" id="filtr-ico">Hide/Show Filtr</a>
				</div>
			</div>
			<div class="clear"><!-- clear floats --></div>
			<div class="clear"></div>
		</div>
	</div>
	<!-- /title -->




	<div class="container">
		<?php if(!empty($cid)): ?>
		<div class="separator35"><span><a style="width: 66px;height: 20px;display: block;background: rgba(197, 179, 179, 0.78);text-align: center;margin-left: 638px;" href="index.php?m=details&a=fabiaowz&classid=<?=$cid;?>&classname=<?=$classname;?>">发文章</a></span></div>
		<?php endif;?>

		<!-- Left Part -->
		<div class="columns twelve">
				<?php if(empty($data)): ?>
				这里面什么也没有，去看看其他页吧。
				<?php else : ?>
				<?php foreach($data as $keys => $val) :?>

				<!-- Blog Item -->
				<div class="post-entry">
					<div class="post-info">
						<div class="post-image"><a href="index.php?m=details&a=view&id=<?=$val['id'];?>&cid=<?=$val['classid'];?>"><img src="<?=$val['pic'];?>" alt="" /> </a><span class="over-bg-portfolio"></span></div>				
					</div>
					<div class="post-body">
						<div class="post-details">
							<h3><a href="index.php?m=details&a=view&id=<?=$val['id'];?>&cid=<?=$val['classid'];?>"><?=$val['title'];?></a></h3>
							<span class="post-autor">[<?=$val['username'];?>]</span>
							<span class="post-tags"><?=$val['addtime'];?></span>
							<span class="post-views"><?=$val['liulan'];?>次</span>
						</div>
						<p style="width: 100%;max-height: 231px; overflow: hidden;text-overflow: ellipsis;word-break: break-all;white-space: nowrap;"><?=strip_tags($val['content'])?></p>
						<a href="index.php?m=details&a=view&id=<?=$val['id'];?>&cid=<?=$val['classid'];?>" class="read-more">查看详细</a>
					</div>
				</div>
				<!-- /Blog Item -->

				<?php endforeach;?>
				
				
					<?php endif;?>	
			<div class="separator9"></div>	
			<div class="pager"> 
				<!-- 分页操作 -->
				     <span><a href="<?=$url['first'];?>">首 页</a></span>
				     <span class="prev"><a href="<?=$url['prev'];?>" rel="prev">上一页</a></span>
				     <span class="active"><a><?=$url['page'];?></a></span>
				     <span class="next"><a href="<?=$url['next'];?>" rel="next">下一页</a></span>
				     <span><a href="<?=$url['last'];?>" rel="last">末 页</a></span>
				      共<b> <?=$url['count'];?> </b>页 &nbsp;&nbsp;
				      每页显示<b><?=$num;?></b>条 &nbsp;&nbsp;
				      总共<b> <?=$total;?> </b>条数据 
			</div>
				
			<div class="separator29"></div>	
		</div>
		<!-- Left Part -->


		<!-- Right Part -->
		<div class="columns four blog-aside">
			
			<div class="" id="dhmenu">
				<form action="index.php?m=details&a=sousuo" method="post" class="search_block" />
					<input name="sousuo" type="text" placeholder="搜索" />
					<input type="submit" value="" />
				</form>


			<h3 class="sidebar-titles">栏目导航</h3>
			<ul class="list_type7 categories-list">
				<li><a href="index.php?m=details&a=details">全部</a></li>
				<?php foreach($data2 as $keys => $val) :?>
				<li><a href="index.php?m=details&a=details&cid=<?=$val['cid'];?>&classname=<?=$val['classname'];?>"><?=$val['classname'];?></a></li>
				<?php endforeach;?>
				<li><a href="index.php?m=details&a=details&cid=我的收藏&classname=我的收藏">我的收藏</a></li>
				<li><a href="index.php?m=details&a=details&cid=我的关注&classname=我的关注">我的关注</a></li>
			</ul>




		</div>
		<div class="dbl-dott-wrapper"></div>
		<div class="separator11"></div>

		


	

	

</div> 
<!-- /Right Part -->


<div class="clear"></div>
</div>
</div>
<!-- end content -->

<script type="text/javascript">
	$(document).ready(function(){
		var l = true;
		var top = $("#dhmenu").offset().top;
		function doFix()
		{              
			var scrolla=$(window).scrollTop();
			var dis=parseInt(top)-parseInt( scrolla);
			if(l && dis<=90)
			{        
			console.log(dis);        
				$("#dhmenu").removeClass().addClass("fixed_top_right");
				l=false;
			}
			if(!l && dis>90)
			{
				$("#dhmenu").removeClass("fixed_top_right");
				l=true;
			}
		}
		$(window).scroll(doFix);
	});
</script>
		<!-- FOOTER -->
<div id="footer-wrapper">
	<!-- top part [tweeter] -->
	<div id="footer-top">
		<div class="footer-tweet-left"></div>
		<div class="footer-tweet-right"></div>

		<div class="container">

		</div>
	</div>

	<!-- bottom part  -->
	<div id="footer-bottom">
		<div id="footer-bottom-arr"></div>
		<div class="container">
			<!-- copyrights -->
			<div class="column copyrights">
				<p>&copy; Copyright &copy; 2013.Company name All rights reserved.</p>
			</div>
			<!-- menu -->
			<div class="column">
				<ul id="footer-menu">
					<li><a href="http://www.htmlsucai.com">首页</a></li>
					<li><a href="http://www.htmlsucai.com">瑞班克</a></li>
					<li><a href="http://www.htmlsucai.com">文章</a></li>
					<li><a href="http://www.htmlsucai.com">说说</a></li>
					<li><a href="http://www.htmlsucai.com">留言</a></li>
					<li><!-- to top -->
						<a href="#top" class="backtop" title="Page Up"><!-- Upper --></a>
					</li>
				</ul>

			</div>

		</div>
	</div>
</div>
<!-- end footer -->		<!-- End Document -->
	</div>
</body>
</html>
