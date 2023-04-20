<?php
$page = "Dashboard";
include "./components/header.php";
include "./components/navbar.php";
include "./components/side-navbar.php";
?>
<main id="content" role="main" class="main">

    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title">Dashboard</h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-4 mb-3 mb-lg-5">
                <div class="card">
                    <div class="card-body text-center">
                        <small class="text-cap">Users</small>
                        <?php
                            $countUsers = mysqli_query($conn, "SELECT id FROM users");
                            echo "<span class='js-counter d-block display-3 text-dark mb-2'>".mysqli_num_rows($countUsers)."</span>"
                        ?>

                        <div class="row col-divider">
                            <div class="col text-center">
                                <span class="d-block">signed up on sidehuzzle</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-3 mb-lg-5">
            <!-- Card -->
            <div class="card">
                <div class="card-body text-center">
                <small class="text-cap">Gigs</small>
                <?php
                    $countGigs = mysqli_query($conn, "SELECT id FROM gigs");
                    echo "<span class='js-counter d-block display-3 text-dark mb-2'>".mysqli_num_rows($countGigs)."</span>"
                ?>

                <div class="row col-divider">
                    <div class="col text-center">
                    <span class="d-block">posted on sidehuzzle</span>
                    </div>
                </div>
                <!-- End Row -->
                </div>
            </div>
            <!-- End Card -->
            </div>
            <!-- End Col -->

            <div class="col-md-6 col-lg-4 mb-3 mb-lg-5">
                <div class="card">
                    <div class="card-body text-center">
                        <small class="text-cap">Referrals</small>
                        <span class="js-counter d-block display-3 text-dark mb-2">0</span>

                        <div class="row col-divider">
                            <div class="col text-center">
                                <span class="d-block">generated on sidehuzzle</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card -->
        <div class="card mb-3 mb-lg-5">
            <!-- Header -->
            <div class="card-header">
            <div class="row justify-content-between align-items-center flex-grow-1">
                <div class="col-md">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-header-title">Users</h4>

                    <!-- Datatable Info -->
                    <div id="datatableCounterInfo" style="display: none;">
                    <div class="d-flex align-items-center">
                        <span class="fs-6 me-3">
                        <span id="datatableCounter">0</span>
                        Selected
                        </span>
                        <a class="btn btn-outline-danger btn-sm" href="javascript:;">
                        <i class="tio-delete-outlined"></i> Delete
                        </a>
                    </div>
                    </div>
                    <!-- End Datatable Info -->
                </div>
                </div>
                <!-- End Col -->

                <div class="col-auto">
                <!-- Filter -->
                <div class="row align-items-sm-center">
                    <div class="col-sm-auto">
                    <div class="row align-items-center gx-0">
                        <div class="col">
                        <span class="text-secondary me-2">Status:</span>
                        </div>
                        <!-- End Col -->

                        <div class="col-auto">
                        <!-- Select -->
                        <div class="tom-select-custom tom-select-custom-end">
                            <select class="js-select js-datatable-filter form-select form-select-sm form-select-borderless" data-target-column-index="2" data-target-table="datatable" autocomplete="off" data-hs-tom-select-options='{
                                    "searchInDropdown": false,
                                    "hideSearch": true,
                                    "dropdownWidth": "10rem"
                                    }'>
                            <option value="null" selected>All</option>
                            <option value="successful">Successful</option>
                            <option value="overdue">Overdue</option>
                            <option value="pending">Pending</option>
                            </select>
                        </div>
                        <!-- End Select -->
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-auto">
                    <div class="row align-items-center gx-0">
                        <div class="col">
                        <span class="text-secondary me-2">Signed up:</span>
                        </div>
                        <!-- End Col -->

                        <div class="col-auto">
                        <!-- Select -->
                        <div class="tom-select-custom tom-select-custom-end">
                            <select class="js-select js-datatable-filter form-select form-select-sm form-select-borderless" data-target-column-index="5" data-target-table="datatable" autocomplete="off" data-hs-tom-select-options='{
                                    "searchInDropdown": false,
                                    "hideSearch": true,
                                    "dropdownWidth": "10rem"
                                    }'>
                            <option value="null" selected>All</option>
                            <option value="1 year ago">1 year ago</option>
                            <option value="6 months ago">6 months ago</option>
                            </select>
                        </div>
                        <!-- End Select -->
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                    </div>
                    <!-- End Col -->

                    <div class="col-md">
                    <form>
                        <!-- Search -->
                        <div class="input-group input-group-merge input-group-flush">
                        <div class="input-group-prepend input-group-text">
                            <i class="bi-search"></i>
                        </div>
                        <input id="datatableSearch" type="search" class="form-control" placeholder="Search users" aria-label="Search users">
                        </div>
                        <!-- End Search -->
                    </form>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Filter -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
            </div>
            <!-- End Header -->

            <!-- Table -->
            <div class="table-responsive datatable-custom">
            <table id="datatable" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table" data-hs-datatables-options='{
                    "columnDefs": [{
                        "targets": [0, 1, 4],
                        "orderable": false
                        }],
                    "order": [],
                    "info": {
                        "totalQty": "#datatableWithPaginationInfoTotalQty"
                    },
                    "search": "#datatableSearch",
                    "entries": "#datatableEntries",
                    "pageLength": 8,
                    "isResponsive": false,
                    "isShowPaging": false,
                    "pagination": "datatablePagination"
                    }'>
                <thead class="thead-light">
                    <tr>
                        <th scope="col" class="table-column-pe-0">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="datatableCheckAll">
                            <label class="form-check-label" for="datatableCheckAll"></label>
                        </div>
                        </th>
                        <th class="table-column-ps-0">Full name</th>
                        <th>Status</th>
                        <th>Type</th>
                        <th>Email</th>
                        <th>Signed up</th>
                        <th>User ID</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td class="table-column-pe-0">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="usersDataCheck2">
                            <label class="form-check-label" for="usersDataCheck2"></label>
                        </div>
                        </td>
                        <td class="table-column-ps-0">
                        <a class="d-flex align-items-center" href="user-profile.html">
                            <div class="flex-shrink-0">
                            <div class="avatar avatar-sm avatar-circle">
                                <img class="avatar-img" src="assets/img/160x160/img10.jpg" alt="Image Description">
                            </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                            <h5 class="text-inherit mb-0">Amanda Harvey <i class="bi-patch-check-fill text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Top endorsed"></i></h5>
                            </div>
                        </a>
                        </td>
                        <td>
                        <span class="legend-indicator bg-success"></span>Successful
                        </td>
                        <td>Unassigned</td>
                        <td>amanda@site.com</td>
                        <td>1 year ago</td>
                        <td>67989</td>
                    </tr>
                </tbody>
            </table>
            </div>
            <!-- End Table -->

            <!-- Footer -->
            <div class="card-footer">
            <!-- Pagination -->
            <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                <div class="col-sm mb-2 mb-sm-0">
                <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                    <span class="me-2">Showing:</span>

                    <!-- Select -->
                    <div class="tom-select-custom">
                    <select id="datatableEntries" class="js-select form-select form-select-borderless w-auto" autocomplete="off" data-hs-tom-select-options='{
                                "searchInDropdown": false,
                                "hideSearch": true
                            }'>
                        <option value="4">4</option>
                        <option value="6">6</option>
                        <option value="8" selected>8</option>
                        <option value="12">12</option>
                    </select>
                    </div>
                    <!-- End Select -->

                    <span class="text-secondary me-2">of</span>

                    <!-- Pagination Quantity -->
                    <span id="datatableWithPaginationInfoTotalQty"></span>
                </div>
                </div>
                <!-- End Col -->

                <div class="col-sm-auto">
                <div class="d-flex justify-content-center justify-content-sm-end">
                    <!-- Pagination -->
                    <nav id="datatablePagination" aria-label="Activity pagination"></nav>
                </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Pagination -->
            </div>
        </div>
    </div>

<?php include "./components/footer.php"; ?>