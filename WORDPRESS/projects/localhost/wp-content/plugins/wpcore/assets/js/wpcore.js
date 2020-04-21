(function($) {
/*	$("#addMoreWpCoreKey").click(function(){
		var html = '<tr><td><input type="text" name="wpcore_keys[]" value="" /></td><td>&nbsp;</td></tr>';

		$("#wpcore_keys").append(html);
	});*/

	$("#wpcore_addrow").on("click", function () {

		counter = $('#wpcore_keys tr').length - 2;

		var newRow = $("<tr>");
		var cols = "";

//		cols += '<td><input type="text" name="name' + counter + '"/></td>';
		cols += '<td><input type="text" name="wpcore_keys[]" required="required"></td>';
		cols += '<td></td>';
		cols += '<td align="right"><input type="button" class="wpcore_ibtnDel button button-small"  value="Delete"></td>';
		newRow.append(cols);
		$("#wpcore_keys").append(newRow);
		counter++;
	});

	$("#wpcore_keys").on("click", ".wpcore_ibtnDel", function (event) {
		$(this).closest("tr").remove();

		counter -= 1
		$('#wpcore_addrow').attr('disabled', false).prop('value', "Add Row");
	});

})(jQuery);
