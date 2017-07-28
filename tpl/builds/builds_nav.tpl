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
            </ul>
                
        </div>
    </li>
    
    
    {/foreach}
    
    
</ul>