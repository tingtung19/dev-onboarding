import $ from "jquery";
window.$ = window.jQuery = $;
import handler from "./customs/ExampleHandler.js";
import constant from "./constant.js";
import SlickHandler from "./customs/SlickHandler.js";
// import test from "./customs/test.js";
import onboarding from "./customs/onboarding.js";

(function ($) {
	
	// console.log(constant.API_KEY);
	// console.log(handler.arrayHandler());
	// // handler.ajaxRequest();
	// SlickHandler.createSlick();
	// handler.changeText();
	// test.main(); 
	onboarding.main();
	// handler.main();
	
})(jQuery);