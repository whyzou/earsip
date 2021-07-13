<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah User</h6>
        </div>
        <div class="card-body">
            <?= form_open_multipart(); ?>
            <div class="form-group ">
                <label for="username">Username</label>
                <input name="username" type="text" class="form-control" id="username" value="<?= $user['username'] ?>" disabled>
                <small id="cek_username"></small>
            </div>
            <div class="form-group ">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" value="<?= $user['nama'] ?>" autofocus>
            </div>
            <div class="form-group ">
                <label for="perusahaan">Perusahaan</label>
                <select class="form-control js-example-basic-single" name="perusahaan">
                    <!-- <option hidden value="">Pilih Fakultas</option> -->
                    <?php
                    foreach ($perusahaan as $p) :

                        if ($user['id_perusahaan'] == $p['id']) {
                            $select = "selected";
                        } else {
                            $select = "";
                        }
                    ?>
                        <option value="<?= $p['id'] ?>" <?= $select ?>> <?= $p['nama'] ?> </option>
                    <?php
                    endforeach;
                    ?>
                </select>
            </div>
            <div class="form-group ">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <div class="form-group ">
                <label for="repassword">Konfirmasi Password</label>
                <input type="password" name="repassword" class="form-control" id="repassword">
                <small id="cek_password"></small>
            </div>

            <div class="form-group ">
                <label for="gambar">Gambar</label>
                <input type="file" name="gambar" class="form-control <?= form_error('gambar') ? 'is-invalid' : '' ?>">
                <div class="invalid-feedback"><?= form_error('gambar') ?></div>
            </div>

            <div class="form-group ">
                <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-danger" href="<?= base_url('user') ?>" role="button">Back</a>
            </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<script>
    //Cek Ketersediaan Username
    $(document).ready(function() {
        $('#username').blur(function() {
            let username = $(this).val();
            console.log('blur ' + username);

            $.post(
                "<?= base_url('user/cek_username'); ?>", {
                    username: username
                },
                function(data, status) {
                    if (data > 0) {
                        $('#cek_username').addClass('text-danger');
                        $('#cek_username').removeClass('text-success');
                        $('#cek_username').text('Username sudah ada');

                        $('#username').addClass('border-danger');
                        $('#username').removeClass('border-success');
                    } else {
                        $('#cek_username').addClass('text-success');
                        $('#cek_username').removeClass('text-danger');
                        $('#cek_username').text('Username tersedia');

                        $('#username').addClass('border-success');
                        $('#username').removeClass('border-danger');
                    }

                }
            );

        });

        $('form').submit(function(e) {
            if ($('#username').hasClass('border-danger'))
                e.preventDefault();
        })
    });

    //Cek Password dan Re-Password pada Form
    $('#repassword').blur(function() {
        if ($('#password').val() != $('#repassword').val()) {
            $('#cek_password').addClass('text-danger');
            $('#cek_password').removeClass('text-success');
            $('#cek_password').text('Password Tidak Sama');

            $('#repassword').addClass('border-danger');
            $('#repassword').removeClass('border-success');
        } else {
            $('#cek_password').text('');
            $('#repassword').removeClass('border-danger');
        }

    });
    $('#password').blur(function() {
        if ($('#repassword').val() != '') {
            if ($('#password').val() != $('#repassword').val()) {
                $('#cek_password').addClass('text-danger');
                $('#cek_password').removeClass('text-success');
                $('#cek_password').text('Password Tidak Sama');

                $('#repassword').addClass('border-danger');
                $('#repassword').removeClass('border-success');
            } else {
                $('#cek_password').text('');
                $('#repassword').removeClass('border-danger');
            }
        }

    });

    $('form').submit(function(e) {
        if ($('#repassword').hasClass('border-danger'))
            e.preventDefault();
    })
</script>