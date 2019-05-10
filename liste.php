<?php
//inclusion de datas/auteurs.php
require 'datas/auteurs.php';
//inclusion de datas/livres.php
require 'datas/livres.php';
//Tri par défaut
$tri = 1;
ksort($livres);
//Vérification si paramètre passé
if (isset($_GET['ordre'])) {
    //Affectation de la valeur du paramètre ordre à la variable $tri
    $tri = $_GET['ordre'];
    //Vérifier si tri décroissant
    if ($tri == -1) {
        //Trier de manière décroissante le tableau $livres
        krsort($livres);
    }
}

$limite = 0;
if (isset($_GET['limite'])) {
    $limite = (int) $_GET['limite'];
}
if ($limite > 0) {
    array_splice($livres, $limite);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des livres</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid">
            <h1>Liste des livres disponibles</h1>
            <p>
                <a href="?ordre=<?php echo -1 * $tri ; ?>" class="btn btn-primary">
                    Trier de manière <?php if ($tri == 1) { ?>dé<?php } ?>croissante
                    <i class="fas fa-sort-amount-<?php if ($tri == 1) { ?>down<?php } else { ?>up<?php } ?>"></i>
                </a>
                Afficher
                <a href="?ordre=<?php echo $tri ; ?>&limite=0" class="btn btn-<?php echo ($limite === 0)?"primary":"light"; ?>">Tout</a>
                ou
                <a href="?ordre=<?php echo $tri ; ?>&limite=1" class="btn btn-<?php echo ($limite === 1)?"primary":"light"; ?>">1</a>
                <a href="?ordre=<?php echo $tri ; ?>&limite=2" class="btn btn-<?php echo ($limite === 2)?"primary":"light"; ?>">2</a>
                <a href="?ordre=<?php echo $tri ; ?>&limite=3" class="btn btn-<?php echo ($limite === 3)?"primary":"light"; ?>">3</a>
                livre(s)
            </p>
            <table class="table table-stripped">
                <thead class="thead-dark">
                    <tr>
                        <th>
                            Numéro
                            <i class="fas fa-sort-amount-<?php if ($tri == 1) { ?>up<?php } else { ?>down<?php } ?>"></i>
                        </th>
                        <th>Informations</th>
                        <th>Pochette</th>
                        <th>Résumé</th>
                        <th>Ressources</th>
                    </tr>
                </thead>
                <tbody>
        <?php
        // boucle pour chaque élément de l'array $livres
        foreach ($livres as $a => $livre) {
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
                            <strong>
                                #<?php echo $a + 1; ?>
                            </strong>
                        </td>
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
                        <td colspan="5" class="text-right">
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
