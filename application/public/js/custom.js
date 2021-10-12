$(document).ready(function () {

    /*Dont change following codes with out understanding*/

    //Declaring AdminPane./USEO Datatable
    var adminTable = $('#adminTable').DataTable({
        language: {
            searchPlaceholder: "Type EIIN or Institute Name"
        },
        columnDefs: [
            {
                "targets": [7, 8],
                "visible": false
            }
        ],
        drawCallback: function( settings, start, end, max, total, pre ) {
            // console.log(this.fnSettings().fnRecordsDisplay()); // total number of rows
        }
    });

    //Filtering by Submission
    $('#filterBySubmission').on('change', function () {
        let regex = '^' + this.value;
        adminTable.column(5).search(regex, true, false).draw();
    });

    //Filtering by Verification
    $('#filterByVerification').on('change', function () {
        let regex = '^' + this.value;
        adminTable.column(6).search(regex, true, false).draw();
    });

    //Filtering by filterByInstType
    $('#filterByInstType').on('change', function () {
        // var regex = '/^'+this.value+'$/';
        adminTable.column(7).search(this.value).draw();
    });

    //Filtering by filterByInstType
    $('#filterByUpazila').on('change', function () {
        // var regex = '/^'+this.value+'$/';
        adminTable.column(8).search(this.value).draw();
    });

    /*GetGeoCode*/

    /*GetGeoCode*/

});
