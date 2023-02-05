<?php 
//include başka php dosyalarını projemize çalıştığımız sayfaya dahil eder.
include 'header.php';

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
         <?php 


         //Delete İşlemleri

         if (isset($_GET['table'])) {


          $delete=$db->delete($_GET['table'],$_GET['id']);

         }


         ?>

         <?php if ($sonuc['status']) {?>
           <div class="alert alert-success">Kayıt Başarılı</div>
         <?php } ?>

         <div class="x_title">



          <h2>Mesajlarım</h2>


        </div>
        <br>  
<div class="row">

<?php 
  $sql=$db->read("mesajlar");

  while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
 ?>
  <div class="col-md-4">
    <div class="card" style="width: 18rem; ">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['name']; ?></h5>
    <h6 class="card-title"><?php echo $row['telno']; ?></h6>
    <h6 class="card-title"><?php echo $row['email']; ?></h6>
    <p class="card-text"><?php echo $row['aciklama']; ?></p>
    <a href="?id=<?php echo $row['mesajlar_id']; ?>&table=mesajlar" class="btn btn-danger">Mesajı Sil</a>
  </div>
</div>
  </div>
<?php } ?>

</div>
  </div>
</div>

<!-- Bitiyor -->




</div>
</div>
</div>
<!-- /page content -->



<?php include 'footer.php'; ?>