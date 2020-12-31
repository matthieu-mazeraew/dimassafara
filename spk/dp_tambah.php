<html lang="en">

<head>
	<title>Tambah Data Pendaftar</title>
	<link rel="stylesheet" href="style/bootstrap.min.css">
</head>

<body>
	<div class="container">
		<h1> Tambah Data Pendaftar </h1>
		<form role="form" method="POST" action="dp_input.php">

			<div class="form-group row" required="required">
			<label> NIM </label>
			<input class="form-control" name="nim">
			</div>

			<div class="form-group row">
			<label> Nama Pendaftar </label>
			<input class="form-control" name="nama_pendaftar" required="required">
			</div>

			<div class="form-group row">
			<label> Jurusan </label>
			<select class="form-control" name="jurusan">
				<option>Teknik Informatika</option>
				<option>Teknik Mesin</option>
				<option>Teknik Elektronika</option>
				<option>Teknik Listrik</option>
				<option>Teknik Pengendalian Pencemaran Lingkungan</option>
			</select>
			</div>

			<div class="form-group row"required="required">
			<label> Prodi </label>
			<select class="form-control" name="prodi">
				<option>D3</option>
				<option>D4</option>
			</select>
			</div>

			<div class="form-group row" required="required">
			<label> Semester </label>
			<select class="form-control" name="semester">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select>
			</div>

			<div class="form-group row" required="required">
			<label> IPK </label>
			<input class="form-control" name="ipk">
			</div>

			<div class="form-group row" required="required">
			<label> Prestasi Non Akademik </label>
			<input class="form-control" name="prestasi_non_aka">
			</div>

			<div class="form-group row" required="required">
			<label> Keikutsertaan Ormawa </label>
			<input class="form-control" name="keikutsertaan_ormawa">
			</div>

			<div class="form-group row" required="required">
			<label> Tanggungan Orang Tua </label>
			<input class="form-control" name="tanggungan_ortu">
			</div>

			<div class="form-group row" required="required">
			<label> penghasilan Orang Tua </label>
			<input class="form-control" name="penghasilan_ortu">
			</div>

			<button type="submit" class="btn btn-primary pull-right">Simpan</button>
			<a href="datapendaftar.php" class="btn btn-success pull-right">Kembali</a>
		</form>
	</div>
</body>