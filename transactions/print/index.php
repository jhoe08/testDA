<?php 
	include_once('../../header.php');
	$datas = '';
	if(isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] != "") {
		$id = $_SERVER['QUERY_STRING'];
		$id = explode("=", $id);
		$queries = (object) array('ref_id' => $id[1]);

		$datas = $database->getData2('remarks', $queries, NULL);

		// print_r($datas);	
	}
?>
<style type="text/css">
	#qrcode img {
		max-width: 120px;
		margin: auto 0 0 auto;
	}
</style>
<div class="transaction-print container mt-3">
	<div class="header row text-center">
		<table>
			<tbody>
				<tr>
					<td class="text-left">
						<p><strong>Name: </strong></p>
						<p><strong>PR Classification: </strong></p>
					</td>
					<td>
						<h3>Tracking Sheet / For Compliance</h3>
					</td>
					<td>
						<div id="qrcode" style=""></div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<table class="table table-striped">
	  <thead>
	    <tr>
	      <th scope="col" class="text-center" width="200">OFFICE/Person Responsible</th>
	      <th scope="col" width="25">Name</th>
	      <!-- <th scope="col" width="75"class="hide">Signature</th> -->
	      <th scope="col" class="text-center">Regiementary Period</th>
	      <th scope="col" class="text-center">
	      	Date
	      </th>
	      <th scope="col" class="text-center" width="300">Remarks</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php if (!$datas) { ?><tr><th class="text-center" colspan="6">NO RESULTS</th></tr><?php } ?>
	  	<?php if ($datas) {
	  		foreach ($datas as $key => $value) { ?>
	    <tr>
	      <th scope="row"><?php echo $value['user_id']; ?></th>
	      <td><?php echo $value['user_id']; ?></td>
	      <!-- <td class="hide"></td> -->
	      <td></td>
	      <td class="text-center">
	      	<?php echo date('F j, Y, g:i a',strtotime($value['timestamp'])); ?>
	      	—
	      	<?php if($key%2==0) { ?>
	      	<span class="badge text-bg-warning">In</span>
	      	<?php } else { ?>
	      	<span class="badge text-bg-info">Out</span>
	      	<?php } ?>
	     	</td>
	      <td><?php echo $value['message']; ?></td>
	    </tr>
	    <?php } } ?>
	  </tbody>
	</table>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script type="text/javascript">
	new QRCode("qrcode", "http://test.example.com/transactions/17003/");
</script>

<?php include_once('../../footer.php'); ?>