
<nav class="list-group mt-3">
    <a class="list-group-item with-badge" href="/employee">
        <i class="bi bi-list-columns-reverse"></i> View All Employees
        <span class="badge badge-primary badge-pill"></span>
    </a>
    <a class="list-group-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearchRight" aria-controls="offcanvasSearchRight">
        <i class="bi bi-search"></i> Search Employee
    </a>
    <?php if(isset($_SESSION['username'])) { ?>
    <a class="list-group-item" href="/employees/create">
        <i class="bi bi-file-earmark-plus text-success"></i> Create Employee
    </a>
    <?php } ?>
</nav>