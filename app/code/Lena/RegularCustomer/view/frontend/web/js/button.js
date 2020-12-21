define([
    'jquery',
    'jquery/ui'
], function ($) {
    'use strict';

    $.widget('lena.regularCustomerButton', {
        /**
         * Constructor
         * @private
         */
        _create: function () {
            $(this.element).click(this.openRequestForm.bind(this));
        },

        /**
         * Generate event to open the form
         */
        openRequestForm: function () {
            $(document).trigger('lena_regular_customer_form_open');
        }
    });

    return $.lena.regularCustomerButton;
});
