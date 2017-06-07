<?php
namespace app\admin\model;

use think\Model;
use think\Session;

class User extends Model
{
	public function login(array $data)
	{
		$data['password'] = get_password($data['password']);
		$data = $this->where($data)->find();
		if(empty($data)){
			return false;
		}else{
			$data = $data->getData();
			unset($data['password']);
			session::set('user',$data);
			return true;
		}
	}
}