<?php
namespace app\index\model;

use think\Model;

class Article extends Model
{
    protected $table = 'article';

    /**
     * 获取最新文章
     * @param  string  $type  [文章类型]
     * @param  integer $limit [获取条数]
     * @return 数组
     */
    public function get_new_articles($type = '',$limit = 8)
    {
        if ($type) {
            $condition = ['type' => $type];
            $res = $this->field('id,title,views,create_time,update_time,cover,type,desc')
            	->where($condition)
            	->order('id desc')
            	->limit($limit)
            	->select();
        } else {
        	$res = $this->field('id,title,views,create_time,update_time,cover,type,desc')
        		->order('id desc')
        		->limit($limit)
        		->select();
        }

        return json_decode(json_encode($res), true);
    }

    public function get_hot_articles($limit=5)
    {
    	$res = $this->field('id,title,views,cover,update_time,create_time')
    		->order('views desc')
        	->limit($limit)
        	->select();
        return json_decode(json_encode($res), true);
    }

    public function get_rec_articles($limit=5){
    	$res = $this->field('id,title,cover')
    		->order('id desc')
    		->where(['rec'=>1])
        	->limit($limit)
        	->select();
        return json_decode(json_encode($res), true);
    }
}
