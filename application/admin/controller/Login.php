<?php
namespace app\admin\controller;

use think\Controller;
use think\Session;
use think\Request;

class Login extends controller
{
    public function index()
    {
    	if(session::has('user')){
    		$this->redirect('admin/Index/index');
    	}
        return view();
    }

    public function login()
    {
    	if(request::instance()->isAjax()){
    		$res = ['errno'=>0,'msg'=>'操作失败'];
    		$input = input('post.');

    		$loginData = [
    			'user_name' => $input['user_name'],
    			'password'  => $input['password']
    			];

    		if(model('user')->login($loginData)){
    			$res = ['errno'=>1,'msg'=>'登陆成功'];
    		}
    		
    		return $res;
    	}
    	echo '你正在非法访问';
    }

    public function loginOut()
    {
    	session::delete('user');
    	$this->redirect('admin/Login/index');
    }
}
