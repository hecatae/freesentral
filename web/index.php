<?
require_once("config.php");
require_once("framework.php");
require_once("menu.php");
require_once("lib.php");
require_once("lib_custom.php");

include_classes();

require_once("set_debug.php");

$_SESSION["warning_on"] = true;
$_SESSION["notice_on"] = true;
 
//session_start();

if (isset($_SESSION['user']) && isset($_SESSION['level']))
	header ("Location: main.php");

$username = getparam("username");
$password = getparam("password");
$login = "";

$user = new User;
$user->username = $username;
$user->password = $password;
if($user->login())
	$level = 'admin';
else{
	$extension = new Extension;
	$extension->extension = $username;
	$extension->password = $password;
	if ($extension->login())
		$level = 'extension';
	else
		$level = NULL;
}

if ($level) {
	$_SESSION['user'] = $username;
	$_SESSION['username'] = $username;
	$_SESSION['user_id'] = ($level == "admin") ? $user->user_id : $extension->extension_id;
	$_SESSION['level'] = $level;
	header ("Location: main.php");
}else
	if ($username || $password)
		$login = "<h3>Wrong login<h3>";
	else
		session_unset();
?>
<html>
<title>FreeSentral</title>
<body>
	<? get_login_form(); ?>
</body>
</html>