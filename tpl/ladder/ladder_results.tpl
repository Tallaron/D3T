<div class="panel panel-default">
    <div class="panel-body">
        <div class="well well-sm"><strong>Avg. Level:</strong> {$ladder->getAvgLevel()}</div>
        {if $ladder->hasSearch()}
        <div class="well well-sm"><strong>Results:</strong> {foreach from=$ladder->getResults() item=$result}<a href="#r{$result->getBTagMinus()}" class="btn btn-xs btn-success">{$result->getName()}</a> {foreachelse}No matches!{/foreach}</div>
        {/if}
    </div>
</div>
