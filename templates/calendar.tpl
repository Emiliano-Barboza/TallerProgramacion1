{* Smarty *}

<dir class="calendar">
    <div class="month-navigation">
        <button id="previous-month">{$calendar.previousMonth}</button>
        <button id="next-month">{$calendar.nextMonth}</button>
        <span>{$calendar.currentMonth} de {$calendar.currentYear}</span>
    </div>
    <div class="month-container">
        {foreach $calendar.weeks as $week}
        <div class="week">
        {foreach $week as $day key=index}
            <dir>
                <dir class="{if isset($day.data)}booking-{$day.data.status}{/if}">{$day.title}</dir>
                {if isset($day.data) }
                <dir>Contidad inscriptos: {$day.data.inscriptos}</dir>
                <dir>Contidad con libreta: {$day.data.licencias}</dir>
                <dir>Costo: {$day.data.costo}</dir>
                <dir>Cupos disponibles: {$day.data.cupos - $day.data.inscriptos}</dir>
                    {if isset($user) && !$user.is_admin && ($day.data.cupos - $day.data.inscriptos > 0) }
                    <a href="booking.php?date={$day.data.fecha}">Reservar clase</a>
                    {/if}
                {/if}
            </dir>
        {/foreach}
        </div>
        {/foreach}
    </div>    
</dir>
