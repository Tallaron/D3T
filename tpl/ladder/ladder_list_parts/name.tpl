<td>
    {if $player->isUnknown()}
        <div class="custom-grey-name">{$player->getName()}</div>
    {else}
        <a href="{BASE_DIR}/profile/show/{$ladder->getRealm()}/{$player->getBTagMinus()}" target="_blank">
            {if $player->hasClan()}<span class="small" title="{$player->getClan()}">&lt;{$player->getClanShort()}&gt;</span> {/if}
            {$player->getName()}
        </a>
    {/if}
</td>
