import './bootstrap';

$(document).ready(function() {
    $('#search-form').submit(function(e) {
        e.preventDefault(); // Prevent the form from submitting normally

        // Get the search query from the form input
        var query = $(this).find('input[name="search"]').val();

        // Make an AJAX request to the server
        $.ajax({
            url: "{{ route('reports.search') }}",
            type: "GET",
            data: { search: query },
            success: function(response) {
                // Clear the table rows
                $('#students-table tbody').empty();

                // Add the new rows to the table
                $.each(response, function(index, user) {
                    var row = $('<tr></tr>');
                    row.append($('<td>' + students.nisn + '</td>'));
                    row.append($('<td>' + students.nis + '</td>'));
                    row.append($('<td>' + students.name + '</td>'));
                    $('#students-table tbody').append(row);
                });
            }
        });
    });
});


