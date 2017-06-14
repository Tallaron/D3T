<div class="well well-sm">
    <div class="text-left">Overall: Paragon {$paragon->getProgressLimit($paragon->getOverall())}</div>
    <div class="text-right" style="width: {$paragon->getProgress($paragon->getOverall())}%; min-width: 30px;">{$paragon->getProgress($paragon->getOverall())}%</div>
    <progress id="test" max="100" value="{$paragon->getProgress($paragon->getOverall())}"></progress>
</div>