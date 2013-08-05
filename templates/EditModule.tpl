{include file="Header.tpl" title="Edit Module" displayNavbar=true}
<form action="#" method="POST">
    <div id="moduleName">
        <span>Module Name:</span><input type="text" name="name" value="{$name}">
    </div>
    <div id="moduleClassName">
        <span>Module Class Name:</span><input type="text" name="className" value="{$className}" pattern="[a-zA-Z_][a-zA-Z0-9_]*">
    </div>
    <div id="moduleSortOrder">
        <span>Module Sort Order:</span><input type="number" name="sortOrder" value="{$sortOrder}" pattern="[0-9]*">
    </div>
    <div id="moduleDescription">
        <span>Module Description:</span><textarea name="description" rows="3" cols="48">{$description}</textarea>
    </div>
    <div id="moduleDefaultRead">
        <span>Default Read Rights:</span><input type="checkbox" name="defaultRead" value="1" {if $defaultRead == 1} checked {/if}>
    </div>
    <div id="moduleDefaultWrite">
        <span>Default Write Rights:</span><input type="checkbox" name="defaultWrite" value="1" {if $defaultWrite == 1} checked {/if}>
    </div>
    
    <input type="hidden" name="id"value="{$id}">
    <input type="submit" name="editmodule" value="Edit Module">
    <input type="submit" name="deletemodule" value="Delete Module">
</form>
{include file="Footer.tpl"}