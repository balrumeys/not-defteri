<!DOCTYPE html>
<html>

<?php include "../head.php"; ?>

<body>

    <?php include "../header.php" ?>

    <div class="container add-wrapper">
        <form method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Başlık:</label>
                <input name='title' type="text" class="form-control" id="title" placeholder="alınacaklar..">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Not:</label>
                <textarea name='content' class="form-control" id="content" rows="3" placeholder="ekmek,süt,yumurta..."></textarea>
            </div>
            <button type="submit" class="btn btn-success">Kaydet</button>
        </form>
    </div>

    <?php include "../footer.php"; ?>


</body>

</html>