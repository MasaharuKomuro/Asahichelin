<?php

return array(
	'fieldset_template'          => "\n\t\t<tr><td colspan=\"2\">{open}<table>\n{fields}</table></td></tr>\n\t\t{close}\n",
    'field_template' => "<tr>\n\t\t\t<td class=\"{error_class}\">{label}{required}</td>\n\t\t\t<td class=\"{error_class}\">{error_msg}{field}<span>{description}</span></td>\n\t\t</tr>\n",
    'required_mark'  => '*',
    'inline_errors'  => true,
    'error_class'    => 'validation_error',
);
