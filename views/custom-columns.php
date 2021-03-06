<h3>Custom Build Columns</h3>

<p>Columns can easily be combined from with a CSV or spreadsheet, however this tool can help you build some basic columns. Please note if you choose a column already matched above, this value will override your selection.</p>

<?php
$total_custom = count($custom_columns);
if($total_custom > 0){
	$cols = $custom_columns['col'];
	$methods = $custom_columns['method'];
	$values = $custom_columns['value'];
	$total_custom = count($cols);
}
?>
<div id="custom-columns"<?php if(!$total_custom) echo ' style="display:none;"' ?>>
	<table class="widefat">
		<thead>
			<tr>
				<th>Database Column</th>
				<th>Method</th>
				<th>Value</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<?php $even = false;
			if($total_custom > 0){
				for($i=0; $i < $total_custom; $i++){; ?>
					<tr class="<?php echo $even ? 'alternate' : ''; ?>">
						<td><?php echo $cols[$i]; ?>
							<input type="hidden" name="custom_columns[col][]" value="<?php echo $cols[$i]; ?>" />
							<input type="hidden" name="custom_columns[method][]" value="<?php echo $methods[$i]; ?>" />
							<input type="hidden" name="custom_columns[value][]" value="<?php echo $values[$i]; ?>" />
						</td>
						<td><?php echo $methods[$i]; ?></td>
						<td><?php echo $values[$i]; ?></td>
						<td><a href="#delete" class="delete" title="Delete">Delete</a></td>
					</tr>
					<?php $even = !$even;
				}
			} ?>
		</tbody>
	</table>
</div>

<div>&nbsp;</div>

<div class="postbox">
	<div class="inside">
		<div class="custom-column-create">
			1. Select the Database Column &nbsp;
			<?php echo $this->_db_field_select('custom_col', $found); ?>
			<input type="text" name="db_field[custom_col]" disabled="disabled" style="display: none;"/><br />
			
			<div class="other-steps">
				2. Choose the Customization Method
				<select id="custom_method">
					<option value="">Select One</option>
					<?php foreach($this->customization_methods as $method => $label){ ?>}
						<option value="<?php echo $method; ?>"><?php echo $label; ?></option>
					<?php } ?>
				</select>
				
				<div class="custom-column-method method-concat">
					<div class="concat_wrap">
						<select class="custom_concat">
							<?php foreach($headings as $heading){ ?>
								<option value="<?php echo $heading; ?>"><?php echo $heading; ?></option>
							<?php } ?>
							<option value="__string__">- INSERT STRING -</option>
						</select>
						<input type="text" class="concat_string" />
						<a href="#minus" class="minus">-</a>
					</div>
					
					<a href="#plus" class="plus">+</a>
				</div>
				
				<div class="custom-column-method method-value">
					<input type="text" id="custom_value" value="" />
				</div>
				<div class="button-wrap">
					<input type="button" value="Add Column" class="button" id="add-custom-column" />
				</div>
			</div>
		</div>
	</div><!-- .inside -->
</div><!-- .postbox -->