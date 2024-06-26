<?php include_once('../../header.php');
  
  if(!isset($_SESSION['username'])) { header('Location: /transactions'); }
  $query = isset($_SERVER['QUERY_STRING']) ? explode('id=', $_SERVER['QUERY_STRING']) : false;
  $isUpdate = count(array_filter($query));
  if($isUpdate) {
    $backLink = '/transactions/?id='.$query[1];
    $queries = (object) array("product_id" => $query[1]);
    $data = $database->getTransactions($queries, NULl);
    $data = $data[0];

    $budget = preg_replace('|[^0-9]|i', '', $data['approved_budget']);
    $budget = (int) $budget;

    $requisitioner = $data['requisitioner'] ? $data['requisitioner'] : '';
  } else {
    $requisitioner = false;
    $backLink = '/transactions/';
  }
?>

<div class="container pt-3">
  <div class="mb-3"><a class="goback text-decoration-none text-secondary fs-6" href="<?php echo $backLink; ?>"><i class="bi bi-arrow-left-square"></i> Go Back</a></div>
  <div class="row">

    <?php include_once('../../sidebar/main.php'); ?>
    <div class="col-9 mb-3 mb-lg-5">
      
      <!-- Title -->
    <div class="d-flex justify-content-between align-items-lg-center py-3 flex-column flex-lg-row">
      <h2 class="h5 mb-3 mb-lg-0">
        <a href="/transactions" class="text-muted hidden">
          <i class="bi bi-arrow-left-square me-2"></i>
        </a> Create new Transaction</h2>
      <div class="hstack gap-3">
        <button class="btn btn-light btn-sm btn-icon-text fs-6 hidden">
          <i class="bi bi-x"></i> <span class="text">Cancel</span></button>
        <button class="btn btn-secondary btn-sm btn-icon-text fs-6 hidden" id="loadPsuedoData">
          <i class="bi bi-file-text"></i> <span class="text">Load Data</span></button>
        <button type="submit" class="btn btn-primary btn-sm btn-icon-text fs-6" id="<?php echo $isUpdate ?'updateTransaction':'createTransaction'; ?>" data-id="<?php echo $query[1];?>">
          <i class="bi bi-file-earmark-plus"></i> <span class="text"><?php echo $isUpdate ?'Update':'Create' ?></span></button>
      </div>
    </div>

    <!-- Main content -->
    <div class="row needs-validation" novalidate>
      <!-- Left side -->
      <div class="col-lg-8">
        <!-- Basic information -->
        <div class="card mb-4">
          <div class="card-body">
            <h3 class="h6 mb-4">Requisitioner</h3>
            <div class="row">
              <div class="col-lg-6 hidden">
                <label class="form-label">First name</label>
                <input type="text" class="form-control" id="firstname" required>
              </div>
              <div class="col-lg-6 hidden">
                <label class="form-label">Last name</label>
                <input type="text" class="form-control" id="lastname" required>
              </div>
              <div class="col-lg-12">
                <label class="form-label">Full name</label>
                <input type="text" class="form-control" id="fullname" value="<?php echo $requisitioner; ?>" required <?php echo $requisitioner ? 'readonly disabled' :''; ?>>
              </div>
            </div>
          </div>
        </div>
        <!-- Address -->
        <div class="card mb-4">
          <div class="card-body">
            <h3 class="h6 mb-4">Transaction Details</h3>
            <div class="mb-3">
              <label class="form-label">Notice Title</label>
              <input value="<?php echo ($isUpdate && $data['bid_notice_title']) ? $data['bid_notice_title']:''; ?>" type="text" class="form-control" id="noticetitle" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Fund Source</label>
              <input value="<?php echo ($isUpdate && $data['fund_source']) ? $data['fund_source']:''; ?>" type="text" class="form-control" id="fundsource">
            </div>
            <div class="mb-3">
              <label class="form-label">Approved Budget</label>
              <div class="input-group ">
                <span class="input-group-text">₱</span>
                <input data-inputmask="'mask':'xx-xxxxxxx'" value="<?php echo ($isUpdate && $data['approved_budget']) ? $budget:''; ?>" type="number" class="form-control" id="approvedbudget" required>
                <span class="input-group-text">.00</span>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label class="form-label">Classification</label>
                  <select class="form-select" id="classification" required>
                    <option value="" selected="">Draft</option>
                    <?php foreach (PR_CLASSIFICATION as $key => $value) { ?>
                      <option <?php echo ($isUpdate && $data['pr_classification'] === $value) ? 'selected':''; ?> value="<?php echo $value; ?>"><?php echo $value; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label class="form-label">Banner Program</label>
                  <select class="form-select" id="bannerprogram">
                    <option value="Others">Others</option>
                    <?php foreach (BANNER_PROGRAM as $key => $value) { ?>
                      <option <?php echo ($isUpdate && $data['banner_program'] === $value) ? 'selected':''; ?> value="<?php echo $value; ?>"><?php echo $value; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
      <!-- Right side -->
      <div class="col-lg-4">
        <!-- Status --> 
        <div class="card mb-4">

          <div class="card-body">
            <h3 class="h6 mb-4">Unit</h3>
            <div class="">
              <label class="form-label">BAC</label>
              <select class="form-select" id="bacunit">
                <option value="draft" selected="">Draft</option>
                <?php foreach (BAC_UNIT as $key => $value) { ?>
                  <option <?php echo ($isUpdate && strtoupper($data['bac_unit']) === $value) ? 'selected':''; ?> value="<?php echo $value; ?>"><?php echo $value; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
        <!-- Notes -->
        <div class="card mb-4">
          <div class="card-body">
            <h3 class="h6">Remarks</h3>
            <textarea class="form-control" rows="3" id="remarks" required><?php echo ($isUpdate && $data['remarks']) ? $data['remarks']:''; ?></textarea>
          </div>
        </div>
        <!-- Notification settings -->
        <div class="card mb-4">
          <div class="card-body">
            <h3 class="h6 mb-4">Other Details</h3>
            <div class="mb-3">
              <label class="form-label">Codes</label>
              <input type="text" class="form-control" id="transcode" <?php echo $isUpdate ?'disabled':''; ?> value="<?php echo ($isUpdate && $data['trans_code']) ? $data['trans_code']:''; ?>">
            </div>
          </div>
        </div>
        <div class="card mb-4 hidden">
          <div class="card-body">
            <h3 class="h6">Notification Settings</h3>
            <ul class="list-group list-group-flush mx-n2">
              <li class="list-group-item px-0 d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <h6 class="mb-0">News and updates</h6>
                  <small>News about product and feature updates.</small>
                </div>
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" role="switch">
                </div>
              </li>
              <li class="list-group-item px-0 d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <h6 class="mb-0">Tips and tutorials</h6>
                  <small>Tips on getting more out of the platform.</small>
                </div>
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" role="switch" checked="">
                </div>
              </li>
              <li class="list-group-item px-0 d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <h6 class="mb-0">User Research</h6>
                  <small>Get involved in our beta testing program.</small>
                </div>
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" role="switch">
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    </div>

    
  </div>
</div>

<script type="text/javascript" src="/assets/js/transactions.js"></script>

<?php 
  include_once('../../modal/transaction-register.php');
  include_once('../../footer.php'); 
?>