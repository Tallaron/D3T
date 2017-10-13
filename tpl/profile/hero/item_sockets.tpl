<div class="center-frame">
    {if $item->hasSockets()}
        <div class="item-content-cell">
            <div class="item-content">
                {for $i=0 to $item->getSockets()-1}
                    {if $item->getGemAt($i)->getId()!='0'}
                    <span class="socket" title="{$item->getGemAt($i)->getName()}" 
                          data-d3tooltip="{if isset($isProfile) && $isProfile == true}{$item->getGemAt($i)->getTooltipParams()}{else}item/{$item->getGemAt($i)->getSlug()}-{$item->getGemAt($i)->getId()}{/if}">
                        {if $item->getGemAt($i)->getIcon() != false}
                            <a href="{$item->getGemAt($i)->getLink()}" target="_blank">
                                <img src="{$item->getGemAt($i)->getSmallIconUrl()}"/>
                            </a>
                        {/if}
                    </span><br/>
                    {/if}
                {/for}
            </div>
        </div>
    {/if}
</div>
