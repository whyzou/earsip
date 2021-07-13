<div class="container-fluid mb-5">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <strong class="card-title text-primary">Data Surat Masuk</strong>
            <span class="float-right">
                <?php $filter = isset($mulai) && isset($akhir) ? '/' . $mulai . '/' . $akhir : '' ?>
                <a href="<?= base_url('surat_masuk/add')  ?>" class="btn btn-primary btn-sm"><i class="fas fa fa-plus-circle"></i> Tambah</a>
                <a href="<?= base_url('rekap_surat_masuk/exportSuratMasuk') . $filter; ?>" class="btn btn-success btn-sm"><i class="fas fa-file-excel"></i> Export</a>
                <a href="" class="btn btn-warning btn-sm"><i class="fas fa fa-sync-alt"></i> Refresh</a>
            </span>
        </div>
        <div class="card-body">
            <label class="font-weight-bold">Cari berdasarkan Tanggal Terima</label>
            <?= form_open(base_url('surat_masuk')) ?>
            <div class="form-group row">
                <div class="form-group col-sm-3 mb-3 mb-sm-0">
                <input name="tanggal_mulai" type="text" readonly data-date-format="yyyy-mm-dd" data-language="en" class="form-control datepicker-here" id="tanggal_mulai" value="<?= $mulai; ?>">
                </div>
                <div class="form-group col-sm-0 mb-3 mb-sm-0">
                    <h2 class="text-center"> - </h2>
                </div>
                <div class="form-group col-sm-3 mb-3 mb-sm-0">
                <input name="tanggal_akhir" type="text" readonly data-date-format="yyyy-mm-dd" data-language="en" class="form-control datepicker-here" id="tanggal_akhir" value="<?= $akhir; ?>">
                </div>
                <div class="form-group col-sm-2 mb-3 mb-sm-0">
                    <button type="submit" name="Submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
            </form>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message') ?>
            <div class="table-responsive">
                <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0" style="font-size: small;">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal Terima</th>
                            <th>Nomor dan<br>Tanggal Surat</th>
                            <th>Perihal</th>
                            <th>Nama dan<br>Alamat Pengirim</th>
                            <th>Lampiran</th>
                            <th>Kode</th>
                            <th>Keterangan</th>
                            <th>File</th>
                            <th>Disposisi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($surat as $sm) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= tanggal_indonesia($sm['tanggal_masuk']) ?></td>
                                <td><?= $sm['nomor_surat'] . ",<br>" . tanggal_indonesia($sm['tanggal_surat']) ?></td>
                                <td><?= $sm['perihal'] ?></td>
                                <td><?= $sm['pengirim'] . ",<br>" . $sm['alamat_pengirim'] ?></td>
                                <td><?= $sm['lampiran'] ?></td>
                                <td><?= $sm['kode'] ?></td>
                                <td><?= $sm['keterangan'] ?></td>
                                <td>
                                    <center><?php if (!empty($sm['file'])) { ?><a target="_blank" href="<?= base_url('upload/surat_masuk/') . $sm['file'] ?>"><i class="far fa-file-pdf btn-sm btn-info"></i></a><?php } ?></center>
                                </td>
                                <td>
                                    <center><a target="_blank" href="<?= base_url('surat_masuk/disposisi/') . $sm['id'] ?>"> <i class="fas fa-print btn-sm btn-secondary"></i></a></center>
                                </td>
                                <td>
                                    <a href='<?= base_url('surat_masuk/update/') . $sm['id']; ?>'><i class="far fa-edit btn-sm btn-success" style="color: black;"></i></a>
                                    <a href='<?= base_url('surat_masuk/delete/') . $sm['id']; ?>'><i class="far fa-trash-alt btn-sm btn-danger delButton" style="color: black"></i></a>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
</div>