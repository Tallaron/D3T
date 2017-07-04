<div class="col-sm-12">
    <div class="panel panel-warning">
        <div class="panel-heading">Active Skills</div>
        <div class="panel-body">
            {foreach from=$profile->getHero()->getActiveSkills() item=$skill}
                {if $skill != null}
                    <div class="skill">
                        <a href="{D3_GAME_GUIDE_SKILL_BASE_URL}{$profile->getHero()->getClass()}/active/{$skill->getSlug()}" target="_blank">
                            <div class="a-skill-image">
                                <img src="{$skill->getLargeIconUrl()}" />
                            </div>
                            <div class="a-skill-name">{$skill->getName()}</div>
                            <div class="a-skill-rune">
                                {if $skill->getRune() != null}{$skill->getRune()->getName()}{/if}                                
                            </div>
                            <div class="skill-title" title="{$skill->getName()}{if $skill->getRune() != null}&#10;{$skill->getRune()->getName()}{/if}"></div>
                        </a>
                    </div>
                {/if}
            {/foreach}
        </div>
    </div>
</div>