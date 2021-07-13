<body id="page-top">
	<!-- Page Wrapper -->
	<div id="wrapper">
		<!-- set area waktu ke indonesia untuk tanggalan -->
		<style>
			@media print {

				#print {
					display: none;
				}

				body {
					-webkit-print-color-adjust: exact !important;
				}

			}
		</style>

		<!-- Begin Page Content -->
		<div class="container-fluid">
			<!-- Page Heading -->
			<button id="print" onclick="window.print()" class="btn btn-primary mb-2 mt-5"><i class="fas fa-print"></i> Print</button>


			<table class="table" style="vertical-align:center">
				<tr>
					<td style="border:1px solid black; background-color:black !important" class="text-center text-light h4" width="50%"><b>LEMBAR DISPOSISI</b></td>
					<td style="border:1px solid black" class="text-left" width="50%"><b>Kode/ Indeks : </b><?= $disposisi['kode'] ?></td>
				</tr>
				<tr>
					<td colspan="2" style="border:1px solid black" class="text-left" width="100%"><b>Pengirim : </b><?= $disposisi['pengirim'] ?></td>
				</tr>
				<tr>
					<td style="border:1px solid black" class="text-left"><b>Tgl. Terima : </b><?= tanggal_indonesia($disposisi['tanggal_masuk']) ?></td>
					<td style="border:1px solid black" class="text-left"><b>Tgl. diproses : </b><?= tanggal_indonesia($disposisi['tanggal_masuk']) ?></td>
				</tr>
				<tr>
					<td style="border:1px solid black" class="text-left"><b>No. dan Tgl. Surat : </b><?= $disposisi['nomor_surat'] . ", " . tanggal_indonesia($disposisi['tanggal_surat']) ?></td>
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
					<td style="border:1px solid black" class="text-left"><b>Alamat Aksi : </b><?= $disposisi['alamat_aksi'] ?></td>
					<td style="border:1px solid black" class="text-left"><b>Informasi : </b><?= $disposisi['informasi'] ?></td>
				</tr>
				<tr>
					<td colspan="2" style="border:1px solid black" class="text-left" width="100%"><b>Catatan : </b><?= $disposisi['catatan'] ?></td>
				</tr>

			</table>

		</div>
		<!-- /.container-fluid -->

	</div>
	<!-- End of Main Content -->
	<!-- Footer -->
	<style>
		@media print {
			.copyright {
				display: none;
			}
		}
	</style>
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
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="https://eblkkediri.id/admin/auth/logout">Logout</a>
				</div>
			</div>
		</div>
	</div>