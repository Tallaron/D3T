<lable for="version" class="col-sm-2 control-label">Publish</lable>
<div class="col-sm-2">
    <input type="hidden" name="published" value="0">
    <input type="checkbox" name="published" value="1"{if isset($build) && $build->getPublished() == 1} checked{/if}>
</div>
<div class="col-sm-2">
    <button type="submit" class="btn btn-primary pull-right">Save</button>
</div>
