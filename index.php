<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PON</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Favicons -->
        <link href="img/favicon.png" rel="icon">
        <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700"
            rel="stylesheet">

        <!-- Bootstrap CSS File -->
        <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Libraries CSS Files -->
        <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
        <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
        <!-- Main Stylesheet File -->
        <link href="css/style.css" rel="stylesheet">
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
            crossorigin="anonymous">
        <link
            rel="stylesheet"
            href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
            integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
            crossorigin=""/>
        <link
            href="https://fonts.googleapis.com/css?family=Roboto&display=swap"
            rel="stylesheet">

        <style type="text/css">
            #map {
                width: 100%;
                height: 100vh;
            }
            .list-covid {
                height: 100vh;
                overflow-x: hidden;
            }
            .list-group-item:hover {
                cursor: pointer;
            }
            .leaflet-container {
                background: #10b7c9;
            }
            .info {
                padding: 6px 8px;
                font: 14px/16px Arial, Helvetica, sans-serif;
                background: white;
                background: rgba(255,255,255,0.8);
                box-shadow: 0 0 15px rgba(0,0,0,0.2);
                border-radius: 5px;
            }
            .info h4 {
                margin: 0 0 5px;
                color: #777;
            }
            .legend {
                text-align: left;
                line-height: 18px;
                color: #555;
            }
            .legend i {
                width: 70px;
                height: 18px;
                float: left;
                margin-right: 8px;
                opacity: 0.7;
            }
        </style>

        <?php
$url = "https://api.kawalcorona.com/indonesia/";

$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);
$result = json_decode($response);
$positif = $result[0]->positif;
$sembuh = $result[0]->sembuh;
$death = $result[0]->meninggal;
$dirawat = $result[0]->dirawat;

date_default_timezone_set('Asia/Jakarta');
$date_now = date('d-m-Y H:i:s');

$url2 = "https://api.kawalcorona.com/";

$url1 = "https://data.covid19.go.id/public/api/prov.json";
$client1 = curl_init($url1);
curl_setopt($client1,CURLOPT_RETURNTRANSFER,true);
$response1 = curl_exec($client1);
$result1 = json_decode($response1);


?>

    </head>
    <body>
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
        <script
            src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
        <script
            src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
            integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
            crossorigin=""></script>
        <header id="header">
            <div class="container">
                <div id="logo" class="pull-left">

                    <!-- Uncomment below if you prefer to use an image logo -->
                    <a href="#body"><img src="img/PON.png" style="width:300px; height:50px" title=""/></a>

                </div>

                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active"><a href="index.php">Home</a></li>
                        <li><a href="berita.php">Berita</a></li>
                        <li><a href="TestCovid.php">Cek Resiko Covid</a></li>
                        
                    </ul>
                </nav>
                <!-- #nav-menu-container -->
            </div>
        </header>
        <!-- #header -->

        <section id="intro">
            <div class="intro-content">
                <h2>Pandemic Of Covid-19</h2>
                <div>
                    <a href="#about" class="btn-get-started scrollto">Covid-19</a>
                    <a href="#services" class="btn-projects scrollto">Data Covid-19 di indonesia</a>
                </div>
            </div>

            <div id="intro-carousel" class="owl-carousel">
                <div class="item" style="background-image: url('img/intro-carousel/1.jpg');"></div>
                <div class="item" style="background-image: url('img/intro-carousel/2.jpg');"></div>
                <div class="item" style="background-image: url('img/intro-carousel/3.jpg');"></div>
                <div class="item" style="background-image: url('img/intro-carousel/4.jpg');"></div>
                <div class="item" style="background-image: url('img/intro-carousel/5.jpg');"></div>
            </div>

        </section>
        <!-- #intro -->
        <main id="main">

            <!--========================== About Section ============================-->
            <section id="about" class="wow fadeInUp">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 about-img">
                            <img src="img/covid-19.jpg" height="75%">
                        </div>

                        <div class="col-lg-6 content">
                            <h2>Corona Virus</h2>
                            <h3>Penyakit coronavirus (COVID-19) adalah penyakit menular yang disebabkan oleh
                                coronavirus yang baru ditemukan.</h3>

                            <ul>
                                <li>
                                    <i class="ion-android-checkmark-circle"></i>Sebagian besar orang yang terinfeksi
                                    virus COVID-19 akan mengalami penyakit pernapasan ringan hingga sedang dan
                                    sembuh tanpa memerlukan perawatan khusus.
                                </li>
                                <li>
                                    <i class="ion-android-checkmark-circle"></i>Cara terbaik untuk mencegah dan
                                    memperlambat penularan diberitahukan dengan baik tentang virus COVID-19,
                                    penyakit yang disebabkannya dan bagaimana penyebarannya.
                                </li>
                                <li>
                                    <i class="ion-android-checkmark-circle"></i>Virus COVID-19 menyebar terutama
                                    melalui tetesan air liur atau keluar dari hidung ketika orang yang terinfeksi
                                    batuk atau bersin, jadi penting bahwa Anda juga berlatih etiket pernapasan
                                    (misalnya, dengan batuk pada siku yang tertekuk).</li>
                                </ul>

                        </div>
                    </div>
                </div>
            </section>
            <!-- #about -->
            <div class="ct" style="background:#e9eff5;">
                <section id="services">
                    <div class="container">
                        <div class="section-header">
                            <h2>Data Covid-19</h2>
                        </div>
                        *Live Update : <?php echo$date_now;?>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="box wow fadeInLeft bg-primary">
                                    <div class="icon">
                                        <centered>
                                        <img src="img/sad-01.png" style="width:70px;">
                                        </centered>
                                    </div>
                                    <h4 class="title" style="font-size:16px">Total Kasus Positif</a>
                                </h4>
                                <p class="description" style="font-size:38px">

                                    <?php
                        echo $positif;
                    ?>
                                </p>

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="box wow fadeInRight bg-danger">
                                <div class="icon">
                                    <img src="img/heart-01.png" style="width:70px;">
                                </div>
                                <h4 class="title" style="font-size:16px">Meninggal</a>
                            </h4>
                            <p class="description" style="font-size:38px">
                                <?php
                        echo $death;
                    ?>
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="box wow fadeInLeft bg-secondary">
                            <div class="icon">
                                <img src="img/cry-01.png" style="width:70px;">
                            </div>
                            <h4 class="title" style="font-size:16px">Positif Aktif</h4>
                            <p class="description" style="font-size:38px">

                                <?php
                      echo $dirawat;
                  ?>
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="box wow fadeInRight bg-success">
                            <div class="icon">
                            <img src="img/happy-01.png" style="width:70px;"> 
                            </div>
                            <h4 class="title" style="font-size:16px">Sembuh</h4>
                            <p class="description" style="font-size:38px">

                                <?php
                      echo $sembuh;
                  ?>
                            </p>
                        </div>
                    </div>
                </section>
            </div>

            <br>
            <div class="container">
                <div id="map">
                    <script src="js/map-leaflet.js"></script>
                </div>
             </div>
             <br>
             <br>
             <div class="ct" style="background-color:#e9eff5">
             <div class="container">    
                <br>
                <style>
                    table, thead, td, tr, th{
                    border: 1px solid black;
                    border-collapse: collapse;
                    }.tbody{
                        background-color:#ffffff
                    }
                
                </style>    
                <table class="table text-center">
                    <thead style="background-color:#f1f57f">
                        <th>No</th>
                        <th>Nama Provinsi</th>
                        <th>Jumlah Positif</th>
                        <th>Jumlah Sembuh</th>
                        <th>Jumlah Meninggal</th>
                    <thead>
                    <tbody>
                        <?php
                    for ($i=0; $i < 10; $i++) { 
                ?>
                        <tr style="border:1px solid box">
                            <td><?php echo $i+1; ?></td>
                            <td><?php echo $result1->list_data[$i]->key; ?></td>
                            <td><?php echo $result1->list_data[$i]->jumlah_kasus; ?></td>
                            <td><?php echo $result1->list_data[$i]->jumlah_sembuh; ?></td>
                            <td><?php echo $result1->list_data[$i]->jumlah_meninggal; ?></td>
                        </tr>
                        <?php
                   }
                ?>
                    </tbody>
                </table>
                <a href="provinsi_covid.php" style="font-size:20px;">Klik untuk melihat seluruh provinsi
                </a>
                <br>
                <br>   
            </div>
                </div>  
        </main>
        <!-- Chat Bot Untuk Chatbot Saya menggunakan Dialogflow Dan sekarang Belum di
        ubah dengan data yang benar -->
        <script
            src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
        <df-messenger
            chat-icon="3ac35315-5456-491d-9847-d1b7d704474a_x.png"
            intent="WELCOME"
            chat-title="Mr.Bot"
            agent-id="d84df26d-6d2c-49bc-9639-a0a8a1900c49"
            language-code="id"></df-messenger>

        <!--========================== Footer ============================-->

        <footer id="footer" class="bg-dark">
            <div class="container text-white">
                <div class="copyright">
                    &copy; Copyright
                    <strong>Team Developer</strong>. All Rights Reserved 2020
                </div>
                <div class="credits text-white">
                    Workout from home by Team Developer
                </div>
            </div>
        </footer>
        <!-- #footer -->
    </body>
    <!-- JavaScript Libraries -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/jquery/jquery-migrate.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/superfish/hoverIntent.js"></script>
    <script src="lib/superfish/superfish.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/magnific-popup/magnific-popup.min.js"></script>
    <script src="lib/sticky/sticky.js"></script>
    <script src="https://api.kawalcorona.com/indonesia"></script>

    <!-- Template Main Javascript File -->
    <script src="js/main.js"></script>
</html>