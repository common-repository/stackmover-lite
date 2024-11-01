/**
 * Contains function to create S3 bucket.
 */
function StackMover_BucketCreator(param) {

    this.action = param['action'];
    this.root_id = param['root_id'];
    this.tag = param['tag'];


}

/* get_spinner doesn't need special replacements */

StackMover_BucketCreator.prototype.get_spinner = function() {
    var id = "aws-" + this.tag + "-spinner";
    var html = '<span id="REPLACE_ID" class="spinner is-active" style="float:none;"> </span>';
    html = html.replace(/REPLACE_ID/g, id);

    return {
        'id': id,
        'html': html
    };

}

StackMover_BucketCreator.prototype.get_output = function(success, log) {

    var log_html = '\
                    <span style="display:inline-block;margin-left:10px;">\
                    <div id="aws-UNIQUE_TAG-log-root">\
                    <div id="aws-UNIQUE_TAG-log" style="display:none;float:none">\
                            <p>\
                            OUTPUTMESSAGE\
                            </p>\
                            </div>\
                            <a href="#TB_inline?width=600&height=550&inlineId=aws-UNIQUE_TAG-log" class="thickbox">OUTPUTRESULT</a> \
                            </div> </span>';

    if (success == true) {

        var result_html = '<span id="aws-UNIQUE_TAG-result" class="dashicons dashicons-yes" style="float:none;font-size: 30px;"></span>';

        result_html = result_html.replace(/UNIQUE_TAG/g, this.tag);

        log_html = log_html.replace(/OUTPUTMESSAGE/g, log);
        log_html = log_html.replace(/OUTPUTRESULT/g, 'Success!');
        log_html = log_html.replace(/UNIQUE_TAG/g, this.tag);

        var final_html = result_html + log_html;

        return {
            'html': final_html,
            'log_id': 'aws-' + this.tag + '-log-root',
            'result_id': 'aws-' + this.tag + '-result'
        };


    } else {

        var result_html = '<span id="aws-UNIQUE_TAG-result" class="dashicons dashicons-no" style="float:none;font-size: 30px;"></span>';

        result_html = result_html.replace(/UNIQUE_TAG/g, this.tag);

        log_html = log_html.replace(/OUTPUTMESSAGE/g, log);
        log_html = log_html.replace(/OUTPUTRESULT/g, 'Failed!');
        log_html = log_html.replace(/UNIQUE_TAG/g, this.tag);

        var final_html = result_html + log_html;

        return {
            'html': final_html,
            'log_id': 'aws-' + this.tag + '-log-root',
            'result_id': 'aws-' + this.tag + '-result'
        };

    }

}



StackMover_BucketCreator.prototype.show_spinner = function() {

    var spinner = this.get_spinner();
    var html = spinner.html;
    var id = spinner.id;

    var root = '#' + this.root_id;

    jQuery(root).append(html);

}


StackMover_BucketCreator.prototype.remove_spinner = function() {

    var spinner = this.get_spinner();
    var html = spinner.html;

    jQuery('#' + spinner.id).remove();

}

StackMover_BucketCreator.prototype.show_output = function(success, log) {

    var output = this.get_output(success, log);
    var html = output.html;

    var root = '#' + this.root_id;

    jQuery(root).append(html);

}

StackMover_BucketCreator.prototype.remove_output = function(success, log) {

    var output = this.get_output(success, log);

    jQuery('#' + output.log_id).remove();
    jQuery('#' + output.result_id).remove();

}

StackMover_BucketCreator.prototype.disable = function() {

    jQuery('#aws-create-s3').attr('disabled', 'disabled');

}

StackMover_BucketCreator.prototype.enable = function() {

    jQuery('#aws-create-s3').attr('disabled', false);

}


StackMover_BucketCreator.prototype.run = function() {

    var context = this;

    jQuery.ajax({
        type: "post",
        url: "admin-ajax.php",
        data: {
            action: context.action,
            aws_access_key_id_val: jQuery('#aws_access_key_id_val').val(),
            aws_secret_access_key_val: jQuery('#aws_secret_access_key_val').val(),
            bucketname: jQuery('#aws_create_s3_val').val(),
            region: jQuery('#aws_new_s3_region').val(),
            security: migratorAjax.security

        },
        beforeSend: function() {

            context.remove_output(false, '');
            context.remove_spinner();
            context.show_spinner();
            context.disable();


        }, //fadeIn loading just when link is clicked
        success: function(output) { //so, if data is retrieved, store it in html

            context.remove_spinner();

            if (output['status'] == 1) {

                var log = output['val'];
                context.show_output(true, log);

            } else {

                var log = output['val'];
                context.show_output(false, log);

            }

            context.enable();



        },
        error: function(request, status, error) {

            context.remove_spinner();
            context.show_output(false, error);

            context.enable();


        }

    });
}

jQuery(document).ready(function() {

    jQuery('#aws-create-s3').click(function() {

        var param = {
            'action': 'stackmover_create_s3',
            'root_id': 'aws-create-s3-root',
            'tag': 'aws-create-s3'
        };

        var s3create = new StackMover_BucketCreator(param);

        s3create.run();

        return false;

    });

});
