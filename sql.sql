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
#商品栏目表
create table it_category (
	id smallint unsigned not null primary key auto_increment,
	cat_name varchar(30) not null comment '商品栏目名称',
	parent_id smallint unsigned not null default 0 comment '父级id',
	units varchar(20) not null comment '数量单位',
	sort tinyint not null default 0 comment '排序',
	is_show tinyint not null default 0 comment '是否显示  0表示不显示  1表示显示',
	show_in_nav  tinyint not null default 0 comment '是否显示在导航栏   0表示不显示  1表示显示',
	cat_recommend varchar(20) not null default '' comment '设置为首页推荐  1表示精品  2表示最新	3表示热门',
	keywords varchar(50) not null default '' comment '关键词',
	description text not null default '' comment '分类描述'
)engine myisam charset utf8;