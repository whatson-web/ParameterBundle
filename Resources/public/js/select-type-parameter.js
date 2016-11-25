var ids = ['form_valueString', 'form_valueLink', 'form_valueText'];

var manageType = function () {

    ids.forEach(function (value) {
        $('#' + value).closest('.form-group').css('display', 'none');
    });

    var type = $('#form_type').val();

    if (type == 'string') {
        $('#form_valueString').closest('.form-group').css('display', 'block');
    }
    if (type == 'text') {
        $('#form_valueText').closest('.form-group').css('display', 'block');
    }
    if (type == 'internal-link' || type == 'external-link') {
        $('#form_valueLink').closest('.form-group').css('display', 'block');
    }
};

$('#form_type').change(function () {
    manageType();
});

manageType();