<!DOCTYPE html>
<html lang="ro">
<head>
<meta charset="utf-8" />
<meta name="author" content="http://adry.ro" />
<meta name="robots" content="Index, Follow" />
<title>G</title>
<link rel="shortcut icon" href="" />
<!-- Se includ fisierele css si javascript -->
<link href="design/css/cssLoader.css" type="text/css" rel="stylesheet" />
<script src="design/js/jquery-1.8.3.min.js"></script>
<script src="design/js/application.js"></script>
<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
</head>

<body>
    <div id="Top">
        <div class="site_width center">
            <header>
                
            </header>
            
        </div>
    </div>
	<?php
	file_exists("php/p_".page.".php") ? include("php/p_".page.".php"): include("php/p_index.php");
    ?>
    <footer id="Footer">
        <ul>
            <li><a href="">Visit site</a></li>
        </ul>
    </footer>
</body>
</html>