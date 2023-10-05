<?php
error_reporting(0);

if ($data['mobile'] == "Is Mobile") {
    $data['form-user-session'] = $this->model("ModelsHome")->getAksesByToken($_SESSION['access_tokenkey']);
    ?>
    <div id="yu-b-black-100" class="w-100 h-100">
        <div class="bg-white vh-100 max-menus">
            <div class="d-flex pt-2 yu-border-y-1 text-center">
                <div class="col-2">
                    <img onerror='src="<?php echo BASEURL; ?>foto/default/branded.png"' src="<?php echo BASEURL; ?>foto/profiles/<?php echo $data['form-user-session']['foto_profile']; ?>"  alt="" class="yu-logov rounded-circle yu-b-black-normal yu-cover" />
                </div>
                <div class="col-8 p-2">
                    <h1 class="m-0 h5 fw-bold">Menus</h1>
                </div>
                <div class="col-2">
                    <a href="<?php echo BASEURL; ?>home" class="text-decoration-none text-secondary"><div class="py-2 text-secondary">
                        <i class="bi-x-circle-fill fs-4"></i>
                    </div>
                    </a>
                </div>
            </div>
            <div class="d-flex my-2 px-2" style="flex-flow:row wrap;">
                <div class="col-6 p-1">
                    <a href="<?php echo BASEURL; ?>p/<?php echo $data['form-user-session']['nama_pengguna']; ?>" class="text-dark text-decoration-none"><div class="card p-3 bg-white">
                        <h2 class="m-0 text-secondary"><i class="bi-person-circle"></i></h2>
                        <b class="mt-2">Profiles</b>
                    </div>
                    </a>
                </div>
                <div class="col-6 p-1">
                    <a href="<?php echo BASEURL; ?>home/posted" class="text-dark text-decoration-none">
                        <div class="card p-3 bg-white">
                            <h2 class="m-0 text-secondary"><i class="bi-plus-circle"></i></h2>
                            <b class="mt-2">Add Posts</b>
                        </div>
                    </a>
                </div>
                <div class="col-6 p-1">
                    <a href="#" class="text-dark text-decoration-none"><div class="card p-3 bg-white">
                        <h2 class="m-0 text-secondary"><i class="bi-chat-square"></i></h2>
                        <b class="mt-2">Message</b>
                    </div>
                    </a>
                </div>
                <div class="col-6 p-1">
                    <a href="#" class="text-dark text-decoration-none">
                        <div class="card p-3 bg-white">
                            <h2 class="m-0 text-secondary"><i class="bi-pen"></i></h2>
                            <b class="mt-2">Write Article</b>
                        </div>
                    </a>
                </div>
                <div class="col-6 p-1">
                    <a href="#" class="text-dark text-decoration-none">
                        <div class="card p-3 bg-white">
                            <h2 class="m-0 text-secondary"><i class="bi-globe-asia-australia"></i></h2>
                            <b class="mt-2">Globe</b>
                        </div>
                    </a>
                </div>
                <div class="col-6 p-1">
                    <a href="#" class="text-dark text-decoration-none">
                        <div class="card p-3 bg-white">
                            <h2 class="m-0 text-secondary"><i class="bi-bell"></i></h2>
                            <b class="mt-2">Notifications</b>
                        </div>
                    </a>
                </div>
                <div class="col-6 p-1">
                    <a href="#" class="text-dark text-decoration-none">
                        <div class="card p-3 bg-white">
                            <h2 class="m-0 text-secondary"><i class="bi-gear"></i></h2>
                            <b class="mt-2">Setting's</b>
                        </div>
                    </a>
                </div>
                <div class="col-6 p-1">
                    <a href="#" class="text-dark text-decoration-none">
                        <div class="card p-3">
                            <h2 class="m-0"><i class="bi-box"></i></h2>
                            <b class="mt-2">Features</b>
                        </div>
                    </a>
                </div>
                <div class="col-12 p-1">
                    <div class="border rounded p-3 bg-white d-flex">
                        <div class="col-10">
                            <b>Privacy & Policy</b>
                        </div>
                        <div class="col-2 text-end">
                            <a class="text-dark" href="#"><i class="bi-three-dots"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-12 p-1">
                    <div class="border rounded p-3 bg-white d-flex">
                        <div class="col-10">
                            <b>Support & Terms</b>
                        </div>
                        <div class="col-2 text-end">
                            <a class="text-dark" href="#"><i class="bi-three-dots"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3 p-1">
                    <a href="<?php echo BASEURL; ?>logout" class="text-dark text-decoration-none"><div class="border rounded p-3 bg-white d-flex">
                        <div class="col-12">
                            <b>Logout</b>
                        </div>
                    </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <?php
} else {
    header("Location: home");
} ?>