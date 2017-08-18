<div class="col-sm-12">
    <div class="panel panel-warning">
        <div class="panel-heading">Stats</div>
        <div class="panel-body">
            
            {foreach from=$settings->get('HERO_STAT_MAP', 'stats') key=$statKey item=$statText}
                {include file="profile/hero/single_stat.tpl"}
            {/foreach}
            <div class="stat-group-hr-container"><hr /></div>
            
            {foreach from=$settings->get('HERO_STAT_MAP', 'effects') key=$statKey item=$statText}
                {include file="profile/hero/single_stat.tpl"}
            {/foreach}
            <div class="stat-group-hr-container"><hr /></div>
            
            {foreach from=$settings->get('HERO_STAT_MAP', 'resists') key=$statKey item=$statText}
                {include file="profile/hero/single_stat.tpl"}
            {/foreach}
            <div class="stat-group-hr-container"><hr /></div>
            
        </div>
    </div>
</div>