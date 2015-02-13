// var SITE = {URL: 'http://ayonongkrong.com/pos/'};
var SITE = {URL: 'http://localhost/projects/POS/'};

$("a#save-setting").click(function () {
	var profit = $("#profit").val()
	var unit_id = $("#unit_id").val()
	var item_id = $("#item_id").val()
    alert(profit);
 //    $.ajax({
	// 	type: 'post',
	// 	url: SITE.URL + 'stocks/setting_profit',
	// 	data: 'profit=' + profit + '&unit_id=' + unit_id + '&item_id=' + item_id,
	// 	success: function () {
	// 		window.location.href = SITE.URL + 'stocks'
	// 	}
	// });
});