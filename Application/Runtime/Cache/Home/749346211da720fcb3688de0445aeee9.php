<?php if (!defined('THINK_PATH')) exit();?>	ok
	<option>选择</option>
    <?php if(is_array($level2list)): $i = 0; $__LIST__ = $level2list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>