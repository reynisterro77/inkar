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
            //slider kaydet
         if (isset($_POST['sliders_insert'])) {
           $sonuc=$db->insert("sliders",
             $_POST,
             ["form_name"=>"sliders_insert",
             "dir"=>"sliders",
             "file_name"=>"sliders_file",
           ]);
         }

            //hizmetler kaydet
         if (isset($_POST['hizmetler_insert'])) {
           $sonuc=$db->insert("hizmetler",
             $_POST,
             ["form_name"=>"hizmetler_insert",
           ]);
         }

            //referanslar kaydet
         if (isset($_POST['referanslar_insert'])) {
           $sonuc=$db->insert("referanslar",
             $_POST,
             ["form_name"=>"referanslar_insert",
             "dir"=>"referanslar",
             "file_name"=>"referanslar_file",
           ]);
         }

                   //galerys kaydet
         if (isset($_POST['galerys_insert'])) {
           $sonuc=$db->insert("galerys",
             $_POST,
             ["form_name"=>"galerys_insert",
             "dir"=>"galerys",
             "file_name"=>"galerys_file",
           ]);
         }


         //Delete İşlemleri

         if (isset($_GET['table'])) {


          $delete=$db->delete($_GET['table'],$_GET['id'],$_GET['delete_file']);

         }



         ?>

         <?php if ($sonuc['status']) {?>
           <div class="alert alert-success">Kayıt Başarılı</div>
         <?php } ?>

         <div class="x_title">



          <h2>Admin Panel <small> Panele Hoşgeldiniz.</small></h2>


        </div>
        <div class="x_content">

          <h4>Slider</h4>
          <div class="row">
            <div class="col-md-6">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Slider Görseli</th>
                    <th scope="col">Slider Başlık</th>
                    <th scope="col">Slider Body</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                  $sql=$db->read("sliders");
                  $say=0;
                  while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {$say++

                   ?>

                   <tr>
                    <th scope="row"><?php echo $say;?></th>
                    <td><img width="100" src="../../img/sliders/<?php echo $row['sliders_file'];?>"></td>
                    <td><?php echo $row['sliders_baslik'];?></td>
                    <td><?php echo $row['sliders_body'];?></td>
                    <td><a class="btn btn-danger btn-xs" href="?id=<?php echo $row['sliders_id'];?>&table=sliders&delete_file=<?php echo $row['sliders_file'];?>">Sil</a></td>
                  </tr>
                <?php } ?>


              </tbody>
            </table>

            </div>
            <div class="col-md-6">
              <form action="" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                  <label>Resim Seç</label>
                  <div class="row">
                    <div class="col-xs-12"><!-- Mobile dede uyumlu olması için -->
                      <input type="file" name="sliders_file" required="" class="form-control">
                    </div>
                  </div>
                </div>


                <div class="form-group">
                  <label>Slider Başlık</label>
                  <div class="row">
                    <div class="col-xs-12"><!-- Mobile dede uyumlu olması için -->
                      <input type="text" name="sliders_baslik"  class="form-control">
                    </div>
                  </div>
                </div>


                <div class="form-group">
                  <label>Slider Body</label>
                  <div class="row">
                    <div class="col-xs-12"><!-- Mobile dede uyumlu olması için -->
                      <input type="text" name="sliders_body"  class="form-control">
                    </div>
                  </div>
                </div>

                <button class="btn btn-primary" name="sliders_insert" type="submit">Slider Kaydet</button>
              </form>

            </div>
          </div>

         <hr>

          <h4>Hizmetler</h4>
          <div class="row">
            <div class="col-md-6">
              
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Hizmetler Başlık</th>
                    <th scope="col">Hizmetler Body</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                  $sql=$db->read("hizmetler");
                  $say=0;
                  while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {$say++

                   ?>

                   <tr>
                    <th scope="row"><?php echo $say;?></th>
                    <td><?php echo $row['hizmetler_baslik'];?></td>
                    <td><?php echo $row['hizmetler_body'];?></td>
                    <td><a class="btn btn-danger btn-xs" href="?id=<?php echo $row['hizmetler_id'];?>&table=hizmetler">Sil</a></td>
                  </tr>
                <?php } ?>


              </tbody>
            </table>

            </div>
            <div class="col-md-6">
              <form action="" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                  <label>Hizmetler Başlık</label>
                  <div class="row">
                    <div class="col-xs-12"><!-- Mobile dede uyumlu olması için -->
                      <input type="text" name="hizmetler_baslik" required="" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label>Hizmetler Body</label>
                  <div class="row">
                    <div class="col-xs-12"><!-- Mobile dede uyumlu olması için -->
                      <input type="text" name="hizmetler_body" required="" class="form-control">
                    </div>
                  </div>
                </div>

                <button class="btn btn-primary" name="hizmetler_insert" type="submit">Hizmetler Kaydet</button>
              </form>

            </div>
          </div>

 <hr>

          <h4>Referanslar</h4>
          <div class="row">
            <div class="col-md-6">
              
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Referanslar Görseli</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                  $sql=$db->read("referanslar");
                  $say=0;
                  while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {$say++

                   ?>

                   <tr>
                    <th scope="row"><?php echo $say;?></th>
                    <td><img width="100" src="../../img/referanslar/<?php echo $row['referanslar_file'];?>"></td>
                    <td><a class="btn btn-danger btn-xs" href="?id=<?php echo $row['referanslar_id'];?>&table=referanslar&delete_file=<?php echo $row['referanslar_file'];?>">Sil</a></td>
                  </tr>
                <?php } ?>


              </tbody>
            </table>

            </div>
            <div class="col-md-6">
             <form action="" method="POST" enctype="multipart/form-data">

               <div class="form-group">
                <label>Resim Seç</label>
                <div class="row">
                  <div class="col-xs-12"><!-- Mobile dede uyumlu olması için -->
                    <input type="file" name="referanslar_file" required="" class="form-control">
                  </div>
                </div>
              </div>


              <button class="btn btn-primary" name="referanslar_insert" type="submit">Referanslar Kaydet</button>
            </form>   
          </div>
        </div>

 <hr>

        <h4>Fotoğraflar</h4>
        <div class="row">
          <div class="col-md-6">
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fotoğraflar Görseli</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                  $sql=$db->read("galerys");
                  $say=0;
                  while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {$say++

                   ?>

                   <tr>
                    <th scope="row"><?php echo $say;?></th>
                    <td><img width="100" src="../../img/galerys/<?php echo $row['galerys_file'];?>"></td>
                     <td><a class="btn btn-danger btn-xs" href="?id=<?php echo $row['galerys_id'];?>&table=galerys&delete_file=<?php echo $row['galerys_file'];?>">Sil</a></td>
                  </tr>
                <?php } ?>


              </tbody>
            </table>

          </div>
          <div class="col-md-6">
            <form action="" method="POST" enctype="multipart/form-data">

             <div class="form-group">
              <label>Resim Seç</label>
              <div class="row">
                <div class="col-xs-12"><!-- Mobile dede uyumlu olması için -->
                  <input type="file" name="galerys_file" required="" class="form-control">
                </div>
              </div>
            </div>


            <button class="btn btn-primary" name="galerys_insert" type="submit">Fotoğraflar Kaydet</button>
          </form>
        </div>
      </div>



    </div>
  </div>
</div>

<!-- Bitiyor -->




</div>
</div>
</div>
<!-- /page content -->



<?php include 'footer.php'; ?>