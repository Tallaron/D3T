<div class="well well-sm">
    <div class="text-left">Season: Paragon {$paragon->getProgressLimit($paragon->getSeason())}</div>
    <div class="text-right" style="width: {$paragon->getProgress($paragon->getSeason())}{'%'}; min-width: 30px;">{$paragon->getProgress($paragon->getSeason())}%</div>
    <progress id="test" max="100" value="{$paragon->getProgress($paragon->getSeason())}"></progress>
</div>