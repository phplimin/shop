<?php
namespace Admin\Model;
use Think\Model;

class TypeModel extends Model {
	protected $_validate = array(
		array('type_name', 'require', '类型名称不能为空'),
		array('type_name', '', '类型名称已经存在', 0, 'unique', 1),
	);

	protected $insertFields = 'type_name';
}