<div class="col-sm-12">
    <div class="panel panel-warning">
        <div class="panel-heading">Active Skills</div>
        <div class="panel-body">
            {foreach from=$build->getActiveSkills()->getSkills() item=$skill}
                {if $skill != null && $skill->getId() != -1}
                    <div class="skill-outer">
                        <div class="skill" title="{$skill->getName()}{if $skill->getRune() != null}&#10;{$skill->getRune()->getName()}{/if}">
                            <div class="a-skill-image">
                                <a href="{D3_GAME_GUIDE_SKILL_BASE_URL}{$build->getClass()->getKey()}/active/{$skill->getSlug()}" target="_blank">
                                    <img src="{$skill->getLargeIconUrl()}" />
                                </a>
                            </div>
                            <div class="a-skill-name">
                                <a href="{D3_GAME_GUIDE_SKILL_BASE_URL}{$build->getClass()->getKey()}/active/{$skill->getSlug()}" target="_blank">
                                    {$skill->getName()}
                                </a>
                            </div>
                            <div class="a-skill-rune">
                                {if $skill->getRune() != null}
                                <a href="{D3_GAME_GUIDE_SKILL_BASE_URL}{$build->getClass()->getKey()}/active/{$skill->getSlug()}" target="_blank" data-d3tooltip="rune/{$skill->getSlug()}/{$skill->getRune()->getType()}">
                                    {$skill->getRune()->getName()}
                                </a>
                                {else}
                                    &nbsp;
                                {/if}
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </div>
                {/if}
            {/foreach}
        </div>
    </div>
</div>