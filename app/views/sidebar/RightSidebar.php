<?php


error_reporting(0);
if ($data['mobile'] == "Is Mobile") {
    $data['users-data'] = $this->model("ModelsHome")->getAllDataUsers();
?>
    <div class="col-12 col-lg-3 col-md-3 d-md-none d-none d-lg-block">
        <div class="p-3 yu-border-y-1">
            <div class="card bg-white text-dark border-0 rounded-0 ">
                <small class="text-secondary d-flex"><i class="bi-exclamation-circle fs-6"></i> <span class="px-1">
                        Ads</span></small>
                <div class="my-2">
                    <img onerror='this.src="<?php echo BASEURL; ?>foto/default/sampul.jpg"' src="" alt="" class="yu-ads yu-cover rounded">
                </div>
                <div class="yu-desc">
                    <small><b>yunmebiz</b> - Build a projects used HTML,CSS,Bootstrap Framework, and
                        Javascript is
                        happy. <a href="#" class="text-decoration-none">https://yunme.biz.id/bio...</a>
                    </small>
                </div>
            </div>
        </div>
        <div class="p-3">
            <div class="pb-1">
                <span class="fw-bold"><i class="bi-pin-angle"></i> Pin</span>
            </div>
            <?php
            
            foreach($data['users-data'] as $users){
            ?>
            <!--- Users Followed - Users_<?php echo $users['idusers']; ?>-->
            <div class="d-flex my-2 yu-border-yx">
                <div class="col-2 col-md-3 col-lg-2 yu-profile-mimg">
                    <img onerror='this.src="<?php echo BASEURL; ?>foto/default/default-jpg.jpg"' src="<?php echo BASEURL; ?>foto/profiles/<?php echo $users['foto_profile']; ?>" alt=""  class="yu-profile-md yu-cover">
                </div>
                <div class="col-7 col-md-6 col-lg-7" style="margin-left:7.5px;">
                    <div class="p-1">
                        <h3 class="h6 m-0"><?php echo substr($users['nama_belakang'],0,12); ?> <?php Conditions::centang($users['centang']); ?></h3>
                        <small>0 Followers</small>
                    </div>
                </div>
                <div class="col-3 col-md-3 col-lg-3">
                    <div class="pt-2 text-end justify-content-end">
                        <a href="<?php echo BASEURL; ?>p/<?php echo $users['nama_pengguna']; ?>" class="rounded-pill text-primary border border-primary text-decoration-none py-1 px-2">Profile</a>
                    </div>
                </div>
            </div>
            <!--- End Users_<?php echo $users['idusers']; ?> Followed -->
            <?php } ?>
        </div>
    </div>
    </div>
    </div>
    </div>
<?php } else {
    header("Location: home");
} ?>