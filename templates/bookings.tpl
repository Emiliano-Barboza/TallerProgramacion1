{* Smarty *}
{include file="basePageBegin.tpl"}
<div>
    <form method="POST" action="bookings.php">
        <p>
            Instructors: 
            <select name="instructor_id">
            {foreach $instructors as $instructor key=index}
               <option value="{$instructor.instructor_id}">{$instructor.nombre} {$instructor.apellido}</option>
            {/foreach}
            </select>
        </p>
        <p>
            Fecha: <input type="date" id="start" name="fecha" value="2020-08-18"
            accept="">
        </p>
        <p>
            <input type="submit" value="Submit">
        </p>
    </form>
    {if isset($bookings)}
        <div class="print-wrapper">
        {if empty($bookings)}
            <div>There are no bookings for the selected day and instructor.</div>
        {/if}
        {foreach $bookings as $booking key=index}
            <dir>
                <div>{$booking.nombre} {$booking.apellido}</div>
                <div>{$booking.direccion}</div>
                <div>{$booking.hora}</div>
            </dir>
        {/foreach}
        </div>
        <button onclick="window.print();"> Print </button>
    {/if}
           
</div>
{include file="basePageEnd.tpl"}
