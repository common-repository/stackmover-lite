<?php add_thickbox(); ?>

<div id="aws-keys-options">
   <table class="form-table">
      <tr style="text-align:center">
         <h2><?php esc_attr_e( 'Input AWS Keys', 'wp_admin_style' ); ?></h2>
      </tr>
   </table>

      <p class="stackmover-text"><?php printf( __( 'Validate AWS Keys before processing further. This step ensures you have access to your AWS account via APIs.', $this->plugin_name ) ); ?></p>

   <form action='' method='POST' id="aws-keys-formId">
      <table class="form-table">
         <tbody>
            <tr>
               <th>AWS Access Key ID </th>
               <td>
                  <input type="text" style="width: 190px;" name="aws_access_key_id_val" id="aws_access_key_id_val" 
                  class="regular-text" /><br>
               </td>
            </tr>
            <tr>
               <th>AWS Secret Access Key </th>
               <td>
                  <input type="password" style="width: 300px;" name="aws_secret_access_key_val" id="aws_secret_access_key_val"  class="regular-text" /><br>
               </td>
            </tr>

            <tr>
               <th>Existing S3 Bucket Name</th>
               <td>
                  <input type="text" style="width: 170px;"   name="aws_preset_s3_bucket" id="aws_preset_s3_bucket"  class="regular-text" />

                     <select name="aws_s3_region" id="aws_s3_region">
                        <option selected value="us-east-1">us-east-1</option>
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

           

         </tbody>
      </table>
      <div style="text-align:center;padding:20px 0;" id="aws-keys-input-root"> 
         <input type="submit" class="button-primary" id="aws-keys-input" value="Validate AWS Keys">
      </div>

   

   </form>
   <div id="aws-keys-formId-output">
   </div>
</div>