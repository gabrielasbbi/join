$(document).ready(function () {
    $('.edit-product-modal-link').on('click', function(e){
        $('.edit-input-id').attr('value', $(this).data('id'));
        $('.edit-select-category').val($(this).data('category-id'));
        $('.edit-input-name').attr('value', $(this).data('name'));
        $('.edit-input-value').attr('value', $(this).data('value'));
    });

    $(".decimal").mask('#.##0,00', {reverse: true});
});
