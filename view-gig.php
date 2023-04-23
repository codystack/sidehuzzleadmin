<?php
$page = "Gigs";
include "./components/header.php";
include "./components/navbar.php";
include "./components/side-navbar.php";
?>
<main id="content" role="main" class="main">

    <div class="content container-fluid">
        <div class="row justify-content-lg-center">
            <div class="col-lg-10">
                <div class="profile-cover">
                    <div class="profile-cover-img-wrapper">
                        <img class="profile-cover-img" src="./assets/img/img1.jpeg" alt="Header Image">
                    </div>
                </div>

                <?php
                    $gig_id = $_GET['id'];
                    $select_query = "SELECT * FROM gigs INNER JOIN users ON gigs.userID = users.id WHERE gigs.id = '$gig_id'";
                    $result = mysqli_query($conn, $select_query);
                    if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $title = $row['title'];
                                $payOut = $row['payOut'];
                                $gigID = $row['gigID'];
                                $postAD = $row['postAD'];
                                $commission = $row['commission'];
                                $status = $row['status'];
                                $dateCreated = $row['dateCreated'];
                                $registrationDate = strtotime($dateCreated);
                                switch ($status) {
                                    case "Approved";
                                        $class  = 'bg-soft-success';
                                        $text = 'text-success';
                                        break;
                                    case "Pending";
                                        $class  = 'bg-soft-warning';
                                        $text = 'text-warning';
                                        break;
                                    case "Banned";
                                        $class  = 'bg-soft-danger';
                                        $text = 'text-danger';
                                        break;
                                    default:
                                        $class  = '';
                                }
                ?>
                <div class="text-center mb-5">
                    <div class="avatar avatar-xxl avatar-circle profile-cover-avatar">
                        <img class="avatar-img" src="https://sidehuzzlecanada.com/<?php echo $postAD; ?>" alt="Gig AD">
                    </div>

                    <h1 class="page-header-title"><?php echo $title; ?></h1>
                    status: <span class="badge <?php echo $class; ?> <?php echo $text; ?>"><?php echo $status; ?></span>
                </div>

                <!-- Nav -->
                <div class="js-nav-scroller hs-nav-scroller-horizontal mb-5">
                    <span class="hs-nav-scroller-arrow-prev" style="display: none;">
                        <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                            <i class="bi-chevron-left"></i>
                        </a>
                    </span>

                    <span class="hs-nav-scroller-arrow-next" style="display: none;">
                        <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                            <i class="bi-chevron-right"></i>
                        </a>
                    </span>

                    <ul class="nav nav-tabs align-items-center">
                        <li class="nav-item">
                            <a class="nav-link " href="./user-profile.html">Gig Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="./user-profile-teams.html">Teams</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="./user-profile-connections.html">Connections</a>
                        </li>

                    <li class="nav-item ms-auto">
                        <div class="d-flex gap-2">
                            <div class="form-check form-check-switch">
                                <input class="form-check-input" type="checkbox" value="" id="connectCheckbox">
                                <label class="form-check-label btn btn-sm" for="connectCheckbox">
                                    <span class="form-check-default">
                                        <i class="bi-person-plus-fill"></i> Connect
                                    </span>
                                    <span class="form-check-active">
                                        <i class="bi-check-lg me-2"></i> Connected
                                    </span>
                                </label>
                            </div>

                            <div class="dropdown nav-scroller-dropdown">
                                <button type="button" class="btn btn-white btn-icon btn-sm" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi-three-dots-vertical"></i>
                                </button>

                                <div class="dropdown-menu dropdown-menu-end mt-1" aria-labelledby="profileDropdown">
                                <span class="dropdown-header">Settings</span>

                                <a class="dropdown-item" href="#">
                                    <i class="bi-share-fill dropdown-item-icon"></i> Share profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="bi-slash-circle dropdown-item-icon"></i> Block page and profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="bi-info-circle dropdown-item-icon"></i> Suggest edits
                                </a>

                                <div class="dropdown-divider"></div>

                                <span class="dropdown-header">Feedback</span>

                                <a class="dropdown-item" href="#">
                                    <i class="bi-flag dropdown-item-icon"></i> Report
                                </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    </ul>
                </div>
                <!-- End Nav -->

                <!-- Filter -->
                <div class="row align-items-center mb-5">
                    <div class="col">
                    <h3 class="mb-0">7 connections</h3>
                    </div>
                    <!-- End Col -->

                    <div class="col-auto">
                    <!-- Nav -->
                    <ul class="nav nav-segment" id="connectionsTab" role="tablist">
                        <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="grid-tab" data-bs-toggle="tab" href="#grid" role="tab" aria-controls="grid" aria-selected="true" title="Column view">
                            <i class="bi-grid"></i>
                        </a>
                        </li>
                        <li class="nav-item" role="presentation">
                        <a class="nav-link" id="list-tab" data-bs-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="false" title="List view" tabindex="-1">
                            <i class="bi-list"></i>
                        </a>
                        </li>
                    </ul>
                    <!-- End Nav -->
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Filter -->

                <!-- Tab Content -->
                <div class="tab-content" id="connectionsTabContent">
                    <div class="tab-pane fade show active" id="grid" role="tabpanel" aria-labelledby="grid-tab">
                    <!-- Connections -->
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3">
                        <div class="col mb-3 mb-lg-5">
                        <!-- Card -->
                        <div class="card h-100">
                            <div class="card-pinned">
                            <div class="card-pinned-top-end">
                                <!-- Dropdown -->
                                <div class="dropdown">
                                <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" id="connectionsDropdown1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi-three-dots-vertical"></i>
                                </button>

                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="connectionsDropdown1">
                                    <a class="dropdown-item" href="#">Share connection</a>
                                    <a class="dropdown-item" href="#">Block connection</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="#">Delete</a>
                                </div>
                                </div>
                                <!-- End Dropdown -->
                            </div>
                            </div>

                            <!-- Body -->
                            <div class="card-body text-center">
                            <!-- Avatar -->
                            <div class="avatar avatar-xl avatar-soft-primary avatar-circle avatar-centered mb-3">
                                <span class="avatar-initials">R</span>
                                <span class="avatar-status avatar-sm-status avatar-status-warning"></span>
                            </div>
                            <!-- End Avatar -->

                            <h3 class="mb-1">
                                <a class="text-dark" href="#">Rachel Doe</a>
                            </h3>

                            <div class="mb-3">
                                <i class="bi-building me-1"></i>
                                <span>Design</span>
                            </div>

                            <!-- Badges -->
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item"><a class="badge bg-soft-secondary text-secondary p-2" href="#">UI/UX</a></li>
                                <li class="list-inline-item"><a class="badge bg-soft-secondary text-secondary p-2" href="#">Sketch</a></li>
                                <li class="list-inline-item"><a class="badge bg-soft-secondary text-secondary p-2" href="#">Figma</a></li>
                            </ul>
                            <!-- End Badges -->
                            </div>
                            <!-- End Body -->

                            <!-- Footer -->
                            <div class="card-footer">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto py-1">
                                <a class="fs-6 text-body" href="#">25 connections</a>
                                </div>

                                <div class="col-auto py-1">
                                <!-- Form Check -->
                                <div class="form-check form-check-switch">
                                    <input class="form-check-input" type="checkbox" value="" id="connectionsCheckbox1" checked="">
                                    <label class="form-check-label btn btn-sm" for="connectionsCheckbox1">
                                    <span class="form-check-default">
                                        <i class="bi-person-plus-fill"></i> Connect
                                    </span>
                                    <span class="form-check-active">
                                        <i class="bi-check-lg me-2"></i> Connected
                                    </span>
                                    </label>
                                </div>
                                <!-- End Form Check -->
                                </div>
                            </div>
                            </div>
                            <!-- End Footer -->
                        </div>
                        <!-- End Card -->
                        </div>
                        <!-- End Col -->

                        <div class="col mb-3 mb-lg-5">
                        <!-- Card -->
                        <div class="card h-100">
                            <div class="card-pinned">
                            <div class="card-pinned-top-end">
                                <!-- Dropdown -->
                                <div class="dropdown">
                                <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" id="connectionsDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi-three-dots-vertical"></i>
                                </button>

                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="connectionsDropdown2">
                                    <a class="dropdown-item" href="#">Share connection</a>
                                    <a class="dropdown-item" href="#">Block connection</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="#">Delete</a>
                                </div>
                                </div>
                                <!-- End Dropdown -->
                            </div>
                            </div>

                            <!-- Body -->
                            <div class="card-body text-center">
                            <!-- Avatar -->
                            <div class="avatar avatar-xl avatar-circle avatar-centered mb-3">
                                <img class="avatar-img" src="./assets/img/160x160/img8.jpg" alt="Image Description">
                                <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                            </div>
                            <!-- End Avatar -->

                            <h3 class="mb-1">
                                <a class="text-dark" href="#">Isabella Finley</a>
                            </h3>

                            <div class="mb-3">
                                <i class="bi-building me-1"></i>
                                <span>FrontApp</span>
                            </div>

                            <!-- Badges -->
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item"><a class="badge bg-soft-secondary text-secondary p-2" href="#">Human resources</a></li>
                                <li class="list-inline-item"><a class="badge bg-soft-secondary text-secondary p-2" href="#">Support</a></li>
                            </ul>
                            <!-- End Badges -->
                            </div>
                            <!-- End Body -->

                            <!-- Footer -->
                            <div class="card-footer">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto py-1">
                                <a class="fs-6 text-body" href="#">79 connections</a>
                                </div>
                                <!-- End Col -->

                                <div class="col-auto py-1">
                                <!-- Form Check -->
                                <div class="form-check form-check-switch">
                                    <input class="form-check-input" type="checkbox" value="" id="connectionsCheckbox2" checked="">
                                    <label class="form-check-label btn btn-sm" for="connectionsCheckbox2">
                                    <span class="form-check-default">
                                        <i class="bi-person-plus-fill"></i> Connect
                                    </span>
                                    <span class="form-check-active">
                                        <i class="bi-check-lg me-2"></i> Connected
                                    </span>
                                    </label>
                                </div>
                                <!-- End Form Check -->
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Row -->
                            </div>
                            <!-- End Footer -->
                        </div>
                        <!-- End Card -->
                        </div>
                        <!-- End Col -->

                        <div class="col mb-3 mb-lg-5">
                        <!-- Card -->
                        <div class="card h-100">
                            <div class="card-pinned">
                            <div class="card-pinned-top-end">
                                <!-- Dropdown -->
                                <div class="dropdown">
                                <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" id="connectionsDropdown3" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi-three-dots-vertical"></i>
                                </button>

                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="connectionsDropdown3">
                                    <a class="dropdown-item" href="#">Share connection</a>
                                    <a class="dropdown-item" href="#">Block connection</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="#">Delete</a>
                                </div>
                                </div>
                                <!-- End Dropdown -->
                            </div>
                            </div>

                            <!-- Body -->
                            <div class="card-body text-center">
                            <!-- Avatar -->
                            <div class="avatar avatar-xl avatar-circle avatar-centered mb-3">
                                <img class="avatar-img" src="./assets/img/160x160/img3.jpg" alt="Image Description">
                                <span class="avatar-status avatar-sm-status avatar-status-warning"></span>
                            </div>
                            <!-- End Avatar -->

                            <h3 class="mb-1">
                                <a class="text-dark" href="#">David Harrison</a>
                            </h3>

                            <div class="mb-3">
                                <i class="bi-building me-1"></i>
                                <span>Unassigned</span>
                            </div>

                            <!-- Badges -->
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item"><a class="badge bg-soft-secondary text-secondary p-2" href="#">Marketing</a></li>
                            </ul>
                            <!-- End Badges -->
                            </div>
                            <!-- End Body -->

                            <!-- Footer -->
                            <div class="card-footer">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto py-1">
                                <a class="fs-6 text-body" href="#">0 connections</a>
                                </div>
                                <!-- End Col -->

                                <div class="col-auto py-1">
                                <!-- Form Check -->
                                <div class="form-check form-check-switch">
                                    <input class="form-check-input" type="checkbox" value="" id="connectionsCheckbox3">
                                    <label class="form-check-label btn btn-sm" for="connectionsCheckbox3">
                                    <span class="form-check-default">
                                        <i class="bi-person-plus-fill"></i> Connect
                                    </span>
                                    <span class="form-check-active">
                                        <i class="bi-check-lg me-2"></i> Connected
                                    </span>
                                    </label>
                                </div>
                                <!-- End Form Check -->
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Row -->
                            </div>
                            <!-- End Footer -->
                        </div>
                        <!-- End Card -->
                        </div>
                        <!-- End Col -->

                        <div class="col mb-3 mb-lg-5">
                        <!-- Card -->
                        <div class="card h-100">
                            <div class="card-pinned">
                            <div class="card-pinned-top-end">
                                <!-- Dropdown -->
                                <div class="dropdown">
                                <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" id="connectionsDropdown4" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi-three-dots-vertical"></i>
                                </button>

                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="connectionsDropdown4">
                                    <a class="dropdown-item" href="#">Share connection</a>
                                    <a class="dropdown-item" href="#">Block connection</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="#">Delete</a>
                                </div>
                                </div>
                                <!-- End Dropdown -->
                            </div>
                            </div>

                            <!-- Body -->
                            <div class="card-body text-center">
                            <!-- Avatar -->
                            <div class="avatar avatar-xl avatar-soft-dark avatar-circle avatar-centered mb-3">
                                <span class="avatar-initials">B</span>
                                <span class="avatar-status avatar-sm-status avatar-status-danger"></span>
                            </div>
                            <!-- End Avatar -->

                            <h3 class="mb-1">
                                <a class="text-dark" href="#">Bob Dean</a>
                            </h3>

                            <div class="mb-3">
                                <i class="bi-building me-1"></i>
                                <span>Sales</span>
                            </div>

                            <!-- Badges -->
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item"><a class="badge bg-soft-secondary text-secondary p-2" href="#">Sales</a></li>
                                <li class="list-inline-item"><a class="badge bg-soft-secondary text-secondary p-2" href="#">Legal</a></li>
                            </ul>
                            <!-- End Badges -->
                            </div>
                            <!-- End Body -->

                            <!-- Footer -->
                            <div class="card-footer">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto py-1">
                                <a class="fs-6 text-body" href="#">25 connections</a>
                                </div>
                                <!-- End Col -->

                                <div class="col-auto py-1">
                                <!-- Form Check -->
                                <div class="form-check form-check-switch">
                                    <input class="form-check-input" type="checkbox" value="" id="connectionsCheckbox4">
                                    <label class="form-check-label btn btn-sm" for="connectionsCheckbox4">
                                    <span class="form-check-default">
                                        <i class="bi-person-plus-fill"></i> Connect
                                    </span>
                                    <span class="form-check-active">
                                        <i class="bi-check-lg me-2"></i> Connected
                                    </span>
                                    </label>
                                </div>
                                <!-- End Form Check -->
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Row -->
                            </div>
                            <!-- End Footer -->
                        </div>
                        <!-- End Card -->
                        </div>
                        <!-- End Col -->

                        <div class="col mb-3 mb-lg-5">
                        <!-- Card -->
                        <div class="card h-100">
                            <div class="card-pinned">
                            <div class="card-pinned-top-end">
                                <!-- Dropdown -->
                                <div class="dropdown">
                                <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" id="connectionsDropdown5" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi-three-dots-vertical"></i>
                                </button>

                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="connectionsDropdown5">
                                    <a class="dropdown-item" href="#">Share connection</a>
                                    <a class="dropdown-item" href="#">Block connection</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="#">Delete</a>
                                </div>
                                </div>
                                <!-- End Dropdown -->
                            </div>
                            </div>

                            <!-- Body -->
                            <div class="card-body text-center">
                            <!-- Avatar -->
                            <div class="avatar avatar-xl avatar-circle avatar-centered mb-3">
                                <img class="avatar-img" src="./assets/img/160x160/img10.jpg" alt="Image Description">
                                <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                            </div>
                            <!-- End Avatar -->

                            <h3 class="mb-1">
                                <a class="text-dark" href="#">Amanda Harvey</a>
                            </h3>

                            <div class="mb-3">
                                <i class="bi-building me-1"></i>
                                <span>Atlassian</span>
                            </div>

                            <!-- Badges -->
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item"><a class="badge bg-soft-secondary text-secondary p-2" href="#">Human resources</a></li>
                                <li class="list-inline-item"><a class="badge bg-soft-secondary text-secondary p-2" href="#">Legal</a></li>
                            </ul>
                            <!-- End Badges -->
                            </div>
                            <!-- End Body -->

                            <!-- Footer -->
                            <div class="card-footer">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto py-1">
                                <a class="fs-6 text-body" href="#">3 connections</a>
                                </div>
                                <!-- End Col -->

                                <div class="col-auto py-1">
                                <!-- Form Check -->
                                <div class="form-check form-check-switch">
                                    <input class="form-check-input" type="checkbox" value="" id="connectionsCheckbox5" checked="">
                                    <label class="form-check-label btn btn-sm" for="connectionsCheckbox5">
                                    <span class="form-check-default">
                                        <i class="bi-person-plus-fill"></i> Connect
                                    </span>
                                    <span class="form-check-active">
                                        <i class="bi-check-lg me-2"></i> Connected
                                    </span>
                                    </label>
                                </div>
                                <!-- End Form Check -->
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Row -->
                            </div>
                            <!-- End Footer -->
                        </div>
                        <!-- End Card -->
                        </div>
                        <!-- End Col -->

                        <div class="col mb-3 mb-lg-5">
                        <!-- Card -->
                        <div class="card h-100">
                            <div class="card-pinned">
                            <div class="card-pinned-top-end">
                                <!-- Dropdown -->
                                <div class="dropdown">
                                <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" id="connectionsDropdown6" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi-three-dots-vertical"></i>
                                </button>

                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="connectionsDropdown6">
                                    <a class="dropdown-item" href="#">Share connection</a>
                                    <a class="dropdown-item" href="#">Block connection</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="#">Delete</a>
                                </div>
                                </div>
                                <!-- End Dropdown -->
                            </div>
                            </div>

                            <!-- Body -->
                            <div class="card-body text-center">
                            <!-- Avatar -->
                            <div class="avatar avatar-xl avatar-circle avatar-centered mb-3">
                                <img class="avatar-img" src="./assets/img/160x160/img5.jpg" alt="Image Description">
                                <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                            </div>
                            <!-- End Avatar -->

                            <h3 class="mb-1">
                                <a class="text-dark" href="#">Finch Hoot</a>
                            </h3>

                            <div class="mb-3">
                                <i class="bi-building me-1"></i>
                                <span>Dev</span>
                            </div>

                            <!-- Badges -->
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item"><a class="badge bg-soft-secondary text-secondary p-2" href="#">JS</a></li>
                                <li class="list-inline-item"><a class="badge bg-soft-secondary text-secondary p-2" href="#">Vue.js</a></li>
                                <li class="list-inline-item"><a class="badge bg-soft-secondary text-secondary p-2" href="#">HTML5</a></li>
                            </ul>
                            <!-- End Badges -->
                            </div>
                            <!-- End Body -->

                            <!-- Footer -->
                            <div class="card-footer">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto py-1">
                                <a class="fs-6 text-body" href="#">7 connections</a>
                                </div>
                                <!-- End Col -->

                                <div class="col-auto py-1">
                                <!-- Form Check -->
                                <div class="form-check form-check-switch">
                                    <input class="form-check-input" type="checkbox" value="" id="connectionsCheckbox6" checked="">
                                    <label class="form-check-label btn btn-sm" for="connectionsCheckbox6">
                                    <span class="form-check-default">
                                        <i class="bi-person-plus-fill"></i> Connect
                                    </span>
                                    <span class="form-check-active">
                                        <i class="bi-check-lg me-2"></i> Connected
                                    </span>
                                    </label>
                                </div>
                                <!-- End Form Check -->
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Row -->
                            </div>
                            <!-- End Footer -->
                        </div>
                        <!-- End Card -->
                        </div>
                        <!-- End Col -->

                        <div class="col mb-3 mb-lg-5">
                        <!-- Card -->
                        <div class="card h-100">
                            <div class="card-pinned">
                            <div class="card-pinned-top-end">
                                <!-- Dropdown -->
                                <div class="dropdown">
                                <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" id="connectionsDropdown7" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi-three-dots-vertical"></i>
                                </button>

                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="connectionsDropdown7">
                                    <a class="dropdown-item" href="#">Share connection</a>
                                    <a class="dropdown-item" href="#">Block connection</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="#">Delete</a>
                                </div>
                                </div>
                                <!-- End Dropdown -->
                            </div>
                            </div>

                            <!-- Body -->
                            <div class="card-body text-center">
                            <!-- Avatar -->
                            <div class="avatar avatar-xl avatar-circle avatar-centered mb-3">
                                <img class="avatar-img" src="./assets/img/160x160/img6.jpg" alt="Image Description">
                                <span class="avatar-status avatar-sm-status avatar-status-danger"></span>
                            </div>
                            <!-- End Avatar -->

                            <h3 class="mb-1">
                                <a class="text-dark" href="#">Costa Quinn</a>
                            </h3>

                            <div class="mb-3">
                                <i class="bi-building me-1"></i>
                                <span>Research team</span>
                            </div>

                            <!-- Badges -->
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item"><a class="badge bg-soft-secondary text-secondary p-2" href="#">SEO</a></li>
                            </ul>
                            <!-- End Badges -->
                            </div>
                            <!-- End Body -->

                            <!-- Footer -->
                            <div class="card-footer">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto py-1">
                                <a class="fs-6 text-body" href="#">9 connections</a>
                                </div>
                                <!-- End Col -->

                                <div class="col-auto py-1">
                                <!-- Form Check -->
                                <div class="form-check form-check-switch">
                                    <input class="form-check-input" type="checkbox" value="" id="connectionsCheckbox7">
                                    <label class="form-check-label btn btn-sm" for="connectionsCheckbox7">
                                    <span class="form-check-default">
                                        <i class="bi-person-plus-fill"></i> Connect
                                    </span>
                                    <span class="form-check-active">
                                        <i class="bi-check-lg me-2"></i> Connected
                                    </span>
                                    </label>
                                </div>
                                <!-- End Form Check -->
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Row -->
                            </div>
                            <!-- End Footer -->
                        </div>
                        <!-- End Card -->
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Connections -->
                    </div>

                    <div class="tab-pane fade" id="list" role="tabpanel" aria-labelledby="list-tab">
                    <div class="row row-cols-1">
                        <div class="col mb-3">
                        <!-- Card -->
                        <div class="card card-body">
                            <div class="d-flex align-items-md-center">
                            <div class="flex-shrink-0">
                                <!-- Avatar -->
                                <div class="avatar avatar-lg avatar-soft-primary avatar-circle">
                                <span class="avatar-initials">R</span>
                                <span class="avatar-status avatar-sm-status avatar-status-warning"></span>
                                </div>
                                <!-- End Avatar -->
                            </div>

                            <div class="flex-grow-1 ms-3">
                                <div class="row align-items-md-center">
                                <div class="col-9 col-md-4 col-lg-3 mb-2 mb-md-0">
                                    <h4 class="mb-1">
                                    <a class="text-dark" href="#">Rachel Doe</a>
                                    </h4>

                                    <span class="d-block">
                                    <i class="bi-building me-1"></i>
                                    <span>Design</span>
                                    </span>
                                </div>
                                <!-- End Col -->

                                <div class="col-3 col-md-auto order-md-last text-end ms-n3">
                                    <!-- Dropdown -->
                                    <div class="dropdown">
                                    <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" id="connectionsListDropdown1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi-three-dots-vertical"></i>
                                    </button>

                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="connectionsListDropdown1">
                                        <a class="dropdown-item" href="#">Rename project </a>
                                        <a class="dropdown-item" href="#">Add to favorites</a>
                                        <a class="dropdown-item" href="#">Archive project</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="#">Delete</a>
                                    </div>
                                    </div>
                                    <!-- End Dropdown -->
                                </div>
                                <!-- End Col -->

                                <div class="col-sm mb-2 mb-sm-0">
                                    <!-- Badges -->
                                    <ul class="list-inline mb-0">
                                    <li class="list-inline-item"><a class="badge bg-soft-secondary text-secondary p-2" href="#">UI/UX</a></li>
                                    <li class="list-inline-item"><a class="badge bg-soft-secondary text-secondary p-2" href="#">Sketch</a></li>
                                    <li class="list-inline-item"><a class="badge bg-soft-secondary text-secondary p-2" href="#">Figma</a></li>
                                    </ul>
                                    <!-- End Badges -->
                                </div>
                                <!-- End Col -->

                                <div class="col-sm-auto">
                                    <!-- Form Check -->
                                    <div class="form-check form-check-switch">
                                    <input class="form-check-input" type="checkbox" value="" id="connectionsListCheckbox1" checked="">
                                    <label class="form-check-label btn btn-sm" for="connectionsListCheckbox1">
                                        <span class="form-check-default">
                                        <i class="bi-person-plus-fill"></i> Connect
                                        </span>
                                        <span class="form-check-active">
                                        <i class="bi-check-lg me-2"></i> Connected
                                        </span>
                                    </label>
                                    </div>
                                    <!-- End Form Check -->
                                </div>
                                <!-- End Col -->
                                </div>
                                <!-- End Row -->
                            </div>
                            </div>
                        </div>
                        <!-- End Card -->
                        </div>
                        <!-- End Col -->

                        <div class="col mb-3">
                        <!-- Card -->
                        <div class="card card-body">
                            <div class="d-flex align-items-md-center">
                            <div class="flex-shrink-0">
                                <!-- Avatar -->
                                <div class="avatar avatar-lg avatar-circle">
                                <img class="avatar-img" src="./assets/img/160x160/img8.jpg" alt="Image Description">
                                <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                                </div>
                                <!-- End Avatar -->
                            </div>

                            <div class="flex-grow-1 ms-3">
                                <div class="row align-items-md-center">
                                <div class="col-9 col-md-4 col-lg-3 mb-2 mb-md-0">
                                    <h4 class="mb-1">
                                    <a class="text-dark" href="#">Isabella Finley</a>
                                    </h4>

                                    <span class="d-block">
                                    <i class="bi-building me-1"></i>
                                    <span>FrontApp</span>
                                    </span>
                                </div>
                                <!-- End Col -->

                                <div class="col-3 col-md-auto order-md-last text-end ms-n3">
                                    <!-- Dropdown -->
                                    <div class="dropdown">
                                    <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" id="connectionsListDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi-three-dots-vertical"></i>
                                    </button>

                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="connectionsListDropdown2">
                                        <a class="dropdown-item" href="#">Rename project </a>
                                        <a class="dropdown-item" href="#">Add to favorites</a>
                                        <a class="dropdown-item" href="#">Archive project</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="#">Delete</a>
                                    </div>
                                    </div>
                                    <!-- End Dropdown -->
                                </div>
                                <!-- End Col -->

                                <div class="col-sm mb-2 mb-sm-0">
                                    <!-- Badges -->
                                    <ul class="list-inline mb-0">
                                    <li class="list-inline-item"><a class="badge bg-soft-secondary text-secondary p-2" href="#">Human resources</a></li>
                                    <li class="list-inline-item"><a class="badge bg-soft-secondary text-secondary p-2" href="#">Support</a></li>
                                    </ul>
                                    <!-- End Badges -->
                                </div>
                                <!-- End Col -->

                                <div class="col-sm-auto">
                                    <!-- Form Check -->
                                    <div class="form-check form-check-switch">
                                    <input class="form-check-input" type="checkbox" value="" id="connectionsListCheckbox2" checked="">
                                    <label class="form-check-label btn btn-sm" for="connectionsListCheckbox2">
                                        <span class="form-check-default">
                                        <i class="bi-person-plus-fill"></i> Connect
                                        </span>
                                        <span class="form-check-active">
                                        <i class="bi-check-lg me-2"></i> Connected
                                        </span>
                                    </label>
                                    </div>
                                    <!-- End Form Check -->
                                </div>
                                <!-- End Col -->
                                </div>
                                <!-- End Row -->
                            </div>
                            </div>
                        </div>
                        <!-- End Card -->
                        </div>
                        <!-- End Col -->

                        <div class="col mb-3">
                        <!-- Card -->
                        <div class="card card-body">
                            <div class="d-flex align-items-md-center">
                            <div class="flex-shrink-0">
                                <!-- Avatar -->
                                <div class="avatar avatar-lg avatar-circle">
                                <img class="avatar-img" src="./assets/img/160x160/img3.jpg" alt="Image Description">
                                <span class="avatar-status avatar-sm-status avatar-status-warning"></span>
                                </div>
                                <!-- End Avatar -->
                            </div>

                            <div class="flex-grow-1 ms-3">
                                <div class="row align-items-md-center">
                                <div class="col-9 col-md-4 col-lg-3 mb-2 mb-md-0">
                                    <h4 class="mb-1">
                                    <a class="text-dark" href="#">David Harrison</a>
                                    </h4>

                                    <span class="d-block">
                                    <i class="bi-building me-1"></i>
                                    <span>Unassigned</span>
                                    </span>
                                </div>
                                <!-- End Col -->

                                <div class="col-3 col-md-auto order-md-last text-end ms-n3">
                                    <!-- Dropdown -->
                                    <div class="dropdown">
                                    <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" id="connectionsListDropdown3" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi-three-dots-vertical"></i>
                                    </button>

                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="connectionsListDropdown3">
                                        <a class="dropdown-item" href="#">Rename project </a>
                                        <a class="dropdown-item" href="#">Add to favorites</a>
                                        <a class="dropdown-item" href="#">Archive project</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="#">Delete</a>
                                    </div>
                                    </div>
                                    <!-- End Dropdown -->
                                </div>
                                <!-- End Col -->

                                <div class="col-sm mb-2 mb-sm-0">
                                    <!-- Badges -->
                                    <ul class="list-inline mb-0">
                                    <li class="list-inline-item"><a class="badge bg-soft-secondary text-secondary p-2" href="#">Marketing</a></li>
                                    </ul>
                                    <!-- End Badges -->
                                </div>
                                <!-- End Col -->

                                <div class="col-sm-auto">
                                    <!-- Form Check -->
                                    <div class="form-check form-check-switch">
                                    <input class="form-check-input" type="checkbox" value="" id="connectionsListCheckbox3">
                                    <label class="form-check-label btn btn-sm" for="connectionsListCheckbox3">
                                        <span class="form-check-default">
                                        <i class="bi-person-plus-fill"></i> Connect
                                        </span>
                                        <span class="form-check-active">
                                        <i class="bi-check-lg me-2"></i> Connected
                                        </span>
                                    </label>
                                    </div>
                                    <!-- End Form Check -->
                                </div>
                                <!-- End Col -->
                                </div>
                                <!-- End Row -->
                            </div>
                            </div>
                        </div>
                        <!-- End Card -->
                        </div>
                        <!-- End Col -->

                        <div class="col mb-3">
                        <!-- Card -->
                        <div class="card card-body">
                            <div class="d-flex align-items-md-center">
                            <div class="flex-shrink-0">
                                <!-- Avatar -->
                                <div class="avatar avatar-lg avatar-soft-dark avatar-circle">
                                <span class="avatar-initials">B</span>
                                <span class="avatar-status avatar-sm-status avatar-status-danger"></span>
                                </div>
                                <!-- End Avatar -->
                            </div>

                            <div class="flex-grow-1 ms-3">
                                <div class="row align-items-md-center">
                                <div class="col-9 col-md-4 col-lg-3 mb-2 mb-md-0">
                                    <h4 class="mb-1">
                                    <a class="text-dark" href="#">Bob Dean</a>
                                    </h4>

                                    <span class="d-block">
                                    <i class="bi-building me-1"></i>
                                    <span>Sales</span>
                                    </span>
                                </div>
                                <!-- End Col -->

                                <div class="col-3 col-md-auto order-md-last text-end ms-n3">
                                    <!-- Dropdown -->
                                    <div class="dropdown">
                                    <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" id="connectionsListDropdown4" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi-three-dots-vertical"></i>
                                    </button>

                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="connectionsListDropdown4">
                                        <a class="dropdown-item" href="#">Rename project </a>
                                        <a class="dropdown-item" href="#">Add to favorites</a>
                                        <a class="dropdown-item" href="#">Archive project</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="#">Delete</a>
                                    </div>
                                    </div>
                                    <!-- End Dropdown -->
                                </div>
                                <!-- End Col -->

                                <div class="col-sm mb-2 mb-sm-0">
                                    <!-- Badges -->
                                    <ul class="list-inline mb-0">
                                    <li class="list-inline-item"><a class="badge bg-soft-secondary text-secondary p-2" href="#">Sales</a></li>
                                    <li class="list-inline-item"><a class="badge bg-soft-secondary text-secondary p-2" href="#">Legal</a></li>
                                    </ul>
                                    <!-- End Badges -->
                                </div>
                                <!-- End Col -->

                                <div class="col-sm-auto">
                                    <!-- Form Check -->
                                    <div class="form-check form-check-switch">
                                    <input class="form-check-input" type="checkbox" value="" id="connectionsListCheckbox4">
                                    <label class="form-check-label btn btn-sm" for="connectionsListCheckbox4">
                                        <span class="form-check-default">
                                        <i class="bi-person-plus-fill"></i> Connect
                                        </span>
                                        <span class="form-check-active">
                                        <i class="bi-check-lg me-2"></i> Connected
                                        </span>
                                    </label>
                                    </div>
                                    <!-- End Form Check -->
                                </div>
                                <!-- End Col -->
                                </div>
                                <!-- End Row -->
                            </div>
                            </div>
                        </div>
                        <!-- End Card -->
                        </div>
                        <!-- End Col -->

                        <div class="col mb-3">
                        <!-- Card -->
                        <div class="card card-body">
                            <div class="d-flex align-items-md-center">
                            <div class="flex-shrink-0">
                                <!-- Avatar -->
                                <div class="avatar avatar-lg avatar-circle">
                                <img class="avatar-img" src="./assets/img/160x160/img10.jpg" alt="Image Description">
                                <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                                </div>
                                <!-- End Avatar -->
                            </div>

                            <div class="flex-grow-1 ms-3">
                                <div class="row align-items-md-center">
                                <div class="col-9 col-md-4 col-lg-3 mb-2 mb-md-0">
                                    <h4 class="mb-1">
                                    <a class="text-dark" href="#">Amanda Harvey</a>
                                    </h4>

                                    <span class="d-block">
                                    <i class="bi-building me-1"></i>
                                    <span>Atlassian</span>
                                    </span>
                                </div>
                                <!-- End Col -->

                                <div class="col-3 col-md-auto order-md-last text-end ms-n3">
                                    <!-- Dropdown -->
                                    <div class="dropdown">
                                    <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" id="connectionsListDropdown5" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi-three-dots-vertical"></i>
                                    </button>

                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="connectionsListDropdown5">
                                        <a class="dropdown-item" href="#">Rename project </a>
                                        <a class="dropdown-item" href="#">Add to favorites</a>
                                        <a class="dropdown-item" href="#">Archive project</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="#">Delete</a>
                                    </div>
                                    </div>
                                    <!-- End Dropdown -->
                                </div>
                                <!-- End Col -->

                                <div class="col-sm mb-2 mb-sm-0">
                                    <!-- Badges -->
                                    <ul class="list-inline mb-0">
                                    <li class="list-inline-item"><a class="badge bg-soft-secondary text-secondary p-2" href="#">Human resources</a></li>
                                    <li class="list-inline-item"><a class="badge bg-soft-secondary text-secondary p-2" href="#">Legal</a></li>
                                    </ul>
                                    <!-- End Badges -->
                                </div>
                                <!-- End Col -->

                                <div class="col-sm-auto">
                                    <!-- Form Check -->
                                    <div class="form-check form-check-switch">
                                    <input class="form-check-input" type="checkbox" value="" id="connectionsListCheckbox5" checked="">
                                    <label class="form-check-label btn btn-sm" for="connectionsListCheckbox5">
                                        <span class="form-check-default">
                                        <i class="bi-person-plus-fill"></i> Connect
                                        </span>
                                        <span class="form-check-active">
                                        <i class="bi-check-lg me-2"></i> Connected
                                        </span>
                                    </label>
                                    </div>
                                    <!-- End Form Check -->
                                </div>
                                <!-- End Col -->
                                </div>
                                <!-- End Row -->
                            </div>
                            </div>
                        </div>
                        <!-- End Card -->
                        </div>
                        <!-- End Col -->

                        <div class="col mb-3">
                        <!-- Card -->
                        <div class="card card-body">
                            <div class="d-flex align-items-md-center">
                            <div class="flex-shrink-0">
                                <!-- Avatar -->
                                <div class="avatar avatar-lg avatar-circle">
                                <img class="avatar-img" src="./assets/img/160x160/img5.jpg" alt="Image Description">
                                <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                                </div>
                                <!-- End Avatar -->
                            </div>

                            <div class="flex-grow-1 ms-3">
                                <div class="row align-items-md-center">
                                <div class="col-9 col-md-4 col-lg-3 mb-2 mb-md-0">
                                    <h4 class="mb-1">
                                    <a class="text-dark" href="#">Finch Hoot</a>
                                    </h4>

                                    <span class="d-block">
                                    <i class="bi-building me-1"></i>
                                    <span>Dev</span>
                                    </span>
                                </div>
                                <!-- End Col -->

                                <div class="col-3 col-md-auto order-md-last text-end ms-n3">
                                    <!-- Dropdown -->
                                    <div class="dropdown">
                                    <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" id="connectionsListDropdown6" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi-three-dots-vertical"></i>
                                    </button>

                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="connectionsListDropdown6">
                                        <a class="dropdown-item" href="#">Rename project </a>
                                        <a class="dropdown-item" href="#">Add to favorites</a>
                                        <a class="dropdown-item" href="#">Archive project</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="#">Delete</a>
                                    </div>
                                    </div>
                                    <!-- End Dropdown -->
                                </div>
                                <!-- End Col -->

                                <div class="col-sm mb-2 mb-sm-0">
                                    <!-- Badges -->
                                    <ul class="list-inline mb-0">
                                    <li class="list-inline-item"><a class="badge bg-soft-secondary text-secondary p-2" href="#">JS</a></li>
                                    <li class="list-inline-item"><a class="badge bg-soft-secondary text-secondary p-2" href="#">Vue.js</a></li>
                                    <li class="list-inline-item"><a class="badge bg-soft-secondary text-secondary p-2" href="#">HTML5</a></li>
                                    </ul>
                                    <!-- End Badges -->
                                </div>
                                <!-- End Col -->

                                <div class="col-sm-auto">
                                    <!-- Form Check -->
                                    <div class="form-check form-check-switch">
                                    <input class="form-check-input" type="checkbox" value="" id="connectionsListCheckbox6" checked="">
                                    <label class="form-check-label btn btn-sm" for="connectionsListCheckbox6">
                                        <span class="form-check-default">
                                        <i class="bi-person-plus-fill"></i> Connect
                                        </span>
                                        <span class="form-check-active">
                                        <i class="bi-check-lg me-2"></i> Connected
                                        </span>
                                    </label>
                                    </div>
                                    <!-- End Form Check -->
                                </div>
                                <!-- End Col -->
                                </div>
                                <!-- End Row -->
                            </div>
                            </div>
                        </div>
                        <!-- End Card -->
                        </div>
                        <!-- End Col -->

                        <div class="col mb-3">
                        <!-- Card -->
                        <div class="card card-body">
                            <div class="d-flex align-items-md-center">
                            <div class="flex-shrink-0">
                                <!-- Avatar -->
                                <div class="avatar avatar-lg avatar-circle">
                                <img class="avatar-img" src="./assets/img/160x160/img6.jpg" alt="Image Description">
                                <span class="avatar-status avatar-sm-status avatar-status-danger"></span>
                                </div>
                                <!-- End Avatar -->
                            </div>

                            <div class="flex-grow-1 ms-3">
                                <div class="row align-items-md-center">
                                <div class="col-9 col-md-4 col-lg-3 mb-2 mb-md-0">
                                    <h4 class="mb-1">
                                    <a class="text-dark" href="#">Costa Quinn</a>
                                    </h4>

                                    <span class="d-block">
                                    <i class="bi-building me-1"></i>
                                    <span>Research team</span>
                                    </span>
                                </div>
                                <!-- End Col -->

                                <div class="col-3 col-md-auto order-md-last text-end ms-n3">
                                    <!-- Dropdown -->
                                    <div class="dropdown">
                                    <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" id="connectionsListDropdown7" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi-three-dots-vertical"></i>
                                    </button>

                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="connectionsListDropdown7">
                                        <a class="dropdown-item" href="#">Rename project </a>
                                        <a class="dropdown-item" href="#">Add to favorites</a>
                                        <a class="dropdown-item" href="#">Archive project</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="#">Delete</a>
                                    </div>
                                    </div>
                                    <!-- End Dropdown -->
                                </div>
                                <!-- End Col -->

                                <div class="col-sm mb-2 mb-sm-0">
                                    <!-- Badges -->
                                    <ul class="list-inline mb-0">
                                    <li class="list-inline-item"><a class="badge bg-soft-secondary text-secondary p-2" href="#">SEO</a></li>
                                    </ul>
                                    <!-- End Badges -->
                                </div>
                                <!-- End Col -->

                                <div class="col-sm-auto">
                                    <!-- Form Check -->
                                    <div class="form-check form-check-switch">
                                    <input class="form-check-input" type="checkbox" value="" id="connectionsListCheckbox7">
                                    <label class="form-check-label btn btn-sm" for="connectionsListCheckbox7">
                                        <span class="form-check-default">
                                        <i class="bi-person-plus-fill"></i> Connect
                                        </span>
                                        <span class="form-check-active">
                                        <i class="bi-check-lg me-2"></i> Connected
                                        </span>
                                    </label>
                                    </div>
                                    <!-- End Form Check -->
                                </div>
                                <!-- End Col -->
                                </div>
                                <!-- End Row -->
                            </div>
                            </div>
                        </div>
                        <!-- End Card -->
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                    </div>
                </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>


<?php include "./components/footer.php"; ?>