<?php

/**
 * @Author: ND01
 * @Date:   2018-05-12 11:48:27
 * @Last Modified by:   123yueyue
 * @Last Modified time: 2018-05-30 17:07:05
 */
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller{
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
		$verify = new \Think\Verify();
		$result = $verify -> check($post['captcha']);
		if($result){
			$model = M('Teacher');
			unset($post['chatcha']);
			$data = $model -> where($post) -> find();
			$tname = $model -> where($post['tid']) ->select(tname);
			//dump($tname);die;
			if($data){
				session('tid',$data['tid']);
				session('tname',$data['tname']);
				$this -> success('登录成功 @ ~ @','/tp/index.php?s=/Admin/User/index',3);
			}else{
				$this -> error('用户名或密码错误..');
			}
		}else{
			$this -> error('验证码错误..');
		}
	}
	public function logout(){
		session(null);
		$this -> success('退出成功','/tp/index.php?s=/Admin/Index/index',3);
	}
}