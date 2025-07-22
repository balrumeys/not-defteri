<!DOCTYPE html>
<html lang="tr">

{include file="head.tpl"}

<body>

    {include file="header.tpl"}

    <div class="container edit-wrapper">
        <form method="POST" action="/notes/{$id}/edit">
            <label
                for="title"
                class="form-label"
            >Başlık:</label>
            <input
                id="title"
                name="title"
                type="text"
                value="{$note.title}"
                class="form-control"
                required
            >

            <label
                for="content"
                class="form-label"
            >Not:</label>
            <textarea
                id="content"
                name="content"
                class="form-control"
                placeholder="Content"
                required
            >{$note.content}</textarea>
            <button
                type="submit"
                class="btn btn-success"
            >Kaydet</button>
        </form>
    </div>

    {include file="footer.tpl"}

</body>

</html>