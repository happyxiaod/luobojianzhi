<?php if (!defined('THINK_PATH')) exit();?>    <style>
        .btn_feed_submit {
    cursor: pointer;
    padding: 1px 30px;
     margin-top: 80px;
    border-radius: 5px;
    background-color: #ed7312;
    color: #fff;
    font-size: 16px;
}
    </style>

    <div id="person">
        <!-- 个人中心start -->
        <!-- <div class="per_t">
            <div class="per_nav">
                <a href="">首页</a> > <a href="">个人管理中心</a>
            </div>
            <div class="per_dal">
                <img src="images/review.jpg" alt="" width="130" height="130" />
                <div>
                    <span>马云</span>
                    <p>山东大学（威海）</p>
                    <a href="">修改头像</a>
                </div>
            </div>
        </div> -->
        <div class="per_b clearfix">
            <?php if($_SESSION['user']['type']== 'seeker'): ?><ul class="per_nav">
                <li id="pageResume"><a href="/index.php/Home/User/pageResume">我的简历</a></li>
                <li id="pageUserApply"><a href="/index.php/Home/User/pageUserApply">我的申请</a></li>
                <li id="pageWallet"><a href="/index.php/Home/User/pageWallet">我的钱包</a></li>
                <li id="pageMyloan"><a href="/index.php/Home/User/pageMyloan1">我的借款</a></li>
                <li id="pageBill"><a href="/index.php/Home/User/pageBill">我的账单</a></li>
                <li id="Authentication"><a href="/index.php/Home/User/pageAuthentication">信用认证</a></li>
                <li id="pageCollect"><a href="/index.php/Home/User/pageCollect">我的收藏</a></li>
                <!-- <li><a href="/index.php/Home/User/pageMsg">消息</a></li> -->
                <li id="pageSafety"><a href="/index.php/Home/User/pageSafety">安全中心</a></li>
                <li id="pageFeedback"><a href="/index.php/Home/Feed/pageFeedback">意见反馈</a></li>
            </ul>
 
<?php elseif($_SESSION['user']['type']== 'company'): ?>
    <ul class="per_nav">
                <li id="pageManage"><a href="/index.php/Home/Company/pageManage">管理中心</a></li>
                <li id="pagePost"><a href="/index.php/Home/Company/pagePost">职位管理</a></li>
                <li id="pageCompanyApply"><a href="/index.php/Home/Company/pageCompanyApply">简历管理</a></li>
                <li id="pageProve"><a href="/index.php/Home/Company/pageProve">企业信息</a></li>
                <li id="pageSafety"><a href="/index.php/Home/User/pageSafety">安全中心</a></li>
                <li id="pageFeedback"><a href="/index.php/Home/Feed/pageFeedback">意见反馈</a></li>
    </ul>
<?php elseif($_SESSION['user']['type']== 'school'): ?>
    <ul class="per_nav">
                <li id="pagePost"> <a href="/index.php/Home/Company/pagePost">我的发布</a></li>
                <li id="pageCompanyApply" ><a href="/index.php/Home/Company/pageCompanyApply">工作申请</a></li>
                <li id="pageProve" ><a href="/index.php/Home/Company/pageProve">认证信息</a></li>
                <li id="pageFeedback"><a href="">我的钱包</a></li>
                <li><a href="">我的借款</a></li>
                <li><a href="">我的账单</a></li>
                <li><a href="">信用认证</a></li>
                <li id="pageSafety"><a href="/index.php/Home/User/pageSafety">安全中心</a></li>
                <li id="pageFeedback"><a href="/index.php/Home/Feed/pageFeedback">意见反馈</a></li>
    </ul><?php endif; ?>
            <div class="per_r_dal">             
                <h4 class="font-orange">我的借款</h4>
                <div class="sucess">
                    <!-- <span style="margin-top:20px;">我要借款</span> -->
                    <div class="sucess_dal" style="width:280px;">
                        <div><span>订单号</span>234467</div>
                        <div><span>资金用途</span>旅游</div>
                        <div><span>借款</span><b>2000.00</b></div>
                        <div><span>分期月数</span>6个月</div>
                        <div><span>每月应还</span><b>2110.00</b></div>
                         <a href="/index.php/Home/User/contMyloan1" class="btn_feed_submit" style="width: 50px float:left;">下一步</a>
                    </div>

                </div>
             

            </div>
        </div>
        <!-- 个人中心end -->
    </div>