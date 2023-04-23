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
                    </div>
                </div>
            </div>

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
            <div class="card-header">
                <div class="row justify-content-between align-items-center flex-grow-1">
                    <div class="col-md">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-header-title">Top 5 Gigs</h4>

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
                        </div>
                    </div>

                    <div class="col-auto">
                        <div class="row align-items-sm-center">
                            <div class="col-md">
                                <form>
                                    <div class="input-group input-group-merge input-group-flush">
                                        <div class="input-group-prepend input-group-text">
                                            <i class="bi-search"></i>
                                        </div>
                                        <input id="datatableSearch" type="search" class="form-control" placeholder="Search users" aria-label="Search users">
                                    </div>
                                </form>
                            </div>

                            <div class="col-sm-auto">
                                <div class="row align-items-center gx-0">
                                    <div class="col">
                                        <a href="all-gigs" class="btn btn-dark me-2">View all</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
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
                            <th class="table-column-ps-0">SN</th>
                            <th>Gig title</th>
                            <th>Gig ID</th>
                            <th>Status</th>
                            <th>Pay out</th>
                            <th>Commission</th>
                            <th>Created date</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                        $gig_id = 1;
                        $select_query = "SELECT * FROM gigs ORDER BY dateCreated DESC LIMIT 5";
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
                    echo "<tr>";
                    echo "<td class='table-column-pe-0'>
                            <div class='form-check'>
                                <input class='form-check-input' type='checkbox' value='' id='usersDataCheck2'>
                                <label class='form-check-label' for='usersDataCheck2'></label>
                            </div>
                        </td>";
                        echo "<td class='table-column-ps-0'>".$gig_id."</td>";
                        echo "<td>
                            <a class='d-flex align-items-center' href='view-gig?id=$id'>
                                <div class='flex-shrink-0'>
                                    <div class='avatar avatar-sm avatar-circle'>
                                        <img class='avatar-img' src='https://sidehuzzlecanada.com/$postAD' alt='Image Description'>
                                    </div>
                                </div>
                                <div class='flex-grow-1 ms-3'>
                                    <h5 class='text-inherit mb-0'>$title</h5>
                                </div>
                            </a>
                        </td>";
                        echo "<td>".$gigID."</td>";
                        echo "<td>
                            <span class=\"badge $class $text\">$status</span>
                        </td>";
                        echo "<td>".$payOut."</td>";
                        echo "<td>".$commission."</td>";
                        echo "<td>".date('j F Y', $registrationDate)."</td>";
                    "</tr>";
                            $gig_id++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            
            <div class="card-footer">
                <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                    <div class="col-sm mb-2 mb-sm-0">
                        <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                            <span class="me-2">Showing:</span>
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

                            <span class="text-secondary me-2">of</span>

                            <span id="datatableWithPaginationInfoTotalQty"></span>
                        </div>
                    </div>

                    <div class="col-sm-auto">
                        <div class="d-flex justify-content-center justify-content-sm-end">
                            <nav id="datatablePagination" aria-label="Activity pagination"></nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include "./components/footer.php"; ?>