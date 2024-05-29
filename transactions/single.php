<!-- Transactions: single.php -->
<link rel="stylesheet" href="/assets/css/transactions-id.css">

<div class="container bootdey pt-3">
	<!-- <?php include_once('../breadcrumb.php'); ?> -->
	<div class="content">
		<?php 
			if($datas == NULL) {
				header('Location: /404.php	');
		 		exit();
  		}
			foreach ($datas as $key => $data) { 
			// $budget = (int) $data['approved_budget'];
				$budget = $data['approved_budget'];
			// print_r($data['approved_budget']);
			// $budget = number_format($budget);
		?>
		<div id="pad-wrapper" class="row">
		    <div class="col-md-4">
			    <div class="panel panel-default">
				    <div class="panel-heading d-flex align-items-center">
				    	<strong>Details | Transaction ID: <?php echo $id[1]; ?></strong>
				    	<div class="dropdown ms-auto">
	              <button data-bs-toggle="dropdown" href="#" class="btn" aria-expanded="false">
	              	<i class="bi bi-gear-fill"></i>
	        			</button>
	              <div class="dropdown-menu dropdown-menu-end" style="">
	                <a href="#" class="dropdown-item updateBtn" type="button" data-bs-toggle="modal" data-bs-target="#postRemarksModal"><i class="bi bi-pencil-square"></i> Update Transaction</a>
	                <hr>
	                <a id="delete-<?php echo $value['id']; ?>" href="#" class="dropdown-item text-danger deleteBtn" data-id="<?php echo $value['id']; ?>" data-userId="<?php echo $value['user_id']; ?>"><i class="bi bi-trash"></i> Delete Transaction</a>
	              </div>
	            </div>

				    </div>
					    <div class="panel-body no-padding">
				        <div class="ibox-content no-padding border-left-right">
				            <div class="qrcode pt-3" id="transId<?php echo $id[1]; ?>"></div>
				        </div>
				        <div class="ibox-content profile-content">
				            
									<h5><strong>Bid Notice Title</strong></h5>
									<p><?php echo $data['bid_notice_title']; ?></p>

				            <p class="display-flex align-center">
				            	<i class="fs-4 bi bi-person-circle"></i> <?php echo $data['requisitioner']; ?>
				            	<em class="float-right">, <?php echo $data['division']; ?></em>
				           	</p>
				            <p class="display-flex align-center"><i class="fs-4 bi bi-tag-fill"></i> <?php echo $data['pr_classification']; ?></p>
				            <p class="display-flex align-center"><i class="fs-4 bi bi-file-earmark-code-fill"></i> <?php echo $data['trans_code']; ?></p>
				            
				            <p class="display-flex align-center"><i class="fs-4 bi bi-wallet2"></i> <?php echo "₱".$budget; ?></p>
				            <p class="display-flex align-center">
				            	<i class="fs-4 bi bi-collection"></i> <?php echo $data['bac_unit']; ?>
				            	<em class="ml-3 float-right badge rounded-pill text-bg-secondary" style="margin-left: 10px;"><?php echo $data['banner_program']; ?></em>
				            </p>
				            <p class="display-flex align-center"><i class="fs-4 bi bi-bank"></i> <?php echo $data['fund_source']; ?></p>

				            <div class="user-button">
			                <div class="row">
		                    <div class="col-md-6">
		                    <button type="button" class="btn btn-print btn-primary btn-sm btn-block" data-href="/transactions/print/?id=<?php echo $id[1]; ?>">
		                        <i class="bi bi-printer"></i> Print </button>
		                    </div>
			                </div>
				            </div>
				        </div><!-- /profile-content -->
					    </div>
				    </div>
			    </div>
		    
		    <div class="col-md-8">
			    <div class="panel panel-default">
				    <div class="panel-heading d-flex  align-items-center">
				    	<strong>Remarks</strong> 
				    	<a href="#" class="ms-auto addBtn btn btn-primary btn-sm float-right"  data-bs-toggle="modal" data-bs-target="#postRemarksModal"><i class="bi bi-plus-circle"></i> Add Remarks</a>
				    </div>
					    <div class="panel-body">
					        
					        <div class="ibox-content">
					           <div class="feed-activity-list">

					                <div class="feed-element" id="<?php echo $data['product_id']; ?>">
				                    <a href="#" class="pull-left">
				                    	<img alt="image" class="img-circle" src="/assets/images/avatar1.png">
				                    </a>

				                    <div class="media-body ">
			                        <strong><?php echo $data['requisitioner']; ?></strong> from <strong><?php echo $data['division']; ?></strong>.<br>
			                        <small class="text-muted"><?php echo date('F j, Y, g:i a',strtotime($data['pr_date'])); ?> — <span class="badge rounded-pill text-bg-info text-uppercase">Dispatch</span></small>
			                        
			                        <div class="well"><strong>REMARKS: </strong><?php echo $data['remarks']; ?></div>
                              <!-- <?php echo date('l jS \of F Y h:i:s A'); ?> -->
				                    </div>
					                </div><!-- feed-element-->
					                <?php 
					                	$remarks = $database->getRemarks($id[1]);
					                	if($remarks) {
					                		foreach ($remarks as $key => $value) {
					                	
					                ?>
					                 <div class="feed-element" id="remarks-<?php echo $value['id']; ?>">
					                    <a href="#" class="pull-left">
					                    	<img alt="image" class="img-circle" src="/assets/images/avatar1.png">
					                    </a>

					                    <div class="media-body ">
					                        <!-- <small class="pull-right text-navy">5m ago</small> -->
					                        <strong><?php echo $value['user_id']; ?></strong> from <strong></strong>.<br>
					                        <small class="text-muted"><?php echo date('F j, Y, g:i a',strtotime($value['timestamp'])); ?>
					                        	
					                        	<!-- <?php echo $key ."-".$key%2;  ?> -->
					                        	— <?php if($key%2==0) { ?>
					                        		<span class="badge rounded-pill text-bg-success text-uppercase">Check In</span> 
					                        	<?php } else { ?>
					                        		<span class="badge rounded-pill text-bg-warning text-uppercase">Check Out</span>
					                        	<?php } ?>

					                        </small>
					                        <div class="dropdown float-right">
                                    <button data-bs-toggle="dropdown" href="#" class="btn p-1" aria-expanded="false">
                                    	<i class="bi bi-list"></i>
                              			</button>
                                    <div class="dropdown-menu dropdown-menu-end" style="">
	                                    <a href="#" class="dropdown-item updateBtn" type="button" data-bs-toggle="modal" data-bs-target="#postRemarksModal"><i class="bi bi-pencil-square"></i> Update Remarks</a>
	                                    <hr>
	                                    <a id="delete-<?php echo $value['id']; ?>" href="#" class="dropdown-item text-danger deleteBtn" data-id="<?php echo $value['id']; ?>" data-userId="<?php echo $value['user_id']; ?>"><i class="bi bi-trash"></i> Delete Remarks</a>
                                    </div>
                                  </div>
					                        <div class="well">
				                        		<strong>REMARKS: </strong>
				                        		<div class="msg asd"><?php echo isset($value['message']) ? $value['message'] : "&nbsp;"; ?></div>
			                        		</div>
                                  <!-- <?php echo date('l jS \of F Y h:i:s A'); ?> -->
					                    </div>
					                </div><!-- feed-element-->
					                <?php } } ?>
							
							<button class="addBtn btn btn-primary btn-block fullwidth" type="button" data-bs-toggle="modal" data-bs-target="#postRemarksModal">
								<i class="bi bi-plus-circle"></i> Add Remarks
							</button>

					        </div><!-- feed-activity-list -->
					    </div><!--ibox-content -->
				    </div>
			    </div>
	    </div>


	    <div class="clearfix"></div>
	  </div>
	  <?php } ?> 
</div>
<!-- Modal -->
<div class="modal fade" data-method="POST" id="postRemarksModal" tabindex="-1" aria-labelledby="postRemarksModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="postRemarksModalLabel">New Remarks</h1>
        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="save" action="save.php" method="post">
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text" name="posts"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" name="close" id="closeBtn">Close</button>
        <button type="button" class="btn btn-primary" name="post_remarks" id="post_remarks" data-refid="<?php echo $id[1]; ?>">Post Remarks</button>
        <button type="button" class="btn btn-primary" name="update_remarks" id="update_remarks" data-refid="<?php echo $id[1]; ?>">Update Remarks</button>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript">
	let { origin } = window.location;
	new QRCode("transId<?php echo $id[1]; ?>", origin+"/transactions/?id=<?php echo $id[1]; ?>");
</script>