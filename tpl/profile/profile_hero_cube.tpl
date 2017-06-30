<div class="col-sm-12">
    <div class="panel panel-success">
        <div class="panel-heading">Cube</div>
        <div class="panel-body">
            {foreach from=$profile->getHero()->getCube()->getItems() item=$item}
                <div><img src="{$item->getLargeIconUrl()}" /></div>
            {/foreach}
        </div>
    </div>
</div>