<?php 

	function terlambat($tangal_dateline,$tgl_kembali)
	{
		$tangal_dateline_pcs = explode("-", $tangal_dateline);
		$tangal_dateline_pcs = $tangal_dateline_pcs[2]."-".$tangal_dateline_pcs[1]."-".$tangal_dateline_pcs[0];

		$tgl_kembali_pcs = explode("-", $tgl_kembali);
		$tgl_kembali_pcs = $tgl_kembali_pcs[2]."-".$tgl_kembali_pcs[1]."-".$tgl_kembali_pcs[0];

		$selisih = strtotime($tgl_kembali_pcs) - strtotime($tangal_dateline_pcs);

		$selisih = $selisih / 86400;

		if ($selisih>=1) {
			$hasil_tgl = floor($selisih);
		} else {
			$hasil_tgl = 0;
		}
		return $hasil_tgl;
	}

 ?>