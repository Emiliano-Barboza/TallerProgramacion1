{* Smarty *}
{include file="basePageBegin.tpl"}

<dir>
    {if empty($users)}
        <div>No hay licencias para confirmar en este momento.</div>
    {/if}
    {foreach $users as $user key=index}
        <dir>
            <span>{$user.nombre} {$user.apellido}</span>
            <button id="{$user.usuario_id}" class="confirm">Confirmar</button>
        </dir>
    {/foreach}
</dir>

{include file="basePageEnd.tpl"}