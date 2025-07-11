<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <header>
        <div class="full-header">
            <div class="container">
                <div class="menu">
                    <h1><?= $sayfaBaslıgı ?></h1>

                    <a href="<?= $sayfaLinki ?>" class="add-note-image-btn <?= $id ?>" title="<?= $tooltip ?>" data-bs-toggle="tooltip">
                        <img src="<?= $sayfaIconu ?>" />
                    </a>
                </div>
            </div>
        </div>
    </header>

</body>

</html>