<!DOCTYPE html>
<html>

{include file="head.tpl"}

<body>

    {include file="header.tpl"}

    <div class="container notes-wrapper gap-4">

        <div class="note-counter-box d-inline-flex align-items-center justify-content-center shadow-sm ">
            <span class="note-counter-label">Toplam Notunuz:</span>
            <span class="note-counter-number ">{count($notes)}</span>
        </div>
        <div class="home-box d-inline-flex align-items-center justify-content-center shadow-sm">
            <a
                href="/notes"
                class="note-counter-label"
            >NOTLAR</a>
        </div>
        <div class="home-box d-inline-flex align-items-center justify-content-center shadow-sm">
            <a
                href="/notes/add"
                class="note-counter-label"
            >YENİ NOT</a>
        </div>
    </div>


    {include file="footer.tpl"}

</body>

</html>