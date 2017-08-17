{if $scopeValue > -1}

    {for $i=1 to $scopeValue}
        <span class="glyphicon glyphicon-star custom-star-on"></span>
    {/for}

    {for $i=$scopeValue+1 to 5}
        <span class="glyphicon glyphicon-star custom-star-off"></span>
    {/for}

{else}

    <span class="scope-not-rated">Not Rated</span>
    
{/if}


