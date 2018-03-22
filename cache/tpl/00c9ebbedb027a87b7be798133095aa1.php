<!DOCTYPE HTML>
<html>
<head>
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
					<li><a class="active" href="index.php?m=index&a=index">首页</a></li>
					
					<li>
						<a  href="index.php?m=details&a=details">文章</a>
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


<div style="display:none"><script src='http//v7.cnzz.com/stat.php?id=155540&web_id=155540' language='JavaScript' charset='gb2312'></script></div>
<!-- end 顶部header -->
	<!-- 设置一个好的消息提示样式 -->
		
<!-- 设置精品域名框 -->

<script type="text/javascript" src="public/js/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="public/css/domain.css" />
<div id="domainbody">
	<div class="cs_close"><a href="javascript:;" onClick="$('#domainbody').fadeOut()"><span>关闭</span></a></div>	
	<div style="    text-align: center;font-size: 17px;">看下面菜鸡网站</div>
	<div class="cs_spr"></div>
	<div class="cs_online_ct">
		<div class="cs_online_domain"><h4>yybbl.com(50000)</h4></div>
		<div class="cs_online_domain"><h4>147P.com（2800）</h4></div>
		<div class="cs_online_domain"><h4>biesb.com（1000）</h4></div>
	</div>
	<div class="cs_spr"></div>
</div>
<!--内容 content-wrappe -->

<div id="content-wrapper">
	<div class="container">

		<!-- slider 首页封面 -->
		<div id="slider">
			<img src="http://www.isrbk.com/images/slider_940-300.png" alt=""  style="height:300px;width:940px;" />
			<div class="slider-text">
				<?php if(!empty($data1)): ?>
				<h3><a href="#">态度决定一切</a></h3>
				<p><?=$data1[0]['neirong'];?></p>
				<?php else : ?>
				<h3><a href="#">态度决定一切</a></h3>
				<p>有什么样的态度就会有什么样的人生,成败的关键不在于拥有什么样的出身,拥有多高的智慧,而在于我们做事的态度.</p>
				<?php endif;?>

				
			</div>
		</div>

		<div class="logo f_l" style="margin-top:-30px;margin-left:10px;"><iframe allowtransparency="true" frameborder="0" width="385" height="96" scrolling="no" src="//tianqi.2345.com/plugin/widget/index.htm?s=1&z=1&t=0&v=0&d=3&bd=0&k=&f=&ltf=009944&htf=cc0000&q=1&e=1&a=1&c=54511&w=385&h=96&align=center"></iframe></div>

		<!-- page-slogan 首页封面-->
		
		<!-- Recent Projects  最新案例-->
		<div class="full-width sub-title">
			<h3>最新案例</h3>
			<div id="recent-navi"></div>
		</div>
		<div class="separator2"></div>
		<div class="recent-box">
			<div class="list_recent_over">
				<ul class="list_recent" style="text-align: content;">
					<?php foreach($data4 as $ksys => $val) :?>
					<li>
						<div class="rec_img"><a href="index.php?m=details&a=view&id=<?=$val['id'];?>&cid=<?=$val['classid'];?>"> <img src="<?=$val['pic'];?>" alt="" /> </a></div>
						<h5><a href="index.php?m=details&a=view&id=<?=$val['id'];?>&cid=<?=$val['classid'];?>"><?=$val['title'];?></a></h5>
					</li>
					<?php endforeach;?>
				</ul>
		</div>
	</div>
	<!-- end Recent Projects -->
</div>

<!-- title -->
<div class="title">
	<div class="left-arr"></div>
	<div class="right-arr"></div>
	<div class="container">
		<div class="columns ten alpha title-inner">
			<h1>热门文章</h1>
			<p>好记性不如烂笔头。记录点滴，方便你我。 </p>
		</div>
		<div class="columns six omega icons">
			<a href="http://www.htmlsucai.com" class="ico-home"><span>Home</span></a><a  target="_blank" href="http://www.htmlsucai.com"  class="ico-contact" alt="给瑞班克发邮件" title="给瑞班克发邮件"><span>Contact</span></a><a target="_blank" href="http://www.htmlsucai.com" class="ico-sitemap" alt="与瑞班克聊天" title="与瑞班克聊天"><span>Sitemap</span></a>
		</div>
		<div class="clear"></div>
	</div>
</div>
<!-- /title -->

<div class="container">
	<div class="separator35"></div>

	<!-- Left Part -->
	<div class="columns twelve">
		
		<!-- Blog Item -->
		<?php foreach($data3 as $keys => $val) :?>
		<div class="post-entry">					
			<div class="post-info">
				<div class="post-image"><a href="index.php?m=details&a=view&id=<?=$val['id'];?>&cid=<?=$val['classid'];?>"><img src="<?=$val['pic'];?>" alt="" /></a> <span class="over-bg-portfolio"></span></div>				
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
		<?php endforeach;?>
		<!-- /Blog Item -->

		
		

				
		<div class="separator9"></div>		
	</div>
	<!-- Left Part -->


	<!-- Right Part -->
	<div class="columns four blog-aside">
				<form action="index.php?m=details&a=sousuo" method="post" class="search_block" />
					<input name="sousuo" type="text" placeholder="搜索" />
					<input type="submit" value="" />
				</form>


<!-- 栏目导航 -->
	<h3 class="sidebar-titles">栏目导航</h3>
	<ul class="list_type7 categories-list">
		<li><a href="index.php?m=details&a=details">全部</a></li>
		<?php foreach($data2 as $keys => $val) :?>
		<li><a href="index.php?m=details&a=details&cid=<?=$val['cid'];?>&classname=<?=$val['classname'];?>"><?=$val['classname'];?></a></li>
		<?php endforeach;?>
		<li><a href="index.php?m=details&a=details&cid=我的收藏&classname=我的收藏">我的收藏</a></li>
		<li><a href="index.php?m=details&a=details&cid=我的关注&classname=我的关注">我的关注</a></li>
	</ul>
<!-- 栏目导航结束 -->


	<div class="dbl-dott-wrapper"></div>
	<div class="separator11"></div>




</div> 
<!-- /Right Part -->


<div class="clear"></div>
</div>
</div>
<!-- end content -->

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

			<div class="cnzz column" style="display:none;">
				<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1254447027'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/z_stat.php%3Fid%3D1254447027%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
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
