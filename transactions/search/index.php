<?php include_once('../../header.php'); 
  $query = (object) array("product_id"=>17017);
  $datas = $database->getData2('transid',$query, NULL);
?>

<link rel="stylesheet" href="/assets/css/transactions.css">
<link rel="stylesheet" href="/assets/css/pagination.css">

<div class="container pt-3">
    <div class="row">
        <?php include_once('../../sidebar/main.php'); ?>
        <div class="col-9 mb-3 mb-lg-5">
            <div class="overflow-hidden card table-nowrap table-card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Search Transactions</h5>
                </div>

                <div class="form-group p-1">
                    <span class="input-icon inverted hasSearchBtn">
                        <input type="text" class="form-control fs-4" id="addTransactionsId">
                        <i class="bi bi-qr-code-scan  fs-4"></i>
                        <button type="submit" class="btn btn-primary fs-4"><i class="bi bi-search fs-4"></i> Search</button>
                    </span>
                </div>

                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="small text-uppercase bg-body text-muted">
                            <tr>
                                <th class="text-center">QR Code</th>
                                <th>PR Classification</th>
                                <th  style="min-width: 160px;">Approved Budget</th>
                                <th>PR Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                            if(!isset($datas)) { ?>
                            <tr class="align-middle text-center">
                                <td colspan="6">No Records Found!</td>
                            </tr>  
                            <?php exit(); } else {
                                     
                            foreach ($datas as $key => $data) { 
                            $budget = $data['approved_budget'];
                            ?>
                            <tr class="align-middle">
                                <td><div id="transid-<?php echo $data['product_id'];?>" class="qrcode"></td>
                                <td class="col-sm-6">
                                  <div class="">
                                    <h4><?php echo $data['pr_classification']; ?>, <small><em><?php echo $data['bac_unit']; ?></em></small></h4>
                                        <div class="d-flex align-items-center text-italic fst-italic">
                                            <span class="me-2">by </span>
                                            <img src="/assets/images/avatar<?php echo(rand(1,8)); ?>.png" class="avatar sm rounded-pill me-3 flex-shrink-0" alt="Customer">
                                            <div>
                                                <div class="h6 mb-0 lh-1"><?php echo  $data['requisitioner']; ?>, <small><?php echo $data['division']; ?></small></div>
                                            </div>
                                        </div>
                                    <p><?php echo $data['bid_notice_title']; ?></p>
                                    <p class="blockquote-footer"><strong>Remarks: </strong><?php echo $data['remarks']; ?></p>
                                  </div>
                                </td>
                                <td><span><?php echo '₱'.$budget; ?></span></td>
                                <td>
                                  <?php echo date('M j, Y', strtotime($data['pr_date'])); ?>
                                  <?php 
                                    $query = (object) array("ref_id"=>$data['product_id']);
                                    $remarks = $database->countItems('remarks', 'ref_id', $query) % 2;
                                    // echo $remarks;
                                    echo $remarks ? '<span data-count="'.$remarks.'" class="badge rounded-pill text-bg-warning text-uppercase">Received</span>' : '<span class="badge rounded-pill text-bg-success text-uppercase">Dispatch</span>'; 
                                  ?>
                                </td>
                                <td class="text-center">
                                  <div class="dropdown">
                                    <a data-bs-toggle="dropdown" href="#" class="btn p-1" aria-expanded="false">
                                      <i class="bi bi-list"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                        <a href="/transactions/?id=<?php echo $data['product_id']; ?>" class="dropdown-item">
                                          <i class="bi bi-eye"></i> View Details</a>
                                        <a href="print/?id=<?php echo $data['product_id']; ?>" class="dropdown-item">
                                          <i class="bi bi-printer"></i> Print</a>
                                        <hr>
                                        <a href="#!" class="dropdown-item text-danger"><i class="bi bi-trash"></i> Delete Transactions</a>
                                    </div>
                                  </div>
                                </td>
                            </tr>
                          <?php } } ?>

                        </tbody>
                    </table>

                    <nav aria-label="Page navigation example" class="text-center">
                      <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                          <a class="page-link">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#">Next</a>
                        </li>
                      </ul>
                    </nav>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" data-method="POST" id="registerTransactionsModal" tabindex="-1" aria-labelledby="registerTransactionsModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="registerTransactionsModalLabel">Register Transactions</h1>
        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- <form method="post"> -->
            <p><?php echo isset($_SESSION['username']) ? 'Hey, '.$_SESSION['username']:'User not found!'; ?></p>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Items:</label>
            <div class="form-group">
                <span class="input-icon inverted">
                    <input type="text" class="form-control fs-4" id="addTransactionsId">
                    <i class="bi bi-qr-code-scan  fs-4"></i>
                </span>
            </div>
            <div id="itemListRegistered" class="mt-2">
                <span class="badge text-bg-light fs-6">12345</span>
                <span class="badge text-bg-light fs-6">13452</span>
            </div>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Remarks:</label>
            <div class="form-group">
                <textarea type="text" class="form-control fs-4" id="addTransactionsRemarks"></textarea>
            </div>
          </div>
        <!-- </form> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" name="close" id="closeBtn">Close</button>
        <button type="button" class="btn btn-primary" name="registerTransaction" id="registerTransaction" data-refid="">Register Transactions</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="/assets/js/transactions.js"></script>

<?php include_once('../../footer.php') ?>