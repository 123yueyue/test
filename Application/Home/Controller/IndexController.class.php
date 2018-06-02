<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		//展示模板
		$this -> display();
	}
	//生成验证码
	public function captcha(){
		$cfg = array(
				'fontSize'   =>    12,
				'imageW'     =>    80,
				'imageH'     =>    38,
				'userCurve'  =>    false,
				'userNoise'  =>    false,
				'length'     =>    4,
				'fontttf'    =>    '4.ttf',
			);
		$verify = new \Think\Verify($cfg);
		$verify -> entry();
	}
	public function checkLogin(){
		$post = I('post.');
		// dump($post);
		// $id = $post['stid'];
		// echo $id;
		$stid = I('post.stid');
		//dump($stid);
		$verify = new \Think\Verify();
		$result = $verify -> check($post['captcha']);
		if($result){
			$model = M('Student');
			unset($post['chatcha']);
			$data = $model -> where($post) -> find();
			//echo $model -> _sql();
			$stname = $model -> field(stname) -> where("stid = '$stid'") ->find();
			//dump($stname);die;
			if($data){
				session('stid',$stid);
				session('stname',$stname);
				$this -> success('登录成功 @ ~ @','/tp/index.php?s=/Home/User/index',3);
			}else{
				$this -> error('用户名或密码错误..');
			}
		}else{
			$this -> error('验证码错误..');
		}
	}
	public function logout(){
		session(null);
		$this -> success('退出成功','/tp/index.php?s=/Home/Index/index',3);
	}
}