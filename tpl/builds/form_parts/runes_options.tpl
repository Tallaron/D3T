<option value="-1">None</option>
{foreach from=$runes item=$rune}
    <option value="{$rune->getId()}" class="custom-select-default"{if isset($runeId) && $rune->getId() == $runeId} selected{/if}>{$rune->getName()}</option>
{/foreach}