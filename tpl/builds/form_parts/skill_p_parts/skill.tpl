<lable for="skill-p-{$key}" class="col-sm-2 control-label">Pass. Skill [{$key}]</lable>
<div class="col-sm-4">
    <select size="1" id="skill-p-{$key}" name="skill-p[][skill]" class="form-control custom-select-untouched">
        <option value="-1">None</option>
        {foreach from=$lists->getPassiveSkills() item=$skill}
            <option value="{$skill->getId()}" class="custom-select-default">{$skill->getName()}</option>
        {/foreach}
    </select>
</div>
