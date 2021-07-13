<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <strong class="card-title text-primary ">Disposisi</strong>
            <span class="float-right">
                <a class="btn btn-success" target="_blank" href="<?= base_url('surat_masuk/print_disposisi/') . $disposisi['id'] ?>" role="button"><i class="fas fa-print"></i> Print Preview</a>
            </span>

        </div>
        <div class="card-body">
            <?= form_open(); ?>

            <table class="table text-dark" style="vertical-align:center">
                <tr>
                    <td style="border:1px solid black" class="text-center bg-dark text-light h4" width="50%"><b>LEMBAR DISPOSISI</b></td>
                    <td style="border:1px solid black" class="text-left" width="50%"><b>Kode/ Indeks : </b><?= $disposisi['kode'] ?></td>
                </tr>
                <tr>
                    <td colspan="2" style="border:1px solid black" class="text-left" width="100%"><b>Pengirim : </b><?= $disposisi['pengirim'] ?></td>
                </tr>
                <tr>
                    <td style="border:1px solid black" class="text-left"><b>Tgl. Terima : </b><?= date('d-m-Y', strtotime($disposisi['tanggal_masuk'])) ?></td>
                    <td style="border:1px solid black" class="text-left"><b>Tgl. diproses : </b><?= date('d-m-Y', strtotime($disposisi['tanggal_masuk'])) ?></td>
                </tr>
                <tr>
                    <td style="border:1px solid black" class="text-left"><b>No. dan Tgl. Surat : </b><?= $disposisi['nomor_surat'] . ", " . date('d-m-Y', strtotime($disposisi['tanggal_surat'])) ?></td>
                    <td style="border:1px solid black" class="text-left"><b>No. Agenda : </b><?= $disposisi['nomor_agenda'] ?></td>
                </tr>
                <tr>
                    <td colspan="2" style="border:1px solid black" class="text-left" width="100%"><b>Isi singkat / Perihal : </b><?= $disposisi['perihal'] ?></td>
                </tr>
                <tr>
                    <td style="border:1px solid black" class="text-left"><b>Pengolah : </b><?= $disposisi['registrar'] ?></td>
                    <td style="border:1px solid black" class="text-left"><b>Paraf : </b></td>
                </tr>
                <tr>
                    <td style="border:1px solid black" class="text-left">
                        <input type="text" name="alamat_aksi" class="form-control" placeholder="Masukkan Alamat Aksi" value="<?= $disposisi['alamat_aksi'] != null ? $disposisi['alamat_aksi'] : '' ?>" autofocus>
                    </td>
                    <td style="border:1px solid black" class="text-left">
                        <input type="text" name="informasi" class="form-control" placeholder="Masukkan Informasi" value="<?= $disposisi['informasi'] != null ? $disposisi['informasi'] : '' ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="border:1px solid black" class="text-left" width="100%">
                        <input type="text" name="catatan" class="form-control" placeholder="Masukkan Catatan" value="<?= $disposisi['catatan'] != null ? $disposisi['catatan'] : '' ?>">
                    </td>
                </tr>

            </table>


            <div class="form-group">
                <button type="submit" name="Submit" class="btn btn-primary">Save</button>
                <a class="btn btn-danger" href="<?= base_url('surat_masuk') ?>" role="button">Back</a>
            </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->