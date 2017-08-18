<div class="col-sm-6">
    <div class="panel panel-info">
        <div class="panel-heading">{$build->getName()}</div>
        <div class="panel-body random-build-bg random-build-{$build->getClass()->getKey()}">
            <div class="col-sm-7 pull-right random-build-scope-panel">
            {foreach from=$settings->get('SCOPE_GROUPS') key=$scopeGroup item=$scopeGroupText}
                <div class="scope-group-text">{$scopeGroupText}</div>
                <div class="scope-group-hr-container"><hr /></div>
                    {foreach from=$settings->get('SCOPE_TYPES') key=$scopeType item=$scopeTypeText}
                        {$scopeValue = $build->getScope($scopeGroup, $scopeType)}
                        {include file="builds/content/show/scope.tpl"}
                    {/foreach}
            {/foreach}
            </div>
            
        </div>
    </div>
</div>