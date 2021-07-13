    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; BLK E-Arsip 2021</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" untuk keluar</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="<?= base_url('auth/logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- settings Modal-->
    <div class="modal fade" id="settingsModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit profil : <?php echo $this->session->userdata('username'); ?></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open_multipart('user/editProfil/' . $this->session->userdata('username')); ?>
                    <div class="form-group ">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $this->session->userdata('nama'); ?>" autofocus>
                    </div>
                    <div class="form-group ">
                        <label for="password">Password :</label>
                        <input type="password" name="password" class="form-control" id="Mpassword" value="" placeholder="Masukan Kata Sandi Baru">
                    </div>
                    <div class="form-group ">
                        <label for="repassword">Konfirmasi Password :</label>
                        <input type="password" name="repassword" class="form-control" id="Mrepassword" placeholder="Masukan Ulang Kata Sandi">
                        <small id="cek_password"></small>
                    </div>
                    <div class="form-group ">
                        <label for="gambar">Profil :</label>
                        <div class="form-group ">
                            <input type="file" name="gambar" class="form-control <?= form_error('gambar') ? 'is-invalid' : '' ?>" id="gambar">
                            <div class="invalid-feedback"><?= form_error('gambar') ?></div>
                        </div>
                    </div>

                    <hr class="sidebar-divider">
                   

                </div>
                <div class="modal-footer">
                    <div class="form-group ">
                        <button type="submit" name="Submit" class="btn btn-success">Edit</button>
                        <a class="btn btn-secondary" href="<?= base_url('dashboard') ?>" role="button">Back</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Profil Modal-->
    <div class="modal fade" id="profilModal" tabindex="-1">
        <div class="modal-dialog modal-dm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo $this->session->userdata('username') ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-3">
                            <img width="100%" src="<?= base_url() ?>upload/user/<?php echo $this->session->userdata('profil') ?>" id="descImage" alt="">
                        </div>
                        <div class="col-9">
                            <table class="table table-borderless">
                                <tr>
                                    <td style="font-weight: bold">Nama</td>
                                    <td><?php echo $this->session->userdata('nama') ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold">Perusahaan</td>
                                    <td><?php echo $this->session->userdata('perusahaan') ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>assets/vendor/sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>assets/vendor/sbadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>assets/vendor/sbadmin2/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url() ?>assets/vendor/sbadmin2/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url() ?>assets/vendor/sbadmin2/js/demo/datatables-demo.js"></script>

    <!-- datepicker -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/datepicker.min.css">
    <script src="<?= base_url() ?>assets/js/datepicker.min.js"></script>
    <script src="<?= base_url() ?>assets/js/datepicker.en.js"></script>

    <script>
        $.fn.datepicker.language['en'] = {
            days: ['Ahad', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
            daysShort: ['Ah', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
            daysMin: ['Ah', 'Sen', 'Sel', 'Ra', 'Ka', 'Ju', 'Sa'],
            months: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            today: 'Today',
            clear: 'Clear',
            dateFormat: 'yyyy-mm-dd'
        };
    </script>

    <!-- Alert Delete Data -->
    <script>

        // datepicker
        // $(document).ready(function() {
        //     // $('#tanggal_mulai').datepicker({
        //     //     autoClose: true,
        //     // })
        //     // $('#tanggal_akhir').datepicker({
        //     //     autoClose: true,

        //     // })
        // });


        //Swelalert2 Delete Data
        $('.delButton').click(function(e) {

            e.preventDefault();
            const href = $(this).parent('a').attr('href');

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data akan dihapus",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus Data!'

            }).then((result) => {
                if (result.value) {
                    document.location.href = href;
                }
            })

        });
    </script>

    <script>
        //Level User management item
        <?php if ($this->session->userdata('level') == "1") { ?>
            $(document).ready(function() {
                $("#menuSurat").remove();
                $("#dashSM").remove();
                $("#dashSK").remove();

            });

        <?php } else if ($this->session->userdata('level') == "2") { ?>
            $(document).ready(function() {
                $("#menuAdmin").remove();
                $("#dashPerusahaan").remove();
                $("#dashPengelola").remove();
            });

        <?php } else {
        }; ?>
    </script>

    <script>
        //Cek Password dan Re-Password pada Form
        $('#Mrepassword').blur(function() {
            if ($('#Mpassword').val() != $('#Mrepassword').val()) {
                $('#cek_password').addClass('text-danger');
                $('#cek_password').removeClass('text-success');
                $('#cek_password').text('Password Tidak Sama');

                $('#Mrepassword').addClass('border-danger');
                $('#Mrepassword').removeClass('border-success');
            } else {
                $('#cek_password').remove('');
                $('#Mrepassword').removeClass('border-danger');
            }

        });
        $('#Mpassword').blur(function() {
            if ($('#Mrepassword').val() != '') {
                if ($('#Mpassword').val() != $('#Mrepassword').val()) {
                    $('#cek_password').addClass('text-danger');
                    $('#cek_password').removeClass('text-success');
                    $('#cek_password').text('Password Tidak Sama');

                    $('#Mrepassword').addClass('border-danger');
                    $('#Mrepassword').removeClass('border-success');
                } else {
                    $('#cek_password').remove('');
                    $('#Mrepassword').removeClass('border-danger');
                }
            }

        });

        $('form').submit(function(e) {
            if ($('#Mrepassword').hasClass('border-danger'))
                e.preventDefault();
        })
    </script>

    </body>

    </html>