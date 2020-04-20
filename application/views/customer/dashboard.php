<!-- Page Content -->
  <div class="container">

    <div class="row">

     <!--  <div class="col-lg-3">

        <h1 class="my-4">Shop Name</h1>
        <div class="list-group">
          <a href="#" class="list-group-item">Category 1</a>
          <a href="#" class="list-group-item">Category 2</a>
          <a href="#" class="list-group-item">Category 3</a>
        </div>

      </div> -->
      <!-- /.col-lg-3 -->

      <div class="col-12">
        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">

          <?php foreach ($mobil as $mb) : ?>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="<?php echo base_url ('assets/upload/'.$mb->gambar) ?>" style ="width : 160px; height : 130px" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#"><?php echo $mb->merk ?> </a>
                </h4>
                <h5>No. Plat : <?php echo $mb->no_plat ?> </h5>
                <h5>Harga&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo number_format($mb->harga,2,',','.') ?> </h5>
                
              </div>
              <div class="card-footer">
               
               <?php 

               if ($mb->status == "1") {
                echo "<span class='btn btn-danger' disable> Telah Di Rental</span>";
               }else{
                echo '<button class="btn btn-success" onclick="sewamobil('.$mb->id_mobil.')"> Rental </button>';
               }
               ?>

               <a class="btn btn-warning" href="<?php echo base_url ('customer/dashboard/detail_mobil/'). $mb->id_mobil?>"> Detail </a>
              </div>
            </div>
          </div>

        <?php endforeach; ?>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.col-lg-9 -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
  <!-- Modal -->
    <div class="modal fade" id="SewaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Rental Mobil</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img class="card-img-top" id="imgModal" src="" style ="width : 450px; height : 300px" alt="">
          <h4 id="idModal"></h4>
          <h4 id="merekModal"></h4>
          <h5 id="platModal"></h5>
          <h5 id="hargaModal">Harga&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo number_format(1000,2,',','.') ?> </h5>
        </div>
        <form>
          <input type="text" class="form-control col-11 ml-2 mr-2" id="ls" name="ls" placeholder="Lama Sewa" onkeyup="total_sewa()">
          <div id="area" hidden>
          <label class="ml-2 mt-2"><h4>Total Harga</h4></label>
            <input type="text" class="form-control col-11 ml-2 mr-2" id="total_harga" name="total_harga" readonly>
          </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="button" onclick="rental('<?= $this->session->userdata('username') ?>')" hidden>Sewa</button>
        </div>
      </div>
    </div>
  </div>


<script>
  function sewamobil(id){
    $.ajax({
      type :'get',
      url:"<?= base_url('customer/dashboard/detail_byModal/') ?>"+id,
      success:function(data){
        ndata = JSON.parse(data);
        $('#imgModal').attr('src','<?= base_url('assets/upload/')?>'+ndata[0].gambar);
        $('#merekModal').text(ndata[0].merk);
        $('#idModal').text(ndata[0].id_mobil);
        $('#platModal').text("No. Plat : "+ndata[0].no_plat);
        $('#hargaModal').text("Harga    : "+ndata[0].harga);
        namaDriver();
      }
    })
    $('#SewaModal').modal('show')
  }

  function total_sewa(){
    var hari = $('#ls').val();
    if(hari!='')
    {
      var harga = $('#hargaModal').text();
      var harga1 = harga.split(':');
      var total_harga = hari*harga1[1];
      $('#total_harga').val(total_harga);
      $('#area').attr('hidden',false);
      $('#button').attr('hidden',false)
    }else{
      $('#area').attr('hidden',true);
      $('#button').attr('hidden',true);
    }
  }

  function rental(nama)
  {
    if(nama==''){
      $('#SewaModal').modal('hide')
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Anda Harus Login Terlebih Dahulu',
        footer: '<a href>Why do I have this issue?</a>'
      });
    }else{
      $.ajax({
        type:'post',
        data:{
          "id_mobil" : $('#idModal').text(),
          "sewa" : $('#ls').val(),
          "harga" : $('#total_harga').val(),
        },
        url:"<?= base_url('customer/dashboard/sewaMobil') ?>",
        success:function(data){
          newdata = JSON.parse(data)
          $('#SewaModal').modal('hide')
          Swal.fire(
            'Good job!',
            newdata.info,
            'success'
          )

        }
      })
    }
  }

  function namaDriver()
  {
    $.ajax({
      url:"<?= base_url('customer/dashboard/dataDriver') ?>",
      success:function(data){
        console.log(data);
      }
    })
  }
</script>
