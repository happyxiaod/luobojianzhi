<?php if (!defined('THINK_PATH')) exit();?><div class="col-md-10">

    <?php if(is_array($feedback)): $i = 0; $__LIST__ = $feedback;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="row" style="border:1px solid #ddd;border-radius: 3px;margin:5px 2px;padding:5px">
            <div>
                <?php echo ($vo["date"]); ?> | <?php echo ($vo["time"]); ?>
            </div>
            <div>
                <?php echo ($vo["content"]); ?>
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>