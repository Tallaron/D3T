<lable for="class" class="col-sm-2 control-label">Class</lable>
<div class="col-sm-4">
    <select size="1" id="class" name="class" class="form-control">
        {foreach from=$heroClasses item=$heroClass}
            {if isset($build) && $heroClass->id == $build->getClassId()}
                <option value="{$heroClass->id}" selected>{$heroClass->name}</option>
            {else}
                <option value="{$heroClass->id}">{$heroClass->name}</option>
            {/if}
        {/foreach}
    </select>
</div>