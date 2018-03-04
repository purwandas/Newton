<!DOCTYPE html>
<html>
<head>
<title>Survey</title>
</head>
<body>
	<table width="20%">
		<tr>
			<th>
				<img src="{{ asset('img/Capture.PNG') }}" alt="logo" width="250">
			</th>
		</tr>
	</table>
	<table align="right">
		<tr>
			<th>
				<p style="font-weight:normal;">
					<font size="4">
						Jakarta, {{ @$date }}
					</font>
				</p>
			</th>
		</tr>
	</table>
	<br/><br/><br/>
	<table align="left" width="100%" cellspacing="5">
		<tr>
			<td style="font-weight:bold;" align="left">
				Kepada Yth, <br/>
				Bapak/Ibu {{ @$user->name }} {{ @$user->lastname }} <br/>
				{{ @$user->company }} <br/><br/>
			</td>
		</tr>	
	</table>
	<table style="font-weight:normal;" align="left" cellspacing="5">
		<tr>
			<td>
				Perihal <br/>
			</td>
			<td>
				: Undangan Survey Data Center Jakarta <br/>
			</td>
		</tr>
		<tr>
			<td>
				Lampiran <br/>
			</td>
			<td>
				: 1 Lembar <br/>
			</td>
		</tr>
		<tr>
			<td>
				<br/><br/>Dengan Hormat, 
			</td>
		</tr>
	</table>
	<table width="100%">
		<tr>
			<td align="left">
				<p align="justify">
					&nbsp;&nbsp;&nbsp;&nbsp;
					Sehubungan dengan penawaran jasa collocation server, dengan ini kami PT. Newton
					Cipta Informatika bermaksud mengundang <b>Bapak/ibu {{ @$user->name }} {{ @$user->lastname }} {{ @$user->company }}</b> untuk melakukan kunjungan survey ke Data Center kami
				</p>
			</td>
		</tr>
	</table>
	<table width="100%">
		<tr>
			<td align="left">
				<p align="justify">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					Adapun lokasi kunjungan survey : <br/>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<b>Data Center Indonesia</b>
				</p>
			</td>
		</tr>
	</table>
	<table width="100%">
		<tr>
			<td align="left">
				<p align="justify">
					&nbsp;&nbsp;&nbsp;&nbsp;
					PT. Newton Cipta Informatika merupakan penyedia berpengalaman lebih dari 5 tahun
					dalam jasa collocation dan penyedia perangkat server & komputer. Saat ini sudah lebih 30
					LPSE yang bergabung dengan collocation kami. Perbedaan kami dengan jasa collocation
					lainnya, kami menyediakan IPS dan Web Application Firewall sebagai Security Network. Suata
					kerhormatan bila PT. Newton Cipta Informatika dapat bergabung dengan Tim LPSE.
				</p>
			</td>
		</tr>
	</table>
	<table width="100%">
		<tr>
			<td align="left">
				<p align="justify">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					Demikian surat ini kami sampaikan, atas perhatian dan kerjasamanya kami ucapkan
					terimakasih.
				</p>
			</td>
		</tr>
	</table>
	<table align="right">
		<tr>
			<td>
				<p style="text-align: center;">
					Hormat Kami,<br/>
					PT. Newton Cipta Informatika <br/><br/><br/>
				</p>
			</td>
		</tr>
		<tr>
			<td>
				<br>
				<p style="text-align: center;">
					{{ @$admin->name }} {{ @$admin->lastname }}
				</p>
			</td>
		</tr>
	</table>
</body>
</html>