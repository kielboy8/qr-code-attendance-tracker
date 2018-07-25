$(document).ready(function() {
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
    scanner.addListener('scan', function (content) {
        // Add QR Content validation
        // if (content) { }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "/scan",
            data: {
                id: content
            },
            success: function(data) {
                if (data.response == 'valid') {
                    $("#emp-name").html(data.employee.name);
                    $("#emp-pos").html(data.employee.position);
                    $("#emp-in").html("Time in: " + data.attendance.time_in);
                    $("#emp-out").html("Time out: " + (data.attendance.time_out ? data.attendance.time_out : "N/A"));
                    $("#emp-img").html("<img src=\"/storage/employee/images/" + data.employee.profile_image + "\" style=\"width: 50px\" class=\"mr-3 rounded-circle shadow\">");

                    setTimeout(() => {
                        $("#emp-name").html("Employee Name");
                        $("#emp-pos").html("Employee Position");
                        $("#emp-in").html("Time in: ");
                        $("#emp-out").html("Time out:");
                        $("#emp-img").html("<i class=\"mdi mdi-account-circle display-1 h1\"></i>");
                    }, 5000);
                }
                else {
                    alert(data.response);
                }
            }
        });
    });

    Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
    }).catch(function (e) {
        console.error(e);
    });

});
