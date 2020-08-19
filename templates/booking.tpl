{* Smarty *}
{include file="basePageBegin.tpl"}
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
        {if empty($instructors)}
            <div>There are no licenses to confirm by this time.</div>
        {/if}
        {foreach $instructors as $instructor key=index}
            <dir>
                <span>{$instructor.nombre} {$instructor.apellido}</span>
                <button id="{$instructor.instructor_id}" date="{$date}" user-id="{$user.user_id}" hour="{$selectedHour}" class="confirm">Confirm</button>
            </dir>
        {/foreach}
    {/if}       
</div>
{include file="basePageEnd.tpl"}
