<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {

  /* OptionTree is not loaded yet, or this is not an admin request */
  if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
    return false;

  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( ot_settings_id(), array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
      ),
    'sections'        => array( 
      array(
        'id'          => 'general_tab',
        'title'       => 'General'
        ),
      array(
        'id'          => 'banner',
        'title'       => 'Banner'
        ),
      array(
        'id'          => 'stylish',
        'title'       => 'Stylish'
        ),
      array(
        'id'          => 'sosial_media',
        'title'       => 'Sosial Media'
        ),
      array(
        'id'          => 'typografi',
        'title'       => 'Typografi'
        ),
      array(
        'id'          => 's',
        'title'       => 'SEO'
        ),
      array(
        'id'          => 'imasta_agc',
        'title'       => 'iMasta AGC'
        ),
      array(
        'id'          => 'setting_lainnya',
        'title'       => 'Setting lainnya'
        )
      ),
    'settings'        => array( 
        array(
          'label'       => 'Your Favicon',
          'id'          => 'imasta_favicon',
          'type'        => 'upload',
          'desc'        => 'Upload icon favicon di sini.',
          'std'         =>  get_template_directory_uri().'/images/icons/copy-icon.png',
          'rows'        => '',
          'post_type'   => '',
          'taxonomy'    => '',
          'class'       => '',
          'section'     => 'general_tab'
        ),
      array(
        'id'          => 'imasta_logo_actived',
        'label'       => 'Aktifkan gambar logo?',
        'desc'        => 'Pilih \'ya\' jika ingin mengganti logo dengan gambar. Pilih \'tidak\' jika ingin menonaktifkannya',
        'std'         => 'yes',
        'type'        => 'radio',
        'section'     => 'general_tab',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'yes',
            'label'       => 'Ya',
            'src'         => ''
            ),
          array(
            'value'       => 'no',
            'label'       => 'Tidak',
            'src'         => ''
            )
          )
        ),
      array(
        'id'          => 'imasta_logo',
        'label'       => 'Unggah logo anda',
        'desc'        => 'Unggah gambar logo anda. Default width:232px and height:90px.',
        'std'         => 'http://homecooldesign.net/banner/header-logo.png',
        'type'        => 'upload',
        'section'     => 'general_tab',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'imasta_logo_actived:is(yes),imasta_logo_actived:not()',
        'operator'    => 'and'
        ),
      array(
        'label'       => 'Enable breadcrumbs?',
        'id'          => 'imasta_breadcrumbs',
        'type'        => 'radio',
        'desc'        => 'Silahkan pilih Ya untuk mengaktifkan breadcrumbs',
        'choices'     => array(
          array (
            'label'       => 'Ya',
            'value'       => 'yes'
            ),
          array (
            'label'       => 'Tidak',
            'value'       => 'no'
            )
          ),
        'std'         => 'yes',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'general_tab'
        ),
      array(
        'label'       => 'Teks kredit footer',
        'id'          => 'imasta_footcredits',
        'type'        => 'textarea-simple',
        'desc'       => 'Silahkan isi kredit footer anda di sini.',
        'std'         => '&copy; 2016 Theme by <a href="http://www.wordpress.org">Theme Keren</a>',
        'rows'        => '3',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'general_tab'
      ),
      array(
        'id'          => 'imasta_hdr_bnr',
        'label'       => 'Header Banner',
        'desc'        => 'Isi kan kode banner header (728x90)',
        'std'         => '<a href="#"><img class="responsive-img hover-img" src="https://i.imgsafe.org/a350114.png" alt="banner_728x90" /></a>',
        'type'        => 'textarea-simple',
        'section'     => 'banner',
        'rows'        => '3',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'imasta_hdr_bnr_bfr_ttl',
        'label'       => 'Header Single Banner Before Title',
        'desc'        => 'Isikan kode single banner sebelum judul (468x60)',
        'std'         => '<a href="#"><img class="responsive-img hover-img" src="http://s11.postimg.org/vqp32e2f7/468.png" alt="banner_468x60" /></a>',
        'type'        => 'textarea-simple',
        'section'     => 'banner',
        'rows'        => '3',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
        ),
/*      array(
        'id'          => 'imasta_hdr_bnr_aft_ttl',
        'label'       => 'Header Single Banner After Title',
        'desc'        => 'Isikan kode single banner setelah judul (468x60)',
        'std'         => '<a href="#"><img class="responsive-img hover-img" src="http://homecooldesign.net/banner/468.png" alt="banner_468x60" />',
        'type'        => 'textarea-simple',
        'section'     => 'banner',
        'rows'        => '3',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
        ),*/
      array(
        'id'          => 'imasta_ftr_bnr',
        'label'       => 'Footer Banner',
        'desc'        => 'Isi kan kode banner footer (728x90). Kosongkan jika ingin menonaktifkan.',
        'std'         => '<a href="#"><img class="responsive-img hover-img" src="http://s12.postimg.org/538vnwk99/728.png" alt="banner_728x90" /></a>',
        'type'        => 'textarea-simple',
        'section'     => 'banner',
        'rows'        => '3',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
        ),
      array(
          'id'          => 'imasta_sb_layout',
          'label'       => 'Sidebar Layout',
          'type'        => 'radio-image',
          'desc'        => 'Plih style sidebar mu.',
          'choices'     => array(
            array (
                'value'   => 'left-sidebar',
                'label'   => __( 'Left Sidebar', 'option-tree' ),
                'src'     => OT_URL . 'assets/images/layout/left-sidebar.png'
              ),
            array (
                'value'   => 'right-sidebar',
                'label'   => __( 'Right Sidebar', 'option-tree' ),
                'src'     => OT_URL . 'assets/images/layout/right-sidebar.png'
              )
            ),
          'std'         => 'right-sidebar',
          'rows'        => '',
          'post_type'   => '',
          'taxonomy'    => '',
          'class'       => '',
          'section'     => 'stylish'
          ),
      array(
          'id'          => 'imasta_ft_layout',
          'label'       => 'Footer Layout',
          'type'        => 'radio-image',
          'desc'        => 'Plih style footer mu.',
          'choices'     => array(
            array (
                'value'   => 'three-footers',
                'label'   => __( 'Tree Footers', 'option-tree' ),
                'src'     => OT_URL . 'assets/images/layout/onethird_onethird_onethird.png'
              ),
            array (
                'value'   => 'four-footers',
                'label'   => __( 'Four Footers', 'option-tree' ),
                'src'     => OT_URL . 'assets/images/layout/onefourth_onefourth_onefourth_onefourth.png'
              )
            ),
          'std'         => 'four-footers',
          'rows'        => '',
          'post_type'   => '',
          'taxonomy'    => '',
          'class'       => '',
          'section'     => 'stylish'
          ), 
      array(
        'id'          => 'imasta_color_scheme',
        'label'       => 'Pilih warna dasar',
        'desc'        => 'Silahkan pilih warna dasar situs anda',
        'std'         => '#000000',
        'type'        => 'colorpicker',
        'section'     => 'stylish',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'imasta_color_scheme_2',
        'label'       => 'Pilih warna dasar 2',
        'desc'        => 'Silahkan pilih warna dasar 2 situs anda',
        'std'         => '#f2472d',
        'type'        => 'colorpicker',
        'section'     => 'stylish',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'imasta_color_scheme_3',
        'label'       => 'Pilih warna box judul widget',
        'desc'        => 'Silahkan pilih warna box judul widget',
        'std'         => '#414141',
        'type'        => 'colorpicker',
        'section'     => 'stylish',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'imasta_textcolorlogo',
        'label'       => 'Pilih warna teks logo',
        'desc'        => 'Anda dapat mengubah wana teks logo anda di sini',
        'std'         => '#333333',
        'type'        => 'colorpicker',
        'section'     => 'stylish',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'imasta_description',
        'label'       => 'Pilih warna deskrpsi logo',
        'desc'        => 'Pilih warna deskripsi teks logo anda di sini.',
        'std'         => '#333333',
        'type'        => 'colorpicker',
        'section'     => 'stylish',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'imasta_socialactived',
        'label'       => 'Aktifkan sosial network?',
        'desc'        => 'Pilih \'ya\' jika ingin mengaktifkan. Pilih \'no\' jika ingin menonaktifkan.',
        'std'         => 'yes',
        'type'        => 'radio',
        'section'     => 'sosial_media',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'yes',
            'label'       => 'Ya',
            'src'         => ''
            ),
          array(
            'value'       => 'no',
            'label'       => 'Tidak',
            'src'         => ''
            )
          )
        ),
      array(
        'id'          => 'imasta_fb',
        'label'       => 'Facebook URL',
        'desc'        => 'Masukkan url facebook anda di sini, contoh : http://facebook.com/anandiamy (jangan lupa gunakan http://)',
        'std'         => 'http://facebook.com/anandiamy',
        'type'        => 'text',
        'section'     => 'sosial_media',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'imasta_socialactived:is(yes),imasta_socialactived:not()',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'imasta_twitter',
        'label'       => 'Twitter URL',
        'desc'        => 'Masukkan url twitter anda di sini, contoh : http://twitter.com/anandiamy (jangan lupa gunakan http://)',
        'std'         => 'https://twitter.com/anandiamyd',
        'type'        => 'text',
        'section'     => 'sosial_media',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'imasta_socialactived:is(yes),imasta_socialactived:not()',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'imasta_insta',
        'label'       => 'Instagram URL',
        'desc'        => 'Masukkan url instagram anda di sini. (jangan lupa gunakan http://)',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'sosial_media',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'imasta_socialactived:is(yes),imasta_socialactived:not()',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'imasta_gplus',
        'label'       => 'Google+ URL',
        'desc'        => 'Masukkan url Gplus anda di sini, contoh : http://plus.google.com/3894293874219340 (jangan lupa gunakan http://)',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'sosial_media',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'imasta_socialactived:is(yes),imasta_socialactived:not()',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'imasta_fontgeneral',
        'label'       => 'Font Utama',
        'desc'        => 'Pilih body font di sini. Semua font adalah dari layanan Google Fonts API. Untuk preview langsung, anda dapat lihat di <a href="http://www.google.com/fonts" rel="nofollow">http://www.google.com/fonts</a>.',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'typografi',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'imasta_fontheader',
        'label'       => 'Font Header',
        'desc'        => 'Pilih header font di sini. Semua font adalah dari layanan Google Fonts API. Untuk preview langsung, anda dapat lihat di <a href="http://www.google.com/fonts" rel="nofollow">http://www.google.com/fonts</a>.',
        'std'         => array('font-color' => '#660066','font-size' => '20px','font-weight' => 'bold'),
        'type'        => 'typography',
        'section'     => 'typografi',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'imasta_seoactived',
        'label'       => 'Aktifkan iMasta SEO?',
        'desc'        => 'Pilih \'ya\' jika ingin mengaktifkan. Pilih \'no\' jika ingin menonaktifkan. Jika anda menginstall plugin SEO, anda harus menonaktifkan fitur ini.',
        'std'         => 'no',
        'type'        => 'radio',
        'section'     => 's',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'yes',
            'label'       => 'Ya',
            'src'         => ''
            ),
          array(
            'value'       => 'no',
            'label'       => 'Tidak',
            'src'         => ''
            )
          )
        ),
      array(
        'id'          => 'imasta_all_seo_keywords',
        'label'       => 'All SEO Keywords',
        'desc'        => 'Ini adalah Meta Keywords yang akan digunakan di hasil Google Search. Jika anda menggunakan plugin SEO, silahkan disable fitur ini.',
        'std'         => 'this is, example,keywords, for, imasta SEO,',
        'type'        => 'textarea-simple',
        'section'     => 's',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'imasta_seoactived:is(yes),imasta_seoactived:not()',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'kode_verifikasi_google_webmaster_tools',
        'label'       => 'Kode Verifikasi Google Webmaster Tools',
        'desc'        => 'Masukkan kode verifikasi google webmaster tool di sini',
        'std'         => '',
        'type'        => 'text',
        'section'     => 's',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'imasta_seoactived:is(yes),imasta_seoactived:not()',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'kode_verifikasi_bing_webmaster',
        'label'       => 'Kode Verifikasi Bing Webmaster',
        'desc'        => 'Masukkan kode verifikasi Bing Webmaster di sini',
        'std'         => '',
        'type'        => 'text',
        'section'     => 's',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'imasta_seoactived:is(yes),imasta_seoactived:not()',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'kode_verifikasi_pinterest',
        'label'       => 'Kode Verifikasi Pinterest',
        'desc'        => 'Masukkan kode verifikasi Pinterest Site di sini',
        'std'         => '',
        'type'        => 'text',
        'section'     => 's',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'imasta_seoactived:is(yes),imasta_seoactived:not()',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'kode_verifikasi_alexa',
        'label'       => 'Kode Verifikasi Alexa',
        'desc'        => 'Masukkan kode verifikasi Alexa di sini',
        'std'         => '',
        'type'        => 'text',
        'section'     => 's',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'imasta_seoactived:is(yes),imasta_seoactived:not()',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'imasta_agcactived',
        'label'       => 'Aktifkan iMatsa AGC?',
        'desc'        => 'Pilih \'ya\' jika ingin mengaktifkan. Pilih \'no\' jika ingin menonaktifkan.',
        'std'         => 'no',
        'type'        => 'radio',
        'section'     => 'imasta_agc',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'yes',
            'label'       => 'Ya',
            'src'         => ''
            ),
          array(
            'value'       => 'no',
            'label'       => 'Tidak',
            'src'         => ''
            )
          )
        ),
      array(
        'id'          => 'google_api_key',
        'label'       => 'Google API Key',
        'desc'        => 'Masukkan Google API Key di sini. Silahkan daftar di <a rel="nofollow" href="https://developers.google.com/loader/signup">https://developers.google.com/loader/signup</a> untuk mendapatkanya.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'imasta_agc',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'imasta_agcactived:is(yes),imasta_agcactived:not()',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'bad_keyword_agc',
        'label'       => 'Filter bad keyword untuk AGC anda',
        'desc'        => 'Silahkan saring bad keyword untuk AGC anda',
        'std'         => '"keyword1","keyword2","keyword3"',
        'type'        => 'textarea-simple',
        'section'     => 'imasta_agc',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'imasta_agcactived:is(yes),imasta_agcactived:not()',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'readmore_otomatis',
        'label'       => 'Aktifkan readmore otomatis?',
        'desc'        => 'Pilih \'ya\' jika ingin mengaktifkan. Pilih \'no\' jika ingin menonaktifkan.',
        'std'         => 'yes',
        'type'        => 'radio',
        'section'     => 'setting_lainnya',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'yes',
            'label'       => 'Ya',
            'src'         => ''
            ),
          array(
            'value'       => 'no',
            'label'       => 'Tidak',
            'src'         => ''
            )
          )
        ),
      array(
        'id'          => 'kata_read_more',
        'label'       => 'Banyak kata untuk auto read more',
        'desc'        => 'Isikan dengan angka berapa jumlah kata yang ingin ditampilkan di auto read more',
        'std'         => '400',
        'type'        => 'text',
        'section'     => 'setting_lainnya',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'readmore_otomatis:is(yes),readmore_otomatis:not()',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'kata_read_more_teks',
        'label'       => 'Teks read more',
        'desc'        => 'Isikan kata untuk read more',
        'std'         => 'Baca Selengkapnya',
        'type'        => 'text',
        'section'     => 'setting_lainnya',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'readmore_otomatis:is(yes),readmore_otomatis:not()',
        'operator'    => 'and'
        ),
      array(
        'id'          => 'related_post',
        'label'       => 'Aktifkan related post?',
        'desc'        => 'Pilih \'tidak\' jika anda menginstall plugin related post yang lain',
        'std'         => 'yes',
        'type'        => 'radio',
        'section'     => 'setting_lainnya',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => 'readmore_otomatis:is(yes),readmore_otomatis:not()',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'yes',
            'label'       => 'Ya',
            'src'         => ''
            ),
          array(
            'value'       => 'no',
            'label'       => 'Tidak',
            'src'         => ''
            )
          )
        ),
      array(
        'label'       => 'Related post berdasarkan...?',
        'id'          => 'imasta_taxonomy_relpost',
        'type'        => 'select',
        'desc'        => 'Silahkan sumber related post anda',
        'choices'     => array( 
          array(
            'value'       => 'tags',
            'label'       => 'Tags',
            'src'         => ''
            ),
          array(
            'value'       => 'category',
            'label'       => 'Kategori',
            'src'         => ''
            )
          ),
        'std'         => 'category',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'condition'   => 'related_post:is(yes),related_post:not()',
        'section'     => 'setting_lainnya'
        ),
      )
);

/* allow settings to be filtered before saving */
$custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );

/* settings are not the same update the DB */
if ( $saved_settings !== $custom_settings ) {
  update_option( ot_settings_id(), $custom_settings ); 
}

/* Lets OptionTree know the UI Builder is being overridden */
global $ot_has_custom_theme_options;
$ot_has_custom_theme_options = true;

}