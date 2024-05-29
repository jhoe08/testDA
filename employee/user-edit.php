   <div class="card mb-3">
    <div class="card-body">
      <h3>Personal Information</h3>
      <div class="tab-content">
        <div class="tab-pane active" id="details" role="tabpanel">
          <div class="row mb-3">
            <div class="col-sm-3">
              <h6 class="mb-0">Full Name</h6>
            </div>
            <div class="col-sm-9 text-secondary">
              <input type="text" class="form-control" value="John Smith Doe" readonly>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm-3">
              <h6 class="mb-0">Surname</h6>
            </div>
            <div class="col-sm-9 text-secondary">
              <input type="text" class="form-control" value="Doe">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm-3">
              <h6 class="mb-0">First Name</h6>
            </div>
            <div class="col-sm-9 text-secondary">
              <input type="text" class="form-control" value="John">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm-3">
              <h6 class="mb-0">Middle Name</h6>
            </div>
            <div class="col-sm-9 text-secondary">
              <input type="text" class="form-control" value="Smith">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm-3">
              <h6 class="mb-0">Name Extension</h6>
            </div>
            <div class="col-sm-9 text-secondary">
              <select class="form-select">
                <option value="none" selected="">N/A</option>
                <?php foreach (NAME_EXTENSION as $ext) { ?>
                  <option value="<?php echo $ext; ?>"><?php echo $ext; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm-3">
              <h6 class="mb-0">Date of Birth</h6> 
            </div>
            <div class="col-sm-9 text-secondary">
              <input type="date" class="form-control">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm-3">
              <h6 class="mb-0">Place of Birth</h6>
            </div>
            <div class="col-sm-9 text-secondary">
              <input type="text" class="form-control" value="">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm-3">
              <h6 class="mb-0">Sex</h6>
            </div>
            <div class="col-sm-9 text-secondary">
              <select class="form-select">
                <option value="none" selected="">Not to mention</option>
                <?php foreach (GENDER as $ext) { ?>
                  <option value="<?php echo $ext; ?>"><?php echo $ext; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm-3">
              <h6 class="mb-0">Civil Status</h6>
            </div>
            <div class="col-sm-9 text-secondary">
              <select class="form-select">
                <?php foreach (CIVIL_STATUS as $ext) { ?>
                  <option value="<?php echo $ext; ?>"><?php echo $ext; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm-3">
              <h6 class="mb-0">Blood Type</h6>
            </div>
            <div class="col-sm-9 text-secondary">
              <select class="form-select">
                <option value="none" selected="">N/A</option>
                <?php foreach (BLOOD_TYPE as $ext) { ?>
                  <option value="<?php echo $ext; ?>"><?php echo $ext; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm-3">
              <h6 class="mb-0">Residential Address</h6>
            </div>
            <div class="col-sm-9 text-secondary">
              <div class="address">
                <div class="col-12 mb-3">
                  <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="col-12 mb-3">
                  <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="inputCity" placeholder="City">
                  </div>
                  <div class="col-md-4">
                    <select id="inputState" class="form-select">
                    <?php foreach (COUNTRY as $ext) { ?>
                      <option value="<?php echo $ext; ?>"><?php echo $ext; ?></option>
                    <?php } ?>
                    <option value="other">Others</option>
                    </select>
                  </div>
                  <div class="col-md-2">
                    <input type="text" class="form-control" id="inputZip" placeholder="Zip">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="government" role="tabpanel">
          Tab 2 content
        </div>
      </div>

    </div>

    <div class="row mb-3">
        <div class="col-sm-3"></div>
        <div class="col-sm-9 text-secondary">
          <input type="button" class="btn btn-primary px-4" value="Save Changes">
        </div>
      </div>
  </div>
