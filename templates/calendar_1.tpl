{block name=head}
    <link href="content/css/calendar.css" rel="stylesheet" type="text/css"/>
{/block}  
<dir class="calendar">
{for $week=0 to $amountOfWeeks}
    <ul class="flex-container">
    {foreach $daysOfWeek as $dayOfWeek key=index}
        {if $week == 0}
            <li class="flex-item">{$dayOfWeek}</li>
        {else}
            <li class="flex-item">week {$week}</li>
        {/if}
    {/foreach}
    </ul>
{/for}
</dir>
