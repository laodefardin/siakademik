<?php 
session_start();
if (empty($_SESSION['username'])){
  header('location:../dashboard');    
} else {
  include "../conn.php";
  ?>

  <!DOCTYPE html>
  <html lang="id">
  <head>
    <title>Input Nilai Siswa | Si Akademik</title>


<!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="robots" content="noindex, nofollow" /> <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Laode Muh ZulFardinsyah">

    <link rel="icon" href="https://cekmutasi.co.id/favicon.png" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/bower_components/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/icon/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="../assets/icon/icofont/css/icofont.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/pages/menu-search/css/component.css">
    <link rel="stylesheet" type="text/css" href="../assets/bower_components/pnotify/css/pnotify.css">
    <link rel="stylesheet" type="text/css" href="../assets/bower_components/pnotify/css/pnotify.brighttheme.css">
    <link rel="stylesheet" type="text/css" href="../assets/bower_components/pnotify/css/pnotify.buttons.css">
    <link rel="stylesheet" type="text/css" href="../assets/bower_components/pnotify/css/pnotify.history.css">
    <link rel="stylesheet" type="text/css" href="../assets/bower_components/pnotify/css/pnotify.mobile.css">
    <link rel="stylesheet" type="text/css" href="../assets/pages/pnotify/notify.css">

    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/custom.css">
  </head>
  <body>
    <div class="theme-loader">
      <div class="ball-scale">
        <div class='contain'>
          <div class="ring">
            <div class="frame"></div>
          </div>
          <div class="ring">
            <div class="frame"></div>
          </div>
          <div class="ring">
            <div class="frame"></div>
          </div>
          <div class="ring">
            <div class="frame"></div>
          </div>
          <div class="ring">
            <div class="frame"></div>
          </div>
          <div class="ring">
            <div class="frame"></div>
          </div>
          <div class="ring">
            <div class="frame"></div>
          </div>
          <div class="ring">
            <div class="frame"></div>
          </div>
          <div class="ring">
            <div class="frame"></div>
          </div>
          <div class="ring">
            <div class="frame"></div>
          </div>
        </div>
      </div>
    </div>

    <div id="pcoded" class="pcoded">
      <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">
        <?php
        include 'menu2.php';
        ?>

        <?php
$timeout = 10; // Set timeout minutes
$logout_redirect_url = "../index"; // Set logout URL

$timeout = $timeout * 60; // Converts minutes to seconds
if (isset($_SESSION['start_time'])) {
  $elapsed_time = time() - $_SESSION['start_time'];
  if ($elapsed_time >= $timeout) {
    session_destroy();
    echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
  }
}
$_SESSION['start_time'] = time();
?>
<?php } ?>

<div class="pcoded-main-container">
  <div class="pcoded-wrapper">

    <?php
    include 'menu.php';
    ?>

    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <div class="main-body">

          <div class="page-wrapper" style="padding:1rem">

            <div class="card total-request-card">
              <div class="card-header">
                <h4>Input Nilai Siswa</h4>
                <span>Halaman ini untuk menginput/menambah nilai siswa</span>
              </div>

              <div class="card-block">

                <form class="form-horizontal style-form" action="insert-nilai.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Guru Pengajar</label>
                  <div class="col-sm-10">
                    <select name="kode_guru" id="kode_guru"  class="form-control" disabled />
                    <?php
                    $nama = $_SESSION['nama'];
                    $query = mysql_query("SELECT * FROM guru WHERE nama_guru='$nama'");
                    $data  = mysql_fetch_array($query);
        echo '<option value='.$data['kode_guru'].'>'.$data['nama_guru'].'</option>'; 
                      ?>
                    </select>
                  </div>
                </div>

                  <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Semester</label>
                    <div class="col-sm-10">
                      <select name="semester" id="semester"  class="form-control" required />
                      <option value="kosong (semester tidak di pilih)"> ---- Pilih Salah Satu ---- </option>
                      <option value="1">1 - Ganjil</option>
                      <option value="2">2 - Genap</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Pelajaran</label>
                  <div class="col-sm-10">
                    <select name="kode_pelajaran" id="kode_pelajaran"  class="form-control" required />
                    <option> ---- Pilih Salah Satu ---- </option>
                    <?php
                    $sql = mysql_query("SELECT * FROM pelajaran ORDER BY kode_pelajaran ASC");
                    if(mysql_num_rows($sql) != 0){
                      while($data = mysql_fetch_assoc($sql)){
                        echo '<option value='.$data['kode_pelajaran'].'>'.$data['nama_pelajaran'].'</option>'; }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <h4 class="mb">Data Siswa</h4>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kelas</label>
                  <div class="col-sm-10">
                    <select name="kode_kelas" id="kode_kelas"  class="form-control" required />
                    <option> ---- Pilih Salah Satu ---- </option>
                    <?php
                    $sql = mysql_query("SELECT * FROM kelas ORDER BY tahun_ajar ASC");
                    if(mysql_num_rows($sql) != 0){
                      while($data = mysql_fetch_assoc($sql)){
                        echo '<option value='.$data['kode_kelas'].'>'.$data['kelas'].' | '.$data['nama_kelas'].' | '.$data['tahun_ajar'].'</option>'; 
                        $data['kode_kelas'] = $dataKelas;}
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Siswa</label>
                  <div class="col-sm-10">
                    <select name="kode_siswa" id="kode_siswa"  class="form-control" required />
                    <option> ---- Pilih Salah Satu ---- </option>
                    <?php
                    $sql = mysql_query("SELECT siswa.* FROM siswa, kelas_siswa 
                     WHERE siswa.kode_siswa = kelas_siswa.kode_siswa 
                     ORDER BY nama_siswa");
                    if(mysql_num_rows($sql) != 0){
                      while($data = mysql_fetch_assoc($sql)){
                        echo '<option value='.$data['kode_siswa'].'>'.$data['nis'].' - '.$data['nama_siswa'].'</option>'; }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <h4 class="mb">Input Nilai</h4>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label"> Nilai Tugas 1</label>
                  <div class="col-sm-10">
                    <input type="text" name="nilai_tugas1" id="nilai_tugas1" placeholder="Nilai Tugas 1" class="form-control" required="required"/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label"> Nilai Tugas 2</label>
                  <div class="col-sm-10">
                    <input type="text" name="nilai_tugas2" id="nilai_tugas2" placeholder="Nilai Tugas 2" class="form-control" required="required" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label"> Nilai UTS</label>
                  <div class="col-sm-10">
                    <input type="text" name="nilai_uts" id="nilai_uts" placeholder="Nilai UTS" class="form-control" required="required" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label"> Nilai UAS</label>
                  <div class="col-sm-10">
                    <input type="text" name="nilai_uas" id="nilai_uas" placeholder="Nilai UAS" class="form-control" required="required" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label"> Keterangan</label>
                  <div class="col-sm-10">
                    <input type="text" name="keterangan" id="keterangan" placeholder="Keterangan" class="form-control" required="required" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label"></label>
                  <div class="col-sm-10">
                    <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                    <a href="input-nilai" class="btn btn-sm btn-danger">Batal </a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div id="styleSelector">
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>

<!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="https://cekmutasi.co.id/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="https://cekmutasi.co.id/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="https://cekmutasi.co.id/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="https://cekmutasi.co.id/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="https://cekmutasi.co.id/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->


<script type="text/javascript" src="../assets/bower_components/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="../assets/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="../assets/bower_components/popper.js/js/popper.min.js"></script>
<script type="text/javascript" src="../assets/bower_components/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="../assets/bower_components/modernizr/js/modernizr.js"></script>

<script type="text/javascript" src="../assets/bower_components/pnotify/js/pnotify.js"></script>
<script type="text/javascript" src="../assets/bower_components/pnotify/js/pnotify.desktop.js"></script>
<script type="text/javascript" src="../assets/bower_components/pnotify/js/pnotify.buttons.js"></script>
<script type="text/javascript" src="../assets/bower_components/pnotify/js/pnotify.confirm.js"></script>
<script type="text/javascript" src="../assets/bower_components/pnotify/js/pnotify.callbacks.js"></script>
<script type="text/javascript" src="../assets/bower_components/pnotify/js/pnotify.animate.js"></script>
<script type="text/javascript" src="../assets/bower_components/pnotify/js/pnotify.history.js"></script>
<script type="text/javascript" src="../assets/bower_components/pnotify/js/pnotify.mobile.js"></script>
<script type="text/javascript" src="../assets/bower_components/pnotify/js/pnotify.nonblock.js"></script>

<!-- <script type="text/javascript" src="https://cekmutasi.co.id/assets/bower_components/i18next/js/i18next.min.js"></script>
<script type="text/javascript" src="https://cekmutasi.co.id/assets/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
<script type="text/javascript" src="https://cekmutasi.co.id/assets/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="https://cekmutasi.co.id/assets/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script> -->

<script type="text/javascript" src="../assets/js/SmoothScroll.js"></script>
<script src="../assets/js/pcoded.min.js"></script>
<script src="../assets/js/demo-12.js"></script>
<script src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="../assets/js/script.min.js"></script>
<script type="text/javascript" src="../assets/js/date.format.js"></script>
<script type="text/javascript" src="../assets/js/numberformat.js"></script>

<script type="text/javascript">
  tinyMCE.init({
    mode : "exact",
    elements : "elm2",
    theme : "advanced",
    skin : "o2k7",
    skin_variant : "silver",
    plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups",

    theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
    theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,|,insertdate,inserttime,preview,|,forecolor,backcolor",
    theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
    theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_statusbar_location : "bottom",
    theme_advanced_resizing : true,

    template_external_list_url : "lists/template_list.js",
    external_link_list_url : "lists/link_list.js",
    external_image_list_url : "lists/image_list.js",
    media_external_list_url : "lists/media_list.js",

    template_replace_values : {
      username : "Some User",
      staffid : "991234"
    }
  });
</script>

</body>
</html>