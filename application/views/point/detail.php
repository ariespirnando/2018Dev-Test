<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        <div class="page-header">
					<h1>
						Point
						<small>
							<i class="ace-icon fa fa-angle-double-right"></i>
							Point - Detail [<?php echo $nasabah['name']?>]
						</small>
					</h1>
				</div>
				<div class="pull-right"></div>
			</div>
			<div>
        <table class="table table-striped table-bordered table-hover" width="90%">
          <thead>  
            <tr>
              <th width="2%" class="center">No</th> 
              <th width="10%" class="center">Tanggal Transaksi</th> 
              <th width="5%" class="center">Transaksi</th> 
              <th width="5%" class="center">Amount</th> 
              <th width="30%" class="center">Detail Perhitungan</th>   
            </tr>
          </thead>
          <tbody>
    
            <?php
              $i = 1;
              $poinpulsa = 0;
              foreach ($result1 as $df) {
                ?>
                  <tr>
                    <td width="2%"><?php echo $i++ ?></td>
                    <td width="10%"><?php echo $df['transaction_date'] ?></td>
                    <td width="5%"><?php echo $df['description'] ?></td>
                    <td width="5%"><?php echo number_format($df['Amount']) ?></td>    
                    <td width="30%">
                      <?php  
                          $nilai = $df['Amount'];
                          $poin =0;
                          if($df['Amount']>30000){
                            $nilai = $df['Amount'] - 30000;  
                            $poin1  = ($nilai /1000) * 2;  
                            echo '* > 30000 :'.$nilai.'/ 1000 * 2 ='.$poin1.'<br>'; 
                            $nilai = $df['Amount'] - $nilai - 10000;  
                            $poin2 = ($nilai/1000) * 1; 
                            echo '* 10001 - 30000 :'.$nilai.'/ 1000 * 1 ='.$poin2.'<br>';
                            echo '* 0 - 1000 = 10000 /1000 * 0 = 0'; 
                            $poin = $poin1+$poin2;
                          }else if($df['Amount']>10000){ 
                            echo '* > 30000 :0 / 1000 * 2 =0<br>'; 
                            $nilai = $df['Amount'] - 10000;
                            $poin  = ($nilai /1000) * 1; 
                            echo '* 10001 - 30000 :'.$nilai.'/ 1000 * 1 ='.$poin.'<br>';
                            echo '* 0 - 10000 = 10000 /1000 * 0 = 0'; 
                          }else{
                             echo '* > 30000 = 0 / 1000 * 2 =0<br>';
                             echo '* 10001 - 30000 = 0 / 1000 * 1 =0<br>';
                             echo '* 0 - 1000 = '.$df['Amount'].' /1000 * 0 = 0'; 
                          } 
                          $poinpulsa += $poin; 
                      ?>       
                    </td>  
                  </tr>
                <?php
              }
             ?> 
             <tr>
               <td colspan="5" style="text-align: right;">
                 <?php echo $poinpulsa ?>
               </td>
             </tr>

              <?php
              $i = 1;
              $poinListrik = 0;
              foreach ($result2 as $df) {
                ?>
                  <tr>
                    <td width="2%"><?php echo $i++ ?></td>
                    <td width="10%"><?php echo $df['transaction_date'] ?></td>
                    <td width="5%"><?php echo $df['description'] ?></td>
                    <td width="5%"><?php echo number_format($df['Amount']) ?></td>    
                    <td width="30%">
                      <?php  
                          $nilai = $df['Amount'];
                          $poin =0;
                          if($df['Amount']>100000){
                            $nilai = $df['Amount'] - 100000;  
                            $poin1  = ($nilai /2000) * 2;  
                            echo '* > 100000 :'.$nilai.'/ 2000 * 2 ='.$poin1.'<br>'; 
                            $nilai = $df['Amount'] - $nilai - 50000;  
                            $poin2 = ($nilai/2000) * 1; 
                            echo '* 50001 - 100000 :'.$nilai.'/ 2000 * 1 ='.$poin2.'<br>';
                            echo '* 0 - 50000 = 50000 /2000 * 0 = 0'; 
                            $poin = $poin1+$poin2;
                          }else if($df['Amount']>50000){ 
                            echo '* > 100000 :0 / 2000 * 2 =0<br>'; 
                            $nilai = $df['Amount'] - 50000;
                            $poin  = ($nilai /2000) * 1; 
                            echo '* 50001 - 100000 :'.$nilai.'/ 2000 * 1 ='.$poin.'<br>';
                            echo '* 0 - 50000 = 50000 /2000 * 0 = 0'; 
                          }else{
                             echo '* > 30000 = 0 / 2000 * 2 =0<br>';
                             echo '* 50001 - 100000 = 0 / 2000 * 1 =0<br>';
                             echo '* 0 - 50000 = '.$df['Amount'].' /2000 * 0 = 0'; 
                          } 
                          $poinListrik += $poin; 
                      ?>       
                    </td>  
                  </tr>
                <?php
              }
             ?> 
             <tr>
               <td colspan="5" style="text-align: right;">
                 <?php echo $poinListrik ?>
               </td>
             </tr>
          </tbody>
        </table>
        <br>
			</div>
			<div class="hr hr2 hr-double"></div>
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>
