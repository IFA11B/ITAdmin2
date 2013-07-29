<!DOCTYPE html>

<html>
    <head>
        <title>Add Component</title>
    </head>
    <body>
        {include file="NavBar.tpl"}
        <form method="POST" action="#">
            <div id="componentArchetype">
                <span>Select Archetype:</span>
                <select name="archetype">
                    {foreach $archetypes as $archetype}
                        <option value="{$archetype.id}">{$archetype.name}</option>
                    {/foreach}
                </select>
            </div>
            <input type="submit" name="steptwo" value="Next Step">
        </form>
    </body>
</html>