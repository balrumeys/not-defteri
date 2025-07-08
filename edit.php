<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <title>NOT DÜZENLE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css" integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>NOT DÜZENLE</h1>

        <form method="POST">
            <label for="title" class="form-label">Başlık:</label>
            <input name="title" type="text">

            <label for="content" class="form-label">Not:</label>
            <textarea name="content"></textarea>

            <button type="submit" class="btn btn-primary">Kaydet</button>

        </form>
        
        <a class="btn btn-primary mt-3" href="index.php">Geri Dön</a>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/js/bootstrap.min.js" integrity="sha512-zKeerWHHuP3ar7kX2WKBSENzb+GJytFSBL6HrR2nPSR1kOX1qjm+oHooQtbDpDBSITgyl7QXZApvDfDWvKjkUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>