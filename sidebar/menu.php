
<nav class="list-group mt-3">
    <a class="list-group-item with-badge" href="/transactions">
        <i class="bi bi-list-columns-reverse"></i> View All Transactions
        <span class="badge badge-primary badge-pill"><?php echo $noofrecords; ?></span>
    </a>
    <a class="list-group-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearchRight" aria-controls="offcanvasSearchRight">
        <i class="bi bi-search"></i> Search Transactions
    </a>
    <?php if(isset($_SESSION['username'])) { ?>
    <a class="list-group-item" href="/transactions/create">
        <i class="bi bi-file-earmark-plus"></i> Create Transactions
    </a>
    <a class="list-group-item" href="#" type="button" data-bs-toggle="modal" data-bs-target="#registerTransactionsModal">
        <i class="bi bi-qr-code-scan"></i> Register Transactions
    </a>
    <?php } ?>
</nav>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasSearchRight" aria-labelledby="offcanvasLoginRightLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasLoginRightLabel">Search</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body d-flex flex-column align-items-center">
    <div class="modal-body">
        <div class="form-group">
          <span class="input-icon inverted">
            <input type="text" class="form-control fs-4" id="addTransactionsId" placeholder="Search Transaction ID">
            <i class="bi bi-qr-code-scan  fs-4"></i>
          </span>
        </div>
        <div id="itemListRegistered" class="mt-2"></div>
    </div>
    <div class="modal-footer hstack gap-3">
        <button type="button" class="btn " data-bs-dismiss="offcanvas" aria-label="Close">Close</button>
        <button type="button" class="btn btn-primary" name="registerTransaction" id="registerTransaction" data-refid="">Search Transactions</button>
      </div>
  </div>
</div>