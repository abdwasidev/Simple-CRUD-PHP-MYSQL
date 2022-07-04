<?php 
include 'config.php';

if($_GET['action'] == "table_data"){
	$query = $mysqli->query("SELECT * FROM btc order by id desc");
	$jumlah = $query->num_rows;
	$data = array();
	$no = 1;
	while($r = $query->fetch_array()){
	   $id = $r['id'];
	   $row = array();
	   $row[] = $no;
	   $row[] = $r['id'];
	   $row[] = $r['sinyal'];
	   $row[] = $r['level'];
	   $row[] = $r['tanggal'];
	   $row[] = $r['hargaidr'];
	   $row[] = $r['hargausdt'];
	   $row[] = $r['volusdt'];
	   $row[] = $r['volidr'];
	   $row[] = $r['lastbuy'];
	   $row[] = $r['lastsell'];
	   $row[] = $r['jenis'];
	   $row[] = '<div class="text-center">
	   			   <a class="btn btn-outline-success" onclick="form_edit('.$id.')">Update</a>
	   			   <a class="btn btn-outline-danger" onclick="delete_data('.$id.')">Delete</a>
	   			 </div>';
	   $data[] = $row;
	   $no++;
	}
		
	$output = array("draw"=>1,"recordsTotal"=>$jumlah,"recordsFiltered"=>$jumlah,"data" => $data);
	echo json_encode($output);
}

elseif($_GET['action'] == "form_data"){
   $query = $mysqli->query( "SELECT * FROM btc WHERE id='$_GET[id]'");
   $data  = $query->fetch_array();	
   echo json_encode($data);
}

elseif($_GET['action'] == "insert"){
  
    $result = $mysqli->query("INSERT INTO btc SET
        id     = '$_POST[id]',
        sinyal    = '$_POST[sinyal]',
        level      = '$_POST[level]',
        tanggal  = '$_POST[tanggal]',
        hargaidr = '$_POST[hargaidr]',
        hargausdt = '$_POST[hargausdt]',
        volusdt = '$_POST[volusdt]',
        volidr = '$_POST[volidr]',
        lastbuy = '$_POST[lastbuy]',
        lastsell = '$_POST[lastsell]',
        jenis = '$_POST[jenis]'
        ");	
}

elseif($_GET['action'] == "update"){

 	$result = $mysqli->query("UPDATE btc SET
        id     = '$_POST[id]',
        sinyal    = '$_POST[sinyal]',
        level      = '$_POST[level]',
        tanggal  = '$_POST[tanggal]',
        hargaidr = '$_POST[hargaidr]',
        hargausdt = '$_POST[hargausdt]',
        volusdt = '$_POST[volusdt]',
        volidr = '$_POST[volidr]',
        lastbuy = '$_POST[lastbuy]',
        lastsell = '$_POST[lastsell]',
        jenis = '$_POST[jenis]'
        -- WHERE id ='$_POST[id]'
        ");  
 
}

elseif($_GET['action'] == "delete"){
   $result = $mysqli->query("DELETE FROM btc WHERE id='$_GET[id]'");
}
?>