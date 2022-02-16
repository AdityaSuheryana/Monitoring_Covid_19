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
        <!--java script -->
        <script
            src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
        <script
            src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
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
    </head>
    <body style="background:#ebedf0">
        <header id="header">
            <div class="container">
                <div id="logo" class="pull-left">

                    <!-- Uncomment below if you prefer to use an image logo -->
                    <a href="#body"><img src="img/PON.png" style="width:300px; height:50px" title=""/></a>

                </div>

                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="#berita">Berita</a>
                        </li>
                        <li class="menu-active">
                            <a href="TestCovid">Cek Resiko Covid</a>
                        </li>
                    </ul>
                </nav>
                <!-- #nav-menu-container -->
            </div>
        </header>

        <main id="main">
        <?php
        $no1_err = $no2_err = $no3_err = $no4_err = $no5_err = $no6_err = $no7_err = $no8_err = "";
        $no1 = $no2 = $no3 = $no4 = $no5 = $no6 = $no7 = $no8 = "";
        ?>
            <div class="”row”">
                <br>
                <br>
                <div class="container bg-white col-lg-5">
                    <br>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>1. Apakah anda mengalami demam dalam 14 hari ?</label>
                            <br>
                            <input type="radio" id="sa" name="1" value="1">
                            <label for="ya_demam">Ya</label>
                            <input type="radio" id="tidak_1" name="1" value="0">
                            <label for="tidak">Tidak</label>
                        </div>
                        <div class="form-group">
                            <label>2. Adakah Gejala Batuk, Pilek, atau nyeri tenggorokan ?</label>
                            <br>
                            <input type="radio" id="ya_2" name="2" value="1">
                            <label for="ya">Ya</label>
                            <input type="radio" id="tidak_2" name="2" value="0">
                            <label for="tidak">Tidak</label>
                        </div>
                        <div class="form-group">
                            <label>3. Napas kamu sesak atau dada terasa berat?</label>
                            <br>
                            <input type="radio" name="3" value="1">
                            <label for="ya">Ya</label>
                            <input type="radio" name="3" value="0">
                            <label for="tidak">Tidak</label>
                        </div>
                        <div class="form-group">
                            <label>4. Pernah berada dalam satu ruangan dengan pasien positif COVID-19 ?</label>
                            <br>
                            <input type="radio" name="4" value="1">
                            <label for="ya">Ya</label>
                            <input type="radio" name="4" value="0">
                            <label for="tidak">Tidak</label>
                        </div>

                        <div class="form-group">
                            <label>5. Apakah kamu bekerja di / pernah mengunjungi faslitas publik/kesehatan
                                yang berhubungan dengan pasien positif COVID-19?</label>
                            <br>
                            <input type="radio" name="5" value="1">
                            <label for="ya">Ya</label>
                            <input type="radio" name="5" value="0">
                            <label for="tidak">Tidak</label>
                        </div>

                        <div class="form-group">
                            <label>6. Adakah hubungan / kontak lansung dengan orang yang baru berpergian ke
                                negeara / kota terjangkit (China, Italy, Iran, Korea Selatan, Prancis, Spanyol,
                                Jerman, USA, Jakarta, Bali, Solo, Yogyakarta, Pontianak, Manado, Bandu dll)
                                dalam 14 hari terakhir?</label>
                            <br>
                            <input type="radio" name="6" value="1">
                            <label for="ya">Ya</label>
                            <input type="radio" name="6" value="0">
                            <label for="tidak">Tidak</label>
                        </div>

                        <div class="form-group">
                            <label>7. apakah suhu lebih dari 37 ?</label>
                            <br>
                            <input type="radio" name="7" value="1">
                            <label for="ya">Ya</label>
                            <input type="radio" name="7" value="0">
                            <label for="tidak">Tidak</label>
                        </div>
                        <div class="form-group">
                            <label>8. Apakah anda serng kelelahan ?</label>
                            <br>
                            <input type="radio" name="8" value="1">
                            <label for="ya">Ya</label>
                            <input type="radio" name="8" value="0">
                            <label for="tidak">Tidak</label>
                        </div>
                        <input
                            type="submit"
                            name="submit"
                            value="submit"
                            class="btn btn-primary float-right col-lg-3"
                            ></input>
                        <br>    
                        <br>
                        <button
                            type="button"
                            class="btn btn-primary float-right col-lg-3"
                            data-toggle="modal"
                            
                            data-target="#exampleModal">
                            Lihat Hasil
                        </button>
                    </form>
                    <script>
                        function notif() {
                            
                        };
                    </script>

                <?php
            
            $tampil="";
            $y=0;
                if(isset($_POST['1'])){
                    $y = $y+$_POST['1'];    
                }         
                if(isset($_POST['2'])){
                    $y = $y+$_POST['2'];    
                } 
                if(isset($_POST['3'])){
                    $y = $y+$_POST['3'];
                }
                if(isset($_POST['4'])){
                    $y = $y+$_POST['4'];
                }
                if(isset($_POST['5'])){
                    $y = $y+$_POST['5'];
                }         
                if(isset($_POST['6'])){
                    $y = $y+$_POST['6'];
                }  
                if(isset($_POST['7'])){
                    $y = $y+$_POST['7'];
                } 
                if(isset($_POST['8'])){
                    $y = $y+$_POST['8'];
                }
            ?>
                    <!-- Modal -->
                    <div
                        class="modal fade"
                        id="exampleModal"
                        tabindex="-1"
                        role="dialog"
                        aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Cek Resiko sedini mungkin</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php 
                                        if($y >= 4){
                                            $tampil = "Anda Memiliki Resiko Besar terkena Covid-19. Harap Segera periksa ke rumah sakit rujukan terdekat";    
                                            }else{
                                            $tampil = "Anda Memiliki Resiko Ringan terkena Covid-19. Harap mengisolasikan diri di rumah selama 14 hari";
                                            } 
                                     echo $tampil;       
                                    ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                </div>
                <br>
            </main>
        </body>