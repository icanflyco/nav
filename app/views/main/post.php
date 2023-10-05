<?php
error_reporting(0);

if ($data['mobile'] == "Is Mobile") {

    ?>
    <div class="container p-0">
        <div class="d-flex p-3">
            <div class="col-2 col-lg-1 col-md-1">
                <img onerror='this.src="<?php echo BASEURL; ?>foto/default/branded.png"' src="<?php echo BASEURL; ?>foto/profiles/<?php echo $data['form-data']['foto_profile']; ?>" alt="" class="yu-posts-img yu-cover rounded-circle" />
            </div>
            <div class="col-9 col-lg-10 col-md-10">
                <form action="<?php echo BASEURL; ?>home/processPosted" method="post" enctype="multipart/form-data">
                    <div class="mb-2">
                        <b><?php echo $data['form-data']['nama_belakang']; ?> <?php Conditions::centang($data['form-data']['centang']); ?></b>
                    </div>
                    <select name="global" class="yu-select-1">
                        <option value="Publics">Publics</option>
                    <!---
                        <option value="Friends">Friends</option>
                        <option value="Only Me">Only Me</option>--->
                    </select>
                    <textarea name="status" id="" class="yu-area-1" placeholder="What do you think?"></textarea>
                            <style>
                                .yu-nor-img {
                                    max-width: 768px;
                                    overflow-y: hidden;
                                    overflow-x: auto;
                                    display: flex;
                                }
                                #output-img{
                                    width: 140px;
                                    height: 140px;
                                    object-fit: cover;
                                border-radius: 8px;
                                margin-right: 10px;
                                }
                            </style>

                    <div class="my-2">
                        <div class=" yu-nor-img" id="loadImages">
                        </div>
                    </div>
                    <div class="my-2" id="">
                        <style>
                            #takePhoto {
                                display: none;
                            }
                        </style>
                        <div id="inputFoto"></div>
                        <div class="mb-1">
                            <a onclick="takePhotov()" class="w-100 btn text-start rounded text-secondary"><i class="bi-card-image"></i>
                                <span class="mx-2">Add Photo</span></a>
                        </div>
                        <div class="mb-1">
                            <a href="" class="w-100 btn text-start rounded text-secondary"><i
                                class="bi-play-circle"></i> <span class="mx-2">Create Gallery</span></a>
                        </div>
                        <div class="mb-1">
                            <a href="" class="w-100 btn text-start rounded text-secondary"><i class="bi-pen"></i> <span
                                class="mx-2">Write Articles</span></a>
                        </div>
                    </div>
                    <style>
                        #savePhoto{
                            display: none;
                        }
                        #saveArtc{
                            display: block;
                        }
                    </style>
                    <button type="submit" class="btn btn-primary mt-3 w-100 fw-bold" id="saveArtc">Published</button>
                    <button type="submit" class="btn btn-primary mt-3 w-100 fw-bold" id="savePhoto">Publish</button>
                </form>
            </div>
            <div class="col-1">
                <a href="<?php echo BASEURL; ?>home" class="py-2 text-secondary text-decoration-none"><i class="bi-x-circle fs-4"></i></a>
            </div>
        </div>
    </div>
    <script>
        var takePhotos = document.getElementById("takePhoto");
        function takePhotov() {
            $("#inputFoto").append('<input type="file" id="takePhoto" name="img[]" accept=".jpg, .jpeg, .png" onchange="loadFoto(event)" required multiple />');
            takePhoto.click();
        }
    </script>
    <script type="text/javascript">
        var loadFoto = function(event) {
            var output = document.getElementById('output-img');
            var total_file = document.getElementById("takePhoto").files.length;
            for (var i = 0; i < total_file; i++) {
                $('#loadImages').append("<img id='output-img' width='100%' height='auto' src='"+URL.createObjectURL(event.target.files[i])+"'>");
                document.getElementById("savePhoto").style.display = "block";
                document.getElementById("saveArtc").style.display = "none";
            }
        };
    </script>
    <?php
} else {
    header("Location: home");
} ?>