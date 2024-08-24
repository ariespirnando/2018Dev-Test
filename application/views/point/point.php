<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        <div class="page-header">
					<h1>
						Point
						<small>s
							<i class="ace-icon fa fa-angle-double-right"></i>
							Nasabah - List Points
						</small>
					</h1>
				</div>
				<div class="pull-right"></div>
			</div>
			<div>
        <table class="table table-striped table-bordered table-hover" width="90%">
          <thead> 
            <tr>
              <th width="5%" class="center">No</th> 
              <th width="45%" class="center">Nama Nasabah</th> 
              <th width="44%" class="center">Total Point</th>  
              <th width="5%" class="center">Detail</th> 
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
                    <td width="40%">
                      <?php 
                        $sqPulsa = "SELECT t.Amount, j.ijenis  FROM transaksi t 
                        JOIN nasabah n on n.account_id = t.account_id
                        JOIN jenis_transaksi j on j.ijenis = t.ijenis 
                        WHERE j.ijenis =2 AND n.account_id = '".$r['account_id']."'
                        ORDER BY t.itransaksi";
                        $dtFo = $this->db->query($sqPulsa)->result_array(); 

                        $poinpulsa = 0;
                        foreach ($dtFo as $df) {
                          $nilai = $df['Amount'];
                          $poin =0;
                          if($df['Amount']>30000){
                            $nilai = $df['Amount'] - 30000;  
                            $poin1  = ($nilai /1000) * 2;   
                            $nilai = $df['Amount'] - $nilai - 10000;  
                            $poin2 = ($nilai/1000) * 1;   
                            $poin = $poin1+$poin2;
                          }else if($df['Amount']>10000){  
                            $nilai = $df['Amount'] - 10000;
                            $poin  = ($nilai /1000) * 1;  
                          }else{ 
                            $poin = 0;
                          } 
                          $poinpulsa += $poin; 
                        } 
 

                        $sqPulsa = "SELECT t.Amount, j.ijenis  FROM transaksi t 
                        JOIN nasabah n on n.account_id = t.account_id
                        JOIN jenis_transaksi j on j.ijenis = t.ijenis 
                        WHERE j.ijenis =3 AND n.account_id = '".$r['account_id']."'
                        ORDER BY t.itransaksi";
                        $dtFo = $this->db->query($sqPulsa)->result_array(); 
                        $poinListrik = 0;
                        foreach ($dtFo as $df) {
                          $nilai = $df['Amount'];
                          $poin =0;
                          if($df['Amount']>100000){
                            $nilai = $df['Amount'] - 100000;  
                            $poin1  = ($nilai /2000) * 2;   
                            $nilai = $df['Amount'] - $nilai - 50000;  
                            $poin2 = ($nilai/2000) * 1;  
                            $poin = $poin1+$poin2;
                          }else if($df['Amount']>50000){   
                            $nilai = $df['Amount'] - 50000;
                            $poin  = ($nilai /2000) * 1;  
                          }else{
                             $poin = 0; 
                          } 
                          $poinListrik += $poin; 
                        }

                        echo $poinpulsa + $poinListrik;
                      ?>       
                    </td> 
                    <td><a href="<?php echo base_url().'index.php/Point/detail/'.$r['account_id']?>">Detail</a></td>  
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
