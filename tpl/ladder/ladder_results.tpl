<div class="panel panel-default">
    <div class="panel-body">
        <div class="well well-sm"><strong>Avg. Level:</strong> {$ranking->getAverageLevel()}</div>
        {if $ranking->hasSearch()}
        <div class="well well-sm"><strong>Results:</strong> {foreach from=$ranking->getSearchResults() item=$result}<a href="#r{$result->getKey()}" class="btn btn-xs btn-success">{$result->getContent()}</a> {foreachelse}No matches!{/foreach}</div>
        {/if}
    </div>
</div>
