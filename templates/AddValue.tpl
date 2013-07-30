{include file="Header.tpl" title="Add Value" displayNavbar=true}
<form method="POST" action="#">
    <div id="valueUnit" title="GHz, MHz, GiB, MiB, Gbps, Mbps ...">
        <span>Unit:</span><input type="text" name="unit">
    </div>
    <div id="valueContent" title="PCIe, SATA2, SATA3, <number> ...">
        <span>Content:</span><input type="text" name="content">
    </div>
    <input type="submit" name="addvalue" value="Add Value">
</form>
{include file="Footer.tpl"}