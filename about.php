<?php 
define( '_JEXEC', 1 );
include('blocks/bd.php'); 
$result = mysql_query("SELECT title,text FROM settings WHERE page='about'",$db);
if (!$result) {
	echo "<p>Запрос на вывод данных из базы не может быть выполнен. Напишите об этом андминистратору test@test.com<br><strong>Код ошибки:</strong></p>";
	exit(mysql_error());
}
if (mysql_num_rows($result) > 0) {$myrow = mysql_fetch_array($result);}
else {
	echo "<p>Информация по запросу не может быть извлечена. В таблице нет записей.</p>";
	exit();
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title><?php echo $myrow['title']?></title>
<?php include('blocks/head.php')?>
</head>
<body>
<table width="690" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#fff" class="main_border">
	<?php include('blocks/header.php'); ?>
	<tr>
		<td valign="top">
			<table width="100%" cellpadding="0" cellspacing="0" border="0">
				<tr>
					<?php include('blocks/lefttd.php'); ?>
					<td valign="top">
					<?php 
					$n = 4;
					include('blocks/nav.php');
					echo $myrow['text']
					?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<?php include('blocks/footer.php'); ?>
</table>
</body>
</html>