<link rel="stylesheet" href="/assets/css/transactions.css">
<link rel="stylesheet" href="/assets/css/pagination.css">
<?php
  $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

  $total = $database->countItems('transid');
  // $perPage = 5;
  $totalPages = $total / $perPage;
  $noofrecords = $total;
  // 01 - 20; 21 - 40; 31 - 60;
  $showPages = (($currentPage - 1) * $perPage + 1) ."-".($perPage * $currentPage); 
?>
<div class="container pt-3" data-totalPage="<?php echo $totalPages; ?>">
    <!-- <?php include_once('../breadcrumb.php'); ?> -->
    <div class="row">
        <?php include_once('../sidebar/main.php'); ?>
        <div class="col-9 mb-3 mb-lg-8">
            <div class="overflow-hidden card table-nowrap table-card">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">All Transactions</h5>
                  <div class="records">Showing: <b><?php echo $showPages; ?></b> of <b><?php echo $total; ?></b> result</div>
                  <div class="result-views">
                    <button type="button" class="btn btn-soft-base btn-icon active">
                        <i class="bi bi-list-ul"></i>
                    </button>
                    <button type="button" class="btn btn-soft-base btn-icon">
                        <i class="bi bi-grid"></i>
                    </button>
                  </div>
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
                                <td colspan="4">No Records Found!</td>
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
                                        <a href="?id=<?php echo $data['product_id']; ?>" class="dropdown-item">
                                          <i class="bi bi-eye"></i> View Details</a>
                                        <a href="print/?id=<?php echo $data['product_id']; ?>" class="dropdown-item">
                                          <i class="bi bi-printer"></i> Print</a>
                                        <?php if(isset($_SESSION['username'])) { ?>
                                          <hr>
                                          <a data-id="<?php echo $data['product_id']; ?>" type="button" href="#!" class="deleteTransaction dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#transactionDeleteModal"><i class="bi bi-trash"></i> Delete Transactions</a>
                                        <?php } ?>
                                    </div>
                                  </div>
                                </td>
                            </tr>
                          <?php } } ?>
                        </tbody>
                    </table>
                  <?php 
                    $previous = ($currentPage != 1) ? $currentPage - 1 : $currentPage;
                    $next = ($currentPage != $totalPages) ? $currentPage + 1 : $currentPage;
                  ?>
                  <nav aria-label="Page navigation example" class="text-center">
                    <ul class="pagination">
                      <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $previous; ?>" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                        </a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $previous; ?>" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                        </a>
                      </li>
                      <?php for ($page=1; $page <= $totalPages; $page++) { ?>
                      <li class="page-item <?php echo $currentPage == $page ? 'active' : ''; ?>"><a class="page-link" href="?page=<?php echo  $page; ?>"><?php echo  $page; ?></a></li>
                      <?php } ?>                        
                      <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $next; ?>" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                        </a>
                      </li>
                    </ul>
                  </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once('../modal/transaction-delete.php'); ?>

<script type="text/javascript" src="/assets/js/transactions.js"></script>
<script type="text/javascript" src="/assets/js/pagination.js"></script>