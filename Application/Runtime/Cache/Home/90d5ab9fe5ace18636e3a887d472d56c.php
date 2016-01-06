<?php if (!defined('THINK_PATH')) exit();?><input type="hidden" gt-islabel="职位"/>
<span type="text" class="spinner-content" gt-isparam="level2">选择职位</span>
<span class="input-group-addon glyphicon glyphicon-triangle-bottom"
      data-toggle="dropdown">
</span>
<ul class="dropdown-menu">
    <?php if(is_array($level2list)): $i = 0; $__LIST__ = $level2list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="spinner-option">
            <span><?php echo ($vo["name"]); ?></span>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>