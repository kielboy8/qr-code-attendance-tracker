$(document).ready(function() {
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });

    scanner.addListener('scan', function (content) {
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
                    $("#emp-name").text(data.employee.name);
                    $("#emp-pos").text(data.employee.position);
                    $("#emp-in").text("Time in: " + data.attendance.time_in);
                    $("#emp-out").text("Time out: " + (data.attendance.time_out ? data.attendance.time_out : "N/A"));
                    $("#emp-img").attr('src', '/storage/employee/images/' + data.employee.profile_image);

                    setTimeout(() => {
                        $("#emp-name").text("Employee Name");
                        $("#emp-pos").text("Employee Position");
                        $("#emp-in").text("Time in: ");
                        $("#emp-out").text("Time out:");
                        $("#emp-img").attr('src', '/storage/employee/images/noimage.jpg');
                    }, 5000);

                    new Audio("sounds/success.mp3").play();
                }
                else {
                    new Audio("sounds/fail.mp3").play();
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
