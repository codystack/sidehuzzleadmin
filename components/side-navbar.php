<aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-dark bg-dark">
    <div class="navbar-vertical-container">
        <div class="navbar-vertical-footer-offset">
            
            <a class="navbar-brand" href="dashboard" aria-label="Sidehuzzle">
                <img class="navbar-brand-logo" src="assets/img/logolight.svg" alt="Logo">
                <img class="navbar-brand-logo-mini" src="assets/img/logoshort.svg" alt="Logo">
            </a>
            
            <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
                <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
                <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
            </button>
            
            <div class="navbar-vertical-content">
                <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">
                    <div class="nav-item">
                        <a class="nav-link <?php if($page=='Dashboard'){echo 'active';}?>" href="dashboard" data-placement="left">
                            <i class="bi-grid-1x2 nav-icon"></i>
                            <span class="nav-link-title">Dashboard</span>
                        </a>
                    </div>

                    <div class="nav-item">
                        <a class="nav-link dropdown-toggle collapsed <?php if($page=='Gigs'){echo 'active';}?>" href="#navbarVerticalMenuPagesProjectsMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesProjectsMenu" aria-expanded="false" aria-controls="navbarVerticalMenuPagesProjectsMenu">
                            <i class="bi-briefcase nav-icon"></i>
                            <span class="nav-link-title">Gigs</span>
                        </a>

                        <div id="navbarVerticalMenuPagesProjectsMenu" class="nav-collapse collapse" data-bs-parent="#navbarVerticalMenuPagesMenu" hs-parent-area="#navbarVerticalMenu" style="">
                        <a class="nav-link <?php if($page=='Gigs'){echo 'active';}?>" href="all-gigs">All gigs</a>
                        <a class="nav-link <?php if($page=='Categories'){echo 'active';}?>" href="">Categories</a>
                        </div>
                    </div>

                    <div class="nav-item">
                        <a class="nav-link <?php if($page=='Users'){echo 'active';}?>" href="users" data-placement="left">
                            <i class="bi-people nav-icon"></i>
                            <span class="nav-link-title">Users</span>
                        </a>
                    </div>

                    <div class="nav-item">
                        <a class="nav-link <?php if($page=='Referrals'){echo 'active';}?>" href="gigs" data-placement="left">
                            <i class="bi-link nav-icon"></i>
                            <span class="nav-link-title">Referrals</span>
                        </a>
                    </div>

                    <span class="dropdown-header mt-4">My Account</span>
                    <small class="bi-three-dots nav-subtitle-replacer"></small>

                    <div class="nav-item">
                        <a class="nav-link <?php if($page=='Profile'){echo 'active';}?>" href="profile" data-placement="left">
                            <i class="bi-person nav-icon"></i>
                            <span class="nav-link-title">Profile</span>
                        </a>
                    </div>

                    <div class="nav-item">
                        <a class="nav-link <?php if($page=='Settings'){echo 'active';}?>" href="gigs" data-placement="left">
                            <i class="bi-gear nav-icon"></i>
                            <span class="nav-link-title">Settings</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="navbar-vertical-footer">
                <ul class="navbar-vertical-footer-list">
                    <li class="navbar-vertical-footer-list-item">
                        <div class="">
                            <a href="logout" class="btn btn-ghost-light rounded">
                                <i class="bi bi-power"></i> shutdown
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</aside>