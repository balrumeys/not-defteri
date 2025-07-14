<header>
    <div class="full-header">
        <div class="container">
            <div class="menu">
                <h1><?= $sayfaBaslıgı ?></h1>

                <!-- <a href="<?= $oncekiSayfaLink ?>" class="add-note-image-btn <?= $id ?>" title="<?= $tooltip ?>" data-bs-toggle="tooltip">
                    <img src="<?= $sayfaIconu ?>" />
                </a> -->

                <?php
                foreach($islemler as $islem){
                    echo '<a href="'.$islem['href'].'" class="'.$islem['class'].'" title="'.$islem['title'].'" data-bs-toggle="tooltip">';
                    echo '<img src="'.$islem['icon'].'" />';
                    echo '</a>';

                }
                

                
                
                
                
                
                
                
                ?>













            </div>
        </div>
    </div>
</header>