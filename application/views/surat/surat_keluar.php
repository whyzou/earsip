<div class="container-fluid mb-5">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <strong class="card-title text-primary">Data Surat Keluar</strong>
            <span class="float-right">
                <?php $filter = isset($mulai) && isset($akhir) ? '/' . $mulai . '/' . $akhir : '' ?>
                <a href="<?= base_url('surat_keluar/add'); ?>" class="btn btn-primary btn-sm"><i class="fas fa fa-plus-circle"></i> Tambah</a>
                <a href="<?= base_url('rekap_surat_keluar/exportSuratKeluar') . $filter; ?>" class="btn btn-success btn-sm"><i class="fas fa-file-excel"></i> Export</a>
                <a href="<?= base_url('surat_keluar'); ?>" class="btn btn-warning btn-sm"><i class="fas fa fa-sync-alt"></i> Refresh</a>
            </span>
        </div>
        <div class="card-body">
            <label class="font-weight-bold">Cari berdasarkan Tanggal Kirim</label>
            <?= form_open(base_url('surat_keluar')) ?>
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
                            <th width="3%">No.</th>
                            <th>Tanggal Kirim</th>
                            <th>Nomor dan<br>Tanggal Surat</th>
                            <th>Perihal</th>
                            <th>Nama dan<br>Alamat Penerima</th>
                            <th>Lampiran</th>
                            <th>Kode</th>
                            <th>Keterangan</th>
                            <th>File</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($surat as $sk) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= tanggal_indonesia($sk['tanggal_keluar']) ?></td>
                                <td><?= $sk['nomor_surat'] . ",<br>" . tanggal_indonesia($sk['tanggal_surat']) ?></td>
                                <td><?= $sk['perihal'] ?></td>
                                <td><?= $sk['penerima'] . ",<br>" . $sk['alamat_penerima'] ?></td>
                                <td><?= $sk['lampiran'] ?></td>
                                <td><?= $sk['kode'] ?></td>
                                <td><?= $sk['keterangan'] ?></td>
                                <td>
                                    <center><?php if (!empty($sk['file'])) { ?><a target="_blank" href="<?= base_url('upload/surat_keluar/') . $sk['file'] ?>"><i class="far fa-file-pdf btn-sm btn-info"></i></a><?php } ?></center>
                                </td>
                                <td>
                                    <a href='<?= base_url('surat_keluar/update/') . $sk['id']; ?>'><i class="far fa-edit btn-sm btn-success" style="color: black;"></i></a>
                                    <a href='<?= base_url('surat_keluar/delete/') . $sk['id']; ?>'><i class="far fa-trash-alt btn-sm btn-danger delButton" style="color: black"></i></a>
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