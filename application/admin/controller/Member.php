<?php
namespace app\admin\controller;
use think\Db;
use think\Controller;
class Member extends Common
{
	//显示增加会员的页面
	public function add()
	{
		$parentlist = Db::name('level') -> select();
		$this -> assign('levellist', $parentlist);
		return $this->fetch();
	}
	
	//修改会员
	public function modify($return = false)
	{
		$parentlist = Db::name('level') -> select();
		$this -> assign('levellist', $parentlist);
		parent::modify(false);
		return $this->fetch();
	}
	
	
	public function insert($data = '')
	{
		$this->postdata['password'] = md5($_POST['password']);
		parent::insert();
	}	
	
	public function update()
	{
		if(isset($_POST['password']) && $_POST['password'] == ''){
			unset($this->postdata['password']);
		}else{
			$this->postdata['password'] = md5($_POST['password']);
		}
		parent::update();
	}	
	
}
