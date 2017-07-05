<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Summary</h3>
    </div>
    <div class="panel-body">

            <table class="table table-hover paragon-summary">
                <thead>
                    <tr>
                        <th>Mode</th>
                        <th>Level</th>
                        <th>Experience</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Non Season</td>
                        <td class="text-right">{n($paragon->getNonSeason()->getLevel())}</td>
                        <td class="text-right">{n($paragon->getNonSeason()->getXp())}</td>
                    </tr>
                    <tr>
                        <td>Season</td>
                        <td class="text-right">{n($paragon->getSeason()->getLevel())}</td>
                        <td class="text-right">{n($paragon->getSeason()->getXp())}</td>
                    </tr>
                    <tr>
                        <td><strong>Overall</strong></td>
                        <td class="text-right"><strong>{n($paragon->getOverall()->getLevel())}</strong></td>
                        <td class="text-right"><strong>{n($paragon->getOverall()->getXp())}</strong></td>
                    </tr>
                </tbody>
            </table>
        
    </div>
</div>
