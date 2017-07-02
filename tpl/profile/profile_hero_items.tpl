<div class="col-sm-12">
    <div class="panel panel-success">
        <div class="panel-heading">Items</div>
        <div class="panel-body">
            
            <div class="paper-doll paper-doll-{$profile->getHero()->getPaperDoll()}">

                {foreach from=$settings->get('ITEM_SLOTS') key=$slot item=$func}
                    {$item = $profile->getHero()->getInventory()->$func()}
                    <div class="gear-slot gear-slot-{$slot}" title="{$item->getName()}">
                        <a class="gear-slot-link" href="">
                            {include file="profile/inventory/item_icon.tpl"}
                            {include file="profile/inventory/item_image.tpl"}
                            {if $item->getSockets() > 0}
                                {include file="profile/inventory/item_sockets.tpl"}
                            {/if}
                        </a>
                    </div>
                {/foreach}

            </div>
                
        </div>
    </div>
</div>