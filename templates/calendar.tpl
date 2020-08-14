{block name=head}
    <link href="content/css/calendar.css" rel="stylesheet" type="text/css"/>
{/block}  
<dir class="calendar">
{for $week=0 to $amountOfWeeks}
    <div class="week">
    {foreach $daysOfWeek as $dayOfWeek key=index}
        {if $week == 0}
            <dir class="day day-name">{$dayOfWeek}</dir>
        {else}
            <dir class="day day-number">week {$week}</dir>
        {/if}
    {/foreach}
    </div>
{/for}
</dir>
