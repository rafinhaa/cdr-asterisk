<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Contextual Table</h2>
            </div>
            <div class="card-body">
                <p class="mb-5">Use contextual classes to color table rows or individual cells. Read bootstrap documentation for <a href="https://getbootstrap.com/docs/4.6/content/tables/#contextual-classes" target="_blank"> more details.</a></p>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Call Date</th>
                            <th scope="col">Clid</th>
                            <th scope="col">SRC</th>
                            <th scope="col">DST</th>
                            <th scope="col">Channel</th>
                            <th scope="col">DST Channel</th>
                            <th scope="col">Disposition</th>
                            <th scope="col">Duration</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($cdr as $line): ?>
                            <tr class="table-secondary">                            
                                <td scope="row">1</td>
                                <td><?= $line["calldate"] ?></td>                            
                                <td><?= $line["clid"] ?></td>                            
                                <td><?= $line["src"] ?></td>                            
                                <td><?= $line["dst"] ?></td>                            
                                <td><?= $line["channel"] ?></td>                            
                                <td><?= $line["dstchannel"] ?></td>                            
                                <td><?= $line["disposition"] ?></td>                            
                                <td><?= $line["duration"] ?></td>                            
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>