<a href="{$item->getLink()}" target="_blank"{if $item->getTooltipParams() != false} data-d3tooltip="{if !isset($isProfile) || $isProfile == false}item/{$item->getSlug()}-{$item->getId()}{else}{$item->getTooltipParams()}{/if}"{/if}>
    <div class="item-title" title="{$item->getName()}"></div>
</a>
