/*
 * Custom js for Expat 2 Expat Marketplace
 * Currency format requires numeral.js
 */

/* Submit the form when the customer updates the quantity of a product. */
$(".qty").change(function() {
	$(this).closest('form').submit();
});

/* Combining the currency, price, and unit into price per unit */
$("#product_price").bind('change keyup', function(){
	if ($('#currency').val() == '₩')
	{
		$("#priceunit").val($("#currency").val() + numeral(parseFloat($("#price").val().replace(/,/g, ''))).format('0,0') + "/" + $("#unit").val());
	}
	else {
		$("#priceunit").val($("#currency").val() + numeral(parseFloat($("#price").val().replace(/,/g, ''))).format('0,0.00') + "/" + $("#unit").val());
	}
	
});

/* Alert js for flash messages. */
$('div.alert').not('.alert-important').delay(3500).slideUp(400);

/* Calculate total cost of ordering product */
$("#product_price").bind('change keyup', function(){
	$("#totalcost").val("₩ " + numeral(parseFloat($("#quantity").val().replace(/,/g, '')) * 3000).format('0,0'));
});

/* Limit string length of product titles. */
$(".product-title").each(function(){
    if ($(this).text().length > 30) {
        $(this).text($(this).text().substr(0, 27));
        $(this).append('...');
    }
});
