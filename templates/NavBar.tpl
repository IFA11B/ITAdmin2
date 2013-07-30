<div id=navbar>
    <ul>
        <li><a href="/{$pathRelative}Home">Home</a></li>
        {foreach $navbar.modules as $module}
            {if $module.read == 1}
                <li><a href="{$module.link}" title="{$module.descr}">{$module.name}</a></li>
            {/if}
        {/foreach}
        <li><a href="/{$pathRelative}Logout">Logout</a></li>
    </ul>
</div>