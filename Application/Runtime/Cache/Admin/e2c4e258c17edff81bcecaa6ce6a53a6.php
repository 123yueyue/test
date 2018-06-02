<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/tp/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/tp/Public/Admin/css/info-reg.css" />
<title>移动办公自动化系统</title>
</head>

<body>
<div class="title"><h2>专业信息修改</h2></div>
<form action="" method="post">
	<div class="main">
	    <p class="short-input ue-clear">
	        <input type="hidden" name="pid" value="<?php echo ($info["pid"]); ?>"/>
	    </p>
	    <p class="short-input ue-clear">
	    	<label>专业名称：</label>
	        <input type="text" name="pname" value="<?php echo ($info["pname"]); ?>" placeholder="专业名称" />
	    </p>
	    <p class="short-input ue-clear">
	    	<label>所属学院：</label>
	        <select name="sname">
	            <option ><?php echo ($ssname); ?></option>
	            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vol["sname"]); ?>"><?php echo ($vol["sname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	        </select>
	    </p>
	</div>
	<div class="btn ue-clear">
		<a href="javascript:;" id="btnsubmit" class="confirm">确定</a>
	    <a href="javascript:;" id="btncancel" class="clear">清空内容</a>
	</div>
</form>
</body>
<script type="text/javascript" src="/tp/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/tp/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/tp/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript">
$(".select-title").on("click",function(){
	$(".select-list").toggle();
	return false;
});
$(".select-list").on("click","li",function(){
	var txt = $(this).text();
	$(".select-title").find("span").text(txt);
});

showRemind('input[type=text], textarea','placeholder');

//jQuery代码
$(function(){
	//给确定按钮绑定点击事件
	$('.confirm').on('click',function(){
		$('form').submit();
	});
});
$(function(){
	//给清空按钮绑定点击事件
	$('.clear').on('click',function(){
		$('form')[0].reset();
	});

});
</script>
</html>