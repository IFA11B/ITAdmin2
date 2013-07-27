<!DOCTYPE html>

<html>
    <head>
        <title>Edit User</title>
    </head>
    <body>
        <form action="#" method="POST">
            <div id="username">
                <span>Username:</span><input type="text" name="username" value="{$name}">
            </div>
            <div id="password">
                <span>Password:</span><input type="password" name="password">
            </div>
            <div>
                <span>Create Date:</span><input type="date" name="createdate" value="{$date}">
            </div>
            <input type="hidden" name="id" value="{$id}">
            <input type="submit" name="edituser" value="Edit User">
        </form>
    </body>
</html>