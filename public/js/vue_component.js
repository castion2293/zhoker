/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
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
/******/ 	// identity function for calling harmory imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmory exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		Object.defineProperty(exports, name, {
/******/ 			configurable: false,
/******/ 			enumerable: true,
/******/ 			get: getter
/******/ 		});
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
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 6);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ function(module, exports, __webpack_require__) {

eval("var __vue_script__, __vue_template__\nvar __vue_styles__ = {}\n__vue_script__ = __webpack_require__(2)\nif (Object.keys(__vue_script__).some(function (key) { return key !== \"default\" && key !== \"__esModule\" })) {\n  console.warn(\"[vue-loader] resources\\\\assets\\\\js\\\\components\\\\Example.vue: named exports in *.vue files are ignored.\")}\n__vue_template__ = __webpack_require__(4)\nmodule.exports = __vue_script__ || {}\nif (module.exports.__esModule) module.exports = module.exports.default\nvar __vue_options__ = typeof module.exports === \"function\" ? (module.exports.options || (module.exports.options = {})) : module.exports\nif (__vue_template__) {\n__vue_options__.template = __vue_template__\n}\nif (!__vue_options__.computed) __vue_options__.computed = {}\nObject.keys(__vue_styles__).forEach(function (key) {\nvar module = __vue_styles__[key]\n__vue_options__.computed[key] = function () { return module }\n})\nif (false) {(function () {  module.hot.accept()\n  var hotAPI = require(\"vue-hot-reload-api\")\n  hotAPI.install(require(\"vue\"), false)\n  if (!hotAPI.compatible) return\n  var id = \"_v-2ee4f831/Example.vue\"\n  if (!module.hot.data) {\n    hotAPI.createRecord(id, module.exports)\n  } else {\n    hotAPI.update(id, module.exports, __vue_template__)\n  }\n})()}//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9hc3NldHMvanMvY29tcG9uZW50cy9FeGFtcGxlLnZ1ZT9kZDRlIl0sInNvdXJjZXNDb250ZW50IjpbInZhciBfX3Z1ZV9zY3JpcHRfXywgX192dWVfdGVtcGxhdGVfX1xudmFyIF9fdnVlX3N0eWxlc19fID0ge31cbl9fdnVlX3NjcmlwdF9fID0gcmVxdWlyZShcIiEhYmFiZWwtbG9hZGVyIS4uLy4uLy4uLy4uL25vZGVfbW9kdWxlcy92dWUtbG9hZGVyL2xpYi9zZWxlY3Rvci5qcz90eXBlPXNjcmlwdCZpbmRleD0wIS4vRXhhbXBsZS52dWVcIilcbmlmIChPYmplY3Qua2V5cyhfX3Z1ZV9zY3JpcHRfXykuc29tZShmdW5jdGlvbiAoa2V5KSB7IHJldHVybiBrZXkgIT09IFwiZGVmYXVsdFwiICYmIGtleSAhPT0gXCJfX2VzTW9kdWxlXCIgfSkpIHtcbiAgY29uc29sZS53YXJuKFwiW3Z1ZS1sb2FkZXJdIHJlc291cmNlc1xcXFxhc3NldHNcXFxcanNcXFxcY29tcG9uZW50c1xcXFxFeGFtcGxlLnZ1ZTogbmFtZWQgZXhwb3J0cyBpbiAqLnZ1ZSBmaWxlcyBhcmUgaWdub3JlZC5cIil9XG5fX3Z1ZV90ZW1wbGF0ZV9fID0gcmVxdWlyZShcIiEhdnVlLWh0bWwtbG9hZGVyIS4uLy4uLy4uLy4uL25vZGVfbW9kdWxlcy92dWUtbG9hZGVyL2xpYi9zZWxlY3Rvci5qcz90eXBlPXRlbXBsYXRlJmluZGV4PTAhLi9FeGFtcGxlLnZ1ZVwiKVxubW9kdWxlLmV4cG9ydHMgPSBfX3Z1ZV9zY3JpcHRfXyB8fCB7fVxuaWYgKG1vZHVsZS5leHBvcnRzLl9fZXNNb2R1bGUpIG1vZHVsZS5leHBvcnRzID0gbW9kdWxlLmV4cG9ydHMuZGVmYXVsdFxudmFyIF9fdnVlX29wdGlvbnNfXyA9IHR5cGVvZiBtb2R1bGUuZXhwb3J0cyA9PT0gXCJmdW5jdGlvblwiID8gKG1vZHVsZS5leHBvcnRzLm9wdGlvbnMgfHwgKG1vZHVsZS5leHBvcnRzLm9wdGlvbnMgPSB7fSkpIDogbW9kdWxlLmV4cG9ydHNcbmlmIChfX3Z1ZV90ZW1wbGF0ZV9fKSB7XG5fX3Z1ZV9vcHRpb25zX18udGVtcGxhdGUgPSBfX3Z1ZV90ZW1wbGF0ZV9fXG59XG5pZiAoIV9fdnVlX29wdGlvbnNfXy5jb21wdXRlZCkgX192dWVfb3B0aW9uc19fLmNvbXB1dGVkID0ge31cbk9iamVjdC5rZXlzKF9fdnVlX3N0eWxlc19fKS5mb3JFYWNoKGZ1bmN0aW9uIChrZXkpIHtcbnZhciBtb2R1bGUgPSBfX3Z1ZV9zdHlsZXNfX1trZXldXG5fX3Z1ZV9vcHRpb25zX18uY29tcHV0ZWRba2V5XSA9IGZ1bmN0aW9uICgpIHsgcmV0dXJuIG1vZHVsZSB9XG59KVxuaWYgKG1vZHVsZS5ob3QpIHsoZnVuY3Rpb24gKCkgeyAgbW9kdWxlLmhvdC5hY2NlcHQoKVxuICB2YXIgaG90QVBJID0gcmVxdWlyZShcInZ1ZS1ob3QtcmVsb2FkLWFwaVwiKVxuICBob3RBUEkuaW5zdGFsbChyZXF1aXJlKFwidnVlXCIpLCBmYWxzZSlcbiAgaWYgKCFob3RBUEkuY29tcGF0aWJsZSkgcmV0dXJuXG4gIHZhciBpZCA9IFwiX3YtMmVlNGY4MzEvRXhhbXBsZS52dWVcIlxuICBpZiAoIW1vZHVsZS5ob3QuZGF0YSkge1xuICAgIGhvdEFQSS5jcmVhdGVSZWNvcmQoaWQsIG1vZHVsZS5leHBvcnRzKVxuICB9IGVsc2Uge1xuICAgIGhvdEFQSS51cGRhdGUoaWQsIG1vZHVsZS5leHBvcnRzLCBfX3Z1ZV90ZW1wbGF0ZV9fKVxuICB9XG59KSgpfVxuXG5cbi8vLy8vLy8vLy8vLy8vLy8vL1xuLy8gV0VCUEFDSyBGT09URVJcbi8vIC4vcmVzb3VyY2VzL2Fzc2V0cy9qcy9jb21wb25lbnRzL0V4YW1wbGUudnVlXG4vLyBtb2R1bGUgaWQgPSAwXG4vLyBtb2R1bGUgY2h1bmtzID0gMCJdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EiLCJzb3VyY2VSb290IjoiIn0=");

/***/ },
/* 1 */
/***/ function(module, exports, __webpack_require__) {

eval("var __vue_script__, __vue_template__\nvar __vue_styles__ = {}\n__vue_script__ = __webpack_require__(3)\nif (Object.keys(__vue_script__).some(function (key) { return key !== \"default\" && key !== \"__esModule\" })) {\n  console.warn(\"[vue-loader] resources\\\\assets\\\\js\\\\components\\\\LangSelect.vue: named exports in *.vue files are ignored.\")}\n__vue_template__ = __webpack_require__(5)\nmodule.exports = __vue_script__ || {}\nif (module.exports.__esModule) module.exports = module.exports.default\nvar __vue_options__ = typeof module.exports === \"function\" ? (module.exports.options || (module.exports.options = {})) : module.exports\nif (__vue_template__) {\n__vue_options__.template = __vue_template__\n}\nif (!__vue_options__.computed) __vue_options__.computed = {}\nObject.keys(__vue_styles__).forEach(function (key) {\nvar module = __vue_styles__[key]\n__vue_options__.computed[key] = function () { return module }\n})\nif (false) {(function () {  module.hot.accept()\n  var hotAPI = require(\"vue-hot-reload-api\")\n  hotAPI.install(require(\"vue\"), false)\n  if (!hotAPI.compatible) return\n  var id = \"_v-273f2a93/LangSelect.vue\"\n  if (!module.hot.data) {\n    hotAPI.createRecord(id, module.exports)\n  } else {\n    hotAPI.update(id, module.exports, __vue_template__)\n  }\n})()}//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMS5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9hc3NldHMvanMvY29tcG9uZW50cy9MYW5nU2VsZWN0LnZ1ZT82MTU0Il0sInNvdXJjZXNDb250ZW50IjpbInZhciBfX3Z1ZV9zY3JpcHRfXywgX192dWVfdGVtcGxhdGVfX1xudmFyIF9fdnVlX3N0eWxlc19fID0ge31cbl9fdnVlX3NjcmlwdF9fID0gcmVxdWlyZShcIiEhYmFiZWwtbG9hZGVyIS4uLy4uLy4uLy4uL25vZGVfbW9kdWxlcy92dWUtbG9hZGVyL2xpYi9zZWxlY3Rvci5qcz90eXBlPXNjcmlwdCZpbmRleD0wIS4vTGFuZ1NlbGVjdC52dWVcIilcbmlmIChPYmplY3Qua2V5cyhfX3Z1ZV9zY3JpcHRfXykuc29tZShmdW5jdGlvbiAoa2V5KSB7IHJldHVybiBrZXkgIT09IFwiZGVmYXVsdFwiICYmIGtleSAhPT0gXCJfX2VzTW9kdWxlXCIgfSkpIHtcbiAgY29uc29sZS53YXJuKFwiW3Z1ZS1sb2FkZXJdIHJlc291cmNlc1xcXFxhc3NldHNcXFxcanNcXFxcY29tcG9uZW50c1xcXFxMYW5nU2VsZWN0LnZ1ZTogbmFtZWQgZXhwb3J0cyBpbiAqLnZ1ZSBmaWxlcyBhcmUgaWdub3JlZC5cIil9XG5fX3Z1ZV90ZW1wbGF0ZV9fID0gcmVxdWlyZShcIiEhdnVlLWh0bWwtbG9hZGVyIS4uLy4uLy4uLy4uL25vZGVfbW9kdWxlcy92dWUtbG9hZGVyL2xpYi9zZWxlY3Rvci5qcz90eXBlPXRlbXBsYXRlJmluZGV4PTAhLi9MYW5nU2VsZWN0LnZ1ZVwiKVxubW9kdWxlLmV4cG9ydHMgPSBfX3Z1ZV9zY3JpcHRfXyB8fCB7fVxuaWYgKG1vZHVsZS5leHBvcnRzLl9fZXNNb2R1bGUpIG1vZHVsZS5leHBvcnRzID0gbW9kdWxlLmV4cG9ydHMuZGVmYXVsdFxudmFyIF9fdnVlX29wdGlvbnNfXyA9IHR5cGVvZiBtb2R1bGUuZXhwb3J0cyA9PT0gXCJmdW5jdGlvblwiID8gKG1vZHVsZS5leHBvcnRzLm9wdGlvbnMgfHwgKG1vZHVsZS5leHBvcnRzLm9wdGlvbnMgPSB7fSkpIDogbW9kdWxlLmV4cG9ydHNcbmlmIChfX3Z1ZV90ZW1wbGF0ZV9fKSB7XG5fX3Z1ZV9vcHRpb25zX18udGVtcGxhdGUgPSBfX3Z1ZV90ZW1wbGF0ZV9fXG59XG5pZiAoIV9fdnVlX29wdGlvbnNfXy5jb21wdXRlZCkgX192dWVfb3B0aW9uc19fLmNvbXB1dGVkID0ge31cbk9iamVjdC5rZXlzKF9fdnVlX3N0eWxlc19fKS5mb3JFYWNoKGZ1bmN0aW9uIChrZXkpIHtcbnZhciBtb2R1bGUgPSBfX3Z1ZV9zdHlsZXNfX1trZXldXG5fX3Z1ZV9vcHRpb25zX18uY29tcHV0ZWRba2V5XSA9IGZ1bmN0aW9uICgpIHsgcmV0dXJuIG1vZHVsZSB9XG59KVxuaWYgKG1vZHVsZS5ob3QpIHsoZnVuY3Rpb24gKCkgeyAgbW9kdWxlLmhvdC5hY2NlcHQoKVxuICB2YXIgaG90QVBJID0gcmVxdWlyZShcInZ1ZS1ob3QtcmVsb2FkLWFwaVwiKVxuICBob3RBUEkuaW5zdGFsbChyZXF1aXJlKFwidnVlXCIpLCBmYWxzZSlcbiAgaWYgKCFob3RBUEkuY29tcGF0aWJsZSkgcmV0dXJuXG4gIHZhciBpZCA9IFwiX3YtMjczZjJhOTMvTGFuZ1NlbGVjdC52dWVcIlxuICBpZiAoIW1vZHVsZS5ob3QuZGF0YSkge1xuICAgIGhvdEFQSS5jcmVhdGVSZWNvcmQoaWQsIG1vZHVsZS5leHBvcnRzKVxuICB9IGVsc2Uge1xuICAgIGhvdEFQSS51cGRhdGUoaWQsIG1vZHVsZS5leHBvcnRzLCBfX3Z1ZV90ZW1wbGF0ZV9fKVxuICB9XG59KSgpfVxuXG5cbi8vLy8vLy8vLy8vLy8vLy8vL1xuLy8gV0VCUEFDSyBGT09URVJcbi8vIC4vcmVzb3VyY2VzL2Fzc2V0cy9qcy9jb21wb25lbnRzL0xhbmdTZWxlY3QudnVlXG4vLyBtb2R1bGUgaWQgPSAxXG4vLyBtb2R1bGUgY2h1bmtzID0gMCJdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EiLCJzb3VyY2VSb290IjoiIn0=");

/***/ },
/* 2 */
/***/ function(module, exports) {

"use strict";
eval("'use strict';\n\nObject.defineProperty(exports, \"__esModule\", {\n    value: true\n});\n// <template>\n//     <div class=\"container\">\n//         <div class=\"row\">\n//             <div class=\"col-md-8 col-md-offset-2\">\n//                 <div class=\"panel panel-default\">\n//                     <div class=\"panel-heading\">Example Component</div>\n//\n//                     <div class=\"panel-body\">\n//                         I'm an example component!\n//                     </div>\n//                 </div>\n//             </div>\n//         </div>\n//     </div>\n// </template>\n//\n// <script>\nexports.default = {\n    ready: function ready() {\n        console.log('Component ready.');\n    }\n};\n// </script>\n\n/* generated by vue-loader */\n\nmodule.exports = exports['default'];//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMi5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9FeGFtcGxlLnZ1ZT9jNmNmIl0sInNvdXJjZXNDb250ZW50IjpbIjx0ZW1wbGF0ZT5cclxuICAgIDxkaXYgY2xhc3M9XCJjb250YWluZXJcIj5cclxuICAgICAgICA8ZGl2IGNsYXNzPVwicm93XCI+XHJcbiAgICAgICAgICAgIDxkaXYgY2xhc3M9XCJjb2wtbWQtOCBjb2wtbWQtb2Zmc2V0LTJcIj5cclxuICAgICAgICAgICAgICAgIDxkaXYgY2xhc3M9XCJwYW5lbCBwYW5lbC1kZWZhdWx0XCI+XHJcbiAgICAgICAgICAgICAgICAgICAgPGRpdiBjbGFzcz1cInBhbmVsLWhlYWRpbmdcIj5FeGFtcGxlIENvbXBvbmVudDwvZGl2PlxyXG5cclxuICAgICAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzPVwicGFuZWwtYm9keVwiPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICBJJ20gYW4gZXhhbXBsZSBjb21wb25lbnQhXHJcbiAgICAgICAgICAgICAgICAgICAgPC9kaXY+XHJcbiAgICAgICAgICAgICAgICA8L2Rpdj5cclxuICAgICAgICAgICAgPC9kaXY+XHJcbiAgICAgICAgPC9kaXY+XHJcbiAgICA8L2Rpdj5cclxuPC90ZW1wbGF0ZT5cclxuXHJcbjxzY3JpcHQ+XHJcbiAgICBleHBvcnQgZGVmYXVsdCB7XHJcbiAgICAgICAgcmVhZHkoKSB7XHJcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKCdDb21wb25lbnQgcmVhZHkuJylcclxuICAgICAgICB9XHJcbiAgICB9XHJcbjwvc2NyaXB0PlxyXG5cblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gRXhhbXBsZS52dWU/N2U2MTQzOGMiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7OztBQWlCQTs7QUFFQTtBQUNBO0FBQ0E7QUFIQTs7Ozs7Iiwic291cmNlUm9vdCI6IiJ9");

/***/ },
/* 3 */
/***/ function(module, exports) {

"use strict";
eval("\"use strict\";\n\nObject.defineProperty(exports, \"__esModule\", {\n    value: true\n});\n// <template>\n//     <div>\n//         <select class=\"w3-select w3-border w3-text-black w3-large w3-white\" v-model=\"def\" @change=\"selectChange\">\n//             <option class=\"w3-text-black w3-white w3-large\" :value=\"en\">English</option>\n//             <option class=\"w3-text-black w3-white w3-large\" :value=\"zh_tw\">繁體中文</option>\n//         </select>\n//         <!--for refresh the new page, not shown-->\n//         <a id=\"language-page-link\" :href=\"url\" style=\"display:none;\">language page</a>\n//     </div>\n// </template>\n//\n// <script>\nexports.default = {\n    props: ['default_value'],\n\n    data: function data() {\n        return {\n            en: \"en\",\n            zh_tw: \"zh_tw\",\n            url: \"/language?lang=\",\n            def: this.default_value\n        };\n    },\n\n\n    methods: {\n        selectChange: function selectChange() {\n            //alert(this.def);\n            this.url += event.target.value;\n            $(\"#language-page-link\").attr({ \"href\": this.url });\n            $(\"#language-page-link\")[0].click();\n        }\n    }\n\n};\n// </script>\n\n/* generated by vue-loader */\n\nmodule.exports = exports[\"default\"];//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMy5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9MYW5nU2VsZWN0LnZ1ZT8yN2M1Il0sInNvdXJjZXNDb250ZW50IjpbIjx0ZW1wbGF0ZT5cclxuICAgIDxkaXY+XHJcbiAgICAgICAgPHNlbGVjdCBjbGFzcz1cInczLXNlbGVjdCB3My1ib3JkZXIgdzMtdGV4dC1ibGFjayB3My1sYXJnZSB3My13aGl0ZVwiIHYtbW9kZWw9XCJkZWZcIiBAY2hhbmdlPVwic2VsZWN0Q2hhbmdlXCI+XHJcbiAgICAgICAgICAgIDxvcHRpb24gY2xhc3M9XCJ3My10ZXh0LWJsYWNrIHczLXdoaXRlIHczLWxhcmdlXCIgOnZhbHVlPVwiZW5cIj5FbmdsaXNoPC9vcHRpb24+XHJcbiAgICAgICAgICAgIDxvcHRpb24gY2xhc3M9XCJ3My10ZXh0LWJsYWNrIHczLXdoaXRlIHczLWxhcmdlXCIgOnZhbHVlPVwiemhfdHdcIj7nuYHpq5TkuK3mloc8L29wdGlvbj5cclxuICAgICAgICA8L3NlbGVjdD5cclxuICAgICAgICA8IS0tZm9yIHJlZnJlc2ggdGhlIG5ldyBwYWdlLCBub3Qgc2hvd24tLT5cclxuICAgICAgICA8YSBpZD1cImxhbmd1YWdlLXBhZ2UtbGlua1wiIDpocmVmPVwidXJsXCIgc3R5bGU9XCJkaXNwbGF5Om5vbmU7XCI+bGFuZ3VhZ2UgcGFnZTwvYT5cclxuICAgIDwvZGl2PlxyXG48L3RlbXBsYXRlPlxyXG5cclxuPHNjcmlwdD5cclxuICAgIGV4cG9ydCBkZWZhdWx0IHtcclxuICAgICAgICBwcm9wczpbJ2RlZmF1bHRfdmFsdWUnXSxcclxuXHJcbiAgICAgICAgZGF0YSAoKSB7XHJcbiAgICAgICAgICAgIHJldHVybiB7XHJcbiAgICAgICAgICAgICAgICBlbjogXCJlblwiLFxyXG4gICAgICAgICAgICAgICAgemhfdHc6IFwiemhfdHdcIixcclxuICAgICAgICAgICAgICAgIHVybDogXCIvbGFuZ3VhZ2U/bGFuZz1cIixcclxuICAgICAgICAgICAgICAgIGRlZjogdGhpcy5kZWZhdWx0X3ZhbHVlLFxyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfSxcclxuXHJcbiAgICAgICAgbWV0aG9kczoge1xyXG4gICAgICAgICAgICBzZWxlY3RDaGFuZ2UoKSB7XHJcbiAgICAgICAgICAgICAgICAvL2FsZXJ0KHRoaXMuZGVmKTtcclxuICAgICAgICAgICAgICAgIHRoaXMudXJsICs9IGV2ZW50LnRhcmdldC52YWx1ZTtcclxuICAgICAgICAgICAgICAgICQoXCIjbGFuZ3VhZ2UtcGFnZS1saW5rXCIpLmF0dHIoe1wiaHJlZlwiOiB0aGlzLnVybH0pO1xyXG4gICAgICAgICAgICAgICAgJChcIiNsYW5ndWFnZS1wYWdlLWxpbmtcIilbMF0uY2xpY2soKTtcclxuICAgICAgICAgICAgfSxcclxuICAgICAgICB9LFxyXG5cclxuICAgIH1cclxuPC9zY3JpcHQ+XHJcblxuXG5cbi8vIFdFQlBBQ0sgRk9PVEVSIC8vXG4vLyBMYW5nU2VsZWN0LnZ1ZT82MWM3NmNiZSJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7Ozs7Ozs7OztBQVlBOztBQUdBO0FBQ0E7QUFBQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUpBO0FBT0E7QUFDQTtBQUNBOztBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQU5BO0FBQ0E7QUFiQTs7Ozs7Iiwic291cmNlUm9vdCI6IiJ9");

/***/ },
/* 4 */
/***/ function(module, exports) {

eval("module.exports = \"\\n<div class=\\\"container\\\">\\n    <div class=\\\"row\\\">\\n        <div class=\\\"col-md-8 col-md-offset-2\\\">\\n            <div class=\\\"panel panel-default\\\">\\n                <div class=\\\"panel-heading\\\">Example Component</div>\\n\\n                <div class=\\\"panel-body\\\">\\n                    I'm an example component!\\n                </div>\\n            </div>\\n        </div>\\n    </div>\\n</div>\\n\";//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiNC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9hc3NldHMvanMvY29tcG9uZW50cy9FeGFtcGxlLnZ1ZT83MmJmIl0sInNvdXJjZXNDb250ZW50IjpbIm1vZHVsZS5leHBvcnRzID0gXCJcXG48ZGl2IGNsYXNzPVxcXCJjb250YWluZXJcXFwiPlxcbiAgICA8ZGl2IGNsYXNzPVxcXCJyb3dcXFwiPlxcbiAgICAgICAgPGRpdiBjbGFzcz1cXFwiY29sLW1kLTggY29sLW1kLW9mZnNldC0yXFxcIj5cXG4gICAgICAgICAgICA8ZGl2IGNsYXNzPVxcXCJwYW5lbCBwYW5lbC1kZWZhdWx0XFxcIj5cXG4gICAgICAgICAgICAgICAgPGRpdiBjbGFzcz1cXFwicGFuZWwtaGVhZGluZ1xcXCI+RXhhbXBsZSBDb21wb25lbnQ8L2Rpdj5cXG5cXG4gICAgICAgICAgICAgICAgPGRpdiBjbGFzcz1cXFwicGFuZWwtYm9keVxcXCI+XFxuICAgICAgICAgICAgICAgICAgICBJJ20gYW4gZXhhbXBsZSBjb21wb25lbnQhXFxuICAgICAgICAgICAgICAgIDwvZGl2PlxcbiAgICAgICAgICAgIDwvZGl2PlxcbiAgICAgICAgPC9kaXY+XFxuICAgIDwvZGl2PlxcbjwvZGl2PlxcblwiO1xuXG5cbi8vLy8vLy8vLy8vLy8vLy8vL1xuLy8gV0VCUEFDSyBGT09URVJcbi8vIC4vfi92dWUtaHRtbC1sb2FkZXIhLi9+L3Z1ZS1sb2FkZXIvbGliL3NlbGVjdG9yLmpzP3R5cGU9dGVtcGxhdGUmaW5kZXg9MCEuL3Jlc291cmNlcy9hc3NldHMvanMvY29tcG9uZW50cy9FeGFtcGxlLnZ1ZVxuLy8gbW9kdWxlIGlkID0gNFxuLy8gbW9kdWxlIGNodW5rcyA9IDAiXSwibWFwcGluZ3MiOiJBQUFBIiwic291cmNlUm9vdCI6IiJ9");

/***/ },
/* 5 */
/***/ function(module, exports) {

eval("module.exports = \"\\n<div>\\n    <select class=\\\"w3-select w3-border w3-text-black w3-large w3-white\\\" v-model=\\\"def\\\" @change=\\\"selectChange\\\">\\n        <option class=\\\"w3-text-black w3-white w3-large\\\" :value=\\\"en\\\">English</option>\\n        <option class=\\\"w3-text-black w3-white w3-large\\\" :value=\\\"zh_tw\\\">繁體中文</option>\\n    </select>\\n    <!--for refresh the new page, not shown-->\\n    <a id=\\\"language-page-link\\\" :href=\\\"url\\\" style=\\\"display:none;\\\">language page</a>\\n</div>\\n\";//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiNS5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9hc3NldHMvanMvY29tcG9uZW50cy9MYW5nU2VsZWN0LnZ1ZT9iMGEwIl0sInNvdXJjZXNDb250ZW50IjpbIm1vZHVsZS5leHBvcnRzID0gXCJcXG48ZGl2PlxcbiAgICA8c2VsZWN0IGNsYXNzPVxcXCJ3My1zZWxlY3QgdzMtYm9yZGVyIHczLXRleHQtYmxhY2sgdzMtbGFyZ2UgdzMtd2hpdGVcXFwiIHYtbW9kZWw9XFxcImRlZlxcXCIgQGNoYW5nZT1cXFwic2VsZWN0Q2hhbmdlXFxcIj5cXG4gICAgICAgIDxvcHRpb24gY2xhc3M9XFxcInczLXRleHQtYmxhY2sgdzMtd2hpdGUgdzMtbGFyZ2VcXFwiIDp2YWx1ZT1cXFwiZW5cXFwiPkVuZ2xpc2g8L29wdGlvbj5cXG4gICAgICAgIDxvcHRpb24gY2xhc3M9XFxcInczLXRleHQtYmxhY2sgdzMtd2hpdGUgdzMtbGFyZ2VcXFwiIDp2YWx1ZT1cXFwiemhfdHdcXFwiPue5gemrlOS4reaWhzwvb3B0aW9uPlxcbiAgICA8L3NlbGVjdD5cXG4gICAgPCEtLWZvciByZWZyZXNoIHRoZSBuZXcgcGFnZSwgbm90IHNob3duLS0+XFxuICAgIDxhIGlkPVxcXCJsYW5ndWFnZS1wYWdlLWxpbmtcXFwiIDpocmVmPVxcXCJ1cmxcXFwiIHN0eWxlPVxcXCJkaXNwbGF5Om5vbmU7XFxcIj5sYW5ndWFnZSBwYWdlPC9hPlxcbjwvZGl2PlxcblwiO1xuXG5cbi8vLy8vLy8vLy8vLy8vLy8vL1xuLy8gV0VCUEFDSyBGT09URVJcbi8vIC4vfi92dWUtaHRtbC1sb2FkZXIhLi9+L3Z1ZS1sb2FkZXIvbGliL3NlbGVjdG9yLmpzP3R5cGU9dGVtcGxhdGUmaW5kZXg9MCEuL3Jlc291cmNlcy9hc3NldHMvanMvY29tcG9uZW50cy9MYW5nU2VsZWN0LnZ1ZVxuLy8gbW9kdWxlIGlkID0gNVxuLy8gbW9kdWxlIGNodW5rcyA9IDAiXSwibWFwcGluZ3MiOiJBQUFBIiwic291cmNlUm9vdCI6IiJ9");

/***/ },
/* 6 */
/***/ function(module, exports, __webpack_require__) {

"use strict";
eval("'use strict';\n\n/**\r\n * First we will load all of this project's JavaScript dependencies which\r\n * include Vue and Vue Resource. This gives a great starting point for\r\n * building robust, powerful web applications using Vue and Laravel.\r\n */\n\n//require('./bootstrap');\n\n/**\r\n * Next, we will create a fresh Vue application instance and attach it to\r\n * the body of the page. From here, you may begin adding components to\r\n * the application, or feel free to tweak this setup for your needs.\r\n */\n\nVue.component('example', __webpack_require__(0));\nVue.component('lang-select', __webpack_require__(1));\n\nnew Vue({\n  el: '#app'\n});\n\n//import autosize from 'autosize';\n\n//autosize(document.querySelectorAll('textarea'));//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiNi5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL2pzL3Z1ZV9jb21wb25lbnQuanM/NDk3MSJdLCJzb3VyY2VzQ29udGVudCI6WyIndXNlIHN0cmljdCc7XG5cbi8qKlxyXG4gKiBGaXJzdCB3ZSB3aWxsIGxvYWQgYWxsIG9mIHRoaXMgcHJvamVjdCdzIEphdmFTY3JpcHQgZGVwZW5kZW5jaWVzIHdoaWNoXHJcbiAqIGluY2x1ZGUgVnVlIGFuZCBWdWUgUmVzb3VyY2UuIFRoaXMgZ2l2ZXMgYSBncmVhdCBzdGFydGluZyBwb2ludCBmb3JcclxuICogYnVpbGRpbmcgcm9idXN0LCBwb3dlcmZ1bCB3ZWIgYXBwbGljYXRpb25zIHVzaW5nIFZ1ZSBhbmQgTGFyYXZlbC5cclxuICovXG5cbi8vcmVxdWlyZSgnLi9ib290c3RyYXAnKTtcblxuLyoqXHJcbiAqIE5leHQsIHdlIHdpbGwgY3JlYXRlIGEgZnJlc2ggVnVlIGFwcGxpY2F0aW9uIGluc3RhbmNlIGFuZCBhdHRhY2ggaXQgdG9cclxuICogdGhlIGJvZHkgb2YgdGhlIHBhZ2UuIEZyb20gaGVyZSwgeW91IG1heSBiZWdpbiBhZGRpbmcgY29tcG9uZW50cyB0b1xyXG4gKiB0aGUgYXBwbGljYXRpb24sIG9yIGZlZWwgZnJlZSB0byB0d2VhayB0aGlzIHNldHVwIGZvciB5b3VyIG5lZWRzLlxyXG4gKi9cblxuVnVlLmNvbXBvbmVudCgnZXhhbXBsZScsIHJlcXVpcmUoJy4vY29tcG9uZW50cy9FeGFtcGxlLnZ1ZScpKTtcblZ1ZS5jb21wb25lbnQoJ2xhbmctc2VsZWN0JywgcmVxdWlyZSgnLi9jb21wb25lbnRzL0xhbmdTZWxlY3QudnVlJykpO1xuXG5uZXcgVnVlKHtcbiAgZWw6ICcjYXBwJ1xufSk7XG5cbi8vaW1wb3J0IGF1dG9zaXplIGZyb20gJ2F1dG9zaXplJztcblxuLy9hdXRvc2l6ZShkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKCd0ZXh0YXJlYScpKTtcblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gcmVzb3VyY2VzL2Fzc2V0cy9qcy92dWVfY29tcG9uZW50LmpzIl0sIm1hcHBpbmdzIjoiQUFBQTtBQUNBOzs7Ozs7Ozs7Ozs7Ozs7QUFlQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7OyIsInNvdXJjZVJvb3QiOiIifQ==");

/***/ }
/******/ ]);