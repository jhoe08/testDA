<?php  require_once('database.php') ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/assets/css/user.css">
    <link rel="stylesheet" href="/assets/css/card.css">
    <style>
      .qrcode img {
        max-width: 100px;
      }
    </style>
  </head>
<body>

<div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="/assets/images/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php echo $user->getFullname(true); ?></h4>
                      <p class="text-secondary mb-1">Full Stack Developer</p>
                      <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                      <button class="btn btn-primary">Follow</button>
                      <!-- <button class="btn btn-outline-primary">Message</button> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg> Website</h6>
                    <span class="text-secondary">https://bootdey.com</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg> Github</h6>
                    <span class="text-secondary">bootdey</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg> Twitter</h6>
                    <span class="text-secondary">@bootdey</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg> Instagram</h6>
                    <span class="text-secondary">bootdey</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg> Facebook</h6>
                    <span class="text-secondary">bootdey</span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <!-- <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $user->getFullname(); ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      fip@jukmuh.al
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      (239) 816-9029
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mobile</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      (320) 380-4539
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      Bay Area, San Francisco, CA
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " href="#">Edit</a>
                    </div>
                  </div>
                </div> -->
                
                  <div class="row">
                      <div class="col-12">
                          <div class="position-relative card table-nowrap table-card mb-0">
                              <div class="card-header align-items-center">
                                  <h5 class="mb-0">Latest Transactions</h5>
                                  <p class="mb-0 small text-muted">1 Pending</p>
                              </div>
                              <div class="table-responsive">
                                  <table class="table mb-0">
                                      <thead class="small text-uppercase bg-body text-muted">
                                          <tr>
                                              <th>Transaction ID</th>
                                              <th>Date</th>
                                              <th>Name</th>
                                              <th>Amount</th>
                                              <th>Status</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr class="align-middle">
                                              <td>
                                                  #57473829
                                              </td>
                                              <td>13 Sep, 2021</td>
                                              <td>Renee Sims</td>
                                              <td>
                                                  <div class="d-flex align-items-center">
                                                      <span><i class="fa fa-arrow-up" aria-hidden="true"></i></span>
                                                      <span>$145</span>
                                                  </div>
                                              </td>
                                              <td>
                                                  <span class="badge fs-6 fw-normal bg-tint-success text-bg-success">Completed</span>
                                              </td>
                                          </tr>
                                          <tr class="align-middle">
                                              <td>
                                                  #012458780
                                              </td>
                                              <td>19 Aug, 2021</td>
                                              <td>Edith Koenig</td>
                                              <td>
                                                  <div class="d-flex align-items-center">
                                                      <span><i class="fa fa-arrow-down" aria-hidden="true"></i></span>
                                                      <span>$641.64</span>
                                                  </div>
                                              </td>
                                              <td>
                                                  <span class="badge fs-6 fw-normal bg-tint-warning text-bg-warning">Pending</span>
                                              </td>
                                          </tr>
                                          <tr class="align-middle">
                                              <td>
                                                  #76444326
                                              </td>
                                              <td>03 April, 2021</td>
                                              <td>Carrie Blount</td>
                                              <td>
                                                  <div class="d-flex align-items-center">
                                                      <span><i class="fa fa-arrow-down" aria-hidden="true"></i></span>
                                                      <span>$12,457</span>
                                                  </div>
                                              </td>
                                              <td>
                                                  <span class="badge fs-6 fw-normal bg-tint-success text-bg-success">Completed</span>
                                              </td>
                                          </tr>
                                          <tr class="align-middle">
                                              <td>
                                                  #12498745
                                              </td>
                                              <td>15 March, 2021</td>
                                              <td>Ander Durham</td>
                                              <td>
                                                  <div class="d-flex align-items-center">
                                                      <span><i class="fa fa-arrow-down" aria-hidden="true"></i></span>
                                                      <span>$785</span>
                                                  </div>
                                              </td>
                                              <td>
                                                  <span class="badge fs-6 fw-normal bg-tint-success text-bg-info">Completed</span>
                                              </td>
                                          </tr>
                                          <tr class="align-middle">
                                              <td>
                                                  #87444654
                                              </td>
                                              <td>23 Jan, 2021</td>
                                              <td>Netflix Inc.</td>
                                              <td>
                                                  <div class="d-flex align-items-center">
                                                      <span><i class="fa fa-arrow-up" aria-hidden="true"></i></span>
                                                      <span>$199</span>
                                                  </div>
                                              </td>
                                              <td>
                                                  <span class="badge fs-6 fw-normal bg-tint-success text-bg-danger">Completed</span>
                                              </td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </div>
                              <div class="card-footer text-end">
                                  <a href="#!" class="btn btn-gray">View All Transactions</a>
                              </div>
                          </div>
                      </div>
                  </div>
                

              </div>

              <div class="row gutters-sm">
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                      <small>Web Design</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Website Markup</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>One Page</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Mobile Template</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Backend API</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row col-sm-6 mb-3">
                  <!-- Team item-->
                  <div class="col-sm-3 mb-3">
                    <div class="team position-relative d-block text-center">
                        <div class="image position-relative d-block overflow-hidden">
                            <img src="/assets/images/avatar1.png" class="img-fluid rounded" alt="">
                            <div class="overlay rounded bg-dark"></div>
                        </div>
                    </div>
                  </div>
                  <div class="col-sm-3 mb-3">
                    <div class="team position-relative d-block text-center">
                        <div class="image position-relative d-block overflow-hidden">
                            <img src="/assets/images/avatar2.png" class="img-fluid rounded" alt="">
                            <div class="overlay rounded bg-dark"></div>
                        </div>
                    </div>
                  </div>
                  <div class="col-sm-3 mb-3">
                    <div class="team position-relative d-block text-center">
                        <div class="image position-relative d-block overflow-hidden">
                            <img src="/assets/images/avatar3.png" class="img-fluid rounded" alt="">
                            <div class="overlay rounded bg-dark"></div>
                        </div>
                    </div>
                  </div>
                  <!-- End-->

                  <div class="">
                    <div class="">
                      <div class="card bg-c-blue order-card">
                          <div class="card-block">
                              <h6 class="m-b-20">Upcoming Birthdays</h6>
                              <h2 class="text-right"><i class="f-left bi bi-cake2"></i><span>69 </span></h2>
                              <p class="m-b-0">Completed Orders<span class="f-right">351</span></p>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
    </div>


<!-- Scripts Here -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script>
    let qrcode1 = new QRCode("sample1", "Transaction ID: [123456789] | Remarks: [Failed]");
    let qrcode2 = new QRCode("sample2", "Transaction ID: [123456789] | Remarks: [Pending]");
    let qrcode3 = new QRCode("sample3", "Transaction ID: [123456789] | Remarks: [Follow up]");

    console.log(qrcode1)
</script>
</body>
</html>

