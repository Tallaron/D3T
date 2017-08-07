<lable for="rune-a-{$key}" class="col-sm-2 control-label">Rune</lable>
<div class="col-sm-4">
    <select size="1" id="rune-a-{$key}" name="skill-a[{$key}][rune]" class="form-control custom-select-untouched">
        {if !$activeSkills->isEmpty() && $activeSkills->getSkillAt($key)->getSkillId() != -1}
            {$runeId = $activeSkills->getSkillAt($key)->getRuneId()}
            {$runes = $runeLists[$activeSkills->getSkillAt($key)->getIndex()]}
                {include file="builds/form_parts/runes_options.tpl"}
        {else}
            <option value="-1">None</option>
        {/if}
    </select>
</div>
