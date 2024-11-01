<div id="s3-bucket-options">
   <table class="form-table">
      <tr style="text-align:center">
         <h2><?php esc_attr_e( 'AWS S3 Bucket', 'wp_admin_style' ); ?></h2>
      </tr>
   </table>
   <p class="stackmover-text"><?php printf( __( 'AWS S3 Bucket is used to backup the wordpress files and bootstrap the new deployment with it. Backup process creates a compressed bundle of files locally and moves it to the destination S3 bucket. Backup process is incremental. Only modified files (evaluated by comparing last modified times and sizes of each file) are transferred - but a full backup is reconciled by merging bits from most recent backup.', $this->plugin_name ) ); ?></p>
   <br>
   
   <h2 class="nav-tab-wrapper">
      <div id="s3Tabs">
         <a href="javascript:StackMover_activateS3Tab('new-s3-input')" class="nav-tab">Create New S3 Bucket</a>
         <a href="javascript:StackMover_activateS3Tab('existing-s3-input')" class="nav-tab nav-tab-active">Choose Existing S3 Bucket            
         </a>
      </div>
   </h2>
   <div id="s3TabContent">
      <div id="new-s3-input" style="display:none">
         <table class="form-table width-900">
            <tbody>
               <tr>
                  <th>Choose a Region</th>
                  <td>
                     <select name="aws_new_s3_region" id="aws_new_s3_region">
                        <option selected="selected" value="us-east-1">us-east-1</option>
                        <option value="ap-south-1">ap-south-1</option>
                        <option value="eu-west-2">eu-west-2</option>
                        <option value="eu-west-1">eu-west-1</option>
                        <option value="ap-northeast-2">ap-northeast-2</option>
                        <option value="ap-northeast-1">ap-northeast-1</option>
                        <option value="sa-east-1">sa-east-1</option>
                        <option value="ca-central-1">ca-central-1</option>
                        <option value="ap-southeast-1">ap-southeast-1</option>
                        <option value="ap-southeast-2">ap-southeast-2</option>
                        <option value="eu-central-1">eu-central-1</option>
                        <option value="us-east-2">us-east-2</option>
                        <option value="us-west-1">us-west-1</option>
                        <option value="us-west-2">us-west-2</option>
                     </select>
                  </td>
               </tr>
               <tr>
                  <th>Create New S3 Bucket</th>
                  <td>                  
                     <input type="text" style="width: 170px;"  name="aws_create_s3_val" id="aws_create_s3_val" class="regular-text" /><br>
                  </td>
               </tr>
            </tbody>
         </table>
         <table class="form-table">
            <tr style="text-align:center">
               <td> 
                  <div id="aws-create-s3-root"> 
                  <input class="button-primary" type="submit" id="aws-create-s3" value="<?php esc_attr_e( 'Create S3 Bucket' ); ?>" />
                  </div>
               </td>
            </tr>
         </table>
      </div>
      <div id="existing-s3-input" style="display:block">
         <table class="form-table width-900">
            <tbody>
               <tr id="show-s3-row">
                  <th>Choose an existing Bucket                     
                  </th>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
</div>