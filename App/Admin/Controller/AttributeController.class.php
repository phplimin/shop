<?php
namespace Admin\Controller;
use Think\Controller;

class AttributeController extends Controller {
	public function add() {
		//添加商品属性
		if(IS_POST) {
			$type_id = I('post.type_id');
			$attr = D('Attribute');
			if($attr->create()) {
				if($attr->add()) {
					$this->success('添加属性成功', U('lst', array('type_id' => $type_id)));
				}else{
					$this->error('添加属性失败');
				}
			}else{
				$this->error($attr->getError());
			}
		}

		//商品类型的数据
		$type = M('Type');
		$typedata = $type->select();
		$this->assign('typedata', $typedata);

		$this->display();
	}

	public function lst() {
		//商品属性列表
		$attr = M('Attribute');
		$type_id = I('get.type_id');
		if(!is_numeric($type_id)) $type_id = 0;
		if($type_id == 0){
			$where = 1;
		}else{
			$where = "type_id = $type_id";
		}
		//分页效果
		$count = $attr->where($where)->count();
		$Page = new \Think\Page($count,3);
		$Page->setConfig('prev','上一页');
		$Page->setConfig('next','下一页');
		$show = $Page->show();

		$attrdata = $attr
			->field("a.*,b.type_name")
			->join("a left join it_type b on a.type_id = b.id")
			->where($where)
			->limit($Page->firstRow.','.$Page->listRows)
			->select();
		$this->assign('type_id', $type_id);
		$this->assign('attrdata', $attrdata);
		$this->assign('page', $show);

		//商品类型列表
		$type = M('Type');
		$typedata = $type->select();
		$this->assign('typedata', $typedata);

		$this->display();
	}

	public function edit($attr_id=0) {
		if(!is_numeric($attr_id)) $attr_id = 0;
		$attr = M('Attribute');
		$attrinfo = $attr->where("id=".$attr_id)->find();
		$this->assign('attrinfo', $attrinfo);
		$this->assign('attr_id', $attr_id);

		if(IS_POST) {
			if($attr->create()) {
				if($attr->save()) {
					$this->success('修改成功', U('lst'));
				}else{
					$this->error('修改失败');
				}
			}else{
				$this->error($attr->getError());
			}
		}

		//商品类型列表
		$type = D('Type');
		$typedata = $type->select();
		$this->assign('typedata', $typedata);

		$this->display();
	}

	public function del($attr_id =0) {
		if(!is_numeric($attr_id)) $attr_id = 0;
		$attr = M('Attribute');
		if($attr->where("id=".$attr_id)->delete() !== false) {
			$this->success('删除成功', U('lst'));exit;
		}
	}
}