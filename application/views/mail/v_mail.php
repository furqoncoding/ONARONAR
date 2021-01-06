<!DOCTYPE html> 
<html>
	<head>
		<title> On Air Report </title>
	</head>
	<body>
		<center>
			<h1>On Air Report</h1>
			<br>
			<script language="JavaScript">
				var tanggallengkap = new String();
				var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
				namahari = namahari.split(" ");
				var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
				namabulan = namabulan.split(" ");
				var tgl = new Date();
				var hari = tgl.getDay();
				var tanggal = tgl.getDate();
				var bulan = tgl.getMonth();
				var tahun = tgl.getFullYear();
				tanggallengkap = namahari[hari] + ", " +tanggal + " " + namabulan[bulan] + " " + tahun;
			</script>
			<script language='JavaScript'>document.write(tanggallengkap);</script>
			</br>
		</center>
		<br>No On Air Issue.</br>
		<br>
		<h1><b><i>Please do not reply to this email, this report created by application - ANTV Information Technology</b></i></h1>
		</br>
	</body>
</html>