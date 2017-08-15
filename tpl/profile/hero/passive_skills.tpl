<div class=" col-sm-12">
    <div class="panel panel-warning">
        <div class="panel-heading">Passive Skills</div>
        <div class="panel-body">
            {foreach from=$profile->getHero()->getPassiveSkills() item=$skill}
                {if $skill != null}


                <div class="skill-outer">
                    <div class="skill" title="{$skill->getName()}">
                        
                        <div class="p-skill-frame">
                            <a href="{D3_GAME_GUIDE_SKILL_BASE_URL}{$profile->getHero()->getClass()}/passive/{$skill->getSlug()}" target="_blank">
                                <img src="{$skill->getLargeIconUrl()}" />
                            </a>
                        </div>
    
                        <div class="p-skill-name">
                            <a href="{D3_GAME_GUIDE_SKILL_BASE_URL}{$profile->getHero()->getClass()}/passive/{$skill->getSlug()}" target="_blank">
                                {$skill->getName()}
                            </a>
                        </div>
                        
                        <div style="clear: both;"></div>
                    </div>
                </div>








            {/if}
        {/foreach}
    </div>
</div>
</div>