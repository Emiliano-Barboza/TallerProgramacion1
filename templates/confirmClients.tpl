{* Smarty *}
{include file="basePageBegin.tpl"}

<dir>
    {foreach $users as $user key=index}
        <dir>
            <span>{$user.nombre} {$user.apellido}</span>
            <button id="{$user.usuario_id}" class="confirm">Confirmar</button>
        </dir>
    {/foreach}  
</dir>

{include file="basePageEnd.tpl"}