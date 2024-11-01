
<link href="https://cdn.jsdelivr.net/gh/mar10/fancytree@v2/dist/skin-win8/ui.fancytree.min.css" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.fancytree/2.24.0/jquery.fancytree-all-deps.min.js"></script>

<!--

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.fancytree/2.24.0/skin-awesome/ui.fancytree.css">

  <link href="https://cdn.jsdelivr.net/gh/mar10/fancytree@v2/dist/skin-win8/ui.fancytree.min.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/mar10/fancytree@v2/dist/jquery.fancytree-all-deps.min.js"></script>
-->

<div id="aws-lightsail-options">
   <table class="form-table">
      <tr style="text-align:center">
         <h2><?php esc_attr_e( 'File Transfer Options', 'wp_admin_style' ); ?></h2>
      </tr>
   </table>
   <table>
      <tr>
         <p class="stackmover-text">
            Configure which files need to be transferred and transfer mode.
         </p>
      </tr>
   </table>
   <style>
      .transfer-input {
      margin-top: 10px
      }
   </style>
   <h2 class="nav-tab-wrapper">
      <div id="trasferTabs">
         <a href="javascript:StackMover_activateTransferOptions('trasfer-choices')" class="nav-tab">Transfer Options</a>
         <a href="javascript:StackMover_activateTransferOptions('db-search-replace')" class="nav-tab nav-tab-active">Search/Replace DB</a>
         <a href="javascript:StackMover_activateTransferOptions('additional-files')" class="nav-tab nav-tab-active">Custom Files</a>
      </div>
   </h2>
   <div id="transferTabContent">
      <div id="trasfer-choices" style="display:block">
         <div id="s3-transfer-option" style="display:block">
            <fieldset class="transfer-input">
               <label for="use-incremental-backup">
               <?php if(STACKMOVER_VERSION == 'STACKMOVER-LITE'): ?>
               <input style="display:none" name="" disabled type="checkbox" id="use-incremental-backup" value="0" />
               <span class="stackmover-text" style="display:none"><?php esc_attr_e( 'Use Incremental Backup', 'wp_admin_style' ); ?></span>
               <?php else: ?>
               <input name="" type="checkbox" id="use-incremental-backup" checked value="1" />
               <span class="stackmover-text"><?php esc_attr_e( 'Use Incremental Backup', 'wp_admin_style' ); ?></span>
               <?php endif; ?>
               </label>
            </fieldset>
            <fieldset class="transfer-input">
               <label for="transfer-database">
               <input name="" type="checkbox" id="transfer-database" checked value="1" />
               <span class="stackmover-text"><?php esc_attr_e( 'Create Mysqldump and Transfer', 'wp_admin_style' ); ?></span>
               </label>
            </fieldset>
            <fieldset class="transfer-input">
               <label for="transfer-themes">
               <input name="" type="checkbox" id="transfer-themes" checked value="1" />
               <span class="stackmover-text"><?php esc_attr_e( 'Transfer Themes', 'wp_admin_style' ); ?></span>
               </label>
            </fieldset>
            <fieldset class="transfer-input">
               <label for="transfer-plugins">
               <input name="" type="checkbox" id="transfer-plugins" checked value="1" />
               <span class="stackmover-text"><?php esc_attr_e( 'Transfer Plugins', 'wp_admin_style' ); ?></span>
               </label>
            </fieldset>
            <fieldset class="transfer-input">
               <label for="do-not-transfer-files">
               <input type="text" id="do-not-transfer-files" value="" style="max-width:120px" class="regular-text" />
               <span class="description"><?php esc_attr_e( 'File extensions to avoid. Example *.log, *.htaccess etc', 'wp_admin_style' ); ?></span>
               <br>
               </label>
            </fieldset>
         </div>
      </div>
      <div id="db-search-replace" style="display:none">
         <br>
         <p class="description">Search and Replace strings in database. Source database remains untouched. Replacer runs only on the destination database running on LightSail instance.</p>
         <table class="form-table width-900">
            <tbody>
               <tr>
                  <th>Search For</th>
                  <td>
                     <input type="text" style="width: 170px;" name="db_search_string_val" 
                        value="<?php echo (get_site_url()); ?>" 
                        id="db_search_string_val" class="regular-text">
                  </td>
               </tr>
               <tr>
                  <th>Replace With</th>
                  <td>
                     <input type="text" style="width: 170px;" name="db_replace_string_val"
                        value="http://EIP" 
                        id="db_replace_string_val" class="regular-text">
                     <p class="description">Enter http://EIP for replacing w/ Elastic IP on LightSail Instance</p>
                  </td>
               </tr>
            </tbody>
         </table>
      </div>
      <div id="additional-files" style="display:none">
         <br>
         <p class="description">Choose additional files to be transferred. Caching plugins may write outside themes and plugins directory. </p>
         <div class="row">
            <div style="text-align:center;" id="scan-dir"> 
               <input type="submit" class="button-primary" id="scan-dir-btn" value="Scan Dir">
            </div>
         </div>
         <br>

         <div id="scan-dir-output-root">
            <div id="scan-dir-output" style="text-align:center">
            </div>
         </div>
      </div>
   </div>
</div>

