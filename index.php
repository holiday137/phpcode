<?php require_once('wx_sample.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>我的新浪云</title>
</head>
<body>
<?php  
	 // $wechatObj = new wechatCallbackapiTest();
	 // $wechatObj->valid();
	$code=$_GET['code'];
	 echo $code;
$url='https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx4c3f6253ec83cade&secret=2bc029f826329a801d840b1fd5b88dbd&code='.$code.
	'&grant_type=authorization_code ';
$html = file_get_contents($url);  
echo $html;  
$arr=json_decode($html,true);
echo $arr['access_token'];
	echo '欢迎光临'
?>

</body>
</html>