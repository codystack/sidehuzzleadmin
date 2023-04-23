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
                                $categories = $row['categories'];
                                $commission = $row['commission'];
                                $youtubeLink = $row['youtubeLink'];
                                $otherLink = $row['otherLink'];
                                $website = $row['website'];
                                $gigDescription = $row['gigDescription'];
                                $dateCreated = $row['dateCreated'];
                                $registrationDate = strtotime($dateCreated);
                                $status = $row['status'];
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

                <div class="card mb-4">
                    <div class="card-body py-0 pt-3">
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
                                    <a class="nav-link active">Gig Details</a>
                                </li>

                            <li class="nav-item ms-auto">
                                <div class="d-flex gap-2">
                                    <form>
                                        <button class="btn btn-outline-success btn-sm <?php if($status=='Approved'){echo 'd-none';}else{ echo'd-unset';}?>" name="">
                                            <i class="bi-check"></i> Approve
                                        </button>
                                        <button class="btn btn-danger btn-sm <?php if($status=='Approved'){echo 'd-none';}elseif($status=='Banned'){echo 'd-none';}else{ echo'd-unset';}?>" name="">
                                            <i class="bi-x"></i> Ban Gig
                                        </button>
                                        <button class="btn btn-danger btn-sm <?php if($status=='Pending'){echo 'd-none';}elseif($status=='Banned'){echo 'd-unset';}else{ echo'd-unset';}?>" name="">
                                            <i class="bi-trash"></i> Delete
                                        </button>
                                    </form>

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
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                    <!-- Card -->
                    <div class="card mb-3 mb-lg-5">
                    
                        <div class="card-header">
                            <h4 class="card-header-title">Gig information</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <label for="productNameLabel" class="form-label">Gig title</label>
                                <input type="text" class="form-control" name="title" id="productNameLabel" value="<?php echo $title; ?>">
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-4">
                                        <label for="SKULabel" class="form-label">Pay Out</label>
                                        <input type="text" class="form-control" name="SKU" readonly="" value="<?php echo $payOut; ?>">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-4">
                                        <label for="weightLabel" class="form-label">Commission</label>

                                        <div class="input-group">
                                            <input type="text" class="form-control" name="weightName" readonly="" value="<?php echo $commission; ?>">
                                            <button class="js-clipboard input-group-append input-group-text" data-bs-toggle="tooltip" data-bs-original-title="Percentage">
                                            <i id="apiKeyCodeIcon3" class="bi-percent"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-4">
                                        <label for="SKULabel" class="form-label">Categories</label>
                                        <input type="text" class="form-control" name="SKU" readonly="" value="<?php echo $categories; ?>">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-4">
                                        <label for="SKULabel" class="form-label">Youtube Link</label>

                                        <div class="input-group">
                                            <input id="apiKeyCode3" type="text" class="form-control" readonly="" value="<?php echo $youtubeLink; ?>">
                                            <a class="js-clipboard input-group-append input-group-text" href="javascript:;" data-bs-toggle="tooltip" data-hs-clipboard-options="{
                                                &quot;type&quot;: &quot;tooltip&quot;,
                                                &quot;successText&quot;: &quot;Copied!&quot;,
                                                &quot;contentTarget&quot;: &quot;#apiKeyCode3&quot;,
                                                &quot;classChangeTarget&quot;: &quot;#apiKeyCodeIcon3&quot;,
                                                &quot;defaultClass&quot;: &quot;bi-clipboard&quot;,
                                                &quot;successClass&quot;: &quot;bi-check&quot;
                                            }" aria-label="Copy to clipboard" data-bs-original-title="Copy to clipboard">
                                            <i id="apiKeyCodeIcon3" class="bi-clipboard"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-4">
                                        <label for="SKULabel" class="form-label">Website Link</label>

                                        <div class="input-group">
                                            <input id="apiKeyCode3" type="text" class="form-control" readonly="" value="<?php echo $website; ?>">
                                            <a class="js-clipboard input-group-append input-group-text" href="javascript:;" data-bs-toggle="tooltip" data-hs-clipboard-options="{
                                                &quot;type&quot;: &quot;tooltip&quot;,
                                                &quot;successText&quot;: &quot;Copied!&quot;,
                                                &quot;contentTarget&quot;: &quot;#apiKeyCode3&quot;,
                                                &quot;classChangeTarget&quot;: &quot;#apiKeyCodeIcon3&quot;,
                                                &quot;defaultClass&quot;: &quot;bi-clipboard&quot;,
                                                &quot;successClass&quot;: &quot;bi-check&quot;
                                            }" aria-label="Copy to clipboard" data-bs-original-title="Copy to clipboard">
                                            <i id="apiKeyCodeIcon3" class="bi-clipboard"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-4">
                                        <label for="SKULabel" class="form-label">Other Link</label>

                                        <div class="input-group">
                                            <input id="apiKeyCode3" type="text" class="form-control" readonly="" value="<?php echo $otherLink; ?>">
                                            <a class="js-clipboard input-group-append input-group-text" href="javascript:;" data-bs-toggle="tooltip" data-hs-clipboard-options="{
                                                &quot;type&quot;: &quot;tooltip&quot;,
                                                &quot;successText&quot;: &quot;Copied!&quot;,
                                                &quot;contentTarget&quot;: &quot;#apiKeyCode3&quot;,
                                                &quot;classChangeTarget&quot;: &quot;#apiKeyCodeIcon3&quot;,
                                                &quot;defaultClass&quot;: &quot;bi-clipboard&quot;,
                                                &quot;successClass&quot;: &quot;bi-check&quot;
                                            }" aria-label="Copy to clipboard" data-bs-original-title="Copy to clipboard">
                                            <i id="apiKeyCodeIcon3" class="bi-clipboard"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="mb-4">
                                    <label class="form-label">Description</label>
                                    <div class="quill-custom">
                                        <div class="js-quill ql-container ql-snow hs-quill-initialized" style="height: 15rem;" data-hs-quill-options="{
                                            &quot;placeholder&quot;: &quot;Type your description...&quot;,
                                            &quot;modules&quot;: {
                                                &quot;toolbar&quot;: [
                                                [&quot;bold&quot;, &quot;italic&quot;, &quot;underline&quot;, &quot;strike&quot;, &quot;link&quot;, &quot;image&quot;, &quot;blockquote&quot;, &quot;code&quot;, {&quot;list&quot;: &quot;bullet&quot;}]
                                                ]
                                            }
                                            }">
                                            <div class="ql-editor" data-gramm="false" contenteditable="true" data-placeholder="Type your description...">
                                                <p><?php echo $gigDescription; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
                    <div class="card mb-3 mb-lg-5">
                        <!-- Header -->
                        <div class="card-header card-header-content-between">
                        <h4 class="card-header-title">Media</h4>

                        <!-- Dropdown -->
                        <div class="dropdown">
                            <button type="button" class="btn btn-ghost-secondary btn-sm" id="mediaDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Add media from URL <i class="bi-chevron-down"></i>
                            </button>

                            <div class="dropdown-menu dropdown-menu-end mt-1">
                            <a class="dropdown-item" href="javascript:;" data-bs-toggle="modal" data-bs-target="#addImageFromURLModal">
                                <i class="bi-link dropdown-item-icon"></i> Add image from URL
                            </a>
                            <a class="dropdown-item" href="javascript:;" data-bs-toggle="modal" data-bs-target="#embedVideoModal">
                                <i class="bi-youtube dropdown-item-icon"></i> Embed video
                            </a>
                            </div>
                        </div>
                        <!-- End Dropdown -->
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body">
                        <!-- Gallery -->
                        <div id="fancyboxGallery" class="js-fancybox row justify-content-sm-center gx-3">
                            <div class="col-6 col-sm-4 col-md-3 mb-3 mb-lg-5">
                            <!-- Card -->
                            <div class="card card-sm">
                                <img class="card-img-top" src="./assets/img/400x400/img7.jpg" alt="Image Description">

                                <div class="card-body">
                                <div class="row col-divider text-center">
                                    <div class="col">
                                    <a class="text-body" href="./assets/img/725x1080/img1.jpg" data-bs-toggle="tooltip" data-bs-placement="top" data-fslightbox="gallery" aria-label="View" data-bs-original-title="View">
                                        <i class="bi-eye"></i>
                                    </a>
                                    </div>
                                    <!-- End Col -->

                                    <div class="col">
                                    <a class="text-danger" href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete">
                                        <i class="bi-trash"></i>
                                    </a>
                                    </div>
                                    <!-- End Col -->
                                </div>
                                <!-- End Row -->
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Card -->
                            </div>
                            <!-- End Col -->

                            <div class="col-6 col-sm-4 col-md-3 mb-3 mb-lg-5">
                            <!-- Card -->
                            <div class="card card-sm">
                                <img class="card-img-top" src="./assets/img/400x400/img8.jpg" alt="Image Description">

                                <div class="card-body">
                                <div class="row col-divider text-center">
                                    <div class="col">
                                    <a class="text-body" href="./assets/img/1920x1080/img1.jpg" data-bs-toggle="tooltip" data-bs-placement="top" data-fslightbox="gallery" aria-label="View" data-bs-original-title="View">
                                        <i class="bi-eye"></i>
                                    </a>
                                    </div>
                                    <!-- End Col -->

                                    <div class="col">
                                    <a class="text-danger" href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete">
                                        <i class="bi-trash"></i>
                                    </a>
                                    </div>
                                    <!-- End Col -->
                                </div>
                                <!-- End Row -->
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Card -->
                            </div>
                            <!-- End Col -->

                            <div class="col-6 col-sm-4 col-md-3 mb-3 mb-lg-5">
                            <!-- Card -->
                            <div class="card card-sm">
                                <img class="card-img-top" src="./assets/img/400x400/img9.jpg" alt="Image Description">

                                <div class="card-body">
                                <div class="row col-divider text-center">
                                    <div class="col">
                                    <a class="text-body" href="./assets/img/1920x1080/img2.jpg" data-bs-toggle="tooltip" data-bs-placement="top" data-fslightbox="gallery" aria-label="View" data-bs-original-title="View">
                                        <i class="bi-eye"></i>
                                    </a>
                                    </div>
                                    <!-- End Col -->

                                    <div class="col">
                                    <a class="text-danger" href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete">
                                        <i class="bi-trash"></i>
                                    </a>
                                    </div>
                                    <!-- End Col -->
                                </div>
                                <!-- End Row -->
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Card -->
                            </div>
                            <!-- End Col -->

                            <div class="col-6 col-sm-4 col-md-3 mb-3 mb-lg-5">
                            <!-- Card -->
                            <div class="card card-sm">
                                <img class="card-img-top" src="./assets/img/400x400/img10.jpg" alt="Image Description">

                                <div class="card-body">
                                <div class="row col-divider text-center">
                                    <div class="col">
                                    <a class="text-body" href="./assets/img/1920x1080/img3.jpg" data-bs-toggle="tooltip" data-bs-placement="top" data-fslightbox="gallery" aria-label="View" data-bs-original-title="View">
                                        <i class="bi-eye"></i>
                                    </a>
                                    </div>
                                    <!-- End Col -->

                                    <div class="col">
                                    <a class="text-danger" href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete">
                                        <i class="bi-trash"></i>
                                    </a>
                                    </div>
                                    <!-- End Col -->
                                </div>
                                <!-- End Row -->
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Card -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Gallery -->

                        <!-- Dropzone -->
                        <div id="attachFilesNewProjectLabel" class="js-dropzone dz-dropzone dz-dropzone-card dz-clickable">
                            <div class="dz-message">
                            <img class="avatar avatar-xl avatar-4x3 mb-3" src="./assets/svg/illustrations/oc-browse.svg" alt="Image Description" data-hs-theme-appearance="default">
                            <img class="avatar avatar-xl avatar-4x3 mb-3" src="./assets/svg/illustrations-light/oc-browse.svg" alt="Image Description" data-hs-theme-appearance="dark">

                            <h5>Drag and drop your file here</h5>

                            <p class="mb-2">or</p>

                            <span class="btn btn-white btn-sm">Browse files</span>
                            </div>
                        </div>
                        <!-- End Dropzone -->
                        </div>
                        <!-- Body -->
                    </div>
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