<!DOCTYPE html>
<html>

{include file="head.tpl"}

<body>

    {include file="header.tpl"}

    <div class="container notes-wrapper">
        <a
            href="/notes"
            class="btn btn-success"
        >
            Notlar
        </a>
        <div>
            <p>{count($notes)} notunuz var</p>
        </div>

    </div>


    {include file="footer.tpl"}

</body>

</html>