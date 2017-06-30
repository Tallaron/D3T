<div class="gear-slot gear-slot-bracers">
    <a class="gear-slot-link" href="">
        <span class="d3-item-icon d3-item-icon-{$profile->getHero()->getInventory()->getBracers()->getDisplayColor()}">
            <span class="d3-item-icon-gradient">
                <span class="d3-item-icon-inner"></span>
            </span>
        </span>
        <span class="d3-item-icon-image">
            {if $profile->getHero()->getInventory()->getBracers()->getIcon() != false}
                <img src="{$profile->getHero()->getInventory()->getBracers()->getLargeIconUrl()}" />
            {/if}
        </span>
    </a>
</div>
