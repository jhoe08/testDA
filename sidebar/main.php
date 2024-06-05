<div class="col-3 mb-3 mb-lg-8">
  <?php
  $uri = $_SERVER['REQUEST_URI'];
  $path = explode('/', $uri);
  // print_r($_SERVER);

    include_once('employee.php');

    switch ($path[1]) {
      case 'transactions':
        include_once('transactions-menu.php');
        break;
      
      case 'employee':
        include_once('employees-menu.php');
        break;

      default:
        echo 'Yehey!';
        break;
    }
    
  ?>
</div>