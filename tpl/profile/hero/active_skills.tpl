<div class="col-sm-12">
    <div class="panel panel-warning">
        <div class="panel-heading">Active Skills</div>
        <div class="panel-body">
            {foreach from=$profile->getHero()->getActiveSkills() item=$skill}
                {if $skill != null}
                    <div class="skill-outer">
                        <div class="skill" data-d3tooltip="{$profile->getHero()->getClass()}/{$skill->getSlug()}" title="{$skill->getName()}{if $skill->getRune() != null}&#10;{$skill->getRune()->getName()}{/if}">
                            <div class="a-skill-image">
                                <a href="{D3_GAME_GUIDE_SKILL_BASE_URL}{$profile->getHero()->getClass()}/active/{$skill->getSlug()}" target="_blank">
                                    <img src="{$skill->getLargeIconUrl()}" />
                                </a>
                            </div>
                            <div class="a-skill-name">
                                <a href="{D3_GAME_GUIDE_SKILL_BASE_URL}{$profile->getHero()->getClass()}/active/{$skill->getSlug()}" target="_blank">
                                    {$skill->getName()}
                                </a>
                            </div>
                            <div class="a-skill-rune" data-d3tooltip="{$profile->getHero()->getClass()}/{$skill->getSlug()}/{$skill->getRune()->getType()}">
                                {if $skill->getRune() != null}
                                <a href="{D3_GAME_GUIDE_SKILL_BASE_URL}{$profile->getHero()->getClass()}/active/{$skill->getSlug()}" target="_blank">
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