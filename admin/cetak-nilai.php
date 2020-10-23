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
    <title>Laporan Nilai Siswa | Si Akademik</title>


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
          <div class="card">
           <?php
           $kodeku = $_GET['kd'];
           $tampil=mysql_query("SELECT nilai.*, pelajaran.nama_pelajaran, siswa.nama_siswa, siswa.nis, kelas_siswa.jurusan FROM nilai
            LEFT JOIN pelajaran ON nilai.kode_pelajaran = pelajaran.kode_pelajaran
            LEFT JOIN siswa ON nilai.kode_siswa = siswa.kode_siswa
            LEFT JOIN kelas_siswa ON nilai.kode_siswa = kelas_siswa.kode_siswa
            WHERE nilai.id = $kodeku ORDER BY semester, kode_pelajaran ASC");
            ?>
            <div class="card-header">
              <h2>Cetak Laporan Nilai Siswa</h2>
              <div class="text-right">
                <a class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-original-title="Print Nilai" href="nilai_pdf.php?hal=edit-admin&kd=<?php echo $kodeku;?>"><i class="icofont-print"></i> Cetak</a>
              </div>
            </div>
            <div class="card-block table-border-style">
              <div class="table-responsive">
                <table class="table table-hover table-striped">
                  <?php while($data=mysql_fetch_array($tampil))
                  { ?>
                    <tr>
                      <td>Kode Siswa</td>
                      <td>:</td>
                      <td><?php echo $data['kode_siswa']; ?></td>
                    </tr>
                    <tr>
                      <td>NIS</td>
                      <td>:</td>
                      <td><?php echo $data['nis']; ?></a></td>
                    </tr>
                    <tr>
                      <td>Nama Siswa</td>
                      <td>:</td>
                      <td><?php echo $data['nama_siswa']; ?></td>
                    </tr>
                    <tr>
                      <td>Jurusan</td>
                      <td>:</td>
                      <td><?php echo $data['jurusan']; ?></td>
                    </tr>
                    <td>Semester</td>
                    <td>:</td>
                    <td><?php echo $data['semester'];?></td>
                  </tr>
                  <tr>
                    <td>Mata Pelajaran</td>
                    <td>:</td>
                    <td><?php echo $data['nama_pelajaran'];?></td>
                  </tr>
                  <tr>
                    <td>Nilai Tugas 1</td>
                    <td>:</td>
                    <td><?php echo $data['nilai_tugas1'];?></td>
                  </tr>
                  <tr>
                    <td>Nilai Tugas 2</td>
                    <td>:</td>
                    <td><?php echo $data['nilai_tugas2'];?></td>
                  </tr>
                  <tr>
                    <td>Nilai UTS</td>
                    <td>:</td>
                    <td><?php echo $data['nilai_uts']; ?></td>
                  </tr>
                  <tr>
                    <td>Nilai UAS</td>
                    <td>:</td>
                    <td><?php echo $data['nilai_uas']; ?></td>
                  </tr>
                  <tr>
                    <td>Total Nilai</td>
                    <td>:</td>
                    <td><?php $total = $data['nilai_tugas1'] + $data['nilai_tugas2'] + $data['nilai_uts'] + $data['nilai_uas'];
                    $rata2 = $total / 4 ;
                    echo $total;
                    ?></td>
                  </tr>
                  <tr>
                    <td>Nilai Rata Rata</td>
                    <td>:</td>
                    <td><?php echo $rata2; ?></td>
                  </tr>
                  <tr>
                    <td>Keterangan</td>
                    <td>:</td>
                    <td><?php echo $data['keterangan']; ?></td>
                  </tr>
                </tbody>
              </table>
              <div class="text-Left">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kepala Sekolah,
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Diterima Oleh,
                <br />
                <br />
                <br />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hakko Bio Richard, A.Md Kom&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['nama_siswa']; ?>
              </div>
              
            <?php } ?>
          </tbody>
        </table>
      </div>
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

</body>
</html>