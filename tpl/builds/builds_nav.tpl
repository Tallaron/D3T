<ul class="nav nav-pills nav-stacked">
    
    
    {foreach from=$heroClasses item=$heroClass}
        {if $heroClass->getKey() != 'all'}
    
            <li class="active">
                <a href="#" data-toggle="collapse"
                   data-target="#{$heroClass->getKey()}"
                   aria-expanded="false"
                   aria-controls="{$heroClass->getKey()}">
                    {$heroClass->getName()}
                    <span class="badge pull-right">{count($builds[$heroClass->getKey()])}</span>
                </a>
                <div class="collapse{if isset($build) && $heroClass->getId() == $build->getClassId()} in{/if}" id="{$heroClass->getKey()}">

                    <ul class="nav nav-pills nav-stacked">
                        {foreach from=$builds[$heroClass->getKey()] item=$listItem}
                            <li class="bg-{if isset($build) && $listItem->id == $build->getId()}success{else}info{/if}">
                                <a href="{BASE_DIR}/build/show/{$listItem->id}">
                                    <span class="nav-item-name">{$listItem->name}</span>
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
    
        {/if}
    {/foreach}
    
    
</ul>