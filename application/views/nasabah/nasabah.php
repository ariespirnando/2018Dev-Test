<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        <div class="page-header">
					<h1>
						Nasabah
						<small>
							<i class="ace-icon fa fa-angle-double-right"></i>
							Nasabah - List Data
						</small>
					</h1>
				</div>
				<div class="pull-right"></div>
			</div>
			<div>
        <table class="table table-striped table-bordered table-hover" width="90%">
          <thead>
            <tr>
              <th colspan="4" "><a href="<?php echo base_url().'index.php/Nasabah/Add'?>" class="btn btn-primary"> Add </a></th>  
            </tr>
            <tr>
              <th width="5%" class="center">No</th> 
              <th width="75%" class="center">Nama Nasabah</th> 
              <th width="5%" class="center">Edit</th> 
              <th width="5%" class="center">Hapus</th>  
            </tr>
          </thead>
          <tbody>
             <?php
              $i = 1;
             	foreach ($result as $r) {
             		?>
             			<tr>
             				<td width="10%"><?php echo $i++ ?></td>
                    <td width="40%"><?php echo $r['name']?></td> 
                    <td width="5%"><a href="<?php echo base_url().'index.php/Nasabah/edit/'.$r['account_id']?>">Edit</a></td> 
                    <td width="5%"><a href="<?php echo base_url().'index.php/Nasabah/hapus/'.$r['account_id']?>">Hapus</a></td> 
             			</tr>
             		<?php
             	}
             ?>
          </tbody>
        </table>
        <br>
			</div>
			<div class="hr hr2 hr-double"></div>
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>
