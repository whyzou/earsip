<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ubah Perusahaan</h6>
        </div>
        <div class="card-body">
            <?= form_open(); ?>
            <div class="form-group ">
                <label for="perusahaan">Nama Perusahaan</label>
                <input type="text" name="nama" class="form-control" id="perusahaan" value="<?= $perusahaan[0]->nama ?>" required autofocus>
            </div>
            <div class="form-group ">
                <label for="alamat">Alamat</label>
                <input class="form-control" name="alamat" type="text" id="alamat" value="<?= $perusahaan[0]->alamat ?> ">
            </div>
            <div class="form-group ">
                <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-danger" href="<?= base_url('perusahaan') ?>" role="button">Back</a>
            </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->