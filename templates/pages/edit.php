<!DOCTYPE html>
<html lang="tr">

<?php include "../head.php"; ?>

<?php include "../header.php"; ?>

<body>
    <div class="container edit-wrapper">
        <form method="POST">
            <label for="title" class="form-label">Başlık:</label>
            <input name="title" type="text" value="<?php echo htmlspecialchars($note['title']); ?>" class="form-control" required>

            <label for="content" class="form-label">Not:</label>
            <textarea name="content" placeholder="Content"><?php echo htmlspecialchars($note['content']); ?></textarea>
            <button type="submit" class="btn btn-success">Kaydet</button>
        </form>
    </div>

    <?php include "../footer.php"; ?>

</body>

</html>