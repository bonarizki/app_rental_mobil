<div class= "main-content">
    <section class= "section">
        <div class= "section-header">
            <h1>Data Supir</h1>
        </div>
        <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#tambah_data_supir" type="button" style=""> Tambah Supir </button>

        <?php echo $this->session->flashdata ('pesan') ?>
            
        <table class="table table-striped table-bordered" id="table">
            <thead>
                <tr>
                    <th> Nama </th>
                    <th> No KTP </th>
                    <th> Alamat </th>
                    <th> Gender </th>
                    <th> No.Telepon </th>
                    <th> Email </th>
                    <th> status </th>
                    <th> Action </th>
                </tr>
            </thead>
            <!-- <tfoot>
                <tr>
                    <th> Nama </th>
                    <th> Alamat </th>
                    <th> Gender </th>
                    <th> No.Telepon </th>
                    <th> No.KTP </th>
                    <th> Password </th>
                    <th> Action </th>
                </tr>
            </tfoot> -->
        </table>
    </section>
</div>  

<!-- Modal -->
<div class="modal fade" id="tambah_data_supir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Supir</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form">
            <div class="form-group">
                <label> Nama </label>
                <input type="text" name="nama" class="form-control">
                <small class="form-text text-danger"><?= form_error('nama') ?></small>
            </div>
            <div class="form-group">
                <label> Alamat </label>
                <input type="text" name="alamat" class="form-control">
                <small class="form-text text-danger"><?= form_error('alamat') ?></small>

            </div>
            <div class="form-group">
                <label> Tempat Lahir </label>
                <input type="text" name="tempat_lahir" class="form-control">
                <small class="form-text text-danger"><?= form_error('tempat_lahir') ?></small>
            </div>
            <div class="form-group">
                <label> Tanggal Lahir </label>
                <input type="date" name="tgl_lahir" class="form-control">
                <small class="form-text text-danger"><?= form_error('tgl_lahir') ?></small>
            </div>
            <div class="form-group">
                <label> Gender </label>
                <select class="form-control" name="jk">
                    <option value="">--Pilih Gender --</option>
                    <option value="laki-laki"> Laki-laki </option>
                    <option value="perempuan"> Perempuan </option>
                </select>
                <small class="form-text text-danger"><?= form_error('jk') ?></small>
            </div>
            <div class="form-group">
                <label> No.Telepon </label>
                <input type="text" name="no_telepon" class="form-control">
                <small class="form-text text-danger"><?= form_error('no_telepon') ?></small>
            </div>
            <div class="form-group">
                <label> Email </label>
                <input type="text" name="email" class="form-control">
                <small class="form-text text-danger"><?= form_error('email') ?></small>
            </div>
            <div class="form-group">
                <label> No.KTP </label>
                <input type="text" name="no_ktp" class="form-control">
                <small class="form-text text-danger"><?= form_error('no_ktp') ?></small>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="add()">Save</button>
      </div>
    </div>
  </div>
</div>

 <!-- script -->
<script>
    $(document).ready( function () {
        $('#table').DataTable({
            "ajax":"<?= base_url('admin/dashboard/getDataSupir') ?>",
            "columns": [
                { "data":"nama_supir"},
                { "data":"no_ktp"},
                { "data":"alamat"},
                { "data":"jk"},
                { "data":"no_hp"},
                { "data":"email"},
                {
                    "data":"id_supir",
                    "status_job":"status_job",
                    "render":function(data, type, row,status_job){
                        if(row.status_job=='1'){
                            return 'On Job';
                        }else{
                            return 'Need Job';
                        }
                    }
                },
                {
                    "data":"id_supir",
                    "status_supir":"status_supir",
                    "render":function(data, type, row,status_supir){
                        if(row.status_supir=='1'){
                            return '<center><badge class="btn btn-sm btn-danger fa fa-lock" onclick="updateToactive('+data+')" title="Click To Active Driver"></badge></center>'
                        }else{
                            return '<center><badge class="btn btn-sm btn-primary fa fa-unlock" onclick="updateStatusToDeactive('+data+')" title="Click To Deactive Driver"></badge></center>'
                        }
                    }
                }
            ]
        });
    } );

    function add()
    {
       var data = $('#form').serialize()
       $.ajax({
        type        : 'post',
        url         : "<?=base_url('admin/dashboard/add_supir') ?>",
        dataType    : 'json',
        data        : data,
        success:function(data)
        {
            var tables = $('#table').DataTable();
			tables.ajax.reload();
            Swal.fire(
                'Good job!',
                'Data Supir Berhasil Ditambahkan',
                'success'
            );
        },
        error:function(data)
        { 
            console.log("test")
        },
        complete:function()
        {
            $('#tambah_data_supir').modal('hide');
            $('#form')[0].reset();
        }
       })
    }

    function updateToactive(data)
    {
        $.ajax({
            type :'post',
            url :'<?= base_url('admin/dashboard/activeDriver/')?>'+data,
            success:function(data){
                var tables = $('#table').DataTable();
                tables.ajax.reload();
                Swal.fire(
                    'Good job!',
                    'Supir Sudah Active',
                    'success'
                );
            }
        })
    }

    function updateStatusToDeactive(data)
    {
        $.ajax({
            type :'post',
            url :'<?= base_url('admin/dashboard/deactiveDriver/')?>'+data,
            success:function(data){
                var tables = $('#table').DataTable();
                tables.ajax.reload();
                Swal.fire(
                    'Good job!',
                    'Supir Sudah Di Non Aktifkan',
                    'success'
                );
                
            }
        })
    }
</script>