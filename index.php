<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

    <title>PHP CRUD</title>
  </head>
  <body>
    
  <div class="container mt-5 mb-5">
    <div class="row">
      <div class="col-6">
        <h1>Data BTC</h1>
      </div>  
      <div class="col-6">
        <button type="button" class="btn btn-primary float-right" onclick="form_add()">Tambah Data</button>
      </div>  
    </div>
    <div class="row">
      <div class="col-12">
        <div class="table-responsive">
          <table class="table table-striped table-sm" id="myTable">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">ID</th>
                <th scope="col">Sinyal</th>
                <th scope="col">Level</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Harga IDR</th>
                <th scope="col">Harga USDT</th>
                <th scope="col">Vol BTC</th>
                <th scope="col">Vol IDR</th>
                <th scope="col">Last Buy</th>
                <th scope="col">Last Sell</th>
                <th scope="col">Jenis</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <!-- List Data Menggunakan DataTable -->              
            </tbody>
          </table>
        </div>
      </div>
    </div>
    
  </div>

  <!-- START Modal Form -->

  <div class="modal fade" id="modalmhs" tabindex="-1" role="dialog" aria-labelledby="modalmhs" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                  <form onsubmit="return save_data()">
                  <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="id">ID</label>
                          <input type="text" class="form-control" name="id" id="id">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="sinyal">Sinyal</label>
                            <select name="sinyal" id="sinyal" class="form-control">
                                <option value="null">Please Select Option</option>
                                <?php
                                echo "";
                                    for ($i=0; $i<=100; $i++)
                                    {
                                        ?>
                                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                          <!-- <input type="text" class="form-control" name="sinyal" id="sinyal"> -->
                          <!-- <select name="jk" id="jk" class="form-control">
                            <option value="L">L</option>
                            <option value="P">P</option>
                          </select> -->
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="level">Level</label>
                          <input type="text" class="form-control" name="level" id="level">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="tanggal">Tanggal</label>
                            <div class="input-group date">
                                <input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="YYYY/MM/DD"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                            </div>
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="hargaidr">Harga IDR</label>
                          <input type="text" class="form-control" name="hargaidr" id="hargaidr">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="hargausdt">Harga USDT</label>
                          <input type="text" class="form-control" name="hargausdt" id="hargausdt">
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="volidr">Vol BTC</label>
                          <input type="text" class="form-control" name="volidr" id="volidr">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="volusdt">Vol IDR</label>
                          <input type="text" class="form-control" name="volusdt" id="volusdt">
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="lastbuy">Last Buy</label>
                          <input type="text" class="form-control" name="lastbuy" id="lastbuy">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="lastsell">Last Sell</label>
                          <input type="text" class="form-control" name="lastsell" id="lastsell">
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="jenis">Jenis</label>
                          <select name="jenis" id="jenis" class="form-control">
                            <option value="null">Please Select Option</option>
                            <option value="crash">Crash</option>
                            <option value="moon">Moon</option>
                          </select>
                          <!-- <input type="text" class="form-control" name="jenis" id="jenis"> -->
                        </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <div class="mr-auto">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button> 

                      </div>
                    </div>
                  </div>
                  </form>
                  </div>
                </div>

  <!-- END Modal Form -->

 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
var save_method, table,pesan;

$(function(){
    table = $('#myTable').DataTable( {
          "processing": true,
          "ajax": "action.php?action=table_data"
      } );
    });

function form_add(){
    save_method = "add";
    $('#modalmhs').modal('show');
    $('#modalmhs form')[0].reset();
    $('.modal-title').text('Tambah Data');
}

function form_edit(id){
      save_method = "edit";
      $.ajax({
        url : "action.php?action=form_data&id="+id,
        type : "GET",
        dataType : "JSON",
        success : function(data){
            $('#modalmhs').modal('show');
            $('.modal-title').text('Ubah Data');
        
            $('#id').val(data.id);
            $('#sinyal').val(data.sinyal);
            $('#level').val(data.level);
            $('#tanggal').val(data.tanggal);
            $('#hargaidr').val(data.hargaidr);
            $('#hargausdt').val(data.hargausdt);
            $('#volusdt').val(data.volusdt);
            $('#volidr').val(data.volidr);
            $('#lastbuy').val(data.lastbuy);
            $('#lastsell').val(data.lastsell);
            $('#jenis').val(data.jenis);
        },
        error : function(){
            alert("Tidak dapat menampilkan data!");
        }
      });
}

function save_data(){
    if(save_method == "add"){
      url = "action.php?action=insert";
      pesan = "Berhasil Disimpan";
    }else{ 
      url = "action.php?action=update";
      pesan= "Berhasil Diubah";
    }

    $.ajax({
      url : url,
      type : "POST",
      data : $('#modalmhs form').serialize(),
      success : function(){
          $('#modalmhs').modal('hide');
          $('#modalmhs form')[0].reset();
          alert(pesan);
          table.ajax.reload();         
      },
      error : function(){
          alert("Tidak dapat menyimpan data!");
      }     
    });
    return false;
}

function delete_data(id){
    if(confirm("Apakah yakin data akan dihapus?")){
      $.ajax({
          url : "action.php?action=delete&id="+id,
          type : "GET",
          success : function(data){
            alert("Data Berhasil Dihapus")
            table.ajax.reload();
          },
          error : function(){
            alert("Tidak dapat menghapus data!");
          }
      });
    }
}

</script>
<script>
    $(document).ready(function(){
      var date_input=$('input[name="tanggal"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'yyyy/mm/dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    }),
    $('#sandbox-container .input-group.date').datepicker({
        format: "yyyy/mm//dd"
    });
</script>

</body>
</html>
