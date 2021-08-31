<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2><?= lang('Cdr.report') ?></h2>            
            </div>
            <div class="card-body">
                <form action="<?= base_url('/cdr') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="text-dark font-weight-medium" for="dt-start"><?= lang('Cdr.dateStart') ?></label>
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
                            <label class="text-dark font-weight-medium" for="dt-end"><?= lang('Cdr.dateEnd') ?></label>
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
                                <label class="text-dark font-weight-medium" for="ControlSelect"><?= lang('Cdr.field.field') ?></label>
                                <select class="form-control" id="ControlSelect" name="field-cdr">
                                    <option value="1"><?= lang('Cdr.field.destination') ?></option>
                                    <option value="2"><?= lang('Cdr.field.source') ?></option>
                                    <option value="3"><?= lang('Cdr.field.channelSrc') ?></option>
                                    <option value="4"><?= lang('Cdr.field.channelDst') ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="text-dark font-weight-medium" for="inputValue"><?= lang('Cdr.value') ?></label>
                                <input class="form-control" type="text" name="input-value" id="inputValue" value="<?= isset($input_value) ? $input_value : old('input-value') ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="text-dark font-weight-medium" for="selectStatus"><?= lang('Cdr.status') ?></label>
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
                            <button type="submit" class="btn btn-primary btn-default"><?= lang('Cdr.search') ?></button>
                        </div>
					</div>               
                </form>
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th scope="col"><?= lang('Cdr.callDate') ?></th>
                            <th scope="col">Clid</th>
                            <th scope="col">SRC</th>
                            <th scope="col">DST</th>
                            <th scope="col"><?= lang('Cdr.channel') ?></th>
                            <th scope="col"><?= lang('Cdr.dstChannel') ?></th>                            
                            <th scope="col"><?= lang('Cdr.disposition') ?></th>
                            <th scope="col"><?= lang('Cdr.duration') ?></th>
                            <th scope="col"><?= lang('Cdr.audio') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($cdr as $line): ?>
                            <tr class="table-secondary">
                                <td><?= $line["calldate"] ?></td>                            
                                <td><?= $line["clid"] ?></td>                            
                                <td><?= $line["src"] ?></td>                            
                                <td><?= $line["dst"] ?></td>                            
                                <td><?= $line["channel"] ?></td>                            
                                <td><?= $line["dstchannel"] ?></td>                            
                                <td><?= $line["disposition"] ?></td>                            
                                <td><?= $line["duration"] ?></td>                            
                                <td>
                                    <?php if (!empty($line["audiofile"])): ?>
                                        <audio controls>
                                            <source src="<?= base_url('assets/audios/'.$line["audiofile"]) ?>" type="audio/wav">
                                            Your browser does not support the audio element.
                                        </audio>
                                    <?php endif; ?>
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