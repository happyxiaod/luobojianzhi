<?php if (!defined('THINK_PATH')) exit();?><!-- 右边具体内容 -->
<div class="col-md-6" style="margin-top: 10px">
    <div class="panel panel-default">
        <div class="panel-heading">
            宽:900-960px,高:200-240px,图片最大为2M,推荐：940*220
        </div>
        <div class="panel-body">
            <form class="" action="/index.php/Manage/Setting/addScroll" enctype="multipart/form-data" method="post">
                <div class="form-group">
                    顺序：<input class="form-control" type="number" name="order" value="0"/>
                </div>
                <div class="form-group">
                    链接：<input class="form-control" type="text" name="link"/>
                </div>
                <div class="form-group">
                    选择图片：<input type="file" name="img"/>
                </div>
                <div class="form-group">
                    <input class="btn btn-active" type="submit" value="提交"/>
                </div>

            </form>
        </div>

    </div>
</div>