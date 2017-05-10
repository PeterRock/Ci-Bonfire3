<?php

$view = '';
$field_prefix = '';
if ($db_required == 'new' && $table_as_field_prefix === true) {
    $field_prefix = "{$module_name_lower}_";
}

for ($counter = 1; $field_total >= $counter; $counter++) {
	// only build on fields that have data entered.
	if (set_value("view_field_label$counter") == null) {
		continue; // move onto next iteration of the loop
	}

	$field_label = set_value("view_field_label$counter");
	$field_name = $field_prefix . set_value("view_field_name$counter");
	$field_type = set_value("view_field_type$counter");

	// field type
	switch($field_type) {
        case 'textarea':
            if ( ! empty($textarea_editor)) {
                if ($textarea_editor == 'ckeditor') {
                    $view .= "if ( ! ('{$field_name}' in CKEDITOR.instances)) {CKEDITOR.replace('{$field_name}');}";
                } elseif ($textarea_editor == 'tinymce') {
                    $view .= "tinymce.init({selector: '{$field_name}'});";
                } elseif ($textarea_editor == 'markitup') {
                    $view .= "$('#{$field_name}').markItUp(mySettings);";
                }
            }
            break;

        case 'input':
            // no break;
        case 'password':
            // no break;
        default: // input.. added bit of error detection setting select as default
            $db_field_type = set_value("db_field_type$counter");
            if ($db_field_type != null) {
                if ($db_field_type == 'DATE') {
                    $view .= "$('#{$field_name}').datetimepicker({timepicker: false, closeOnDateSelect: true,format: 'Y-m-d'});\n";
                } elseif ($db_field_type == 'DATETIME') {
    				$view .= "$('#{$field_name}').datetimepicker({format:'Y-m-d H:i'});\n";
                }
            }
            break;
    }
}

echo $view;