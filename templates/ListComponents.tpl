<!DOCTYPE html>

<html>
    <head>
        <title>List Components</title>
    </head>
    <body>
        {include file="NavBar.tpl"}
        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Archetype</td>
                    <td>Room</td>
                    <td>Manufacturer</td>
                    <td>Purchased On</td>
                    <td>Note</td>
                </tr>
            </thead>
            <tbody>
                {foreach $components as $component}
                <tr>
                    <td>{$component.id}</td>
                    <td>{$component.archetype}</td>
                    <td>{$component.roomNumber} - {$component.roomName}</td>
                    <td>{$component.manufacturer}</td>
                    <td>{$component.purchaseDate}</td>
                    <td>{$component.note}</td>
                </tr>
                {/foreach}
            </tbody>
        </table>
        <a href="/{$pathRelative}Components/Add">
            <button>Add Component</button>
        </a>
    </body>
</html>