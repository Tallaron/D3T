<div class="col-sm-12">
    <div class="panel panel-success">
        <div class="panel-heading">Items</div>
        <div class="panel-body">

            <div class="paper-doll {$profile->getHero()->getPaperDoll()}">
                {foreach from=$settings->get('ITEM_SLOTS') key=$slot item=$func}
                    {$item = $profile->getHero()->getInventory()->$func()}
                    {if $item->getIcon() != false}
                        <div class="gear-slot gear-slot-{$slot} item-{$item->getDisplayColor()} ancient-{$item->getAncientRank()}">
                            {include file="profile/hero/item_icon.tpl"}
                            {include file="profile/hero/item_link.tpl"}
                            {include file="profile/hero/item_sockets.tpl"}
                            {include file="profile/hero/item_caldesan.tpl"}
                            {include file="profile/hero/item_ancient_text.tpl"}
                        </div>
                    {/if}
                {/foreach}

            </div>

        </div>
    </div>
</div>