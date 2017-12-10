<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP 管理中心 - 修改分类 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/Admin/styles/general.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h1>
<span class="action-span"><a href="<?php echo U('lst');?>">商品分类</a></span>
<span class="action-span1"><a href="#">ECSHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 修改分类 </span>
<div style="clear:both"></div>
</h1>

<div class="main-div">
  <form action="/Admin-Category-edit" method="post" name="theForm" enctype="multipart/form-data">
  <table width="100%" id="general-table">
      <tr>
        <td class="label">分类名称:</td>
        <td>
          <input type='text' name='cat_name' maxlength="20" value='<?php echo $cateinfo['cat_name'];?>' size='27' /> <font color="red">*</font>
        </td>
      </tr>
      <tr>
        <td class="label">上级分类:</td>
        <td>
          <select name="parent_id">
                        <option value="0">顶级分类</option>
                        <?php foreach($catedata as $v): if(in_array($v['id'], $ids)) { continue; } if($cateinfo['parent_id'] == $v['id']) { $sel = 'selected'; }else{ $sel = ''; } ?>                                                                  
                          <option <?php echo $sel;?> value="<?php echo $v['id'];?>"><?php echo str_repeat('&nbsp;', $v['lev']*4), $v['cat_name'];?></option>
                        <?php endforeach;?>
                      </select>
        </td>
      </tr>

      <tr id="measure_unit">
        <td class="label">数量单位:</td>
        <td>
          <input type="text" name='units' value='<?php echo $cateinfo['units'];?>' size="12" />
        </td>
      </tr>
      <tr>
        <td class="label">排序:</td>
        <td>
          <input type="text" name='sort'  value="<?php echo $cateinfo['sort'];?>" size="15" />
        </td>
      </tr>

      <tr>
        <td class="label">是否显示:</td>
        <td>
          <input type="radio" name="is_show" value="1" <?php echo $cateinfo['is_show'] == "1"?'checked':'';?> /> 是          <input type="radio" name="is_show" value="0" <?php echo $cateinfo['is_show'] == "0"?'checked':'';?> /> 否        </td>
      </tr>
      <tr>
        <td class="label">是否显示在导航栏:</td>
        <td>
          <input type="radio" name="show_in_nav" value="1" <?php echo $cateinfo['show_in_nav'] == "1"?'checked':'';?> /> 是          <input type="radio" name="show_in_nav" value="0" <?php echo $cateinfo['show_in_nav'] == "0"?'checked':'';?> /> 否        </td>
      </tr>
      <tr>
        <td class="label">设置为首页推荐:</td>
        <td>
          <input type="checkbox" name="cat_recommend[]" value="1" /> 精品          <input type="checkbox" name="cat_recommend[]" value="2"  /> 最新          <input type="checkbox" name="cat_recommend[]" value="3"  /> 热门        </td>
      </tr>
      </tr>
      
      <tr>
        <td class="label">关键字:</td>
        <td><input type="text" name="keywords" value='' size="50">
        </td>
      </tr>

      <tr>
        <td class="label">分类描述:</td>
        <td>
          <textarea name='description' rows="6" cols="48"></textarea>
        </td>
      </tr>
      </table>
      <div class="button-div">
        <input type="submit" value=" 确定 " />
        <input type="reset" value=" 重置 " />
      </div>
    <input type="hidden" name="act" value="insert" />
    <input type="hidden" name="old_cat_name" value="" />
    <input type="hidden" name="id" value="<?php echo $cateinfo['id'];?>" />
  </form>
</div>

<div id="footer">
共执行 3 个查询，用时 0.021687 秒，Gzip 已禁用，内存占用 2.081 MB<br />
版权所有 &copy; 2005-2010 上海商派网络科技有限公司，并保留所有权利。</div>

</body>
</html>