<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Contextual Table</h2>            
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="text-dark font-weight-medium" for="">Data início</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="mdi mdi-calendar-range"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" data-mask="00/00/0000" placeholder="" aria-label="" autocomplete="off" maxlength="10">
                            </div> 
                        </div>
                        <div class="col-sm-6">
                            <label class="text-dark font-weight-medium" for="">Data fim</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="mdi mdi-calendar-range"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" data-mask="00/00/0000" placeholder="" aria-label="" autocomplete="off" maxlength="10">
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="text-dark font-weight-medium" for="exampleFormControlSelect12">Campo</label>
                                <select class="form-control" id="exampleFormControlSelect12">
                                    <option>Destino</option>
                                    <option>Origem</option>
                                    <option>Canal origem</option>
                                    <option>Canal destino</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="text-dark font-weight-medium" for="exampleFormControlSelect12">Valor</label>
                                <input class="form-control" type="text" name="" id="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="text-dark font-weight-medium" for="exampleFormControlSelect12">Status</label>
                                <select class="form-control" id="exampleFormControlSelect12">
                                    <option>ALL</option>
                                    <option>ANSWERED</option>
                                    <option>BUSY</option>
                                    <option>FALIED</option>
                                    <option>NO ANWSER</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-footer pt-4 pt-1 mt-1 border-top justify-content-end">						
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btn-default">Buscar</button>
                        </div>
					</div>               
                </form>
                <table class="table mt-4">
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
                            <th scope="col">Opções</th>
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
                                <td>

                                </td>                            
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>