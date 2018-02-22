/*
 * Form validation
 *
 */

var FormValidation = function () {

    // Master Validation
    var faqValidation = function() {

            var form = $('#form_order');
            var errorAlert = $('.alert-danger', form);
            var successAlert = $('.alert-success', form);

            form.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                rules: {
                    tipe_pelanggan: {
                        required: true,
                    },
                    nama_perusahaan:{
                        required: true,
                    },
                    alamat_perusahaan:{
                        required: true,
                    },
                    penanggung_jawab:{
                        minlength: 3,
                        required: true,
                    },
                    jabatan_penanggung_jawab:{
                        minlength: 3,
                        required: true,
                    },
                    nip_penanggung_jawab:{
                        minlength: 3,
                        required: true,
                    },
                    hp_penanggung_jawab:{
                        minlength: 9,
                        required: true,
                    },
                    telp:{
                        minlength: 3,
                        required: true,
                    },
                    email:{
                        minlength: 5,
                        required: true,
                    },
                    id_paket:{
                        minlength: 5,
                        required: true,
                    },
                    jangka_waktu:{
                        required: true,
                    },
                    rencana_pemasangan:{
                        minlength: 5,
                        required: true,
                    },
                    installasi:{
                        minlength: 5,
                        required: true,
                    },

                },
                messages:{
                    tipe_pelanggan:{
                        required: "Please select Tipe Pelanggan"
                    },
                    nama_perusahaan:{
                        required: "Please Fill Nama Perusahaan"
                    },
                    alamat_perusahaan:{
                        required: "Please Fill Alamat Perusahaan"
                    },
                    penanggung_jawab:{
                        required: "Please Fill Nama Penanggungjawab"
                    },
                    jabatan_penanggung_jawab:{
                        required: "Please Fill Jabatan Penanggungjawab"
                    },
                    nip_penanggung_jawab:{
                        required: "Please Fill NIP Penanggungjawab"
                    },
                    hp_penanggung_jawab:{
                        required: "Please Fill No. HP Penanggungjawab"
                    },
                    telp:{
                        required: "Please Fill Telp Perusahaan"
                    },
                    email:{
                        required: "Please Fill Email Penanggungjawab"
                    },
                    id_paket:{
                        required: "Please Fill Paket"
                    },
                    jangka_waktu:{
                        required: "Please Fill Durasi Paket"
                    },
                    rencana_pemasangan:{
                        required: "Please Fill Rencana Pemasangan"
                    },
                    installasi:{
                        required: "Please Select Instalasi"
                    },
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    successAlert.hide();
                    errorAlert.show();
                    App.scrollTo(errorAlert, -200);
                },

                errorPlacement: function (error, element) { // render error placement for each input type

                    if (element.parent(".input-icon").size() > 0) {

                        // For icon group
                        var icon = element.parent('.input-icon').children('i');
                        icon.removeClass('fa-check').addClass("fa-warning");  
                        icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});

                    } else if (element.parent(".input-group").size() > 0){

                        // For select option
                        if(element.parent('.input-group').children('.input-group-addon')){

                            var span = element.parent('.input-group').children('.input-group-addon');
                            span.removeClass('display-hide');

                            var spanIcon = $(span).children('i');
                            spanIcon.removeClass('fa-check').addClass("fa-warning");
                            spanIcon.removeClass('font-green').addClass("font-red");
                            spanIcon.attr("data-original-title", error.text()).tooltip({'container': 'body'});

                        }else{

                            error.insertAfter(element.parent(".input-group"));

                        }

                    } else if (element.attr("data-error-container")) { 

                        error.appendTo(element.attr("data-error-container"));

                    } else if (element.parents('.mt-radio-list') || element.parents('.mt-checkbox-list')) {                        
                        if (element.parents('.mt-radio-list')[0]) {
                            error.appendTo(element.parents('.mt-radio-list')[0]);
                        }
                        if (element.parents('.mt-checkbox-list')[0]) {
                            error.appendTo(element.parents('.mt-checkbox-list')[0]);
                        }
                    } else if (element.parents('.mt-radio-inline') || element.parents('.mt-checkbox-inline')) {

                        if (element.parents('.mt-radio-inline')[0]) {
                            error.appendTo(element.parents('.mt-radio-inline')[0]);
                        }
                        if (element.parents('.mt-checkbox-inline')[0]) {
                            error.appendTo(element.parents('.mt-checkbox-inline')[0]);
                        }

                    } else {

                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }


                    // Check if all requirement invalid and show error text
                    if(successAlert.is(":visible")){
                        var errors = 0;
                        form.each(function(){
                            if($(this).find('.form-group').hasClass('has-error')){
                                errors += 1;
                            } 
                        });

                        if(errors > 0){ 
                            successAlert.hide();
                            errorAlert.show();
                        }
                    }

                },

                highlight: function (element) { // hightlight error inputs
                    // set error class to the control group   
                    $(element).closest('.form-group').removeClass("has-success").addClass('has-error');                   
                },

                unhighlight: function (element) { // revert the change done by hightlight
                
                },

                success: function (label, element) {

                    // set success class to the control group
                    $(element).closest('.form-group').removeClass('has-error').addClass('has-success');

                    // For icon group
                    if ($(element).parent(".input-icon").size() > 0) {
                        var icon = $(element).parent('.input-icon').children('i');
                        icon.removeClass("fa-warning").addClass("fa-check");
                    }

                    // For select option
                    if ($(element).parent(".input-group").size() > 0){

                        if($(element).parent('.input-group').children('.input-group-addon')){
                            var span = $(element).parent('.input-group').children('.input-group-addon');
                            span.removeClass('display-hide');

                            var spanIcon = $(span).children('i');
                            spanIcon.removeClass('fa-warning').addClass("fa-check");
                            spanIcon.removeClass('font-red').addClass("font-green");                          
                        }
                    }

                    // Check if all requirement valid and show success text
                    if(errorAlert.is(":visible")){
                        var errors = 0;
                        form.each(function(){
                            if($(this).find('.form-group').hasClass('has-error')){
                                errors += 1;
                            } 
                        });

                        if(errors == 0){ 
                            successAlert.show();
                            errorAlert.hide();
                        }
                    }


                },

                submitHandler: function (form) {

                    // form[0].submit(); // submit the form

                    // Using FormData to append file type to form input
                    var formData = new FormData($(form)[0]);                    

                    $.ajax({
                        url: form.action,
                        type: form.method,
                        // data: $(form).serialize(),
                        data: formData,
                        dataType: 'json',                        
                        processData: false,
                        contentType: false,
                        success: function (data) {                            
                            
                            var titleMsg;
                            var textMsg;

                            if(data.method == "PATCH"){
                                titleMsg = "Update!";
                                textMsg = 'Data has been updated!';
                            }else{
                                titleMsg = "Insert!";
                                textMsg = 'Data has been created!';
                            }

                            swal({
                                    title: titleMsg,
                                    text: textMsg,
                                    type: 'success'
                                },
                                function(){
                                    window.location.href = data.url;
                                    console.log(data);

                                    // $('#faqTable').DataTable().search('').draw();
                                    // $('#faqTable').DataTable().ajax.reload();

                                    // $('#faq').modal('hide');                                    
                                }
                            )
                            // console.log(data.method);

                        },
                        error: function(response) {
                            console.log('Error:', response);
                            swal("Error!", "Failed to perform the task!", "error");
                        }
                    });

                }
            });


    }

    return {
        //main function to initiate the module
        init: function () {

            faqValidation();

        }

    };

}();

/*
 * Set up module
 *
 */ 

jQuery(document).ready(function() {    
    FormValidation.init();
});

/*
 * Select2 validation
 *
 */ 

$(document.body).on("change",".select2select",function(){

    select2Change($(this), $('#form_order'));

});

// Reset Validation
function resetValidation(){
    $('#form_order').each(function(){
        $(this).find('.form-group').removeClass('has-error').removeClass('has-success');            
        $(this).find('.fa').removeClass('fa-check').removeClass('fa-warning');
    });

    $('.alert-danger', $('#form_order')).hide();
    $('.alert-success', $('#form_order')).hide();
}