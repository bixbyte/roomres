/* Ira Basic show residence Occupants */
function doRes(resnum) {
    $(function () {

        var res = (resnum == null || resnum === "" || resnum === undefined) ? "" : "?resid=" + resnum;

        $(".container-fluid").html('<br><center><code>Loading Residence List[s]</code></center><div class="spinner"><div class="rect1"></div><div class="rect2"></div><div class="rect3"></div><div class="rect4"></div><div class="rect5"></div></div>');

        var worker = (typeof (worker) == "undefined") ? new Worker("assets/js/resListWorker.js") : worker;

        worker.addEventListener('message', function (e) {

            //document.getElementById("worker").textContent = e.data;
            $(".container-fluid").html(e.data);
            worker.terminate();


        }, false);

        worker.postMessage('/roomres/print_res_lists.php' + res); // Send filename to our worker.


        /*
		$.post("print_res_lists.php",{ resid: resnum},
			function(data, stats){

					$(".container-fluid").html(data);

			}
		);
        */

    });

}


$(document).ready(function () {

    /* SIMPLE WIDGET FUNCTION */
    //create instance
    $('.chart').easyPieChart({
        animate: 2000
    });

    /* EO SIMPLE CHART WIDGET FUNCTION */


    /* Custom force sidebar color */

    $(function () {
        "use strict";
        $(".logo-brand").removeClass("white-color");
        //$(".logo-brand").removeClass("primary-color");
        $(".logo-brand").removeClass("info-color");
        $(".logo-brand").removeClass("success-color");
        $(".logo-brand").removeClass("danger-color");
        $(".logo-brand").removeClass("warning-color");
        $(".logo-brand").addClass("white-color");
        $(".sidebar-left").addClass("light-color");
    });

    /* Ira basic find student script */
    $('#search').keyup(function (e) {
        $('.container-fluid').html('<br><center><code>Loading Residence List[s]</code></center><div class="spinner"><div class="rect1"></div><div class="rect2"></div><div class="rect3"></div><div class="rect4"></div><div class="rect5"></div></div>');

        text = $('#search').val();

        $.post("proc_adds.php", {
                stringy: text,
                act: "5346)7454dm1"
            },

            function (data, status) {
                $('.container-fluid').html(data);
            });

    });

    /* Administrative comprehensive search */
    $('#asearch').keyup(function (e) {
        $('.container-fluid').html('<br><center><code>Loading Residence List[s]</code></center><div class="spinner"><div class="rect1"></div><div class="rect2"></div><div class="rect3"></div><div class="rect4"></div><div class="rect5"></div></div>');
        text = $('#asearch').val();

        $.post("proc_adds.php", {
                stringy: text,
                act: "5346)7454dm1_pro"
            },

            function (data, status) {
                $('.container-fluid').html(data);
            });

    });

    /* Ira basic footer message setter  */

    todate = new Date();
    ftr = $("#footer");
    ftr.html("&copy;" + todate.getFullYear() + " <a href='http://bixbyte.cf'>bixbyte</a> for <a href='http://ueab.ac.ke/' > UEAB</a>");

    __LOADING = '<br><center><code>Loading ... </code></center> <div class="spinner"> <div class="rect1"></div> <div class="rect2"></div> <div class="rect3"></div><div class="rect4"></div><div class="rect5"></div></div>';



    /** SIDEBAR FUNCTION **/
    $('.sidebar-left ul.sidebar-menu li a').click(function () {
        "use strict";
        $('.sidebar-left li').removeClass('active');
        $(this).closest('li').addClass('active');
        var checkElement = $(this).next();
        if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
            $(this).closest('li').removeClass('active');
            checkElement.slideUp('fast');
        }
        if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
            $('.sidebar-left ul.sidebar-menu ul:visible').slideUp('fast');
            checkElement.slideDown('fast');
        }
        if ($(this).closest('li').find('ul').children().length == 0) {
            return true;
        } else {
            return false;
        }
    });

    if ($(window).width() < 1025) {
        $(".sidebar-left").removeClass("sidebar-nicescroller");
        $(".sidebar-right").removeClass("sidebar-nicescroller");
        $(".nav-dropdown-content").removeClass("scroll-nav-dropdown");
    }
    /** END SIDEBAR FUNCTION **/


    /** BUTTON TOGGLE FUNCTION **/
    $(".btn-collapse-sidebar-left").click(function () {
        "use strict";
        $(".top-navbar").toggleClass("toggle");
        $(".sidebar-left").toggleClass("toggle");
        $(".page-content").toggleClass("toggle");
        $(".icon-dinamic").toggleClass("rotate-180");
    });
    $(".btn-collapse-sidebar-right").click(function () {
        "use strict";
        $(".top-navbar").toggleClass("toggle-left");
        $(".sidebar-left").toggleClass("toggle-left");
        $(".sidebar-right").toggleClass("toggle-left");
        $(".page-content").toggleClass("toggle-left");
    });
    $(".btn-collapse-nav").click(function () {
        "use strict";
        $(".icon-plus").toggleClass("rotate-45");
    });
    /** END BUTTON TOGGLE FUNCTION **/









});