<lable for="class" class="col-sm-2 control-label">Class</lable>
<div class="col-sm-4">
    <select size="1" id="class" name="class" class="form-control">
        {foreach from=$heroClasses item=$heroClass}
            {if isset($build) && $heroClass->getId() == $build->getClassId()}
                <option value="{$heroClass->getId()}" selected>{$heroClass->getName()}</option>
            {else}
                <option value="{$heroClass->getId()}">{$heroClass->getName()}</option>
            {/if}
        {/foreach}
    </select>
</div>