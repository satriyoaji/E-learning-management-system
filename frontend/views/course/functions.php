<?php 
function uploadFile(){
  global $id_pelajaran;
  //$_FILES BERISIKAN array multidimensi dengan isi dalam index['fileame'] (nama index sesuai dengan name yg ada pada input type='file' dalam assign_mhs.php yang berisikan: nama file, tipe file, tempat penyimpanan sementara ketika file di upload, isi error, dan maksimal size gambar. LIAT VIDEO UPLOAD di menit ke-12an buat liat ISI dari multidimension array dalam $_FILES apa sajaa
  $namaFile = $_FILES['filename']['name'];
  $ukuranFile = $_FILES['filename']['size'];
  $error = $_FILES['filename']['error'];
  $tmpName = $_FILES['filename']['tmp_name'];
  if($error === 4){ //4 berarti gaada gambar yang diupload. COBA CARI NILAI ERROR YANG LAIN!
    
    return "no file";//jika user ga mengupload gambar, maka return false dan langsung keluar fungsi
  }
  //cek apakah yg diupload BENAR2 GAMBAR??
  $ekstensiFileValid = ['ppt', 'pptx', 'doc', 'docx', 'pdf'];
  $ekstensiFile = explode('.', $namaFile);
  $ekstensiFile = strtolower(end($ekstensiFile));//end untuk mengambil isi array index trakhir (ambil ekstensi). lalu UBAH JADI LOWERCASE untuk antisipasi. Kemudian dibawah ini cek apakah yg di upload bukan ekstensi File??
  if(!in_array($ekstensiFile, $ekstensiFileValid)){ //in_array untuk ngecek ada nggak sebuah string dalam suatu array
    //var_dump($ekstensiFile); die;
    echo "<script>
        alert('Yang anda upload bukan File!');
      </script>";
    return false; //jika ekstensiFile gaada dalam array ekstensi yg valid tsb, maka return false dan langsung keluar fungsi
  }
  //cek jika ukuran file File terlalu besar
  if($ukuranFile > 1000000){ //satuan byte. KENAPA KOK GA JALAN???
    echo "<script>
        alert('Ukuran File terlalu besar!');
      </script>";
    return false; //jika size File melebihi batas, maka return false dan langsung keluar fungsi
  } 

  $jumlah_bab = Bab::find()
  ->where('id_pelajaran_bab = :id', [':id' => $id_pelajaran])
  ->count(); 
  //jika lolos ketiga decision di atas, File dipindah ke tujuan dari tempat penyimpanan sementara, dengan namaFile yang baru
  $namaFileBaru = 'soal/'. $GLOBALS['nama_pelajaran'] .'_' . $jumlah_bab+1;
  $namaFileBaru .= '.' . $ekstensiFile;

  move_uploaded_file($tmpName, '../../../backend/web/' . $namaFileBaru); //jadi nama filenya sama dg nama file asli yg di upload, tapi letaknya dlm folder yg sama dg penyimpanan functions.php ini, yaitu di dalam folder phpdasar lalu ke dalam folder img
  return $namaFileBaru;
}
?>