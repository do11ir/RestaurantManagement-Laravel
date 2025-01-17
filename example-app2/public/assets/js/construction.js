$(function (e) {
	"use strict";

	var myDate = new Date();
	myDate.setDate(myDate.getDate() + 2);
	$("#countdown").countdown(myDate, function (event) {
		$(this).html(
			event.strftime(
				'<div class="timer-wrapper"><div class="time">%D</div><span class="text">روز</span></div><div class="timer-wrapper"><div class="time">%H</div><span class="text">ساعت</span></div><div class="timer-wrapper"><div class="time">%M</div><span class="text">دقیقه</span></div><div class="timer-wrapper"><div class="time">%S</div><span class="text">ثانیه</span></div>'
			)
		);
	});

});