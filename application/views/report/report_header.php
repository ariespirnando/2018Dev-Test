<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        <div class="page-header">
					<h1>
						Transaksi
						<small>
							<i class="ace-icon fa fa-angle-double-right"></i>
							Transaksi - Add Data
						</small>
					</h1>
				</div>
				<div class="pull-right"></div>
			</div>
			<div> 
        <table class="table table-striped table-bordered table-hover" width="90%">
          <thead>
            <tr>
              <th width="5%" class="center">Nama Nasabah</th> 
              <th width="75%"> 
                <select name="account_id" class="form-control account_id" required>
                  <option value="">--------------------------</option>
                  
                  <?php 
                    foreach ($resnasabah as $rn) {
                      ?>
                        <option value="<?php echo $rn['account_id'] ?>"><?php echo $rn['name'] ?></option>
                      <?php 
                    }
                  ?>
                </select>  
              </th>  
            </tr>
            <tr>
              <th width="5%" class="center">Tanggal Awal Cetak</th> 
              <th width="75%">
                <input type="date" name="transaction_date_awal" value="" class="form-control transaction_date_awal"> 
              </th>  
            </tr>

            <tr>
              <th width="5%" class="center">Tanggal Akhir Cetak</th> 
              <th width="75%">
                <input type="date" name="transaction_date_akhir" value="" class="form-control transaction_date_akhir"> 
              </th>  
            </tr>
 
            <tr>
              <th width="5%">
               
              </th>  
              <th width="5%">
                 <span type="submit" class="btn btn-primary" onclick="reporthere();">Cetak Buku Tabungan</span> 
              </th> 
            </tr> 
          </thead> 
        </table> 
        <br> 

        <div class="tabungan_tampil"></div>

			</div>
			<div class="hr hr2 hr-double"></div> 
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>

<script type="text/javascript">
  function reporthere(){
    var transaction_date_awal = $('.transaction_date_awal').val();
    var transaction_date_akhir = $('.transaction_date_akhir').val();
    var account_id = $('.account_id').val();
    if(account_id!="" && transaction_date_awal!="" && transaction_date_akhir!=""){ 

      $.ajax({
         url: '<?php echo base_url()?>index.php/Report/report_data',
         type: 'post',
         data: "transaction_date_awal="+transaction_date_awal+"&transaction_date_akhir="+transaction_date_akhir+"&account_id="+account_id,
         success: function(response){ 
            $('.tabungan_tampil').html(response);
         }
       });

    }else{
      alert('Silakan Lengkapi dahulu !!');
    }
    
  }
 
</script>

 

 
