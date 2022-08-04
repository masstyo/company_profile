<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="logo mr-auto">
            <a href="<?php echo site_url('Home') ?>"><img src="<?php echo base_url('assets/'); ?>img/logo_h.png" style="margin: -10px -0px 0px 0px;" alt="Logo <?php echo $namaPerusahaan; ?>"></a>
        </div>

        <!-- ===== Navbar ===== -->
      <nav class="navbar">
        <ul>
          <li><a class="active" href="<?php echo site_url('Home') ?>"><?php echo get_phrase('Beranda') ?></a></li>
          <li><a href="<?php echo site_url('About-us') ?>"><?php echo get_phrase('Tentang Kami') ?></a></li>
          <li><a href="<?php echo site_url('Our-Products') ?>"><?php echo get_phrase('Produk Kami') ?></a></li>
          <li><a href="<?php echo site_url('Photo-Gallery') ?>"><?php echo get_phrase('Galeri Foto') ?></a></li>
          <li><a href="<?php echo site_url('Contacts') ?>"><?php echo get_phrase('Hubungi Kami') ?></a></li>
          <li class="dropdown">
            <a href="#" data-toggle="dropdown">
                <?php echo get_phrase('Pilih Bahasa'); ?>
                <img src="<?php echo base_url('assets/') ?>flag/id.png" class="px-2">&nbsp;
                <img src="<?php echo base_url('assets/') ?>flag/en.png">&nbsp;
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

        <?php foreach ($slider->result() as $result) : ?>

          <!-- Slide -->
          <div class="carousel-item active">
            <div class="carousel-container">
              <div class="carousel-content">
                <img src="<?php echo base_url('assets/') ?>img/<?php echo $result->foto_slider ?>" alt="<?php echo $namaPerusahaan; ?>" style="height: 760px">
              </div>
            </div>
          </div>

          <?php endforeach; ?>
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
      <br><br>

        <div class="row">
        <!-- single-well start-->
        <?php foreach ($tentang->result() as $result) : ?>
        <!-- single-well end-->

          <div class="col-lg-7 justify-content align-items-stretch ">

            <div class="content">
            <h4><strong><?php echo $result->nama_tentang ?></strong></h4>
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
   <div style="background-image: url('assetsuser/assets/img/slide/beranda.jpeg'); position: relative; height:500px;">
   <section id="gallery" class="gallery">
      <div class="container-fluid">

        <div class="section-title">
          <h2><span><?php echo get_phrase('Galeri Foto') ?></span></h2>
        </div>

        <div class="row">
        <?php $a = 0;
          $b = 4;
          foreach ($galeri->result() as $result) {
            $a++;
            if ($a <= $b) { ?>
            <div class="col-lg-3 col-md-4">
              <div class="gallery-item">
                <a href="<?php echo base_url('assets/'); ?>img/<?php echo $result->foto_galeri ?>" class="gallery-lightbox" data-gall="myGallery">
                  <img src="<?php echo base_url('assets/'); ?>img/<?php echo $result->foto_galeri ?>" alt="<?php echo $namaPerusahaan; ?>" class="img-fluid">
                </a>
              </div>
            </div>
          <?php }
          } ?>
        </div>

      </div>
    </section><!-- End Gallery Section -->
    </div>
  </main>