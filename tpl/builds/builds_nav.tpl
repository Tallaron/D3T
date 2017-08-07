<ul class="nav nav-pills nav-stacked">
    
    
    {foreach from=$heroClasses item=$heroClass}
    
    
    <li class="active">
        <a href="#" data-toggle="collapse"
           data-target="#{$heroClass->key}"
           aria-expanded="false"
           aria-controls="{$heroClass->key}">
            {$heroClass->name}
            <span class="badge pull-right">{count($builds[$heroClass->key])}</span>
        </a>
        <div class="collapse" id="{$heroClass->key}">
            
            <ul class="nav nav-pills nav-stacked">
                {foreach from=$builds[$heroClass->key] item=$build}
                    <li class="bg-info">
                        <a href="{BASE_DIR}/build/show/{$build->id}">
                            <span class="nav-item-name">{$build->name}</span>
                        </a>
                    </li>
                {foreachelse}
                    <li class="bg-info">
                        <a><span class="nav-item-name">-- empty --</span></a>
                    </li>
                {/foreach}
            </ul>
                
        </div>
    </li>
    
    
    {/foreach}
    
    
</ul>