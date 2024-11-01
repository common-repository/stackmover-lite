/**
 * Contains function to show bucket.
 * List single bucket if specific bucket needs to be chosen
 */

 
function StackMover_ShowBuckets() {


}


StackMover_ShowBuckets.prototype.is_ready = function() {

    /* check if spinning already due to previous click */

    return !jQuery('#aws-show-s3-spinner').is(':parent');

}

StackMover_ShowBuckets.prototype.show = function() {

    var output_html = '\
                          <span style="display:inline-block;margin-left:10px;">\
                                      <div id="aws-s3-errors">\
                                      <div id="aws-s3-error-val" style="display:none;float:none">\
                                      <p>\
                                      OUTPUTMESSAGE\
                                      </p>\
                                      </div>\
                                      <a title="Amazon S3 Buckets (us-east-1)" href="#TB_inline?width=600&height=550&inlineId=aws-s3-error-val" class="thickbox">OUTPUTRESULT</a> \
                                      </div> </span>';

    var failure_html = '<span id="aws-s3-input-output" class="dashicons dashicons-no" style="float:none;font-size: 30px;"></span>';

    jQuery.ajax({
        type: "post",
        url: "admin-ajax.php",
        data: {
            action: 'stackmover_show_s3buckets',
            aws_access_key_id_val: jQuery('#aws_access_key_id_val').val(),
            aws_secret_access_key_val: jQuery('#aws_secret_access_key_val').val(),
            aws_preset_s3_bucket: jQuery('#aws_preset_s3_bucket').val(),
            security: migratorAjax.security


        },
        beforeSend: function() {
            var html = '<td id="aws-show-s3-spinner"><span class="spinner is-active" style="float:none;"> </span></td>';

            jQuery('#show-s3-el').remove();
            jQuery('#show-s3-row').append(html);

        }, //fadeIn loading just when link is clicked
        success: function(output) { //so, if data is retrieved, store it in html

            jQuery('#aws-show-s3-spinner').remove();

            if (output['status'] == 1) {

                var buckets = output['val'];


                var html = '<option value="REPLACEME">REPLACEME</option>';
                var html_list = ''


                if (Array.isArray(buckets)) {
                    for (var b in buckets) {
                        html_list = html_list + html.replace(/REPLACEME/g, buckets[b]);
                        if (b == 0) {
                            html_list = html_list.replace('value', ' selected="selected" value');
                        }
                    }

                    html_list = '<td id="show-s3-el"><select>' + html_list + '</select></td>';

                    jQuery('#show-s3-row').append(html_list);


                }

            } else {

                var error_msg = output['val'];

                var failure_log_html = output_html.replace('OUTPUTMESSAGE', error_msg);
                failure_log_html = failure_log_html.replace('OUTPUTRESULT', 'Failed!');
                failure_html = failure_html + failure_log_html;

                failure_html = '<td id="show-s3-el">' + failure_html + '</td>';

                jQuery('#show-s3-row').append(failure_html);


            }


        },
        error: function(request, status, error) {

            var failure_log_html = output_html.replace('OUTPUTMESSAGE', error);
            failure_log_html = failure_log_html.replace('OUTPUTRESULT', 'Failed!');
            failure_html = failure_html + failure_log_html;

            jQuery('#aws-show-s3-spinner').remove();

        }

    });


}


function StackMover_activateS3Tab(pageId) {
    var tabCtrl = document.getElementById('s3TabContent');
    var pageToActivate = document.getElementById(pageId);

    for (var i = 0; i < tabCtrl.childNodes.length; i++) {
        var node = tabCtrl.childNodes[i];
        if (node.nodeType == 1) { /* Element */
            node.style.display = (node == pageToActivate) ? 'block' : 'none';
        }
    }

    if (pageId == 'existing-s3-input') {

        var show_buckets = new StackMover_ShowBuckets();

        if (show_buckets.is_ready()) {
            show_buckets.show();
        };

    }
}


function StackMover_activateTransferOptions(pageId) {


    var tabCtrl = document.getElementById('transferTabContent');
    var pageToActivate = document.getElementById(pageId);

    for (var i = 0; i < tabCtrl.childNodes.length; i++) {
        var node = tabCtrl.childNodes[i];
        if (node.nodeType == 1) { /* Element */
            node.style.display = (node == pageToActivate) ? 'block' : 'none';
        }
    }


    if (pageId == 'db-search-replace') {

    }

    if (pageId == 'trasfer-choices') {
        
    }

    if (pageId == 'additional-files') {
     
    }


}


jQuery(document).ready(function() {


});
