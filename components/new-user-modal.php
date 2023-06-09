<!-- Create a new user Modal -->
<div class="modal fade" id="inviteUserModal" tabindex="-1" aria-labelledby="inviteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="inviteUserModalLabel">Invite users</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Body -->
            <div class="modal-body">
                <!-- Form -->
                <div class="mb-4">
                    <div class="input-group mb-2 mb-sm-0">
                        <input type="text" class="form-control" name="fullName" placeholder="Search name or emails" aria-label="Search name or emails">

                        <div class="input-group-append input-group-append-last-sm-down-none">
                            <!-- Select -->
                            <div class="tom-select-custom tom-select-custom-end">
                                <select class="js-select form-select" autocomplete="off" data-hs-tom-select-options='{
                                            "searchInDropdown": false,
                                            "hideSearch": true,
                                            "dropdownWidth": "11rem"
                                        }'>
                                    <option value="guest" selected>Guest</option>
                                    <option value="can edit">Can edit</option>
                                    <option value="can comment">Can comment</option>
                                    <option value="full access">Full access</option>
                                </select>
                            </div>
                            <!-- End Select -->

                            <a class="btn btn-primary d-none d-sm-inline-block" href="javascript:;">Invite</a>
                        </div>
                    </div>

                    <a class="btn btn-primary w-100 d-sm-none" href="javascript:;">Invite</a>
                </div>
                <!-- End Form -->

                <div class="row">
                    <h5 class="col modal-title">Invite users</h5>

                    <div class="col-auto">
                        <a class="d-flex align-items-center small text-body" href="#">
                            <img class="avatar avatar-xss avatar-4x3 me-2" src="assets/svg/brands/gmail-icon.svg" alt="Image Description">
                            Import contacts
                        </a>
                    </div>
                </div>

                <hr class="mt-2">

                <ul class="list-unstyled list-py-2 mb-0">
                    <!-- List Group Item -->
                    <li>
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <div class="avatar avatar-sm avatar-circle">
                                    <img class="avatar-img" src="assets/img/160x160/img10.jpg" alt="Image Description">
                                </div>
                            </div>

                            <div class="flex-grow-1 ms-3">
                                <div class="row align-items-center">
                                    <div class="col-sm">
                                    <h5 class="mb-0">Amanda Harvey <i class="bi-patch-check-fill text-primary" data-toggle="tooltip" data-placement="top" title="Top endorsed"></i></h5>
                                    <span class="d-block small">amanda@site.com</span>
                                    </div>

                                    <div class="col-sm-auto">
                                    <!-- Select -->
                                        <div class="tom-select-custom tom-select-custom-sm-end">
                                            <select class="js-select form-select form-select-borderless tom-select-custom-form-select-invite-user tom-select-form-select-ps-0" autocomplete="off" data-hs-tom-select-options='{
                                                    "searchInDropdown": false,
                                                    "hideSearch": true,
                                                    "dropdownWidth": "11rem"
                                                    }'>
                                                <option value="guest" selected>Guest</option>
                                                <option value="can edit">Can edit</option>
                                                <option value="can comment">Can comment</option>
                                                <option value="full access">Full access</option>
                                                <option value="remove" data-option-template='<div class="text-danger">Remove</div>'>Remove</option>
                                            </select>
                                        </div>
                                    <!-- End Select -->
                                    </div>
                                </div>
                            <!-- End Row -->
                            </div>
                        </div>
                    </li>
                    <!-- End List Group Item -->

                    <!-- List Group Item -->
                    <li>
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                            <div class="avatar avatar-sm avatar-circle">
                                <img class="avatar-img" src="assets/img/160x160/img3.jpg" alt="Image Description">
                            </div>
                            </div>

                            <div class="flex-grow-1 ms-3">
                                <div class="row align-items-center">
                                    <div class="col-sm">
                                    <h5 class="mb-0">David Harrison</h5>
                                    <span class="d-block small">david@site.com</span>
                                    </div>

                                    <div class="col-sm-auto">
                                    <!-- Select -->
                                        <div class="tom-select-custom tom-select-custom-sm-end">
                                            <select class="js-select form-select form-select-borderless tom-select-custom-form-select-invite-user tom-select-form-select-ps-0" autocomplete="off" data-hs-tom-select-options='{
                                                    "searchInDropdown": false,
                                                    "hideSearch": true,
                                                    "dropdownWidth": "11rem"
                                                    }'>
                                                <option value="guest" selected>Guest</option>
                                                <option value="can edit">Can edit</option>
                                                <option value="can comment">Can comment</option>
                                                <option value="full access">Full access</option>
                                                <option value="remove" data-option-template='<div class="text-danger">Remove</div>'>Remove</option>
                                            </select>
                                        </div>
                                    <!-- End Select -->
                                    </div>
                                </div>
                                <!-- End Row -->
                            </div>
                        </div>
                    </li>
                    <!-- End List Group Item -->

                    <!-- List Group Item -->
                    <li>
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <div class="avatar avatar-sm avatar-circle">
                                    <img class="avatar-img" src="assets/img/160x160/img9.jpg" alt="Image Description">
                                </div>
                            </div>

                            <div class="flex-grow-1 ms-3">
                                <div class="row align-items-center">
                                    <div class="col-sm">
                                        <h5 class="mb-0">Ella Lauda <i class="bi-patch-check-fill text-primary" data-toggle="tooltip" data-placement="top" title="Top endorsed"></i></h5>
                                        <span class="d-block small">Markvt@site.com</span>
                                    </div>

                                    <div class="col-sm-auto">
                                        <!-- Select -->
                                        <div class="tom-select-custom tom-select-custom-sm-end">
                                            <select class="js-select form-select form-select-borderless tom-select-custom-form-select-invite-user tom-select-form-select-ps-0" autocomplete="off" data-hs-tom-select-options='{
                                                    "searchInDropdown": false,
                                                    "hideSearch": true,
                                                    "dropdownWidth": "11rem"
                                                    }'>
                                                <option value="guest" selected>Guest</option>
                                                <option value="can edit">Can edit</option>
                                                <option value="can comment">Can comment</option>
                                                <option value="full access">Full access</option>
                                                <option value="remove" data-option-template='<div class="text-danger">Remove</div>'>Remove</option>
                                            </select>
                                        </div>
                                        <!-- End Select -->
                                    </div>
                                </div>
                            <!-- End Row -->
                            </div>
                        </div>
                    </li>
                    <!-- End List Group Item -->

                    <!-- List Group Item -->
                    <li>
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <div class="avatar avatar-sm avatar-soft-dark avatar-circle">
                                    <span class="avatar-initials">B</span>
                                </div>
                            </div>

                            <div class="flex-grow-1 ms-3">
                                <div class="row align-items-center">
                                    <div class="col-sm">
                                        <h5 class="mb-0">Bob Dean</h5>
                                        <span class="d-block small">bob@site.com</span>
                                    </div>

                                    <div class="col-sm-auto">
                                        <!-- Select -->
                                        <div class="tom-select-custom tom-select-custom-sm-end">
                                            <select class="js-select form-select form-select-borderless tom-select-custom-form-select-invite-user tom-select-form-select-ps-0" autocomplete="off" data-hs-tom-select-options='{
                                                    "searchInDropdown": false,
                                                    "hideSearch": true,
                                                    "dropdownWidth": "11rem"
                                                    }'>
                                            <option value="guest" selected>Guest</option>
                                            <option value="can edit">Can edit</option>
                                            <option value="can comment">Can comment</option>
                                            <option value="full access">Full access</option>
                                            <option value="remove" data-option-template='<div class="text-danger">Remove</div>'>Remove</option>
                                            </select>
                                        </div>
                                        <!-- End Select -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- End List Group Item -->
                </ul>
            </div>
            <!-- End Body -->

            <!-- Footer -->
            <div class="modal-footer">
                <div class="row align-items-center flex-grow-1 mx-n2">
                    <div class="col-sm-9 mb-2 mb-sm-0">
                        <input type="hidden" id="inviteUserPublicClipboard" value="https://themes.getbootstrap.com/product/front-multipurpose-responsive-template/">

                        <p class="modal-footer-text">The public share <a href="#">link settings</a>
                            <i class="bi-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="The public share link allows people to view the project without giving access to full collaboration features."></i>
                        </p>
                    </div>

                    <div class="col-sm-3 text-sm-end">
                        <a class="js-clipboard btn btn-white btn-sm text-nowrap" href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top" title="Copy to clipboard!" data-hs-clipboard-options='{
                        "type": "tooltip",
                        "successText": "Copied!",
                        "contentTarget": "#inviteUserPublicClipboard",
                        "container": "#inviteUserModal"
                        }'>
                        <i class="bi-link-45deg me-1"></i> Copy link</a>
                    </div>
                </div>
            </div>
            <!-- End Footer -->
        </div>
    </div>
</div>