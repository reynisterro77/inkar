<?php
session_start();
require_once 'dbconfig.php';

class crud {

	private $db;
	private $dbhost=DBHOST;
	private $dbuser=DBUSER;
	private $dbpass=DBPWD;
	private $dbname=DBNAME;


	function __construct() {

		try {

			$this->db=new PDO('mysql:host='.$this->dbhost.';dbname='.$this->dbname.';charset=utf8',$this->dbuser,$this->dbpass);

		// echo "Bağlantı Başarılı";

		} catch (Exception $e) {

			die("Bağlantı Başarısız:".$e->getMessage());
		}

	}	



//burdakişey  admins_namesurname=?,admins_username=?,admins_pass=?,admins_status=? bunu yapıyor yani gönderilen formdaki yazılması gereken koda çeviriyor
	public function addValue($argse){
		$values=implode(',', array_map(function($item){
			return $item.'=?';
}, array_keys($argse))); //implode dizileri birleştirmeye yarıyor

		return $values;
	}


	public function insert($table,$values,$options=[]){ //$options=[] dizi şeklinde ek parametre göndermek istersek yazıyoruz valueste verilerin tutulduğu alan 


		try {

		// print_r($_FILES[$options['file_name']]);
		// 	echo "<pre>";
		// 	print_r($_POST);
		// 	echo "</pre>";

		// 	echo "<pre>";
		// 	print_r($values);
		// 	echo "</pre>";

		// 	echo "<pre>";
		// 	print_r($options);
		// 	echo "</pre>";
		// 	exit;









if (!empty($_FILES[$options['file_name']]['name'])) {

		$name_y=$this->imageUpload( //resim uptade yapmak için aşşığdaki dosyaya bu parametreleri göndermek lazım bizde insetteki resim yükleme yapacağımız için gödermek zorundayız.   name_y = aşağıdaki returnla kodu döndürdük dönen değeri name_y değişkenine attık bu name_y dosya ismidir. $values+=[$options['file_name']=>$name_y]; dosya ismini yazdır anlamaında


			$_FILES[$options['file_name']]['name'],
			$_FILES[$options['file_name']]['size'],
			$_FILES[$options['file_name']]['tmp_name'],
			$options['dir'],
			$values[$options['file_delete']]//resim updati için önceki resim dosya yolu


		);

 // kodu test etme return dönen dosya ismini yazdırdık
// echo "<pre>";
// 		print_r($name_y);
// 		exit;



		       if (!$name_y['status']) {//eklenen düzenleme
		       	return ['status' => FALSE, 'error' => $name_y['error']];
		       	exit;
		       }
		$values+=[$options['file_name']=>$name_y]; //+= ekleme oluyor

		
	}




		if (isset($values[$options['form_name']])) { //buttondan gelen name kaldırma form namede buttonun ismini gönderip burda sildiyorum
			unset($values[$options['form_name']]);
		}


			// echo "<pre>";
			// print_r($_POST);
			// echo "</pre>";

			// echo "<pre>";
			// print_r($values);
			// echo "</pre>";

			// echo "<pre>";
			// print_r($options);
			// echo "</pre>";
			// exit;

	$stmt=$this->db->prepare("INSERT INTO $table SET {$this->addValue($values)}");

	$stmt->execute(array_values($values));

	return ['status'=> TRUE];

header("Refresh: 60;");

	
} catch (Exception $e) {
	return ['status' => FALSE, 'error' => $e->getMessage()];
}


}











public function imageUpload($name,$size,$tmp_name,$dir,$file_delete=null){
//resim yükleme işini genelliştiriyoruz

	try {

		$izinli_uzantilar=[

			'jpg',
			'jpge',
			'png',
			'ico',
			'svg'
		];

				$ext=strtolower(substr($name, strpos($name, '.')+1));  //strtolower ufak harfe çevirmeye yarıyor. substrde kesme hangi harften sonra kesecek strposta aratılan değerin konumunu veriyor yüklenen dosyanın uzantısını veriyor kısaca bu işlem doyanın uzuntasını veriyor

if (in_array($ext, $izinli_uzantilar)===false) {//in array dizinin içinde arama yapar === 3eşit denklink demektir 

	throw new Exception('bu dosya türü kabul edilmez.');

}

if ($size>3048576) {//dosyanın boyutunu verir

	throw new Exception('bu dosya boyutu kabul edilmez.');
}

$name_y=uniqid().".".$ext;//benzeersiz 13 karakter kullanırı ext uzantısı

if (!@move_uploaded_file($tmp_name, "../../img/$dir/$name_y")) {//yükleme başarısızsa bu işlemleri yap yoksa devam et dosya yükleme yeri,optionstan gelen dosya ismi ve $name değişkeninden üretilen yeni dosya isminiyle yükle dizi şeklideyse {} arasında yazılır

throw new Exception('dosya yükleme hatası :/');

}


return $name_y;//döndürme 



} catch (Exception $e) {
	return ['status' => FALSE, 'error' => $e->getMessage()];
	
}


}


public function adminsLogin($admins_username,$admins_pass) {
	
	try {


		$stmt=$this->db->prepare("SELECT * FROM admins WHERE admins_username=? AND admins_pass=?");
		

			$stmt->execute([$admins_username,md5($admins_pass)]);


				//$stmt->execute([$admins_username,md5($admins_pass)]); //ilk hali if olmadan sadece bu vardı beni hatırlardan sonra yukarkini yaptık




		if ($stmt->rowCount()==1) {

			$row=$stmt->fetch(PDO::FETCH_ASSOC);


			$_SESSION["admins"]=[
				"admins_username" => $admins_username,
				"admins_namesurname" => $row['admins_namesurname'],
				"admins_adsoyad" => $row['admins_adsoyad'],
			
			];

			

			return ['status' => TRUE];


		} else {

			return ['status' => FALSE ];

		}


	} catch (Exception $e) {

		return ['status' => FALSE, 'error' => $e->getMessage()];

	}


}


public function read($table){
	try {


		$stmt=$this->db->prepare("SELECT * FROM $table");
		$stmt->execute();

		return $stmt;

	} catch (Exception $e) {

		echo $e->getMessage();
		return false;
	}

}

public function delete($table,$id,$delete_file=null){
	try {


 $colums=$table."_"."id";

 if (!empty($delete_file)) {
 	unlink("../../img/$table/$delete_file");//resim sildirme
 }

// $columsa=$table."_"."id=".$id;
 // $columsa=array($colums=>$id);
// echo "<pre>";
// print_r($columsa);
// echo "</pre>";
// exit();
		$stmt=$this->db->prepare("DELETE FROM $table where $colums={$id}");
		$stmt->execute();

		return $stmt;

	} catch (Exception $e) {

		echo $e->getMessage();
		return false;
	}

}




}

?>