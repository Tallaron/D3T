<div class="gear-slot-gradient"></div>
<div class="center-frame">
    <div class="item-content-cell">
        <div class="item-content">
            {if isset($build)}
                <img src="{$item->getLargeIconUrl($build->getClass()->getKey())}">
            {else}
                <img src="{$item->getLargeIconUrl()}">
            {/if}
        </div>
    </div>
</div>