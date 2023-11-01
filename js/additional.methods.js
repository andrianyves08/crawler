// CHECK BOX FLEXI GRID

function checkrow(id) {
    if ($('#checkbox_' + id).attr('checked')) {
        $('tr#row' + id).attr('class', 'trSelected');
    } else {
        $('tr#row' + id).attr('class', '');

    }
}

function checkall(check_all) {
    var is_checked = check_all.checked;
    if (is_checked) {
        $('.cr_checkbox').attr('checked', true);
        ButtonAction("SELECT ALL");
    } else {
        $('.cr_checkbox').attr('checked', false);
        ButtonAction("DESELECT ALL");
    }
}

/*
	IMAGE GALLERY V1.0
*/
var counter = 0;

function imageaction(tablename, type, ref_id, limit, upload_dir, gallery_mode) {

    $('#sort_order' + counter).val(10);
    counter++;

    // VALIDATE # OF FILES TO UPLOAD
    if (counter == limit) {
        $('#btn_addimage').hide();
    } else {
        $('#btn_addimage').show();
    }

    $.get('/sos/admin/com/imagegallery/image-gallery-ajax.php', {
        tablename: tablename,
        type: type,
        ref_id: ref_id,
        limit: limit,
        counter: counter,
        upload_dir: upload_dir,
        gallery_mode: gallery_mode,
    }, function(data) {
        $('#gallery_form').hide();
        $('#gallery_form').append(data);
        $('#gallery_form').fadeIn(300);

    });

    //$('#btn_cancelimageupload').show();
    $('#required_image_size_note').show();

}
var countr = 0;

function edit_image(tablename, id, gallery_mode) {
    countr++;
    $('#edit' + id).hide();
    $.get('com/imagegallery/image-gallery-ajax.php', {
        tablename: tablename,
        id: id,
        gallery_mode: gallery_mode,
        countr: countr,
    }, function(data) {
        $('#gallery_form').hide();
        $('#gallery_form').append(data);
        $('#gallery_form').fadeIn(300);

    });

}

function delete_image(tablename, id, gallery_mode) {

    var conf = confirm("Press Ok to Delete the Image.");

    if (conf) {
        $.get('com/imagegallery/image-gallery-ajax.php', {
            tablename: tablename,
            id: id,
            gallery_mode: gallery_mode
        }, function(data) {
            $('#row' + data).fadeOut(300);
        });
    } else {

    }

}

/*
	ROOM ALLOCATION V1.0
*/

function incrementvalue(id, maxval) {
    var currentvalue = parseInt($('#' + id).val());
    currentvalue++;
    if (currentvalue <= maxval) {
        $('#' + id).val(currentvalue);
    } else {
        alert('Value is greater than maximum available.');
    }
}

function decrementvalue(id) {
    var currentvalue = parseInt($('#' + id).val());
    currentvalue--;
    if (currentvalue != -1) {
        $('#' + id).val(currentvalue);
    }
}

function incrementvalueb(id, alid, reid, res) {
    var currentvalue = parseInt($('#' + id).val());
    var maxvalue = parseInt($('#' + alid).val()) - res;
    currentvalue++;
    if (currentvalue <= maxvalue) {
        $('#' + id).val(currentvalue);
    } else {
        alert('Number of blocked is greater than the Available Rooms.');
        return false;
    }

}

function decrementvalueb(id) {
    var currentvalue = parseInt($('#' + id).val());
    currentvalue--;
    if (currentvalue != -1) {
        $('#' + id).val(currentvalue);
    }
}

function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode

    if (charCode == 46)
        return true;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;


    return true;
}

function calendar_changer(id, id, date) {

}

function sort_gallery(tablename, id, gallery_mode, ref_id, type) {
    $.get('com/imagegallery/image-gallery-ajax.php', {
        tablename: tablename,
        id: id,
        ref_id: ref_id,
        type: type,
        gallery_mode: gallery_mode
    }, function(data) {
       window.location.reload();
    });
}

function cancelimageupload(resct) {
    counter = resct;
    $('.gallery-form-table').remove();
    $('#btn_addimage').show();
    $('.editimg').show();
    $('#required_image_size_note').hide();
}



$.validator.addMethod("email", function(value, element) {
    //return this.optional(element) || /[a-z0-9]+@[a-z]+\.[a-z]+/.test(value);
    return this.optional(element) || /^[a-zA-Z0-9\-._\s]+@[a-z0-9\-_\s]+\.[a-z]+/.test(value);
}, "Must be in email address format");


$.validator.addMethod("alphanumeric", function(value, element) {
    return this.optional(element) || /^[a-z0-9\-,'.\s]+$/i.test(value);
}, "Must contain only letters, numbers, or dashes.");

$.validator.addMethod("alpha", function(value, element) {
    return this.optional(element) || /^[a-z\-,'\s]+$/i.test(value);
}, "Must contain only letters,dashes,comma, or quotation mark.");

// Older "accept" file extension method. Old docs: http://docs.jquery.com/Plugins/Validation/Methods/accept
$.validator.addMethod("extension", function(value, element, param) {
    param = typeof param === "string" ? param.replace(/,/g, "|") : "png|jpe?g|gif";
    return this.optional(element) || value.match(new RegExp("\\.(" + param + ")$", "i"));
}, $.validator.format("Please enter a value with a valid extension."));

$.validator.addMethod("greaterThan", function(value, element, param) {
    var $element = $(element),
        $min;

    if (typeof(param) === "string") {
        $min = $(param);
    } else {
        $min = $("#" + $element.data("min"));
    }

    if (this.settings.onfocusout) {
        $min.off(".validate-greaterThan").on("blur.validate-greaterThan", function() {
            $element.valid();
        });
    }

    console.log(parseInt(value) + " " + parseInt($min.val()));
    if (value == "" && $min.val() == "") {

        console.log("in");
        return true;

    } else {

        return parseInt(value) > parseInt($min.val());

    }

}, "Max must be greater than min");

$.validator.addClassRules({
    greaterThan: {
        greaterThan: true
    }
});

// TEMPLATE SCRIPT FOR DATE RANGE SELECTOR. ALWAYS USE date_start AND date_end WHEN CALLING THIS FUNCTIONS 
/* 
    OPTIONS AVAILABLE (apply as attribute in input eg. timevalidity='1')
    timevalidity: allow time input for this datepicker
    maxrange: maximum range of the datepicker. Please treat this as number for days only. This should be attributed to date_start only eg. 365 = 365days , by default it will be 6 months 
*/

$(function() {
    var maxrange = parseInt($(".date_start").attr('maxrange'));
    // console.log(maxrange);
    $(".date_start").datepicker({
		dateFormat: 'yy-mm-dd',
        onSelect: function(selectedDate) {
            var date = $(this).datepicker("getDate");
            date.setDate(date.getDate() + maxrange);
            $(".date_end").datepicker("setDate", date);
            $(".date_end").datepicker("option", "minDate", selectedDate);
            $(".date_end").datepicker("option", "maxDate", date);
        }
    });


    $(".date_end").datepicker({
		dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true
    })

});


$(function() {
    var maxrange = parseInt($("#validity_start_date").attr('maxrange'));
    // console.log(maxrange);
    $("#validity_start_date").datepicker({
		format: 'yyyy-mm-dd',
		dateFormat: 'yy-mm-dd',
        onSelect: function(selectedDate) {
            var date = $(this).datepicker("getDate");
            date.setDate(date.getDate() + maxrange);
            $("#validity_end_date").datepicker("setDate", date);
            $("#validity_end_date").datepicker("option", "minDate", selectedDate);
            $("#validity_end_date").datepicker("option", "maxDate", date);
        }
    });


    $("#validity_end_date").datepicker({
		format: 'yyyy-mm-dd',
		dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true
    })

});