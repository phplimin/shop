#商品类型表
create table it_type (
	id tinyint unsigned not null primary key auto_increment,
	type_name varchar(20) not null comment '商品类型的名称'
)engine myisam charset utf8;