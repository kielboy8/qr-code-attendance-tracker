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
            url: "/reader/scan",
            data: {
                id: content
            },
            success: function(data) {

                if (data.response == 'valid')
                    $.redirect('/reader/employee', {'id': data.id, '_token': $('meta[name="csrf-token"]').attr('content')});
                else
                    alert('Invalid QR Code!');
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
