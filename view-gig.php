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
                <!-- End Nav -->

                <div class="row">
                    <div class="col-lg-12">
                    <!-- Card -->
                    <div class="card mb-3 mb-lg-5">
                        <!-- Header -->
                        <div class="card-header">
                        <h4 class="card-header-title">Product information</h4>
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body">
                        <!-- Form -->
                        <div class="mb-4">
                            <label for="productNameLabel" class="form-label">Name <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Products are the goods or services you sell." data-bs-original-title="Products are the goods or services you sell."></i></label>

                            <input type="text" class="form-control" name="productName" id="productNameLabel" placeholder="Shirt, t-shirts, etc." aria-label="Shirt, t-shirts, etc." value="Tiro track jacket">
                        </div>
                        <!-- End Form -->

                        <div class="row">
                            <div class="col-sm-6">
                            <!-- Form -->
                            <div class="mb-4">
                                <label for="SKULabel" class="form-label">SKU</label>

                                <input type="text" class="form-control" name="SKU" id="SKULabel" placeholder="eg. 348121032" aria-label="eg. 348121032" value="124617209">
                            </div>
                            <!-- End Form -->
                            </div>
                            <!-- End Col -->

                            <div class="col-sm-6">
                            <!-- Form -->
                            <div class="mb-4">
                                <label for="weightLabel" class="form-label">Weight</label>

                                <div class="input-group">
                                <input type="text" class="form-control" name="weightName" id="weightLabel" placeholder="0.0" aria-label="0.0" value="0.2">
                                <div class="input-group-append">
                                    <!-- Select -->
                                    <div class="tom-select-custom tom-select-custom-end">
                                    <select class="js-select form-select tomselected ts-hidden-accessible" data-hs-tom-select-options="{
                                                &quot;searchInDropdown&quot;: false,
                                                &quot;hideSearch&quot;: true,
                                                &quot;dropdownWidth&quot;: &quot;6rem&quot;
                                            }" id="tomselect-1" tabindex="-1">
                                        <option value="lb">lb</option>
                                        <option value="oz">oz</option>
                                        
                                        <option value="g">g</option>
                                    <option value="kg" selected="">kg</option></select><div class="ts-wrapper js-select form-select single plugin-change_listener plugin-hs_smart_position input-hidden full has-items"><div class="ts-control"><div data-value="kg" class="item" data-ts-item="">kg</div></div><div class="tom-select-custom"><div class="ts-dropdown single plugin-change_listener plugin-hs_smart_position" style="display: none;"><div role="listbox" tabindex="-1" class="ts-dropdown-content" id="tomselect-1-ts-dropdown"></div></div></div></div>
                                    </div>
                                    <!-- End Select -->
                                </div>
                                </div>

                                <small class="form-text">Used to calculate shipping rates at checkout and label prices during fulfillment.</small>
                            </div>
                            <!-- End Form -->
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->

                        <label class="form-label">Description <span class="form-label-secondary">(Optional)</span></label>

                        <!-- Quill -->
                        <div class="quill-custom">
                            <div class="ql-toolbar ql-snow"><span class="ql-formats"><button type="button" class="ql-bold"><svg viewBox="0 0 18 18"> <path class="ql-stroke" d="M5,4H9.5A2.5,2.5,0,0,1,12,6.5v0A2.5,2.5,0,0,1,9.5,9H5A0,0,0,0,1,5,9V4A0,0,0,0,1,5,4Z"></path> <path class="ql-stroke" d="M5,9h5.5A2.5,2.5,0,0,1,13,11.5v0A2.5,2.5,0,0,1,10.5,14H5a0,0,0,0,1,0,0V9A0,0,0,0,1,5,9Z"></path> </svg></button><button type="button" class="ql-italic"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="7" x2="13" y1="4" y2="4"></line> <line class="ql-stroke" x1="5" x2="11" y1="14" y2="14"></line> <line class="ql-stroke" x1="8" x2="10" y1="14" y2="4"></line> </svg></button><button type="button" class="ql-underline"><svg viewBox="0 0 18 18"> <path class="ql-stroke" d="M5,3V9a4.012,4.012,0,0,0,4,4H9a4.012,4.012,0,0,0,4-4V3"></path> <rect class="ql-fill" height="1" rx="0.5" ry="0.5" width="12" x="3" y="15"></rect> </svg></button><button type="button" class="ql-strike"><svg viewBox="0 0 18 18"> <line class="ql-stroke ql-thin" x1="15.5" x2="2.5" y1="8.5" y2="9.5"></line> <path class="ql-fill" d="M9.007,8C6.542,7.791,6,7.519,6,6.5,6,5.792,7.283,5,9,5c1.571,0,2.765.679,2.969,1.309a1,1,0,0,0,1.9-.617C13.356,4.106,11.354,3,9,3,6.2,3,4,4.538,4,6.5a3.2,3.2,0,0,0,.5,1.843Z"></path> <path class="ql-fill" d="M8.984,10C11.457,10.208,12,10.479,12,11.5c0,0.708-1.283,1.5-3,1.5-1.571,0-2.765-.679-2.969-1.309a1,1,0,1,0-1.9.617C4.644,13.894,6.646,15,9,15c2.8,0,5-1.538,5-3.5a3.2,3.2,0,0,0-.5-1.843Z"></path> </svg></button><button type="button" class="ql-link"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="7" x2="11" y1="7" y2="11"></line> <path class="ql-even ql-stroke" d="M8.9,4.577a3.476,3.476,0,0,1,.36,4.679A3.476,3.476,0,0,1,4.577,8.9C3.185,7.5,2.035,6.4,4.217,4.217S7.5,3.185,8.9,4.577Z"></path> <path class="ql-even ql-stroke" d="M13.423,9.1a3.476,3.476,0,0,0-4.679-.36,3.476,3.476,0,0,0,.36,4.679c1.392,1.392,2.5,2.542,4.679.36S14.815,10.5,13.423,9.1Z"></path> </svg></button><button type="button" class="ql-image"><svg viewBox="0 0 18 18"> <rect class="ql-stroke" height="10" width="12" x="3" y="4"></rect> <circle class="ql-fill" cx="6" cy="7" r="1"></circle> <polyline class="ql-even ql-fill" points="5 12 5 11 7 9 8 10 11 7 13 9 13 12 5 12"></polyline> </svg></button><button type="button" class="ql-blockquote"><svg viewBox="0 0 18 18"> <rect class="ql-fill ql-stroke" height="3" width="3" x="4" y="5"></rect> <rect class="ql-fill ql-stroke" height="3" width="3" x="11" y="5"></rect> <path class="ql-even ql-fill ql-stroke" d="M7,8c0,4.031-3,5-3,5"></path> <path class="ql-even ql-fill ql-stroke" d="M14,8c0,4.031-3,5-3,5"></path> </svg></button><button type="button" class="ql-code"><svg viewBox="0 0 18 18"> <polyline class="ql-even ql-stroke" points="5 7 3 9 5 11"></polyline> <polyline class="ql-even ql-stroke" points="13 7 15 9 13 11"></polyline> <line class="ql-stroke" x1="10" x2="8" y1="5" y2="13"></line> </svg></button><button type="button" class="ql-list" value="bullet"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="6" x2="15" y1="4" y2="4"></line> <line class="ql-stroke" x1="6" x2="15" y1="9" y2="9"></line> <line class="ql-stroke" x1="6" x2="15" y1="14" y2="14"></line> <line class="ql-stroke" x1="3" x2="3" y1="4" y2="4"></line> <line class="ql-stroke" x1="3" x2="3" y1="9" y2="9"></line> <line class="ql-stroke" x1="3" x2="3" y1="14" y2="14"></line> </svg></button></span></div><div class="js-quill ql-container ql-snow hs-quill-initialized" style="height: 15rem;" data-hs-quill-options="{
                                &quot;placeholder&quot;: &quot;Type your description...&quot;,
                                &quot;modules&quot;: {
                                    &quot;toolbar&quot;: [
                                    [&quot;bold&quot;, &quot;italic&quot;, &quot;underline&quot;, &quot;strike&quot;, &quot;link&quot;, &quot;image&quot;, &quot;blockquote&quot;, &quot;code&quot;, {&quot;list&quot;: &quot;bullet&quot;}]
                                    ]
                                }
                                }"><div class="ql-editor" data-gramm="false" contenteditable="true" data-placeholder="Type your description..."><p>Train hard. Stay dry. This soccer jacket is made of soft, sweat-wicking fabric that keeps you moving on the practice field. Stretch panels at the elbows and sides give you a full range of motion as you work.</p><p><br></p><h3>Specifications</h3><ul><li>Regular fit is wider at the body, with a straight silhouette</li><li>Ribbed stand-up collar</li><li>Long sleeves with ribbed cuffs</li><li>100% polyester doubleknit</li><li>Front zip pockets; Full zip; Ribbing details; Ribbed hem</li></ul></div><div class="ql-clipboard" contenteditable="true" tabindex="-1"></div><div class="ql-tooltip ql-hidden"><a class="ql-preview" rel="noopener noreferrer" target="_blank" href="about:blank"></a><input type="text" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL"><a class="ql-action"></a><a class="ql-remove"></a></div></div>
                        </div>
                        <!-- End Quill -->
                        </div>
                        <!-- Body -->
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