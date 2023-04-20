<?php
$page = "Users";
include "./components/header.php";
include "./components/navbar.php";
include "./components/side-navbar.php";
?>
<main id="content" role="main" class="main">

    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title">Users</h1>
                </div>
            </div>
        </div>

        <div class="card mb-3 mb-lg-5">
            <div class="card-header">
                <div class="row justify-content-between align-items-center flex-grow-1">
                    <div class="col-md">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-header-title">Users</h4>
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
                            <th>Full name</th>
                            <th>Status</th>
                            <th>Account Type</th>
                            <th>Email</th>
                            <th>Signed up</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $user_id = 1;
                            $select_query = "SELECT * FROM users ORDER BY dateCreated ASC";
                            $result = mysqli_query($conn, $select_query);
                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['id'];
                                    $firstName = $row['firstName'];
                                    $lastName = $row['lastName'];
                                    $email = $row['email'];
                                    $picture = $row['picture'];
                                    $accountType = $row['accountType'];
                                    $verified = $row['verified'];
                                    $dateCreated = $row['dateCreated'];
                                    $registrationDate = strtotime($dateCreated);
                                    switch ($verified) {
                                        case "1";
                                            $class  = 'bg-soft-success';
                                            $text = 'text-success';
                                            $status = 'Verified';
                                            break;
                                        case "0";
                                            $class  = 'bg-soft-danger';
                                            $text = 'text-danger';
                                            $status = 'Not verified';
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
                            echo "<td class='table-column-ps-0'>".$user_id."</td>";
                            echo "<td>
                                <a class='d-flex align-items-center' href='user-profile?id=$id'>
                                    <div class='flex-shrink-0'>
                                        <div class='avatar avatar-sm avatar-circle'>
                                            <img class='avatar-img' src='../sidehuzzle/$picture' alt='Image Description'>
                                        </div>
                                    </div>
                                    <div class='flex-grow-1 ms-3'>
                                        <h5 class='text-inherit mb-0'>$firstName $lastName</h5>
                                    </div>
                                </a>
                            </td>";
                            echo "<td>
                                <span class=\"badge $class $text\">$status</span>
                            </td>";
                            echo "<td>".$accountType."</td>";
                            echo "<td>".$email."</td>";
                            echo "<td>".date('j F Y', $registrationDate)."</td>";
                        "</tr>";
                        
                            $user_id++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

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