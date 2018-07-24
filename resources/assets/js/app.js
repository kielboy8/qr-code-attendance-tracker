
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});

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

    var id = button.data('id')
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
    var attendanceId = button.data('attendanceId')

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
