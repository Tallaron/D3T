<td>
    {if $player->isUnknown() != true}
        <a href="{BASE_DIR}/profile/show/{$ladder->getRealm()}/{$player->getBTagMinus()}/hero/{$player->getId()}" target="_blank">
        {/if}
        <span class="icon-frame">
            <img src="{BASE_DIR}/gfx/{$player->getIconFileName()}.png" />
        </span>
        {if $player->isUnknown() != true}
        </a>
    {/if}
</td>
