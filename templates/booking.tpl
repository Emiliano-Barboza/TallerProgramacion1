{* Smarty *}
{include file="basePageBegin.tpl"}
{include file="wrapperContainerBegin.tpl"}
    <div>
        <span name="fecha">{$selectedDate}</span>
        <form method="POST" action="booking.php">
            <p> 
                <input type="hidden" name="fecha" value="{$date}">
            </p>
            <p>
                Available hour:
                <select name="hora">
                {foreach $availableHours as $hour key=index}
                   <option value="{$hour}" {if isset($selectedHour) && $selectedHour == $hour} selected {/if}>{$hour}</option>
                {/foreach}
                </select>
            </p>
            <p>
                <input type="submit" value="Mostrar instructores disponibles">
            </p>
        </form>
        {if isset($instructors)}
            <div class="list-container">
                <div class="list-container-panel-header">
                    <div>Licenses</div>
                </div>
                <div class="list-container-panel">
                {foreach $instructors as $instructor key=index}
                    <div class="inner">
                        <div>{$instructor.nombre} {$instructor.apellido}</div>
                        <button id="{$instructor.instructor_id}" date="{$date}" user-id="{$user.user_id}" hour="{$selectedHour}" class="confirm">Confirm</button>
                    </div>
                {/foreach} 
                </div>
                <div class="list-container-panel-footer">
                    {if empty($instructors)}
                        <div>There are no licenses to confirm by this time.</div>
                    {/if}
                </div>
            </div>
        {/if}       
    </div>
{include file="wrapperContainerEnd.tpl"}
{include file="basePageEnd.tpl"}
