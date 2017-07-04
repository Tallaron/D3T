<div class=" col-sm-12">
    <div class="panel panel-warning">
        <div class="panel-heading">Passive Skills</div>
        <div class="panel-body">
            {foreach from=$profile->getHero()->getPassiveSkills() item=$skill}
                {if $skill != null}


                <div class="skill">
                    <a href="{D3_GAME_GUIDE_SKILL_BASE_URL}{$profile->getHero()->getClass()}/passive/{$skill->getSlug()}" target="_blank">
                        <div class="p-skill-frame">
                            <img src="{$skill->getLargeIconUrl()}" />
                        </div>
                        <div class="p-skill-name">{$skill->getName()}</div>
                        <div class="skill-title" title="{$skill->getName()}"></div>
                    </a>
                </div>








            {/if}
        {/foreach}
    </div>
</div>
</div>