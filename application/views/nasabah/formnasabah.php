<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        <div class="page-header">
					<h1>
						Nasabah
						<small>
							<i class="ace-icon fa fa-angle-double-right"></i>
							Nasabah - Add Data
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
                <input type="text" name="name" value="<?php echo $name ?>" class="form-control">
                <input type="hidden" name="id" value="<?php echo $id ?>" class="">
              </th> 
              <th width="5%">
                <button type="submit" class="btn btn-primary"><?php echo $btn ?></button>
              </th>  
              <th width="5%">
                <a href="<?php echo base_url().'index.php/Nasabah'?>" class="btn btn-warning">Back</a>
              </th>  
            </tr>
          </thead> 
        </table>
        </form>
        <br>
			</div>
			<div class="hr hr2 hr-double"></div>
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>
