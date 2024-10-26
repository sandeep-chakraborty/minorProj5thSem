	$(document).ready(function() {
    $('#myTable').DataTable( {

        "bDestroy": true,
       
        dom: 'Bfrtip',
        
        buttons: [
            'copy', 'excel', 'print'
        ]
    });
});