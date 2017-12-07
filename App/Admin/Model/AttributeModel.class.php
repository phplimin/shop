<?php
namespace Admin\Model;
use Think\Model;

class AttributeModel extends Model {
	protected $_validate = array(
		array('attr_name', 'require', '属性的名称不能为空'),
		array('type_id', 'number', '属性类型的id不是数字'),
		array('attr_type', array(0,1), '属性值的范围不正确', 1, 'in'),
		array('attr_input_type', array(0,1), '属性录入方式不正确', 1, 'in')
	);
}