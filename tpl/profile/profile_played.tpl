<div class="played-bars">
    {foreach from=$obj->getPlayed() key=$key item=$played}
        <div class="played-bar-container" title="{$obj->getPlayedPercentage($key)}%">
            <div class="played-bar-limiter">
                <div class="played-bar-bg played-{$key}-bg"></div>
                <div class="played-bar played-{$key}" style="height: {$obj->getPlayedNormalized($key)}{'%'};"></div>
            </div>
            <div class="played-bar-text">{$settings->get('BNET_CLASSES_SHORT', $key)}</div>
        </div>
    {/foreach}
</div>
