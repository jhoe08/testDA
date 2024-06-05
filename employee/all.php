<!-- https://bootdey.com/snippets/view/General-Search-Results -->
<!-- https://bootdey.com/snippets/view/view-user-information -->
<?php
  $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
  $total = $database->countItems('register');
  $totalPages = ceil( $total / $perPage );
  $showPages = (($currentPage - 1) * $perPage + 1) ."-".($perPage * $currentPage);
?>
<link rel="stylesheet" type="text/css" href="/assets/css/employees.css">
<div class="container pt-3" data-totalPage="<?php echo $totalPages; ?>">
<div class="row">
    <?php include_once('../sidebar/main.php'); ?>
    <div class="col-9 mb-3 mb-lg-8">
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
                          <a data-bs-toggle="dropdown" href="#" class="btn" aria-expanded="true"><i class="bi bi-list"></i></a>
                          <div class="dropdown-menu">
                            <a href="#" class="dropdown-item"><i class="bi bi-key-fill"></i> Update Password</a>
                            <a href="?id=17149" class="dropdown-item"><i class="bi bi-printer"></i> Edit Details</a>
                            <hr>
                            <a type="button" href="#!" class="deleteUser dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#userRemoveModal"><i class="bi bi-eye-slash-fill"></i> Remove User</a>
                            <a type="button" href="#!" class="deleteUser dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#userDeleteModal"><i class="bi bi-trash"></i> Force Delete User</a>
                          </div>
                        </div>
                      </td>
                      <?php } } ?>
                    </tr>
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