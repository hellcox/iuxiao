<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;

class Index extends Controller
{

    public function _initialize()
    {
        $request = Request::instance();
        $model = $request->module();
        $controller = $request->controller();
        $action = $request->action();
        dump($model);
        dump($controller);
        dump($action);
    }
    public function index()
    {
        // 最新发布
        $newArticles = Db::table('article')
            ->field('id,title,views,update_time,cover,type,desc')
            ->where(['status'=>1])
            ->order('id desc')
            ->paginate(4);
        $banners = Db::table('banner')
            ->field('title,article_id,url,image')
            ->order('id desc')
            ->where(['status'=>1])
            ->limit(3)
            ->select();
        // 热门文章
        $hotArticles = model('article')->get_hot_articles(5);
        // 推荐文章
        $recArticles = model('article')->get_rec_articles(3);

        $this->assign([
                'newArticles' => $newArticles,
                'hotArticles' => $hotArticles,
                'recArticles' => $recArticles,
                'banners'     => $banners,
            ]);
        return view();
    }

    public function sort()
    {
        $category = input('param.category');
        switch ($category) {
            case '1':
                $nav = '互联网';
                break;
            case '2':
                $nav = '技术技巧';
                break;
            
            default:
                $nav = '';
                break;
        }
        // 栏目文章
        $sortArticles = Db::name('article')
            ->field('id,title,views,update_time,cover,type,desc')
            ->where(['type'=>$nav,'status'=>1])
            ->order('id desc')
            ->paginate(4);
        // 热门文章
        $hotArticles = model('article')->get_hot_articles(5);
        // 推荐文章
        $recArticles  = model('article')->get_rec_articles(3);

        $this->assign([
                'recArticles'  => $recArticles,
                'hotArticles'  => $hotArticles,
                'sortArticles' => $sortArticles,
                'nav'          => $nav,
            ]);
        return view();
    }

    public function detail()
    {
        $article = array();
        $id      = input('param.id');

        if($id){
            Db::table('article')->where('id',$id)->setInc('views');
            $article = Db::table('article')->find($id);
        }
        // 热门文章
        $hotArticles = model('article')->get_hot_articles(5);

        $this->assign('article',$article);
        $this->assign('hotArticles',$hotArticles);

        return view();
    }

    public function search()
    {
        if(isset($_SERVER['HTTP_REFERER'])){
            $referer = $_SERVER['HTTP_REFERER'];
        }else{
            $referer = config('url');
        }

        $key = input('get.key');
        $pageParam = ['query' =>['key'=>$key]];

        if(!$key){
            $this->redirect($referer);
        }
        // 栏目文章
        $searchArticles = Db::name('article')
            ->field('id,title,views,update_time,cover,type,desc')
            ->where(['status'=>1])
            ->where('title','like','%'.$key.'%')
            ->order('id desc')
            ->paginate(4,false, $pageParam);
        // 热门文章
        $hotArticles = model('article')->get_hot_articles(5);
        // 推荐文章
        $recArticles  = model('article')->get_rec_articles(3);

        $this->assign([
                'recArticles'  => $recArticles,
                'hotArticles'  => $hotArticles,
                'searchArticles' => $searchArticles,
                'key' => $key,
            ]);
        return view();
    }
}
