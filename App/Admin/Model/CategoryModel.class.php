<?php
namespace Admin\Model;
use Think\Model;

class CategoryModel extends Model {
	protected $_validate = array(
		array('cat_name', 'require', '商品栏目名称不能为空'),
		array('units', 'require', '数量单位不能为空'),
	);

	//家谱树数据结构
	public function getTree() {
		$data = $this->select();
		return $this->_getTree($data, $id=0, $lev=0);
	}

	private function _getTree($data, $id = 0, $lev = 0) {
		static $arr = array();

		foreach($data as $v) {
			if($v['parent_id'] == $id) {
				$v['lev'] = $lev;
				$arr[] = $v;
				$this->_getTree($data, $v['id'], $lev+1);
			}
		}

		return $arr;
	}

	//查找子级节点
	public function getChilds($id =0) {
		$data = $this->select();
		return $this->_getChilds($data, $id);
	}

	private function _getChilds($data, $id = 0) {
		static $arr = array();

		foreach($data as $v) {
			if($v['parent_id'] == $id) {
				$arr[] = $v['id'];
				$this->_getChilds($data, $v['id']);
			}
		}

		return $arr;
	}
}