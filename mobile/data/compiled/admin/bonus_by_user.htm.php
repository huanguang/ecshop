<!-- $Id: bonus_by_user.htm 15589 2009-02-10 09:24:05Z sunxiaodong $ -->
<?php echo $this->fetch('pageheader.htm'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../data/static/js/utils.js')); ?>

<div class="main-div">
<form action="bonus.php" method="post" name="theForm2" onsubmit="return validate2()">
  <table width="100%">
  <tr>
    <td class="label"><?php echo $this->_var['lang']['senduserrank']; ?>:</td>
    <td>
      <select name="rank_id">
      <option value="0"><?php echo $this->_var['lang']['select_rank']; ?></option>
      <?php echo $this->html_options(array('options'=>$this->_var['ranklist'],'selected'=>$_GET['rank_id'])); ?>
      </select>&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="validated_email" value="1"><?php echo $this->_var['lang']['validated_email']; ?>
    </td>
  </tr>
  <tr>
     <td style="text-align:center" colspan =2>
     <input type="submit" name="send_rank" value="<?php echo $this->_var['lang']['confirm_send_bonus']; ?>" class="button" />
     </td>
   </tr>
</table>
<input type="hidden" name="act" value="send_by_user" />
<input type="hidden" name="id" value="<?php echo $this->_var['id']; ?>" />
</form>


</div>

<div class="main-div">
<form name="theForm" action="bonus.php" method="post" onsubmit="return validate();">
<div class="form-div">
<img src="images/icon_search.gif" border="0" alt="SEARCH" /><?php echo $this->_var['lang']['keywords']; ?>
      <input type="text" name="keyword" size="30" />
      <input type="button" name="search" value="<?php echo $this->_var['lang']['button_search']; ?>" onclick="searchUser();" />
</div>
<div class="list-div">
<table cellspacing='1' cellpadding='3'>
  <tr>
    <th><?php echo $this->_var['lang']['userlist']; ?></th>
    <th><?php echo $this->_var['lang']['handler']; ?></th>
    <th><?php echo $this->_var['lang']['send_to_user']; ?></th>
  </tr>
  <tr>
    <td width="45%" align="center">
      <select name="user_search[]" id="user_search" size="15" style="width:260px" ondblclick="addUser()" multiple="true">
      </select>
    </td>
    <td align="center">
      <p><input type="button" value="&gt;" onclick="addUser()" class="button" /></p>
      <p><input type="button" value="&lt;" onclick="delUser()" class="button" /></p>
    </td>
    <td width="45%" align="center">
      <select name="user[]" id="user" multiple="true" size="15" style="width:260px" ondblclick="delUser()">
      </select>
    </td>
  </tr>
  <tr>
    <td align="center" colspan="3"><input type="submit" name="send_user" value="<?php echo $this->_var['lang']['confirm_send_bonus']; ?>" class="button" /></td>
  </tr>
</table>
</div>
<input type="hidden" name="id" value="<?php echo $this->_var['id']; ?>" />
<input type="hidden" name="act" value="send_by_user" />
</form>
</div>


<script language="JavaScript">
<!--
document.forms['theForm'].elements['keyword'].focus();

onload = function()
{
    // 开始检查订单
    startCheckOrder();
}
/**
* 按用户名搜索用户
*/
function searchUser()
{
  var eles = document.forms['theForm'].elements;

  /* 填充列表 */
  var keywords = Utils.trim(eles['keyword'].value);
  if (keywords != '')
  {
    Ajax.call('bonus.php?is_ajax=1&act=search_users', 'keywords=' + keywords, searchUserResponse, "GET", "JSON");
  }
}

function searchUserResponse(result)
{
  var eles = document.forms['theForm'].elements;
  eles['user_search[]'].length = 0;

  if (result.error == 0)
  {
    for (i = 0; i < result.content.length; i++)
    {
      var opt = document.createElement('OPTION');
      opt.value = result.content[i].user_id;
      opt.text  = result.content[i].user_name;
      eles['user_search[]'].options.add(opt);
    }
  }
}

function validate2()
{
    var user_rank = document['theForm2'].elements['rank_id'].value;

    if (user_rank == 0)
    {
        alert(user_rank_empty);
        return false;
    }
    return true;
}

var submiting = false;

function validate()
{
  if(!submiting)
  {
    var idArr = new Array();
    var dest = document.getElementById('user');
    for (var i = 0; i < dest.options.length; i++)
    {
        dest.options[i].selected = "true";
        idArr.push(dest.options[i].value);
    }
    if (idArr.length <= 0)
    {
        alert(user_name_empty);
        return false;
    }
    else
    {
        submiting = true;
        return true;
    }
  }
  else
  {
    alert('Submitting...');
    return false;
  }
}

  function addUser()
  {
      var src = document.getElementById('user_search');
      var dest = document.getElementById('user');

      for (var i = 0; i < src.options.length; i++)
      {
          if (src.options[i].selected)
          {
              var exist = false;
              for (var j = 0; j < dest.options.length; j++)
              {
                  if (dest.options[j].value == src.options[i].value)
                  {
                      exist = true;
                      break;
                  }
              }
              if (!exist)
              {
                  var opt = document.createElement('OPTION');
                  opt.value = src.options[i].value;
                  opt.text = src.options[i].text;
                  dest.options.add(opt);
              }
          }
      }
  }

  function delUser()
  {
      var dest = document.getElementById('user');

      for (var i = dest.options.length - 1; i >= 0 ; i--)
      {
          if (dest.options[i].selected)
          {
              dest.options[i] = null;
          }
      }
  }

//-->
</script>

<?php echo $this->fetch('pagefooter.htm'); ?>