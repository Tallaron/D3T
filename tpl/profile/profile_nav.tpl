<ul class="nav nav-pills nav-stacked">
    
    <li class="active">
        <a href="#" data-toggle="collapse" data-parent="#accordion" data-target="#profile-overview">
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
        <div class="collapse" id="heroes">
            
            <ul class="nav nav-pills nav-stacked">
                {foreach from=$profile->getHeroes() item=$hero}
                    <li class="bg-info"><a href="#" data-toggle="collapse" data-parent="#accordion" data-target="#hero{$hero->getId()}">{$hero->getName()}</a></li>
                {/foreach}
            </ul>
                
        </div>
    </li>
    
    <li class="active">
        <a href="#" data-toggle="collapse" data-parent="#accordion" data-target="#profile-seasons">
            <span class="glyphicon glyphicon-leaf"></span>
            <span>Seasons</span>
        </a>
    </li>
    
</ul>