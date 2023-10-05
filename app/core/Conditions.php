<?php

class Conditions
{
    public static function centang($aksi)
    {
        if ($aksi == "centang") {
            /* echo "<i class='fs-6 bi-check-circle-fill text-primary' style='position:relative;top:2.5px;'></i>";
           */
            echo "<img src='" . BASEURL . "foto/default/loading.gif' data-echo='" . BASEURL . "foto/default/badges.png' width='20' height='20' style='position:relative;top:-1.5px;'/>";
        } else {
            echo "";
        }
    }
    #Loves
    public static function iloves($sess, $idposts, $roles)
    {
        if (!empty($sess) && $idposts && $roles == "Loves") {
            echo "text-danger unloves";
        } else {
            echo "text-secondary inloves ";
        }
    }
    public static function i2loves($sess, $idposts, $roles)
    {
        if (!empty($sess) && $idposts && $roles == "Loves") {
            echo "-fill text-danger";
        } else {
            echo "";
        }
    }
    public static function i3loves($sess, $idposts, $roles)
    {
        if (!empty($sess) && $idposts && $roles == "Loves") {
            echo "-danger";
        } else {
            echo "-secondary";
        }
    }
    public static function i4loves($sess, $idposts, $roles)
    {
        if (!empty($sess) && $idposts && $roles == "Loves") {
            echo "processUnloves";
        } else {
            echo "processLoves";
        }
    }
    #Reposts Status
    public static function repostStatus($sess, $idposts, $roles)
    {
        if (!empty($sess) && $idposts && $roles == "Reposts") {
            echo "text-success unrepost";
        } else {
            echo "text-secondary inrepost";
        }
    }
    public static function repost2Status($sess, $idposts, $roles)
    {
        if (!empty($sess) && $idposts && $roles == "Reposts") {
            echo "text-success";
        } else {
            echo "text-secondary";
        }
    }
    public static function repost3Status($sess, $idposts, $roles)
    {
        if (!empty($sess) && $idposts && $roles == "Reposts") {
            echo "processUnreposts";
        } else {
            echo "processRepost";
        }
    }
    #Follow
    public static function ifollow($sess, $idposts, $roles)
    {
        if (!empty($sess) && $idposts && $roles == "Follow") {
            echo "btn bg-primary border-1 border border-primary text-white w-100 rounded-pill";
        } else {
            echo "btn border-1 border border-primary text-primary w-100 rounded-pill";
        }
    }
    public static function i2follow($sess, $idposts, $roles)
    {
        if (!empty($sess) && $idposts && $roles == "Follow") {
            echo "Unfollow";
        } else {
            echo "<i class='bi-plus-circle mx-1'></i>Follow";
        }
    }
    public static function i4follow($sess, $idposts, $roles)
    {
        if (!empty($sess) && $idposts && $roles == "Follow") {
            echo "processUnFollow";
        } else {
            echo "processFollow";
        }
    }
    public static function rload($id, $hal)
    {
        header("Location: " . BASEURL . "" . $hal . "#Lovesid_" . $id);
    }
    public static function breakroles($breakRoles, $usernRoles)
    {
        if ($breakRoles == "reposts") {
            echo "<span class='fw-bold'><i class='bi-repeat mx-1'></i> re-posts to posts</span>";
        } elseif ($breakRoles == "comments") {
            echo "<span class='fw-bold'><i class='bi-chat mx-1'></i> comments to posts</span>";
        } elseif ($breakRoles == "balas-comments") {
            echo "<span class='fw-bold'><i class='bi-chat mx-1'></i> re-comments to posts</span>";
        } else {
            echo "";
        }
    }
    public static function break2roles($breakRoles, $usernRoles)
    {
        if ($breakRoles == "reposts") {
            echo "<span class='position-relative'> <div class='yu-lines-5'></div><a href='#' class='text-decoration-none yu-fs-fs-1 py-1 fw-bold px-2 rounded-pill text-secondary fw-bold'style='border:2px solid #f2f2f2;'>#reposts</a></span>";
        } else {
            echo "";
        }
    }
    public static function postStatus($status, $display, $idposts)
    {
        $de_status = base64_decode($status);
        $status_text = explode("_replace_", $de_status);
        $text = $status_text[0];

        $posts = "<a class='text-decoration-none text-dark' href='" . BASEURL . "posts/read/" . $idposts . "'>" . substr(htmlspecialchars($text), 0, 127) . "</a>";
        $image = json_decode($status_text[1]);
        $fotosjml = count($image);

        if (strlen($text) > 127) {
            $noa = "";
        } else if (strlen($text) < 127) {
            $noa = "d-none";
        } else {
            $noa = "d-none";
        }
        if ($fotosjml > 1) {
            echo $posts . ' <a href="' . BASEURL . 'posts/read/' . $idposts . '" class="' . $noa . ' text-secondary text-decoration-none">.. read more </a>';
            echo '<div class="d-flex my-2" style="overflow-x:auto;max-width:1000px;overflow-y:hidden;">';
            foreach ($image as $img) {
                echo '<a href="' . BASEURL . 'i/sendingdata/' . $idposts . '" class="col-10 col-md-7 col-lg-5" style="margin-right:5px;max-height:350px;"><img src="' . BASEURL . 'foto/default/loading.gif"  data-echo="' . BASEURL . 'foto/status/' . $img . '" alt="" class="w-100 yu-cover" style="height:100%;border-radius:13px;"/></a>';
            }
            echo '</div>';
        } elseif ($fotosjml == 1) {
            echo $posts . ' <a href="' . BASEURL . 'posts/read/' . $idposts . '" class="' . $noa . ' text-secondary text-decoration-none">.. read more</a>';
            echo '<div class="d-flex my-2" style="overflow-x:auto;max-width:1000px;overflow-y:hidden;">';
            foreach ($image as $img) {
                echo '<a href="' . BASEURL . 'i/sendingdata/' . $idposts . '" class="col-12" style="height:300px;"><img src="' . BASEURL . 'foto/default/loading.gif" data-echo="' . BASEURL . 'foto/status/' . $img . '" alt="" class="w-100 yu-cover" style="height:100%;border-radius:13px;"/></a>';
            }
            echo '</div>';
        } else {
            echo '<div class="mb-1">' . $posts . ' <a href="' . BASEURL . 'posts/read/' . $idposts . '" class="' . $noa . ' text-secondary text-decoration-none">.. read more</a></div>';
        }
    }
    public static function post2Status($status, $display, $idposts)
    {
        $de_status = base64_decode($status);
        $status_text = explode("_replace_", $de_status);
        $text = $status_text[0];
        $posts = nl2br(htmlspecialchars($text));
        $image = json_decode($status_text[1]);
        $fotosjml = count($image);
        if (strlen($text) > 127) {
            $noa = "";
        } else if (strlen($text) < 127) {
            $noa = "d-none";
        } else {
            $noa = "d-none";
        }
        if ($fotosjml > 1) {
            echo $posts;
            echo '<div class="d-flex my-2" style="overflow-x:auto;max-width:1000px;overflow-y:hidden;">';
            foreach ($image as $img) {
                echo '<a href="' . BASEURL . 'i/sendingdata/' . $idposts . '" class="col-10 col-md-7 col-lg-5" style="margin-right:5px;max-height:350px;"><img src="' . BASEURL . 'foto/default/loading.gif" data-echo="' . BASEURL . 'foto/status/' . $img . '" alt="" class="w-100 yu-cover" style="height:100%;border-radius:13px;"/></a>';
            }
            echo '</div>';
        } elseif ($fotosjml == 1) {
            echo $posts;
            echo '<div class="d-flex my-2" style="overflow-x:auto;max-width:1000px;overflow-y:hidden;">';
            foreach ($image as $img) {
                echo '<a href="' . BASEURL . 'i/sendingdata/' . $idposts . '" class="col-12" style="height:300px;"><img src="' . BASEURL . 'foto/default/loading.gif" data-echo="' . BASEURL . 'foto/status/' . $img . '" alt="" class="w-100 yu-cover" style="height:100%;border-radius:13px;"/></a>';
            }
            echo '</div>';
        } else {
            echo '<div class="mb-1">' . $posts . '</div>';
        }
    }
    public static function postStatusComments($display, $idposts, $data)
    {
        $datas['postingan'] = $data;
        $de_status = base64_decode($datas['postingan']['status']);
        $status_text = explode("_replace_", $de_status);
        $text = $status_text[0];
        $posts = "<a class='text-decoration-none text-dark' href='" . BASEURL . "posts/read/" . $idposts . "'>" . substr(htmlspecialchars($text), 0, 127) . "</a>";
        $image = json_decode($status_text[1]);
        $fotosjml = count($image);
        if (strlen($text) > 127) {
            $noa = "";
        } else if (strlen($text) < 127) {
            $noa = "d-none";
        } else {
            $noa = "d-none";
        }
        if ($fotosjml > 1) {
            echo $posts . ' <a href="' . BASEURL . 'posts/read/' . $idposts . '" class="' . $noa . ' text-secondary text-decoration-none">.. read more </a>';
            echo '<div class="d-flex my-2" style="overflow-x:auto;max-width:1000px;overflow-y:hidden;">';
            foreach ($image as $img) {
                echo '<a href="' . BASEURL . 'i/sendingdata/' . $idposts . '" class="col-10 col-md-7 col-lg-5" style="margin-right:5px;max-height:320px;"><img src="' . BASEURL . 'foto/default/loading.gif"  data-echo="' . BASEURL . 'foto/status/' . $img . '" alt="" class="w-100 yu-cover" style="height:100%;border-radius:13px;"/></a>';
            }
            echo '</div>';
        } elseif ($fotosjml == 1) {
            echo $posts . ' <a href="' . BASEURL . 'posts/read/' . $idposts . '" class="' . $noa . ' text-secondary text-decoration-none">.. read more</a>';
            echo '<div class="d-flex my-2" style="overflow-x:auto;max-width:1000px;overflow-y:hidden;">';
            foreach ($image as $img) {
                echo '<a href="' . BASEURL . 'i/sendingdata/' . $idposts . '" class="col-12" style="height:290px;"><img src="' . BASEURL . 'foto/default/loading.gif" data-echo="' . BASEURL . 'foto/status/' . $img . '" alt="" class="w-100 yu-cover" style="height:100%;border-radius:13px;"/></a>';
            }
            echo '</div>';
        } else {
            echo '<div class="mb-1">' . $posts . ' <a href="' . BASEURL . 'posts/read/' . $idposts . '" class="' . $noa . ' text-secondary text-decoration-none">.. read more</a></div>';
        }
    }
    public static function akfollow($roles, $tokenkey)
    {
        if ($roles == 2) {
            echo "";
        } else {
            echo " <span class='text-secondary'>•</span> <a class='text-decoration-none text-primary py-1 px-2 rounded-pill' style='font-size:11px;border:1.2px solid #0054ff;position:relative;top:-1.5px;' href=" . $tokenkey . ">+ Follow</a>";
        }
    }
    public static function dateLahir($dates)
    {
        $monthly = explode("-", $dates);
        if ($monthly[1] == "02") {
            echo $monthly[2] . " Feb " . $monthly[0];
        } elseif ($monthly[1] == "03") {
            echo $monthly[2] . " Mar " . $monthly[0];
        } elseif ($monthly[1] == "04") {
            echo $monthly[2] . " Apr " . $monthly[0];
        } elseif ($monthly[1] == "05") {
            echo $monthly[2] . " May " . $monthly[0];
        } elseif ($monthly[1] == "06") {
            echo $monthly[2] . " Jun " . $monthly[0];
        } elseif ($monthly[1] == "07") {
            echo $monthly[2] . " Jul " . $monthly[0];
        } elseif ($monthly[1] == "08") {
            echo $monthly[2] . " Aug " . $monthly[0];
        } elseif ($monthly[1] == "09") {
            echo $monthly[2] . " Sep " . $monthly[0];
        } elseif ($monthly[1] == "10") {
            echo $monthly[2] . " Oct " . $monthly[0];
        } elseif ($monthly[1] == "11") {
            echo $monthly[2] . " Nov " . $monthly[0];
        } elseif ($monthly[1] == "12") {
            echo $monthly[2] . " Dec " . $monthly[0];
        } else {
            echo $monthly[2] . " Jan " . $monthly[0];
        }
    }
    public static function shehim($jk)
    {
        if ($jk == "P") {
            echo "(She/Her)";
        } elseif ($jk == "L") {
            echo "(He/Him)";
        } else {
            echo "";
        }
    }
    public static function gen2r($jk)
    {
        if ($jk == "P") {
            echo "She/Her (Woman) *Selected*";
        } elseif ($jk == "L") {
            echo "He/Him (Man) *Selected*";
        } else {
            echo "";
        }
    }
    public static function dateBuat($dates)
    {
        $time = explode(" ", $dates);
        echo $time[1] . " " . $time[2] . " " . $time[3];
    }
    public static function urlprf($url)
    {
        $explodesa = explode("://", $url);

        if ($explodesa[0] == "http") {
            $url = $explodesa[1];
        } else if ($explodesa[0] == "https") {
            $url = $explodesa[1];
        } else {
            $url = $url;
        }
        if (strlen($url) > 0) {

            echo '<a href="#" class="text-primary text-decoration-none"><i class="bi-link"></i> ' . $url . '</a>';
        } else {
            echo "";
        }
    }
    public static function url2prf($url)
    {
        $explodesa = explode("://", $url);

        if ($explodesa[0] == "http") {
            $url = $explodesa[1];
        } else if ($explodesa[0] == "https") {
            $url = $explodesa[1];
        } else {
            $url = $url;
        }
        if (strlen($url) > 0) {
            echo $url;
        } else {
            echo "";
        }
    }
    public static function showin1img($count)
    {
        $img = count($count);
        if ($img == 1) {
            echo "";
        } else {
            echo '<div id="yu-infos" class="shadow-sm p-2"><small><div class="text-center"><img src="' . BASEURL . 'foto/default/loading.gif" width="70"/><br>Slide Right</div></small></div>';
        }
    }
    public static function actionComment($roles)
    {
        if ($roles == "comments") {
            echo "processBalasComments";
        } else {
            echo "processComments";
        }
    }
    public static function CommentsStatus($status)
    {
        $posts = htmlspecialchars(substr($status, 0, 127));
        if (strlen($posts) < 127) {
            echo $posts;
        } else {
            echo $posts . " <span class='text-secondary'>.. read more</span>";
        }
    }
    public static function notelp($no)
    {
        $telpon = substr($no, 0, 5) . "XXXX";
        if (strlen($no) == 0) {
            echo "";
        } else {
            echo $telpon;
        }
    }
    public static function countryPage($nama)
    {
        $exp = explode("_CITY_", $nama);

        $city = $exp[0];
        $less = $exp[1];
        $e2xp = explode("_ADDRESS_", $less);
        $address = $e2xp[0];
        $le2ss = $e2xp[1];
        $e3xp = explode("_ZIP_", $le2ss);
        $zip = $e3xp[0];
        $country = $e3xp[1];
        if ($city && $country) {
            echo $city . ", " . $country;
        } else {
            echo $nama;
        }
    }
    public static function yunmeWork($pekerjaan)
    {
        $exp = explode("_PERU_", $pekerjaan);
        if ($exp[1]) {
            echo "<b>" . $exp[0] . "</b> in <b>" . $exp[1] . "</b>";
        } else {
            echo "";
        }
    }
}