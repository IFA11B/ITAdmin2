{include file="Header.tpl" title="Add Archetype" displayNavbar=true}
<form method="POST" action="#">
    <div id="archetypeName">
        <span>Archetype Name:</span><input type="text" name="name">
    </div>
    <div id="archetypeAttributes">
        <span>Has Attributes:</span>
        <select multiple name="attributes[]" size="8">
            {foreach $attributes as $attribute}
                <option value="{$attribute.id}">{$attribute.name}</option>
            {/foreach}
        </select>
        <a href="/{$pathRelative}AddAttribute">Add Attribute</a>
    </div>
    <input type="submit" name="addarchetype" value="Add Archetype">
</form>
{include file="Footer.tpl"}