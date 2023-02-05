<?php
ob_start();
session_start();
require_once '../netting/class.crud.php'; 
$db=new crud();//sınıfı çalıştırma
// include 'fonksiyon.php';

if (empty($_SESSION["admins"])) {
 header("Location:login.php");
}




//izinsiz giriş
// $kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");
// $kullanicisor->execute(array(
//   'mail' => $_SESSION['kullanici_mail']
//   ));
// $say=$kullanicisor->rowCount();
// $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

// if ($say==0) {

//   Header("Location:login.php?durum=izinsiz");
//   exit;

// }



//1.Yöntem
/*
if (!isset($_SESSION['kullanici_mail'])) {


}
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>İnkar Admin Paneli</title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- Datatables -->
  <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">


 <!-- Dropzone.js -->

  <link href="../vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">



  <!-- Dropzone.js -->

  <script src="../vendors/dropzone/dist/min/dropzone.min.js"></script>
  <!-- Ck Editör -->
  <!--<script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>-->
   <script src="ckeditor/ckeditor.js"></script>


  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
<!--             <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a> -->
          </div>

      

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <!-- <div class="profile_pic">
              <img src="images/img.jpg" alt="..." class="img-circle profile_img">
            </div> -->
            <div class="profile_info">
              <span>Hoşgeldin</span>
              <h2><?php echo $_SESSION["admins"]['admins_adsoyad']; ?></h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>Genel</h3>
              <ul class="nav side-menu">

                <li><a href="index.php"><i class="fa fa-home"></i> Anasayfa </a></li>
                <li><a href="mesaj.php"><i class="fa fa-user"></i> Mesajlar (
                  <?php 
                       $sql=$db->read("mesajlar");         
                echo $row=$sql->rowCount();
                   ?>

                ) </a></li>
               <!--  <li><a><i class="fa fa-cogs"></i> Sayfa İçerik Ayarları <span class="fa fa-cogs"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="genel-ayar.php">Slider Ayarları</a></li>
                    <li><a href="iletisim-ayarlar.php">İletişim Ayarlar</a></li>
                    <li><a href="api-ayarlar.php">Api Ayarlar</a></li>
                    <li><a href="sosyal-ayar.php">Sosyal Ayarlar</a></li>

                  <li><a href="mail-ayar.php">Mail Ayarlar</a></li>



               </ul>
             </li> -->

        <!--      <li><a href="hakkimizda.php"><i class="fa fa-info"></i> Hakkımızda </a></li>

             <li><a href="magazalar.php"><i class="fa fa-shopping-basket"></i> Mağazalar </a></li>

              <li><a href="magaza-onay.php"><i class="fa fa-shopping-basket"></i> Mağaza Başvuruları </a></li>

             <li><a href="kullanici.php"><i class="fa fa-user"></i> Kullanıcılar </a></li>

             <li><a href="urun.php"><i class="fa fa-shopping-basket"></i> Ürünler </a></li>

             <li><a href="menu.php"><i class="fa fa-list"></i> Menüler </a></li>

             <li><a href="kategori.php"><i class="fa fa-list"></i> Kategoriler </a></li>

             <li><a href="slider.php"><i class="fa fa-image"></i> Slider </a></li>

             <li><a href="yorum.php"><i class="fa fa-comments"></i> Yorumlar </a></li>
             
             <li><a href="banka.php"><i class="fa fa-bank"></i> Bankalar </a></li> -->



             

           </ul>
         </div>



       </div>
       <!-- /sidebar menu -->

       <!-- /menu footer buttons -->
   <!--     <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
          <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
          <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout">
          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
      </div> -->
      <!-- /menu footer buttons -->
    </div>
  </div>

  <!-- top navigation -->
  <div class="top_nav">
    <div class="nav_menu">
      <nav>
        <div class="nav toggle">
          <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>

        <ul class="nav navbar-nav navbar-right">
          <li class="">
         


              
              <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Güvenli Çıkış</a></li>
            </ul>
          </li>

       
        </ul>
      </nav>
    </div>
  </div>
        <!-- /top navigation -->