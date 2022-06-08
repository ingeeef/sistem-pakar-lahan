<?php
include 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="favicon.ico" />

    <title>Fuzzy Inference System Mamdani</title>
    <link href="assets/css/spacelab-bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/general.css" rel="stylesheet" />
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</head>

<body>
<?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:../index.php?pesan=belum_login");
	}
	?>


    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="?">SILABU</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav"> 
                        <li><a href="?m=kriteria">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-th-large"></span> Kriteria</a></li>
                        <li><a href="?m=aturan"><span class="glyphicon glyphicon-th"></span> Aturan</a></li>
                        <li><a href="?m=alternatif"><span class="glyphicon glyphicon-user"></span> Data</a></li>
                        <li><a href="?m=detaildata"><span class="glyphicon glyphicon-th"></span> Data Aturan</a></li>
                        <li><a href="?m=hitung"><span class="glyphicon glyphicon-calendar"></span> Perhitungan</a></li>
             <!--           <li><a href="?m=password"><span class="glyphicon glyphicon-lock"></span> Password</a></li> -->
                        <li><a href="aksi.php?act=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                       
                </ul>
                <div class="navbar-text"></div>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>

    <div class="container">
        <?php
        if (file_exists($mod . '.php'))
            include $mod . '.php';
        else
            include 'home.php';
        ?>
    </div>
    <footer class="footer bg-primary">
        <div class="container">
            <p>Copyright &copy; <?= date('Y') ?></p>
        </div>
    </footer>
    <script type="text/javascript">
        $('.form-control').attr('autocomplete', 'off');
    </script>
</body>

</html>