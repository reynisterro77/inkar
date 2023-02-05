<?php 

try {
	
$db=new PDO("mysql:host=localhost;dbname=inkar;charset=utf8",'root','melihkara77');
// echo "başarılı";

} catch (PDOException $e) {//hata ayıklama
	echo $e->getMessage();
}




//baglan.php heryere dahil olduğu için phpmailler uygulmasını burda yaptık
require_once 'class.phpmailer.php';
 ?>