<!-- Required Js -->
<script src="<?php echo $url ?>../../public/assets/js/vendor-all.min.js"></script>
<script src="<?php echo $url ?>../../public/assets/js/plugins/bootstrap.min.js"></script>
<script src="<?php echo $url ?>../../public/assets/js/ripple.js"></script>
<script src="<?php echo $url ?>../../public/assets/js/pcoded.min.js"></script>
<script src="<?php echo $url ?>../../public/assets/js/menu-setting.min.js"></script>

<!-- Apex Chart -->
<script src="<?php echo $url ?>../../public/assets/js/plugins/apexcharts.min.js"></script>
<!-- custom-chart js -->
<script src="<?php echo $url ?>../../public/assets/js/pages/dashboard-main.js"></script>
<!-- jquery-validation Js -->
<script src="<?php echo $url ?>../../public/assets/js/plugins/jquery.validate.min.js"></script>
<!-- form-picker-custom Js -->
<script src="<?php echo $url ?>../../public/assets/js/pages/form-validation.js"></script>
<script>
    $(document).ready(function() {
        checkCookie();
    });

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toGMTString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function checkCookie() {
        var ticks = getCookie("modelopen");
        if (ticks != "") {
            ticks++;
            setCookie("modelopen", ticks, 1);
            if (ticks == "2" || ticks == "1" || ticks == "0") {
                $('#exampleModalCenter').modal();
            }
        } else {
            // user = prompt("Please enter your name:", "");
            $('#exampleModalCenter').modal();
            ticks = 1;
            setCookie("modelopen", ticks, 1);
        }
    }
</script>

