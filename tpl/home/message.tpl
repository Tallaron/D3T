<div class="panel panel-info">
    <div class="panel-heading">Messages</div>
    <div class="panel-body">
        <ul>
        {foreach from=$msg item=$m}
            <li>{$m}</li>
        {/foreach}
        </ul>
    </div>
</div>