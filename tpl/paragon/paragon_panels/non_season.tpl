<div class="well well-sm">
    <div class="text-left">Non Season: Paragon {$paragon->getProgressLimit($paragon->getNonSeason())}</div>
    <div class="text-right" style="width: {$paragon->getProgress($paragon->getNonSeason())}{'%'}; min-width: 30px;">{$paragon->getProgress($paragon->getNonSeason())}%</div>
    <progress id="test" max="100" value="{$paragon->getProgress($paragon->getNonSeason())}"></progress>
</div>