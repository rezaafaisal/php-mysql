<?php 

    $koneksi = mysqli_connect('localhost', 'root', 'Tenin@123', 'todo_app');

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

   function insert_note($data){
        global $koneksi;
        $judul = $data['judul_catatan'];
        $catatan = $data['catatan'];

        if($judul != null && $catatan != null){
            $query = "INSERT INTO catatan (judul, catatan_lengkap) VALUES ('$judul', '$catatan')"; 
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

?>