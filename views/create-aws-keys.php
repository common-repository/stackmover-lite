<?php add_thickbox(); ?>

<div id="create-aws-keys">
   <table class="form-table">
      <tr style="text-align:center">
         <h2><?php esc_attr_e( 'Create AWS Keys', 'wp_admin_style' ); ?></h2>
      </tr>
   </table>
   <p class="stackmover-text"><?php printf( __( 'This plugin uses your AWS Access key that consists of an access key ID and a secret access key during migration. We highly recommend to always create an IAM user with minimal set of privileges. To enable this, we have automated the creation of keys with minimal privileges via AWS CloudFormation. To get minimally privileged keys, launch the template below or by downloading  <a href="%s" target="_blank">AWS IAM User Template</a>. Upon completion, store the keys securely for future use. ', $this->plugin_name ), 'https://s3.amazonaws.com/stackmover/lightsailer/scripts/1.0.0/StackMoverKeys.json' ); ?></p>
   <br>
   <p><h4 class="stackmover-text">Note: For security reasons the keys are not persisted anywhere.</h4></p>
   <form action="https://console.aws.amazon.com/cloudformation/home?region=us-east-1#/stacks/new?stackName=Lightsail-Migrator-Keys&templateURL=https://s3.amazonaws.com/stackmover/lightsailer/scripts/1.0.0/StackMoverKeys.json">
      <table class="form-table">
         <tr style="text-align:center">
            <td> <input class="button-primary" type="submit" value="<?php esc_attr_e( 'Create AWS Keys' ); ?>" /></td>
         </tr>
      </table>
   </form>
</div>