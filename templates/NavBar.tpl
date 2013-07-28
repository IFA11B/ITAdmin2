<div id=navbar>
    <ul>
        {foreach $navbar.modules as $module}
            {if $module.read == 1}
                <li><a href="{$module.link}" title="{$module.descr}">{$module.name}</a></li>
            {/if}
        {/foreach}
    </ul>
</div>