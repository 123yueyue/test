<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/tp/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/tp/Public/Admin/css/info-reg.css" />
<title></title>
</head>

<body>
<div class="title"><h2>扣分</h2></div>
<form action="" method="post">
	<div class="main">
		<p class="short-input ue-clear">
	        <input type="hidden" name="did" value="<?php echo ($info["did"]); ?>"/>
	    </p>
	    <p class="short-input ue-clear">
	    	<label>应得分数：</label>
	        <input type="text" name="hdscore" value="<?php echo ($info["hdscore"]); ?>" />
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
//
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