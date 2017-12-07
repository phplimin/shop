<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP 管理中心 - 商品列表 </title>
<meta name="robots" c>
<meta http-equiv="Content-Type" c />
<link href="/Public/Admin/styles/general.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/styles/main.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.num{margin:5px;padding:5px;}
.current{margin:5px;padding:5px;}
</style>
</head>
<body>

<h1>
<span class="action-span"><a href="<?php echo U('add')?>">添加属性</a></span>
<span class="action-span1"><a href="#">ECSHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 商品列表 </span>
<div style="clear:both"></div>
</h1>

<div class="form-div">

  <form action="/Admin-Attribute-lst" name="searchForm" method="get">
    <img src="/Public/Admin/images/icon_search.gif" width="26" height="22" border="0" alt="SEARCH" />
      按商品类型显示：
    <select name="type_id">
            <option value="0">所有商品类型</option>  
            <?php foreach($typedata as $v):?>
              <?php
 if($v['id'] == $type_id){ $sel = 'selected'; }else{ $sel = ''; } ?>    
                    <option <?php echo $sel;?> value="<?php echo $v['id'];?>"><?php echo $v['type_name'];?></option>
            <?php endforeach;?>
    </select>
  </form>
</div>
<form method="post" action="" name="listForm" >

  <div class="list-div" id="listDiv">
<table cellpadding="3" cellspacing="1">
  <tr>
    <th>
      <input onclick='listTable.selectAll(this, "checkboxes")' type="checkbox" />
      <a href="#">编号</a><img src="/Public/Admin/images/sort_desc.gif"/>    </th>

    <th><a href="#">属性名称</a></th>
    <th><a href="#">商品类型</a></th>
    <th><a href="#">属性类型</a></th>
    <th><a href="#">属性值的录入方式</a></th>
    <th><a href="#">可选值列表</a></th>
    <th>操作</th>
  </tr>
  <?php foreach($attrdata as $v):?>
      <tr>
    <td><input type="checkbox" name="checkboxes[]" value="32" /><?php echo $v['id']?></td>
    <td class="first-cell" style=""><span ><?php echo $v['attr_name']?></span></td>
    <td><span ><?php echo $v['type_name']?></span></td>
    <td align="right"><?php echo $v['attr_type']==1?'单选属性':'唯一属性'?></td>
    <td align="right"><?php echo $v['attr_input_type']==1?'列表选择':'手工输入'?></td>
        <td align="right"><?php echo $v['attr_value']?></td>
        <td align="center">
      <a href="#" target="_blank" title="查看"><img src="/Public/Admin/images/icon_view.gif" width="16" height="16" border="0" /></a>
      <a href="<?php echo U('edit', array('attr_id' => $v['id']));?>" title="编辑"><img src="/Public/Admin/images/icon_edit.gif" width="16" height="16" border="0" /></a>
      <a href="#" title="复制"><img src="/Public/Admin/images/icon_copy.gif" width="16" height="16" border="0" /></a>
      <a href="<?php echo U('del', array('attr_id' => $v['id']));?>" onclick="return confirm('确定删除吗?')" title="回收站"><img src="/Public/Admin/images/icon_trash.gif" width="16" height="16" border="0" /></a>
      <a href="#" title="货品列表"><img src="/Public/Admin/images/icon_docs.gif" width="16" height="16" border="0" /></a>          </td>
  </tr>
   <?php endforeach;?>    
      </table>

<table id="page-table" cellspacing="0">
  <tr>
    <td align="right" nowrap="true">
       <?php echo $page;?>
    </td>
  </tr>

</table>

</div>
</form>

<div id="footer">
共执行 7 个查询，用时 0.112141 秒，Gzip 已禁用，内存占用 3.085 MB<br />
版权所有 &copy; 2005-2010 上海商派网络科技有限公司，并保留所有权利。</div>
</body>
</html>
<script type="text/javascript" src="/Public/Js/jquery.js"></script>
<script> 
    $("select[name=type_id]").change(function(){
        $("form[name=searchForm]").submit();
    });
</script>