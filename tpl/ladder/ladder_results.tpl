<div class="panel panel-default">
    <div class="panel-body">
        <div class="well well-sm"><strong>Last Update:</strong> {$ladder->getLastUpdate()}</div>
        <div class="well well-sm"><strong>Avg. Level:</strong> {$ladder->getAvgLevel()}</div>
        {if $ladder->hasSearch()}
        <div class="well well-sm"><strong>Results (Name):</strong> {foreach from=$ladder->getResults() item=$result}<a href="#r{$result->getBTagMinus()}" class="btn btn-xs btn-success">{$result->getName()}</a> {foreachelse}No matches!{/foreach}</div>
        {/if}
        {if $ladder->hasSearchClanTag()}
        <div class="well well-sm"><strong>Results (Clan Tag):</strong> {foreach from=$ladder->getResultsClanTag() item=$result}<a href="#r{$result->getBTagMinus()}" class="btn btn-xs btn-success">{$result->getName()}</a> {foreachelse}No matches!{/foreach}</div>
        {/if}
        {if $ladder->hasSearchClan()}
        <div class="well well-sm"><strong>Results (Clan):</strong> {foreach from=$ladder->getResultsClan() item=$result}<a href="#r{$result->getBTagMinus()}" class="btn btn-xs btn-success">{$result->getName()}</a> {foreachelse}No matches!{/foreach}</div>
        {/if}
    </div>
</div>
