<!DOCTYPE html>

<html>
    <head>
        <title>Add Attribute</title>
    </head>
    <body>
        {include file="NavBar.tpl"}
        <form method="POST" action="#">
            <div id="attributeInternalName">
                <span>Internal Name:</span><input type="text" name="internalName">
            </div>
            <div id="attributeDisplayName">
                <span>Display Name:</span><input type="text" name="displayName">
            </div>
            <div id="attributeDataType">
                <span>Data Type:</span>
                <select name="dataType">
                    <option value="number">Numerical Value</option>
                    <option value="string">Short Text</option>
                    <option value="text">Long Text</option>
                    <option value="date">Date</option>
                    <option value="ip">IP Address</option>
                    <option value="email">eMail Address</option>
                    <option value="enum">Enumeration</option>
                </select>
            </div>
            <div id="attributeValues">
                <span>Valid Values:</span>
                <select multiple name="values[]" size="8">
                    {foreach $values as $value}
                        <option value="{$value.id}">{$value.content} {$value.unit}</option>
                    {/foreach}
                </select>
            </div>
            <input type="submit" name="addattribute" value="Add Attribute">
        </form>
    </body>
</html>