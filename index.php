<?php require_once 'header.php'; ?>
  <!--==========================
    Intro Section
    ============================-->
    <section id="intro">
       <?php 
           $sql=$db->prepare("SELECT * FROM sliders");
           $sql->execute();
           $saya=$sql->rowCount();
         
?>


      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
     <ol class="carousel-indicators">

      <?php for ($i=0; $i <$saya ; $i++) { ?>
             
      <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" <?php echo $i==0?'class="active"':''; ?>></li>
          
        <?php    } ?>
        </ol>

        <div class="carousel-inner">

    <?php 
      $say=0;
           while($row=$sql->fetch(PDO::FETCH_ASSOC)) {?>


      <div class="carousel-item <?php echo $say==0 ?'active':''; ?>">
            <img height="500" class="d-block w-100" src="img/sliders/<?php echo $row['sliders_file'] ?>" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
              <h5><?php echo $row['sliders_baslik']; ?></h5>
              <p><?php echo $row['sliders_body']; ?></p>
            </div>
          </div>
            


        <?php $say++; }  ?>


        </div>


        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>



    </section><!-- #intro -->

    <main id="main">



    <!--==========================
      Services Section
      ============================-->
      <section id="services">
        <div class="container">
          <div class="section-header">
            <h2>Hizmetlerimiz</h2>

          </div>

          <div class="row">

           <?php 
           $sql=$db->prepare("SELECT * FROM hizmetler");
           $sql->execute();

           while($row=$sql->fetch(PDO::FETCH_ASSOC)) {

             ?>

             <div class="col-lg-4">
              <div class="box wow fadeInLeft">
                <h4><?php echo $row['hizmetler_baslik'] ?></h4>
               <?php echo $row['hizmetler_body'] ?>
              </div>
            </div>
<?php  } ?>


          </div>

        </div>
      </section><!-- #services -->

    <!--==========================
      Clients Section
      ============================-->
      <section id="clients" class="wow fadeInUp">
        <div class="container">
          <div class="section-header">
            <h2>Referanslar</h2>
          </div>

          <div class="owl-carousel clients-carousel">

                       <?php 
           $sql=$db->prepare("SELECT * FROM referanslar");
           $sql->execute();

           while($row=$sql->fetch(PDO::FETCH_ASSOC)) {

             ?>
            <img width="100" height="70" src="img/referanslar/<?php echo $row['referanslar_file']; ?>" alt="">
     
<?php }?>

          </div>

        </div>
      </section><!-- #clients -->

    <!--==========================
      Our Portfolio Section
      ============================-->
      <section id="portfolio" class="wow fadeInUp">
        <div class="container">
          <div class="section-header">
            <h2>Fotoğraflar</h2>

          </div>
        </div>

        <div class="container-fluid">
          <div class="row no-gutters">

           <?php 
           $sql=$db->prepare("SELECT * FROM galerys");
           $sql->execute();

           while($row=$sql->fetch(PDO::FETCH_ASSOC)) {

             ?>

            <div class="col-lg-3 col-md-4">
              <div class="portfolio-item wow fadeInUp">
                <a href="img/galerys/<?php echo $row['galerys_file'] ?>" class="portfolio-popup">
                  <img src="img/galerys/<?php echo $row['galerys_file'] ?>" alt="">
                  <div class="portfolio-overlay">
                    <div class="portfolio-info"><h2 class="wow fadeInUp"></h2></div>
                  </div>
                </a>
              </div>
            </div>
<?php } ?>
  

          </div>

        </div>
      </section><!-- #portfolio -->



    <!--==========================
      İletişim Section
      ============================-->
      <section id="contact" class="wow fadeInUp">
        <div class="container">
          <div class="section-header">
            <h2>İletişim</h2>
            <p></p>
          </div>

          <div class="row contact-info">

            <div class="col-md-6">
              <div class="contact-address">
                <i class="ion-ios-location-outline"></i>
                <h3>Adres</h3>
                <address>Yalova/Çiftlikköy</address>
              </div>
            </div>

            <div class="col-md-6">
              <div class="contact-phone">
                <i class="ion-ios-telephone-outline"></i>
                <h3>Telefon Numarımız</h3>
                <p><a href="tel:+905322719440">+90 532 271 9440</a></p>
              </div>
            </div>



          </div>
        </div>

        <div class="container mb-4">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d756.6360134787211!2d29.311431829229427!3d40.66198001602629!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDDCsDM5JzQzLjEiTiAyOcKwMTgnNDMuMSJF!5e0!3m2!1str!2str!4v1576839794362!5m2!1str!2str" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>

        <div class="container">
          <div class="form">
            <form id="mailgonder" action="" role="form" class="contactForm" enctype="multipart/form-data">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="text" name="name" required="" class="form-control" placeholder="Adınız Soyadınız" />

                </div>
                <div class="form-group col-md-6">
                  <input type="email" class="form-control" required="" name="email" placeholder="Mailiniz" />

                </div>
              </div>
              <div class="form-group">
                <input type="number" class="form-control" required="" name="telno" placeholder="İletişim Numaranız" />

              </div>

              <input type="hidden" name="mailgonderr">

              <div class="form-group">
                <textarea  name="aciklama" placeholder="İşinizle alakalı detay veriniz."  rows="5" class="form-control"></textarea>  
              </div>
              <div class="text-center"><button type="submit">Gönder</button></div>
            </form>
          </div>


        </div>

      </section><!-- #contact -->

    </main>


    <?php require_once 'footer.php'; ?>
    <script>
            // Ckeditor ü  ön tanımlı  ayarları  kullanarak <textarea id="editor1"> nesnesi üzerinde aktif  ediyoruz
            CKEDITOR.replace( 'editor1' );
          </script>

          <script type="text/javascript">
          
          $("#mailgonder").on('submit',(function(e){
            $.ajax({
              url:"nedmin/netting/islem.php",
              type:"POST",
        data:new FormData(this),//hani resim geliyorya onun için form data oluşturduk 
        contentType:false,
        cache:false,//önebellekleme kapatma
        processData:false,
        success:function(data){
            // $("#mesaj").html(data);
            
        veri=JSON.parse(data);//burda dönen verileri jsona çevirdik
        swal("İşlem Sonucu",veri.message,veri.status)//veri.message,veri.status burdaki verileri karşı taraftan gelicek sweet alertteki animasyonları ona göre ayarlıyacaz 
      }

    });

              return false; //post gidiyordu ama sayfa yeniliyordu bunu önlemek için yaptık 
          }));

        </script>