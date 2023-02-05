<?php 
ob_start();
session_start();
require_once 'baglan.php';
require_once 'fonksiyon.php'; //Gönderilecek yerleri kontrol eden bu

if (isset($_POST['mailgonderr'])) {


	$kaydet=$db->prepare("INSERT INTO mesajlar SET
		name=:name,
		email=:email,
		telno=:telno,
		aciklama=:aciklama,
		mesajlar_durum=:mesajlar_durum
		");
	$insert=$kaydet->execute(array(
		'name' => $_POST['name'],
		'email' => $_POST['email'],
		'telno' => $_POST['telno'],
		'aciklama' => $_POST['aciklama'],
		'mesajlar_durum'=>0
		));

	
	$mailKonu=$_POST['email']." Meseajınız var";
	$email=$_POST['email'];
$mesaj=$_POST['aciklama'];
$telno=$_POST['telno'];
$isim=$_POST['name'];
	mailgonder($email,$mailKonu,$isim,$telno,$mesaj);//fonksiyonlara gonderiyoruz
		$data['status']="success";
	$data['message']="Başarıyla Gönderildi.";
 echo json_encode($data);//jsona dönüştürerek anca gönderebiliriz


	



}

 ?>