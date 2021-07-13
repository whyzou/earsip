<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <strong class="card-title text-primary">Data User</strong>
            <span class="float-right">
                <a href="<?= base_url('user/add') ?>" class="btn btn-primary btn-sm"><i class="fas fa fa-plus-circle"></i> Tambah</a>
                <a href="<?= base_url('user') ?>" class="btn btn-warning btn-sm"><i class="fas fa fa-sync-alt"></i> Refresh</a>
            </span>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message') ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Perusahaan</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($user as $u) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $u['username'] ?></td>
                                <td><?= $u['nama'] ?></td>
                                <td><?= $u['pNama'] ?></td>
                                <td class="text-center"><img src="<?= base_url() . 'upload/user/' . $u['gambar']  ?>" style="max-width: 100px" alt=""></td>
                                <td>
                                    <a href='<?= base_url('user/update/') . $u['username']; ?>'><i class=" far fa-edit btn-sm btn-success" style="color: black;"></i></a>
                                    <a href='<?= base_url('user/delete/') . $u['username']; ?>'><i class="far fa-trash-alt btn-sm btn-danger delButton" style="color: black"></i></a>
                                </td>
                            </tr>
                        <?php
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

</div>
<!-- End of Main Content -->