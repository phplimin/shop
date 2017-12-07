#商品类型表
create table it_type (
	id tinyint unsigned not null primary key auto_increment,
	type_name varchar(20) not null comment '商品类型的名称'
)engine myisam charset utf8;
#商品属性表
create table it_attribute (
	id smallint unsigned not null primary key auto_increment,
	type_id tinyint unsigned not null comment '商品类型的id',
	attr_name varchar(30) not null comment '属性名称',
	attr_type tinyint not null default 0 comment '属性的类型 0表示唯一属性  1表示单选属性',
	attr_input_type tinyint not null default 0 comment '属性值的录入方式 0表示手工输入	1表示列表选择',
	attr_value varchar(255) not null default '' comment '可选值列表'
)engine myisam charset utf8;