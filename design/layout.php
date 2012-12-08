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
    <!--FACEBOOK-->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
    <script>
        window.fbAsyncInit = function() {
            FB.init({appId: 'your app id', status: true, cookie: true,
            xfbml: true});
        };
        (function() {
            var e = document.createElement('script'); e.async = true;
            e.src = document.location.protocol +
            '//connect.facebook.net/en_US/all.js';
            document.getElementById('fb-root').appendChild(e);
        }());
    </script>
    <script type="text/javascript">
      window.___gcfg = {lang: 'ro'};
    
      (function() {
        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
        po.src = 'https://apis.google.com/js/plusone.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
      })();
    </script>
    <script>
    $(document).ready(function() {
        $("#facebook_link").click(function() {
            //setTimeout(fb);
            fb();
            return false;
        });
    
        function fb() {
            FB.getLoginStatus(function(response) {
                if (response.session) {
                    // logged in and connected user, someone you know
                    gotResponse(response);
                } else {
                    // no user session available, someone you dont know
                    FB.login(function(response) {
                        if (response.session) {
                            // user successfully logged in
                            gotResponse(response);
                        } else {
                            // user cancelled login, do nothing
                        }
                    });
                }
            });
        }
    
        function gotResponse(response) {
            console.dir(response);
        }
    });
    </script>
    <!--END_FACEBOOK-->
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