<div class="col-sm-12">
    <div class="panel panel-success">
        <div class="panel-heading">Cube</div>
        <div class="panel-body">


            <div class="cube-doll">

    {for $i=0 to count($profile->getHero()->getCube()->getItems())-1}
        {$item = $profile->getHero()->getCube()->getItemAt($i)}

        <div class="cube-slot cube-item-{$i+1}{if $item->getIcon() != false} is-active{/if}" title="{$item->getName()}">
            {if $item->getIcon() != false}
                <a href="{$item->getLink()}" target="_blank" data-d3tooltip="{$item->getTooltipParams()}">
                    <span class="cube-item-container">
                        <span class="cube-item-align">
                            <img src="{$item->getLargeIconUrl()}" />
                        </span>
                    </span>
                </a>
            {/if}
        </div>

    {/for}

</div>





        </div>
    </div>
</div>
        
        
