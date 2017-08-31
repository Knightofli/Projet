<h2><?php 
    echo '<img src="/webroot/images/avatars/'.$this->profil->membre_avatar.'" >';
    
    echo $this->profil->membre_pseudo;?> </h2>
    <p><?php echo $this->profil->membre_mail;?> </p>
    <p><?php echo $this->profil->membre_post;?> </p>
    <p><?php echo $this->profil->membre_signature;?> </p> 

    <?php if($_SESSION['id'] == $this->profil->membre_id){ ?>

        <a class="button" href="/profil/edit">Éditer son profil</a>

    <?php } ?>