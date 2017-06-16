<?php
namespace app\admin\model;

use think\Model;
use think\Db;

class Banner extends Model
{
	protected $table = 'banner';

	/**
	 * 分页获取列表
	 * @param  int $limit    [单页数量]
	 * @param  int $status [文章启用状态] 0未启用 1启用 2全部
	 * @return [obj]       [分页文章对象]
	 */
	public function page_list($limit=6,$status=1)
	{
		$list = array();

		if($status==2){
			$list = Db::name($this->table)
            ->order('id desc')
            ->paginate($limit);
		}else{
			$list = Db::name($this->table)
            ->where(['status'=>$status])
            ->order('id desc')
            ->paginate($limit);
		}

        return $list;
	}
}