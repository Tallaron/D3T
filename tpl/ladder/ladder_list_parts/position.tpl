{*{if $rank->getPos() > $ladder->getSmarty()}
    {$ladder->setSmarty($rank->getPos())}
    <td>
{else}
    <td class="custom-grey-text">
{/if}

    {if $rank->isMatch()}<a class="custom-anchor" name="r{$player->getBTagMinus()}"></a>{/if}
    {$ladder->getSmarty()}
</td>
*}


{if $rank->getPos() != $pos}
    {$pos = $rank->getPos()}
    <td>
{else}
    <td class="custom-grey-text">
{/if}

    {if $rank->isMatch()}<a class="custom-anchor" name="r{$player->getBTagMinus()}"></a>{/if}
    {$pos}
</td>
