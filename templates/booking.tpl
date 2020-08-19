{* Smarty *}
{include file="basePageBegin.tpl"}
<div>
    <span name="fecha">{$selectedDate}</span>
    <form method="POST" action="booking.php">
        <p> 
            <input type="hidden" name="fecha" value="{$date}">
        </p>
        <p>
            Hora disponible:
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
            <div>No hay licencias para confirmar en este momento.</div>
        {/if}
        {foreach $instructors as $instructor key=index}
            <dir>
                <span>{$instructor.nombre} {$instructor.apellido}</span>
                <button id="{$instructor.instructor_id}" date="{$date}" user-id="{$user.user_id}" hour="{$selectedHour}" class="confirm">Confirmar</button>
            </dir>
        {/foreach}
    {/if}       
</div>
{include file="basePageEnd.tpl"}
