<div id="aws-lightsail-options">
    <table class="form-table">
        <tr style="text-align:center">
            <h2><?php esc_attr_e( 'Choose LightSail Plan', 'wp_admin_style' ); ?></h2>
        </tr>
    </table>

    <table>

        <tr>
            <p class="stackmover-text">
                Lightsail plans are billed on an on-demand hourly rate, so you pay only for what you use. For every Lightsail plan you use, AWS charges you the fixed hourly price, up to the maximum monthly plan cost. The cheapest Lightsail plan starts at $0.0067/hour ($5/month).
            </p>
        </tr>

        <tr>
            <td style="text-align:center"> <img style="width:150px;display:block" src=<?php echo STACKMOVER_PLUGIN_IMAGELS0_URL ;?> style="top:0px" />
                <input type="radio" checked name="ls-bundleId" value="nano_1_0" style="bottom:0px;margin-top: 10px">
            </td>
            <td style="text-align:center;"> <img style="width:150px;display:block; margin-left: 15px;" src=<?php echo STACKMOVER_PLUGIN_IMAGELS1_URL ;?> style="top:0px;" />
                <input type="radio" name="ls-bundleId" value="micro_1_0" style="bottom:0px;margin-top: 10px">
            </td>
            <td style="text-align:center"> <img style="width:150px;display:block; margin-left: 15px;" src=<?php echo STACKMOVER_PLUGIN_IMAGELS2_URL ;?> style="top:0px" />
                <input type="radio" name="ls-bundleId" value="small_1_0" style="bottom:0px;margin-top: 10px">
            </td>
            <td style="text-align:center"> <img style="width:150px;display:block; margin-left: 15px;" src=<?php echo STACKMOVER_PLUGIN_IMAGELS3_URL ;?> style="top:0px" />
                <input type="radio" name="ls-bundleId" value="medium_1_0" style="bottom:0px;margin-top: 10px">
            </td>
            <td style="text-align:center"> <img style="width:150px;display:block; margin-left: 15px;" src=<?php echo STACKMOVER_PLUGIN_IMAGELS4_URL ;?> style="top:0px" />
                <input type="radio" name="ls-bundleId" value="large_1_0" style="bottom:0px;margin-top: 10px">
            </td>
        </tr>
    </table>

    <div id="lightsail-az-option" style="display:block">
        <table class="form-table width-900">
            <tbody>
                <tr>
                    <th>Choose an Availability Zone</th>
                    <td id="lightsail-az-option-td">
                        <p>
                            <mark>
                                <?php printf('Warning: AWS Keys need validation'); ?>
                            </mark>
                        </p>
                    </td>
                </tr>

                <tr>
                    <th>Choose blueprintId</th>
                    <td>
                        <select name="aws_ls_blueprintId" id="aws_ls_blueprintId">
                            <option selected="selected" value="ubuntu_16_04_1">ubuntu_16_04_1</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <th>Name Your LightSail Instance</th>
                    <td>
                        <input type="text" style="width: 170px;" id="aws-ls-name" value=<?php print_r(array("Neo", "Morpheus", "Trinity", "Cypher", "Tank","Tank")[time()%4]  . array("Neo", "Morpheus", "Trinity", "Cypher", "Tank")[time()%4 + 1]); ?> class="regular-text" />
                        <span class="description">Needs to be unique</span>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

</div>
