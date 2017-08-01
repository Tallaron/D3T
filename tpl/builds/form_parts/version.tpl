<lable for="version" class="col-sm-2 control-label">Version</lable>
<div class="col-sm-4">
    <input type="text" id="version" name="version" class="form-control" value="{if isset($build)}{$build->getVersion()}{else}{CURRENT_D3_VERSION}{/if}">
</div>
