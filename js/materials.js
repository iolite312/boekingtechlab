jQuery(document).ready(function () {
    // This button will increment the value
    $('[data-quantity="plus"]').click(function (e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name for the value of the button
        fieldName = $(this).attr('data-field');
        // Get the field name for the max value for the item
        var maxValField = $(this).parent().siblings('.material-input').attr('max');
        // Get its current value
        var currentVal = parseInt($('input[name=' + fieldName + ']').val());
        // Get the max allowed value for this item
        var maxVal = parseInt(maxValField);
        // If is not undefined
        if (!isNaN(currentVal) && currentVal < maxVal) {
            // Increment
            $('input[name=' + fieldName + ']').val(currentVal + 1);
        } else if (currentVal == maxVal) {
            alert("the max is " + maxVal);
        } else {
            // Otherwise put a 0 there
            $('input[name=' + fieldName + ']').val(0);
        }
    });
    // This button will decrement the value till 0
    $('[data-quantity="minus"]').click(function (e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('data-field');
        // Get its current value
        var currentVal = parseInt($('input[name=' + fieldName + ']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name=' + fieldName + ']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name=' + fieldName + ']').val(0);
        }
    });
});