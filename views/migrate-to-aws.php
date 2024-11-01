
<div id="migrate-to-aws">
    <table class="form-table">
        <tr style="text-align:center">
            <h2><?php esc_attr_e( 'Migrate To AWS', 'wp_admin_style' ); ?></h2>
        </tr>
    </table>

    <style>
        .migratorbar-root {
            width: 100%;
            background-color: #ddd;
            max-width: 830px;
        }
        
        .migratorbar {
            width: 0%;
            height: 30px;
            background-color: #4CAF50;
            max-width: 830px;
        }
    </style>


    <table>
        <br>
        <tr>
            <th>Backup Tag</th>
            <td>
                <input type="text" style="width: 170px;" id="aws-backup-tag" value="<?php echo parse_url(get_site_url())['host']; ?>" class="regular-text" />
                <br>
            </td>
        </tr>
        <tr>
            <th>
                <td>
                    <span class="description"><?php esc_attr_e( 'Files will be stored in s3://bucket-name/stackmover/TAG/backup/.', 'wp_admin_style' ); ?></span>
                    <br>
                </td>
            </th>
        </tr>

 

    </table>

    <tr>
        <div id="aws-migrator-button"  style="text-align:center;padding:10px 0;">
            <input type="submit" disabled class="button-primary" id="aws-migrator-run" value="Migrate To Amazon Lightsail">
            <span id="aws-migrator-button-output"></span>
             <input type="submit" class="button-primary" style="display:none" id="aws-migrator-interruptor" value="Stop">
       </div>
    </tr>


<style>
   .all-rounded {
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
    }
    
    .spacer {
        display: block;
    }
#progress-bar {
    width: auto;
    background: #cccccc;
    position: relative;
}

#progress-bar-percentage {
    background: #3063A5;
    padding: 5px 0px;
    color: #FFF;
    text-align: center;
    height: 20px;
}

#progress-bar-percentage span {
    display: inline-block;
    position: absolute;
    width: 100%;
    left: 0;
}
</style>

<div id="progress-bar-parent">
</div>



    <div id="migrator-text-log" style="display:block;text-align:center">
    </div>


</div>