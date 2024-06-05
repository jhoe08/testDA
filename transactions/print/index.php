<?php 
	include_once('../../header.php');
	$datas = '';
	if(isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] != "") {
		$id = $_SERVER['QUERY_STRING'];
		$id = explode("=", $id);
		$queries = (object) array('product_id' => $id[1]);

		$transaction = $database->getTransactions($queries, NULL);
		$transaction = $transaction[0];
		$remarks = $database->getRemarks($id[1]);
		$remarks = ($remarks != null) ? $remarks : 0;
		// var_dump($remarks);
		
	}
?>
<link rel="stylesheet" type="text/css" href="/assets/css/transaction-print.css">

<div class="transaction-print container mt-3">
	<div><a class="goback text-decoration-none text-secondary fs-6" href="/transactions/"><i class="bi bi-arrow-left-square"></i> Go Back</a></div>
	<div class="header text-center">
		<table class="container-fluid">
			<tbody>
				<tr>
					<th colspan="3" id="titleHead" class="align-top">
						<h3>Tracking Sheet / For Compliance</h3>
					</th>
				</tr>
				<tr>
					<td id="topHeadLeft" class="text-left">
						<p><strong>Name: </strong><?php echo $transaction['requisitioner']; ?></p>
						<p><strong>PR Classification: </strong> <?php echo $transaction['pr_classification']; ?></p>
					</td>
					
					<td id="topHeadRight " >
						<div id="qrcode" style=""></div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<table class="table table-striped">
	  <thead>
	    <tr>
	      <th scope="col" class="text-center align-middle" width="300">OFFICE/Person Responsible</th>
	      <th scope="col" class="text-center align-middle text-uppercase" width="100">Name</th>
	      <th scope="col" class="text-center align-middle text-uppercase" width="75"class="hide">Signature</th>
	      <th scope="col" class="text-center align-middle" width="150">Regiementary Period</th>
	      <th scope="col" class="text-center align-middle text-uppercase" width="350">
	      	Date
	      	<div class="row hidden">
				    <div class="col">IN</div>
				    <div class="col">OUT</div>
				  </div>
	      </th>
	      <th scope="col" class="text-center align-middle text-uppercase" width="300">Remarks</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php if (!$remarks) { ?><tr><th class="text-center" colspan="6">NO REMARKS</th></tr><?php } ?>
	  	<?php if ($remarks) {
	  		$checkIn = [];
	  		$count = 0;

	  		foreach ($remarks as $key => $value) { $count++; 
	  			
	  		?>
	    <tr data-key="<?php echo $key; ?>">
	      <td scope="row"><?php echo $count.'. '; ?></td>
	      <td></td>
	      <td></td>
	      <td></td>
	      <td class="text-center">
	      	<small>
	      	<?php echo date('m/d/Y',strtotime($value['timestamp'])); ?><br>
	      	<?php echo date('g:i a', strtotime($value['timestamp'])); ?>
	      	<!-- -
	      	<?php if($key%2==0) { ?>
	      	<span class="badge text-bg-warning text-uppercase">In</span>
	      	<?php } else { ?>
	      	<span class="badge text-bg-info text-uppercase">Out</span>
	      	<?php } ?> -->
	      	</small>
	     	</td>
	      <td>: <?php echo $value['message']; ?></td>
	    </tr>
	    <?php } } ?>

	    <?php if($remarks) { 
	    	$countRemarks = count($remarks);
	    	for ($i=$countRemarks; $i <= 30; $i++) { ?>
    	<tr>
	    	<td><?php echo $i; ?>.</td>
	    	<td></td>
	    	<td></td>
	    	<td></td>
	    	<td></td>
	    	<td></td>
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