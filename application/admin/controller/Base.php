<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Session;
use auth\Auth;

class Base extends Controller
{
    public function _initialize()
    {
        // 验证登陆
        if(!session::has('user')){
            $this->redirect('admin/Login/index');
        }

        // 获取当前 模块名、控制器、方法
        $request           = Request::instance();
        $mca['module']     = $request->module();
        $mca['controller'] = $request->controller();
        $mca['action']     = $request->action();

        // 验证权限
        $auth = new Auth(); 
        $uid  = Session::get('user.id');
        $rule = $mca['module'].'/'.$mca['controller'].'/'.$mca['action'];
        $flag = $auth->check($rule,$uid);
        if(!$flag && $uid!=1){
            $this->error('您没有操作权限');
            exit();
        }
    }
}
