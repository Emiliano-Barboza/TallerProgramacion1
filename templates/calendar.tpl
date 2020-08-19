{* Smarty *}

<div class="calendar">
    <div class="month-navigation">
        <button month="{$calendar.previousMonth}" year="{$calendar.currentYear}" class="navigate-calendar">{$calendar.previousMonthText}</button>
        <button month="{$calendar.nextMonth}" year="{$calendar.currentYear}" class="navigate-calendar">{$calendar.nextMonthText}</button>
        <span>{$calendar.currentMonthText} {$calendar.currentYear}</span>
    </div>
    <div class="month-container">
        {foreach $calendar.weeks as $week}
        <div class="week-container">
        {foreach $week as $day key=index}
            <div class="day-container">
                <div class="{if isset($day.data)}booking-{$day.data.status}{/if}">{$day.title}</div>
                {if isset($day.data) }
                 <div class="day-info">
                    <div>Enrolled: {$day.data.inscriptos}</div>
                    <div>With license: {$day.data.licencias}</div>
                    <div>Cost: {$day.data.costo}</div>
                    <div>Available bookings: {$day.data.cupos - $day.data.inscriptos}</div>
                    {if isset($user) && !$user.is_admin && ($day.data.cupos - $day.data.inscriptos > 0) }
                    <a href="booking.php?date={$day.data.fecha}">Book</a>
                    {/if}
                </div>
                
                {/if}
            </div>
        {/foreach}
        </div>
        {/foreach}
    </div>    
</div>
