<tr class="week">
    <td class="calendar-default">{$week->getSeasonWeek($cal, $month)}</td>
    {foreach $week->getDays() item=$day}
        {include file="home/day.tpl"}
    {/foreach}
</tr>
