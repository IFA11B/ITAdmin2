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
            <table>
                <thead>
                    <tr>
                        <td>Module</td>
                        <td>Read Access</td>
                        <td>Write Access</td>
                    </tr>
                </thead>
                <tbody>
                    {foreach $modules as $module}
                        <tr>
                            <td>{$module.name}</td>
                            <td><input type="checkbox" name="read[]" value="{$module.id}" {if $module.read == true}checked{/if}></td>
                            <td><input type="checkbox" name="write[]" value="{$module.id}" {if $module.write == true}checked{/if}></td>
                        </tr>
                    {/foreach}
                </tbody>
            </table>
            <input type="hidden" name="id" value="{$id}">
            <input type="submit" name="edituser" value="Edit User">
        </form>
    </body>
</html>