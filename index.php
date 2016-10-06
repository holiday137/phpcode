<?php require_once 'wx_sample.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
	<title>我的新浪云</title>
        <!-- 引入 WeUI -->
        <link rel="stylesheet" href="//res.wx.qq.com/open/libs/weui/1.0.0/weui.css"/>
        <script src="http://rawgit.com/progrape/weui.js/master/dist/weui.js"></script>
         <script src="jquery-3.1.1.min.js"></script>
        <script type="text/javascript">
        	$(function(){
    $('#button').on('click', function(e){
        var pairs = $('form').serialize().split(/&/gi);
        var data = {};
        pairs.forEach(function(pair) {
            pair = pair.split('=');
            data[pair[0]] = decodeURIComponent(pair[1] || '');
        });
        if(!data.name){
            $.weui.topTips('请输入姓名');
            document.write('请输入姓名');
            return;
        }
        if(!data.idcard || !/^(\d{6})(\d{4})(\d{2})(\d{2})(\d{3})([0-9]|X)$/.test(data.idcard)){
            $.weui.topTips('请输入正确的身份证号码');
            return;
        }
    })
})
        </script>
        <link rel="stylesheet" type="text/css" href="index.css"/>
</head>
<body>
<?php
// $wechatObj = new wechatCallbackapiTest();
// $wechatObj->valid();
$code = $_GET['code'];
echo $code;
$url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx4c3f6253ec83cade&secret=2bc029f826329a801d840b1fd5b88dbd&code=' . $code .
    '&grant_type=authorization_code ';
$getaccess    = file_get_contents($url);
$arr          = json_decode($getaccess, true);
$access_token = $arr['access_token'];
$openid       = $arr['openid'];

$url      = 'https://api.weixin.qq.com/sns/userinfo?access_token=' . $access_token . '&openid=' . $openid . '&lang=zh_CN';
$getinfo  = file_get_contents($url);
$userinfo = json_decode($getinfo, true);
print_r($userinfo);

echo '<br />' . '欢迎光临' . '<br/>';
?>

 <a href="javascript:;" class="weui-btn weui-btn_primary">绿色按钮</a>
       <div class="button_sp_area">
<a href="#" class="weui_btn weui-btn_plain-default">按钮</a>
<a href="#" class="weui_btn weui-btn_plain-primary">按钮</a>
<a href="#" class="weui_btn weui-btn_mini weui-btn_primary">按钮</a>
<a href="#" class="weui_btn weui-btn_mini weui-btn_default">按钮</a> </div>
<form>
  <div class="weui-cells_title">制卡进度查询</div>
<div class="weui-cells weui-cells_form">
    <div class="weui-cell">
        <div class="weui-cell_hd">
            <label class="weui-label">姓名</label>
        </div>
        <div class="weui-cell_bd weui-cell_primary">
            <input class="weui-input" name="name" type="text" placeholder="请在此输入姓名" />
        </div>
    </div>
    <div class="weui-cell">
        <div class="weui-cell_hd">
            <label class="weui-label">身份证</label>
        </div>
        <div class="weui-cell_bd weui-cell_primary">
            <input class="weui-input" name="idcard" type="text" placeholder="请在此输入身份证号" />
        </div>
    </div>
</div>
<p class="weui-cells_tips">提示:目前只能查询金融社保卡制卡进度</p>
<div class="weui-btn_area">
    <a class="weui-btn weui-btn_primary" id="button" href="javascript:">查询</a>
</div>
</form>
</body>
</html>