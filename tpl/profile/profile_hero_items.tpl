<div class="col-sm-12">
    <div class="panel panel-success">
        <div class="panel-heading">Items</div>
        <div class="panel-body">

            <div class="paper-doll {$profile->getHero()->getPaperDoll()}">

                {foreach from=$settings->get('ITEM_SLOTS') key=$slot item=$func}
                    {$item = $profile->getHero()->getInventory()->$func()}
                    {if $item->getIcon() != false}
                        <div class="gear-slot gear-slot-{$slot} item-{$item->getDisplayColor()}">
                            {include file="profile/inventory/item_icon.tpl"}
                            {include file="profile/inventory/item_link.tpl"}
                            {include file="profile/inventory/item_sockets.tpl"}
                        </div>
                    {/if}
                {/foreach}

            </div>

        </div>
    </div>
</div>