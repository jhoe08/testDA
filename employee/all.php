<!-- https://bootdey.com/snippets/view/General-Search-Results -->
<!-- https://bootdey.com/snippets/view/view-user-information -->
<?php
  $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
  $total = $database->countItems('register');
  // $perPage = 5;
  $totalPages = $total / $perPage;
  $showPages = (($currentPage - 1) * $perPage + 1) ."-".($perPage * $currentPage);
?>
<link rel="stylesheet" type="text/css" href="/assets/css/employees.css">
<div class="container pt-3">
<div class="row">
    <div class="col-md-3">
      <?php include_once('../sidebar/employee.php'); ?>
    </div>
    <div class="col-md-9">
        <div class="overflow-hidden card table-nowrap table-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Manage Users</h5>
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
                <table class="table user-table mb-0">
                  <thead class="small text-uppercase bg-body text-muted">
                    <tr>
                      <th scope="col" class="border-0 text-uppercase text-center font-medium pl-4">#</th>
                      <th scope="col" class="border-0 text-uppercase font-medium">Details</th>
                      <th scope="col" class="border-0 text-uppercase font-medium">Manage</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (!$datas) { ?>
                    <tr>
                      <td colspan="7" class="text-center">No Records is Found!</td>
                    </tr>
                    <?php } else { ?>

                     

                    <?php foreach ($datas as $key => $value) { $key++; ?>
                    <tr bgcolor="<?php echo $key % 2 === 0 ? '' : '#ced4da'; ?>">
                      <td class="pl-4 text-center"><?php echo $key; ?></td>
                      <td>
                          <h5 class="font-medium text-nowrap mb-0"><?php echo $value['first_name'].' '.$value['last_name']; ?> - <small class="text-muted"><?php echo $value['username']; ?></small></h5>
                          <div class="containers">
                            <div class="row align-items-start">
                              <div class="col">
                                <p>
                                  <span class="text-muted"><i class="bi bi-person-workspace" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Designation"></i> Data Controller IV</span><br>
                                  <span class="text-muted"><i class="bi bi-building" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Division"></i> Field Operations</span>
                                </p>
                              </div>
                              <div class="col">
                                <p>
                                  <span class="text-muted text-nowrap"><i class="bi bi-envelope-at" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Email"></i> <?php echo $value['email']; ?></span><br>
                                  <span class="text-muted"><i class="bi bi-telephone-fill" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Mobile"></i> <a class="link-secondary link-offset-2 link-underline link-underline-opacity-0" href="tel:<?php echo $value['mobile']; ?>"><?php echo $value['mobile']; ?></a></span><br>
                                </p>
                              </div>
                              <div class="col">
                                <span><i class="bi bi-clock-history" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Registered"></i> 15 Mar 1988, 10: 55 AM</span><br>
                                <span class="text-muted">
                                    <i class="bi bi-diagram-3-fill" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Roles"></i> 
                                    <?php 
                                      if( isset($value['role']) ) {
                                        $html='';
                                        $all=0;
                                        $jsonString = $value['role'];
                                        $permission = json_decode($jsonString);
                                        // print_r('ase'.$permission);
                                        if(!$permission) { 
                                          $html = '<span class="badge text-bg-light">Not found</span>';
                                        } else {
                                          $roles = $permission->roles;
                                          foreach ($roles as $key => $value) {
                                            $all += $value;
                                            if($all == 4) {
                                              $html = '<span class="badge text-bg-danger">Super Admin</span>';
                                            } else {
                                              $html .= '<span class="badge '.(($value) ?'':'hidden').' text-bg-' . (($key == 'admin') ? 'primary' : (($key == 'moderator') ? 'warning' : (($key == 'subscriber') ? 'info' : 'light'))) . ' mr-1" >' . $key . '</span>';  
                                            }
                                          }
                                        }
                                        
                                      echo $html;
                                    } ?>
                                  </span>
                              </div>
                            </div>
                          </div>
                      </td>
                      <td class="text-center">
                        <div class="dropdown">
                          <a data-bs-toggle="dropdown" href="#" class="btn p-1" aria-expanded="true"><i class="bi bi-list"></i></a>
                          <div class="dropdown-menu">
                            <a href="#" class="dropdown-item"><i class="bi bi-eye"></i> Update Password</a>
                            <a href="?id=17149" class="dropdown-item"><i class="bi bi-printer"></i> Edit Details</a>
                            <hr>
                            <a data-id="17149" type="button" href="#!" class="deleteTransaction dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#transactionDeleteModal"><i class="bi bi-trash"></i> Delete User</a>
                                                                        </div>
                              </div>
                      </td>
                      <?php } } ?>
                    </tr>
                  </tbody>
                </table>
                <nav aria-label="Page navigation example" class="text-center">
                    <ul class="pagination">
                      <li class="page-item">
                        <a class="page-link" href="?page=1" aria-label="Previous">
                          <span aria-hidden="true">«</span>
                        </a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="?page=1" aria-label="Previous">
                          <span aria-hidden="true">«</span>
                        </a>
                      </li>
                                            <li class="page-item active"><a class="page-link" href="?page=1">1</a></li>
                                            <li class="page-item "><a class="page-link" href="?page=2">2</a></li>
                                            <li class="page-item "><a class="page-link" href="?page=3">3</a></li>
                                            <li class="page-item "><a class="page-link" href="?page=4">4</a></li>
                                            <li class="page-item "><a class="page-link" href="?page=5">5</a></li>
                                            <li class="page-item "><a class="page-link" href="?page=6">6</a></li>
                                            <li class="page-item "><a class="page-link" href="?page=7">7</a></li>
                                            <li class="page-item "><a class="page-link" href="?page=8">8</a></li>
                                            <li class="page-item "><a class="page-link" href="?page=9">9</a></li>
                                            <li class="page-item "><a class="page-link" href="?page=10">10</a></li>
                                            <li class="page-item "><a class="page-link" href="?page=11">11</a></li>
                                            <li class="page-item "><a class="page-link" href="?page=12">12</a></li>
                                            <li class="page-item "><a class="page-link" href="?page=13">13</a></li>
                                            <li class="page-item "><a class="page-link" href="?page=14">14</a></li>
                                              
                      <li class="page-item">
                        <a class="page-link" href="?page=2" aria-label="Next">
                          <span aria-hidden="true">»</span>
                        </a>
                      </li>
                    </ul>
                  </nav>
            </div>
        </div>
    </div>
</div>
</div>