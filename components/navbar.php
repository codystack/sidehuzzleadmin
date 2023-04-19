<header id="header" class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-container navbar-bordered bg-white">
    <div class="navbar-nav-wrap">
      <a class="navbar-brand" href="dashbaord" aria-label="Sidehuzzle">
          <img class="navbar-brand-logo" src="assets/img/logodark.svg" alt="Logo" data-hs-theme-appearance="default">
          <img class="navbar-brand-logo" src="assets/img/logolight.svg" alt="Logo" data-hs-theme-appearance="dark">
          <img class="navbar-brand-logo-mini" src="assets/img/logoshort.svg" alt="Logo" data-hs-theme-appearance="default">
          <img class="navbar-brand-logo-mini" src="assets/img/logoshort.svg" alt="Logo" data-hs-theme-appearance="dark">
      </a>

      <div class="navbar-nav-wrap-content-start">
        <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
          <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
          <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
        </button>
      </div>

      <div class="navbar-nav-wrap-content-end">
        <ul class="navbar-nav">
          <li class="nav-item">
            <div class="dropdown">
              <a class="navbar-dropdown-account-wrapper" href="javascript:;" id="accountNavbarDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                <div class="avatar avatar-sm avatar-circle">
                  <img class="avatar-img" src="<?php echo $_SESSION['picture']; ?>" alt="<?php echo $_SESSION['firstName']; ?>'s Avatar">
                  <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                </div>
              </a>

              <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="accountNavbarDropdown" style="width: 16rem;">
                <div class="dropdown-item-text">
                  <div class="d-flex align-items-center">
                    <div class="avatar avatar-sm avatar-circle">
                      <img class="avatar-img" src="<?php echo $_SESSION['picture']; ?>" alt="<?php echo $_SESSION['firstName']; ?>'s Avatar">
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <h5 class="mb-0"><?php echo $_SESSION['firstName']; ?> <?php echo $_SESSION['lastName']; ?></h5>
                      <p class="card-text text-body"><?php echo $_SESSION['email']; ?></p>
                    </div>
                  </div>
                </div>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="profile">Profile</a>
                <a class="dropdown-item" href="settings">Settings</a>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="#">Sign out</a>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
</header>
