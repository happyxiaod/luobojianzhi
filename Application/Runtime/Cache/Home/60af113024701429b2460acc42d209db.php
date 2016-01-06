<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>关于我们</title>
	<link rel="stylesheet" href="/Public/new/css/base.css" />
	<link rel="stylesheet" href="/Public/new/css/user.css" />
</head>
<body>
	<!-- 头start -->
	<div id="header">
		<div class="top-line"></div>
		<div class="container">
			<div class="ablock ablock1">
				<h1><a href="/index.php/Home/Index"></a></h1>
				<div class="chose-city">
                    <span><?php echo ($nowCity); ?></span>
                    <a href="/index.php/Home/Index/pageSwopCity" class="change-city" style="color:#808080">切换城市</a>
                </div>
				<ul class="nav">
					<li class="<?php echo $index?'current':'';?>"><a href="/index.php/Home">首页</a></li>
					<li class="<?php echo $jobsList?'current':'';?>"><a href="/index.php/Home/Jobs/pageJobsLists">兼职</a></li>
					<li class="<?php echo $taitor?'current':'';?>"><a href="/index.php/Home/Jobs/pageTailor">量身定制</a></li>
					<li class="<?php echo $startLoan?'current':'';?>"><a href="/index.php/Home/Loan/startLoan">我要借贷</a></li>
					<li class="<?php echo $practice?'current':'';?>"><a href="/index.php/Home/Jobs/pagePractice">实习</a></li>
					<li class="<?php echo $serve?'current':'';?>"><a href="/index.php/Home/Jobs/pageServe">服务</a></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- 头end -->

	<div id="person">
		<!-- 个人中心start -->
		<div class="per_t">
			<div class="per_dal">
				<img src="/Public/new/images/review.jpg" alt="威海捷城信息科技有限公司" width="130" height="130" />
				<div>
					<span>威海捷城信息科技有限公司</span>
					<p>IT行业</p>
					<!-- <a href="">修改头像</a> -->
					<p>有很多人是用青春的幸福作成功代价的。</p>
				</div>
			</div>
		</div> 
	</div>
	
	<div class="about">
		<div class="company_dal">
			<h3>公司简介</h3>
			<p>
				威海捷城信息科技有限公司成立于2013年12月份，位于山东大学（威海）大学生创业孵化园。捷城取“便捷城市”之意，公司主旨为利用互联网技术给城市提供便捷，相应国家“智慧城市”的号召。
			</p>
		</div>
		<div>
			<h3>旗下项目</h3>
			<ul>
				<li>
					<img src="/Public/new/images/about_inso1.png" alt="萝卜兼职" />
					<div>
						<span>萝卜兼职</span>
						<p>最靠谱的大学生兼职服务平台</p>
					</div>
				</li>
				<li>
					<img src="/Public/new/images/about_inso2.jpg" alt="萝卜兼职" />
					<div>
						<span>萝卜兼职</span>
						<p>最靠谱的大学生兼职服务平台</p>
					</div>
				</li>
				<li>
					<img src="/Public/new/images/about_inso3.jpg" alt="萝卜兼职" />
					<div>
						<span>萝卜兼职</span>
						<p>最靠谱的大学生兼职服务平台</p>
					</div>
				</li>
			</ul>
		</div>
		<div class="company_yw">
			<h3>公司业务范围</h3>
			<ul>
				<li>
					<img src="/Public/new/images/about_yw1.jpg" alt="app开发" />
					<span>App开发</span>
				</li>
				<li>
					<img src="/Public/new/images/about_yw2.jpg" alt="微信公众平台开发" />
					<span>微信公众平台开发</span>
				</li>
				<li>
					<img src="/Public/new/images/about_yw3.jpg" alt="网站建设" />
					<span>网站建设</span>
				</li>
				<li>
					<img src="/Public/new/images/about_yw4.jpg" alt="广告设计制作" />
					<span>广告设计制作</span>
				</li>
			</ul>
		</div>
		<div class="com_about">
			<img src="/Public/new/images/luobo.jpg" alt="萝卜兼职" />
			<h3>萝卜兼职简介</h3>
			<p>萝卜兼职”致力于最靠谱的大学生兼职平台，每个职位、每位大学生都经过严格审核，保证兼职的可靠性。“萝卜兼职”智能分析系统，保障大学生与企业之间的人岗匹配，为合适的岗位找到合适的人，真正体现“一个萝卜一个坑”的理念。</p>
			<h3>萝卜兼职目标</h3>
			<p>打造一款最靠谱的大学生兼职服务平台</p>			
			<ul>
				<li>
					<img src="/Public/new/images/radish1.png" alt="我们的任务" />
					<span>我们的任务</span>
					<span>对完美产品的执着</span>
				</li>
				<li>
					<img src="/Public/new/images/radish2.png" alt="我们的坚持" />
					<span>我们的坚持</span>
					<span>诚信、安全、区域</span>
				</li>
				<li>
					<img src="/Public/new/images/radish3.png" alt="我们的团队" />
					<span>我们的团队</span>
					<span>优秀、勤劳、活力</span>
				</li>
				<li>
					<img src="/Public/new/images/radish4.png" alt="我们的任务" />
					<span>我们的任务</span>
					<span>诚信、安全、区域</span>
				</li>
			</ul>
		</div>
	</div>


	<!-- 尾部start -->
	<div id="footer">
		<div class="footer">
			
    <div id="footer">
        <div class="footer">
            <dl>
                <dt>关于我们</dt>
                <dd><a href="/index.php/Home/Article/aboutUs">关于捷城</a></dd>
                <dd><a href="/index.php/Home/Article/index?nav=AboutRadish">萝卜兼职</a></dd>
                <dd><a href="/index.php/Home/Feed/pageFeedback">在线反馈</a></dd>
            </dl>
            <div class="line"></div>
            <dl>
                <dt>帮助中心</dt>
                <dd><a href="/index.php/Home/Article/index?nav=Question">常见问题</a></dd>
                <dd><a href="/index.php/Home/Article/index?nav=Service">企业服务</a></dd>
                <dd><a href="/index.php/Home/Article/index?nav=Contact">联系我们</a></dd>
            </dl>
            <div class="line"></div>
            <dl>
                <dt>关注我们</dt>
                <dd><a href="">官方微信</a></dd>
                <dd><a href="http://weibo.com/luobojianzhi">新浪微博</a></dd>
                <dd><a href="">腾讯微博</a></dd>
            </dl>
            <div class="line"></div>
            <dl>
                <dt>400-886-3334</dt>
                <dd><a href="/index.php/Home/Article/index?nav=Contact">联系我们</a></dd>
            </dl>
        </div>
    </div>

		</div>
	</div>
	<!-- 尾部end -->
	
</body>
</html>