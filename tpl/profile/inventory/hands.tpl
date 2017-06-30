<div class="gear-slot gear-slot-hands">
    <a class="gear-slot-link" href="">
        <span class="d3-item-icon d3-item-icon-{$profile->getHero()->getInventory()->getHands()->getDisplayColor()}">
            <span class="d3-item-icon-gradient">
                <span class="d3-item-icon-inner"></span>
            </span>
        </span>
        <span class="d3-item-icon-image">
            {if $profile->getHero()->getInventory()->getHands()->getIcon() != false}
                <img src="{$profile->getHero()->getInventory()->getHands()->getLargeIconUrl()}" />
            {/if}
        </span>
    </a>
</div>
