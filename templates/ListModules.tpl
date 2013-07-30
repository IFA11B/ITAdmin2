<!DOCTYPE html>

<html>
    <head>
        <title>List Modules</title>
    </head>
    <body>
        {include file="NavBar.tpl"}
        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Description</td>
                </tr>
            </thead>
            <tbody>
                {foreach $modules as $module}
                <tr>
                    <td>{$module.id}</td>
                    <td>{$module.name}</td>
                    <td>{$module.descr}</td>
                </tr>
                {/foreach}
            </tbody>
        </table>
        <a href="/{$pathRelative}Modules/Add">
            <button>Add Module</button>
        </a>
    </body>
</html>