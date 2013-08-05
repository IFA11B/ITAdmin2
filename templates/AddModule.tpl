{include file="Header.tpl" title="Add Module" displayNavbar=true}
<form action="#" method="POST">
    <div id="moduleName">
        <span>Module Name:</span><input type="text" name="moduleName">
    </div>
    <div id="moduleClassName">
        <span>Module Class Name:</span><input type="text" name="moduleClassName" pattern="[a-zA-Z_][a-zA-Z0-9_]*">
    </div>
    <div id="moduleSortOrder">
        <span>Module Sort Order:</span><input type="number" name="moduleSortOrder" value="0" pattern="[0-9]+">
    </div>
    <div id="moduleDescription">
        <span>Module Description:</span><textarea name="moduleDescription" rows="3" cols="48"></textarea>
    </div>
    <div id="moduleRead">
        <label for="moduleRead">Default Read Rights:</label><input type="checkbox" name="moduleRead" value="1" checked>
    </div>
    <div id="moduleWrite">
        <label for="moduleWrite">Default Write Rights:</label><input type="checkbox" name="moduleWrite" value="1">
    </div>
    <input type="submit" name="addmodule" value="Add Module">
</form>
{include file="Footer.tpl"}