
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="main.php?url=add_order.php">
              <i class="fas fa-plus-circle"></i>
              <span>เพิ่มใบเสนอราคา</span>
            </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa- fa-list"></i>
          <span>รายการ</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="main.php?url=show_quotation.php">ใบเสนอราคา</a>
          <a class="dropdown-item" href="main.php?url=show_invoice.php">ใบแจ้งหนี้/ใบส่งสินค้า</a>

        </div>
      </li>
      <?php if($_SESSION['emp_permission'] == 0){?>
      <li class="nav-item">
          <a href="main.php?url=show_customer.php" class="nav-link"><i class="far fa-address-book"></i>
          <span>รายชื่อผู้ติดต่อ</span></a>
      </li>
       <li class="nav-item">
          <a href="main.php?url=show_emp.php" class="nav-link"><i class="far fa-address-book"></i>
          <span>รายชื่อพนักงาน</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa- fa-list"></i>
          <span>จัดการข้อมูลสินค้า</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="main.php?url=show_mdeq.php" class="nav-link"><i class="fas fa-plus-circle"></i>
          <span>รายการสินค้า</span></a>
          <a class="dropdown-item" href="main.php?url=add_stock.php" class="nav-link"><i class="fas fa-plus-circle"></i>
          <span>เพิ่มจำนวนสินค้า</span></a>
        </div>
      </li>
      <?php } ?>
<!--      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li>-->
    </ul>
