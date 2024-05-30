<!-- Modal -->
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
                <span class="badge text-bg-light fs-6">17017</span>
                <span class="badge text-bg-light fs-6">17124</span>
            </div>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Remarks:</label>
            <div class="form-group">
                <textarea type="text" class="form-control fs-4" id="addTransactionsRemarks"></textarea>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="automateRemarks" name="automateRemarks">
              <label class="form-check-label" for="automateRemarks">
                Automate Remarks
              </label>
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