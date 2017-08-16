<div class="col-sm-12">
    <div class="panel panel-success">
        <div class="panel-heading">Cube</div>
        <div class="panel-body">


            <div class="cube-doll">

    {foreach from=$build->getCube()->getItems() key=$key item=$item}
        {if $item != false}
            <div class="cube-slot cube-item-{$key}{if $item->getIcon() != false} is-active{/if}" title="{$item->getName()}">
                {if $item->getIcon() != false}
                    <a href="{$item->getLink()}" target="_blank">
                        <span class="cube-item-container">
                            <span class="cube-item-align">
                                <img src="{$item->getLargeIconUrl()}" />
                            </span>
                        </span>
                    </a>
                {/if}
            </div>
        {/if}
    {/foreach}

</div>





        </div>
    </div>
</div>
        
        
