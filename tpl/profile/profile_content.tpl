<div>
    
    
    {if $content == 'seasons'}
        {include file="profile/profile_seasons.tpl" once=true}
    {elseif $content == 'hero'}
        {include file="profile/profile_hero.tpl" once=true}
    {else}
        {include file="profile/profile_overview.tpl" once=true}
    {/if}
    
    
    
    
    
    
    
</div>