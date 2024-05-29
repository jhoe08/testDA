<!-- https://bootdey.com/snippets/view/General-Search-Results -->
<!-- https://bootdey.com/snippets/view/view-user-information -->
<link rel="stylesheet" type="text/css" href="/assets/css/employees.css">
<div class="container">
  <div class="row">
      <div class="col-lg-12 card-margin">
          <div class="card search-form">
              <div class="card-body p-0">
                  <form id="search-form">
                      <div class="row">
                          <div class="col-12">
                              <div class="row no-gutters">
                                  <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                      <select class="form-control" id="exampleFormControlSelect1">
                                          <option>Location</option>
                                          <option>London</option>
                                          <option>Boston</option>
                                          <option>Mumbai</option>
                                          <option>New York</option>
                                          <option>Toronto</option>
                                          <option>Paris</option>
                                      </select>
                                  </div>
                                  <div class="col-lg-8 col-md-6 col-sm-12 p-0">
                                      <input type="text" placeholder="Search..." class="form-control" id="search" name="search">
                                  </div>
                                  <div class="col-lg-1 col-md-3 col-sm-12 p-0">
                                      <button type="submit" class="btn btn-base">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                      </button>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
  <div class="row">
          <div class="col-12">
              <div class="card card-margin">
                  <div class="card-body">
                      <div class="row search-body">
                          <div class="col-lg-12">
                              <div class="search-result">
                                  <div class="result-header">
                                      <div class="row">
                                          <div class="col-lg-6">
                                              <div class="records">Showing: <b>1-20</b> of <b>200</b> result</div>
                                          </div>
                                          <div class="col-lg-6">
                                              <div class="result-actions">
                                                  <div class="result-sorting">
                                                      <span>Sort By:</span>
                                                      <select class="form-control border-0" id="exampleOption">
                                                          <option value="1">Relevance</option>
                                                          <option value="2">Names (A-Z)</option>
                                                          <option value="3">Names (Z-A)</option>
                                                      </select>
                                                  </div>
                                                  <div class="result-views">
                                                      <button type="button" class="btn btn-soft-base btn-icon">
                                                          <svg
                                                              xmlns="http://www.w3.org/2000/svg"
                                                              width="24"
                                                              height="24"
                                                              viewBox="0 0 24 24"
                                                              fill="none"
                                                              stroke="currentColor"
                                                              stroke-width="2"
                                                              stroke-linecap="round"
                                                              stroke-linejoin="round"
                                                              class="feather feather-list"
                                                          >
                                                              <line x1="8" y1="6" x2="21" y2="6"></line>
                                                              <line x1="8" y1="12" x2="21" y2="12"></line>
                                                              <line x1="8" y1="18" x2="21" y2="18"></line>
                                                              <line x1="3" y1="6" x2="3" y2="6"></line>
                                                              <line x1="3" y1="12" x2="3" y2="12"></line>
                                                              <line x1="3" y1="18" x2="3" y2="18"></line>
                                                          </svg>
                                                      </button>
                                                      <button type="button" class="btn btn-soft-base btn-icon">
                                                          <svg
                                                              xmlns="http://www.w3.org/2000/svg"
                                                              width="24"
                                                              height="24"
                                                              viewBox="0 0 24 24"
                                                              fill="none"
                                                              stroke="currentColor"
                                                              stroke-width="2"
                                                              stroke-linecap="round"
                                                              stroke-linejoin="round"
                                                              class="feather feather-grid"
                                                          >
                                                              <rect x="3" y="3" width="7" height="7"></rect>
                                                              <rect x="14" y="3" width="7" height="7"></rect>
                                                              <rect x="14" y="14" width="7" height="7"></rect>
                                                              <rect x="3" y="14" width="7" height="7"></rect>
                                                          </svg>
                                                      </button>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="result-body">
                                      <div class="table-responsive">
                                          <table class="table widget-26">
                                              <tbody>
                                                  <?php if(!$datas) { ?>
                                                    <tr>
                                                      <td colspan="6">No users record is found!</td>
                                                    </tr>
                                                  <?php } else { 
                                                    foreach ($datas as $key => $user) { ?>
                                                    
                                                    <tr>
                                                      <td>
                                                          <div class="widget-26-job-emp-img">
                                                              <img src="/assets/images/avatar5.png" alt="Company" />
                                                          </div>
                                                      </td>
                                                      <td>
                                                          <div class="widget-26-job-title">
                                                              <a href="#"><?php echo $user['first_name'] .' '. $user['last_name']; ?></a>
                                                              <p class="m-0">
                                                                <span href="#" class="employer-name">Webmaster</span>
                                                                <span class="text-muted time">1 days ago</span>
                                                              </p>
                                                          </div>
                                                      </td>
                                                      <td>
                                                          <div class="widget-26-job-info">
                                                              <p class="type m-0">Contract of Service</p>
                                                              <p class="text-muted m-0">in <span class="location">Mandaue City</span></p>
                                                          </div>
                                                      </td>
                                                      <td>
                                                          <div class="widget-26-job-salary">SAAD</div>
                                                      </td>
                                                      <td>
                                                          <div class="widget-26-job-category bg-soft-base">
                                                              <i class="bi bi-circle-fill"></i>
                                                              <span>Software Development</span>
                                                          </div>
                                                      </td>
                                                      <td>
                                                          <div class="widget-26-job-starred">
                                                              <a href="#">
                                                                  <svg
                                                                      xmlns="http://www.w3.org/2000/svg"
                                                                      width="24"
                                                                      height="24"
                                                                      viewBox="0 0 24 24"
                                                                      fill="none"
                                                                      stroke="currentColor"
                                                                      stroke-width="2"
                                                                      stroke-linecap="round"
                                                                      stroke-linejoin="round"
                                                                      class="feather feather-star"
                                                                  >
                                                                      <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                  </svg>
                                                              </a>
                                                          </div>
                                                      </td>
                                                  </tr>
                                                  <?php } } ?>
                                              </tbody>
                                          </table>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <nav class="d-flex justify-content-center">
                          <ul class="pagination pagination-base pagination-boxed pagination-square mb-0">
                              <li class="page-item">
                                  <a class="page-link no-border" href="#">
                                      <span aria-hidden="true">«</span>
                                      <span class="sr-only">Previous</span>
                                  </a>
                              </li>
                              <li class="page-item active"><a class="page-link no-border" href="#">1</a></li>
                              <li class="page-item"><a class="page-link no-border" href="#">2</a></li>
                              <li class="page-item"><a class="page-link no-border" href="#">3</a></li>
                              <li class="page-item"><a class="page-link no-border" href="#">4</a></li>
                              <li class="page-item">
                                  <a class="page-link no-border" href="#">
                                      <span aria-hidden="true">»</span>
                                      <span class="sr-only">Next</span>
                                  </a>
                              </li>
                          </ul>
                      </nav>
                  </div>
              </div>
          </div>
      </div>
  </div>
