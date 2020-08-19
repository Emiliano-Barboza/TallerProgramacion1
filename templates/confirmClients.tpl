{* Smarty *}
{include file="basePageBegin.tpl"}
{include file="wrapperContainerBegin.tpl"}

<div class="list-container">
    <div class="list-container-panel-header">
        <div>Confirm clients</div>
    </div>
    <div class="list-container-panel">
    {foreach $users as $user key=index}
        <div class="inner">
            <span>{$user.nombre} {$user.apellido}</span>
            <button id="{$user.usuario_id}" class="confirm">Confirm</button>
        </div>
    {/foreach}   
    </div>
    <div class="list-container-panel-footer">
    {if empty($users)}
        <div>There are no clients to confirm by this time.</div>
    {/if}
    </div>
</div>
{include file="wrapperContainerEnd.tpl"}
{include file="basePageEnd.tpl"}