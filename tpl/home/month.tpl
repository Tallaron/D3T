    <div>
        <table class="month-table">
                <tr>
                    <th colspan="8" class="month-name">{$month->getName()}</th>
                </tr>
                <tr class="calendar-default">
                    <th>&nbsp;</th>
                    <th class="calendar-day-column">Mo</th>
                    <th class="calendar-day-column">Tu</th>
                    <th class="calendar-day-column">We</th>
                    <th class="calendar-day-column">Th</th>
                    <th class="calendar-day-column">Fr</th>
                    <th class="calendar-day-column">Sa</th>
                    <th class="calendar-day-column">Su</th>
                </tr>
                {foreach from=$month->getWeeks() item=$week}
                    {include file="home/week.tpl"}
                {/foreach}
        </table>
    </div>