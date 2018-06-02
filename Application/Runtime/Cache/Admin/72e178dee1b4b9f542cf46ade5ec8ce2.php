<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/tp/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/tp/Public/Admin/css/info-mgt.css" />
<link rel="stylesheet" href="/tp/Public/Admin/css/WdatePicker.css" />
<title>软件学院综合实践积分管理系统</title>
</head>

<body>

<div class="title"><h2>实践分审核</h2></div>
<div class="table-operate ue-clear">
	<a href="javascript:;" class="add">审核个人</a>
	<a href="javascript:;" class="edit">班级成员</a>
    <!-- <a href="javascript:;" class="del">审核班级</a>
    <a href="javascript:;" class="edit">修改密码</a> -->
</div>
<div class="table-box">
	<table>
    	<thead>
        	<tr>
            	<th class="num">编号</th>
                <th class="name">申请积分</th>
                <th class="school">考核内容</th>
                <th class="profession">审核状态</th>
                <th class="class">审核时间</th>
                <th class="totle">审核资料</th>
                <th class="operate">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><tr>
            	<td class="num"><?php echo ($vol["did"]); ?></td>
                <td class="name"><?php echo ($vol["sqscore"]); ?></td>
                <td class="school"><?php echo ($vol["tid"]); ?></td>
                <td class="profession"><?php if($vol["state"] == 0): ?>未审核<?php elseif($vol["state"] == 1): ?>已审核<?php elseif($vol["state"] == -1): ?>已作废<?php endif; ?></td>
                <td class="class"><?php echo ($vol["shtime"]); ?></td>
                <td class="totle"><img src="./668334FB9DECEE42F125F06825FD84BF.jpg" alt=""><?php echo ($vol["filename"]); ?></td>
                <td class="operate">
                <a href="/tp/index.php?s=/Admin/Teacher/tongguo1/id/<?php echo ($vol["did"]); ?>">通过</a>
                <a href="/tp/index.php?s=/Admin/Teacher/koufen1/id/<?php echo ($vol["did"]); ?>">扣分</a>
                <a href="/tp/index.php?s=/Admin/Teacher/zuofei1/id/<?php echo ($vol["did"]); ?>">作废</a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
<div class="pagination ue-clear"></div>
</body>
<script type="text/javascript" src="/tp/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/tp/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/tp/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript" src="/tp/Public/Admin/js/jquery.pagination.js"></script>
<script type="text/javascript">
$(".select-title").on("click",function(){
	$(".select-list").hide();
	$(this).siblings($(".select-list")).show();
	return false;
})
$(".select-list").on("click","li",function(){
	var txt = $(this).text();
	$(this).parent($(".select-list")).siblings($(".select-title")).find("span").text(txt);
})

$('.pagination').pagination(100,{
	callback: function(page){
		alert(page);	
	},
	display_msg: true,
	setPageNo: true
});

$("tbody").find("tr:odd").css("backgroundColor","#eff6fa");

showRemind('input[type=text], textarea','placeholder');

//jQuery代码
$(function(){
	//给删除按钮绑定点击事件
	$('.del').on('click',function(){
		//事件处理程序
		var idObj = $(':checkbox:checked');	//获取全部已经被选中的checkbox
		var id = '';	//接收处理后的部门id值，组成id1,id2,id3...
		//循环遍历idObj对象，获取其中的每一个值
		for (var i = 0; i < idObj.length; i++) {
			id += idObj[i].value + ',';
		}
		//去掉最后逗号
		id = id.substring(0,id.length - 1);
		//判断id
		if(id == ''){
			return false;
		}
		//带着参数跳转到del方法
		window.location.href = '/tp/index.php?s=/Admin/Teacher/teacher_del/id/' + id;
	});
});

$(function(){
	//给添加按钮绑定点击事件
	$('.add').on('click',function(){
		window.location.href = '/tp/index.php?s=/Admin/Teacher/shenhe_student';
	});
});
$(function(){
	//给编辑按钮绑定点击事件
	$('.edit').on('click',function(){
		window.location.href = '/tp/index.php?s=/Admin/Teacher/shenhe_showList2';
	});
});

</script>
</html>