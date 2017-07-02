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
            <thead
                <tr>
                    <th>#</th>
                    <th>Level</th>
                    <th>Class</th>
                    <th>Name</th>
                    <th>Paragon</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody
                {foreach from=$ladder->getRanks() key=$i item=$rank}
                    {$player = $rank->getPlayer()}
                    <tr{if $rank->isMatch()} class="custom-tr-green"{/if}>
                        <td>
                            {if $rank->isMatch()}<a class="custom-anchor" name="r{$player->getBTagMinus()}"></a>{/if}
                            {$rank->getPos()}
                        </td>
                        <td>{$rank->getLevel()}</td>
                        <td>
                            <span class="icon-frame">
                                <img src="{BASE_DIR}/gfx/{$player->getIconFileName()}.png" />
                            </span>
                        </td>
                        <td>
                            {if $player->isUnknown()}
                                <div class="custom-grey-name">{$player->getName()}</div>
                            {else}
                                <a href="{$settings->get('BNET_PROFILE_URL', $ladder->getRealm())}{$player->getBTagMinus()}/" target="_blank">
                                    {if $player->hasClan()}<span class="small" title="{$player->getClan()}">&lt;{$player->getClanShort()}&gt;</span> {/if}
                                    {$player->getName()}
                                </a>
                            {/if}
                        </td>
                        <td>{number_format($player->getParagon())}</td>
                        <td title="{$rank->getCompletionDate()}">{$rank->getTimeFormatted()}</td>
                    </tr>
                {/foreach}
            </tbody>
        </table>

    </div>
</div>