/**
 * Show LightSail options
 */
function StackMover_LightSailOptions(param) {

}

StackMover_LightSailOptions.prototype.showAZs = function() {

    var context = this;

    jQuery.ajax({
        type: "post",
        url: "admin-ajax.php",
        data: {
            action: 'stackmover_getlightsailAZs',
            aws_access_key_id_val: jQuery('#aws_access_key_id_val').val(),
            aws_secret_access_key_val: jQuery('#aws_secret_access_key_val').val(),
            bucketname: '',
            region: jQuery('#aws_new_s3_region').val(),
            security: migratorAjax.security


        },
        beforeSend: function() {

            var html = '<span id="aws-ls-az-spinner" class="spinner is-active" style="float:none;"> </span>';

            jQuery('#lightsail-az-option-td').empty();
            jQuery('#lightsail-az-option-td').append(html);


        }, //fadeIn loading just when link is clicked
        success: function(output) { //so, if data is retrieved, store it in html

            if (output['status'] == 1) {

                var region2AZ = output['val'];
                var html = '<select name="aws_lightsail_az" id="aws_lightsail_az">';
                var el_selected = '<option selected="selected" value="AZ-REPLACE-ME">AZ-REPLACE-ME</option>'
                var el_others = '<option value="AZ-REPLACE-ME">AZ-REPLACE-ME</option>'
                for (var region in region2AZ) {
                    for (var index in region2AZ[region]) {
                        var az = region2AZ[region][index];

                        if (region.indexOf('us-east-1') !== -1)
                            html = html + el_selected.replace(/AZ-REPLACE-ME/g, az);
                        else
                            html = html + el_others.replace(/AZ-REPLACE-ME/g, az);
                    }

                }

                html = html + '</select>';

                jQuery('#lightsail-az-option-td').empty();
                jQuery('#lightsail-az-option-td').append(html);


            } else {

                var html = "<p><mark>Error: Unable to list Availibility Zones. Check keys.</mark></p>";
                jQuery('#lightsail-az-option-td').empty();
                jQuery('#lightsail-az-option-td').append(html);


            }


        },
        error: function(request, status, error) {


        }

    });

}

jQuery(document).ready(function() {


});
