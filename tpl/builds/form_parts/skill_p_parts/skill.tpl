<lable for="skill-p-{$key}" class="col-sm-2 control-label">Pass. Skill [{$key}]</lable>
<div class="col-sm-4">
    <select size="1" id="skill-p-{$key}" name="skill-p-{$key}" class="form-control">
        <option value="-1">None</option>
        {foreach from=$passiveSkills item=$skill}
            <option value="{$skill->id}">{$skill->name}</option>
        {/foreach}
    </select>
</div>
