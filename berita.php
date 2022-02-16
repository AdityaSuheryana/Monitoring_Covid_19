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
                        <li class="menu-active">
                            <a href="berita.php">Berita</a>
                        </li>
                        <li>
                            <a href="TestCovid.php">Cek Resiko Covid</a>
                        </li>
                    </ul>
                </nav>
                <!-- #nav-menu-container -->
            </div>
        </header>
        <?php
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://newsapi.org/v2/top-headlines?country=id&category=health&apiKey=d8509229b712456ca6645173a274d515");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);

    $data = json_decode($output, true);
?>

    <body>
        <br>
        <div class="container">
            <!--bagian menu-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="index.php">News Agregation</a>
            </nav>
            <div class="row">
            
            <!--berita akan ditampilkan disini menggunakan card bootstrap-->
            <?php foreach($data['articles'] as $d){ ?>
                <div class="col-md-4">
                <br>
                    <div class="card">
                        <img src="<?php echo $d['urlToImage']; ?>" height="200px" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6 class="card-title"><?php echo $d['title']; ?></h6>
                            <p class="card-text"><?php echo $d['description']; ?></p>
                            <a href="<?php echo $d['url']; ?>" class="btn btn-primary">Lihat Detail</a>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted"><?php echo $d['publishedAt']; ?></small>
                        </div>
                    </div>
                    
                </div>
            <?php } ?>

            </div>
        </div>
    </body>
