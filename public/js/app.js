$(document).ready(function () {
    $('#dtBasicExample').DataTable({
        "pagingType": "simple" // "simple" option for 'Previous' and 'Next' buttons only
    });
    $('.dataTables_length').addClass('bs-select');

    // Activate tooltip
    $('[data-toggle="tooltip"]').tooltip();

    // Select/Deselect checkboxes
    $("#selectAll").click(function(){
        if(this.checked){
            $('.checkbox-item').each(function(){
                this.checked = true;
            });
        } else{
            $('.checkbox-item').each(function(){
                this.checked = false;
            });
        }
    });

    $('.checkbox-item').click(function(){
        if(!this.checked){
            $("#selectAll").prop("checked", false);
        }
    });

    $('.delete-modal-link').on('click', function (e) {
        let ids = [];
        ids.push($(this).data('id'));

        $('.delete-id').attr('value', ids);
    });

    $('.delete-button').click(function (e) {
        let ids = [];
        $('.checkbox-item').each(function(){
            if(this.checked === true) {
                ids.push($(this).val());
            }
        });

        $('.delete-id').attr('value', ids);
    });
});
