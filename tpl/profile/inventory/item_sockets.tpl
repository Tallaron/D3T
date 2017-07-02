<span class="d3-item-sockets-wrapper">
    <span class="sockets-align">
        {for $i=0 to $item->getSockets()-1}
            <span class="socket" title="{$item->getGemAt($i)->getName()}">
                {if $item->getGemAt($i)->getIcon() != false}
                    <img src="{$item->getGemAt($i)->getLargeIconUrl()}"/>
                {/if}
            </span><br/>
        {/for}
    </span>
</span>
