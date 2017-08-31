<!DOCTYPE htlm>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang=fr>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title></title>
        <link rel="stylesheet" href="/webroot/foundation/css/foundation.css">
        <link rel="stylesheet" href="/webroot/foundation/css/app.css">
        <link rel="stylesheet" href="/webroot/css/app2.css">
    </head>
  
    <body>
        
    <div class="container">
        <!-- the trigger -->
        <div class="curtain-menu-button" data-curtain-menu-button>
        <div class="curtain-menu-button-toggle">
            <div class="bar1"></div>
            <div class="bar2"></div>
        </div>
        </div>

        <!-- the menu  -->
        <div class="curtain-menu">
        <div class="curtain"></div>
        <div class="curtain"></div>
        <div class="curtain"></div>
        <div class="curtain-menu-wrapper">
            <ul class="curtain-menu-list menu vertical">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Work</a></li>
            <li><a href="#">Contact</a></li>
            </ul>
        </div>
        </div>
        
        
            <div class="row">
                <?php // affiche le contenu du lien 
                    echo $content_for_layout; 
                ?>
            </div>
        <div>

        <footer>
        </footer>

        
        <script src="/webroot/foundation/js/vendor/jquery.js"></script>
        <script src="/webroot/foundation/js/vendor/what-input.js"></script>
        <script src="/webroot/foundation/js/vendor/foundation.js"></script>
        <script src="/webroot/foundation/js/app.js"></script>
        <script src="/webroot/js/app2.js"></script>
    </body>  
</html>