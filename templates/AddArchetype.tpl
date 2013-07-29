<!DOCTYPE html>

<html>
    <head>
        <title>Add Archetype</title>
    </head>
    <body>
        {include file="NavBar.tpl"}
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
            </div>
            <input type="submit" name="addarchetype" value="Add Archetype">
        </form>
    </body>
</html>