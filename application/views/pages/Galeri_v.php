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
          <li><a href="<?php echo site_url('Our-Products') ?>"><?php echo get_phrase('Produk Kami') ?></a></li>
          <li><a class="active" href="<?php echo site_url('Photo-Gallery') ?>"><?php echo get_phrase('Galeri Foto') ?></a></li>
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
          <h2><?php echo get_phrase('Galeri Foto') ?></h2>
          <ol>
            <li><a href="<?php echo site_url('') ?>" style="color: #000000"><?php echo get_phrase('Beranda') ?></a></li>
            <li><?php echo get_phrase('Galeri Foto') ?></li>
          </ol>
        </div>
      </div>
  </div>
  </section><!-- End Breadcrumbs Section -->

<main id="main">

<!-- ======= Gallery Section ======= -->
<section id="gallery" class="gallery">
      <div class="container-fluid">

        <div class="section-title">
          <h2><span><?php echo get_phrase('Galeri Foto') ?></span></h2>
        </div><br><br>

        <?php foreach ($album as $a) : ?>
        <div class="gallery-item" style="text-align: center;">
              <?php if ($this->session->userdata('current_language') == 'English') { ?>
                <h3><?php echo $a['nama_album_en']; ?></h3>
              <?php } else { ?>
                <h3><?php echo $a['nama_album']; ?></h3>
              <?php } ?>
            </div>

          <div class="row">

            <?php foreach ($galeri->getPhotoByAlbum($a['id_album'])->result() as $result) : ?>
              <div class="col-lg-4 col-md-4">
                <div class="gallery-item">
                  <a href="<?php echo base_url('assets/'); ?>img/<?php echo $result->foto_galeri ?>" data-gall="myGallery" class="gallery-lightbox">
                    <img src="<?php echo base_url('assets/'); ?>img/<?php echo $result->foto_galeri ?>" alt="<?php echo $a['nama_album'] . ' - ' . $namaPerusahaan; ?>" class="img-fluid">
                  </a>
                </div>
              </div>
            <?php endforeach; ?>

            <div class="text-center col-12"><br>
							<?php if ($this->session->userdata('current_language') == 'English') { ?>
								<a href="<?php echo site_url('Photo-Gallery/' . str_replace(' ', '-', $a['nama_album_en'])) ?>" class="btn btn-danger"><?php echo get_phrase('Lihat Selengkapnya') ?></a>
							<?php } else { ?>
								<a href="<?php echo site_url('Photo-Gallery/' . str_replace(' ', '-', $a['nama_album'])) ?>" class="btn btn-danger"><?php echo get_phrase('Lihat Selengkapnya') ?></a>
							<?php } ?>
						</div>

          </div>
        <?php endforeach; ?>
        </div>
      </div>
    </section><!-- End Gallery Section -->
</main>