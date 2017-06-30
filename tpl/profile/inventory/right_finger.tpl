<div class="gear-slot gear-slot-rightFinger">
    <a class="gear-slot-link" href="">
        <span class="d3-item-icon d3-item-icon-{$profile->getHero()->getInventory()->getRightFinger()->getDisplayColor()}">
            <span class="d3-item-icon-gradient">
                <span class="d3-item-icon-inner"></span>
            </span>
        </span>
        <span class="d3-item-icon-image">
            {if $profile->getHero()->getInventory()->getRightFinger()->getIcon() != false}
                <img src="{$profile->getHero()->getInventory()->getRightFinger()->getLargeIconUrl()}" />
            {/if}
        </span>
        <span class="d3-item-sockets-wrapper">
            <span class="sockets-align">
                {for $i=0 to $profile->getHero()->getInventory()->getRightFinger()->getSockets()-1}
                <span class="socket">
                    {if $profile->getHero()->getInventory()->getRightFinger()->getGemAt($i)->getIcon() != false}
                        <img src="{$profile->getHero()->getInventory()->getRightFinger()->getGemAt($i)->getLargeIconUrl()}"/>
                    {/if}
                </span><br/>
                {/for}
            </span>
        </span>
    </a>
</div>
