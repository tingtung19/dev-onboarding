import $ from "jquery";
window.$ = window.jQuery = $;
import handler from "./customs/ExampleHandler.js";
import constant from "./constant.js";
import SlickHandler from "./customs/SlickHandler.js";
import test from "./customs/test.js";

(function ($) {
	
	// console.log(constant.API_KEY);
	// console.log(handler.arrayHandler());
	// // handler.ajaxRequest();
	// SlickHandler.createSlick();
	// handler.changeText();
	test.main(); 
	// handler.main();
	
})(jQuery);