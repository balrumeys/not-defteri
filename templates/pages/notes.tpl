<!DOCTYPE html>
<html>

{include file="head.tpl"}

<body>

    {include file="header.tpl"}

    <div class="container notes-wrapper">
        <div class="notes vstack gap-3">
            {if !empty($notes)}
                {foreach $notes as $id=>$note}
                    <div class="card ">
                        <div class="card-header d-flex justify-content-between">
                            <div>
                                {$note.title}
                                ({$note.date})
                            </div>
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
    </div>

    {include file="footer.tpl"}

</body>

</html>