<lable for="name" class="col-sm-2 control-label">Name</lable>
<div class="col-sm-4">
    <input type="text" id="name" name="name" class="form-control" value="{if isset($build)}{$build->getName()}{else}{$defaultName}{/if}">
</div>