require('./bootstrap');
require('moment');
require('fullcalendar');
require('popper.js');

// To show image upon attaching it to the input
function createEmployeeImg(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader()
        reader.onload = function(e) {
            $('#profile-img').attr('src', e.target.result)
        }
        reader.readAsDataURL(input.files[0])
    }
}

$("#img-input").change(function() {
    createEmployeeImg(this);
});

// Repeated the function above for edit employee
function editEmployeeImg(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader()
        reader.onload = function(e) {
            $('#edit-profile-img').attr('src', e.target.result)
        }
        reader.readAsDataURL(input.files[0])
    }
}

$("#edit-img-input").change(function() {
    editEmployeeImg(this);
});

// View Employee Modal
$('#viewEmployee').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)

    var profileImage = button.data('profileImage')
    var name = button.data('name')
    var position = button.data('position')
    var email = button.data('email')
    var contactNo = button.data('contactNo')
    var attendanceId = button.data('attendanceId')

    var modal = $(this)

    modal.find('.modal-body #view-profile-img').attr('src', '/storage/employee/images/' + profileImage)
    modal.find('.modal-body #name').text(name)
    modal.find('.modal-body #position').text(position)
    modal.find('.modal-body #email').text(email)
    modal.find('.modal-body #contactNo').text(contactNo)
    modal.find('.modal-body #attendanceId').text(attendanceId)
})

// Edit Employee Modal
$('#editEmployee').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)

    var id = button.data('id')
    var profileImage = button.data('profileImage')
    var name = button.data('name')
    var position = button.data('position')
    var email = button.data('email')
    var contactNo = button.data('contactNo')

    var modal = $(this)

    modal.find('.modal-body #id').val(id)
    modal.find('.modal-body #name').val(name)
    modal.find('.modal-body #position').val(position)
    modal.find('.modal-body #email').val(email)
    modal.find('.modal-body #contact_no').val(contactNo)
    modal.find('.modal-body #edit-profile-img').attr('src', '/storage/employee/images/' + profileImage)
})

// Show Delete alert confirmation
$('table[data-form="deleteForm"]').on('click', '.form-delete', function(e) {
    e.preventDefault();
    var $form = $(this);
    $('#confirm').modal({ backdrop: 'static', keyboard: false })
        .on('click', '#delete-btn', function() {
            $form.submit();
        });
});

// Notif Alert
$(function () {
    $('#markAsRead').click(function() {
        $.get('/markAsRead')
    })
})

/************************************
 *  Attendance Page - FullCalendar  *
 ************************************/
$(() => {
    if ($('#calendar').length) {
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,listDay'
            },
            businessHours: {
                dow: [1, 2, 3, 4, 5, 6]
            },
            showNonCurrentDates: false,
            events: (start, end, timezone, callback) => {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "/admin/attendance/events",
                    type: "POST",
                    data: {
                        start: start.format(),
                        end: end.format()
                    },
                    success: (data) => {
                        console.log(start.format() + " " + end.format());
                        console.log(data);
                        callback(data);
                    }
                });
            },
            dayClick: function(date) {
                $('#calendar').fullCalendar('select', date);
                window.location.href = "/admin/attendance?month=" + date.format("MMMM") +
                                        "&day=" + date.format("DD") + "&year=" + date.format("YYYY");
            },
            eventRender: function(event, element) {
                element.popover({
                    title: event.title,
                    content: event.description,
                    trigger: 'hover',
                    placement: 'top',
                    container: 'body'
                });
            },
            eventLimit: true,
            eventLimitClick: 'popover',
            views: {
                month: {
                    displayEventTime: false,
                    navLinks: true,
                    navLinkDayClick: 'listDay'
                },
                basicWeek: {
                    navLinkWeekClick: 'listDay'
                },
                listDay: {
                    displayEventEnd: true,
                    noEventsMessage: 'No attendance record on this day',
                    titleFormat: 'dddd, MMMM, D, YYYY'
                }
            }
        });
    }
})
