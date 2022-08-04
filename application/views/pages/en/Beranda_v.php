<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="logo mr-auto">
            <a href="<?php echo site_url('Beranda_c') ?>"><img src="<?php echo base_url('assets/'); ?>img/logo_h.png" style="margin: -10px -0px 0px 0px;" alt="Logo <?php echo $namaPerusahaan; ?>"></a>
        </div>

        <!-- ===== Navbar ===== -->
      <nav class="navbar">
        <ul>
          <li class="active"><a href="<?php echo site_url('Home') ?>"><?php echo get_phrase('Beranda') ?></a></li>
          <li><a href="<?php echo site_url('About-us') ?>"><?php echo get_phrase('Tentang Kami') ?></a></li>
          <li><a href="<?php echo site_url('Our-Products') ?>"><?php echo get_phrase('Produk Kami') ?></a></li>
          <li><a href="<?php echo site_url('Photo-Gallery') ?>"><?php echo get_phrase('Galeri Foto') ?></a></li>
          <li><a href="<?php echo site_url('Contacts') ?>"><?php echo get_phrase('Hubungi Kami') ?></a></li>
          <li class="dropdown">
            <a href="#" data-toggle="dropdown">
                <?php echo get_phrase('Pilih Bahasa'); ?>
                <i class="bi bi-chevron-down"></i>
            </a>
            <ul class="dropdown dropdown-light-blue dropdown-caret">
                <?php
                $fields = $this->db->list_fields('language');
                foreach ($fields as $field) {
                if ($field == 'phrase_id' || $field == 'phrase') continue;
                ?>
              <li>
                <a href="<?php echo base_url(); ?>Multilanguage/select_language/<?php echo $field; ?>" style="color:black;">
                <?php echo $field; ?>
                <?php //selecting current language
                  if ($this->session->userdata('current_language') == $field) : ?>
                    <i class="icon-ok"></i>
                <?php endif; ?>
                </a>
              </li>
                <?php 
                }
                ?>
            </ul>
          </li>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url(assetsuser/assets/img/slide/slide-1.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background-image: url(assetsuser/assets/img/slide/slide-2.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background-image: url(assetsuser/assets/img/slide/slide-3.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
      <div class="container-fluid">

      <div class="row-content">
        <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="section-title text-center" data-aos="fade-up">
                <h2 style="text-style: bold;"><?php echo get_phrase('Tentang Kami') ?></h2>
              </div>
          </div>
      </div>

        <div class="row">
        <!-- single-well start-->
        <?php foreach ($tentang->result() as $result) : ?>
        <!-- single-well end-->

          <div class="col-lg-7 justify-content align-items-stretch ">

            <div class="content">
              <h3 class="sec-head"><strong><?php echo $result->nama_tentang ?></strong></h3><br><br>
              <p>
                <?php if ($this->session->userdata('current_language') == 'English') { ?>
                  <?php echo substr($result->deskripsi_tentang_en, 0, 1000) . '...' ?>
                <?php } else { ?>
                  <?php echo substr($result->deskripsi_tentang, 0, 1000) . '...' ?>
                <?php } ?>
              </p>
              <a href="<?php echo site_url('About-us') ?>" class="btn btn-success"><?php echo get_phrase('selengkapnya') ?></a>
            </div>

          </div>
          
          <div class="col-lg-5 d-flex flex-column  align-items-stretch">
            <a href="#">
              <img src="<?php echo base_url('assets/'); ?>img/<?php echo $result->foto_tentang ?>" style="width: 500px; margin-top:100px;" alt="<?php echo $namaPerusahaan; ?>">
            </a>
          </div>

        </div>
        <?php endforeach; ?>
      </div>
    </section><!-- End About Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div style="background-image: url('assetsuser/assets/img/slide/slide-3.jpg'); position: relative; height: 450px;">
      <div class="test-overly"></div>
        <div class="skill-bg area-padding-2">
          <div class="container">
            <div class="row wow fadeInDown">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="section-headline text-center">
                  <h3><span><strong style="color: #ffffff"><?php echo get_phrase('Galeri Foto') ?></strong></span></h3>
                  </div>
                </div>
            </div>
            <br>
            <br>
            <div class="row g-4">
              <?php $a = 0;
                  $b = 4;
              foreach ($galeri->result() as $result) {
                  $a++;
              if ($a <= $b) { ?>
              
              <div class="col-lg-3 col-md-3 ">
                <div class="gallery-item">
                  <a href="#" class="gallery-lightbox"><img src="<?php echo base_url('assets/'); ?>img/<?php echo $result->foto_galeri ?>" alt="<?php echo $namaPerusahaan; ?>" class="img-fluid">
                  <div class="add-actions-2 text-center">
                    <div class="project-dec">
                      <a class="venobox" data-gall="myGallery" href="<?php echo base_url('assets/'); ?>img/<?php echo $result->foto_galeri ?>"></a>
                    </div>
                  </div>
                  </a>
                </div>
              </div>

              <?php }
          }   ?>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Gallery Section -->
  </main>