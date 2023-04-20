<?php
$page = "Users";
include "./components/header.php";
include "./components/navbar.php";
include "./components/side-navbar.php";
?>
<main id="content" role="main" class="main">

    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title">profile</h1>
                </div>

                <div class="col-sm-auto">
                    <button class="btn btn-dark" onclick="history.back()">
                    <i class="bi-arrow-left me-1"></i> Go Back
                    </button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <div class="navbar-expand-lg navbar-vertical mb-3 mb-lg-5">
                    <div class="d-grid">
                        <button type="button" class="navbar-toggler btn btn-white mb-3" data-bs-toggle="collapse" data-bs-target="#navbarVerticalNavMenu" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navbarVerticalNavMenu">
                            <span class="d-flex justify-content-between align-items-center">
                                <span class="text-dark">Menu</span>

                                <span class="navbar-toggler-default">
                                    <i class="bi-list"></i>
                                </span>

                                <span class="navbar-toggler-toggled">
                                    <i class="bi-x"></i>
                                </span>
                            </span>
                        </button>
                    </div>

                    <?php
                        $id = $_GET['id'];
                        $select_query = "SELECT * FROM users WHERE id ='$id'";
                        $result = mysqli_query($conn, $select_query);
                        if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $picture = $row['picture'];
                            $firstName = $row['firstName'];
                            $lastName = $row['lastName'];
                            $email = $row['email'];
                            $phone = $row['phone'];
                            $accountType = $row['accountType'];
                            $registrationDate = strtotime($dateCreated);
                            $verified = $row['verified'];
                            switch ($verified) {
                                case "1";
                                    $class  = 'bg-soft-success';
                                    $text = 'text-success';
                                    $status = 'Account verified';
                                    break;
                                case "0";
                                    $class  = 'bg-soft-danger';
                                    $text = 'text-danger';
                                    $status = 'Account not verified';
                                    break;
                                default:
                                    $class  = '';
                            }
                    ?>
                    <div id="navbarVerticalNavMenu" class="collapse navbar-collapse" style="">
                        <ul id="navbarSettings" class="js-sticky-block js-scrollspy card card-navbar-nav nav nav-tabs nav-lg nav-vertical" data-hs-sticky-block-options="{
                                &quot;parentSelector&quot;: &quot;#navbarVerticalNavMenu&quot;,
                                &quot;targetSelector&quot;: &quot;#header&quot;,
                                &quot;breakpoint&quot;: &quot;lg&quot;,
                                &quot;startPoint&quot;: &quot;#navbarVerticalNavMenu&quot;,
                                &quot;endPoint&quot;: &quot;#stickyBlockEndPoint&quot;,
                                &quot;stickyOffsetTop&quot;: 20
                            }" style="">
                            <li class="nav-item">
                                <a class="nav-link" href="#basicInformation">
                                    <i class="bi-person nav-icon"></i> Basic information
                                </a>
                            </li>
                            <li class="nav-item <?php if($accountType=='Reseller'){echo 'd-none';}else{ echo'd-unset';}?>">
                                <a class="nav-link" href="#merchantInformation">
                                    <i class="bi-award nav-icon"></i> Merchant information
                                </a>
                            </li>
                            <li class="nav-item <?php if($accountType=='Merchant'){echo 'd-none';}else{ echo'd-unset';}?>">
                                <a class="nav-link" href="#resellerInformation">
                                    <i class="bi-award nav-icon"></i> Reseller information
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#deleteAccountSection">
                                    <i class="bi-trash nav-icon"></i> Delete account
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="d-grid gap-3 gap-lg-5">
                    <div class="card">
                        <div class="profile-cover">
                            <div class="profile-cover-img-wrapper">
                                <img id="profileCoverImg" class="profile-cover-img" src="./assets/img/img2.jpeg" alt="header image">
                            </div>
                        </div>
                        
                        <label class="avatar avatar-xxl avatar-circle avatar-uploader profile-cover-avatar" for="editAvatarUploaderModal">
                            <img id="editAvatarImgModal" class="avatar-img" src="../sidehuzzle/<?php echo $picture; ?>" alt="User Avatar">
                        </label>
                        
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col text-center">
                                    <h2 class="text-dark"><?php echo $firstName; ?> <?php echo $lastName; ?></h2>
                                    <span class="badge <?php echo $class; ?> <?php echo $text; ?>"><?php echo $status; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- Basic Information -->
                <div class="card" id="basicInformation">
                    <div class="card-header">
                        <h2 class="card-title h4">Basic information</h2>
                    </div>

                    <div class="card-body">
                        <form>
                            <div class="row mb-4">
                                <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">Full name</label>

                                <div class="col-sm-9">
                                <div class="input-group input-group-sm-vertical">
                                    <input type="text" class="form-control" name="firstName" id="firstNameLabel" placeholder="Your first name" aria-label="Your first name" value="<?php echo $firstName; ?>">
                                    <input type="text" class="form-control" name="lastName" id="lastNameLabel" placeholder="Your last name" aria-label="Your last name" value="<?php echo $lastName; ?>">
                                </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="emailLabel" class="col-sm-3 col-form-label form-label">Email</label>

                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" id="emailLabel" placeholder="Email" aria-label="Email" value="<?php echo $email; ?>">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="phoneLabel" class="col-sm-3 col-form-label form-label">Phone</label>

                                <div class="col-sm-9">
                                    <input type="text" class="js-input-mask form-control" name="phone" id="phoneLabel" placeholder="+x(xxx)xxx-xx-xx" aria-label="+x(xxx)xxx-xx-xx" value="<?php echo $phone; ?>" data-hs-mask-options="{
                                        &quot;mask&quot;: &quot;+0(000)000-00-00&quot;
                                        }">
                                </div>
                            </div>

                            <div id="accountType" class="row mb-4">
                                <label class="col-sm-3 col-form-label form-label">Account type</label>

                                <div class="col-sm-9">
                                    <div class="input-group input-group-sm-vertical">
                                        <label class="form-control" for="userAccountTypeRadio1">
                                            <span class="form-check">
                                                <input type="radio" class="form-check-input" name="userAccountTypeRadio" id="userAccountTypeRadio1" <?php if($accountType=='Merchant'){echo 'checked';}?>>
                                                <span class="form-check-label">Merchant</span>
                                            </span>
                                        </label>

                                        <label class="form-control" for="userAccountTypeRadio2">
                                            <span class="form-check">
                                                <input type="radio" class="form-check-input" name="userAccountTypeRadio" id="userAccountTypeRadio2" <?php if($accountType=='Reseller'){echo 'checked';}?>>
                                                <span class="form-check-label">Reseller</span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
                <!-- End Basic Information -->

                <!-- Merchant Information -->
                <div class="card <?php if($accountType=='Reseller'){echo 'd-none';}else{ echo'd-unset';}?>" id="merchantInformation">
                    <div class="card-header">
                        <h2 class="card-title h4">Merchant information</h2>
                    </div>
                    <?php
                        $id = $_GET['id'];
                        $select_query = "SELECT * FROM merchantbio WHERE userID ='$id'";
                        $result = mysqli_query($conn, $select_query);
                        if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $companyName = $row['companyName'];
                            $businessType = $row['businessType'];
                            $city = $row['city'];
                            $state = $row['state'];
                            $country = $row['country'];
                            $postalCode = $row['postalCode'];
                            $businessAddress = $row['businessAddress'];
                            $businessEmail = $row['businessEmail'];
                            $businessPhone = $row['businessPhone'];
                            $websiteURL = $row['websiteURL'];
                            $commissionRate = $row['commissionRate'];
                            $paymentMethod = $row['paymentMethod'];
                            $description = $row['description'];
                            $dateCreated = $row['dateCreated'];
                            $entryDate = strtotime($dateCreated);
                            $verified = $row['verified'];
                            switch ($verified) {
                                case "1";
                                    $class  = 'bg-soft-success';
                                    $text = 'text-success';
                                    $status = 'Account verified';
                                    break;
                                case "0";
                                    $class  = 'bg-soft-danger';
                                    $text = 'text-danger';
                                    $status = 'Account not verified';
                                    break;
                                default:
                                    $class  = '';
                            }
                    ?>
                    <div class="card-body">
                        <form>
                            <div class="row mb-4">
                                <label for="emailLabel" class="col-sm-3 col-form-label form-label">Company name</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" id="emailLabel" placeholder="Email" aria-label="Email" value="<?php echo $companyName; ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="emailLabel" class="col-sm-3 col-form-label form-label">Business type</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" id="emailLabel" placeholder="Email" aria-label="Email" value="<?php echo $businessType; ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="emailLabel" class="col-sm-3 col-form-label form-label">Business address</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" id="emailLabel" placeholder="Email" aria-label="Email" value="<?php echo $businessAddress; ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="emailLabel" class="col-sm-3 col-form-label form-label">City</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" id="emailLabel" placeholder="Email" aria-label="Email" value="<?php echo $city; ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="emailLabel" class="col-sm-3 col-form-label form-label">State/Province</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" id="emailLabel" placeholder="Email" aria-label="Email" value="<?php echo $state; ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="emailLabel" class="col-sm-3 col-form-label form-label">Country</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" id="emailLabel" placeholder="Email" aria-label="Email" value="<?php echo $country; ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="emailLabel" class="col-sm-3 col-form-label form-label">Postal code</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" id="emailLabel" placeholder="Email" aria-label="Email" value="<?php echo $postalCode; ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="emailLabel" class="col-sm-3 col-form-label form-label">Business email</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" id="emailLabel" placeholder="Email" aria-label="Email" value="<?php echo $businessEmail; ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="emailLabel" class="col-sm-3 col-form-label form-label">Business phone</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" id="emailLabel" placeholder="Email" aria-label="Email" value="<?php echo $businessPhone; ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="emailLabel" class="col-sm-3 col-form-label form-label">Website URL</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" id="emailLabel" placeholder="Email" aria-label="Email" value="<?php echo $websiteURL; ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="emailLabel" class="col-sm-3 col-form-label form-label">Commission rate</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" id="emailLabel" placeholder="Email" aria-label="Email" value="<?php echo $commissionRate; ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="emailLabel" class="col-sm-3 col-form-label form-label">Payment method</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" id="emailLabel" placeholder="Email" aria-label="Email" value="<?php echo $paymentMethod; ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="emailLabel" class="col-sm-3 col-form-label form-label">Description</label>

                                <div class="col-sm-9">
                                    <textarea class="form-control" rows="5" placeholder="Enter a brief description of the products/services you offer" name="description" required><?php echo $description; ?></textarea>
                                </div>
                            </div>

                            <!-- <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div> -->
                        </form>
                    </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <!-- End Merchant Information -->

                <!-- Reseller Information -->
                <div class="card <?php if($accountType=='Merchant'){echo 'd-none';}else{ echo'd-unset';}?>" id="resellerInformation">
                    <div class="card-header">
                        <h2 class="card-title h4">Reseller information</h2>
                    </div>
                    <?php
                        $id = $_GET['id'];
                        $select_query = "SELECT * FROM resellerbio WHERE userID ='$id'";
                        $result = mysqli_query($conn, $select_query);
                        if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $companyName = $row['companyName'];
                            $address = $row['address'];
                            $city = $row['city'];
                            $state = $row['state'];
                            $country = $row['country'];
                            $postalCode = $row['postalCode'];
                            $websiteURL = $row['websiteURL'];
                            $paymentMethod = $row['paymentMethod'];
                            $dateCreated = $row['dateCreated'];
                            $entryDate = strtotime($dateCreated);
                            $verified = $row['verified'];
                            switch ($verified) {
                                case "1";
                                    $class  = 'bg-soft-success';
                                    $text = 'text-success';
                                    $status = 'Account verified';
                                    break;
                                case "0";
                                    $class  = 'bg-soft-danger';
                                    $text = 'text-danger';
                                    $status = 'Account not verified';
                                    break;
                                default:
                                    $class  = '';
                            }
                    ?>
                    <div class="card-body">
                        <form>
                            <div class="row mb-4">
                                <label for="emailLabel" class="col-sm-3 col-form-label form-label">Company name</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" id="emailLabel" placeholder="Email" aria-label="Email" value="<?php echo $companyName; ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="emailLabel" class="col-sm-3 col-form-label form-label">Business address</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" id="emailLabel" placeholder="Email" aria-label="Email" value="<?php echo $address; ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="emailLabel" class="col-sm-3 col-form-label form-label">City</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" id="emailLabel" placeholder="Email" aria-label="Email" value="<?php echo $city; ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="emailLabel" class="col-sm-3 col-form-label form-label">State/Province</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" id="emailLabel" placeholder="Email" aria-label="Email" value="<?php echo $state; ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="emailLabel" class="col-sm-3 col-form-label form-label">Country</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" id="emailLabel" placeholder="Email" aria-label="Email" value="<?php echo $country; ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="emailLabel" class="col-sm-3 col-form-label form-label">Postal code</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" id="emailLabel" placeholder="Email" aria-label="Email" value="<?php echo $postalCode; ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="emailLabel" class="col-sm-3 col-form-label form-label">Website URL</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" id="emailLabel" placeholder="Email" aria-label="Email" value="<?php echo $websiteURL; ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="emailLabel" class="col-sm-3 col-form-label form-label">Payment method</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" id="emailLabel" placeholder="Email" aria-label="Email" value="<?php echo $paymentMethod; ?>" readonly>
                                </div>
                            </div>

                            <!-- <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div> -->
                        </form>
                    </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <!-- End Reseller Information -->

                <!-- Delete Account -->
                <div id="deleteAccountSection" class="card">
                    <div class="card-header">
                        <h4 class="card-title">Delete your account</h4>
                    </div>

                    <div class="card-body">
                        <p class="card-text">When you delete this account, the user loses access to sidehuzzle account services, and information permanently deleted data.</p>

                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="deleteAccountCheckbox">
                                <label class="form-check-label" for="deleteAccountCheckbox">
                                Confirm that I want to delete my account.
                                </label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-3">
                            <button type="button" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
                <!-- End Delete Account -->

            </div>

            <!-- Sticky Block End Point -->
            <div id="stickyBlockEndPoint"></div>
            </div>
            <?php 
                }
                    }
            ?>
        </div>
    </div>

<?php include "./components/footer.php"; ?>