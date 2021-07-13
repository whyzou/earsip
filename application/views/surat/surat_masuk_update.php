<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Surat Masuk</h6>
        </div>
        <div class="card-body">
            <?= form_open_multipart(); ?>
            <div class="form-group row">
                <div class="form-group col-sm-6 mb-3 mb-sm-0">
                    <label for="tanggal_masuk">Tanggal Terima</label>
                    <input name="tanggal_masuk" type="date" class="form-control" id="tanggal_masuk" value="<?= $surat['tanggal_masuk'] ?>" autofocus>
                </div>
                <div class="form-group col-sm-6 mb-3 mb-sm-0">
                    <label for="kode">Kode</label>
                    <input type="text" name="kode" class="form-control" id="kode" value="<?= $surat['kode'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <div class="form-group col-sm-6 mb-3 mb-sm-0">
                    <label for="tanggal_surat">Tanggal Surat</label>
                    <input name="tanggal_surat" type="date" class="form-control" id="tanggal_surat" value="<?= $surat['tanggal_surat'] ?>">
                </div>
                <div class="form-group col-sm-6 mb-3 mb-sm-0">
                    <label for="nomor_surat">Nomor Surat</label>
                    <input type="text" name="nomor_surat" class="form-control" id="nomor_surat" value="<?= $surat['nomor_surat'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <div class="form-group col-sm-6 mb-3 mb-sm-0">
                    <label for="pengirim">Pengirim</label>
                    <input type="text" name="pengirim" class="form-control" id="pengirim" value="<?= $surat['pengirim'] ?>">
                </div>
                <div class="form-group col-sm-6 mb-3 mb-sm-0">
                    <label for="alamat_pengirim">Alamat Pengirim</label>
                    <input type="text" name="alamat_pengirim" class="form-control" id="alamat_pengirim" value="<?= $surat['alamat_pengirim'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <div class="form-group col-sm-6 mb-3 mb-sm-0">
                    <label for="perihal">Perihal</label>
                    <input type="text" name="perihal" class="form-control" id="perihal" value="<?= $surat['perihal'] ?>">
                </div>
                <div class="form-group col-sm-6 mb-3 mb-sm-0">
                    <label for="lampiran">Lampiran</label>
                    <input type="number" name="lampiran" class="form-control" id="lampiran" value="<?= $surat['lampiran'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <div class="form-group col-sm-6 mb-3 mb-sm-0">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" id="keterangan" value="<?= $surat['keterangan'] ?>">
                </div>
                <div class="form-group col-sm-6 mb-3 mb-sm-0">
                    <label for="file">File PDF</label>
                    <input type="file" name="file" class="form-control <?= form_error('file') ? 'is-invalid' : '' ?>" id="file">
                    <small id="error1" style="display:none; color:#FF0000;">Format file harus PDF.</small>
                    <small id="error2" style="display:none; color:#FF0000;">Ukuran maksimal file adalah 4MB.</small>
                    <div class="invalid-feedback"><?= form_error('file') ?></div>
                </div>
            </div>
            <div class="form-group ">
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


<script>
    // Cek file ekstensi dan size
    $('input[type="submit"]').prop("disabled", true);
    var a = 0;
    //binds to onchange event of your input field
    $('#file').bind('change', function() {
        if ($('input:submit').attr('disabled', false)) {
            $('input:submit').attr('disabled', true);
        }
        var ext = $('#file').val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['pdf']) == -1) {
            $('#error1').slideDown("slow");
            $('#error2').slideUp("slow");
            a = 0;
        } else {
            var picsize = (this.files[0].size);
            if (picsize > 1000000) {
                $('#error2').slideDown("slow");
                a = 0;
            } else {
                a = 1;
                $('#error2').slideUp("slow");
            }
            $('#error1').slideUp("slow");
            if (a == 1) {
                $('input:submit').attr('disabled', false);
            }
        }
    });
</script>