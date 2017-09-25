


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34027655-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();


</script>
<script>

var maxstrlen=100;

function Q(s){return document.getElementById(s);}

function checkWord(c){

len=maxstrlen;

var str = c.value;

myLen=getStrleng(str);

var wck=Q("wordCheck");

if(myLen>len*2){

c.value=str.substring(0,i+1);

}

else{
  document.getElementById('studyNum').innerHTML = 100-Math.floor((len*2-myLen)/2);
wck.innerHTML = Math.floor((len*2-myLen)/2);

}

}

function getStrleng(str){

myLen =0;

i=0;

for(;(i<str.length)&&(myLen<=maxstrlen*2);i++){

if(str.charCodeAt(i)>0&&str.charCodeAt(i)<128)

myLen++;

else

myLen+=2;

}

return myLen;

}

</script>












      <div  class="clearfix" style="height:1%;">

















<div class="lb bd">
<ul>
<?php if ($this->_var['comments']): ?>
<?php $_from = $this->_var['comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'comment');if (count($_from)):
    foreach ($_from AS $this->_var['comment']):
?>
<li class="pinglun"> 
        <div class="touxiang"> 
                    <img src="<?php if ($this->_var['comment']['head_portrait']): ?>data/<?php echo $this->_var['comment']['head_portrait']; ?><?php else: ?>images/tx04.jpg<?php endif; ?>" width="80" height="80">
                    <p><?php if ($this->_var['comment']['username']): ?><?php echo $this->_var['comment']['username']; ?><?php else: ?>匿名用户<?php endif; ?></p> 
        </div> 
        <div class="neirong"> 
          <div class="n1"> 
            <div class="n_r"><span style="float:left">商品评分：</span>
            <?php if ($this->_var['comment']['rank'] == '1'): ?><span class="xxpf_1"></span>
            <?php elseif ($this->_var['comment']['rank'] == '2'): ?>
            <span class="xxpf_1"></span>
            <span class="xxpf_1"></span>
            <?php elseif ($this->_var['comment']['rank'] == '3'): ?><span class="xxpf_1"></span>
                          <span class="xxpf_1"></span>
                          <span class="xxpf_1"></span><?php elseif ($this->_var['comment']['rank'] == '4'): ?><span class="xxpf_1"></span>
                          <span class="xxpf_1"></span>
                          <span class="xxpf_1"></span>
                          <span class="xxpf_1"></span><?php elseif ($this->_var['comment']['rank'] == '5'): ?>
                          
                          <span class="xxpf_1"></span>
                          <span class="xxpf_1"></span>
                          <span class="xxpf_1"></span>
                          <span class="xxpf_1"></span>
                          <span class="xxpf_1"></span>
                          <?php endif; ?>
                <span style="float:left; color:#d40e03"><?php echo $this->_var['comment']['rank']; ?>分</span> 
            </div> 
            <span class="days"><?php echo $this->_var['comment']['add_time']; ?></span> 
          </div> 
          <div class="n2"> 
            <p><?php echo $this->_var['comment']['content']; ?></p> 
            <div class="ym" style="display:none;"> <a href="">有用(1)</a>  <a href="">没用(1)</a>  <a href="">回复(1)</a> </div> 
            <?php if ($this->_var['comment']['re_content']): ?>
            <div class="huifu"> 
              <span class="j"></span> 
              <div class="c"> 
                <p class="guanfang">秀当红酒商城：</p> 
                <p>
<?php echo $this->_var['comment']['re_content']; ?></p> 
              </div> 
            </div>
            <?php endif; ?>
                      </div> 
        </div> 
      </li>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <?php else: ?>
        <li><?php echo $this->_var['lang']['no_comments']; ?></li>
        <!--<?php endif; ?>--
    </ul>
</div>
<div style="clear: both;"></div>






















       <div class="blank"></div>
       
       <div id="pagebar" class="f_r">
        <form name="selectPageForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
        <?php if ($this->_var['pager']['styleid'] == 0): ?>
        <div id="pager">
          <?php echo $this->_var['lang']['pager_1']; ?><?php echo $this->_var['pager']['record_count']; ?><?php echo $this->_var['lang']['pager_2']; ?><?php echo $this->_var['lang']['pager_3']; ?><?php echo $this->_var['pager']['page_count']; ?><?php echo $this->_var['lang']['pager_4']; ?> <span> <a href="<?php echo $this->_var['pager']['page_first']; ?>"><?php echo $this->_var['lang']['page_first']; ?></a> <a href="<?php echo $this->_var['pager']['page_prev']; ?>"><?php echo $this->_var['lang']['page_prev']; ?></a> <a href="<?php echo $this->_var['pager']['page_next']; ?>"><?php echo $this->_var['lang']['page_next']; ?></a> <a href="<?php echo $this->_var['pager']['page_last']; ?>"><?php echo $this->_var['lang']['page_last']; ?></a> </span>
            <?php $_from = $this->_var['pager']['search']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item_0_18903800_1506348406');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item_0_18903800_1506348406']):
?>
            <input type="hidden" name="<?php echo $this->_var['key']; ?>" value="<?php echo $this->_var['item_0_18903800_1506348406']; ?>" />
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </div>
        <?php else: ?>

        
         <div id="pager" class="pagebar">
          <span class="f_l f6" style="margin-right:10px;"><?php echo $this->_var['lang']['total']; ?> <b><?php echo $this->_var['pager']['record_count']; ?></b> <?php echo $this->_var['lang']['user_comment_num']; ?></span>
          <?php if ($this->_var['pager']['page_first']): ?><a href="<?php echo $this->_var['pager']['page_first']; ?>">1 ...</a><?php endif; ?>
          <?php if ($this->_var['pager']['page_prev']): ?><a class="prev" href="<?php echo $this->_var['pager']['page_prev']; ?>"><?php echo $this->_var['lang']['page_prev']; ?></a><?php endif; ?>
          <?php $_from = $this->_var['pager']['page_number']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item_0_18944800_1506348406');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item_0_18944800_1506348406']):
?>
                <?php if ($this->_var['pager']['page'] == $this->_var['key']): ?>
                <span class="page_now"><?php echo $this->_var['key']; ?></span>
                <?php else: ?>
                <a href="<?php echo $this->_var['item_0_18944800_1506348406']; ?>">[<?php echo $this->_var['key']; ?>]</a>
                <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

          <?php if ($this->_var['pager']['page_next']): ?><a class="next" href="<?php echo $this->_var['pager']['page_next']; ?>"><?php echo $this->_var['lang']['page_next']; ?></a><?php endif; ?>
          <?php if ($this->_var['pager']['page_last']): ?><a class="last" href="<?php echo $this->_var['pager']['page_last']; ?>">...<?php echo $this->_var['pager']['page_count']; ?></a><?php endif; ?>
          <?php if ($this->_var['pager']['page_kbd']): ?>
            <?php $_from = $this->_var['pager']['search']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item_0_18994800_1506348406');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item_0_18994800_1506348406']):
?>
            <input type="hidden" name="<?php echo $this->_var['key']; ?>" value="<?php echo $this->_var['item_0_18994800_1506348406']; ?>" />
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            <kbd style="float:left; margin-left:8px; position:relative; bottom:3px;"><input type="text" name="page" onkeydown="if(event.keyCode==13)selectPage(this)" size="3" class="B_blue" /></kbd>
            <?php endif; ?>
        </div>
        

        <?php endif; ?>
        </form>
        <script type="Text/Javascript" language="JavaScript">
        <!--
        
        function selectPage(sel)
        {
          sel.form.submit();
        }
        
        //-->
        </script>
      </div>
      
      <div class="blank5"></div>
      

<div id="boxOverlay"></div>

      
      <div class="i-zixun" id="commentform" style="width: 0px;
    height: 0px;">
        <form id="commentForm" name="commentForm" method="post" enctype="multipart/form-data" onsubmit="submitComment(this)" action="javascript:;">
        <div class="modal in" id="login-modal" style="" aria-hidden="false">
<div class="popup popup_580 dialog_box" style="z-index: 999; width: 580px; height: 432px; position: fixed;display: block;" id="commentPop">
    <div class="title"><em>添加评论</em><a class="close" href="javascript:;" data-dismiss="modal">×</a></div>
    <div class="mn">
        <em>评分：</em>
        <div class="score_star" id="star">
            <ul class="star">
                <li class="on"><a>1</a></li>
                <li class="on"><a>2</a></li>
                <li class="on"><a>3</a></li>
                <li class="on"><a>4</a></li>
                <li class="on"><a>5</a></li> 
            </ul>
            <span id="msg"><strong>5 分</strong> (非常满意)</span>
            <p style="display: none; left: -29px;"><em><b>5</b> 分 非常满意</em></p>
            <input type="hidden" id="score" value="5">
            <input type="hidden" value="" name="comment_rank" id="commentrank">
          <input type="hidden" name="cmt_type" value="<?php echo $this->_var['comment_type']; ?>" />
          <input type="hidden" name="id" value="<?php echo $this->_var['id']; ?>" />
        </div>
    </div>
    <div class="mn">
        <em>添加图片：</em>
        

         <link rel="stylesheet" type="text/css" href="diyUpload/css/webuploader.css">
<link rel="stylesheet" type="text/css" href="diyUpload/css/diyUpload.css">
<script type="text/javascript" src="diyUpload/js/webuploader.html5only.min.js"></script>
<script type="text/javascript" src="diyUpload/js/diyUpload.js"></script>

<style>
*{margin:0; padding:0;}
#box{margin:50px auto; width:540px; min-height:400px; background:#FF9}
#demo{margin:50px auto; width:540px; min-height:800px; background:#CF9}
.parentFileBox{width:554px;}
</style>
<body>


<div>
  <div id="as" style="float:left;   
    height: 15px;" ><img src="themes/miqinew/images/fb_tj.png" width="50" height="50"></div>
</div>
</body>

<script type="text/javascript">

$(function(){ 
$('#star li').each(function(i){
  $(this).click(function(){
    $('#commentrank').val($(this).find('a').html());
    var add = document.getElementById('commentrank').value;
    var sdd = '';
    switch(add){
      case '1':
        sdd = '(很差)';
        break;
      case '2':
        sdd = '(较差)';
        break;
        case '3':
        sdd = '(一般)';
        break;
        case '4':
        sdd = '(比较满意)';
        break;
        case '5':
        sdd = '(非常满意)';
        break;
    }

    document.getElementById('msg').innerHTML = '<strong>'+document.getElementById('commentrank').value+'分</strong>'+sdd;
    $(this).prevAll().addClass('on');
    $(this).addClass('on');
    $(this).nextAll().removeClass('on');
  });
});   
     
    $("#spec-list img").bind("mouseover",function(){
      var src=$(this).attr("src");
      $("#spec-n1 img").eq(0).attr({
        src:src.replace("\/n5\/","\/n1\/"),
        jqimg:src.replace("\/n5\/","\/n0\/")
      });
      $(this).css({
        "border":"2px solid #ff6600",
        "padding":"1px"
      });
    }).bind("mouseout",function(){
      $(this).css({
        "border":"1px solid #ccc",
        "padding":"2px"
      });
    });       
  })






/*
* 服务器地址,成功返回,失败返回参数格式依照jquery.ajax习惯;
* 其他参数同WebUploader
*/

$('#test').diyUpload({
  url:'server/fileupload.php',
  success:function( data ) {
    console.info( data );
  },
  error:function( err ) {
    console.info( err );  
  }
});

$('#as').diyUpload({
  url:'server/fileupload.php',
  success:function( data ) {
    console.info( data );
  },
  error:function( err ) {
    console.info( err );  
  },
  buttonText : '选择文件',
  chunked:true,
  // 分片大小
  chunkSize:512 * 1024,
  //最大上传的文件数量, 总文件大小,单个文件大小(单位字节);
  fileNumLimit:50,
  fileSizeLimit:500000 * 1024,
  fileSingleSizeLimit:50000 * 1024,
  accept: {}
});
</script>







    </div>
    <div class="mn">
        <em>评价：</em>
        <textarea name="content" onKeyUp="javascript:checkWord(this);" onMouseDown="javascript:checkWord(this);" cols="" rows=""></textarea>
        <em style="display:none;color:#FF0000; margin-left:70px;">请输入内容！</em>
    </div>
    <div class="text-3">填写您对此葡萄酒的心得，已输入<em id="studyNum" style="color:#d40e03;font-style:normal;">0</em>个字，例如口味等最多输入<em style="color:color:#d40e03;font-style:normal;" id="wordCheck" >100</em>字</div>
    <div class="bt">
        <span style="float:left; margin-top:10px"><input name="" type="checkbox" value="" style=" float:left; margin:2px 5px 0 80px">使用匿名评论</span>
        <input type="submit" style="    background-color: red;
    border: none;
    width: 118px;
    height: 37px;
    border-radius: 3px;    margin-right: 37px;
    float: right;color: #fff;" value="提交">
    </div>
    </form>
<div class="dialog_close"></div></div>    
    </div>

















              

            </div>
      





      </div>
    <div id="add"></div>
    <div class="blank5"></div>
  
<script type="text/javascript">






//<![CDATA[
<?php $_from = $this->_var['lang']['cmt_lang']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item_0_19033700_1506348406');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item_0_19033700_1506348406']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item_0_19033700_1506348406']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

/**
 * 提交评论信息
*/
function submitComment(frm)
{
  var cmt = new Object;
  //cmt.username        = frm.elements['username'].value;
  cmt.content         = frm.elements['content'].value;
  cmt.type            = frm.elements['cmt_type'].value;
  cmt.id              = frm.elements['id'].value;
  cmt.enabled_captcha = frm.elements['enabled_captcha'] ? frm.elements['enabled_captcha'].value : '0';
  cmt.captcha         = frm.elements['captcha'] ? frm.elements['captcha'].value : '';
  /*zhou edit start*/
  cmt.rank            = frm.elements['comment_rank'].value ? frm.elements['comment_rank'].value : 0 ;
  var aa = $('.diyFileName');
  var cc = '';
  for(var i=0;i<=aa.length-1;i++){
      cc += aa[i].innerHTML+',';
  }
  cmt.tupian = cc;
  //if(cmt.tupian <=0){
      //alert('请先上传图片');
    //return false;
  //}
  if(cmt.rank <= 0)
  {
    alert('请选择评分等级');
    return false;  
  }
  /*zhou edit end*/
/*
  for (i = 0; i < frm.elements['comment_rank'].length; i++)
  {
    if (frm.elements['comment_rank'][i].checked)
    {
       cmt.rank = frm.elements['comment_rank'][i].value;
     }
  }
  */
  

//  if (cmt.username.length == 0)
//  {
//     alert(cmt_empty_username);
//     return false;
//  }



   if (cmt.content.length == 0)
   {
      alert(cmt_empty_content);
      return false;
   }



   Ajax.call('comment.php', 'cmt=' + $.toJSON(cmt), commentResponse, 'POST', 'JSON');
   return false;
}

/**
 * 处理提交评论的反馈信息
*/
  function commentResponse(result)
  {
    if (result.message)
    {
      alert(result.message);
    }

    if (result.error == 0)
    {
      var layer = document.getElementById('ECS_COMMENT');

      if (layer)
      {
        layer.innerHTML = result.content;
      }
    }
    location.reload(false);
  }

//]]>
</script>