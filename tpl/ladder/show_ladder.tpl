{include file="ladder/ladder_form.tpl"}

{include file="ladder/ladder_results.tpl"}

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <div class="badge">{$settings->get('BNET_REALM_NAME', $ranking->getRealm())}</div>
            <div class="badge">{$settings->get('BNET_MODE', $ranking->getMode())}</div>
            <div class="badge">{$ranking->getNum()}</div>
            <div class="badge">{$settings->get('BNET_CLASSES', $ranking->getClass())}</div>
            <div class="badge">{$ranking->getMin()}-{$ranking->getMax()}</div>
        </h3>
    </div>
    <div class="panel-body">

        <table class="table table-hover">
            <tr>
                <th>#</th>
                <th>Level</th>
                <th>Name</th>
                <th>Time</th>
            </tr>
            {foreach from=$ranking->getRanksOutput() key=$i item=$rank}
                {if $rank->isMatch()}
                    <tr class="custom-tr-green">
                {else}
                    <tr>
                {/if}
                    <td>{if $rank->isMatch()}<a class="custom-anchor" name="r{$rank->getPos()}"></a>{/if}{$rank->getPos()+1}</td>
                    <td>{$rank->getLevel()}</td>
                    {if $rank->getProfile()}
                        <td><a href="{$rank->getProfile()}/" target="_blank">{$rank->getName()}</a></td>
                        {else}
                        <td><div class="custom-grey-name">{$rank->getName()}</div></td>
                        {/if}
                    <td title="{$rank->getDate()}">{$rank->getTime()}</td>
                </tr>
            {/foreach}
        </table>

    </div>
</div>