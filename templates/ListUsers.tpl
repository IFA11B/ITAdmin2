<!DOCTYPE html>

<html>
    <head>
        <title>List Users</title>
    </head>
    <body>
        {include file="NavBar.tpl"}
        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Created</td>
                </tr>
            </thead>
            <tbody>
                {foreach $users as $user}
                <tr>
                    <td>{$user.id}</td>
                    <td><a href="/{$pathRelative}Users/Edit?user={$user.id}">{$user.name}</a></td>
                    <td>{$user.createDate}</td>
                </tr>
                {/foreach}
            </tbody>
        </table>
        <a href="/{$pathRelative}Users/Add">
            <button>Add User</button>
        </a>
    </body>
</html>