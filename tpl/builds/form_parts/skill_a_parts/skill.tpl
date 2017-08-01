<lable for="skill-a-{$key}" class="col-sm-2 control-label">Act. Skill [{$key}]</lable>
<div class="col-sm-4">
    <select size="1" id="skill-a-{$key}" name="skill-a-{$key}" class="form-control">
        <option value="-1">None</option>
        {foreach from=$activeSkills item=$skill}
            <option value="{$skill->id}">{$skill->name}</option>
        {/foreach}
    </select>
</div>
