$(function (e) {
    "use strict";

    // Message
    $(document).on("click", "#but1", function (e) {
        $('body').removeClass('timer-alert');
        var message = $("#message").val();
        if (message == "") {
            message = "پیام شما";
        }
        // swal({text:message,  confirmButtonText: "باشه",});
        swal({
            title: '', text: message, confirmButtonText: "باشه"
        });
    });
    // With message and title
    $(document).on("click", "#but2", function (e) {
        $('body').removeClass('timer-alert');
        var message = $("#message").val();
        var title = $("#title").val();
        if (message == "") {
            message = "پیام شما";
        }
        if (title == "") {
            title = "پیام شما";
        }
        swal({
            title: title, text: message, confirmButtonText: "باشه"
        });
    });
    // Show image
    $(document).on("click", "#but3", function (e) {
        $('body').removeClass('timer-alert');
        var message = $("#message").val();
        var title = $("#title").val();
        if (message == "") {
            message = "پیام شما";
        }
        if (title == "") {
            title = "پیام شما";
        }
        swal({
            title: title, text: message, confirmButtonText: "باشه", imageUrl: '../assets/images/brand/logo-2.png'
        });
    });
    // Timer
    $(document).on("click", "#but4", function (e) {
        $('body').addClass('timer-alert');
        var message = $("#message").val();
        var title = $("#title").val();
        if (message == "") {
            message = "پیام شما";
        }
        if (title == "") {
            title = "پیام شما";
        }
        message += "(بستن بعد از 2 ثانیه)";
        swal({
            title: title, text: message, timer: 2000, showConfirmButton: false
        });
    });
    //
    $(document).on("click", "#click", function (e) {
        $('body').removeClass('timer-alert');
        var type = $("#type").val();
        swal({
            title: "عنوان", text: "پیام شما", confirmButtonText: "باشه", type: type
        });
    });
    // Prompt
    $(document).on("click", "#prompt", function (e) {
        $('body').removeClass('timer-alert');
        swal({
            title: "افزودن",
            text: "وارد کردن پیام شما",
            type: "input",
            showCancelButton: true,
            confirmButtonText: "باشه",
            closeOnConfirm: false,
            inputPlaceholder: "پیام شما"
        }, function (inputValue) {
            if (inputValue != "") {
                swal("Input", "متن وارده شما : " + inputValue);
            }
        });
    });
    // Confirm
    $(document).on("click", "#confirm", function (e) {
        $('body').removeClass('timer-alert');
        swal({
            title: "هشدار",
            text: "آیا واقعاً می خواهید خارج شوید",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: 'خروج',
            cancelButtonText: 'ماندن در صفحه'
        });
    });
    $(document).on("click", "#click", function (e) {
        swal({
            title: "تبریک!", text: "پیام شما با موفقیت ارسال شد", type: "success", confirmButtonText: 'باشه',
        });
    });
    //payment alert
    $(document).on("click", "#click-payment", function (e) {
        swal('تبریک!', 'سفارش شما ثبت شد', 'success');
    });
    $(document).on("click", "#click1", function (e) {
        $('body').removeClass('timer-alert');
        swal({
            title: "هشدار",
            text: "اعلان هشدار",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: 'خروج',
            cancelButtonText: 'ماندن در صفحه'
        });
    });
    $(document).on("click", "#click2", function (e) {
        $('body').removeClass('timer-alert');
        swal({
            title: "هشدار",
            text: "اعلان خطر",
            type: "error",
            showCancelButton: true,
            confirmButtonText: 'خروج',
            cancelButtonText: 'ماندن در صفحه'
        });
    });
    $(document).on("click", "#click3", function (e) {
        $('body').removeClass('timer-alert');
        swal({
            title: "هشدار",
            text: "اعلان اطلاعات",
            type: "info",
            showCancelButton: true,
            confirmButtonText: 'خروج',
            cancelButtonText: 'ماندن در صفحه'
        });
    });
});