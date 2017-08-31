<div class="row align-middle">
    <div class="small-12 large-expand columns">
        <?php echo '<img src="/webroot/images/avatars/'.$this->profil->membre_avatar.'" style="width:228px;height:228px;">';?>
        <h2><?php echo $this->profil->membre_pseudo; ?> </h2>
    </div>
    <div class="small-12 large-expand columns">
        <p> Adresse mail : <?php echo $this->profil->membre_mail;?> </p>
        <p> Nombres de posts : <?php echo $this->profil->membre_post;?> </p>
        <p> Signature : <?php echo $this->profil->membre_signature;?> </p> 

        <?php if($_SESSION['id'] == $this->profil->membre_id){ ?>

            <a class="button" href="/profil/edit">Éditer son profil</a>

        <?php } ?>
    </div>
</div>