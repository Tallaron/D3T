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
                            <span>{$hero->getName()}</span>
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