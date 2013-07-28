<!DOCTYPE html>

<html>
    <head>
        <title>Add Module</title>
    </head>
    <body>
        {include file="NavBar.tpl"}
        <form action="#" method="POST">
            <div id="modulename">
                <span>Module Name:</span><input type="text" name="moduleName">
            </div>
            <div id="moduledescription">
                <span>Module Description:</span><textarea name="moduleDescr" rows="3" cols="48"></textarea>
            </div>
            <div id="moduleread">
                <label for="moduleRead">Default Read Rights:</label><input type="checkbox" name="moduleRead" value="1" checked>
            </div>
            <div id="modulewrite">
                <label for="moduleWrite">Default Write Rights:</label><input type="checkbox" name="moduleWrite" value="1">
            </div>
            <input type="submit" name="addmodule" value="Add Module">
        </form>
    </body>
</html>