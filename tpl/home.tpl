<div class="container-fluid">


    {foreach from=$newsFeed->getData() item=$news}
        <div class="panel panel-info">
            <div class="panel-heading custom-collapse collapsed" data-toggle="collapse" data-target="#e{$news->getId()}">
                    <span>[{$news->getPublished()}] </span>
                    <span><strong>{$news->getTitle()}</strong></span>
            </div>
            <div id="e{$news->getId()}" class="panel-collapse collapse in">
                <div class="panel-body">{$news->getSummary()}</div>
                <div class="panel-footer text-right">
                    <a href="{$news->getLink()}" target="_blank" class="btn btn-xs btn-primary">Read more</a>
                </div>
            </div>
        </div>
    {foreachelse}
        <div class="well">No News</div>
    {/foreach}







</div>
