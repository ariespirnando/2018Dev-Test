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
        <form method="post" action="<?php echo $action ?>">
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
                <input type="hidden" name="itransaksi" value="<?php echo $itransaksi ?>" class="">
              </th>  
            </tr>
            <tr>
              <th width="5%" class="center">Tanggal Transaksi</th> 
              <th width="75%">
                <input readonly type="text" name="transaction_date" value="<?php echo $transaction_date ?>" class="form-control"> 
              </th>  
            </tr>
            <tr>
              <th width="5%" class="center">Description</th> 
              <th width="75%">
                <select name="ijenis" class="form-control ijenis" required>
                  <option value="">--------------------------</option> 
                  <?php 
                    foreach ($resjenis as $rj) {
                      ?>
                        <option value="<?php echo $rj['ijenis'] ?>"><?php echo $rj['description'].'['.$rj['debitcredit'].']' ?></option>
                      <?php 
                    }
                  ?>
                </select>  
              </th>  
            </tr> 
            <tr>
              <th width="5%" class="center">Amount</th> 
              <th width="75%">
                <input type="text" name="Amount" value="<?php echo $Amount ?>" class="form-control angka2" required> 
              </th>  
            </tr>
            <tr>
              <th width="5%">
               
              </th>  
              <th width="5%">
                 <button type="submit" class="btn btn-primary"><?php echo $btn ?></button> 
              </th> 
            </tr> 
          </thead> 
        </table>
        </form>
        <br>
         <table class="table table-striped table-bordered table-hover" width="90%">
          <thead>
            <tr>
              <th width="15%" class="center">Nama Nasabah</th> 
              <th width="15%"> Tanggal Transaksi </th>
              <th width="15%"> Deskripsi </th>
              <th width="15%"> Debit / Credit</th>
              <th width="15%"> Amount </th> 
              <th width="15%"> Hapus </th> 
            </tr>
          </thead>
          <tbody>
             <?php 
              foreach ($result as $r) {
                ?>
                  <tr> 
                    <td width="15%"><?php echo $r['name']?></td> 
                    <td width="15%"><?php echo $r['transaction_date']?></td> 
                    <td width="15%"><?php echo $r['description']?></td> 
                    <td width="15%"><?php echo $r['debitcredit']?></td> 
                    <td width="15%"><?php echo number_format($r['Amount'])?></td> 
                    <td width="15%"><a href="<?php echo base_url().'index.php/Transaksi/hapus/'.$r['itransaksi']?>">Hapus</a></td>  
                  </tr>
                <?php
              }
             ?>
          </tbody>
      </table>
			</div>
			<div class="hr hr2 hr-double"></div> 
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>

<script type="text/javascript">
  $(".angka2").keyup(function(){
    this.value = this.value.replace(/[^0-9\.]/g,"");
  })
  $(".angka2").css('text-align','right'); 
 s
</script>

 
