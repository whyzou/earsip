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
                <input name="username" type="text" class="form-control" id="username" autofocus required>
                <small id="cek_username"></small>
            </div>
            <div class="form-group ">
                <label for="perusahaan">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" required>
            </div>
            <div class="form-group ">
                <label for="perusahaan">Perusahaan</label>
                <select class="form-control" name="perusahaan" required>
                    <option hidden value="">Pilih Perusahaan</option>
                    <?php
                    foreach ($perusahaan as $p) :
                    ?>
                        <option value="<?= $p['id'] ?>"><?= $p['nama'] ?></option>
                    <?php
                    endforeach;
                    ?>
                </select>
            </div>
            <div class="form-group ">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <div class="form-group ">
                <label for="repassword">Konfirmasi Password</label>
                <input type="password" name="repassword" class="form-control" id="repassword" required>
                <small id="cek_password"></small>
            </div>
            <div class="form-group ">
                <label for="gambar">Gambar</label>
                <input type="file" name="gambar" class="form-control" id="gambar">
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
            if ($('#username').val() != '') {
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
            }

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
        } else {
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
            } else {
                $('#repassword').removeClass('border-danger');
            }
        }

    });

    $('form').submit(function(e) {
        if ($('#repassword').hasClass('border-danger'))
            e.preventDefault();
    })
</script>