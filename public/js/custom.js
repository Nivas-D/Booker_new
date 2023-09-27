
    (function (fn) {
        'use strict';
        fn(window.jQuery, window, document);
    }(function ($, window, document) {
        'use strict';

        $(function () {
            $('.sort-btn').on('click', '[data-sort]', function (event) {
                event.preventDefault();

                var $this = $(this),
                    sortDir = 'desc';

                if ($this.data('sort') !== 'asc') {
                    sortDir = 'asc';
                }

                $this.data('sort', sortDir).find('.fa').attr('class', 'fa fa-sort-' + sortDir);

                // call sortDesc() or sortAsc() or whathaveyou...
            });
        });
    }));


    // quantity decrease and increase 

    function incrementValue(e) {
        e.preventDefault();
        var fieldName = $(e.target).data('field');
        var parent = $(e.target).closest('div');
        var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

        if (!isNaN(currentVal)) {
            parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
        } else {
            parent.find('input[name=' + fieldName + ']').val(0);
        }
    }

    function decrementValue(e) {
        e.preventDefault();
        var fieldName = $(e.target).data('field');
        var parent = $(e.target).closest('div');
        var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

        if (!isNaN(currentVal) && currentVal > 0) {
            parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
        } else {
            parent.find('input[name=' + fieldName + ']').val(0);
        }
    }

    $('.input-group').on('click', '.button-plus', function(e) {
        incrementValue(e);
    });

    $('.input-group').on('click', '.button-minus', function(e) {
        decrementValue(e);
    });

