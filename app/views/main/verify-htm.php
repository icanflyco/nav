<?php
error_reporting(0);
if($data['mobile'] == "Is Mobile"){
?>
<div class="container">
    <div class="py-5 px-2 mt-5 text-center">
        <br><br>
        <i class="bi-envelope-open-fill" style="font-size:60px;"></i>
        <div class="mt-3">
            <span class="text-primary">Your Account Success Created!</span>
        </div>
        <h1 class="mt-3 fw-bold">Verification Your Email</h1>
        <p>
            We send a Message for Your Email. Check and Verification!
        </p>
        <b><a class="btn bg-primary text-white py-2 px-4 fw-bold" href="<?php echo URL; ?>masuk"> Masuk & Aksess</a></b>
    </div>
</div>
<?php }else{
    header("Location: home");
}
?>