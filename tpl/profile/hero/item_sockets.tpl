<div class="center-frame">
    {if $item->hasSockets()}
        <div class="item-content-cell">
            <div class="item-content">
                {for $i=0 to $item->getSockets()-1}
                    <span class="socket" title="{$item->getGemAt($i)->getName()}">
                        {if $item->getGemAt($i)->getIcon() != false}
                            <a href="{$item->getGemAt($i)->getLink()}" target="_blank">
                                <img src="{$item->getGemAt($i)->getSmallIconUrl()}"/>
                            </a>
                        {/if}
                    </span><br/>
                {/for}
            </div>
        </div>
    {/if}
</div>






