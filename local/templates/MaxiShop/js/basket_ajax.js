$(document).ready(function () {
    $(document).on('click', '.js-add-to-basket', function () {
        var id = $(this).data('id');

        console.log(id);

        if (id) {
            $.fancybox({
                type: 'ajax',
                href: '/local/ajax/add-to-basket.php',
                ajax: {
                    type: 'POST',
                    data: {
                        id: id,
                    }
                }
            });
        } else {
            alert('error');
        }
    });
});