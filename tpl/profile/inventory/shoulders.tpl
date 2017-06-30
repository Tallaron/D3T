<div class="gear-slot gear-slot-shoulders">
    <a class="gear-slot-link" href="">
        <span class="d3-item-icon d3-item-icon-{$profile->getHero()->getInventory()->getShoulders()->getDisplayColor()}">
            <span class="d3-item-icon-gradient">
                <span class="d3-item-icon-inner"></span>
            </span>
        </span>
        <span class="d3-item-icon-image">
            {if $profile->getHero()->getInventory()->getShoulders()->getIcon() != false}
                <img src="{$profile->getHero()->getInventory()->getShoulders()->getLargeIconUrl()}" />
            {/if}
        </span>
    </a>
</div>
