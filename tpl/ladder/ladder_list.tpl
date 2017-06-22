<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <div class="badge">{$settings->get('BNET_REALM_NAME', $ladder->getRealm())}</div>
            <div class="badge">{$settings->get('RANKING_TYPE', $ladder->getSeason())} #{$ladder->getIndex()}</div>
            <div class="badge">{$settings->get('RANKING_MODE', $ladder->getHardcore())}</div>
            <div class="badge">{$settings->get('BNET_CLASSES', $ladder->getClass())}</div>
            <div class="badge">{$ladder->getMin()} - {$ladder->getMax()}</div>
        </h3>
    </div>
    <div class="panel-body">

        <table class="table table-hover ranking-list">
            <tr>
                <th>#</th>
                <th>Level</th>
                <th>Class</th>
                <th>Name</th>
                <th>Paragon</th>
                <th>Time</th>
            </tr>
            {foreach from=$ladder->getRanks() key=$i item=$rank}
                <tr{if $rank->isMatch()} class="custom-tr-green"{/if}>
                    <td>
                        {if $rank->isMatch()}<a class="custom-anchor" name="r{$rank->getPlayer()->getBTagMinus()}"></a>{/if}
                        {$rank->getPos()}
                    </td>
                    <td>{$rank->getLevel()}</td>
                    <td>{$rank->getPlayer()->getClass()}</td>
                    <td>
                        {if $rank->getPlayer()->isUnknown()}
                            <div class="custom-grey-name">{$rank->getPlayer()->getName()}</div>
                        {else}
                            <a href="{$settings->get('BNET_PROFILE_URL', $ladder->getRealm())}{$rank->getPlayer()->getBTagMinus()}/" target="_blank">
                                {if $rank->getPlayer()->hasClan()}<span class="small" title="{$rank->getPlayer()->getClan()}">&lt;{$rank->getPlayer()->getClanShort()}&gt;</span> {/if}
                                {$rank->getPlayer()->getName()}
                            </a>
                        {/if}
                    </td>
                    <td>{number_format($rank->getPlayer()->getParagon())}</td>
                    <td title="{$rank->getCompletionDate()}">{$rank->getTimeFormatted()}</td>
                </tr>
            {/foreach}
        </table>

    </div>
</div>