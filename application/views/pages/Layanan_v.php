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
            <li><?php echo get_phrase('Produk Kami') ?></li>
          </ol>
        </div>
      </div>
  </div>
  </section><!-- End Breadcrumbs Section -->
 
  
  <main id="main">
    <!-- ======= Chefs Section ======= -->
    <section id="chefs" class="chefs">
    <?php foreach ($product as $p) : ?>
      <div class="container">

        <div class="section-title">
        <?php if ($this->session->userdata('current_language') == 'English') { ?>
                <h3><?php echo $p['nama_kategori_en']; ?></h3>
              <?php } else { ?>
                <h3><?php echo $p['nama_kategori']; ?></h3>
              <?php } ?>
        </div>

        <div class="row">
        <?php foreach ($gambar->gambarproduk($p['id_kategori'])->result() as $result) : ?>
          <div class="col-md-4 col-sm-4 col-xs-12 wow fadeInUp">
            <div class="member" style="">
              <div class="pic"><img src="<?php echo base_url('assets/'); ?>img/<?php echo $result->foto_layanan ?>" class="img-fluid" alt="<?php echo $result->nama_layanan . ' - ' . $p['nama_kategori'] . ' - ' . $namaPerusahaan; ?>"></div>
              <div class="member-info">
                  <?php if ($this->session->userdata('current_language') == 'English') { ?>
                    <a href="<?php echo site_url('Our-Product/' . str_replace(' ', '-', $result->kategori) . '/' . str_replace(' ', '-', $result->nama_layanan_en)) ?>">
                    <h4><?php echo $result->nama_layanan_en ?></h4>
                    <span><?php echo substr($result->deskripsi_layanan_en, 0, 100) . " ... " ?></span>
                  <?php } else { ?>
                      <a href="<?php echo site_url('Our-Product/' . str_replace(' ', '-', $result->kategori) . '/' . str_replace(' ', '-', $result->nama_layanan)) ?>">
                      <h4><?php echo $result->nama_layanan ?></h4>
                      <span><?php echo substr($result->deskripsi_layanan, 0, 100) . " ... " ?></span>
                  <?php } ?>
                      </a>
                 <div class="see-more text-center col-12">
                  <?php if ($this->session->userdata('current_language') == 'English') { ?>
                    <a href="<?php echo site_url('Our-Products/' . str_replace(' ', '-', $p['nama_kategori_en'])) ?>" class="btn btn-danger"><?php echo get_phrase('Lihat Selengkapnya') ?></a>
                  <?php } else { ?>
                    <a href="<?php echo site_url('Our-Products/' . str_replace(' ', '-', $p['nama_kategori'])) ?>" class="btn btn-danger"><?php echo get_phrase('Lihat Selengkapnya') ?></a>
                  <?php } ?>
                </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>

      </div>
      <?php endforeach; ?>
    </section><!-- End Chefs Section -->
  </main>