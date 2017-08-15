<lable for="rune-a-{$key}" class="col-sm-2 control-label">Rune</lable>
<div class="col-sm-4">
    <select size="1" id="rune-a-{$key}" name="skill-a[{$key}][rune]" class="form-control custom-select-untouched">
        {if !$build->getActiveSkills()->isEmpty() && $build->getActiveSkills()->getSkillAt($key)->getId() != -1}
            {$runeId = $build->getActiveSkills()->getSkillAt($key)->getRune()->getId()}
            {$runes = $build->getRuneList($build->getActiveSkills()->getSkillAt($key)->getIndex())}
                {include file="builds/form_parts/runes_options.tpl"}
        {else}
            <option value="-1">None</option>
        {/if}
    </select>
</div>

