<table class="table table-striped table-bordered table-hover" width="90%">
  <thead> 
    <tr>
      <th width="18%" class="center">Transaksi Date</th> 
      <th width="18%" class="center">Description</th> 
      <th width="18%" class="center">Credit</th> 
      <th width="18%" class="center">Debit</th>  
      <th width="18%" class="center">Balance</th>  
    </tr>
  </thead>
  <tbody>
     <?php 
     	foreach ($result as $r) {
     		?>
     			<tr> 
            <td width="18%"><?php echo $r['transaction_date']?></td>  
            <td width="18%"><?php echo $r['description']?></td>
            <?php 
              if($r['debitcredit']=="C"){
                  $saldo += $r['Amount'];
                ?>
                  <td width="18%"><?php echo number_format($r['Amount']) ?></td>
                  <td width="18%">-</td>
                <?php
              }else{
                 $saldo -= $r['Amount'];
                ?> 
                  <td width="18%">-</td>
                  <td width="18%"><?php echo number_format($r['Amount']) ?></td>
                <?php
              } 
            ?> 
            <td width="18%"><?php echo number_format($saldo) ?></td>
     			</tr>
     		<?php
     	}
     ?>
  </tbody>
</table>
