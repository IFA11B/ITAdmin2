{include file="Header.tpl" title="List Modules" displayNavbar=true}
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
{include file="Footer.tpl"}