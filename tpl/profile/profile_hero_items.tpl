<div class="col-sm-12">
    <div class="panel panel-success">
        <div class="panel-heading">Items</div>
        <div class="panel-body">

            <div class="paper-doll {$profile->getHero()->getPaperDoll()}">





                {foreach from=$settings->get('ITEM_SLOTS') key=$slot item=$func}
                    {$item = $profile->getHero()->getInventory()->$func()}
                    <div class="gear-slot gear-slot-{$slot} item-{$item->getDisplayColor()}">
                        <div class="center-frame">

                            {include file="profile/inventory/item_icon.tpl"}
                            {*                            {if $item->getSockets() > 0}
                            {include file="profile/inventory/item_sockets.tpl"}
                            {/if}
                            *} 
                        </div>
                    </div>


                {/foreach}

            </div>

        </div>
    </div>
</div>