<?php include_once('../header.php'); 

$datas = $database->getData2('transid', NULL, ['LIMIT'=> 3]);
?>


<link rel="stylesheet" href="/assets/css/timeline-post.css">
<div class="container">
   <div class="row">
      <div class="col-md-12">
         <div id="content" class="content content-full-width">
            <!-- begin profile -->
            <div class="profile">
               <div class="profile-header">
                  <!-- BEGIN profile-header-cover -->
                  <div class="profile-header-cover"></div>
                  <!-- END profile-header-cover -->
                  <!-- BEGIN profile-header-content -->
                  <div class="profile-header-content">
                     <!-- BEGIN profile-header-img -->
                     <div class="profile-header-img">
                        <!-- <img src="/assets/images/avatar3.png" alt=""> -->
                        <div id="qrcode"></div>
                     </div>
                     <!-- END profile-header-img -->
                     <!-- BEGIN profile-header-info -->
                     <div class="profile-header-info">
                        <h4 class="m-t-10 m-b-5">All Data</h4>
                        <p class="m-b-10">UXUI + Frontend Developer</p>
                        <a href="#" class="btn btn-sm btn-info mb-2">Edit Profile</a>
                     </div>
                     <!-- END profile-header-info -->
                  </div>
                  <!-- END profile-header-content -->
               </div>
            </div>
            <!-- end profile -->
            <!-- begin profile-content -->
            <div class="profile-content">
               <!-- begin tab-content -->
               <div class="tab-content p-0">
                  <!-- begin #profile-post tab -->
                  <div class="tab-pane fade active show" id="profile-post">
                     <!-- begin timeline -->
                     <ul class="timeline">
                        <?php foreach ($datas as $key => $data) { ?>
                        <li data-product-id="<?php echo $data['product_id']; ?>">
                           <!-- begin timeline-time -->
                           <?php 
                              $prDate =  $data['pr_date']; 
                              $date = date("j F Y", strtotime($prDate));
                              $time = date("g:i a", strtotime($prDate));
                           ?>
                           <div class="timeline-time">
                              <span class="date"><?php echo $date; ?></span>
                              <span class="time"><?php echo $time; ?></span>
                           </div>
                           <!-- end timeline-time -->
                           <!-- begin timeline-icon -->
                           <div class="timeline-icon">
                              <a href="javascript:;">&nbsp;</a>
                           </div>
                           <!-- end timeline-icon -->
                           <!-- begin timeline-body -->
                           <div class="timeline-body">
                              <div class="timeline-header">
                                 <span class="userimage"><img src="/assets/images/avatar3.png" alt=""></span>
                                 <span class="username"><a href="javascript:;"><?php echo $data['requisitioner']; ?></a> <small></small></span>
                                 <span class="pull-right text-muted"><strong><em><?php echo $data['division']; ?></em></strong></span>
                              </div>
                              <div class="timeline-content">
                                 <h3><?php echo $data['pr_classification']; ?></h3>
                                 <p><?php echo $data['remarks']; ?></p>
                              </div>
                              <div class="timeline-likes">
                                 <div class="stats-right">
                                    <span class="stats-text"><?php echo $data['banner_program']; ?></span>
                                    <span class="stats-text"><?php echo $data['fund_source']; ?></span>
                                 </div>
                                 <div class="stats">
                                    <span class="fa-stack fa-fw stats-icon">
                                    <i class="fa fa-circle fa-stack-2x text-danger"></i>
                                    <i class="fa fa-heart fa-stack-1x fa-inverse t-plus-1"></i>
                                    </span>
                                    <span class="fa-stack fa-fw stats-icon">
                                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                    <i class="fa fa-thumbs-up fa-stack-1x fa-inverse"></i>
                                    </span>
                                    <span class="stats-total"><?php 
                                       echo '₱'. $data['approved_budget']; ?></span>
                                 </div>
                              </div>
                              <div class="timeline-footer">
                                 <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i class="fa fa-thumbs-up fa-fw fa-lg m-r-3"></i> Like</a>
                                 <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i class="fa fa-comments fa-fw fa-lg m-r-3"></i> Comment</a> 
                                 <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i class="fa fa-share fa-fw fa-lg m-r-3"></i> Share</a>
                              </div>
                              <div class="timeline-comment-box">
                                 <div class="user"><img src="/assets/images/avatar3.png"></div>
                                 <div class="input">
                                    <form action="">
                                       <div class="input-group">
                                          <input type="text" class="form-control rounded-corner" placeholder="Write a comment...">
                                          <span class="input-group-btn p-l-10">
                                          <button class="btn btn-primary f-s-12 rounded-corner" type="button">Comment</button>
                                          </span>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                           <!-- end timeline-body -->
                        </li>
                        <?php } ?>
                        <li>
                           <!-- begin timeline-icon -->
                           <div class="timeline-icon">
                              <a href="javascript:;">&nbsp;</a>
                           </div>
                           <!-- end timeline-icon -->
                           <!-- begin timeline-body -->
                           <div class="timeline-body">
                              Loading...
                           </div>
                           <!-- begin timeline-body -->
                        </li>
                     </ul>
                     <!-- end timeline -->
                  </div>
                  <!-- end #profile-post tab -->
               </div>
               <!-- end tab-content -->
            </div>
            <!-- end profile-content -->
         </div>
      </div>
   </div>
</div>




<?php include_once('../footer.php'); ?>

<script type="text/javascript">
new QRCode(document.getElementById("qrcode"), "http://jindo.dev.naver.com/collie");
</script>