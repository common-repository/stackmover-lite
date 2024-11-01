/**
 * Contains function to check if AWS keys are valid.
 */



function StackMover_KeysChecker(param) {

}

StackMover_KeysChecker.prototype.disable = function() {

    jQuery('#aws-keys-input').attr('disabled', 'disabled');

}

StackMover_KeysChecker.prototype.enable = function() {

    jQuery('#aws-keys-input').attr('disabled', false);

}


StackMover_KeysChecker.prototype.show_output = function(success, log = '') {

    var success_html = '<span id="aws-keys-input-output" class="dashicons dashicons-yes" style="float:none;font-size: 30px;"></span>';
    var output_html = '\
                              <span style="display:inline-block;margin-left:10px;">\
                                          <div id="aws-keys-errors">\
                                          <div id="aws-keys-error-val" style="display:none;float:none">\
                                          <p>\
                                          OUTPUTMESSAGE\
                                          </p>\
                                          </div>\
                                          <a title="Amazon S3 Buckets (us-east-1)" href="#TB_inline?width=600&height=550&inlineId=aws-keys-error-val" class="thickbox">OUTPUTRESULT</a> \
                                          </div> </span>';

    var failure_html = '<span id="aws-keys-input-output" class="dashicons dashicons-no" style="float:none;font-size: 30px;"></span>';

    if (success == true) {

        var success_log_html = output_html.replace('OUTPUTMESSAGE', log);
        success_log_html = success_log_html.replace('OUTPUTRESULT', 'Success!');
        success_html = success_html + success_log_html;

        jQuery('#aws-keys-input-root').append(success_html);

    } else {

        var failure_log_html = output_html.replace('OUTPUTMESSAGE', log);
        failure_log_html = failure_log_html.replace('OUTPUTRESULT', 'Failed!');
        failure_html = failure_html + failure_log_html;

        jQuery('#aws-keys-input-root').append(failure_html);
    }

}


StackMover_KeysChecker.prototype.run = function() {

    var context = this;

    jQuery.ajax({
        type: "post",
        url: "admin-ajax.php",
        data: {
            action: 'stackmover_check_aws_keys',
            aws_access_key_id_val: jQuery('#aws_access_key_id_val').val(),
            aws_secret_access_key_val: jQuery('#aws_secret_access_key_val').val(),
            aws_preset_s3_bucket: jQuery('#aws_preset_s3_bucket').val(),
            aws_s3_region: jQuery('#aws_s3_region').val(),
            security: migratorAjax.security

        },
        beforeSend: function() {

            context.disable();

            var html = '<span id="aws-keys-input-spinner" class="spinner is-active" style="float:none;"> </span>';

            jQuery('#aws-keys-input-output').remove();
            jQuery('#aws-keys-errors').remove();
            jQuery('#aws-keys-input-root').append(html);

        }, //fadeIn loading just when link is clicked
        success: function(output) { //so, if data is retrieved, store it in html

            context.enable();


            if (output['status'] == 1) {

                var lsAZs = new StackMover_LightSailOptions();
                lsAZs.showAZs();

                //enable migrator button
                jQuery('#aws-migrator-run').attr('disabled', false);


                if (jQuery('#aws_preset_s3_bucket').val().length > 0) {
                    StackMover_activateS3Tab('existing-s3-input');
                }

                jQuery('#aws-keys-input-spinner').remove();

                var success_msg = output['val'];

                if (Array.isArray(success_msg)) {
                    success_msg = success_msg.join('<br>');
                }


                context.show_output(true, success_msg);

            } else {

                jQuery('#aws-keys-input-spinner').remove();

                var error_msg = output['val'];

                context.show_output(false, error_msg);
            }


        },
        error: function(request, status, error) {

            context.enable();
            jQuery('#aws-keys-input-spinner').remove();

            context.show_output(false);

        },
        complete: function() {

        }

    });

}

jQuery(document).ready(function() {

    jQuery('#aws-keys-input').click(function(event) {

        event.preventDefault();

        var checker = new StackMover_KeysChecker();

        checker.run();
        return  false;


    });

});
