<?php
if($data['mobile'] == "Is Mobile"){
?>
<style>
    .max-w-1 {
        max-width: 375px;
        margin: 0 auto;
    }
    .yu-img-p {
        height: 92vh;
        bottom: 0;
        left: 0;
        margin: auto;
        overflow-y: hidden;
        overflow-x: auto;
        position: relative;
        right: 0;
        top: 0;
        z-index: 1;
        -o-object-fit: contain;
        object-fit: contain;
        background: #000;
        filter: brightness(100%);
        background-size: 100%;
        scroll-behavior: smoth;
    }
    .yu-pos-fixed-1 {
        position: fixed;
        top: 0;
        z-index: 3;
        background: rgba(0,0,0,0.1);
        padding: 12.5px 0;
        max-width: 375px;
    }
    .yu-pos-fixed-2 {
        position: fixed;
        bottom: -3.5px;
        z-index: 3;
        padding: 10px 0;
        background-image: linear-gradient(rgba(0,0,0,0.2),#000);
        max-width: 375px;
    }
    .yu-pro-1 {
        height: 50px;
        width: 50px;
        object-fit: cover;
        border-radius: 100%;
        border: 2px solid #fff;
    }
    .yu-mr-2s {
        margin: 12.5px;
    }
    .yu-form-comments {
        padding: 10px 15px;
        border: none;
        background: transparent;
        border-radius: 24px;
        color: #fff;
        width: 100%;
    }
    .yu-form-comments::placeholder {
        color: #fff;
    }
    .yu-form-comments:focus {
        outline: 0;
    }
    #yu-infos {
        border: 1.2px solid #fff;
        padding: 2.5px 5px;
        border-radius: 8px;
        position: absolute;
        background: #fff;
        top: 40%;
        color: #000;
        z-index: 3;
        transform: translateX(155%);
        display: block;
    }
    .yu-ovy-31{
        max-width: 375px;
        overflow-y: hidden;
        overflow-x: auto;
    }
    .yu-ixi{
        border: 1.2px solid #fff;
        border-radius: 32px;
    }
</style>
<div class="max-w-1">
    <div class="container p-0">
        <div class="d-flex yu-ovy-31">
            <?php
            $status = base64_decode($data['post-image']['status']);
            
            
            $classImg = explode("_display_",$status);
            $status_text = explode("_replace_", $classImg[0]);
            
                $image = json_decode($status_text[1]);
            
            
            
            Conditions::showin1img($image);
            foreach ($image as $img) {
                ?>
                <img onerror='this.src="<?php echo BASEURL; ?>foto/default/bg.jpg"' src="<?php echo BASEURL; ?>foto/status/<?php echo $img; ?>" class="col-12 d-block yu-img-p" alt="...">
                <?php
            } ?>
        </div>
        <div class="yu-pos-fixed-1 container px-2">
            <div class="d-flex text-white">
                <div class="col-2">
                    <img onerror='this.src="<?php echo BASEURL; ?>foto/default/default-jpg.jpg"' src="<?php echo BASEURL; ?>foto/profiles/<?php echo $data['user-data']['foto_profile']; ?>" alt="" class="yu-pro-1 shadow-sm" />
                </div>
                <div class="col-7">
                    <div class="px-1" style="word-break:break-all;">
                        <b><?php echo substr(ucwords(strtolower($data['user-data']['nama_belakang'])),0,18); ?> <?php Conditions::centang($data['user-data']['centang']); ?></b>
                        <div class="">
                            <small> @<?php echo $data['user-data']['nama_pengguna']; ?></small>
                        </div>
                    </div>
                </div>
                <div class="col-3 text-center">
                    <div style="padding-top:12.5px;">
                        <a onclick="back()" class="text-white text-decoration-none yu-mr-2s">
                            <i class="fs-5 bi-x-circle"></i>
                        </a>
                        <a href="" class="text-white text-decoration-none">
                            <i class="fs-5 bi-three-dots-vertical"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="yu-pos-fixed-2 container px-2">
            <?php
            if($data['user-data']['tokenkey'] == $_SESSION['access_tokenkey']){
                ?>
                <div class="text-center text-white px-2 py-1 rounded-pill my-3">
                    <i class="bi-eye" style="position:relative;top:2px;"></i><br><?php echo $data['count-image']['jml']; ?>
                </div>
                <?php
            }else{
            ?>
            <form action="" method="POST" accept-charset="utf-8">
                <div class="text-white yu-ixi pt-1">
                    <div class="d-flex flex-row">
                    <div class="col-8">
                        <div class="px-1">
                            <input type="text" name="" class="yu-form-comments" placeholder="Write a Comments?" />

                        </div>
                    </div>
                    <div class="col-2 text-center">
                        <div class="py-2" style="margin-right:-7.5px;">
                            <a class="text-decoration-none text-white"><i class="bi-heart fs-4"></i></a>
                        </div>
                    </div>
                    <div class="col-2 text-center">
                        <div class="py-2" style="margin-left:-5px;">
                            <button type="submit" class="text-decoration-none border-0 text-white" style="background:transparent;"><i class="bi-send" style="font-size:19px;"></i></button>
                        </div>
                    </div>
                    </div>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
</div>
<script>
    setTimeout(function() {
        document.getElementById("yu-infos").style.display = "none";
    }, 1250)
</script>
<?php } else { header("Location: home"); } ?>