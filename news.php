<?php 
    require_once("config.php");
    //EDIT
    if (isset($_POST['edit_news'])):
      $sql = sprintf("UPDATE news SET titre='%s', contenu='%s' WHERE id_news=%d",
        addslashes($_POST['titre']),
        addslashes($_POST['contenu']),
        $_POST['id_news']
    );
   $connect->query($sql);
   echo $connect->error;
   header("location:".ROOT);
    endif;
    //INSERT
    if( isset($_POST['add_news']) ) :
        $sql = sprintf("INSERT INTO `news` (`titre`, `contenu`) VALUES ('%s', '%s')",
            addslashes($_POST['titre']),
            addslashes($_POST['contenu'])
        );
        $connect->query($sql);
        echo $connect->error;
        $last_id = $connect->insert_id;
        header("location:".REFERANT);
        exit;
    endif;

    //DELETE
    if( isset($_GET['delete'])) :
      $sql = sprintf("DELETE FROM `news` WHERE `news`.`id_news` = %d",
        $_GET['delete']
      );
      $connect->query($sql);
      echo $connect->error;
      header("location:".REFERANT);
    endif;

    //Récup d'une news
    if (isset($_GET['edit_news'])) :
      $sql = sprintf("SELECT * FROM `news` WHERE id_news = %d", $_GET['edit_news']);
      $rq = $connect->query($sql);
      echo $connect->error;
      $the_news = $rq->fetch_object();
      //myPrint_r($the_news);
    endif;

    //Récup des news
    $sql = "SELECT * FROM `news`";
    $rq = $connect->query($sql);
    //myPrint_r($rq);
    $nb_news = $rq->num_rows;

    //$allNews = array();
    while($one_news = $rq->fetch_object()) :
        $allNews[] = $one_news;
    endwhile;
    //myPrint_r($allNews);
?>

<?php if (isset($_GET['edit_news'])) :?>
<h2>Editer la news</h2>
  <form method="post" action="<?php echo ROOT;?>news.php">
  <div class="field">
    <label class="label">Titre de la news</label>
    <div class="control">
      <input value="<?php echo $the_news->titre;?>" class="input" name="titre" type="text" placeholder="Titre de la news">
    </div>
  </div>
  <div class="field">
    <label class="label">Contenu de la news</label>
    <div class="control">
      <textarea class="textarea" name="contenu" id="" cols="30" rows="10"><?php echo $the_news->contenu;?></textarea>
    </div>
  </div>
      <input type="hidden" name="edit_news">
      <input type="hidden" name="id_news" value="<?php echo $the_news->id_news;?>">
      <button class="button is-primary">Edit</button>
  </form>
<?php else:?>
<h2>Les <?php echo $nb_news;?> news</h2>
<?php foreach($allNews as $key=>$value) : ?>
<div data-id="<?php echo $value->id_news;?>" class="news">
    <h3><?php echo $value->titre;?></h3>
    <p><?php echo $value->contenu;?></p>
    <?php if( isset($_SESSION['log'])) :?>
    <p>
      <a class="delete" href="news.php?delete=<?php echo $value->id_news;?>">Delete</a> | 
      <a href="editnews/<?php echo $value->id_news;?>" class="update">Edit</a>
    </p>
    <?php endif;?>
</div>
<hr>
<?php endforeach;?>


<h2>Ajouter une news</h2>
<form method="post" action="news.php">
<div class="field">
  <label class="label">Titre de la news</label>
  <div class="control">
    <input class="input" name="titre" type="text" placeholder="Titre de la news">
  </div>
</div>
<div class="field">
  <label class="label">Contenu de la news</label>
  <div class="control">
    <textarea class="textarea" name="contenu" id="" cols="30" rows="10"></textarea>
  </div>
</div>
    <input type="hidden" name="add_news">
    <button class="button is-primary">Insert</button>
</form>
<?php endif;?>