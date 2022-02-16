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

        <?php
        $url1 = "https://data.covid19.go.id/public/api/prov.json";
$client1 = curl_init($url1);
curl_setopt($client1,CURLOPT_RETURNTRANSFER,true);
$response1 = curl_exec($client1);
$result1 = json_decode($response1);

?>
    </head>
    <body>      
    <header id="header">
            <div class="container">
                <div id="logo" class="pull-left">

                    <!-- Uncomment below if you prefer to use an image logo -->
                    <a href="#body"><img src="img/PON.png" style="width:300px; height:50px" title=""/></a>

                </div>

                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li><a href="index.php">Home</li>
                        <li><a href="berita.php">Berita</li>
                        <li><a href="TestCovid.php">Cek Resiko Covid</a></li>             
                    </ul>
                </nav>
                <!-- #nav-menu-container -->
            </div>
        </header>
        <main id="main">
        <div class="container text-center">
            <br> 
            <h1 style="color:#000;">  
            Daftar kasus covid-19 tingkat provinsi
            </h1>    
                <table class="table text-center text-dark">
                    <thead>
                        <th>No</th>
                        <th>Nama Provinsi</th>
                        <th>Jumlah Positif</th>
                        <th>Jumlah Sembuh</th>
                        <th>Jumlah Meninggal</th>
                    <thead>
                    <tbody>
                        <?php
                    for ($i=0; $i < 34; $i++) { 
                ?>
                        <tr>
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
                </div>
          </main>         
  </body>