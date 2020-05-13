<div class="main-content">
	<div class="section">
		<div class="section-header">
			<h1> Data Type Mobil </h1>
		</div>
	</div>

	<a class="btn btn-primary mb-3" href="<?php echo base_url('admin/data_type/tambah_type') ?>"> Tambah Type </a>

	<?Php echo $this->session->flashdata('pesan')?>

	<table class="table table-bordered table-striped table-hover" id="table">
		<thead>
			<tr>
				<th width="20px">No</th>
				<th> Kode Type </th>
				<th> Nama Type </th>
				<th width="150px"> Aksi </th>
			</tr>
		</thead>

		<tbody>
			<?php
			$no = 1;
			foreach ($type as $tp) :?>
				<tr>
					<td> <?php echo $no++ ?> </td>
					<td> <?php echo $tp->kode_type ?> </td>
					<td> <?php echo $tp->nama_type ?> </td>
					<td> 
						<a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/data_type/update_type/'.$tp->id_type) ?>"> <i class="fas fa-edit"></i></a>
						<a class="btn btn-sm btn-danger" href="<?php echo base_url('admin/data_type/delete_type/'.$tp->id_type) ?>"> <i class="fas fa-trash"></i></a>					
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
		</tbody>
	</table>
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
    } );
</script>