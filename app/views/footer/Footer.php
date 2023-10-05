<?php


error_reporting(0);
if ($data['mobile'] == "Is Mobile") {

?>
    <script src="<?php echo BASEURL; ?>assets/dist/js/echo.js"></script>
    <script src="<?php echo BASEURL; ?>assets/dist/js/tether.js"></script>
    <script src="<?php echo BASEURL; ?>assets/dist/js/jquery-3.2.1.js"></script>
    <script src="<?php echo BASEURL; ?>assets/dist/js/bootstrap.bundle.min.js" type="text/javascript" charset="utf-8">
    </script>
    <script>
        echo.init();
    </script>

    <script type="text/javascript" charset="utf-8">
        window.onscroll = function() {
            myFunction()
        };
        var header = document.getElementById("myImages");
        var sticky = header.offsetTop;

        function myFunction() {
            if (window.pageYOffset > sticky) {
                header.classList.add("sticky-pages");
            } else {
                header.classList.remove("sticky-pages");
            }
        }
    </script>
    <script type="text/javascript">
        function back() {
            history.back();
        }
    </script>
    <!---End Flex Container Display --->
    </body>

    </html>
<?php
} else {
    header("Location: home");
} ?>