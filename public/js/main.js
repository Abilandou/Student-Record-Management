$(document).ready(function() {
     //Datatable
    $("#example1").DataTable();

    $('.delete-record').click(function() {
        if (confirm("Are you sure you want to delete this record? You will not be able to recover it back, click 'Cancel' to stop this action or 'OK' to continue")) {
            return true
        }
        return false
    })
    $('a.delete-record').click(function() {
        if (confirm("Are you sure you want to delete this record? You will not be able to recover it back, click 'Cancel' to stop this action or 'OK' to continue")) {
            return true
        }
        return false
    })


})

//Data tables
