<div class="stat-outer">
    <div class="stat">
        <div class="stat-key">{$statText}</div>
        <div class="stat-val">{number_format($profile->getHero()->getStats()->get($statKey),0, '.',',')}</div>
        <div style="clear:both"></div>
    </div>
</div>