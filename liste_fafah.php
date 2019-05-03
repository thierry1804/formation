<?php
//inclusion des fichiers datas/auteurs.php et datas/livres.php
include 'datas/auteurs.php';
include 'datas/livres';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listes des livres</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
              crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Liste des livres disponibles</h1>
            <table class="table table-stripped">
                <thead class="thead-dark">
                    <tr>
                        <th>Informations</th>
                        <th>Pochette</th>
                        <th>Résumé</th>
                        <th>Ressources</th>
                    </tr>
                    </thead>
                    <tbody>
        <?php
        for ($a = 0; $a < count($livres); $a++) {
            //déclaration de variables
            $cleAuteur = $livres[$a]['auteur'];
            $auteur = $auteurs[$cleAuteur]['nom'];
            $bibliographie = $auteurs[$cleAuteur]['bibliographie'];
            $titre = $livres[$a]['titre'];
            $resume = $livres[$a]['resume'];
            $pages = $livres[$a]['pages']; 
            $pochette = $livres[$a]['pochettte'];
            //déclaration des variables reference et isbn et affectation des valeurs
            $reference = -$livres[$a]['ean'] ;
            $isbn = -$livres[$a]['isbn'];
            //vérification si 'ean' existe
                    if (isset($livres[$a]['ean'])){
                        $reference = $livres[$a]['ean'];
                    }
                    if (isset($livres[$a]['isbn'])){
                        $reference = $livres[$a]['isbn'];
                }
        }
            //déclaration des valeurs $video et $audio et affectation
            $video = $livres[$a]['video']" " ;
            $audio = $livres[$a]['audio']" " ; 
            //vérification de l'exixtence de la varible $video
             if (isset($livre[$_GET['Books']]['video'])) {
            //initialisation variable
            $video = $livres[$_GET['Books']]['video'];
    ?> 
        <h2>Video</h2>
        <video controls="">
            <source src="medias/<?php echo $video; ?>" type="video/mp4" />
        </video>
        <?php
    }
    if (isset($livres[$_GET['Books']]['audio'])) {
        //initialisation variable
        $audio = $livres[$_GET['Books']]['audio']; 
        ?>
        <h2>Audio</h2>
        <audio controls="">
            <source src="medias/<?php echo $audio; ?>" type="video/mp3" />
        </audio>
        
        <tr>
            <td>
                <h2> <?php echo $auteur; ?></h2>
                <code> <?php echo $bibliographie; ?></code>
            </td>
            <td>
                <img src="images/books/<?php echo $pochettte; ?>" alt="<?php echo $titre; ?>" height="360"
            </td>
            <td>
                <h2><?php echo $titre; ?></h2>
                <p><em><? php echo $resume; ?></em></p>
                <p>ISBN : <?php echo $isbn; ?></p>
                <p>Réf. : <?php echo $refrence; ?></p>
                <p>Pages : <?php echo $pages; ?></p>
            </td>
            <td>
                <?php
                if (strlen($audio)) {
                ?>
                <audio controls="" width="100%" >
                    <source src="medias/<?php echo $audio; ?>" type="audio/mp3" />
                </audio><br>
                <?php 
                }
                if (strlen($video)) {
                ?>
                <video controls="" width="100%">
                       <source src="medias/<?php echo $video; ?>" type="video/mp4" />
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
                    <tr class="bg-info">
                        <td colspan="4" class="text-right">
                            <?php echo count($livres); ?>
                            livre
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/BOOTSTRAP.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                crossorigin="anonymous"></script>
    </body>
</html>
