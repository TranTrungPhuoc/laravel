<script src="/assets/js/vendor-all.min.js"></script>
<script src="/assets/js/plugins/bootstrap.min.js"></script>
<script src="/assets/js/ripple.js"></script>
<script src="/assets/js/pcoded.min.js"></script>
<script src="/assets/js/menu-setting.min.js"></script>

<!-- Apex Chart -->
<script src="/assets/js/plugins/apexcharts.min.js"></script>
<!-- custom-chart js -->
<script src="/assets/js/pages/dashboard-main.js"></script>
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
            ticks++ ;
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

<script>
    function getValue(id) {
        return $('#'+id).val();
    }

    function isEmpty(id) {
        return (getValue(id)!=undefined&&getValue(id).trim()=='') ? true : false;
    }

    function setValue(id, value) {
        $('.error_'+id).html(value);
    }

    function changeText(key) {
        let str='';
        switch (key) {
            case 'email': str='Email'; break;
            case 'password': str='Mật Khẩu'; break;
            case 'cfpassword': str='Xác Nhận Mật Khẩu'; break;
            case 'phone': str='Số Điện Thoại'; break;
            default: str='NoId'; break;
        }
        return str;
    }

    $(document).ready(function () {
        $('#formModule').on('submit', function(e){
            e.preventDefault();
            const formList = ['email', 'password', 'cfpassword', 'phone'];
            for (let index = 0; index < formList.length; index++) {
                const element = formList[index];
                if(isEmpty(element)){ setValue(element, '<b>'+ changeText(element) + '</b> không được rỗng !!!') }
            }
        })
    });
</script>