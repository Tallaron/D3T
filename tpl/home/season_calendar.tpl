<div class="panel panel-info">
    <div class="panel-heading">
        <strong>[EU] Season {D3_CURRENT_SEASON_EU}:</strong> {$cal->getStartDateFormatted('d.m.Y')} - {$cal->getEndDateFormatted('d.m.Y')}
        {if $cal->todayIsSeasonal()}
            <span class="pull-right">Day: {$cal->currentDay()}</span>
        {/if}
    </div>
    <div class="panel-body">

        {foreach from=$cal->getMonths() key=$monthOffset item=$month}
            {include file="home/month.tpl"}
        {/foreach}
        
    </div>
</div>