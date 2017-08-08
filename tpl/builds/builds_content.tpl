<div>
    

    
    
    {if isset($content)}
        
        {if $content == 'newBuild'}
            {include file="builds/new_build_form.tpl"}   
        {elseif $content == 'editBuild'}
            {include file="builds/edit_build_form.tpl"}
        {elseif $content == 'showBuild'}
            {include file="builds/show_build.tpl"}
        {/if}
    
    {/if}




</div>