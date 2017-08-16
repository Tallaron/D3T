<div class="col-sm-12">
    <div class="panel panel-success">
        <div class="panel-heading">Items</div>
        <div class="panel-body">

            <div class="paper-doll {$build->getClass()->getKey()}-0">

                {foreach from=$settings->get('ITEM_SLOTS') key=$slot item=$func}
                    {$item = $build->getInventory()->$func()}
                    {if $item->getIcon() != false && $item->getId() != -1}
                        <div class="gear-slot gear-slot-{$slot} item-{$item->getDisplayColor()}">
                            {include file="profile/hero/item_icon.tpl"}
                            {include file="profile/hero/item_link.tpl"}
                            {include file="profile/hero/item_sockets.tpl"}
                        </div>
                    {/if}
                {/foreach}

            </div>

        </div>
    </div>
</div>