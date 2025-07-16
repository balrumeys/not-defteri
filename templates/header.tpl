<header>
    <div class="full-header">
        <div class="container">
            <div class="menu">
                <h1>{$sayfaBasligi}</h1>
                {foreach $islemler as $islem }
                    <a
                        href="{$islem.href}"
                        class="{$islem.class}"
                        title="{$islem.title}"
                        data-bs-toggle="tooltip"
                    >
                        <img src="{$islem.icon}" />
                    </a>
                {/foreach}
            </div>
        </div>
    </div>
</header>