<!DOCTYPE htlm>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang=fr>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title><?php echo $this->request->controller; ?></title>
        <link rel="stylesheet" href="/webroot/foundation/css/foundation.css">
        <link rel="stylesheet" href="/webroot/foundation/css/input/input1.css">
        <link rel="stylesheet" href="/webroot/css/app.css">
    </head>
  
    <body>

        <div class="off-canvas-wrapper">
            <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>

                <div class="off-canvas position-left" id="offCanvasLeft" data-off-canvas data-position>
                    <div class="row column">
                        </br>
                        <div class="button-hover-reveal-wrapper">
                            <?php  
                            if ($_SESSION['id'] === 0){ ?>
                                <label> Rejoins-nous </label>
                                <a class="button-hover-reveal" href="/register">Sinscrire</a>
                                <a class="button-hover-reveal" href="/login">Login</a>
                            <?php } else { ?>
                                <label> Profil </label>
                                <a class="button-hover-reveal" href="/profil/membre/<?php echo $_SESSION["id"];?>">Voir</a>
                                <a class="button-hover-reveal" href="/logout">Deconnexion</a>
                            <?php } ?>
                        </div>

                        </br>
                        <ul class="menu-cadre menu vertical ">
                        <?php if ($_SESSION['rang'] == 5){ ?>
                        <li> <a href="/admin">Admin</a></li>
                        <?php } ?>
                        <li><a href="/home">Accueil</a></li>
                        <li><a href="/lesson">Cours</a></li>
                        <li><a href="/forum">Forum</a> </li>
                        </ul>
                        
                        
                    </div>
                </div>

                <div class="off-canvas-content" data-off-canvas-content>

                    <div class="top-bar" >

                        <div class="top-bar-left">
                            <button class="menu-icon" type="button" data-toggle="offCanvasLeft"></button>
                            <span class="top-bar-title"> Menu </span>
                        </div>
                    
                        

                    </div>


                    <div class="callout primary">
                        <?php
                        echo $content_for_layout; 
                        ?>
                    </div> 
                </div>
            </div> 
        </div>
        

        <script src="/webroot/foundation/js/vendor/jquery.js"></script>
        <script src="/webroot/foundation/js/vendor/what-input.js"></script>
        <script src="/webroot/foundation/js/vendor/foundation.js"></script>
        <script src="/webroot/foundation/js/app.js"></script>
        <script src="/webroot/js/app.js"> </script>
        
    </body>   
    
        
   
</html>