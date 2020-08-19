{* Smarty *}

<dir class="calendar">
    <div class="month-navigation">
        <button month="{$calendar.previousMonth}" year="{$calendar.currentYear}" class="navigate-calendar">{$calendar.previousMonthText}</button>
        <button month="{$calendar.nextMonth}" year="{$calendar.currentYear}" class="navigate-calendar">{$calendar.nextMonthText}</button>
        <span>{$calendar.currentMonthText} {$calendar.currentYear}</span>
    </div>
    <div class="month-container">
        {foreach $calendar.weeks as $week}
        <div class="week">
        {foreach $week as $day key=index}
            <dir>
                <dir class="{if isset($day.data)}booking-{$day.data.status}{/if}">{$day.title}</dir>
                {if isset($day.data) }
                <dir>Enrolled: {$day.data.inscriptos}</dir>
                <dir>With license: {$day.data.licencias}</dir>
                <dir>Cost: {$day.data.costo}</dir>
                <dir>Available bookings: {$day.data.cupos - $day.data.inscriptos}</dir>
                    {if isset($user) && !$user.is_admin && ($day.data.cupos - $day.data.inscriptos > 0) }
                    <a href="booking.php?date={$day.data.fecha}">Book</a>
                    {/if}
                {/if}
            </dir>
        {/foreach}
        </div>
        {/foreach}
    </div>    
</dir>
