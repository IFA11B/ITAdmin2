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
            <td><input type="checkbox" name="read[]" value="{$module.id}"
                {if $module.read==true} checked {/if}></td>
            <td><input type="checkbox" name="write[]" value="{$module.id}"
                {if $module.write==true} checked {/if}></td>
        </tr>
        {/foreach}
    </tbody>
</table>