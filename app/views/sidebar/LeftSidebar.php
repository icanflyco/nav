<?php


error_reporting(0);
if ($data['mobile'] == "Is Mobile") {

?>
    <!--- Flex Container Display --->
    <div class="h-100 container-fluid p-0 bg-white">
        <div class="<?php echo $data['css-m-top']; ?>">
            <div class="d-flex flex-column flex-lg-row flex-md-row">
                <div class="col-12 col-md-3 col-lg-3 d-none d-lg-block d-md-block">
                    <div class="px-3 py-2">
                        <div class="my-2 px-2">
                            <b class="fs-5">Menus</b>
                        </div>
                        <div class="d-flex flex-column">
                            <div class="my-2 yu-md-side">
                                <a href="<?php echo BASEURL; ?>home" class="d-flex text-decoration-none text-dark">
                                    <i class="bi-house fs-5 mx-2 "></i> <span class="p-1">Home</span>
                                </a>
                            </div>
                            <div class="my-2 yu-md-side">
                                <a href="#" class="d-flex text-decoration-none text-dark">
                                    <i class="bi-plus-circle fs-5 mx-2"></i> <span class="p-1">Make a
                                        post</span>
                                </a>
                            </div>
                            <div class="my-2 yu-md-side">
                                <a href="#" class="d-flex text-decoration-none text-dark">
                                    <i class="bi-search fs-5 mx-2"></i> <span class="p-1">Search</span>
                                </a>
                            </div>
                            <div class="my-2 my-lg-1 my-md-1 yu-md-side">
                                <a href="#" class="d-flex text-decoration-none text-dark">
                                    <i class="bi-pen fs-5 mx-2"></i> <span class="p-1">Write</span>
                                </a>
                            </div>
                            <div class="my-2 my-lg-1 my-md-1 yu-md-side">
                                <a href="#" class="d-flex text-decoration-none text-dark">
                                    <i class="bi-gear fs-5 mx-2"></i> <span class="p-1">Setting's</span>
                                </a>
                            </div>
                            <div class="my-2 my-lg-1 my-md-1 yu-md-side">
                                <a href="<?php echo BASEURL; ?>logout" class="d-flex text-decoration-none text-dark">
                                    <i class="bi-fullscreen-exit fs-5 mx-2"></i> <span class="p-1">Logout</span>
                                </a>
                            </div>
                            <div class="my-2 px-2">
                                <b class="fs-5">YID Circle</b>
                            </div>
                            <div class="my-2 my-lg-1 my-md-1 yu-md-side">
                                <a href="#" class="d-flex text-decoration-none text-dark">
                                    <i class="bi-info fs-5 mx-2"></i> <span class="p-1">Privacy &
                                        Policy</span>
                                </a>
                            </div>
                            <div class="my-2 my-lg-1 my-md-1 yu-md-side">
                                <a href="#" class="d-flex text-decoration-none text-dark">
                                    <i class="bi-question fs-5 mx-2"></i> <span class="p-1">Support &
                                        Question</span>
                                </a>
                            </div>
                            <div class="my-2 my-lg-1 my-md-1 yu-md-side">
                                <a href="#" class="d-flex text-decoration-none text-dark">
                                    <i class="bi-exclamation fs-5 mx-2"></i> <span class="p-1">Terms &
                                        Claimer</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else {
            header("Location: home");
        } ?>