<div class="gear-slot gear-slot-offHand">
    <a class="gear-slot-link" href="">
        <span class="d3-item-icon d3-item-icon-{$profile->getHero()->getInventory()->getOffHand()->getDisplayColor()}">
            <span class="d3-item-icon-gradient">
                <span class="d3-item-icon-inner"></span>
            </span>
        </span>
        <span class="d3-item-icon-image">
            {if $profile->getHero()->getInventory()->getOffHand()->getIcon() != false}
                <img src="{$profile->getHero()->getInventory()->getOffHand()->getLargeIconUrl()}" />
            {/if}
        </span>
        <span class="d3-item-sockets-wrapper">
            <span class="sockets-align">
                {for $i=0 to $profile->getHero()->getInventory()->getOffHand()->getSockets()-1}
                <span class="socket">
                    {if $profile->getHero()->getInventory()->getOffHand()->getGemAt($i)->getIcon() != false}
                        <img src="{$profile->getHero()->getInventory()->getOffHand()->getGemAt($i)->getLargeIconUrl()}"/>
                    {/if}
                </span><br/>
                {/for}
            </span>
        </span>
    </a>
</div>
