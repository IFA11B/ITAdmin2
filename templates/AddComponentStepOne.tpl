{include file="Header.tpl" title="Add Component" displayNavbar=true}
<form method="POST" action="#">
    <div id="componentArchetype">
        <span>Select Archetype:</span>
        <select name="archetype">
            {foreach $archetypes as $archetype}
                <option value="{$archetype.id}">{$archetype.name}</option>
            {/foreach}
        </select>
        <a href="/{$pathRelative}AddArchetype">Add Archetype</a>
    </div>
    <input type="submit" name="steptwo" value="Next Step">
</form>
{include file="Footer.tpl"}