<lable for="skill-a-{$key}" class="col-sm-2 control-label">Act. Skill [{$key}]</lable>
<div class="col-sm-4">
    <select size="1" id="skill-a-{$key}" data-rune="rune-a-{$key}" name="skill-a[{$key}][skill]" class="form-control custom-select-untouched">
        <option value="-1">None</option>
        {foreach from=$lists->getActiveSkills() item=$skill}
            <option value="{$skill->getId()}" class="custom-select-default"{if !$activeSkills->isEmpty() && $skill->getId() == $activeSkills->getSkillAt($key)->getSkillId()} selected{/if}>{$skill->getName()}</option>
        {/foreach}
    </select>
</div>
