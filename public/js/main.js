$(document).ready(function() {
    $('.delete-record').click(function() {
        if (confirm("Are you sure you want to delete this record?")) {
            return true
        }
        return false
    })
})
