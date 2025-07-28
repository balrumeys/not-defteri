<!DOCTYPE html>
<html>

{include file="head.tpl"}

<body>

    {include file="header.tpl"}

    <div class="container notes-wrapper gap-4">
        <div class="notes vstack gap-3">
            {if !empty($notes)}
                {foreach $notes as $id=>$note}
                    <div class="card ">
                        <div class="card-header d-flex justify-content-between">
                            <h2>
                                {$note.title}
                                ({$note.date})
                            </h2>
                            <div class="d-flex gap-3">
                                <form
                                    action="/notes/{$id}/delete"
                                    method="POST"
                                >
                                    <button
                                        type="submit"
                                        class="btn btn-danger"
                                    >Sil</button>
                                </form>
                                <a
                                    href="/notes/{$id}/edit"
                                    class="btn btn-success"
                                >Düzenle</a>
                            </div>
                        </div>
                        <div class="card-body">
                            {($note.content)}
                        </div>
                    </div>
                {/foreach}
            </div>
        {else}
            <p>Henüz not eklenmedi.</p>
        {/if}
        <form
            action="/notes/delete-all"
            method="POST"
        >
            <button
                type="submit"
                class="btn btn-danger"
            >Tüm Notları Sil</button>
        </form>

    </div>

    {include file="footer.tpl"}

</body>

</html>