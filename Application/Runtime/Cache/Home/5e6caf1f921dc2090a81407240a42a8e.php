<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
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
<form id="form1" name="form1" method="post" action="">
<!--   <p>公司名：
    <input type="text" name="name" id="name" />
</p> -->
  <p>类型：
    <select name="classa" id="classa">
        <option selected="selected">一级分类</option>
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val['fid']); ?>"><?php echo ($val['fname']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
    </select> 
    ----

    <select name="classb" id="classb">
       <!--  <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val['id']); ?>"><?php echo ($val['fname']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?> -->
    </select>
    ---
    <select name="classc" id="classc">
    </select>
<!--   <select name="classd" id="classd">
  </select> -->
  <!-- <span>添加</span>
  </p>
  <p> </p>
  <p>内容：
    <textarea name="content" id="content" cols="45" rows="5"></textarea>
  </p> -->
  <p>
    <input type="submit" name="button2" id="button2" value="提交" />
  </p>
</form>

</body>
</html>