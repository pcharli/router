<section class="section">
   <?php if (isset($_SESSION['log']) ):?>
    <h1>Contenu sécurisé</h1>
    <?php else :?>
    <p>Sorry, veuillez vous connecter</p>
    <?php endif;?>
</section>