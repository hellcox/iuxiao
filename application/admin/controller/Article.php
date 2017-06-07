<?php
namespace app\admin\controller;

use think\Db;

class Article extends Base
{
    public function index()
    {
    	$articles = Db::table('article')->select();

    	$this->assign('articles',$articles);
    	
        return view();
    }
}
