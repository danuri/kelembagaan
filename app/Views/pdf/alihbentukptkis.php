<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Usulan Alih Bentuk PTKIS - Format untuk dompdf</title>
  <style>
    /* CSS sederhana agar kompatibel dengan dompdf */
    body{font-family: DejaVu Sans, Arial, Helvetica, sans-serif; font-size:12px; margin:20px}
    header{display:flex; justify-content:space-between; align-items:center}
    h1{font-size:16px; margin:0}
    .meta{font-size:12px}
    .section{margin-top:18px}
    table{width:100%; border-collapse:collapse;}
    th,td{padding:6px; border:1px solid #000; vertical-align:top}
    .no-border td{border: none}
    .small-table td{padding:4px}
    .doc-table th, .doc-table td{text-align:left}
    .signature{margin-top:40px; width:100%; display:flex; justify-content:space-between}
    .signature div{width:40%; text-align:center}
    .note{font-size:11px; margin-top:8px}
  </style>
</head>
<body>
  <header>
    <div>
      <h1>USULAN ALIH BENTUK PTKIS</h1>
      <div class="meta">
        <table class="no-border">
            <tr>
                <td style="width:30%">Nomor Surat Pengantar</td><td>: <?= $usulan->nomor_surat?></td>
            </tr>
            <tr>
                <td>Perihal</td><td>: <?= $usulan->perihal?></td>
            </tr>
            <tr>
                <td>Tanggal Usul</td><td>: <?= id_date($usulan->submit_at)?></td>
            </tr>
            <tr>
                <td>Status</td><td>: <?= usul_status($usulan->status)?></td>
            </tr>
            <tr>
                <td>Keterangan BTS/TMS</td><td>: <?= $usulan->keterangan?></td>
            </tr>
        </table>
      </div>
    </div>
    <div>
      <!-- bisa ditaruh logo di sini jika perlu -->
      <img src="" alt="" style="max-height:60px" />
    </div>
  </header>

  <div class="section">
    <h2>A. DATA USULAN</h2>
    <table>
      <tr><td style="width:30%">Nama Lembaga Lama</td><td><?= $detail->nama_lembaga ?></td></tr>
      <tr><td>Alamat Lembaga Lama</td><td><?= $detail->alamat_lembaga ?></td></tr>
      <tr><td>Nama Lembaga Baru</td><td><?= $detail->nama_lembaga_baru ?></td></tr>
      <tr><td>Kategori Lembaga Baru</td><td><?= $detail->kategori ?></td></tr>
    </table>
  </div>

  <div class="section">
    <h2>B. DATA STATISTIK</h2>
    <table>
      <tr><td style="width:40%">DATA</td><td>IAI</td><td>UNIV</td><td>DATA KAMPUS</td><td>DATA DIKTI</td></tr>
      <tr><td>Jumlah Magister</td><td>20</td><td>30</td><td><?= $detail->magister2 ?></td><td><?= $detail->magister ?></td></tr>
      <tr><td>Jumlah Doktor</td><td>4</td><td>6</td><td><?= $detail->doktor2 ?></td><td><?= $detail->doktor ?></td></tr>
      <tr><td>Jumlah Asisten Ahli</td><td>12</td><td>18</td><td><?= $detail->asisten_ahli2 ?></td><td><?= $detail->asisten_ahli ?></td></tr>
      <tr><td>Jumlah Lektor</td><td>12</td><td>14</td><td><?= $detail->lektor2 ?></td><td><?= $detail->lektor ?></td></tr>
      <tr><td>Jumlah Lektor Kepala</td><td>0</td><td>3</td><td><?= $detail->lektor_kepala2 ?></td><td><?= $detail->lektor_kepala ?></td></tr>
      <tr><td>Jumlah Guru Besar</td><td>0</td><td>1</td><td><?= $detail->guru_besar2 ?></td><td><?= $detail->guru_besar ?></td></tr>
      <tr><td>Jumlah Mahasiswa</td><td>480</td><td>1.000</td><td><?= $detail->mahasiswa2 ?></td><td><?= $detail->mahasiswa ?></td></tr>
      <tr><td>Rasio Dosen : Mahasiswa</td><td>1:45</td><td>1:45</td><td><?= $detail->rasio_dm2 ?></td><td><?= $detail->rasio_dm ?></td></tr>
      <tr><td>Jumlah Fakultas</td><td>0</td><td>3</td><td><?= $detail->fakultas2 ?></td><td><?= $detail->fakultas ?></td></tr>
      <tr><td>Jumlah Prodi</td><td>4 S1 (2 Ilmu Berbeda)</td><td>6 S1 (3 Ilmu Berbeda)</td><td><?= $detail->prodi2 ?></td><td><?= $detail->prodi ?></td></tr>
      <tr><td>Prodi Tidak Terakreditasi</td><td></td><td></td><td><?= $detail->akreditasi_no2 ?></td><td><?= $detail->akreditasi_no ?></td></tr>
      <tr><td>Prodi Terakreditasi Unggul/A</td><td></td><td></td><td><?= $detail->akreditasi_unggul2 ?></td><td><?= $detail->akreditasi_unggul ?></td></tr>
      <tr><td>Prodi Terakreditasi Baik Sekali/B</td><td></td><td></td><td><?= $detail->akreditasi_baiksekali2 ?></td><td><?= $detail->akreditasi_baiksekali ?></td></tr>
      <tr><td>Prodi Terakreditasi Baik</td><td></td><td></td><td><?= $detail->akreditasi_baik2 ?></td><td><?= $detail->akreditasi_baik ?></td></tr>
      <tr><td>Pelaporan PD Dikti</td><td></td><td></td><td><?= $detail->pelaporan2 ?></td><td><?= $detail->pelaporan ?></td></tr>
      <tr><td>Luas Tanah</td><td>8.000M²</td><td>10.000M²</td><td><?= $detail->tanah2 ?></td><td><?= $detail->tanah ?></td></tr>
      <tr><td>Kepemilikan Tanah</td><td></td><td></td><td><?= $detail->kepemilikan_tanah2 ?></td><td><?= $detail->kepemilikan_tanah ?></td></tr>
    </table>
  </div>

  <div class="section">
    <h2>C. DOKUMEN</h2>
    <table class="doc-table">
      <thead>
        <tr>
          <th style="width:6%">NO</th>
          <th>Dokumen</th>
          <th style="width:20%">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php $no=1; foreach($dokumens as $dokumen): ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $dokumen->dokumen ?></td>
                <td><?= ($dokumen->dok_status == 1)?'Ya':'Tidak' ?></td>
            </tr>
        <?php $no++; endforeach; ?>
      </tbody>
    </table>
  </div>

  <div class="section">
    <h2>Catatan</h2>
    <p class="note"><?= $detail->catatan;?></p>
  </div>

</body>
</html>
