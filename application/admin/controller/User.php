<?php
// +----------------------------------------------------------------------
// | 名称：
// +----------------------------------------------------------------------
// | 描述：
// +----------------------------------------------------------------------
// | 作者：豆豆
// +----------------------------------------------------------------------
// | 时间：2017-05-19 16:26
// +----------------------------------------------------------------------
namespace app\admin\controller;

use app\admin\controller\Base;
use think\Db;
use think\Request;

class User extends Base
{
    public function index()
    {
    	$users = Db::table('user')
            ->where(['user.id'=>['neq',1]])
    		->join('auth_group_access aga','user.id = aga.uid','left')
    		->join('auth_group group','aga.group_id = group.id','left')
    		->field('user.id,user.user_name,user.status,user.reg_time,group.title as role_name')
            ->order('id desc')
    		->select();
    	$this->assign('users',$users);
        return view();
    }

    public function add()
    {
    	if(Request::instance()->isAjax()){
    		$input = input('post.');
    		$res   = ['errno' => 0, 'msg' => '添加失败'];
    		if(isset($input['rpassword'])){
    			$rpassword = $input['rpassword'];
    			unset($input['rpassword']);
    		}

    		if(in_array('', $input)){
    			$res = ['errno' => 0, 'msg' => '不能输入空值'];
    		}
    		else if($input['password']!=$rpassword){
    			$res = ['errno' => 0, 'msg' => '两次输入密码不一致'];
    		}
    		else if(Db::table('user')->where('user_name',$input['user_name'])->find()){
    			$res = ['errno' => 0, 'msg' => '用户已经存在'];
    		}else if(Db::table('user')->insert($input)){
    			$res = ['errno' => 1, 'msg' => '添加成功'];
    		}
    		return $res;
    	}
    	return view();
    }

    public function changeRole()
    {
    	$id = input('param.id');

    	if(Request::instance()->isAjax()){
    		$input = input('post.');
    		$res   = ['errno' => 0, 'msg' => '修改失败'];
    		$data['uid'] = $input['user_id'];
    		$data['group_id'] = $input['role_id'];

    		if(in_array('', $input)){
    			$res = ['errno' => 0, 'msg' => '不能输入空值'];
    		}else if(Db::table('auth_group_access')->where('uid',$input['user_id'])->find()){
    			$data['group_id'] = $input['role_id'];
    			if(Db::table('auth_group_access')->where('uid',$input['user_id'])->update($data)){
    				$res = ['errno' => 1, 'msg' => '修改角色成功'];
    			}
    		}else if(Db::table('auth_group_access')->insert($data)){
				$res = ['errno' => 1, 'msg' => '分配角色成功'];
			}
    		return $res;
    	}

    	$user = Db::table('user')->find($id);
    	$this->assign('user',$user);

    	$role = Db::table('auth_group_access')
    		->where('uid',$id)
    		->join('auth_group group','group.id=auth_group_access.group_id','right')
    		->field('group.id,group.title')
    		->find();

    	$this->assign('role',$role);

    	$roles = Db::table('auth_group')->select();

    	$this->assign('roles',$roles);

    	return view();
    }
}
