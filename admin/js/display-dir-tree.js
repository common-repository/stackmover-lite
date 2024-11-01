/**
 * Contains function to show bucket.
 * List single bucket if specific bucket needs to be chosen
 */

 
function StackMover_DirTree() {


}


StackMover_DirTree.prototype.disable = function() {

    jQuery('#scan-dir-btn').attr('disabled', 'disabled');

}

StackMover_DirTree.prototype.enable = function() {

    jQuery('#scan-dir-btn').attr('disabled', false);

}


StackMover_DirTree.prototype.show_error = function() {

    var error_div = '<p><mark>Warning: Unable to scan wp-content directory</mark></p>';
    jQuery('#scan-dir-output-root').append(error_div);

}

StackMover_DirTree.prototype.empty_previous_scan = function() {

    jQuery('#scan-dir-output-root').empty();
    var new_scan_div = '<div id="scan-dir-output" style="text-align:center"></div>';
    jQuery('#scan-dir-output-root').append(new_scan_div);

}

/**
 * Returns the path of custom selected paths. 
 * [wp-content/debug.log", "wp-content/uploads/2017/10/0482e0e5...]
 */

StackMover_DirTree.prototype.get_custom_files = function() {

	var wp_content_files = [];

	try {

		var count = jQuery("#scan-dir-output").children().length;

		if (count > 0) {
			var selected_nodes = jQuery("#scan-dir-output").fancytree("getTree").getSelectedNodes();
			
			selected_nodes.forEach(function(node){
				wp_content_files.push(node['key']);
			});

		} else {
			wp_content_files = [];
		}

	}
	catch (e) {
		wp_content_files = [];
	}

	return wp_content_files;

}


/* https://stackoverflow.com/questions/14389757/need-help-formatting-results-of-a-directory-listing-in-php-javascript-tree-cont
*/


StackMover_DirTree.prototype.get_dir_tree = function() {

    var context = this;

    context.disable();
    context.empty_previous_scan();

    jQuery.ajax({
        type: "post",
        url: "admin-ajax.php",
        data: {
            action: 'stackmover_get_dir_tree',
            security: migratorAjax.security,


        },
        beforeSend: function() {

        	var html = '<span id="scan-dir-spinner" class="spinner is-active" style="float:none;"> </span>';
            jQuery('#scan-dir').append(html);

        }, //fadeIn loading just when link is clicked
        success: function(output) { //so, if data is retrieved, store it in html

            if (output['status'] == 1) {

            	var treeData = output['val'];

				jQuery("#scan-dir-output").remove();
				jQuery("#scan-dir-output-root").append('<div id="scan-dir-output" style="text-align:center">');
				jQuery("#scan-dir-output").fancytree({
					checkbox: true,
				    // Initial node data that sets 'lazy' flag on some leaf nodes
				    source:treeData,
				    loadChildren: function(event, ctx) {
				    	ctx.node.fixSelection3AfterClick();
				    },
				    // The following options are only required, if we have more than one tree on one page:
				    cookieId: "fancytree-dir-tree-",
      				idPrefix: "fancytree-dir-tree-",
				    selectMode: 3
				  });


            } else {

            	context.show_error();

            }

            context.enable();
            jQuery('#scan-dir-spinner').remove();


        },
        error: function(request, status, error) {

            context.enable();
            jQuery('#scan-dir-spinner').remove();
            context.show_error();



        },
        complete: function() {

            context.enable();
            jQuery('#scan-dir-spinner').remove();

        }

    });


}



jQuery(document).ready(function() {


    jQuery('#scan-dir-btn').click(function(event) {

        event.preventDefault();

        var fTree = new StackMover_DirTree();
        fTree.get_dir_tree();

        return  false;


    });


});
