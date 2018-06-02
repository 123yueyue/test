<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/tp/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/tp/Public/Admin/css/info-reg.css" />
<title>软件学院综合实践积分管理系统</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        //一级分类联动二级分类
        $("#classa").change(function(){
            var val=$(this).val();
            //alert(val);
            $("#classb").load("<?php echo U('Student/classa');?>",{data:val});
        });
        //二级分类联动三级分类
        $("#classb").change(function(){
            var val=$(this).val();
            //alert(val);
            $("#classc").load("<?php echo U('Student/classb');?>",{data:val});
        });
        
        //     //三级分类联动四级分类
        // $("#classc").change(function(){
        //     var val=$(this).val();
        //     //alert(val);
        //     $("#classd").load("/tp/index.php/Home/Student/classc",{data:val});
        // });
    });
</script>
</head>

<body>
<div class="title"><h2>实践分申请</h2></div>
<form action="<?php echo U('Student/shenqing');?>" method="post" enctype="multipart/form-data">
	<div class="main">
	    <p class="short-input ue-clear">
	    	<!-- <label>学号：</label> -->
	        <input type="hidden" name="stid" value = "<?php echo (session('stid')); ?>" placeholder="学号" />
	    </p>
	    <p class="short-input ue-clear">
	    	<label>类型：</label>
	    	<form id="form1" name="form1" method="post" action="">
			
    		<select name="classa" id="classa">
        		<option selected="selected">一级分类</option>
        		<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val['fid']); ?>"><?php echo ($val['fname']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
    		</select> 
   			 ----

    		<select name="classb" id="classb">
   		
    		</select>
    		---
    		<select name="classc" id="classc">
    		</select>
			</form>
		</p>
		<p class="short-input ue-clear">
	    	<label>申请分数：</label>
	        <input type="text" name="sqscore" placeholder="申请分数" />
	    </p>
	    <p class="short-input ue-clear">
	    	<label>材料上传：</label>
	        <input type="file" name="photo" placeholder="材料" />
	    </p>
	</div>
	<div class="btn ue-clear">
		<a href="javascript:;" class="confirm">确定</a>
	    <a href="javascript:;" class="clear">清空内容</a>
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
	//给确定按钮绑定一个点击事件
	$('.confirm').on('click',function(){
		//事件的处理程序
		$('form').submit();
	});
});
$(function(){
	//给清空内容按钮绑定一个点击事件
	$('.clear').on('click',function(){
		//事件的处理程序
		$('form')[0].reset();
	});
});
</script>
</html>