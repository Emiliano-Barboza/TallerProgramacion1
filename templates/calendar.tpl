<link href="content/css/calendar.css" rel="stylesheet" type="text/css"/>

<dir class="calendar">
{foreach $calendar.weeks as $week}
    <div class="week">
    {foreach $week as $day key=index}
        <dir>
            <dir>{$day.title}</dir>
            {if isset($day.data) }
                <dir>Something here</dir>
            {/if}
        </dir>
    {/foreach}
    </div>
{/foreach}
</dir>
