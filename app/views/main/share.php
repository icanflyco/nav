<?php
error_reporting(0);

if($data['mobile'] == "Is Mobile"){
?>
<style type="text/css">
    .garis {
        position: fixed;
        top: 0;
        width: 395px;
        bottom: 0;
        margin: 0 auto;
        left: 0;
        right: 0;
        z-index: 1030;
        background: rgba(0,0,0,0.7);
    }
    #openShare {
        position: absolute;
        width: 395px;
        bottom: 0;
        margin: 0 auto;
        background-color: #fff;
    }
</style>
<div class="garis" id="openShareOn">
    <div class="d-flex flex-column">
        <div class="col-12" onclick="back()" style="height:100vh;background:transparent;"></div>
        <div id="openShare" class="col-12">
            <div class="p-3">
                <div class="position-relative">
                    <div class="mb-3 mt-1">
                        <h1 class="m-0 h6 fw-bold position-relative">Social Media <span onclick="back()"style="position:absolute;right:35px;top:-3px;"><i class="bi-x fs-2"></i></span></h1>
                    </div>
                    <div class="mb-3 mt-1">
                        <a class="text-decoration-none" href="https://web.facebook.com/sharer.php?u=">
                            <i class="bi-facebook fs-2 bg-light rounded-circle" style="padding:7px 10px;margin-right:5px;"></i>
                        </a>
                        <a class="text-decoration-none text-success" href="https://api.whatsapp.com/send?phone=&text=">
                            <i class="bi-whatsapp fs-2 bg-light rounded-circle" style="padding:7px 10px;margin-right:5px;"></i>
                        </a>
                        <a class="text-decoration-none" href="https://twitter.com/intent/tweet?url=">
                            <i class="bi-twitter fs-2 bg-light rounded-circle" style="padding:7px 10px;margin-right:5px;"></i>
                        </a>
                        <a class="text-decoration-none" href="https://lineit.line.me/share/ui?url=" style="color:#41FF00;">
                            <i class="bi-line fs-2 bg-light rounded-circle" style="padding:7px 10px;margin-right:5px;"></i>
                        </a>
                        <a class="text-decoration-none text-danger" href="https://mail.google.com/mail/?view=cm&to=&su=">
                            <i class="bi-envelope fs-2 bg-light rounded-circle" style="padding:7px 10px;margin-right:5px;"></i>
                        </a>
                        <a class="text-decoration-none text-info" href="https://telegram.me/share/url?url=">
                            <i class="bi-telegram fs-2 bg-light rounded-circle" style="padding:7px 10px;margin-right:5px;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } else {
    header("Location: home");
}?>