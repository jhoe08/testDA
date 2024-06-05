<!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
<nav class="nav">
  <a href="/" class="nav__link">
    <!-- <i class="material-icons nav__icon">dashboard</i> -->
    <i class="bi bi-columns-gap"></i>
    <span class="nav__text">Dashboard</span>
  </a>
  <a href="#" class="nav__link nav__link--active">
    <!-- <i class="material-icons nav__icon">person</i> -->
    <i class="bi bi-person-circle"></i>
    <span class="nav__text">Profile</span>
  </a>
  <!-- <a href="#" class="nav__link">
    <i class="material-icons nav__icon">devices</i>
    <span class="nav__text">Devices</span>
  </a>
  <a href="#" class="nav__link">
    <i class="material-icons nav__icon">lock</i>
    <span class="nav__text">Privacy</span>
  </a> -->
  <a href="#" class="nav__link">
    <!-- <i class="material-icons nav__icon">settings</i> -->
    <i class="bi bi-gear-fill"></i>
    <span class="nav__text">Settings</span>
  </a>
</nav>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="/assets/images/<?php echo $userprofile; ?>" class="rounded me-2" alt="..." style="max-width: 20px;">
      <strong class="me-auto">Notification</strong>
      <small>1 min ago</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Hello, world! This is a toast message.
    </div>
  </div>
</div>

<!-- scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>



<script src="/assets/js/index.js" type="text/javascript"></script>
<script type="text/javascript">

  // document.querySelectorAll(":input").inputmask();

  const toastTrigger = document.getElementById('updateTransaction')
  const toastLiveExample = document.getElementById('liveToast')

  if (toastTrigger) {
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
    toastTrigger.addEventListener('click', () => {
      // setTimeOut(()=>{
        // toastBootstrap.show()
      // }, 3000)
      
    })
  }
</script>
<!-- endof scripts -->
</body>
</html>
