{include file="Header.tpl" title="List Components" displayNavbar=true}
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
            <td><a href="/{$pathRelative}Components/Edit?component={$component.id}">{$component.id}</a></td>
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
{include file="Footer.tpl"}