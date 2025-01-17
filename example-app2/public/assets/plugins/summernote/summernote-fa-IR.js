/*!
 * 
 * Super simple wysiwyg editor v0.8.18
 * https://summernote.org
 * 
 * 
 * Copyright 2013- Alan Hong. and other contributors
 * summernote may be freely distributed under the MIT license.
 * 
 * Date: 2020-05-20T16:47Z
 * 
 */
(function webpackUniversalModuleDefinition(root, factory) {
	if(typeof exports === 'object' && typeof module === 'object')
		module.exports = factory();
	else if(typeof define === 'function' && define.amd)
		define([], factory);
	else {
		var a = factory();
		for(var i in a) (typeof exports === 'object' ? exports : root)[i] = a[i];
	}
})(window, function() {
return /******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 17);
/******/ })
/************************************************************************/
/******/ ({

/***/ 17:
/***/ (function(module, exports) {

(function ($) {
  $.extend($.summernote.lang, {
    'fa-IR': {
      font: {
        bold: 'درشت',
        italic: 'خمیده',
        underline: 'میان خط',
        clear: 'پاک کردن فرمت فونت',
        height: 'فاصله ی خطی',
        name: 'اسم فونت',
        strikethrough: 'خط روی متن',
        subscript: 'زیرنویس',
        superscript: 'بالانویس',
        size: 'اندازه ی فونت'
      },
      image: {
        image: 'تصویر',
        insert: 'وارد کردن تصویر',
        resizeFull: 'تغییر به اندازه ی کامل',
        resizeHalf: 'تغییر به اندازه نصف',
        resizeQuarter: 'تغییر به اندازه یک چهارم',
        floatLeft: 'چسباندن به چپ',
        floatRight: 'چسباندن به راست',
        floatNone: 'بدون چسبندگی',
        shapeRounded: 'شکل: گرد',
        shapeCircle: 'شکل: دایره',
        shapeThumbnail: 'شکل: بندانگشتی',
        shapeNone: 'شکل: هیچ',
        dragImageHere: 'یک تصویر را اینجا بکشید',
        dropImage: 'افزودن متن یا تصویر',
        selectFromFiles: 'فایل ها را انتخاب کنید',
        maximumFileSize: 'حداکثر اندازه پرونده',
        maximumFileSizeError: 'از حداکثر اندازه فایل بیشتر شده است.',
        url: 'آدرس تصویر',
        remove: 'حذف تصویر',
        original: 'ارجینال'
      },
      video: {
        video: 'ویدیو',
        videoLink: 'لینک ویدیو',
        insert: 'افزودن ویدیو',
        url: 'آدرس ویدیو ؟',
        providers: '(YouTube, Vimeo, Vine, Instagram, DailyMotion یا Youku)'
      },
      link: {
        link: 'لینک',
        insert: 'اضافه کردن لینک',
        unlink: 'حذف لینک',
        edit: 'ویرایش',
        textToDisplay: 'متن جهت نمایش',
        url: 'این لینک به چه آدرسی باید برود ؟',
        openInNewWindow: 'در یک پنجره ی جدید باز شود',
        useDefaultProtocol:'استفاده از پروتوکل پیشفرض'
      },
      table: {
        table: 'جدول',
        addRowAbove: 'افزودن ردیف بالا',
        addRowBelow: 'افزودن ردیف پایین',
        addColLeft: 'افزودن ستون چپ',
        addColRight: 'افزودن ستون راست',
        delRow: 'حذف ردیف',
        delCol: 'حذف ستون',
        delTable: 'حذف جدول'
      },
      hr: {
        insert: 'افزودن خط افقی'
      },
      style: {
        style: 'استیل',
        p: 'نرمال',
        blockquote: 'نقل قول',
        pre: 'کد',
        h1: 'سرتیتر 1',
        h2: 'سرتیتر 2',
        h3: 'سرتیتر 3',
        h4: 'سرتیتر 4',
        h5: 'سرتیتر 5',
        h6: 'سرتیتر 6'
      },
      lists: {
        unordered: 'لیست غیر ترتیبی',
        ordered: 'لیست ترتیبی'
      },
      options: {
        help: 'راهنما',
        fullscreen: 'نمایش تمام صفحه',
        codeview: 'مشاهده ی کد'
      },
      paragraph: {
        paragraph: 'پاراگراف',
        outdent: 'کاهش تو رفتگی',
        indent: 'افزایش تو رفتگی',
        left: 'چپ چین',
        center: 'میان چین',
        right: 'راست چین',
        justify: 'بلوک چین'
      },
      color: {
        recent: 'رنگ اخیرا استفاده شده',
        more: 'رنگ بیشتر',
        background: 'رنگ پس زمینه',
        foreground: 'رنگ متن',
        transparent: 'بی رنگ',
        setTransparent: 'تنظیم حالت بی رنگ',
        reset: 'بازنشاندن',
        resetToDefault: 'حالت پیش فرض'
      },
      shortcut: {
        shortcuts: 'دکمه های میان بر',
        close: 'بستن',
        textFormatting: 'فرمت متن',
        action: 'عملیات',
        paragraphFormatting: 'فرمت پاراگراف',
        documentStyle: 'استیل سند',
        extraKeys: 'کلید های اضافی'
      },
      help: {
        'insertParagraph': 'افزودن پاراگراف',
        'undo': 'آخرین دستور را لغو می کند',
        'redo': 'آخرین دستور را دوباره انجام می دهد',
        'tab': 'تب',
        'untab': 'از تب درآوردن',
        'bold': 'ضخیم کردن',
        'italic': 'خمیده کردن',
        'underline': 'زیر خط دار کردن',
        'strikethrough': 'یک استایل خط خطی تنظیم کنید',
        'removeFormat': 'پاک کردن استایل',
        'justifyLeft': 'چپ چین',
        'justifyCenter': 'وسط چین',
        'justifyRight': 'راست چین',
        'justifyFull': 'تنظیم تراز تمام',
        'insertUnorderedList': 'فهرست نامرتب را تغییر دهید',
        'insertOrderedList': 'فهرست مرتب را تغییر دهید',
        'outdent': 'خارج از پاراگراف فعلی',
        'indent': 'تورفتگی روی پاراگراف فعلی',
        'formatPara': 'قالب بلوک فعلی را به عنوان یک پاراگراف (برچسب P) تغییر دهید',
        'formatH1': 'قالب بلوک فعلی را به عنوان H1 تغییر دهید',
        'formatH2': 'قالب بلوک فعلی را به عنوان H2 تغییر دهید',
        'formatH3': 'قالب بلوک فعلی را به عنوان H3 تغییر دهید',
        'formatH4': 'قالب بلوک فعلی را به عنوان H4 تغییر دهید',
        'formatH5': 'قالب بلوک فعلی را به عنوان H5 تغییر دهید',
        'formatH6': 'قالب بلوک فعلی را به عنوان H6 تغییر دهید',
        'insertHorizontalRule': 'افزودن خط عمودی',
        'linkDialog.show': 'نمایش پاپآپ لینک'
      },
      history: {
        undo: 'واچیدن',
        redo: 'بازچیدن'
      },
      specialChar: {
        specialChar: 'کاراکتر خاص',
        select: 'انتخاب کاراکتر خاص'
      }
    }
  });
})(jQuery);

/***/ })

/******/ });
});