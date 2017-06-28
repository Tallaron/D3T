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
        <div class="collapse in" id="heroes">
            
            <ul class="nav nav-pills nav-stacked">
                {foreach from=$profile->getHeroes() item=$hero}
                    <li class="bg-info"><a href="{BASE_DIR}/profile/show/{$profile->getRealm()}/{$profile->getBTagMinus()}/hero/{$hero->getId()}">{$hero->getName()}</a></li>
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