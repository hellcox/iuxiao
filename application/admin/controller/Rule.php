<?php
namespace app\admin\controller;

use think\Db;
use think\Request;

class Rule extends Base
{
    public function index()
    {
    	$rules = Db::table('auth_rule')->select();
        $this->assign('rules', $rules);
        return view();
    }

    public function add()
    {
        if (Request::instance()->isAjax()) {
            $input = input('post.');
            $data  = [
            	'name' => $input['name'],
            	'title' => $input['title'],
            	'category_id' => $input['category'],
            ];
            $res   = ['errno' => 0, 'msg' => '添加失败'];

            if (in_array('', $data)) {
                $res = ['errno' => 0, 'msg' => '请填写所有数据'];
                return $res;
            }
            if (Db::table('auth_rule')->where($data)->find()) {
                $res = ['errno' => 0, 'msg' => '已有当前规则'];
                return $res;
            }
            if (Db::table('auth_rule')->insert($data)) {
                $res = ['errno' => 1, 'msg' => '添加权限规则成功'];
                return $res;
            }
            return $res;
        }
        $categorys = Db::table('auth_rule_category')->select();
    	$this->assign('categorys',$categorys);
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
            if (Db::table('auth_rule')->delete($id)) {
                $res = ['errno' => 1, 'msg' => '删除规则成功'];
                return $res;
            }
            return $res;
        }
        return 0;
    }

    public function category()
    {
        $categorys = Db::table('auth_rule_category')->select();
        $this->assign('categorys', $categorys);
        return view();
    }

    public function categoryAdd()
    {
        if (Request::instance()->isAjax()) {
        	$res = ['errno'=>0,'msg'=>'操作失败'];
        	$input = input('post.');
        	$data = ['title' => $input['title']];

        	if(Db::table('auth_rule_category')->where($data)->find()) {
        		$res = ['errno'=>0,'msg'=>'已有当前分组'];
        	}else if(Db::table('auth_rule_category')->insert($data)) {
        		$res = ['errno'=>1,'msg'=>'添加成功'];
        	}
        	return $res;
        }
        return view('category_add');
    }

    public function categoryDelete()
    {
    	if (Request::instance()->isAjax()) {
            $id  = input('post.id');
            $res = ['errno' => 0, 'msg' => '删除失败'];

            if (!$id) {
                $res = ['errno' => 0, 'msg' => '参数错误'];
                return $res;
            }
            if (Db::table('auth_rule_category')->delete($id)) {
                $res = ['errno' => 1, 'msg' => '删除成功'];
                return $res;
            }
            return $res;
        }
        return 0;
    }
}
