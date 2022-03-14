$(document).ready(function () {
    $('.edit-modal-link').on('click', function(e){
        $('.edit-input-id').attr('value', $(this).data('id'));
        $('.edit-input-name').attr('value', $(this).data('name'));
    });
});
