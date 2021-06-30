<?php 
require_once("config.php");

if( isset($_GET['deconnexion'])) :
    unset($_SESSION['log']);
    header("location:".REFERANT);
    exit;
endif;

if (isset($_POST['connexion'])):
   $sql = sprintf("SELECT * FROM users WHERE login = '%s' AND password = '%s'",
    addslashes($_POST['login']),
    addslashes($_POST['password'])
);
    $rq = $connect->query($sql);
    echo $connect->error;
    
    if($rq->num_rows > 0) :
        $user = $rq->fetch_object();
        $_SESSION['log'] = 'ok';
        $_SESSION['user'] = $user->id_users;
        header("location:".REFERANT);
        exit;
    endif;
endif;
?>
<?php if( !isset($_SESSION['log']) OR $_SESSION['log'] != 'ok') :?>
<form action="security.php" method="post" class="login">
    <input type="text" name="login" placeholder="login" required>
    <input type="password" name="password" placeholder="password" required>
    <input type="hidden" name="connexion">
    <button>Se connecter</button>
</form>
<?php else :  //myPrint_r($_SESSION);?>
<a href="security.php?deconnexion" class="deconnect">Se déconnecter</a>
<?php endif;?>