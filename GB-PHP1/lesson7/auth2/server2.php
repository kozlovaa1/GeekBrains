<?
session_start();



$login = (isset($_POST['login']))?strip_tags($_POST[login]):'';
$pass= (isset($_POST['pass']))?strip_tags($_POST[pass]):'';
$pass = md5($pass);


$connect = mysqli_connect("localhost","root","","shop");
$sql = "select * from users where login='$login' and pass='$pass'";
$res = mysqli_query($connect,$sql);

if(mysqli_num_rows($res)>0){
	$_SESSION['login'] = $login;
	$_SESSION['pass'] = $pass;
	echo "Вы успешно авторизованы!";
}
else{
	echo "Пользователь не существует!";
}