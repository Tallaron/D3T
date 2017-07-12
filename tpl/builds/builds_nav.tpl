<ul class="nav nav-pills nav-stacked">
    
    
    {foreach from=$settings->get('BNET_CLASSES_LONG') key=$key item=$className}
    
    
    <li class="active">
        <a href="#" data-toggle="collapse"
           data-target="#{$key}"
           aria-expanded="false"
           aria-controls="{$key}">
            {$className}
            <span class="badge pull-right">0</span>
        </a>
        <div class="collapse" id="{$key}">
            
            <ul class="nav nav-pills nav-stacked">
{*                {foreach from=$profile->getHeroes() item=$hero}
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
*}            </ul>
                
        </div>
    </li>
    
    
    {/foreach}
    
    
</ul>