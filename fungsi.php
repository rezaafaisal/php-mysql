<?php 

    $koneksi = mysqli_connect('localhost', 'root', 'Tenin@123', 'todo_app');

    date_default_timezone_set('Asia/Makassar');
   function show_all(){
        $koneksi = $GLOBALS['koneksi'];
        $query = "SELECT * FROM catatan";

        $hasil = mysqli_query($koneksi, $query);

        $data = array();

        while($row = mysqli_fetch_assoc($hasil)){
            array_push($data, $row);
        }
        return $data;
   }

   function show_one($id){
    global $koneksi;

    $query = "SELECT * FROM catatan WHERE id = '$id'";
    $hasil = mysqli_query($koneksi, $query);
    return mysqli_fetch_assoc($hasil);
   }

   function insert_note($data, $gambar){
        global $koneksi;

        $judul = $data['judul_catatan'];
        $catatan = $data['catatan'];

        // simpan dalam variabel meta data
        $nama_gambar = $gambar['gambar_catatan']['name'];
        $ukuran_gambar = $gambar['gambar_catatan']['size'];
        $lokasi_gambar = $gambar['gambar_catatan']['tmp_name'];

        // tentukan format yang valid
        $format_tersedia = ['jpg', 'png', 'jpeg', 'gif'];

        // pisahkan antara nama file dan format
        $format_gambar = explode('.',$nama_gambar);

        // ambil format gambar
        $format_gambar = end($format_gambar);

        // ubah nama gambar menjadi waktu sekarang
        $nama_gambar_baru = date('YmdHis').'.'.$format_gambar;

        // cek format gambar apakah sesuai
        if(!in_array($format_gambar, $format_tersedia)){
            header("location:tambah.php?image_error=type");die();
        }

        // cek ukuran gambar
        if($ukuran_gambar > 2097152){
            header("location:tambah.php?image_error=size");die();
        }

        // proses pemindahan gambar dari tmp ke locak direktori projek
        move_uploaded_file($lokasi_gambar, 'img/'.$nama_gambar_baru);

        if($judul != null && $catatan != null){
            $query = "INSERT INTO catatan (judul, catatan_lengkap, gambar) VALUES ('$judul', '$catatan', '$nama_gambar_baru')"; 
            mysqli_query($koneksi, $query);
            if(mysqli_affected_rows($koneksi)){
                header("location:index.php?sukses_tambah");
            }
        }
   }

   function show_update_note($id){
    global $koneksi;
    // query untuk update data
    $query_select = "SELECT * FROM catatan WHERE id = '$id'";
    // eksekusi query
    $result = mysqli_query($koneksi, $query_select);

    // menyinmpan hasil query (datanya) dalam $data
    return mysqli_fetch_assoc($result);
   }

   function update_note($data){
    global $koneksi;
    $id = $data['id'];
    $judul = $data['judul_catatan'];
    $catatan = $data['catatan'];

    if($judul != null && $catatan != null){
        $query = "UPDATE catatan SET judul='$judul', catatan_lengkap='$catatan' WHERE id = $id"; 
        mysqli_query($koneksi, $query);
        if(mysqli_affected_rows($koneksi)){
            header("location: index.php?sukses_update");
        }
    }
   }

   function delete_note(){
    
   }

?>