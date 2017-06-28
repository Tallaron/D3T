<div class="col-sm-12">
    <div class="panel panel-success">
        <div class="panel-heading">Items</div>
        <div class="panel-body">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <td>{if $profile->getHero()->getInventory()->getShoulders() != null}<img src="http://media.blizzard.com/d3/icons/items/large/{$profile->getHero()->getInventory()->getShoulders()->getIcon()}.png" />{/if}</td>
                        <td>{if $profile->getHero()->getInventory()->getHead() != null}<img src="http://media.blizzard.com/d3/icons/items/large/{$profile->getHero()->getInventory()->getHead()->getIcon()}.png" />{/if}</td>
                        <td>{if $profile->getHero()->getInventory()->getNeck() != null}<img src="http://media.blizzard.com/d3/icons/items/large/{$profile->getHero()->getInventory()->getNeck()->getIcon()}.png" />{/if}</td>
                    </tr>
                    <tr>
                        <td>{if $profile->getHero()->getInventory()->getHands() != null}<img src="http://media.blizzard.com/d3/icons/items/large/{$profile->getHero()->getInventory()->getHands()->getIcon()}.png" />{/if}</td>
                        <td>{if $profile->getHero()->getInventory()->getTorso() != null}<img src="http://media.blizzard.com/d3/icons/items/large/{$profile->getHero()->getInventory()->getTorso()->getIcon()}.png" />{/if}</td>
                        <td>{if $profile->getHero()->getInventory()->getBracers() != null}<img src="http://media.blizzard.com/d3/icons/items/large/{$profile->getHero()->getInventory()->getBracers()->getIcon()}.png" />{/if}</td>
                    </tr>
                    <tr>
                        <td>{if $profile->getHero()->getInventory()->getLeftFinger() != null}<img src="http://media.blizzard.com/d3/icons/items/large/{$profile->getHero()->getInventory()->getLeftFinger()->getIcon()}.png" />{/if}</td>
                        <td>{if $profile->getHero()->getInventory()->getWaist() != null}<img src="http://media.blizzard.com/d3/icons/items/large/{$profile->getHero()->getInventory()->getWaist()->getIcon()}.png" />{/if}</td>
                        <td>{if $profile->getHero()->getInventory()->getRightFinger() != null}<img src="http://media.blizzard.com/d3/icons/items/large/{$profile->getHero()->getInventory()->getRightFinger()->getIcon()}.png" />{/if}</td>
                    </tr>
                    <tr>
                        <td>{if $profile->getHero()->getInventory()->getMainHand() != null}<img src="http://media.blizzard.com/d3/icons/items/large/{$profile->getHero()->getInventory()->getMainHand()->getIcon()}.png" />{/if}</td>
                        <td>{if $profile->getHero()->getInventory()->getLegs() != null}<img src="http://media.blizzard.com/d3/icons/items/large/{$profile->getHero()->getInventory()->getLegs()->getIcon()}.png" />{/if}</td>
                        <td>{if $profile->getHero()->getInventory()->getOffHand() != null}<img src="http://media.blizzard.com/d3/icons/items/large/{$profile->getHero()->getInventory()->getOffHand()->getIcon()}.png" />{/if}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>{if $profile->getHero()->getInventory()->getFeet() != null}<img src="http://media.blizzard.com/d3/icons/items/large/{$profile->getHero()->getInventory()->getFeet()->getIcon()}.png" />{/if}</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>