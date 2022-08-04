<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="logo mr-auto">
            <a href="<?php echo site_url('Home') ?>"><img src="<?php echo base_url('assets/'); ?>img/logo_h.png" style="margin: -10px -0px 0px 0px;" alt="Logo <?php echo $namaPerusahaan; ?>"></a>
        </div>

        <!-- ===== Navbar ===== -->
      <nav class="navbar">
        <ul>
          <li><a href="<?php echo site_url('Home') ?>"><?php echo get_phrase('Beranda') ?></a></li>
          <li><a  class="active" href="<?php echo site_url('About-us') ?>"><?php echo get_phrase('Tentang Kami') ?></a></li>
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

  <main id="main">

  <!-- ======= Breadcrumbs Section ======= -->
  <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><?php echo get_phrase('Tentang Kami') ?></h2>
          <ol>
            <li><a href="<?php echo site_url('Beranda_c') ?>" style="color: #000000"><?php echo get_phrase('Beranda') ?></a></li>
            <li><?php echo get_phrase('Tentang Kami') ?></li>
          </ol>
        </div>
      </div>
  </div>
  </section><!-- End Breadcrumbs Section -->
  <br>
  <br>
    
  <!-- ======= About Section ======= -->
  <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
        <?php foreach ($tentang->result() as $result) : ?>

          <div class="col-lg-5 align-items-stretch">
            <a href="#">
              <img src="<?php echo base_url('assets/'); ?>img/<?php echo $result->foto_tentang ?>" alt="<?php echo $namaPerusahaan; ?>" style="width: 500px; margin-top:40px;">
            </a>
          </div>

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch">

            <div class="content">
              <h3><strong><?php echo $result->nama_tentang ?></strong></h3>
              <p>
                  <?php if ($this->session->userdata('current_language') == 'English') { ?>
                    <?php echo $result->deskripsi_tentang_en ?>
                  <?php } else { ?>
                    <?php echo $result->deskripsi_tentang ?>
                  <?php } ?>
              </p>
            </div>

          </div>
        <?php endforeach; ?>
        </div>

      </div>
    </section><!-- End About Section -->
</main><!-- End #main -->