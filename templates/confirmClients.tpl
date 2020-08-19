{* Smarty *}
{include file="basePageBegin.tpl"}

<dir>
    {if empty($users)}
        <div>There are no clients to confirm by this time.</div>
    {/if}
    {foreach $users as $user key=index}
        <dir>
            <span>{$user.nombre} {$user.apellido}</span>
            <button id="{$user.usuario_id}" class="confirm">Confirm</button>
        </dir>
    {/foreach}  
</dir>

{include file="basePageEnd.tpl"}