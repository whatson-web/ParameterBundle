var ids = ['form_valueString', 'form_valueLink', 'form_valueText', 'form_image'];

var manageType = function () {

    ids.forEach(function (value) {
        $('#' + value).closest('.form-group').css('display', 'none');
    });

    var type = $('#form_type').val();

    if (type == 'string') {
        $('#form_valueString').closest('.form-group').css('display', 'block');
    } else {
        $('#form_valueString').closest('.form-group').css('display', 'none');
    }
    if (type == 'text') {
        $('#form_valueText').closest('.form-group').css('display', 'block');
    } else {
        $('#form_valueText').closest('.form-group').css('display', 'none');
    }
    if (type == 'internal-link' || type == 'external-link') {
        $('#form_valueLink').closest('.form-group').css('display', 'block');
    } else {
        $('#form_valueLink').closest('.form-group').css('display', 'none');
    }
    if (type == 'image') {
        $('#form_image').closest('.form-group').css('display', 'block');
    } else {
        $('#form_image').closest('.form-group').css('display', 'none');
    }
};

$('#form_type').change(function () {
    manageType();
});

manageType();