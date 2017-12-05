<?php
namespace Admin\Controller;
use Think\Controller;

class TypeController extends Controller {
	public function add() {
		//添加商品类型
		if(IS_POST) {
			$type = D('Type');
			if($type->create()) {
				if($type->add()) {
					$this->success('添加成功', U('lst'));
				}else{
					$this->error('添加失败');
				}
			}else{
				$this->error($type->getError());
			}
		}

		$this->display();
	}

	public function lst() {
		//商品类型列表
		$type = D('Type');
		$data = $type->select();
		$this->assign('data', $data);

		$this->display();
	}

	public function edit($type_id = 0) {
		//修改商品类型
		$type = D('Type');
		if(IS_POST) {
			$data['id'] = I('post.id');
			$data['type_name'] = I('post.type_name');
			if($type->where('id='.$data['id'])->save($data)!== false) {
				$this->success('更新成功', U('lst'));
			}
		}

		if(!is_numeric($type_id)) $type_id = 0;
		$info = $type->where('id='.$type_id)->find();
		$this->assign('info', $info);

		$this->display();
	}

	public function del($type_id = 0) {
		if(!is_numeric($type_id)) $type_id = 0;
		$type = D('Type');
		if($type->where('id='.$type_id)->delete()!== false) {
			$this->success('删除成功', U('lst'));
		}
	}
}