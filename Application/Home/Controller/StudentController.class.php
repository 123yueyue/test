<?php

/**
 * @Author: ND01
 * @Date:   2018-05-12 16:37:01
 * @Last Modified by:   123yueyue
 * @Last Modified time: 2018-05-25 22:14:02
 */
namespace Home\Controller;
use Think\Controller;
// use PHPExcel_IOFactory;
// use PHPExcel;
// use Behavior;
class StudentController extends Controller{
	public function upload(){
		if(IS_POST){
			$stid = session('stid');
			$model = M('Student');
			$mclass = M('Class');
			$res = $model -> field('cid') -> where("stid = '$stid'") -> find();
			$cid = $res['cid'];
			$res1 = $mclass -> field('cname') -> where("cid = '$cid'") -> find();
			$cname = $res1['cname'];
			//echo $cname;die;
			$upload = new \Think\Upload();// 实例化上传类
    		$upload->maxSize   =     3145728 ;// 设置附件上传大小
    		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
    		$upload->rootPath  =     '/tp/index.php?s=/Home/Uploads'; // 设置附件上传根目录
    		//$upload->savePath  =     '$cid'; // 设置附件上传（子）目录
    		//$savename = $stid.time();
    		//dump($savename);die;
    		//$upload->saveName = $savename; 
   			$upload->autoSub = true;
			$upload->subName = $cid;
			// $stid = session('stid');
			// $model = M('Student');
			// $res = $model -> field('cid') -> where("stid = '$stid'") -> find();
			// $cid = $res['cid'];
			// echo $cid;die;
    		// 上传文件 
    		$info   =   $upload->upload();
    		//dump($info);die;
    		$model = M('Detail');
    		$model -> stid = I('post.stid');
    		$model -> sqtime = date("Y-m-d H:i:s",time());
    		$model -> fid = I('post.classa');
    		$model -> sid = I('post.classb');
    		$model -> tid = I('post.classc');
    		$model -> sqscore = I('post.sqscore');
    		$state = 0;
    		$model -> state = $state;
    		session('state',$state);
    		$model -> filename = $info['photo']['name'];
    		$model -> filepath = $info['photo']['savepath'];
    		$result = $model -> add();
    		if($result){
    			$this -> success('上传成功');
    		}else{
    			$this -> error('上传失败');
    		}
		}else{
			$m=M('flevel');
        	$query=$m->select();
        	$this->assign('data',$query);
			$this -> display();
		}
    
	}
	
	
    public function classa(){ //一级分类联动二级分类
        var_dump($_POST['data']);
        //echo $_POST['data'];
        $fid=$_POST['data'];  //接收模板文件jquery $(load)传来参数。data
        $m=M('slevel');
        $where['fid']=$fid;
        $query=$m->where($where)->select();   //在二级分类表classb里找出字段class_id=$class_id
        //var_dump($query[0][id]);
        if($query){  //判断如果有数据就显示  二级分类   如果无数据就显示 无分类
            $temp="<option selected='selected'>二级分类</option>";
        }else{
            $temp="<option selected='selected'>无分类</option>";
        }
        //循环数组
        foreach ($query as $key=>$value){ 
            $temp.="<option value='".$query[$key]['sid']."'>".$query[$key]['sname']."</option>";
        }            
        //var_dump($query);
        //echo $m->getLastSql();
        echo $temp;
    }

        public function classb(){ //二级分类联动三级分类
        //var_dump($_POST['data']);
        //echo $_POST['data'];
        $sid=$_POST['data'];  //接收模板文件jquery $(load)传来参数。data
        $m=M('Tlevel');
        $where['sid']=$sid;
        $query=$m->where($where)->select();   //在三级分类表classc里找出字段classB_id=$classb_id
        //var_dump($query[0][id]);
        if($query){  //判断如果有数据就显示  二级分类   如果无数据就显示 无分类
            $temp="<option selected='selected'>三级分类</option>";
        }else{
            $temp="<option selected='selected'>无分类</option>";
        }
        //循环数组
        foreach ($query as $key=>$value)
            { 
                     
                     $temp.="<option value=".$query[$key]['tid'].">".$query[$key]['tname']."</option>";
               
            }            
        //var_dump($query);
        //echo $m->getLastSql();
        echo $temp;
        
    }

        public function classc(){ //三级分类联动四级分类
        //var_dump($_POST['data']);
        //echo $_POST['data'];
        $classc_id=$_POST['data'];  //接收模板文件jquery $(load)传来参数。data
        $m=M('Classd');
        $where['classc_id']=$classc_id;
        $query=$m->where($where)->select();   //在四级分类表classd里找出字段classc_id=$classc_id
        //var_dump($query[0][id]);
        if($query){  //判断如果有数据就显示 
            $temp="<option selected='selected'>四级分类</option>";
        }else{
            $temp="<option selected='selected'>无分类</option>";
        }
        //循环数组
        foreach ($query as $key=>$value)
            { 
                     
                     $temp.="<option value=".$query[$key]['id'].">".$query[$key]['classname']."</option>";
               
            }            
        //var_dump($query);
        //echo $m->getLastSql();
        echo $temp;
        
    }

    public function chakan(){
    	$model = M('Detail');
    	$stid = session('stid');
    	$data = $model -> where("stid = '$stid'") -> select();
    	$this -> assign('data',$data);
    	// echo $model -> _sql();
    	// dump($data);die;
    	$this -> display();
    }

    public function download(){
    	$id = I('get.id');
    	$data = M('Detail') -> find($id);
    	$file = '/tp/.index.php?s=/Home/Uploads'.$data['filepath'].$data['filename'];
    	header("Content-type: application/octet-stream");
    	header('Content-Disposition:attachment;filename="'.basename($file).'"');
    	header("Content-Length:".filesize($file));
    	readfile($file);
	}
	public function xiugai(){
		if(IS_POST){
			$stid = session('stid');
			$model = M('Student');
			$data = $model -> where("stid = '$stid'") -> find();
			$pw = $data['password'];
			$pw1 = I('post.password');
			$passw1 = I('post.newpassword1');
			$passw2 = I('post.newpassword2');
			if($pw == $pw1){
				if($passwd1 == $passwd2){
					$model -> password = $passw1;
					$res = $model -> where("stid = '$stid'") -> save();
					$this -> success('修改密码成功');
				}else{
					$this -> error('您输入的两次新密码不正确');
				}
			}else{
				$this -> error('您输入的旧密码不正确');
			}
			//dump($data);die;
		}else{
			$this -> display();
		}
		
	}

	public function totle(){
		$stid = session('stid');
		$model = M('Score');
		$data = $model -> where("stid = '$stid'") -> find();
		$this -> assign('data',$data);
		$this -> display();
	}
}