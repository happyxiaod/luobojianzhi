<?php if (!defined('THINK_PATH')) exit();?><br/>
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            添加一级分类，如：家教、餐饮、软件开发等
        </div>
        <div class="panel-body form-inline">
            <div class="form-group" gt-model="level1">
                <input type="hidden" gt-islabel="类别"/>
                <input class="form-control" type="text" gt-isparam="name"/>
                <button class="btn btn-active" gt-btn-click="addlevel1">添加</button>
            </div>
        </div>
    </div>
</div>
<script>
    $("[gt-btn-click='addlevel1']").on('click', '', function (event) {
        event.preventDefault();
        var level1 = M('level1');
        console.log(level1);
        post(CON_PATH + "/addlevel1",level1);

    });
</script>