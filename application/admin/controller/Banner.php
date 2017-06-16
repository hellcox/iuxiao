<?php
namespace app\admin\controller;

use think\Db;
use think\Request;

class Banner extends Base
{
    public function index()
    {

        $banners = model('banner')->page_list(8,2);

        $this->assign('banners', $banners);

        return view();
    }

    public function add()
    {
        if (Request::instance()->isPost()) {
            $input            = input('post.');
            $input['content'] = input('post.content', '', null);

            $data = [
                'title'       => $input['title'],
                'article_id'  => $input['articleID'],
                'status'      => $input['status'],
                'url'         => $input['url'],
                'create_time' => time(),
                'update_time' => time(),
            ];

            // 上传表单图片
            $file = request()->file('image');
            if ($file) {
                $imgPath = ROOT_PATH . 'public/upload/image';
                $info    = $file->move($imgPath);
                if ($info) {
                    $data['image'] = '/upload/image/' . str_replace('\\', '/', $info->getSavename());
                }
            }

            if (Db::table('banner')->insert($data)) {
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
            if (Db::table('banner')->delete($id)) {
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

        if (Request::instance()->isPost()) {
            $bannerID = input('post.bannerID');
            $input            = input('post.');
            $data = [
                'title'       => $input['title'],
                'article_id'  => $input['articleID'],
                'status'      => $input['status'],
                'url'         => $input['url'],
            ];


            // 上传表单图片
            $file = request()->file('image');
            if ($file) {
                $imgPath = ROOT_PATH . 'public/upload/image';
                $info    = $file->move($imgPath);
                if ($info) {
                    $data['image'] = '/upload/image/' . str_replace('\\', '/', $info->getSavename());
                }
            }
            dump($data);
            dump($bannerID);
            if (Db::table('banner')->where('id',$bannerID)->update($data)) {
                Db::table('banner')->where('id',$bannerID)->update(['update_time'=>time()]);
                $this->success('修改成功', '', '', 1);
            }else {
                $this->error('修改失败', '', '', 1);
            }
        }

        $banner = Db::table('banner')->find($id);
        $this->assign('banner',$banner);

        return view();
    }

}
