<?php
//inclusion de datas/auteurs.php
require 'datas/auteurs.php';
//inclusion de datas/livres.php
require 'datas/livres.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des livres</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
        // boucle pour chaque élément de l'array $livres
        for ($a = 0; $a < count($livres); $a++) {
            //affectation de la variable $cleAuteur
            $cleAuteur = $livres[$a]['auteur'];
            //définition de la variable $auteur
            $auteur = $auteurs[$cleAuteur]['nom'];
            //définition de la variable $bibliographie
            $bibliographie = $auteurs[$cleAuteur]['bibliographie'];
            //définition de $titre
            $titre = $livres[$a]['titre'];
            //définition de $resume
            $resume = $livres[$a]['resume'];
            //définition de nombre de pages
            $page = $livres[$a]['pages'];
            //initialiation de $reference à "-"
            $reference = '-';
            //si $livres[$a]['ean'] existe, alors
            if (isset($livres[$a]['ean'])) {
                //définiton de $reference
                $reference = $livres[$a]['ean'];
            }
            //initialisation de $isbn à "-"
            $isbn = '-';
            //si $livres[$a]['isbn'] existe, alors
            if (isset($livres[$a]['isbn'])) {
                //définition de $isbn
                $isbn = $livres[$a]['isbn'];
            }
            //définition de $pochette
            $pochette = $livres[$a]['pochette'];
            //initialisation de $video à ""
            $video = '';
            //si $livres[$a]['video'] existe, alors
            if (isset($livres[$a]['video'])) {
                //définition de $video
                $video = $livres[$a]['video'];
            }
            //initialisation de $audio à ""
            $audio = '';
            //si $livres[$a]['audio'] existe, alors
            if (isset($livres[$a]['audio'])) {
                //définition de $audio
                $audio = $livres[$a]['audio'];
            }
        ?>
                    <tr>
                        <td>
                            <h2><?php echo $auteur; ?></h2>
                            <code><?php echo $bibliographie; ?></code>
                        </td>
                        <td>
                            <img src="images/books/<?php echo $pochette; ?>" alt="<?php echo $titre; ?>" height="360" />
                        </td>
                        <td>
                            <h2><?php echo $titre; ?></h2>
                            <p><em><?php echo $resume; ?></em></p>
                            <p>ISBN : <?php echo $isbn; ?></p>
                            <p>Réf. : <?php echo $reference; ?></p>
                            <p>Pages : <?php echo $page; ?></p>
                            
                        </td>
                        <td>
                            <?php
                            //si la variable $audio n'est pas une chaîne vide
                            //c'est-à-dire que le nombre de caractères est supérieur à 0
                            //alors, on affiche l'audio
                            if (strlen($audio) > 0) {
                            ?>
                            <audio controls="" width="100%">
                                <source src="medias/<?php echo $audio; ?>" type="audio/mp3" />
                            </audio><br>
                            <?php
                            }
                            //si la variable $video n'est pas une chaîne vide
                            //c'est-à-dire que le nombre de caractères est supérieur à 0
                            //alors, on affiche la vidéo
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
                            <!-- On affiche ici le nombre d'éléments dans le tableau $livres -->
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
