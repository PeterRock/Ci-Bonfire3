function confirm_delete(event) {
	var action = event.target.id.replace('delete-', ''),
        which = $('#' + action + '_select option:selected').text(),
        dateFor = 'for';

	if (action.indexOf('date') != -1) {
        dateFor = 'before';
    }

	return confirm('Are you sure you wish to delete the activity logs ' + dateFor + ' "' + which + '"?');
}

/*
 * For a button which has been placed outside the form (due to limitations in
 * supported CSS).
 * No attempt is made to distinguish the submission from e.g. a real submit
 * button on the form.
 * That would probably be acheived by DOM manipulation, but it wouldn't be safe,
 * because some browsers' history mechanisms (quite understandably) preserve the
 * DOM.
 */
function submit_delete(event) {
	var action = event.target.id.replace('delete-', ''),
        form = $('#' + action + '_form');

	if (confirm_delete(event)) {
		form.submit();
	}
}

$('.btn').filter('[id^="delete-"][type="submit"]').click(confirm_delete);
$('.btn').filter('[id^="delete-"][type="button"]').click(submit_delete);

$("#flex_table").dataTable({
    "dom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
    "displayLength": <?php echo ($this->settings_lib->item('site.list_limit')) ? $this->settings_lib->item('site.list_limit') : 15; ?>,
    "info": false,
    "paging": false,
    "processing": true,
    "serverSide": false,
    "lengthChange": false,
    "order": [[3,'desc']],
    "autoWidth": true,
    "language": {
        "processing":   "<?php echo lang('sProcessing'); ?>",
        "lengthMenu":   "<?php echo lang('sLengthMenu'); ?>",
        "emptyTable":       "<?php echo lang('sZeroRecords'); ?>",
        "info":         "<?php echo lang('sInfo'); ?>",
        "infoEmpty":    "<?php echo lang('sInfoEmpty'); ?>",
        "infoFiltered": "<?php echo lang('sInfoFiltered'); ?>",
        "infoPostFix":  "<?php echo lang('sInfoPostFix'); ?>",
        "search":       "<?php echo lang('sSearch'); ?>",
        "paginate": {
            "first":    "<?php echo lang('sFirst'); ?>",
            "previous": "<?php echo lang('sPrevious'); ?>",
            "next":     "<?php echo lang('sNext'); ?>",
            "last":     "<?php echo lang('sLast'); ?>"
        }
    }
});