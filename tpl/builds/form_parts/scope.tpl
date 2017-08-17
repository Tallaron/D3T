<div class="panel panel-info">
    <div class="panel-heading custom-collapse collapsed" data-toggle="collapse" data-target="#build-scope">
        <span>Scope</span>
    </div>
    <div id="build-scope" class="panel-collapse collapse">
        <div class="panel-body">

            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th>Solo</th>
                        <th>Team</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Bounties</td>
                        <td>
                            <select size="1" class="form-control" name="scope[solo][bounty]">
                                {$scopeVal = $build->getScopeSolo()->get('bounty')}
                                {include file="builds/form_parts/scope/options.tpl"}
                            </select>
                        </td>
                        <td>
                            <select size="1" class="form-control" name="scope[team][bounty]">
                                {$scopeVal = $build->getScopeTeam()->get('bounty')}
                                {include file="builds/form_parts/scope/options.tpl"}
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Keys</td>
                        <td>
                            <select size="1" class="form-control" name="scope[solo][key]">
                                {$scopeVal = $build->getScopeSolo()->get('key')}
                                {include file="builds/form_parts/scope/options.tpl"}
                            </select>
                        </td>
                        <td>
                            <select size="1" class="form-control" name="scope[team][key]">
                                {$scopeVal = $build->getScopeTeam()->get('key')}
                                {include file="builds/form_parts/scope/options.tpl"}
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Low GR</td>
                        <td>
                            <select size="1" class="form-control" name="scope[solo][lowgr]">
                                {$scopeVal = $build->getScopeSolo()->get('lowgr')}
                                {include file="builds/form_parts/scope/options.tpl"}
                            </select>
                        </td>
                        <td>
                            <select size="1" class="form-control" name="scope[team][lowgr]">
                                {$scopeVal = $build->getScopeTeam()->get('lowgr')}
                                {include file="builds/form_parts/scope/options.tpl"}
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Push</td>
                        <td>
                            <select size="1" class="form-control" name="scope[solo][push]">
                                {$scopeVal = $build->getScopeSolo()->get('push')}
                                {include file="builds/form_parts/scope/options.tpl"}
                            </select>
                        </td>
                        <td>
                            <select size="1" class="form-control" name="scope[team][push]">
                                {$scopeVal = $build->getScopeTeam()->get('push')}
                                {include file="builds/form_parts/scope/options.tpl"}
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>