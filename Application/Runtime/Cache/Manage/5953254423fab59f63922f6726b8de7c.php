<?php if (!defined('THINK_PATH')) exit();?><br/>
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            添加二级分类，如选择技术，添加JAVA/Android/C#等
        </div>
        <div class="panel-body form-inline">
            <div class="form-group" gt-model="level2">
                <select gt-isparam="fid" class="form-control">
                    <?php if(is_array($level1list)): $i = 0; $__LIST__ = $level1list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>

                <input type="hidden" gt-islabel="兼职类型"/>
                <input class="form-control" type="text" gt-isparam="name"/>
                <button class="btn btn-active" gt-btn-click="addlevel2">添加</button>
            </div>

        </div>
    </div>
</div>

<script>
    $("[gt-btn-click='addlevel2']").on('click', '', function (event) {
        event.preventDefault();
        var level2 = M('level2');
        console.log(level2);
        post(CON_PATH + "/addlevel2",level2);

    });

</script>