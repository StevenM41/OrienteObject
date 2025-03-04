<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    $dossier = 'styles/';

    if (is_dir($dossier)) {
        $fichiers = scandir($dossier);

        foreach ($fichiers as $fichier) {
            if ($fichier !== "." && $fichier !== ".." && pathinfo($fichier, PATHINFO_EXTENSION) === "css") {
                echo '<link rel="stylesheet" href="' . htmlspecialchars($dossier . $fichier) . '">' . PHP_EOL;
            }
        }
    } else {
        echo "Aucun fichier n'a étais trouvé";
    }
    ?>
    <title>Liste des articles</title>

</head>
<body>