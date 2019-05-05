<?php
//inclusion de datas/auteurs.php
include 'datas/auteurs.php';
//inclusion de datas/livres.php
include 'datas/livres.php'; 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des livres</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css " integrity="sha384ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class='container'>
          <h1>Liste des livres disponibles</h1>
          <table class='table table-stripped'>
            <thead class='thead-dark'>
              <th>Informations</th>
              <th>Pochettes</th>
              <th>Résumé</th>
              <th>Rssources</th>
            </thead>
            <tbody>
        <?php
        for ($i = 0; $i < count($livres); $i++) {
          $cleAuteur = $livres[$i]['auteur'];
          $auteur =  $auteurs[$cleAuteur]['nom'];
          $bibliographie = $auteurs[$cleAuteur]['bibliographie'];
          $titre = $livres[$i]['titre'];
          $resume = $livres[$i]['resume'];
          $page = $livres[$i]['pages'];
          $pochette = $livres[$i]['pochette'];
          $reference = "-";
          $isbn = "-";
          if (isset($livres[$i]['ean'])) {
            $reference = $livres[$i]['ean'];
          }
          if (isset($livres[$i]['isbn'])){
            $isbn = $livres[$i]['isbn'];
          }
          $video = "";
          $audio = "";
          if (isset($livres[$i]['video'])) {
            $video = $livres[$i]['video'];
          }
          if (isset($livres[$i]['audio'])) {
            $audio = $livres[$i]['audio'];
          }
        
        ?>
              <tr>
                <td>
                  <h2><?php echo $auteur; ?></h2>
                  <code><?php echo $bibliographie; ?></code>
                </td>
                <td>
                  <img src='images/books/<?php echo $pochette; ?>' alt='<?php echo $titre; ?>' height='360' />
                </td>
                <td>
                  <h2><?php echo $titre; ?></h2>
                  <p><em><?php echo $resume; ?></em></p>
                  <p>ISBN : <?php echo $isbn; ?></p>
                  <p>Référence : <?php echo $reference; ?> </p>
                  <p>Pages : <?php echo $page; ?></p>
                </td>
                <td>
                  <?php
                  if (strlen($audio) > 0) {
                  ?>
                  <audio controls width="100%">
                  <source src="medias/<?php echo $audio; ?>" type="audio/mp3"/>
                  </audio>
                  <?php
                  }
                  ?>
                  <?php
          		  if (strlen($video) > 0) {
                  ?>
                  <video controls width="100%">
                  <source src="medias/<?php echo $video; ?>" type="video/mp4"/>
                  </video>  
                  <?php
                  }
                  ?>
                </td>
              </tr>
              <?php 
        }
        ?>
            </tbody>
            <tfoot>
              <tr class='bg-info'>
                <td colspan='4' class='text-right'>
                  <?php echo count($livres); ?>
                  livres
                </td>
              </tr>
            </tfoot>
          </table>
      </div>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
