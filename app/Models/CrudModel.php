<?php

namespace App\Models;

use CodeIgniter\Model;

class CrudModel extends Model
{
  protected $db;

  public function __construct()
  {
    $this->db = \Config\Database::connect('default', false);

  }

  public function getRow($table,$where)
  {
    $builder = $this->db->table($table);
    $query = $builder->getWhere($where);

    return $query->getRow();
  }

  public function getArray($table,$where=false)
  {
    $builder = $this->db->table($table);

    if($where){
      $query = $builder->getWhere($where);
    }else{
      $query = $builder->get();
    }

    return $query->getResult();
  }

  public function getCount($table,$where=false)
  {
    $builder = $this->db->table($table);

    if($where){
      $query = $builder->getWhere($where);
    }else{
      $query = $builder->get();
    }

    // return $query->countAllResults();
  }

  public function query_row($query)
  {
    $query = $this->db->query($query)->getRow();
    return $query;
  }

  public function query_array($query)
  {
    $query = $this->db->query($query)->getResult();
    return $query;
  }

  public function getUrut()
  {
    $query = $this->db->query("SELECT IFNULL(MAX(rekomendasi_nomor_urut),'0') AS urut FROM tr_usulan")->getRow();
    return ($query->urut + 1);
  }

  public function getActivities($id)
  {
    $query = $this->db->query("exec sp_get_aktifitas @usul='".$id."'")->getResult();
    return $query;
  }

  public function getRequest($kodesatker)
  {
    $query = $this->db->query("SELECT
                              	TR_USULAN.*,
                              	TM_LAYANAN.KELOLA,
                              	TM_LAYANAN.LAYANAN AS NAMALAYANAN,
                              	sk.SATUAN_KERJA,
                              	(SELECT COUNT(ID) FROM TR_USUL_BERKAS b WHERE b.USULAN=TR_USULAN.ID) AS jumlah
                              FROM
                              	dbo.TR_USULAN
                              	INNER JOIN dbo.TM_LAYANAN	ON TR_USULAN.LAYANAN = TM_LAYANAN.ID
                              	LEFT JOIN simpeg41.dbo.TM_SATUAN_KERJA sk ON TR_USULAN.KODE_SATKER= sk.KODE_SATUAN_KERJA
                              WHERE TR_USULAN.KODE_SATKER='$kodesatker'")->getResult();
    return $query;
  }

  public function getLayananDokumen($id)
  {
    $query = $this->db->query("SELECT
                              tm_layanan_dokumen.*, 
                              tm_dokumen.dokumen AS nama_dokumen, 
                              tm_dokumen.keterangan
                            FROM
                              tm_layanan_dokumen
                              INNER JOIN
                              tm_dokumen
                              ON 
                                tm_layanan_dokumen.dokumen = tm_dokumen.id
                            WHERE
                              tm_layanan_dokumen.layanan = '$id'")->getResult();
    return $query;
  }

  public function getDetailRequest($id)
  {
    $query = $this->db->query("SELECT
                              	TR_USULAN.*,
                              	TM_LAYANAN.KELOLA,
                              	TM_LAYANAN.LAYANAN AS NAMALAYANAN,
                              	TM_LAYANAN.ROUTE,
                              	sk.SATUAN_KERJA,
                              	(SELECT COUNT(ID) FROM TR_USUL_BERKAS b WHERE b.USULAN=TR_USULAN.ID) AS jumlah
                              FROM
                              	dbo.TR_USULAN
                              	INNER JOIN dbo.TM_LAYANAN	ON TR_USULAN.LAYANAN = TM_LAYANAN.ID
                              	LEFT JOIN simpeg41.dbo.TM_SATUAN_KERJA sk ON TR_USULAN.KODE_SATKER= sk.KODE_SATUAN_KERJA
                              WHERE TR_USULAN.ID='$id'")->getRow();
    return $query;
  }

  public function getDetailUsulan($id)
  {
    $query = $this->db->query("SELECT
                              	TR_USULAN.*,
                              	TM_LAYANAN.LAYANAN AS NAMALAYANAN,
                              	TM_LAYANAN.ROUTE,
                              	TM_LAYANAN.KELOLA,
                              	p.NAMA_LENGKAP AS NAMA_ADMIN,
                              	sk.SATUAN_KERJA,
                              	(SELECT COUNT(ID) FROM TR_USUL_BERKAS b WHERE b.USULAN=TR_USULAN.ID) AS JUMLAH
                              FROM
                              	dbo.TR_USULAN
                              	LEFT JOIN
                              	dbo.TM_LAYANAN
                              	ON
                              		TR_USULAN.LAYANAN = TM_LAYANAN.ID
                              	LEFT JOIN
                              	simpeg41.dbo.TEMP_PEGAWAI AS p
                              	ON
                              		TR_USULAN.ADMIN = p.NIP_BARU
                              	LEFT JOIN
                              	simpeg41.dbo.TM_SATUAN_KERJA AS sk
                              	ON
                              		TR_USULAN.KODE_SATKER = sk.KODE_SATUAN_KERJA
                              WHERE
                              	TR_USULAN.ID = '$id'")->getRow();
    return $query;
  }

  public function getDokumen($layananid,$usulid)
  {
    $query = $this->db->query("SELECT
                                tm_dokumen.*,b.lampiran,b.dok_status,b.keterangan,b.id as usul_dokumen_id
                              FROM
                                tm_dokumen
                                LEFT JOIN
                                (SELECT id,dokumen_id,lampiran,dok_status,keterangan FROM tr_usulan_dokumen WHERE usul_id='$usulid') b
                                ON 
                                  tm_dokumen.id = b.dokumen_id
                              WHERE
                                layanan_id = '$layananid'")->getResult();
    return $query;
  }

  public function rekapUsul()
  {
    $query = $this->db->query("SELECT
                              tr_usulan.layanan AS layanan_id, 
                              COUNT(tr_usulan.id) AS jumlah, 
                              tm_layanan.layanan
                            FROM
                              tr_usulan
                              INNER JOIN
                              tm_layanan
                              ON 
                                tr_usulan.layanan = tm_layanan.id
                            GROUP BY
                              tr_usulan.layanan")->getResult();
    return $query;
  }

  public function jumlahUsul()
  {
    $query = $this->db->query("SELECT COUNT(id) AS jumlah FROM tr_usulan WHERE status > 0")->getRow();
    return $query;
  }

  public function jumlahUsulVerif()
  {
    $query = $this->db->query("SELECT COUNT(id) AS jumlah FROM tr_usulan WHERE status IN (2,3,31,4)")->getRow();
    return $query;
  }

  public function jumlahUsulKirim()
  {
    $query = $this->db->query("SELECT COUNT(id) AS jumlah FROM tr_usulan WHERE status='1'")->getRow();
    return $query;
  }

  public function jumlahUsulPenilaian()
  {
    $query = $this->db->query("SELECT COUNT(id) AS jumlah FROM tr_usulan WHERE status IN ('4','5')")->getRow();
    return $query;
  }

  public function jumlahUsulRkma()
  {
    $query = $this->db->query("SELECT COUNT(id) AS jumlah FROM tr_usulan WHERE status IN ('7','8')")->getRow();
    return $query;
  }

  public function jumlahUsulSelesai()
  {
    $query = $this->db->query("SELECT COUNT(id) AS jumlah FROM tr_usulan WHERE status IN ('9','20')")->getRow();
    return $query;
  }

  public function jumlahLayananStatus()
  {
    $query = $this->db->query("SELECT layanan_id,layanan_nama, COUNT(id) AS jumlah,
              (SELECT COUNT(layanan_id) FROM tr_usulan WHERE layanan_id=a.layanan_id AND status=1) AS masuk,
              (SELECT COUNT(layanan_id) FROM tr_usulan WHERE layanan_id=a.layanan_id AND status IN (2,3,31,4)) AS verifikasi,
              (SELECT COUNT(layanan_id) FROM tr_usulan WHERE layanan_id=a.layanan_id AND status IN (41,5)) AS penilaian,
              (SELECT COUNT(layanan_id) FROM tr_usulan WHERE layanan_id=a.layanan_id AND status IN (7,8)) AS rkma,
              (SELECT COUNT(layanan_id) FROM tr_usulan WHERE layanan_id=a.layanan_id AND status=20) AS selesai,
              (SELECT COUNT(layanan_id) FROM tr_usulan WHERE layanan_id=a.layanan_id AND status=21) AS kembali
              FROM tr_usulan a WHERE status > 0 GROUP BY layanan_id,layanan_nama
              ")->getResult();
    return $query;
  }

  public function jumlahUsulVerifikator($vid)
  {
    $query = $this->db->query("SELECT COUNT(id) AS jumlah FROM tr_usulan WHERE status > 1 AND verifikator='$vid'")->getRow();
    return $query;
  }

  public function jumlahUsulVerifVerifikator($vid)
  {
    $query = $this->db->query("SELECT COUNT(id) AS jumlah FROM tr_usulan WHERE status IN (2,3,31,4) AND verifikator='$vid'")->getRow();
    return $query;
  }

  public function jumlahUsulPenilaianVerifikator($vid)
  {
    $query = $this->db->query("SELECT COUNT(id) AS jumlah FROM tr_usulan WHERE status IN ('41','5','6') AND verifikator='$vid'")->getRow();
    return $query;
  }

  public function jumlahUsulDikembalikanVerifikator($vid)
  {
    $query = $this->db->query("SELECT COUNT(id) AS jumlah FROM tr_usulan WHERE status='21' AND verifikator='$vid'")->getRow();
    return $query;
  }

  public function jumlahUsulSelesaiVerifikator($vid)
  {
    $query = $this->db->query("SELECT COUNT(id) AS jumlah FROM tr_usulan WHERE status='20' AND verifikator='$vid'")->getRow();
    return $query;
  }
}
