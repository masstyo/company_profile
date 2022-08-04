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
          <li><a href="<?php echo site_url('About-us') ?>"><?php echo get_phrase('Tentang Kami') ?></a></li>
          <li><a class="active" href="<?php echo site_url('Our-Products') ?>"><?php echo get_phrase('Produk Kami') ?></a></li>
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

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2></h2>
          <ol>
            <li><a href="<?php echo site_url('Beranda_c') ?>" style="color: #000000"><?php echo get_phrase('Beranda') ?></a></li>
            <li><a href="<?php echo site_url('Produk Kami') ?>"  style="color: #000000"><?php echo get_phrase('Produk Kami') ?></a></li>
            <li><?php echo get_phrase('Produk Detail') ?></li>
          </ol>
        </div>
      </div>
  </div>
  </section><!-- End Breadcrumbs Section -->

<main id="main">
<!-- ======= Specials Section ======= -->
<section id="specials" class="specials">
      <div class="container">

        <div class="section-title">
          <h2><span><?php echo get_phrase('Produk Detail') ?></span></h2>
        </div><br><br>

          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <a href="#">
                        <h2 class="sec-head-d"><span><?php echo str_replace('-', ' ', $nama) ?></span></h2>
                    </a>
                    <p class="fst-italic"><?php if ($this->session->userdata('current_language') == 'English') { ?>
                        <?php echo $detail->deskripsi_layanan_en ?>
                        <?php } else { ?>
                        <?php echo $detail->deskripsi_layanan ?>
                        <?php } ?>
                    </p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                      <div class="gallery-item">
                        <a href="<?php echo base_url('assets/'); ?>img/<?php echo $detail->foto_layanan ?>"  data-gall="myGallery" class="gallery-lightbox">
                          <img src="<?php echo base_url('assets/'); ?>img/<?php echo $detail->foto_layanan ?>" alt="<?php echo $detail->nama_layanan . ' - ' . $kategori->nama_kategori . ' - ' . $namaPerusahaan; ?>">
                        </a>
                      </div>
                  </div>
                </div>
              </div>              
            </div>
          </div>

      </div>
    </section><!-- End Specials Section -->
</main><!-- End #main -->