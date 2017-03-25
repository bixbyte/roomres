sysOpt = $("#system_options");

function loadResidenceLists(objectID) {

    $.post('residences.php', {},
        function (response) {

            var res = "";
            for (item in response) {
                res += '<option value="' + response[item].id + '" > ' + response[item].name + ' </option>';
            }
            $("#" + objectID).html(res);
        });

}

function residenceManagement() {

    /* Display the residence management options */

    $(function () {

        window.location = "#system_options";
        sysOpt.html('<p> <button class="btn btn-success perspective" onclick="resAdd()">Add Residence</button>  &nbsp; <button class="btn btn-success perspective disabled" onclick="resList()">Residence Occupant Lists</button>  &nbsp; <button class="btn btn-success perspective disabled"  onclick="resMan()"> Residence Management </button> </p>');

    });

    /* Add new Residence */
    /* Residence occupant lists */
    /* ** Manage current residences ** */
}

//Display Residence Addition Screen
function resAdd() {

    $(function () {

        sysOpt.html('<strong class="text-success" > Residence Addition</strong><br><div style="" ><input type="text" id="resAddName" class="mbtn"  style="border:1px solid gray; color: green;" placeholder="Residence Name"> &nbsp;<select id="resAddGender" class=" mbtn " style="color: gray; font-weight: normal;"><option value="m" selected>Male</option><option value="f">Female</option><option value="a">Either</option></select>&nbsp;<button id="addRes" class="btn btn-success" style="color: white;"> Add Residence </button></div>');

        $("#addRes").on("click", function () {

            var gender = $("#resAddGender").val();
            var resname = $("#resAddName").val();

            if (resname.length < 4) {

                $("#resAddName").focus();

            } else {

                $('#addRes').addClass(' disabled ');
                $.post("proc_adds.php", {
                        act: "new_residence",
                        gender: gender,
                        name: resname
                    },
                    function (response) {
                        sysOpt.html(response);
                    });
            }
        });
    });

}

//Display The Residence occupants list
function resList() {}

/* Display the general residence management panel */
function resMan() {}

function roomManagement() {

    $(function () {

        window.location = "#system_options";
        sysOpt.html('<p> <button class="btn btn-primary perspective"  onclick="roomAdd()">Add Rooms</button>   &nbsp; <button class="btn btn-primary perspective" onclick="roomAvail()">Manage room Availability</button>  &nbsp; <button class="btn btn-primary perspective" onclick="roomUnAvail()">Specially Reserved Rooms</button>  </p>');

    });

}


function reservantManagement() {

    $(function () {

        window.location = "#system_options";
        sysOpt.html('<p><button class="btn btn-danger perspective"  onclick="occuReset()">Reservation Reset</button>   &nbsp; <button class="btn btn-danger perspective" onclick="occuSearch()">Comprehensive search</button> &nbsp; <button class="btn btn-danger perspective" onclick="occuSearch2()">Reservant Search</button>  &nbsp; <button class="btn btn-danger perspective" onclick="occuFin()">Deactivate User Account</button> </p> ');


    });

}


function systemConfiguration() {

    $(function () {


        window.location = "#system_options";
        sysOpt.html('<p> <button class="btn btn-warning perspective"  onclick="sysBackup()">System Backup</button>   &nbsp; <button class="btn btn-warning perspective disabled"  onclick="sysRestore()">System Restore</button>   &nbsp; <button class="btn btn-warning perspective"  onclick="sysClear()">Clear Old Backup</button>   &nbsp; <button class="btn btn-warning perspective"  onclick="sysEnable()">Enable Reservation</button>   &nbsp; <button class="btn btn-warning perspective"  onclick="sysDisable()">Disable Reservation</button>  </p>');


    });
}


function roomAdd() {

    $(function () {


        sysOpt.html('<strong style="color: #37BC9B;" >Room Addition</strong><br><div><input type="text" class="mbtn" placeholder="First Room" id="roomAddfroom"> &nbsp;<input type="text" class="mbtn" placeholder="nth room" id="roomAddlroom"><br><br><input type="text" class="mbtn" placeholder="Room Capacity" id="roomAddcapacity">&nbsp;<select id="roomAddresidence" class="mbtn" style="text-transform: uppercase;"></select><br><br><button class="btn " style="color:white; background: #37BC9B;" id="addRoom"> Add Room(s) </button></div>');

        /* Load the residence list to the select box */

        loadResidenceLists("roomAddresidence");

        $("#addRoom").on("click", function () {

            var room_start = $("#roomAddfroom");
            var room_end = $("#roomAddlroom");
            var room_capacity = $("#roomAddcapacity");
            var residence = $("#roomAddresidence");
            var act = "new_room";

            if (room_start.val().length > 0 && !isNaN(room_start.val())) {

                if (room_capacity.val().length > 0 && !isNaN(room_capacity.val())) {

                    if (residence.val() != "" && residence.val() != undefined) {

                        if (room_end.val().length != 0) {
                            if (isNaN(room_end.val()) || (parseInt(room_end.val()) < parseInt(room_start.val()))) {
                                room_end.val('');
                            }
                        }

                        $("#addRoom").addClass("disabled");

                        $.post('proc_adds.php', {
                                act: "new_room",
                                room_start: room_start.val(),
                                room_end: room_end.val(),
                                room_capacity: room_capacity.val(),
                                residence: residence.val()
                            },
                            function (response) {
                                sysOpt.html(response);
                            });

                    } else {
                        residence.focus();
                    }

                } else {
                    room_capacity.focus();
                }

            } else {
                room_start.focus();
            }

        });

    });

}


/**
 * Manage Room Availability
 * [Make room[s] unavailable]
 */
function roomAvail() {

    loadResidenceLists("reserveResidence");

    $('#system_options').html('<strong style="color: #37BC9B;">Special Room Reservation</strong><br><div><input type="text" class="mbtn" placeholder="First Room" id="room_start"> &nbsp;<input type="text" class="mbtn" placeholder="nth room" id="room_end"><br><br><select id="reserveResidence" class="mbtn" style="text-transform: uppercase;"></select><br><br><button class="btn" style="background: #37BC9B; color: white;" id="specialReserve"> Reserve Room(s)</button></div>');

    $("#specialReserve").on('click', function () {

        var residence = $("#reserveResidence");
        var room_start = $("#room_start");
        var room_end = $("#room_end");

        /* SIMPLE VALIDATION */

        if (room_start.val().length > 0) {

            if (parseInt(room_start.val()) > parseInt(room_end.val())) {
                room_end.val('');
            }

            $.post('proc_adds.php', {
                    act: "new_room_reserve",
                    residence: residence.val(),
                    room_start: room_start.val(),
                    room_end: room_end.val()
                },
                function (response) {

                    sysOpt.html(response);

                });


        } else {
            room_start.focus();
        }

    });


}



/**
 * Manage Room Availability
 * [Make room[s] available]
 */
function roomUnAvail() {

    $(function () {

        $.post('room_unavailable.php', function (data, status, xhr) {

            if (xhr.getResponseHeader('Content-Type') === "text/html") {

                sysOpt.html(data);

            } else {

                rooms = data.rooms
                reslist = data.residences
                $ress = '<strong style="color: #37BC9B;">Specially Reserved Rooms</strong><br>';

                for (room in rooms) {

                    $ress += '<div class="panel panel-primary col col-lg-6" ><input type="text" class="mbtn bg-primary col-lg-4" disabled style="" value="' + rooms[room].r_number + '" > <input type="text" class="mbtn bg-danger col-lg-4" disabled title="' + reslist[rooms[room].residence] + '" value="' + reslist[rooms[room].residence] + '" ><button class="btn btn-warning perspective col-lg-4" style=" " onclick="makeAvailable( ' + rooms[room].r_number + ', ' + rooms[room].residence + ' )" > Make Available </button></div>';

                }
                sysOpt.html($ress);

            }

        });

    });

}


/* 
    Mark a Single Room as available for booking 
*/
function makeAvailable(room, residence) {

    $.post('proc_adds.php', {
            act: "new_room_reserve",
            room_start_1: room,
            residence_1: residence
        },
        function (response) {
            sysOpt.html(response);
            setTimeout(function () {
                roomUnAvail();
            }, 5000);
        });

}


/* 
    Reset the occupants' reservation status
*/
function occuReset() {
    sysOpt.html('<strong style="color: #E5553E;">Reservation Reset</strong><br><div><input type="text" class="mbtn" placeholder="ID Number/Reset Command" id="id_number"> &nbsp;<button class="btn" style="background: #E5553E; color: white;" id="occuReset"> Reset Reservation</button></div>');
    $("#occuReset").on("click", function () {
        $.post('proc_adds.php', {
                act: "clear_room",
                id_number: $("#id_number").val()
            },
            function (response) {
                sysOpt.html(response);
            }
        );
    });
}


/*
    Perform a comprehensive occupant search
*/
function occuSearch() {
    sysOpt.html('<strong style="color: #37BC9B;">Comprehensive Resident Search</strong><br><div><input type="text" class="mbtn" placeholder="ID Number/ Resident Name" id="occuSearch"><br/><br><div id="occuSearchRes" style="background-color:#E8E9EE; width:100%;"></div></div>');
    $('#occuSearch').keyup(function (e) {
        $("#occuSearchRes").html('<br><center><code>Loading Comprehensive List of Active residents</code></center><div class="spinner"><div class="rect1"></div><div class="rect2"></div><div class="rect3"></div><div class="rect4"></div><div class="rect5"></div></div>');
        text = $('#occuSearch').val();
        work("/roomres/proc_adds.php?act=5346)7454dm1_pro&stringy=" + text, $("#occuSearchRes"));
        /*
        $.post("proc_adds.php", {
                stringy: text,
                act: "5346)7454dm1_pro"
            },

            function (data, status) {
                $("#occuSearchRes").html(data);
            });
            */
    });
}

/*
    Perform a simple occupant search for those with reserved rooms
*/
function occuSearch2() {
    sysOpt.html('<strong style="color: #37BC9B;">Confirmed Resident Search</strong><br><div><input type="text" class="mbtn" placeholder="ID Number/ Resident Name" id="occuSearch2"><br/><br><div id="occuSearchRes2" style="background-color:#E8E9EE; width:100%;"></div></div>');
    $('#occuSearch2').keyup(function (e) {
        $("#occuSearchRes2").html('<br><center><code>Loading Comprehensive List of Active residents</code></center><div class="spinner"><div class="rect1"></div><div class="rect2"></div><div class="rect3"></div><div class="rect4"></div><div class="rect5"></div></div>');
        text = $('#occuSearch2').val();

        work("/roomres/proc_adds.php?act=5346)7454dm1_basic_pro&stringy=" + text, $("#occuSearchRes2"));
        /* $.post("proc_adds.php", {
                 stringy: text,
                 act: "5346)7454dm1_basic_pro"
             },

             function (data, status) {
                 $("#occuSearchRes2").html(data);
             });
             */
    });
}

/*
    Disable a reservant's account
*/
function occuFin() {
    sysOpt.html('<strong style="color: #E9573F;">User Account Deactivation</strong><br><div><input type="text" class="mbtn" placeholder="ID Number,ID Number2, ..." id="username"> &nbsp;<button class="btn" style="background: #E9573F; color: white;" id="occuFin"> Deactivate Account</button> </div>');

    var occuFinEval = function () {
        text = $("#username").val();
        $.post('proc_adds.php', {
                act: "detonate",
                username: text
            },
            function (response) {
                sysOpt.html(response);
            });
    }
    $("#occuFin").on('click', occuFinEval);


}



/* The universal reUsable worker */
function work(url, obj) {
    var worker = (typeof (worker) == "undefined") ? new Worker("assets/js/resListWorker.js") : worker;
    worker.addEventListener('message', function (e) {
        obj.html(e.data);
        worker.terminate();
    }, false);
    worker.postMessage(url); // Send filename to our worker.
}