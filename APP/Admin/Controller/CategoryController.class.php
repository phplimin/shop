<?php
namespace Admin\Controller;
use Think\Controller;

class CategoryController extends Controller {
	public function add() {
		$cat = D('Category');
		if(IS_POST) {
			if($cat->create()) {		
				if($cat->add()) {
					$this->success('添加成功', U('lst'));exit;
				}else{
					$this->error('添加失败');
				}
			}else{
				$this->error($cat->getError());
			}
		}

		//栏目数据
		$catedata = $cat->getTree();
		$this->assign('catedata', $catedata);

		$this->display();
	}

	public function lst() {
		$cat = D('Category');
		$catedata = $cat->getTree();
		$this->assign('catedata', $catedata);

		$this->display();
	}

	public function edit($cat_id = 0) {		
		$cat = D('Category');
		if(IS_POST) {
			if($cat->create()) {
				if($cat->save() !== false) {
					$this->success('修改成功', U('lst'));exit;
				}
			}else{
				$this->error($cat->getError());
			}
		}

		//获取分类信息
		if(!is_numeric($cat_id)) $cat_id = 0;
		$cateinfo = $cat->where('id='.$cat_id)->find();
		if(!empty($cateinfo)) $this->assign('cateinfo', $cateinfo);
		//获取当前分类下所有的子节点id
		$ids = $cat->getChilds($cat_id);
		$ids[] = $cat_id;
		$this->assign('ids', $ids);

		$catedata = $cat->getTree();
		$this->assign('catedata', $catedata);
		$this->display();
	}

	public function del($cat_id = 0) {
		if(!is_numeric($cat_id)) $cat_id = 0;
		$cat = D('Category');
		$ids = $cat->getChilds($cat_id);
		if(empty($ids)){
			if($cat->delete($cat_id) !== false) {
				$this->success('删除成功', U('lst'));exit;
			}
		}else{
			$this->error('该分类下有子节点不能删除！');
		}
	}
}