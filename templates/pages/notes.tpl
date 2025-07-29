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
                            <h5 >
                                {$note.title}
                                ({$note.date})
                            </h5>
                            <div class="d-flex gap-2">
                                <form
                                    action="/notes/{$id}/delete"
                                    method="POST"
                                >
                                    <button
                                        type="submit"
                                        class="btn btn-danger"
                                    >Sil</button>
                                </form>
                                <button class="btn btn-success">
                                    <a href="/notes/{$id}/edit">Düzenle</a>
                                </button>

                            </div>
                        </div>
                        <p class="card-body">
                            {($note.content)}
                        </p>
                    </div>
                {/foreach}
            </div>
            <form
                action="/notes"
                method="POST"
            >
                <input
                    type="hidden"
                    name="_METHOD"
                    value="DELETE"
                >
                <button
                    type="submit"
                    class="btn btn-danger"
                >Tüm Notları Sil</button>
            </form>
        {else}
            <p>Henüz not eklenmedi.</p>
        {/if}
    </div>

    {include file="footer.tpl"}

</body>

</html>