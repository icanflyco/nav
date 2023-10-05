<?php
error_reporting(0);
if($data['mobile'] == "Is Mobile"){
    echo $_SESSION['alert']; unset($_SESSION['alert']);
    ?>
    <div class="container-fluid p-0">
        <div class="d-flex">
            <div class="col-12 d-none d-md-block d-lg-block col-md-7 col-lg-7">
                <div class="yu-card-img position-relative">
                    <img onerror='this.src="<?php echo BASEURL; ?>foto/default/header-l.jpg"' src="<?php echo BASEURL; ?>foto/default/header-l.jpg"  alt="" srcset="" class="w-100 vh-100 yu-cover yu-brig-1">
                </div>
            </div>
            <div class="col-12 col-md-5 col-lg-5">
                <div
                    class="text-center mt-5 mt-md-5 mt-lg-5 pt-2 pt-md-3 pt-lg-3 justify-content-center align-items-center">
                    <div class="my-2">
                        <img onerror='this.src="<?php echo BASEURL; ?>foto/default/branded.png"' src="<?php echo BASEURL; ?>foto/default/branded.png" alt="" srcset="" class="yu-logo-log-up yu-cover p-2">
                    </div>
                    <h1 class="h5 m-0 fw-bold">YUNME</h1>
                    <p class="m-0">Make a memories you form yunme.</p>
        <?php Flasher::flash(); ?>
                    <div class="my-2 px-3 px-md-4 px-lg-5">
                        <form action="<?php echo BASEURL; ?>masuk/processMasuk" method="post">
                            <div class="row">

                                <div class="col-12">
                                    <div class="form-group text-start">
                                        <label for="Email" class="my-2"><small class="fw-bold">Email</small></label>
                                        <input autocomplete="off"type="text" name="surel" id="surel" placeholder="Email" class="form-control w-100">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group text-start">
                                        <label for="Password" class="my-2"><small
                                                class="fw-bold">Password</small></label>
                                        <input autocomplete="off"type="password" name="passw" id="passw" placeholder="Password"
                                            class="form-control w-100">
                                    </div>
                                </div>
                                <div class="col-12 text-start">
                                    <button type="submit" id="" class="btn btn-primary mt-3 w-100 fw-bold p-2">Sign
                                        In</button>
                                </div>
                                <div class="col-6 text-start mt-3">
                                    Forgot Password? <a href="<?php echo BASEURL; ?>forgot" class="text-decoration-none">Change</a>
                                </div>
                                <div class="col-6 text-end mt-3">
                                    <a href="<?php echo BASEURL; ?>daftar" class="text-decoration-none">Sign Up</a>
                                </div>
                                <div class="col-12 text-center mt-3">
                                    2023 <a href="" class="text-decoration-none">Yunme</a>. All right reserved.
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <?php
}else{
    header("Location: home");
}