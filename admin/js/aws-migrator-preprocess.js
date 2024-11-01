/**
 * Main entry point to trigger migration.
 * Contains trigger to interrupt migration.
 */


function StackMover_MigratorPreprocess(param) {


}

StackMover_MigratorPreprocess.prototype.show_log = function(log) {

    var html = '<div><p class="description">LOG-REPLACE</p></div>';

    html = html.replace(/LOG-REPLACE/g, log);
    jQuery('#migrator-text-log').empty();
    jQuery('#migrator-text-log').append(html);
}

StackMover_MigratorPreprocess.prototype.show_link_log = function(log) {

    var html = '<div><p class="description">LOG-REPLACE</p></div>';

    var index = log.indexOf('http');

    if (index != -1) {

        ls_ip = log.substr(index).split(' ')[0];
        log = log.replace(ls_ip, '<a href="IP-REPLACE">IP-REPLACE</a>');
        log = log.replace(/IP-REPLACE/g, ls_ip);
    }


    html = html.replace(/LOG-REPLACE/g, log);
    jQuery('#migrator-text-log').empty();
    jQuery('#migrator-text-log').append(html);
}

StackMover_MigratorPreprocess.prototype.show_progressbar = function(perc) {
    var pbar = '<div id="progress-bar" class="all-rounded">\
                    <div id="progress-bar-percentage" class="all-rounded" style="width: PERC-REPLACE-ME%">\
                    <span id="progress-bar-val">PERC-REPLACE-ME/100</span></div></div>';

    if (perc > 0 ){

        perc = parseInt(perc);

        var html = pbar.replace(/PERC-REPLACE-ME/g,perc);
        var perc_string = perc + '%';
        jQuery('#progress-bar-percentage').css({"width": perc_string});
        jQuery('#progress-bar-val').text(perc + '/100'); 

    }

}

StackMover_MigratorPreprocess.prototype.create_newprogressbar = function() {
    var pbar = '<div id="progress-bar" class="all-rounded">\
                    <div id="progress-bar-percentage" class="all-rounded" style="width: 0%">\
                    <span id="progress-bar-val">0/100</span></div></div>';
    jQuery('#progress-bar-parent').empty();
    jQuery('#progress-bar-parent').append(pbar);

}






StackMover_MigratorPreprocess.prototype.get_status = function(asyncStatusfn, statuses) {

    var context = this;

    jQuery.ajax({
        type: "post",
        //url: "admin-ajax.php",
        url: migratorAjax.ajax_url,
        data: {
            action: 'stackmover_aws_migrator_get_status',
            aws_access_key_id_val: jQuery('#aws_access_key_id_val').val(),
            aws_secret_access_key_val: jQuery('#aws_secret_access_key_val').val(),
            bucketname: jQuery('#aws_preset_s3_bucket').val(),
            region: jQuery('#aws_new_s3_region').val(),
            tag: jQuery('#aws-backup-tag').val(),
            security: migratorAjax.security

        },
        beforeSend: function() {
            context.disable_run();

        }, //fadeIn loading just when link is clicked
        success: function(output) { //so, if data is retrieved, store it in html

            var val = JSON.parse(output['val']);

            var msg_index = 0;
            for (var csv of val) {

                if (csv.length > 0) {
                    //csv is an array
                    //$logMsg,$progress_val,$stop,$timestamp_seconds
                    var log = csv[0];

                    context.show_progressbar(csv[1]);


                    var dt = new Date();
                    var ts = dt.toLocaleString();
                    statuses.push(ts + ':' + log);

                    var current_ts_seconds = (new Date).getTime() / 1000;
                    var delta_seconds = current_ts_seconds - parseInt(csv[3]);


                    if (csv[2] == 1) {
                        //log = statuses.join('<br>');
                        clearTimeout(asyncStatusfn);
                        context.show_lightsail_log(statuses);
                        context.show_link_log(log);
                    } else {
                        context.show_log(log);
                    }

                }

                msg_index = msg_index + 1;

            }




        },
        error: function(request, status, error) {
            context.show_log(error);
        }
    });
}

StackMover_MigratorPreprocess.prototype.show_lightsail_log = function(statuses) {

    var context = this;

    jQuery.ajax({
        type: "post",
        //url: "admin-ajax.php",
        url: migratorAjax.ajax_url,
        data: {
            action: 'stackmover_aws_migrator_get_lightsail_log',
            security: migratorAjax.security

        },
        beforeSend: function() {

        }, //fadeIn loading just when link is clicked
        success: function(output) { //so, if data is retrieved, store it in html

            var val = output['val'];

            if (output['status'] == 2) { //interrupted!

                context.enable_run();
                context.show_log('Migration stopped due to interruption.');

            } else {

                context.enable_run();
                val = val.replace(new RegExp('\r?\n', 'g'), '<br />');
                context.show_final_output(true, val);

            }


        },
        error: function(request, status, error) {
            context.show_log(error);

        }
    });
}

StackMover_MigratorPreprocess.prototype.interrupt_migration = function() {

    var context = this;

    jQuery.ajax({
        type: "post",
        //url: "admin-ajax.php",
        url: migratorAjax.ajax_url,
        data: {
            action: 'stackmover_aws_migrator_interrupt_migration',
            security: migratorAjax.security

        },
        beforeSend: function() {

        }, //fadeIn loading just when link is clicked
        success: function(output) { //so, if data is retrieved, store it in html

        },
        error: function(request, status, error) {
            context.show_log(error);
        }
    });
}


StackMover_MigratorPreprocess.prototype.start = function() {

    var context = this;

    context.create_newprogressbar();
    context.remove_final_output();

   var custom_files = new StackMover_DirTree().get_custom_files();

    jQuery.ajax({
        type: "post",
        url: migratorAjax.ajax_url,
        data: {
            action: 'stackmover_aws_migrator_init',
            aws_access_key_id_val: jQuery('#aws_access_key_id_val').val(),
            aws_secret_access_key_val: jQuery('#aws_secret_access_key_val').val(),
            bucketname: jQuery('#aws_preset_s3_bucket').val(),
            region: jQuery('#aws_new_s3_region').val(),
            tag: jQuery('#aws-backup-tag').val(),

            use_incremental_backup: jQuery('#use-incremental-backup').attr('checked') ? 1 : 0,
            transfer_database: jQuery('#transfer-database').attr('checked') ? 1 : 0,
            transfer_plugins: jQuery('#transfer-plugins').attr('checked') ? 1 : 0,
            transfer_themes: jQuery('#transfer-themes').attr('checked') ? 1 : 0,
            do_not_transfer_files: jQuery('#do-not-transfer-files').val().trim(),
            db_search_string_val: jQuery('#db_search_string_val').val().trim(),
            db_replace_string_val: jQuery('#db_replace_string_val').val().trim(),

            aws_s3_region: jQuery('#aws_s3_region').val(),
            availabilityZone: jQuery('#aws_lightsail_az').val(),
            blueprintId: jQuery('#aws_ls_blueprintId').val(),
            bundleId: jQuery("input[name='ls-bundleId']:checked").val(),
            instanceNames: jQuery("#aws-ls-name").val(),
            security: migratorAjax.security,

            customFiles: custom_files,            


        },
        beforeSend: function() {
            context.disable_run();
            var log = "Migrator preprocessor initializing...";
            context.show_log(log);

        }, //fadeIn loading just when link is clicked
        success: function(output) { //so, if data is retrieved, store it in html

            if (output['status'] == 1) {
                var log = "Migrator preprocessor init complete!";
                context.show_log(log);
                //context.show_final_output(true,output['val']);


                var statuses = [];
                var update_seconds = 10;

                asyncStatusfn = setInterval(function() {
                    context.get_status(asyncStatusfn, statuses);
                }, update_seconds * 1000);


            } else {

                var log = "PreCheck Failed!. Please ensure AWS keys are valid.";
                log = 'PreCheck Failed! ' + output['val'];
                context.show_log(log);
                context.show_final_output(false, output['val']);
                context.enable_run();

            }



        },
        error: function(request, status, error) {
            var log = "Migrator preprocessor initialization error!";
            context.show_log(log);
            context.show_final_output(false, error);
            context.enable_run();
        }
    });
}


StackMover_MigratorPreprocess.prototype.enable_run_spinner = function() {

    var html = '<span id="aws-migrator-run-spinner" class="spinner is-active" style="float:none;font-size: 30px;"></span>';

    jQuery('#aws-migrator-button').append(html);

}

StackMover_MigratorPreprocess.prototype.disable_run_spinner = function() {

    var html = '<span id="aws-migrator-run-spinner" class="spinner is-active" style="float:none;font-size: 30px;"></span>';

    jQuery('#aws-migrator-run-spinner').remove();

}


StackMover_MigratorPreprocess.prototype.enable_run = function() {

    jQuery('#aws-migrator-run').attr("disabled", false);
    jQuery('#aws-migrator-interruptor').css({
        'display': 'none'
    });



}


StackMover_MigratorPreprocess.prototype.disable_run = function() {

    jQuery('#aws-migrator-run').attr("disabled", true);
    jQuery('#aws-migrator-interruptor').css({
        'display': 'inline-block'
    });

}

StackMover_MigratorPreprocess.prototype.remove_final_output = function() {

    jQuery('#aws-migrator-button-output').empty();

}


StackMover_MigratorPreprocess.prototype.show_final_output = function(success, log = '') {

    var success_html = '<span id="aws-migrator-input-output" class="dashicons dashicons-yes" style="float:none;font-size: 30px;"></span>';
    var output_html = '\
                              <span style="display:inline-block;margin-left:10px;">\
                                          <div id="aws-migrator-errors">\
                                          <div id="aws-migrator-error-val" style="display:none;float:none">\
                                          <p>\
                                          OUTPUTMESSAGE\
                                          </p>\
                                          </div>\
                                          <a title="AWS Migrator Results" href="#TB_inline?width=600&height=550&inlineId=aws-migrator-error-val" class="thickbox">OUTPUTRESULT</a> \
                                          </div> </span>';

    var failure_html = '<span id="aws-migrator-input-output" class="dashicons dashicons-no" style="float:none;font-size: 30px;"></span>';

    if (success == true) {

        var success_log_html = output_html.replace('OUTPUTMESSAGE', log);
        success_log_html = success_log_html.replace('OUTPUTRESULT', 'Success!');
        success_html = success_html + success_log_html;

        jQuery('#aws-migrator-button-output').empty();
        jQuery('#aws-migrator-button-output').append(success_html);

    } else {

        var failure_log_html = output_html.replace('OUTPUTMESSAGE', log);
        failure_log_html = failure_log_html.replace('OUTPUTRESULT', 'Failed!');
        failure_html = failure_html + failure_log_html;

        jQuery('#aws-migrator-button-output').empty();
        jQuery('#aws-migrator-button-output').append(failure_html);
    }

}


jQuery(document).ready(function() {

    jQuery('#aws-migrator-run').click(function() {

        var migrator = new StackMover_MigratorPreprocess();

        jQuery('#aws-migrator-interruptor').css({
            'display': 'inline-block'
        });

        jQuery('#progress-bar-parent').empty();


        migrator.start();

        return  false;



    });

    jQuery('#aws-migrator-interruptor').click(function() {
        var migrator = new StackMover_MigratorPreprocess();
        migrator.interrupt_migration();
        jQuery('#aws-migrator-interruptor').css({
            'display': 'none'
        });

        return  false;


    });


});
