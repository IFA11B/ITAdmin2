<!DOCTYPE html>

<html>
    <head>
        <title>Add Action</title>
    </head>
    <body>
        {include file="NavBar.tpl"}
        <form method="POST" action="#">
            <div id="actionName">
                <span>Action Name:</span><input type="text" name="name">
            </div>
            <input type="submit" name="addaction" value="Add Action">
        </form>
    </body>
</html>