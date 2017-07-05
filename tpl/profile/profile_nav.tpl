<ul class="nav nav-pills nav-stacked">
    
    <li class="active">
        <a href="{BASE_DIR}/profile/show/{$profile->getRealm()}/{$profile->getBTagMinus()}/overview" data-toggle="collapse" data-target="#profile-overview">
            <span class="glyphicon glyphicon-eye-open"></span>
            <span>Overview</span>
        </a>
    </li>

    <li class="active">
        <a href="#" data-toggle="collapse"
           data-target="#heroes"
           aria-expanded="false"
           aria-controls="heroes">
            <span class="glyphicon glyphicon-pawn"></span>
            <span>Heroes</span>
            <span class="badge pull-right">{$profile->getNumHeroes()}</span>
        </a>
        <div class="collapse{if $content == 'hero'} in{/if}" id="heroes">
            
            <ul class="nav nav-pills nav-stacked">
                {foreach from=$profile->getHeroes() item=$hero}
                    <li class="bg-{if $profile->getHero() != null && $profile->getHero()->getId() == $hero->getId()}success{else}info{/if}">
                        <a href="{BASE_DIR}/profile/show/{$profile->getRealm()}/{$profile->getBTagMinus()}/hero/{$hero->getId()}">
                            <span class="icon-frame"><img src="{BASE_DIR}/gfx/{$hero->getClass()}-{$hero->getGender()}.png" /></span>
                            <span class="hero-nav-level-outer"><div class="hero-nav-level">{$hero->getLevel()}</div></span>
                            <span class="nav-item-name">{$hero->getName()}</span>
                            {if $hero->isSeasonal()}<span class="is-season pull-right"><img src="{BASE_DIR}/gfx/season_icon.png" /></span>{/if}
                            {if $hero->isHardcore()}<span class="is-hardcore pull-right"><img src="{BASE_DIR}/gfx/hc_icon.png" /></span>{/if}
                        </a>
                    </li>
                {/foreach}
            </ul>
                
        </div>
    </li>
    
    <li class="active">
        <a href="{BASE_DIR}/profile/show/{$profile->getRealm()}/{$profile->getBTagMinus()}/seasons" data-toggle="collapse" data-target="#profile-seasons">
            <span class="glyphicon glyphicon-leaf"></span>
            <span>Seasons</span>
        </a>
    </li>
    
</ul>