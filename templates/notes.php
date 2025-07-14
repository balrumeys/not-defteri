<!DOCTYPE html>
<html>

<?php include "../head.php"; ?>

<body>

    <?php include "../header.php"; ?>

    <div class="container notes-wrapper">
        <div class="notes vstack gap-3">
            <?php if (!empty($notes)): ?>
                <?php foreach ($notes as $id => $note): ?>
                    <div class="card ">
                        <div class="card-header d-flex justify-content-between">
                            <div>
                                <?= $note['title'] ?>
                                (<?= $note['date'] ?>)
                            </div>
                            <div>
                                <a href="/pages/delete.php?id=<?= $id ?>" class="btn btn-danger">Sil</a>
                                <a href="/pages/edit.php?id=<?= $id ?>" class="btn btn-success">Düzenle</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <?= nl2br($note['content']) ?>
                        </div>
                    </div>
                <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Henüz not eklenmedi.</p>
    <?php endif; ?>
    </div>

    <?php include "../footer.php"; ?>

</body>

</html>