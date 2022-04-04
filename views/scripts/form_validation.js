$(document).ready(function() {
    $("#product_form").validate({
        rules: {
            sku : { required: true, pattern: /^[A-Za-z0-9]+$/, maxlength: 9 },
            name : { required: true, pattern: /^[A-Za-z ]+$/, maxlength: 20 },
            price : { required: true, pattern: /^[0-9.]+$/, maxlength: 10 },
            size : { required: {depends: $("#productType").val() == 1}, pattern: /^[0-9]+$/, maxlength: 4 },
            weight : { required: {depends: $("#productType").val() == 2}, pattern: /^[0-9]+$/, maxlength: 1 },

            height : { required: {depends: $("#productType").val() == 3}, pattern: /^[0-9]+$/, maxlength: 3 },
            width : { required: {depends: $("#productType").val() == 3}, pattern: /^[0-9]+$/, maxlength: 3 },
            length : { required: {depends: $("#productType").val() == 3}, pattern: /^[0-9]+$/, maxlength: 3 },
        },
        messages : {
            sku : { required: "This field is required!", maxlength: "The SKU cannot exceed 9 characters!", pattern: "No special characters!"},
            name : { required: "This field is required!", maxlength: "The product name cannot exceed 20 characters!", pattern: "No special characters!"},
            size : { required: "This field is required!", maxlength: "This field cannot exceed 4 characters!", pattern: "Only numbers!"},
            height : { required: "This field is required!", maxlength: "This field cannot exceed 3 characters!", pattern: "Only numbers!"},
            width : { required: "This field is required!", maxlength: "This field cannot exceed 3 characters!", pattern: "Only numbers!"},
            length : { required: "This field is required!", maxlength: "This field cannot exceed 3 characters!", pattern: "Only numbers!"},
            weight : { required: "This field is required!", maxlength: "This field cannot exceed 1 character!", pattern: "Only numbers!"}
        }
    });
});