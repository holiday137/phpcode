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
$getaccess = file_get_contents($url);  
$arr=json_decode($getaccess,true);
$access_token=$arr['access_token'];
$openid=$arr['openid'];

$url='https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token.'&openid='.$openid.'&lang=zh_CN';
$getinfo = file_get_contents($url); 
$userinfo=json_decode($getinfo,true);
print_r($userinfo);

	echo '<br />'.'欢迎光临';
?>

</body>
</html>