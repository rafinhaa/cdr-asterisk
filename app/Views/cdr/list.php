<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Relatório</h2>            
            </div>
            <div class="card-body">
                <form action="<?= base_url('/cdr') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="text-dark font-weight-medium" for="dt-start">Data início</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="mdi mdi-calendar-range"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control <?= !session('errors.dt-start') ?: 'is-invalid' ?>" data-mask="00/00/0000" id="dt-start" placeholder="dd/mm/aaaa" name="dt-start" aria-label="" autocomplete="off" maxlength="10" value="<?= isset($dateStart) ? $dateStart : old('dt-start') ?>">
                                <div class="invalid-feedback"><?= session('errors.dt-start') ?></div>
                            </div> 
                        </div>
                        <div class="col-sm-6">
                            <label class="text-dark font-weight-medium" for="dt-end">Data fim</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="mdi mdi-calendar-range"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control <?= !session('errors.dt-end') ?: 'is-invalid' ?>" data-mask="00/00/0000" id="dt-end" name="dt-end" placeholder="dd/mm/aaaa" aria-label="" autocomplete="off" maxlength="10" value="<?= isset($dateEnd) ? $dateEnd : old('dt-end') ?>">
                                <div class="invalid-feedback"><?= session('errors.dt-end') ?></div>
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="text-dark font-weight-medium" for="ControlSelect">Campo</label>
                                <select class="form-control" id="ControlSelect" name="field-cdr">
                                    <option value="1">Destino</option>
                                    <option value="2">Origem</option>
                                    <option value="3">Canal origem</option>
                                    <option value="4">Canal destino</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="text-dark font-weight-medium" for="inputValue">Valor</label>
                                <input class="form-control" type="text" name="input-value" id="inputValue" value="<?= isset($dateEnd) ? $dateEnd : old('dt-end') ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="text-dark font-weight-medium" for="selectStatus">Status</label>
                                <select class="form-control" id="selectStatus" name="status">
                                    <option value="1">ALL</option>
                                    <option value="2">ANSWERED</option>
                                    <option value="3">BUSY</option>
                                    <option value="4">FALIED</option>
                                    <option value="5">NO ANWSER</option>
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