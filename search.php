 <!-- ======= Hero Section ======= -->
 <section id="hero" class="d-flex align-items-center" style="background-image: url('assets/img/Background.jpg');">
   <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
     <h1>Incredible Prices on All Your Favorite Items</h1>
     <h2>Design is thinking made visual</h2>
     <a href="#about" class="btn-get-started scrollto">Shop now</a>
   </div>
 </section><!-- End Hero -->

 <main id="main">
   <!-- ======= Clients Section ======= -->
   <section id="clients" class="clients">
     <div class="container">
       <div class="row">
         <div class="col-lg-2 col-md-4 col-6" data-aos="zoom-in" data-aos-delay="100">
           <img src="assets/img/MacBook_Logo.png" class="img-fluid" alt="">
         </div>
         <div class="col-lg-2 col-md-4 col-6" data-aos="zoom-in" data-aos-delay="200">
           <img src="assets/img/Lenovo-logo.png" class="img-fluid" alt="">
         </div>

         <div class="col-lg-2 col-md-4 col-6 " data-aos="zoom-in" data-aos-delay="300">
           <img src="assets/img/HP_logo.png" class="img-fluid" alt="">
         </div>

         <div class="col-lg-2 col-md-4 col-6" data-aos="zoom-in" data-aos-delay="400">
           <img src="assets/img/Dell_logo.png" class="img-fluid" alt="">
         </div>

         <div class="col-lg-2 col-md-4 col-6" data-aos="zoom-in" data-aos-delay="500">
           <img src="assets/img/Asus_Logo.png" class="img-fluid" alt="">
         </div>

         <div class="col-lg-2 col-md-4 col-6" data-aos="zoom-in" data-aos-delay="600">
           <img src="assets/img/Acer_logo.png" class="img-fluid" alt="">
         </div>
       </div>
     </div>
   </section><!-- End Clients Section -->
   <!-- ======= About Section ======= -->
   <section id="about" class="about">
     <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
       <div class="carousel-inner">
         <div class="carousel-item active">
           <img src="assets/img/Hostdeal_1.png" class="d-block w-100" alt="...">
         </div>
         <div class="carousel-item">
           <img src="assets/img/Hostdeal_2.png" class="d-block w-100" alt="...">
         </div>
         <div class="carousel-item">
           <img src="assets/img/Hostdeal_3.png" class="d-block w-100" alt="...">
         </div>
       </div>
     </div>
     <section id="portfolio" class="portfolio">
       <div class="container">
         <div class="section-title" data-aos="fade-left">
           <h2>Products</h2>
         </div>
         <?php 
          if(isset($_POST["search"])){
            $search=$_POST["txt_search"];
            if(trim($search)==""){
              echo "<script type='text/javascript'>alert('Search can not be empty');</script>";
            }
            else{
              echo '<meta http-equiv="refresh" content="0;URL=?page=search&&txt='.$search.'">';
            }
          }
         ?>
         <form action="" method="POST">
         <div class="input-group mb-3" style="width: 300px;">
           <input name="txt_search" type="text" class="form-control" placeholder="Search Name" aria-label="Search" aria-describedby="button-addon2">
           <button name="search" class="btn btn-primary" type="submit" id="button-addon2">Search</button>
         </div>
         </form>
       </div>
       <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
         <?php
          include_once('connection.php');
          if(isset($_GET['txt'])){
              $txt=$_GET['txt'];
          }
          $No = 1;
          $result = mysqli_query($conn, "Select * from product where ProductName like'%$txt%'");
          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          ?>
           <div class="col-lg-3 col-md-6 portfolio-item">
             <div class="portfolio-wrap">
               <img src='product-imgs/<?php echo $row["Img"]; ?>' class="img-fluid" alt="">
               <div class="portfolio-info">
                 <h4><?php echo $row["ProductName"]; ?></h4>
                 <p><?php echo $row["Price"] . "$"; ?></p>
                 <div class="portfolio-links">
                   <?php $addid = $row["ProductID"] ?>
                   <form action="get">
                     <a href="add_cart.php?id=<?php echo $row["ProductID"]; ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="ADD"><i class="fas fa-plus"></i></a>
                     <a href="?page=prodetail&&id=<?php echo $row["ProductID"]; ?>" title="More Details"><i class="fas fa-link"></i></a>
                   </form>
                 </div>
               </div>
             </div>
           </div>
         <?php $No++;
          } ?>
       </div>
       </div>
     </section><!-- End Portfolio Section -->
     </div>
     <!-- ======= Services Section ======= -->
     <section id="services" class="services section-bg">
       <div class="container">
         <div class="row">
           <div class="col-lg-4">
             <div class="section-title" data-aos="fade-right">
               <h2>Services</h2>
               <p>Magnam dolores commodi suscipit nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis
                 commodi quidem hic quas.</p>
             </div>
           </div>
           <div class="col-lg-8">
             <div class="row">
               <div class="col-md-6 d-flex align-items-stretch">
                 <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                   <div class="icon"><i class="far fa-money-bill-alt"></i></div>
                   <h4><a href="">Money</a></h4>
                   <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                 </div>
               </div>

               <div class="col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                 <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
                   <div class="icon"><i class="fas fa-shield-alt"></i></div>
                   <h4><a href="">Security<a></h4>
                   <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                 </div>
               </div>

               <div class="col-md-6 d-flex align-items-stretch mt-4">
                 <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
                   <div class="icon"><i class="fas fa-tachometer-alt"></i></div>
                   <h4><a href="">Speed</a></h4>
                   <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                 </div>
               </div>

               <div class="col-md-6 d-flex align-items-stretch mt-4">
                 <div class="icon-box" data-aos="zoom-in" data-aos-delay="400">
                   <div class="icon"><i class="fas fa-box-open"></i></div>
                   <h4><a href="">Safety</a></h4>
                   <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                 </div>
               </div>

             </div>
           </div>
         </div>
       </div>
     </section><!-- End Services Section -->

     <!-- ======= Contact Section ======= -->
     <section id="contact" class="contact">
       <div class="container">
         <div class="row">
           <div class="col-lg-4" data-aos="fade-right">
             <div class="section-title">
               <h2>Contact</h2>
               <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                 consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat
                 sit in iste officiis commodi quidem hic quas.</p>
             </div>
           </div>

           <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
             <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62860.622740918654!2d105.72255045560397!3d10.03426963394248!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0629f6de3edb7%3A0x527f09dbfb20b659!2zQ2FuIFRobywgTmluaCBLaeG7gXUsIEPhuqduIFRoxqEsIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1617192866308!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
             <div class="info mt-4">
               <i class="fas fa-map-marker-alt"></i>
               <h4>Location:</h4>
               <p> An Khanh ward,
                 Ninh Kieu district,
                 Can Tho city</p>
             </div>
             <div class="row">
               <div class="col-lg-6 mt-4">
                 <div class="info">
                   <i class="far fa-envelope"></i>
                   <h4>Email:</h4>
                   <p>info@T&M.com</p>
                 </div>
               </div>
               <div class="col-lg-6">
                 <div class="info w-100 mt-4">
                   <i class="fas fa-phone"></i>
                   <h4>Call:</h4>
                   <p>033366655</p>
                 </div>
               </div>
             </div>
           </div>
         </div>

       </div>
     </section><!-- End Contact Section -->

 </main><!-- End #main -->