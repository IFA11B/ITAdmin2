<!DOCTYPE html>

<html>
    <head>
        <title>Add Value</title>
    </head>
    <body>
        {include file="NavBar.tpl"}
        <form method="POST" action="#">
            <div id="valueUnit" title="GHz, MHz, GiB, MiB, Gbps, Mbps ...">
                <span>Unit:</span><input type="text" name="unit">
            </div>
            <div id="valueContent" title="PCIe, SATA2, SATA3, <number> ...">
                <span>Content:</span><input type="text" name="content">
            </div>
            <input type="submit" name="addvalue" value="Add Value">
        </form>
    </body>
</html>