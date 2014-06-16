<?php

	//Old Form - for compatibility
  foreach($this->xml->param as $option){
		$opt_name = '';
		$opt_name = $option['name'];
		//$opt_value = $instance["$opt_name"];
		$field_id = $this->get_field_id($option['name']);
		$field_name = $this->get_field_name($option['name']);
		$field_value = isset( $instance["$opt_name"] ) ? $instance["$opt_name"] : $option['default'];
		switch($option['type']){
			case "text":
			$output = '<p><label for="'.$field_id.'">'.$option['label'].':</label><input class="widefat" id="'.$field_id.'"	name="'.$field_name.'" type="text" value="'.$field_value.'" style="width:100%;" /></p>';
			echo $output;
			unset($output);
			break;
			case "radio":
			case "list":
			$output = '<p><label for="'.$field_id.'">'.$option['label'].'</label><select id="'.$field_id.'" name="'.$field_name.'" class="widefat" style="width:100%;">';
				foreach($option->option as $select){
					$output .='<option ';
					if ( $select['value'] == $field_value ) $output .= 'selected="selected"';
					$output .=' value="'.$select['value'].'">'.$select.'</option>';}

			$output .= '</select></p>';
			echo $output;
			unset($output);
			break;
			case "textarea":
			$output = '<p><label for="'.$field_id.'">'.$option['label'].':</label><textarea class="widefat" id="'.$field_id.'"	name="'.$field_name.'" rows="'.$option['rows'].'" cols="'.$option['cols'].'" value="'.$field_value.'" style="width:100%;height:100px">'.$field_value.'</textarea></p>';
			echo $output;
			unset($output);
			break;
			default:
			break;
		}
  }

	//New Form Parser
	foreach ($this->xml->config->fields as $fields){
		foreach ($fields->fieldset as $fieldset){
			$fieldset_id = $this->get_field_id($fieldset['name']);
			?>
			<p>
				<div id="<?php echo $fieldset_id; ?>" style="display:none;">
					<?php
						foreach ($fieldset->field as $field){
							$opt_name = '';
							$opt_name = $field['name'];
							$field_id = $this->get_field_id($field['name']);
							$field_name = $this->get_field_name($field['name']);
							$field_value = isset( $instance["$opt_name"] ) ? esc_textarea($instance["$opt_name"]) : $field['default'];
							switch($field['type']){
								case "note":
									$output = '<p><label for="'.$field_id.'">'.$field['label'].'</label></p>';
									echo $output;
									unset($output);
								break;
								case "text":
									$output = '<p><label for="'.$field_id.'">'.$field['label'].'</label><input class="widefat" id="'.$field_id.'"	name="'.$field_name.'" type="text" value="'.$field_value.'" style="width:60%;" /></p>';
									echo $output;
									unset($output);
								break;
								case "radio":
								case "list":
									$output = '<p><label for="'.$field_id.'">'.$field['label'].'</label><select id="'.$field_id.'" name="'.$field_name.'" class="widefat" style="width:60%;">';
										foreach($field->option as $select){
											$output .='<option ';
											if ( $select['value'] == $field_value ) $output .= 'selected="selected"';
											$output .=' value="'.$select['value'].'">'.$select.'</option>';}

									$output .= '</select></p>';
									echo $output;
									unset($output);
								break;
								case "textarea":
									$output = '<p><label for="'.$field_id.'">'.$field['label'].'</label><textarea class="widefat" id="'.$field_id.'"	name="'.$field_name.'" rows="'.$field['rows'].'" cols="'.$field['cols'].'" value="'.$field_value.'" style="width:60%;height:100px">'.$field_value.'</textarea></p>';
									echo $output;
									unset($output);
								break;
								default:
								break;
							}
						}
					?>
				</div>
				<a href="#TB_inline?width=800&height=600&inlineId=<?php echo $fieldset_id; ?>" class="thickbox button" style="width: 100%"><?php if(isset($fieldset['label'])){echo $fieldset['label'];}else{echo ucwords(str_replace('_',' ',$fieldset['name']));} ?> Options</a>
			</p>
			<?php
		}
	}

?>