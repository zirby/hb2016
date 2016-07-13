
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CountryTickets.eu</title>
    <link rel="icon" type="image/png" href="../../img/Capella_16.png" />
    <!-- Bootstrap Core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../css/grayscale.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../css/style.css" rel="stylesheet">
    <link href="../../css/flag-icon.css" rel="stylesheet">
    <link href="../../css/style_print.css" rel="stylesheet" media="print">

    <!-- Custom Fonts -->
    <!-- <link href="font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">-->
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="index.php">
                    <i class="fa fa-play-circle"></i>  Countrytickets.eu - Réservation
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden"><a href="#page-top"></a></li>
                    <li><a class="page-scroll" href="#help">FAQ</a></li>
                    <li><a class="page-scroll" href="#contact">Contact</a></li>
                    <?php if(isset($_SESSION['auth'])):?>
                    <li><a class="page-scroll" href="reservations.php">Mes réservations</a></li>
                    <li><a class="page-scroll" href="logout.php">Se déconnecter</a></li>
                    <li><a class="page-scroll" href="../../nl/index.php"><span class="flag-icon flag-icon-nl"></span></a></li>
                    <li><a class="page-scroll" href="../../fr/index.php"><span class="flag-icon flag-icon-fr"></span></a></li>
                    <li><a class="page-scroll" href="../../de/index.php"><span class="flag-icon flag-icon-de"></span></a></li>
                    <li><a class="page-scroll" href="../../en/index.php"><span class="flag-icon flag-icon-gb"></span></a></li>
                    <?php else: ?>
                    <li><a class="page-scroll" href="register.php">S'inscrire</a></li>
                    <li><a class="page-scroll" href="login.php">Se connecter</a></li>
                    <li><a class="page-scroll" href="../../nl/index.php"><span class="flag-icon flag-icon-nl"></span></a></li>
                    <li><a class="page-scroll" href="../../fr/index.php"><span class="flag-icon flag-icon-fr"></span></a></li>
                    <li><a class="page-scroll" href="../../de/index.php"><span class="flag-icon flag-icon-de"></span></a></li>
                    <li><a class="page-scroll" href="../../en/index.php"><span class="flag-icon flag-icon-gb"></span></a></li>
                    <?php endif; ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Header -->
    <header id="headForm" class="intro">
        <div class="intro-body">
            <div class="container text-left">
               
                    <div id="wellForm" class="well" style="text-align: center;">
                         <div class="row">