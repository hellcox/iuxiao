<?php
namespace app\admin\controller;

use think\Db;
use think\Request;

class Article extends Base
{
    public function index()
    {
        $articles = Db::table('article')->select();

        $this->assign('articles', $articles);

        return view();
    }

    public function add()
    {
        if (Request::instance()->isPost()) {
            $input            = input('post.');
            $input['content'] = input('post.content', '', null);

            $data = [
                'title'       => $input['title'],
                'keywords'    => $input['keywords'],
                'desc'        => $input['desc'],
                'status'      => $input['status'],
                'type'        => $input['type'],
                'tags'        => $input['tags'],
                'content'     => $input['content'],
                'create_time' => time(),
                'update_time' => time(),
            ];

            // 上传表单图片
            $file = request()->file('cover');
            if ($file) {
                $imgPath = ROOT_PATH . 'public/upload/image';
                $info    = $file->move($imgPath);
                if ($info) {
                    $data['cover'] = '/upload/image/' . str_replace('\\', '/', $info->getSavename());
                }
            }

            if (Db::table('article')->insert($data)) {
                $this->success('添加成功', '', '', 1);
            }
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
            if (Db::table('article')->delete($id)) {
                $res = ['errno' => 1, 'msg' => '删除成功'];
                return $res;
            }
            return $res;
        }
        return 0;
    }

    public function edit()
    {
        $id = input('param.id');
        $article = Db::table('article')->find($id);
        $this->assign('article',$article);

        if (Request::instance()->isPost()) {
            $input            = input('post.');
            $input['content'] = input('post.content', '', null);

            $data = [
                'title'       => $input['title'],
                'keywords'    => $input['keywords'],
                'desc'        => $input['desc'],
                'status'      => $input['status'],
                'type'        => $input['type'],
                'tags'        => $input['tags'],
                'content'     => $input['content'],
            ];

            // 上传表单图片
            $file = request()->file('cover');
            if ($file) {
                $imgPath = ROOT_PATH . 'public/upload/image';
                $info    = $file->move($imgPath);
                if ($info) {
                    $data['cover'] = '/upload/image/' . str_replace('\\', '/', $info->getSavename());
                }
            }

            if (Db::table('article')->where('id',$id)->update($data)) {
                Db::table('article')->where('id',$id)->update(['update_time'=>time()]);
                $this->success('修改成功', '', '', 1);
            }else {
                $this->error('修改失败', '', '', 1);
            }
        }

        return view();
    }

}
