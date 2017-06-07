<?php
namespace app\admin\controller;

use think\Db;
use think\Request;

class Group extends Base
{
    public function index()
    {
    	$groups = Db::table('auth_group')->select();
        $this->assign('groups', $groups);
        return view();
    }

    public function add()
    {
    	if (Request::instance()->isAjax()) {
            $input = input('post.');
            $res   = ['errno' => 0, 'msg' => '添加失败'];

            if (in_array('', $input)) {
                $res = ['errno' => 0, 'msg' => '请填写数据'];
                return $res;
            }
            if (Db::table('auth_group')->where('title',$input['title'])->find()) {
                $res = ['errno' => 0, 'msg' => '已有当前角色'];
                return $res;
            }
            if (Db::table('auth_group')->insert($input)) {
                $res = ['errno' => 1, 'msg' => '添加角色成功'];
                return $res;
            }
            return $res;
        }
        return view();
    }

    public function delete()
    {
        if (Request::instance()->isAjax()) {
            $id  = input('post.id');
            $res = ['errno' => 0, 'msg' => '删除失败'];

            if (!$id) {
                $res = ['errno' => 0, 'msg' => '参数错误'];
                return $res;
            }
            if (Db::table('auth_group')->delete($id)) {
                $res = ['errno' => 1, 'msg' => '删除角色成功'];
                return $res;
            }
            return $res;
        }
        return 0;
    }

    public function giveRules()
    {
    	// if (Request::instance()->isGet()) {
            $id = input('param.id');
            if (!$id)die('参数错误');

            $rule = Db::table('auth_group')->find($id);
            if(isset($rule['rules'])){
                $rule['rules'] = explode(',', $rule['rules']);
            }
            $this->assign('role', $rule);
        // }

        if (Request::instance()->isPost()) {
            $data = input('post.');
            if(isset($data['rules'])){
                $data['rules'] = implode(',', $data['rules']);
                if(Db::table('auth_group')->where('id',$id)->update($data)){
                    $this->success('修改成功');
                }
            }
        }

        $rules = Db::table('auth_rule')->field('id,title,name')->group('name')->select();
        $this->assign('rules',$rules);
        return view('give_rules');
    }
}
