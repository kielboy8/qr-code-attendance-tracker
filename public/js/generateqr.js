$(document).ready(function() {
    $(".btn-view").click(function(event) {
        var id = $(this).data("attendanceId");

        event.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Content-type': 'application/x-www-form-urlencoded'
            }
        });

        $.ajax({
            type: "POST",
            url: "/admin/employees",
            data: {
                body: id
            },
            success: function(data) {
                $("#qr-field").attr("src", "data:image/png;base64," + data.qrcode);
            }
        });
    });

});
