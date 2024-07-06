<!-- slide bar section    -->
<div class="sidebar">
  <div class="logo-details">
    <!-- <i class="bx bxl-c-plus-plus icon"></i> -->
    <!-- <div class="logo_name"></div> -->
    <i class='bx bx-menu' id="btn"></i>
  </div>
  <ul class="nav-list">
    <li>
      <a href="<?php echo URL; ?>user/userList">
        <i class='bx bx-user'></i>
        <span class="links_name">Users</span>
      </a>
      <!-- <span class="tooltip">Users</span> -->
    </li>

    <li>
      <a href="<?php echo URL; ?>stores/StoresList">
        <i class='bx bx-store'></i>
        <span class="links_name">Stores</span>
      </a>
      <!-- <span class="tooltip">Order</span> -->
    </li>
    <li>
      <a href="<?php echo URL; ?>orders/ordersList">
        <i class='bx bx-cart-alt'></i>
        <span class="links_name">Orders</span>
      </a>
      <!-- <span class="tooltip">Order</span> -->
    </li>
    <li>
      <a href="<?php echo URL; ?>orders/SellersReceivablesList">
        <i class='bx bx-dollar'></i>
        <span class="links_name">Sellers receivables</span>
      </a>
      <!-- <span class="tooltip">Order</span> -->
    </li>
    <li>
      <?php $temp = $_SESSION['userid']; ?>
      <a href="<?php echo URL . 'user/userprofileAD' . "/" . $temp; ?>">
        <i class='bx bx-cog'></i>
        <span class="links_name">My Profile</span>
      </a>
      <!-- <span class="tooltip">Order</span> -->
    </li>

    <li class="profile">
      <div class="profile-details">
        <img src="<?php echo URL; ?>public/img/user-icon.png" alt="profileImg">
        <div class="name_job">
          <div class="name"><?php echo ucwords($_SESSION['username']); ?></div>
          <div class="job"><?php echo $_SESSION['rolename']; ?></div>
        </div>
      </div>
      <i class='bx bx-user' id="log_out"></i>
    </li>
  </ul>
</div>
<script src="<?php echo URL; ?>public/js/sidebar.js"></script>