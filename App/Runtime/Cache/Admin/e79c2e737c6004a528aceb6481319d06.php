<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP 管理中心 - 修改商品属性 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/Admin/styles/general.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/styles/main.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h1>
<span class="action-span"><a href="<?php echo U('lst');?>">商品属性列表</a></span>
<span class="action-span1"><a href="#">ECSHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 修改商品属性 </span>
<div style="clear:both"></div>
</h1>

<div class="main-div">
  <form action="/Admin-Attribute-edit" method="post" name="theForm" enctype="multipart/form-data">
  <table width="100%" id="general-table">
      <tr>
        <td class="label">属性名称:</td>
        <td>
          <input type='text' name='attr_name' maxlength="20" value="<?php echo $attrinfo['attr_name'];?>" size='27' />
        </td>
      </tr>
      <tr>
        <td class="label">所属商品类型:</td>
        <td>
          <select name="type_id" id="">
            <option value="">请选择......</option>
            <?php foreach($typedata as $v):?>
              <?php
 if($attrinfo['type_id'] == $v['id']){ $sel = 'selected'; }else{ $sel = ''; } ?>
                <option <?php echo $sel;?> value="<?php echo $v['id'];?>"><?php echo $v['type_name'];?></option>
            <?php endforeach;?>
          </select>
        </td>
      </tr>
      <tr>
        <td class="label">属性类型:</td>
        <td>
          <input type="radio" name="attr_type" id="" value="0" <?php echo $attrinfo['attr_type']=="0"?'checked':'';?> />唯一属性
          <input type="radio" name="attr_type" id="" value="1" <?php echo $attrinfo['attr_type']=="1"?'checked':'';?> />单选属性
        </td>
      </tr>
      <tr>
        <td class="label">属性值的录入方式:</td>
        <td>
          <input type="radio" name="attr_input_type" id="" value="0" <?php echo $attrinfo['attr_input_type']=="0"?'checked':'';?>/>手工输入
          <input type="radio" name="attr_input_type" id="" value="1" <?php echo $attrinfo['attr_input_type']=="1"?'checked':'';?> />从下面的列表中选择(一行代表一个可选值)
        </td>
      </tr>
      <tr>
        <td class="label">可选值列表:</td>
        <td>
          <textarea name="attr_value" id="" cols="40" rows="10"><?php echo $attrinfo['attr_value'];?></textarea>
        </td>
      </tr>
      <input type="hidden" name="id" value="<?php echo $attr_id;?>" />
      <tr>
        <td></td>
        <td>
          <input type="reset" value=" 重置 " /><input type="submit" value=" 确定 " />
        </td>
      </tr>
      </table>
  </form>
</div>

<div id="footer">
共执行 3 个查询，用时 0.021687 秒，Gzip 已禁用，内存占用 2.081 MB<br />
版权所有 &copy; 2005-2010 上海商派网络科技有限公司，并保留所有权利。</div>

</body>
</html>
<script type="text/javascript" src="/Public/Js/jquery.js"></script>
<script>
    $("textarea[name=attr_value]").attr('disabled', true);
    $("input[name=attr_input_type]").click(function(){
        var zhi = $(this).val();
        if(zhi == 1){
          $("textarea[name=attr_value]").attr('disabled', false);
        }else if(zhi == 0){
          $("textarea[name=attr_value]").val('').attr('disabled', true);
        }
    });
</script>