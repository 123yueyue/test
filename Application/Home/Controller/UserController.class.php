<?php

/**
 * @Author: ND01
 * @Date:   2018-05-12 08:50:39
 * @Last Modified by:   123yueyue
 * @Last Modified time: 2018-05-30 10:41:13
 */
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller{
	public function index(){
        $this->display();
    }
    public function home(){
    	$this->display();
    }
}