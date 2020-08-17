<link href="content/css/calendar.css" rel="stylesheet" type="text/css"/>

<dir class="calendar">
{foreach $calendar.weeks as $week}
    <ul class="flex-container">
    {foreach $week as $day key=index}
        <li class="flex-item">{$day.title}</li>
    {/foreach}
    </ul>
{/foreach}
</dir>

