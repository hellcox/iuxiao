<?php
namespace app\admin\model;

use think\Model;
use think\Db;

class Article extends Model
{
	protected $table = 'article';

	/**
	 * 分页获取文章列表
	 * @param  int $limit    [单页数量]
	 * @param  int $status [文章启用状态]
	 * @return [obj]       [分页文章对象]
	 */
	public function page_list($limit=6,$status=1)
	{
		$list = array();

		$list = Db::name($this->table)
            ->field('id,title,views,update_time,cover,type,create_time,status,rec')
            ->where(['status'=>$status])
            ->order('id desc')
            ->paginate($limit);

        return $list;
	}
}