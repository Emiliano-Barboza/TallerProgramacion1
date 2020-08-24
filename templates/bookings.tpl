{* Smarty *}
{include file="basePageBegin.tpl"}

{include file="wrapperContainerBegin.tpl"}
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
                <input type="submit" value="Search">
            </p>
        </form>
        {if isset($bookings)}
        <div class="print-wrapper">
            <div class="list-container">
                <div class="list-container-panel-header">
                    <div>Bookings for the selected instructor</div>
                </div>
                <div class="list-container-panel">
                    {foreach $bookings as $booking key=index}
                        <div class="inner">
                            <div>{$booking.nombre} {$booking.apellido}</div>
                            <div>{$booking.direccion}</div>
                            <div>{$booking.hora}</div>
                        </div>
                    {/foreach}
                </div>
                <div class="list-container-panel-footer">
                    {if empty($bookings)}
                        <div>There are no bookings for the selected day.</div>
                    {/if}
                </div>
            </div>
        </div>
            <button onclick="window.print();"> Print </button>
        {/if}   
    </div>
{include file="wrapperContainerEnd.tpl"}

{include file="basePageEnd.tpl"}
