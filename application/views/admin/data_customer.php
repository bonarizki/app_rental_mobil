<div class= "main-content">
    <section class= "section">
        <div class= "section-header">
            <h1>Data Customer</h1>
        </div>
        <a href="<?php echo base_url ('admin/data_customer/tambah_customer')?>" class="btn btn-primary mb-4"> Tambah Customer </a>

        <?php echo $this->session->flashdata ('pesan') ?>
            
        <table class="table table-striped table-bordered table-sm" id="table">
            <thead>
                <tr>
                    <th> No </th>
                    <th> Nama </th>
                    <th> Username </th>
                    <th> Alamat </th>
                    <th> Gender </th>
                    <th> No.Telepon </th>
                    <th> No.KTP </th>
                    <th> Password </th>
                    <th> Action </th>
                </tr>
            </thead>
            
            <?php 
            $no =1;
            foreach ($customer as $cs) : ?>
                <tr>
                    <td><?php echo $no++?></td>
                    <td><?php echo $cs->nama?></td>
                    <td><?php echo $cs->username?></td>
                    <td><?php echo $cs->alamat?></td>
                    <td><?php echo $cs->gender?></td>
                    <td><?php echo $cs->no_telepon?></td>
                    <td><?php echo $cs->no_ktp?></td>
                    <td><?php echo $cs->password?></td>
                    <td>
                        <div class="row">
                            <a href="<?php echo base_url ('admin/data_customer/delete_customer/').$cs->id_customer?>" class="btn btn-sm btn-danger mr-2"><i class="fas fa-trash"></i></a>
                            <a href="<?php echo base_url ('admin/data_customer/update_customer/').$cs->id_customer?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        </div>
                    </td>
                </tr>

            <?php endforeach; ?>
        </table>
    </section>
</div>  

<script>
    $(document).ready( function () {
        $('#table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'pageLength',
                { extend: 'pdf', text: '<span class="btn btn-sm btn-info mr-2"><i class="fas fa-file-pdf fa-1x" aria-hidden="true"></i> PDF </span>'},
                { extend: 'csv', text: '<span class="btn btn-sm btn-info mr-2"><spa class="fas fa-file-csv fa-1x"></i> CSV </span>'},
                { extend: 'excel', text: '<span class="btn btn-sm btn-info mr-2"><i class="fas fa-file-excel" aria-hidden="true"></i> EXCEL </span>' },
            ]
        });
    });
</script>