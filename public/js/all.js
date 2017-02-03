

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
}

// Change style of navbar on scroll
window.onscroll = function() {myFunction()};
function myFunction() {
    var navbar = document.getElementById("myNavbar");
    var list = document.getElementsByClassName("listcolor");
    var i;
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        navbar.className = "w3-navbar" + " w3-card-2" + " w3-animate-top" + " w3-white";
        for(i = 0;i < list.length;i++) {
          list[i].style.color = "black";
        }
    } else {
        navbar.className = navbar.className.replace(" w3-card-2 w3-animate-top w3-white", "");
        for(i = 0;i < list.length;i++) {
          list[i].style.color = "white";
        }
    }
}
$(function () {

    //Tooltip
    // $("#sign-in-bar").tooltip({title:"<p>Sign In</p>",  html: true, placement: "bottom"});
    // $("#sign-out-bar").tooltip({title:"<p>Sign Out</p>",  html: true, placement: "bottom"});
    // $("#help-bar").tooltip({title:"<p>Help</p>",  html: true, placement: "bottom"});
    // $("#chef-bar").tooltip({title:"<h4>Become a chef</h4>",  html: true, placement: "bottom"});

     //sidebar display
    $(".w3-opennav").click(function () {
        $(".w3-sidenav").css("display", "block");
        $(".w3-overlay").css("display", "block");
    });
    $(".w3-overlay").click(function () {
        $(".w3-sidenav").css("display", "none");
        $(".w3-overlay").css("display", "none");
    });

    //scroll up // Add smooth scrolling to hometag
    $(".clickdown").on("click", function(event){
       // Make sure this.hash has a value before overriding default behavior
       if(this.hash != "") {
         // Prevent default anchor click behavior
         event.preventDefault();

        // Store hash
        var hash = "#orderbtn";//this.hash;
        
        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 900, function(){
        
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
        });
       }//end if
    });

    //Click erease the text
    $("#eatlocation").val("Salt lake city");

    $("#eatlocation").focus(function(){
      if( $("#eatlocation").val() == "Salt lake city")
      $("#eatlocation").val("");
    });

    $("#eatlocation").focusout(function(){
      if( $("#eatlocation").val() == '') 
        $("#eatlocation").val("Salt lake city");
    });

    $("#eatlocationSmall").focus(function(){
      if( $("#eatlocationSmall").val() == "Salt lake city")
      $("#eatlocationSmall").val("");
    });

    $("#eatlocationSmall").focusout(function(){
      if( $("#eatlocationSmall").val() == '') 
        $("#eatlocationSmall").val("Salt lake city");
    });

    //googleMap
    // $("#googleMap").googleMap({
    //     zoom: 13,
    //     type: "ROADMAP" // Map type (optional)
    // });
    // $("#googleMap").addMarker({
    //     address: "751 S 300 E Salt Lake City Utah", // Postale Address
    //     url: 'https://www.yahoo.com.tw',
    //     title: 'HOUSE',
    //     text: "751 S 300 E Salt Lake City Utah"
    //     //    id: 'marker1'
    // });
    // $("#googleMap").addMarker({
    //     address: " 95 N. 300 W., Salt Lake City, UT", // Postale Address
    //     url: 'https://www.ldsbc.edu',
    //     title: 'LDSBC',
    //     text: "95 N. 300 W., Salt Lake City, UT"
    //     //    id: 'marker1'
    // });

})
/*!
* Parsley.js
* Version 2.4.4 - built Thu, Aug 4th 2016, 9:54 pm
* http://parsleyjs.org
* Guillaume Potier - <guillaume@wisembly.com>
* Marc-Andre Lafortune - <petroselinum@marc-andre.ca>
* MIT Licensed
*/
function _toConsumableArray(e){if(Array.isArray(e)){for(var t=0,i=Array(e.length);t<e.length;t++)i[t]=e[t];return i}return Array.from(e)}var _slice=Array.prototype.slice;!function(e,t){"object"==typeof exports&&"undefined"!=typeof module?module.exports=t(require("jquery")):"function"==typeof define&&define.amd?define(["jquery"],t):e.parsley=t(e.jQuery)}(this,function(e){"use strict";function t(e,t){return e.parsleyAdaptedCallback||(e.parsleyAdaptedCallback=function(){var i=Array.prototype.slice.call(arguments,0);i.unshift(this),e.apply(t||R,i)}),e.parsleyAdaptedCallback}function i(e){return 0===e.lastIndexOf(q,0)?e.substr(q.length):e}/**
   * inputevent - Alleviate browser bugs for input events
   * https://github.com/marcandre/inputevent
   * @version v0.0.3 - (built Thu, Apr 14th 2016, 5:58 pm)
   * @author Marc-Andre Lafortune <github@marc-andre.ca>
   * @license MIT
   */
function n(){var t=this,i=window||global;e.extend(this,{isNativeEvent:function(e){return e.originalEvent&&e.originalEvent.isTrusted!==!1},fakeInputEvent:function(i){t.isNativeEvent(i)&&e(i.target).trigger("input")},misbehaves:function(i){t.isNativeEvent(i)&&(t.behavesOk(i),e(document).on("change.inputevent",i.data.selector,t.fakeInputEvent),t.fakeInputEvent(i))},behavesOk:function(i){t.isNativeEvent(i)&&e(document).off("input.inputevent",i.data.selector,t.behavesOk).off("change.inputevent",i.data.selector,t.misbehaves)},install:function(){if(!i.inputEventPatched){i.inputEventPatched="0.0.3";for(var n=["select",'input[type="checkbox"]','input[type="radio"]','input[type="file"]'],r=0;r<n.length;r++){var s=n[r];e(document).on("input.inputevent",s,{selector:s},t.behavesOk).on("change.inputevent",s,{selector:s},t.misbehaves)}}},uninstall:function(){delete i.inputEventPatched,e(document).off(".inputevent")}})}var r=1,s={},a={attr:function(e,t,i){var n,r,s,a=new RegExp("^"+t,"i");if("undefined"==typeof i)i={};else for(n in i)i.hasOwnProperty(n)&&delete i[n];if("undefined"==typeof e||"undefined"==typeof e[0])return i;for(s=e[0].attributes,n=s.length;n--;)r=s[n],r&&r.specified&&a.test(r.name)&&(i[this.camelize(r.name.slice(t.length))]=this.deserializeValue(r.value));return i},checkAttr:function(e,t,i){return e.is("["+t+i+"]")},setAttr:function(e,t,i,n){e[0].setAttribute(this.dasherize(t+i),String(n))},generateID:function(){return""+r++},deserializeValue:function(t){var i;try{return t?"true"==t||("false"==t?!1:"null"==t?null:isNaN(i=Number(t))?/^[\[\{]/.test(t)?e.parseJSON(t):t:i):t}catch(n){return t}},camelize:function(e){return e.replace(/-+(.)?/g,function(e,t){return t?t.toUpperCase():""})},dasherize:function(e){return e.replace(/::/g,"/").replace(/([A-Z]+)([A-Z][a-z])/g,"$1_$2").replace(/([a-z\d])([A-Z])/g,"$1_$2").replace(/_/g,"-").toLowerCase()},warn:function(){var e;window.console&&"function"==typeof window.console.warn&&(e=window.console).warn.apply(e,arguments)},warnOnce:function(e){s[e]||(s[e]=!0,this.warn.apply(this,arguments))},_resetWarnings:function(){s={}},trimString:function(e){return e.replace(/^\s+|\s+$/g,"")},namespaceEvents:function(t,i){return t=this.trimString(t||"").split(/\s+/),t[0]?e.map(t,function(e){return e+"."+i}).join(" "):""},difference:function(t,i){var n=[];return e.each(t,function(e,t){-1==i.indexOf(t)&&n.push(t)}),n},all:function(t){return e.when.apply(e,_toConsumableArray(t).concat([42,42]))},objectCreate:Object.create||function(){var e=function(){};return function(t){if(arguments.length>1)throw Error("Second argument not supported");if("object"!=typeof t)throw TypeError("Argument must be an object");e.prototype=t;var i=new e;return e.prototype=null,i}}(),_SubmitSelector:'input[type="submit"], button:submit'},o=a,l={namespace:"data-parsley-",inputs:"input, textarea, select",excluded:"input[type=button], input[type=submit], input[type=reset], input[type=hidden]",priorityEnabled:!0,multiple:null,group:null,uiEnabled:!0,validationThreshold:3,focus:"first",trigger:!1,triggerAfterFailure:"input",errorClass:"parsley-error",successClass:"parsley-success",classHandler:function(e){},errorsContainer:function(e){},errorsWrapper:'<ul class="parsley-errors-list"></ul>',errorTemplate:"<li></li>"},u=function(){this.__id__=o.generateID()};u.prototype={asyncSupport:!0,_pipeAccordingToValidationResult:function(){var t=this,i=function(){var i=e.Deferred();return!0!==t.validationResult&&i.reject(),i.resolve().promise()};return[i,i]},actualizeOptions:function(){return o.attr(this.$element,this.options.namespace,this.domOptions),this.parent&&this.parent.actualizeOptions&&this.parent.actualizeOptions(),this},_resetOptions:function(e){this.domOptions=o.objectCreate(this.parent.options),this.options=o.objectCreate(this.domOptions);for(var t in e)e.hasOwnProperty(t)&&(this.options[t]=e[t]);this.actualizeOptions()},_listeners:null,on:function(e,t){this._listeners=this._listeners||{};var i=this._listeners[e]=this._listeners[e]||[];return i.push(t),this},subscribe:function(t,i){e.listenTo(this,t.toLowerCase(),i)},off:function(e,t){var i=this._listeners&&this._listeners[e];if(i)if(t)for(var n=i.length;n--;)i[n]===t&&i.splice(n,1);else delete this._listeners[e];return this},unsubscribe:function(t,i){e.unsubscribeTo(this,t.toLowerCase())},trigger:function(e,t,i){t=t||this;var n,r=this._listeners&&this._listeners[e];if(r)for(var s=r.length;s--;)if(n=r[s].call(t,t,i),n===!1)return n;return this.parent?this.parent.trigger(e,t,i):!0},reset:function(){if("ParsleyForm"!==this.__class__)return this._resetUI(),this._trigger("reset");for(var e=0;e<this.fields.length;e++)this.fields[e].reset();this._trigger("reset")},destroy:function(){if(this._destroyUI(),"ParsleyForm"!==this.__class__)return this.$element.removeData("Parsley"),this.$element.removeData("ParsleyFieldMultiple"),void this._trigger("destroy");for(var e=0;e<this.fields.length;e++)this.fields[e].destroy();this.$element.removeData("Parsley"),this._trigger("destroy")},asyncIsValid:function(e,t){return o.warnOnce("asyncIsValid is deprecated; please use whenValid instead"),this.whenValid({group:e,force:t})},_findRelated:function(){return this.options.multiple?this.parent.$element.find("["+this.options.namespace+'multiple="'+this.options.multiple+'"]'):this.$element}};var d={string:function(e){return e},integer:function(e){if(isNaN(e))throw'Requirement is not an integer: "'+e+'"';return parseInt(e,10)},number:function(e){if(isNaN(e))throw'Requirement is not a number: "'+e+'"';return parseFloat(e)},reference:function(t){var i=e(t);if(0===i.length)throw'No such reference: "'+t+'"';return i},"boolean":function(e){return"false"!==e},object:function(e){return o.deserializeValue(e)},regexp:function(e){var t="";return/^\/.*\/(?:[gimy]*)$/.test(e)?(t=e.replace(/.*\/([gimy]*)$/,"$1"),e=e.replace(new RegExp("^/(.*?)/"+t+"$"),"$1")):e="^"+e+"$",new RegExp(e,t)}},h=function(e,t){var i=e.match(/^\s*\[(.*)\]\s*$/);if(!i)throw'Requirement is not an array: "'+e+'"';var n=i[1].split(",").map(o.trimString);if(n.length!==t)throw"Requirement has "+n.length+" values when "+t+" are needed";return n},p=function(e,t){var i=d[e||"string"];if(!i)throw'Unknown requirement specification: "'+e+'"';return i(t)},c=function(e,t,i){var n=null,r={};for(var s in e)if(s){var a=i(s);"string"==typeof a&&(a=p(e[s],a)),r[s]=a}else n=p(e[s],t);return[n,r]},f=function(t){e.extend(!0,this,t)};f.prototype={validate:function(t,i){if(this.fn)return arguments.length>3&&(i=[].slice.call(arguments,1,-1)),this.fn.call(this,t,i);if(e.isArray(t)){if(!this.validateMultiple)throw"Validator `"+this.name+"` does not handle multiple values";return this.validateMultiple.apply(this,arguments)}if(this.validateNumber)return isNaN(t)?!1:(arguments[0]=parseFloat(arguments[0]),this.validateNumber.apply(this,arguments));if(this.validateString)return this.validateString.apply(this,arguments);throw"Validator `"+this.name+"` only handles multiple values"},parseRequirements:function(t,i){if("string"!=typeof t)return e.isArray(t)?t:[t];var n=this.requirementType;if(e.isArray(n)){for(var r=h(t,n.length),s=0;s<r.length;s++)r[s]=p(n[s],r[s]);return r}return e.isPlainObject(n)?c(n,t,i):[p(n,t)]},requirementType:"string",priority:2};var m=function(e,t){this.__class__="ParsleyValidatorRegistry",this.locale="en",this.init(e||{},t||{})},g={email:/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i,number:/^-?(\d*\.)?\d+(e[-+]?\d+)?$/i,integer:/^-?\d+$/,digits:/^\d+$/,alphanum:/^\w+$/i,url:new RegExp("^(?:(?:https?|ftp)://)?(?:\\S+(?::\\S*)?@)?(?:(?:[1-9]\\d?|1\\d\\d|2[01]\\d|22[0-3])(?:\\.(?:1?\\d{1,2}|2[0-4]\\d|25[0-5])){2}(?:\\.(?:[1-9]\\d?|1\\d\\d|2[0-4]\\d|25[0-4]))|(?:(?:[a-z\\u00a1-\\uffff0-9]-*)*[a-z\\u00a1-\\uffff0-9]+)(?:\\.(?:[a-z\\u00a1-\\uffff0-9]-*)*[a-z\\u00a1-\\uffff0-9]+)*(?:\\.(?:[a-z\\u00a1-\\uffff]{2,})))(?::\\d{2,5})?(?:/\\S*)?$","i")};g.range=g.number;var v=function(e){var t=(""+e).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);return t?Math.max(0,(t[1]?t[1].length:0)-(t[2]?+t[2]:0)):0};m.prototype={init:function(t,i){this.catalog=i,this.validators=e.extend({},this.validators);for(var n in t)this.addValidator(n,t[n].fn,t[n].priority);window.Parsley.trigger("parsley:validator:init")},setLocale:function(e){if("undefined"==typeof this.catalog[e])throw new Error(e+" is not available in the catalog");return this.locale=e,this},addCatalog:function(e,t,i){return"object"==typeof t&&(this.catalog[e]=t),!0===i?this.setLocale(e):this},addMessage:function(e,t,i){return"undefined"==typeof this.catalog[e]&&(this.catalog[e]={}),this.catalog[e][t]=i,this},addMessages:function(e,t){for(var i in t)this.addMessage(e,i,t[i]);return this},addValidator:function(e,t,i){if(this.validators[e])o.warn('Validator "'+e+'" is already defined.');else if(l.hasOwnProperty(e))return void o.warn('"'+e+'" is a restricted keyword and is not a valid validator name.');return this._setValidator.apply(this,arguments)},updateValidator:function(e,t,i){return this.validators[e]?this._setValidator.apply(this,arguments):(o.warn('Validator "'+e+'" is not already defined.'),this.addValidator.apply(this,arguments))},removeValidator:function(e){return this.validators[e]||o.warn('Validator "'+e+'" is not defined.'),delete this.validators[e],this},_setValidator:function(e,t,i){"object"!=typeof t&&(t={fn:t,priority:i}),t.validate||(t=new f(t)),this.validators[e]=t;for(var n in t.messages||{})this.addMessage(n,e,t.messages[n]);return this},getErrorMessage:function(e){var t;if("type"===e.name){var i=this.catalog[this.locale][e.name]||{};t=i[e.requirements]}else t=this.formatMessage(this.catalog[this.locale][e.name],e.requirements);return t||this.catalog[this.locale].defaultMessage||this.catalog.en.defaultMessage},formatMessage:function(e,t){if("object"==typeof t){for(var i in t)e=this.formatMessage(e,t[i]);return e}return"string"==typeof e?e.replace(/%s/i,t):""},validators:{notblank:{validateString:function(e){return/\S/.test(e)},priority:2},required:{validateMultiple:function(e){return e.length>0},validateString:function(e){return/\S/.test(e)},priority:512},type:{validateString:function(e,t){var i=arguments.length<=2||void 0===arguments[2]?{}:arguments[2],n=i.step,r=void 0===n?"1":n,s=i.base,a=void 0===s?0:s,o=g[t];if(!o)throw new Error("validator type `"+t+"` is not supported");if(!o.test(e))return!1;if("number"===t&&!/^any$/i.test(r||"")){var l=Number(e),u=Math.max(v(r),v(a));if(v(l)>u)return!1;var d=function(e){return Math.round(e*Math.pow(10,u))};if((d(l)-d(a))%d(r)!=0)return!1}return!0},requirementType:{"":"string",step:"string",base:"number"},priority:256},pattern:{validateString:function(e,t){return t.test(e)},requirementType:"regexp",priority:64},minlength:{validateString:function(e,t){return e.length>=t},requirementType:"integer",priority:30},maxlength:{validateString:function(e,t){return e.length<=t},requirementType:"integer",priority:30},length:{validateString:function(e,t,i){return e.length>=t&&e.length<=i},requirementType:["integer","integer"],priority:30},mincheck:{validateMultiple:function(e,t){return e.length>=t},requirementType:"integer",priority:30},maxcheck:{validateMultiple:function(e,t){return e.length<=t},requirementType:"integer",priority:30},check:{validateMultiple:function(e,t,i){return e.length>=t&&e.length<=i},requirementType:["integer","integer"],priority:30},min:{validateNumber:function(e,t){return e>=t},requirementType:"number",priority:30},max:{validateNumber:function(e,t){return t>=e},requirementType:"number",priority:30},range:{validateNumber:function(e,t,i){return e>=t&&i>=e},requirementType:["number","number"],priority:30},equalto:{validateString:function(t,i){var n=e(i);return n.length?t===n.val():t===i},priority:256}}};var y={},_=function k(e,t,i){for(var n=[],r=[],s=0;s<e.length;s++){for(var a=!1,o=0;o<t.length;o++)if(e[s].assert.name===t[o].assert.name){a=!0;break}a?r.push(e[s]):n.push(e[s])}return{kept:r,added:n,removed:i?[]:k(t,e,!0).added}};y.Form={_actualizeTriggers:function(){var e=this;this.$element.on("submit.Parsley",function(t){e.onSubmitValidate(t)}),this.$element.on("click.Parsley",o._SubmitSelector,function(t){e.onSubmitButton(t)}),!1!==this.options.uiEnabled&&this.$element.attr("novalidate","")},focus:function(){if(this._focusedField=null,!0===this.validationResult||"none"===this.options.focus)return null;for(var e=0;e<this.fields.length;e++){var t=this.fields[e];if(!0!==t.validationResult&&t.validationResult.length>0&&"undefined"==typeof t.options.noFocus&&(this._focusedField=t.$element,"first"===this.options.focus))break}return null===this._focusedField?null:this._focusedField.focus()},_destroyUI:function(){this.$element.off(".Parsley")}},y.Field={_reflowUI:function(){if(this._buildUI(),this._ui){var e=_(this.validationResult,this._ui.lastValidationResult);this._ui.lastValidationResult=this.validationResult,this._manageStatusClass(),this._manageErrorsMessages(e),this._actualizeTriggers(),!e.kept.length&&!e.added.length||this._failedOnce||(this._failedOnce=!0,this._actualizeTriggers())}},getErrorsMessages:function(){if(!0===this.validationResult)return[];for(var e=[],t=0;t<this.validationResult.length;t++)e.push(this.validationResult[t].errorMessage||this._getErrorMessage(this.validationResult[t].assert));return e},addError:function(e){var t=arguments.length<=1||void 0===arguments[1]?{}:arguments[1],i=t.message,n=t.assert,r=t.updateClass,s=void 0===r?!0:r;this._buildUI(),this._addError(e,{message:i,assert:n}),s&&this._errorClass()},updateError:function(e){var t=arguments.length<=1||void 0===arguments[1]?{}:arguments[1],i=t.message,n=t.assert,r=t.updateClass,s=void 0===r?!0:r;this._buildUI(),this._updateError(e,{message:i,assert:n}),s&&this._errorClass()},removeError:function(e){var t=arguments.length<=1||void 0===arguments[1]?{}:arguments[1],i=t.updateClass,n=void 0===i?!0:i;this._buildUI(),this._removeError(e),n&&this._manageStatusClass()},_manageStatusClass:function(){this.hasConstraints()&&this.needsValidation()&&!0===this.validationResult?this._successClass():this.validationResult.length>0?this._errorClass():this._resetClass()},_manageErrorsMessages:function(t){if("undefined"==typeof this.options.errorsMessagesDisabled){if("undefined"!=typeof this.options.errorMessage)return t.added.length||t.kept.length?(this._insertErrorWrapper(),0===this._ui.$errorsWrapper.find(".parsley-custom-error-message").length&&this._ui.$errorsWrapper.append(e(this.options.errorTemplate).addClass("parsley-custom-error-message")),this._ui.$errorsWrapper.addClass("filled").find(".parsley-custom-error-message").html(this.options.errorMessage)):this._ui.$errorsWrapper.removeClass("filled").find(".parsley-custom-error-message").remove();for(var i=0;i<t.removed.length;i++)this._removeError(t.removed[i].assert.name);for(i=0;i<t.added.length;i++)this._addError(t.added[i].assert.name,{message:t.added[i].errorMessage,assert:t.added[i].assert});for(i=0;i<t.kept.length;i++)this._updateError(t.kept[i].assert.name,{message:t.kept[i].errorMessage,assert:t.kept[i].assert})}},_addError:function(t,i){var n=i.message,r=i.assert;this._insertErrorWrapper(),this._ui.$errorsWrapper.addClass("filled").append(e(this.options.errorTemplate).addClass("parsley-"+t).html(n||this._getErrorMessage(r)))},_updateError:function(e,t){var i=t.message,n=t.assert;this._ui.$errorsWrapper.addClass("filled").find(".parsley-"+e).html(i||this._getErrorMessage(n))},_removeError:function(e){this._ui.$errorsWrapper.removeClass("filled").find(".parsley-"+e).remove()},_getErrorMessage:function(e){var t=e.name+"Message";return"undefined"!=typeof this.options[t]?window.Parsley.formatMessage(this.options[t],e.requirements):window.Parsley.getErrorMessage(e)},_buildUI:function(){if(!this._ui&&!1!==this.options.uiEnabled){var t={};this.$element.attr(this.options.namespace+"id",this.__id__),t.$errorClassHandler=this._manageClassHandler(),t.errorsWrapperId="parsley-id-"+(this.options.multiple?"multiple-"+this.options.multiple:this.__id__),t.$errorsWrapper=e(this.options.errorsWrapper).attr("id",t.errorsWrapperId),t.lastValidationResult=[],t.validationInformationVisible=!1,this._ui=t}},_manageClassHandler:function(){if("string"==typeof this.options.classHandler&&e(this.options.classHandler).length)return e(this.options.classHandler);var t=this.options.classHandler.call(this,this);return"undefined"!=typeof t&&t.length?t:this._inputHolder()},_inputHolder:function(){return!this.options.multiple||this.$element.is("select")?this.$element:this.$element.parent()},_insertErrorWrapper:function(){var t;if(0!==this._ui.$errorsWrapper.parent().length)return this._ui.$errorsWrapper.parent();if("string"==typeof this.options.errorsContainer){if(e(this.options.errorsContainer).length)return e(this.options.errorsContainer).append(this._ui.$errorsWrapper);o.warn("The errors container `"+this.options.errorsContainer+"` does not exist in DOM")}else"function"==typeof this.options.errorsContainer&&(t=this.options.errorsContainer.call(this,this));return"undefined"!=typeof t&&t.length?t.append(this._ui.$errorsWrapper):this._inputHolder().after(this._ui.$errorsWrapper)},_actualizeTriggers:function(){var e,t=this,i=this._findRelated();i.off(".Parsley"),this._failedOnce?i.on(o.namespaceEvents(this.options.triggerAfterFailure,"Parsley"),function(){t.validate()}):(e=o.namespaceEvents(this.options.trigger,"Parsley"))&&i.on(e,function(e){t._eventValidate(e)})},_eventValidate:function(e){!(!/key|input/.test(e.type)||this._ui&&this._ui.validationInformationVisible)&&this.getValue().length<=this.options.validationThreshold||this.validate()},_resetUI:function(){this._failedOnce=!1,this._actualizeTriggers(),"undefined"!=typeof this._ui&&(this._ui.$errorsWrapper.removeClass("filled").children().remove(),this._resetClass(),this._ui.lastValidationResult=[],this._ui.validationInformationVisible=!1)},_destroyUI:function(){this._resetUI(),"undefined"!=typeof this._ui&&this._ui.$errorsWrapper.remove(),delete this._ui},_successClass:function(){this._ui.validationInformationVisible=!0,this._ui.$errorClassHandler.removeClass(this.options.errorClass).addClass(this.options.successClass)},_errorClass:function(){this._ui.validationInformationVisible=!0,this._ui.$errorClassHandler.removeClass(this.options.successClass).addClass(this.options.errorClass)},_resetClass:function(){this._ui.$errorClassHandler.removeClass(this.options.successClass).removeClass(this.options.errorClass)}};var w=function(t,i,n){this.__class__="ParsleyForm",this.$element=e(t),this.domOptions=i,this.options=n,this.parent=window.Parsley,this.fields=[],this.validationResult=null},b={pending:null,resolved:!0,rejected:!1};w.prototype={onSubmitValidate:function(e){var t=this;if(!0!==e.parsley){var i=this._$submitSource||this.$element.find(o._SubmitSelector).first();if(this._$submitSource=null,this.$element.find(".parsley-synthetic-submit-button").prop("disabled",!0),!i.is("[formnovalidate]")){var n=this.whenValidate({event:e});"resolved"===n.state()&&!1!==this._trigger("submit")||(e.stopImmediatePropagation(),e.preventDefault(),"pending"===n.state()&&n.done(function(){t._submit(i)}))}}},onSubmitButton:function(t){this._$submitSource=e(t.currentTarget)},_submit:function(t){if(!1!==this._trigger("submit")){if(t){var i=this.$element.find(".parsley-synthetic-submit-button").prop("disabled",!1);0===i.length&&(i=e('<input class="parsley-synthetic-submit-button" type="hidden">').appendTo(this.$element)),i.attr({name:t.attr("name"),value:t.attr("value")})}this.$element.trigger(e.extend(e.Event("submit"),{parsley:!0}))}},validate:function(t){if(arguments.length>=1&&!e.isPlainObject(t)){o.warnOnce("Calling validate on a parsley form without passing arguments as an object is deprecated.");var i=_slice.call(arguments),n=i[0],r=i[1],s=i[2];t={group:n,force:r,event:s}}return b[this.whenValidate(t).state()]},whenValidate:function(){var t,i=this,n=arguments.length<=0||void 0===arguments[0]?{}:arguments[0],r=n.group,s=n.force,a=n.event;this.submitEvent=a,a&&(this.submitEvent=e.extend({},a,{preventDefault:function(){o.warnOnce("Using `this.submitEvent.preventDefault()` is deprecated; instead, call `this.validationResult = false`"),i.validationResult=!1}})),this.validationResult=!0,this._trigger("validate"),this._refreshFields();var l=this._withoutReactualizingFormOptions(function(){return e.map(i.fields,function(e){return e.whenValidate({force:s,group:r})})});return(t=o.all(l).done(function(){i._trigger("success")}).fail(function(){i.validationResult=!1,i.focus(),i._trigger("error")}).always(function(){i._trigger("validated")})).pipe.apply(t,_toConsumableArray(this._pipeAccordingToValidationResult()))},isValid:function(t){if(arguments.length>=1&&!e.isPlainObject(t)){o.warnOnce("Calling isValid on a parsley form without passing arguments as an object is deprecated.");var i=_slice.call(arguments),n=i[0],r=i[1];t={group:n,force:r}}return b[this.whenValid(t).state()]},whenValid:function(){var t=this,i=arguments.length<=0||void 0===arguments[0]?{}:arguments[0],n=i.group,r=i.force;this._refreshFields();var s=this._withoutReactualizingFormOptions(function(){return e.map(t.fields,function(e){return e.whenValid({group:n,force:r})})});return o.all(s)},_refreshFields:function(){return this.actualizeOptions()._bindFields()},_bindFields:function(){var t=this,i=this.fields;return this.fields=[],this.fieldsMappedById={},this._withoutReactualizingFormOptions(function(){t.$element.find(t.options.inputs).not(t.options.excluded).each(function(e,i){var n=new window.Parsley.Factory(i,{},t);"ParsleyField"!==n.__class__&&"ParsleyFieldMultiple"!==n.__class__||!0===n.options.excluded||"undefined"==typeof t.fieldsMappedById[n.__class__+"-"+n.__id__]&&(t.fieldsMappedById[n.__class__+"-"+n.__id__]=n,t.fields.push(n))}),e.each(o.difference(i,t.fields),function(e,t){t._trigger("reset")})}),this},_withoutReactualizingFormOptions:function(e){var t=this.actualizeOptions;this.actualizeOptions=function(){return this};var i=e();return this.actualizeOptions=t,i},_trigger:function(e){return this.trigger("form:"+e)}};var F=function(t,i,n,r,s){if(!/ParsleyField/.test(t.__class__))throw new Error("ParsleyField or ParsleyFieldMultiple instance expected");var a=window.Parsley._validatorRegistry.validators[i],o=new f(a);e.extend(this,{validator:o,name:i,requirements:n,priority:r||t.options[i+"Priority"]||o.priority,isDomConstraint:!0===s}),this._parseRequirements(t.options)},C=function(e){var t=e[0].toUpperCase();return t+e.slice(1)};F.prototype={validate:function(e,t){var i;return(i=this.validator).validate.apply(i,[e].concat(_toConsumableArray(this.requirementList),[t]))},_parseRequirements:function(e){var t=this;this.requirementList=this.validator.parseRequirements(this.requirements,function(i){return e[t.name+C(i)]})}};var $=function(t,i,n,r){this.__class__="ParsleyField",this.$element=e(t),"undefined"!=typeof r&&(this.parent=r),this.options=n,this.domOptions=i,this.constraints=[],this.constraintsByName={},this.validationResult=!0,this._bindConstraints()},x={pending:null,resolved:!0,rejected:!1};$.prototype={validate:function(t){arguments.length>=1&&!e.isPlainObject(t)&&(o.warnOnce("Calling validate on a parsley field without passing arguments as an object is deprecated."),t={options:t});var i=this.whenValidate(t);if(!i)return!0;switch(i.state()){case"pending":return null;case"resolved":return!0;case"rejected":return this.validationResult}},whenValidate:function(){var e,t=this,i=arguments.length<=0||void 0===arguments[0]?{}:arguments[0],n=i.force,r=i.group;return this.refreshConstraints(),!r||this._isInGroup(r)?(this.value=this.getValue(),this._trigger("validate"),(e=this.whenValid({force:n,value:this.value,_refreshed:!0}).always(function(){t._reflowUI()}).done(function(){t._trigger("success")}).fail(function(){t._trigger("error")}).always(function(){t._trigger("validated")})).pipe.apply(e,_toConsumableArray(this._pipeAccordingToValidationResult()))):void 0},hasConstraints:function(){return 0!==this.constraints.length},needsValidation:function(e){return"undefined"==typeof e&&(e=this.getValue()),!(!e.length&&!this._isRequired()&&"undefined"==typeof this.options.validateIfEmpty)},_isInGroup:function(t){return e.isArray(this.options.group)?-1!==e.inArray(t,this.options.group):this.options.group===t},isValid:function(t){if(arguments.length>=1&&!e.isPlainObject(t)){o.warnOnce("Calling isValid on a parsley field without passing arguments as an object is deprecated.");var i=_slice.call(arguments),n=i[0],r=i[1];t={force:n,value:r}}var s=this.whenValid(t);return s?x[s.state()]:!0},whenValid:function(){var t=this,i=arguments.length<=0||void 0===arguments[0]?{}:arguments[0],n=i.force,r=void 0===n?!1:n,s=i.value,a=i.group,l=i._refreshed;if(l||this.refreshConstraints(),!a||this._isInGroup(a)){if(this.validationResult=!0,!this.hasConstraints())return e.when();if("undefined"!=typeof s&&null!==s||(s=this.getValue()),!this.needsValidation(s)&&!0!==r)return e.when();var u=this._getGroupedConstraints(),d=[];return e.each(u,function(i,n){var r=o.all(e.map(n,function(e){return t._validateConstraint(s,e)}));return d.push(r),"rejected"===r.state()?!1:void 0}),o.all(d)}},_validateConstraint:function(t,i){var n=this,r=i.validate(t,this);return!1===r&&(r=e.Deferred().reject()),o.all([r]).fail(function(e){n.validationResult instanceof Array||(n.validationResult=[]),n.validationResult.push({assert:i,errorMessage:"string"==typeof e&&e})})},getValue:function(){var e;return e="function"==typeof this.options.value?this.options.value(this):"undefined"!=typeof this.options.value?this.options.value:this.$element.val(),"undefined"==typeof e||null===e?"":this._handleWhitespace(e)},refreshConstraints:function(){return this.actualizeOptions()._bindConstraints()},addConstraint:function(e,t,i,n){if(window.Parsley._validatorRegistry.validators[e]){var r=new F(this,e,t,i,n);"undefined"!==this.constraintsByName[r.name]&&this.removeConstraint(r.name),this.constraints.push(r),this.constraintsByName[r.name]=r}return this},removeConstraint:function(e){for(var t=0;t<this.constraints.length;t++)if(e===this.constraints[t].name){this.constraints.splice(t,1);break}return delete this.constraintsByName[e],this},updateConstraint:function(e,t,i){return this.removeConstraint(e).addConstraint(e,t,i)},_bindConstraints:function(){for(var e=[],t={},i=0;i<this.constraints.length;i++)!1===this.constraints[i].isDomConstraint&&(e.push(this.constraints[i]),t[this.constraints[i].name]=this.constraints[i]);this.constraints=e,this.constraintsByName=t;for(var n in this.options)this.addConstraint(n,this.options[n],void 0,!0);return this._bindHtml5Constraints()},_bindHtml5Constraints:function(){(this.$element.hasClass("required")||this.$element.attr("required"))&&this.addConstraint("required",!0,void 0,!0),"string"==typeof this.$element.attr("pattern")&&this.addConstraint("pattern",this.$element.attr("pattern"),void 0,!0),"undefined"!=typeof this.$element.attr("min")&&"undefined"!=typeof this.$element.attr("max")?this.addConstraint("range",[this.$element.attr("min"),this.$element.attr("max")],void 0,!0):"undefined"!=typeof this.$element.attr("min")?this.addConstraint("min",this.$element.attr("min"),void 0,!0):"undefined"!=typeof this.$element.attr("max")&&this.addConstraint("max",this.$element.attr("max"),void 0,!0),"undefined"!=typeof this.$element.attr("minlength")&&"undefined"!=typeof this.$element.attr("maxlength")?this.addConstraint("length",[this.$element.attr("minlength"),this.$element.attr("maxlength")],void 0,!0):"undefined"!=typeof this.$element.attr("minlength")?this.addConstraint("minlength",this.$element.attr("minlength"),void 0,!0):"undefined"!=typeof this.$element.attr("maxlength")&&this.addConstraint("maxlength",this.$element.attr("maxlength"),void 0,!0);var e=this.$element.attr("type");return"undefined"==typeof e?this:"number"===e?this.addConstraint("type",["number",{step:this.$element.attr("step"),base:this.$element.attr("min")||this.$element.attr("value")}],void 0,!0):/^(email|url|range)$/i.test(e)?this.addConstraint("type",e,void 0,!0):this},_isRequired:function(){return"undefined"==typeof this.constraintsByName.required?!1:!1!==this.constraintsByName.required.requirements},_trigger:function(e){return this.trigger("field:"+e)},_handleWhitespace:function(e){return!0===this.options.trimValue&&o.warnOnce('data-parsley-trim-value="true" is deprecated, please use data-parsley-whitespace="trim"'),"squish"===this.options.whitespace&&(e=e.replace(/\s{2,}/g," ")),"trim"!==this.options.whitespace&&"squish"!==this.options.whitespace&&!0!==this.options.trimValue||(e=o.trimString(e)),e},_getGroupedConstraints:function(){if(!1===this.options.priorityEnabled)return[this.constraints];for(var e=[],t={},i=0;i<this.constraints.length;i++){var n=this.constraints[i].priority;t[n]||e.push(t[n]=[]),t[n].push(this.constraints[i])}return e.sort(function(e,t){return t[0].priority-e[0].priority}),e}};var E=$,P=function(){this.__class__="ParsleyFieldMultiple"};P.prototype={addElement:function(e){return this.$elements.push(e),this},refreshConstraints:function(){var t;if(this.constraints=[],this.$element.is("select"))return this.actualizeOptions()._bindConstraints(),this;for(var i=0;i<this.$elements.length;i++)if(e("html").has(this.$elements[i]).length){t=this.$elements[i].data("ParsleyFieldMultiple").refreshConstraints().constraints;for(var n=0;n<t.length;n++)this.addConstraint(t[n].name,t[n].requirements,t[n].priority,t[n].isDomConstraint)}else this.$elements.splice(i,1);return this},getValue:function(){if("function"==typeof this.options.value)return this.options.value(this);if("undefined"!=typeof this.options.value)return this.options.value;if(this.$element.is("input[type=radio]"))return this._findRelated().filter(":checked").val()||"";if(this.$element.is("input[type=checkbox]")){var t=[];return this._findRelated().filter(":checked").each(function(){t.push(e(this).val())}),t}return this.$element.is("select")&&null===this.$element.val()?[]:this.$element.val()},_init:function(){return this.$elements=[this.$element],this}};var V=function(t,i,n){this.$element=e(t);var r=this.$element.data("Parsley");if(r)return"undefined"!=typeof n&&r.parent===window.Parsley&&(r.parent=n,r._resetOptions(r.options)),"object"==typeof i&&e.extend(r.options,i),r;if(!this.$element.length)throw new Error("You must bind Parsley on an existing element.");if("undefined"!=typeof n&&"ParsleyForm"!==n.__class__)throw new Error("Parent instance must be a ParsleyForm instance");return this.parent=n||window.Parsley,this.init(i)};V.prototype={init:function(e){return this.__class__="Parsley",this.__version__="2.4.4",this.__id__=o.generateID(),this._resetOptions(e),this.$element.is("form")||o.checkAttr(this.$element,this.options.namespace,"validate")&&!this.$element.is(this.options.inputs)?this.bind("parsleyForm"):this.isMultiple()?this.handleMultiple():this.bind("parsleyField")},isMultiple:function(){return this.$element.is("input[type=radio], input[type=checkbox]")||this.$element.is("select")&&"undefined"!=typeof this.$element.attr("multiple")},handleMultiple:function(){var t,i,n=this;if(this.options.multiple||("undefined"!=typeof this.$element.attr("name")&&this.$element.attr("name").length?this.options.multiple=t=this.$element.attr("name"):"undefined"!=typeof this.$element.attr("id")&&this.$element.attr("id").length&&(this.options.multiple=this.$element.attr("id"))),
this.$element.is("select")&&"undefined"!=typeof this.$element.attr("multiple"))return this.options.multiple=this.options.multiple||this.__id__,this.bind("parsleyFieldMultiple");if(!this.options.multiple)return o.warn("To be bound by Parsley, a radio, a checkbox and a multiple select input must have either a name or a multiple option.",this.$element),this;this.options.multiple=this.options.multiple.replace(/(:|\.|\[|\]|\{|\}|\$)/g,""),"undefined"!=typeof t&&e('input[name="'+t+'"]').each(function(t,i){e(i).is("input[type=radio], input[type=checkbox]")&&e(i).attr(n.options.namespace+"multiple",n.options.multiple)});for(var r=this._findRelated(),s=0;s<r.length;s++)if(i=e(r.get(s)).data("Parsley"),"undefined"!=typeof i){this.$element.data("ParsleyFieldMultiple")||i.addElement(this.$element);break}return this.bind("parsleyField",!0),i||this.bind("parsleyFieldMultiple")},bind:function(t,i){var n;switch(t){case"parsleyForm":n=e.extend(new w(this.$element,this.domOptions,this.options),new u,window.ParsleyExtend)._bindFields();break;case"parsleyField":n=e.extend(new E(this.$element,this.domOptions,this.options,this.parent),new u,window.ParsleyExtend);break;case"parsleyFieldMultiple":n=e.extend(new E(this.$element,this.domOptions,this.options,this.parent),new P,new u,window.ParsleyExtend)._init();break;default:throw new Error(t+"is not a supported Parsley type")}return this.options.multiple&&o.setAttr(this.$element,this.options.namespace,"multiple",this.options.multiple),"undefined"!=typeof i?(this.$element.data("ParsleyFieldMultiple",n),n):(this.$element.data("Parsley",n),n._actualizeTriggers(),n._trigger("init"),n)}};var M=e.fn.jquery.split(".");if(parseInt(M[0])<=1&&parseInt(M[1])<8)throw"The loaded version of jQuery is too old. Please upgrade to 1.8.x or better.";M.forEach||o.warn("Parsley requires ES5 to run properly. Please include https://github.com/es-shims/es5-shim");var O=e.extend(new u,{$element:e(document),actualizeOptions:null,_resetOptions:null,Factory:V,version:"2.4.4"});e.extend(E.prototype,y.Field,u.prototype),e.extend(w.prototype,y.Form,u.prototype),e.extend(V.prototype,u.prototype),e.fn.parsley=e.fn.psly=function(t){if(this.length>1){var i=[];return this.each(function(){i.push(e(this).parsley(t))}),i}return e(this).length?new V(this,t):void o.warn("You must bind Parsley on an existing element.")},"undefined"==typeof window.ParsleyExtend&&(window.ParsleyExtend={}),O.options=e.extend(o.objectCreate(l),window.ParsleyConfig),window.ParsleyConfig=O.options,window.Parsley=window.psly=O,window.ParsleyUtils=o;var A=window.Parsley._validatorRegistry=new m(window.ParsleyConfig.validators,window.ParsleyConfig.i18n);window.ParsleyValidator={},e.each("setLocale addCatalog addMessage addMessages getErrorMessage formatMessage addValidator updateValidator removeValidator".split(" "),function(t,i){window.Parsley[i]=e.proxy(A,i),window.ParsleyValidator[i]=function(){var e;return o.warnOnce("Accessing the method '"+i+"' through ParsleyValidator is deprecated. Simply call 'window.Parsley."+i+"(...)'"),(e=window.Parsley)[i].apply(e,arguments)}}),window.Parsley.UI=y,window.ParsleyUI={removeError:function(e,t,i){var n=!0!==i;return o.warnOnce("Accessing ParsleyUI is deprecated. Call 'removeError' on the instance directly. Please comment in issue 1073 as to your need to call this method."),e.removeError(t,{updateClass:n})},getErrorsMessages:function(e){return o.warnOnce("Accessing ParsleyUI is deprecated. Call 'getErrorsMessages' on the instance directly."),e.getErrorsMessages()}},e.each("addError updateError".split(" "),function(e,t){window.ParsleyUI[t]=function(e,i,n,r,s){var a=!0!==s;return o.warnOnce("Accessing ParsleyUI is deprecated. Call '"+t+"' on the instance directly. Please comment in issue 1073 as to your need to call this method."),e[t](i,{message:n,assert:r,updateClass:a})}}),!1!==window.ParsleyConfig.autoBind&&e(function(){e("[data-parsley-validate]").length&&e("[data-parsley-validate]").parsley()});var R=e({}),T=function(){o.warnOnce("Parsley's pubsub module is deprecated; use the 'on' and 'off' methods on parsley instances or window.Parsley")},q="parsley:";e.listen=function(e,n){var r;if(T(),"object"==typeof arguments[1]&&"function"==typeof arguments[2]&&(r=arguments[1],n=arguments[2]),"function"!=typeof n)throw new Error("Wrong parameters");window.Parsley.on(i(e),t(n,r))},e.listenTo=function(e,n,r){if(T(),!(e instanceof E||e instanceof w))throw new Error("Must give Parsley instance");if("string"!=typeof n||"function"!=typeof r)throw new Error("Wrong parameters");e.on(i(n),t(r))},e.unsubscribe=function(e,t){if(T(),"string"!=typeof e||"function"!=typeof t)throw new Error("Wrong arguments");window.Parsley.off(i(e),t.parsleyAdaptedCallback)},e.unsubscribeTo=function(e,t){if(T(),!(e instanceof E||e instanceof w))throw new Error("Must give Parsley instance");e.off(i(t))},e.unsubscribeAll=function(t){T(),window.Parsley.off(i(t)),e("form,input,textarea,select").each(function(){var n=e(this).data("Parsley");n&&n.off(i(t))})},e.emit=function(e,t){var n;T();var r=t instanceof E||t instanceof w,s=Array.prototype.slice.call(arguments,r?2:1);s.unshift(i(e)),r||(t=window.Parsley),(n=t).trigger.apply(n,_toConsumableArray(s))};e.extend(!0,O,{asyncValidators:{"default":{fn:function(e){return e.status>=200&&e.status<300},url:!1},reverse:{fn:function(e){return e.status<200||e.status>=300},url:!1}},addAsyncValidator:function(e,t,i,n){return O.asyncValidators[e]={fn:t,url:i||!1,options:n||{}},this}}),O.addValidator("remote",{requirementType:{"":"string",validator:"string",reverse:"boolean",options:"object"},validateString:function(t,i,n,r){var s,a,o={},l=n.validator||(!0===n.reverse?"reverse":"default");if("undefined"==typeof O.asyncValidators[l])throw new Error("Calling an undefined async validator: `"+l+"`");i=O.asyncValidators[l].url||i,i.indexOf("{value}")>-1?i=i.replace("{value}",encodeURIComponent(t)):o[r.$element.attr("name")||r.$element.attr("id")]=t;var u=e.extend(!0,n.options||{},O.asyncValidators[l].options);s=e.extend(!0,{},{url:i,data:o,type:"GET"},u),r.trigger("field:ajaxoptions",r,s),a=e.param(s),"undefined"==typeof O._remoteCache&&(O._remoteCache={});var d=O._remoteCache[a]=O._remoteCache[a]||e.ajax(s),h=function(){var t=O.asyncValidators[l].fn.call(r,d,i,n);return t||(t=e.Deferred().reject()),e.when(t)};return d.then(h,h)},priority:-1}),O.on("form:submit",function(){O._remoteCache={}}),window.ParsleyExtend.addAsyncValidator=function(){return ParsleyUtils.warnOnce("Accessing the method `addAsyncValidator` through an instance is deprecated. Simply call `Parsley.addAsyncValidator(...)`"),O.addAsyncValidator.apply(O,arguments)},O.addMessages("en",{defaultMessage:"This value seems to be invalid.",type:{email:"This value should be a valid email.",url:"This value should be a valid url.",number:"This value should be a valid number.",integer:"This value should be a valid integer.",digits:"This value should be digits.",alphanum:"This value should be alphanumeric."},notblank:"This value should not be blank.",required:"This value is required.",pattern:"This value seems to be invalid.",min:"This value should be greater than or equal to %s.",max:"This value should be lower than or equal to %s.",range:"This value should be between %s and %s.",minlength:"This value is too short. It should have %s characters or more.",maxlength:"This value is too long. It should have %s characters or fewer.",length:"This value length is invalid. It should be between %s and %s characters long.",mincheck:"You must select at least %s choices.",maxcheck:"You must select %s choices or fewer.",check:"You must select between %s and %s choices.",equalto:"This value should be the same."}),O.setLocale("en");var D=new n;D.install();var I=O;return I});
//# sourceMappingURL=parsley.min.js.map

/*!
 * bootstrap-star-rating v4.0.2
 * http://plugins.krajee.com/star-rating
 *
 * Author: Kartik Visweswaran
 * Copyright: 2014 - 2016, Kartik Visweswaran, Krajee.com
 *
 * Licensed under the BSD 3-Clause
 * https://github.com/kartik-v/bootstrap-star-rating/blob/master/LICENSE.md
 */
(function (factory) {
    "use strict";
    //noinspection JSUnresolvedVariable
    if (typeof define === 'function' && define.amd) { // jshint ignore:line
        // AMD. Register as an anonymous module.
        define(['jquery'], factory); // jshint ignore:line
    } else { // noinspection JSUnresolvedVariable
        if (typeof module === 'object' && module.exports) { // jshint ignore:line
            // Node/CommonJS
            // noinspection JSUnresolvedVariable
            module.exports = factory(require('jquery')); // jshint ignore:line
        } else {
            // Browser globals
            factory(window.jQuery);
        }
    }
}(function ($) {
    "use strict";

    $.fn.ratingLocales = {};
    $.fn.ratingThemes = {};

    var NAMESPACE, DEFAULT_MIN, DEFAULT_MAX, DEFAULT_STEP, isEmpty, getCss, addCss, getDecimalPlaces, applyPrecision,
        handler, Rating;
    NAMESPACE = '.rating';
    DEFAULT_MIN = 0;
    DEFAULT_MAX = 5;
    DEFAULT_STEP = 0.5;
    isEmpty = function (value, trim) {
        return value === null || value === undefined || value.length === 0 || (trim && $.trim(value) === '');
    };
    getCss = function (condition, css) {
        return condition ? ' ' + css : '';
    };
    addCss = function ($el, css) {
        $el.removeClass(css).addClass(css);
    };
    getDecimalPlaces = function (num) {
        var match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
        return !match ? 0 : Math.max(0, (match[1] ? match[1].length : 0) - (match[2] ? +match[2] : 0));
    };
    applyPrecision = function (val, precision) {
        return parseFloat(val.toFixed(precision));
    };
    handler = function ($el, event, callback, skipNS) {
        var ev = skipNS ? event : event.split(' ').join(NAMESPACE + ' ') + NAMESPACE;
        $el.off(ev).on(ev, callback);
    };
    Rating = function (element, options) {
        var self = this;
        self.$element = $(element);
        self._init(options);
    };
    Rating.prototype = {
        constructor: Rating,
        _parseAttr: function (vattr, options) {
            var self = this, $el = self.$element, elType = $el.attr('type'), finalVal, val, chk, out;
            if (elType === 'range' || elType === 'number') {
                val = options[vattr] || $el.data(vattr) || $el.attr(vattr);
                switch (vattr) {
                    case 'min':
                        chk = DEFAULT_MIN;
                        break;
                    case 'max':
                        chk = DEFAULT_MAX;
                        break;
                    default:
                        chk = DEFAULT_STEP;
                }
                finalVal = isEmpty(val) ? chk : val;
                out = parseFloat(finalVal);
            } else {
                out = parseFloat(options[vattr]);
            }
            return isNaN(out) ? chk : out;
        },
        _setDefault: function (key, val) {
            var self = this;
            if (isEmpty(self[key])) {
                self[key] = val;
            }
        },
        _listenClick: function (e, callback) {
            e.stopPropagation();
            e.preventDefault();
            if (e.handled !== true) {
                callback(e);
                e.handled = true;
            } else {
                return false;
            }
        },
        _starClick: function (e) {
            var self = this, pos;
            self._listenClick(e, function (ev) {
                if (self.inactive) {
                    return false;
                }
                pos = self._getTouchPosition(ev);
                self._setStars(pos);
                self.$element.trigger('change').trigger('rating.change', [self.$element.val(), self._getCaption()]);
                self.starClicked = true;
            });
        },
        _starMouseMove: function (e) {
            var self = this, pos, out;
            if (!self.hoverEnabled || self.inactive || (e && e.isDefaultPrevented())) {
                return;
            }
            self.starClicked = false;
            pos = self._getTouchPosition(e);
            out = self.calculate(pos);
            self._toggleHover(out);
            self.$element.trigger('rating.hover', [out.val, out.caption, 'stars']);
        },
        _starMouseLeave: function (e) {
            var self = this, out;
            if (!self.hoverEnabled || self.inactive || self.starClicked || (e && e.isDefaultPrevented())) {
                return;
            }
            out = self.cache;
            self._toggleHover(out);
            self.$element.trigger('rating.hoverleave', ['stars']);
        },
        _clearClick: function (e) {
            var self = this;
            self._listenClick(e, function () {
                if (!self.inactive) {
                    self.clear();
                    self.clearClicked = true;
                }
            });
        },
        _clearMouseMove: function (e) {
            var self = this, caption, val, width, out;
            if (!self.hoverEnabled || self.inactive || !self.hoverOnClear || (e && e.isDefaultPrevented())) {
                return;
            }
            self.clearClicked = false;
            caption = '<span class="' + self.clearCaptionClass + '">' + self.clearCaption + '</span>';
            val = self.clearValue;
            width = self.getWidthFromValue(val) || 0;
            out = {caption: caption, width: width, val: val};
            self._toggleHover(out);
            self.$element.trigger('rating.hover', [val, caption, 'clear']);
        },
        _clearMouseLeave: function (e) {
            var self = this, out;
            if (!self.hoverEnabled || self.inactive || self.clearClicked || !self.hoverOnClear || (e && e.isDefaultPrevented())) {
                return;
            }
            out = self.cache;
            self._toggleHover(out);
            self.$element.trigger('rating.hoverleave', ['clear']);
        },
        _resetForm: function (e) {
            var self = this;
            if (e && e.isDefaultPrevented()) {
                return;
            }
            if (!self.inactive) {
                self.reset();
            }
        },
        _setTouch: function (e, flag) {
            //noinspection JSUnresolvedVariable
            var self = this, ev, touches, pos, out, caption, w, width, isTouchCapable = 'ontouchstart' in window ||
                (window.DocumentTouch && document instanceof window.DocumentTouch);
            if (!isTouchCapable || self.inactive) {
                return;
            }
            ev = e.originalEvent;
            //noinspection JSUnresolvedVariable
            touches = !isEmpty(ev.touches) ? ev.touches : ev.changedTouches;
            pos = self._getTouchPosition(touches[0]);
            if (flag) {
                self._setStars(pos);
                self.$element.trigger('change').trigger('rating.change', [self.$element.val(), self._getCaption()]);
                self.starClicked = true;
            } else {
                out = self.calculate(pos);
                caption = out.val <= self.clearValue ? self.fetchCaption(self.clearValue) : out.caption;
                w = self.getWidthFromValue(self.clearValue);
                width = out.val <= self.clearValue ? w + '%' : out.width;
                self._setCaption(caption);
                self.$filledStars.css('width', width);
            }
        },
        _initTouch: function (e) {
            var self = this, flag = (e.type === "touchend");
            self._setTouch(e, flag);
        },
        _initSlider: function (options) {
            var self = this;
            if (isEmpty(self.$element.val())) {
                self.$element.val(0);
            }
            self.initialValue = self.$element.val();
            self._setDefault('min', self._parseAttr('min', options));
            self._setDefault('max', self._parseAttr('max', options));
            self._setDefault('step', self._parseAttr('step', options));
            if (isNaN(self.min) || isEmpty(self.min)) {
                self.min = DEFAULT_MIN;
            }
            if (isNaN(self.max) || isEmpty(self.max)) {
                self.max = DEFAULT_MAX;
            }
            if (isNaN(self.step) || isEmpty(self.step) || self.step === 0) {
                self.step = DEFAULT_STEP;
            }
            self.diff = self.max - self.min;
        },
        _initHighlight: function (v) {
            var self = this, w, cap = self._getCaption();
            if (!v) {
                v = self.$element.val();
            }
            w = self.getWidthFromValue(v) + '%';
            self.$filledStars.width(w);
            self.cache = {caption: cap, width: w, val: v};
        },
        _getContainerCss: function () {
            var self = this;
            return 'rating-container' +
                getCss(self.theme, 'theme-' + self.theme) +
                getCss(self.rtl, 'rating-rtl') +
                getCss(self.size, 'rating-' + self.size) +
                getCss(self.animate, 'rating-animate') +
                getCss(self.disabled || self.readonly, 'rating-disabled') +
                getCss(self.containerClass, self.containerClass);
        },
        _checkDisabled: function () {
            var self = this, $el = self.$element, opts = self.options;
            self.disabled = opts.disabled === undefined ? $el.attr('disabled') || false : opts.disabled;
            self.readonly = opts.readonly === undefined ? $el.attr('readonly') || false : opts.readonly;
            self.inactive = (self.disabled || self.readonly);
            $el.attr({disabled: self.disabled, readonly: self.readonly});
        },
        _addContent: function (type, content) {
            var self = this, $container = self.$container, isClear = type === 'clear';
            if (self.rtl) {
                return isClear ? $container.append(content) : $container.prepend(content);
            } else {
                return isClear ? $container.prepend(content) : $container.append(content);
            }
        },
        _generateRating: function () {
            var self = this, $el = self.$element, $rating, $container, w;
            $container = self.$container = $(document.createElement("div")).insertBefore($el);
            addCss($container, self._getContainerCss());
            self.$rating = $rating = $(document.createElement("div")).attr('class', 'rating').appendTo($container)
                .append(self._getStars('empty')).append(self._getStars('filled'));
            self.$emptyStars = $rating.find('.empty-stars');
            self.$filledStars = $rating.find('.filled-stars');
            self._renderCaption();
            self._renderClear();
            self._initHighlight();
            $container.append($el);
            if (self.rtl) {
                w = Math.max(self.$emptyStars.outerWidth(), self.$filledStars.outerWidth());
                self.$emptyStars.width(w);
            }
        },
        _getCaption: function () {
            var self = this;
            return self.$caption && self.$caption.length ? self.$caption.html() : self.defaultCaption;
        },
        _setCaption: function (content) {
            var self = this;
            if (self.$caption && self.$caption.length) {
                self.$caption.html(content);
            }
        },
        _renderCaption: function () {
            var self = this, val = self.$element.val(), html, $cap = self.captionElement ? $(self.captionElement) : '';
            if (!self.showCaption) {
                return;
            }
            html = self.fetchCaption(val);
            if ($cap && $cap.length) {
                addCss($cap, 'caption');
                $cap.html(html);
                self.$caption = $cap;
                return;
            }
            self._addContent('caption', '<div class="caption">' + html + '</div>');
            self.$caption = self.$container.find(".caption");
        },
        _renderClear: function () {
            var self = this, css, $clr = self.clearElement ? $(self.clearElement) : '';
            if (!self.showClear) {
                return;
            }
            css = self._getClearClass();
            if ($clr.length) {
                addCss($clr, css);
                $clr.attr({"title": self.clearButtonTitle}).html(self.clearButton);
                self.$clear = $clr;
                return;
            }
            self._addContent('clear',
                '<div class="' + css + '" title="' + self.clearButtonTitle + '">' + self.clearButton + '</div>');
            self.$clear = self.$container.find('.' + self.clearButtonBaseClass);
        },
        _getClearClass: function () {
            return this.clearButtonBaseClass + ' ' + ((this.inactive) ? '' : this.clearButtonActiveClass);
        },
        _getTouchPosition: function (e) {
            var pageX = isEmpty(e.pageX) ? e.originalEvent.touches[0].pageX : e.pageX;
            return pageX - this.$rating.offset().left;
        },
        _toggleHover: function (out) {
            var self = this, w, width, caption;
            if (!out) {
                return;
            }
            if (self.hoverChangeStars) {
                w = self.getWidthFromValue(self.clearValue);
                width = out.val <= self.clearValue ? w + '%' : out.width;
                self.$filledStars.css('width', width);
            }
            if (self.hoverChangeCaption) {
                caption = out.val <= self.clearValue ? self.fetchCaption(self.clearValue) : out.caption;
                if (caption) {
                    self._setCaption(caption + '');
                }
            }
        },
        _init: function (options) {
            var self = this, $el = self.$element.addClass('hide');
            self.options = options;
            $.each(options, function (key, value) {
                self[key] = value;
            });
            if (self.rtl || $el.attr('dir') === 'rtl') {
                self.rtl = true;
                $el.attr('dir', 'rtl');
            }
            self.starClicked = false;
            self.clearClicked = false;
            self._initSlider(options);
            self._checkDisabled();
            if (self.displayOnly) {
                self.inactive = true;
                self.showClear = false;
                self.showCaption = false;
            }
            self._generateRating();
            self._listen();
            return $el.removeClass('rating-loading');
        },
        _listen: function () {
            var self = this, $el = self.$element, $form = $el.closest('form'), $rating = self.$rating,
                $clear = self.$clear;
            handler($rating, 'touchstart touchmove touchend', $.proxy(self._initTouch, self));
            handler($rating, 'click touchstart', $.proxy(self._starClick, self));
            handler($rating, 'mousemove', $.proxy(self._starMouseMove, self));
            handler($rating, 'mouseleave', $.proxy(self._starMouseLeave, self));
            if (self.showClear && $clear.length) {
                handler($clear, 'click touchstart', $.proxy(self._clearClick, self));
                handler($clear, 'mousemove', $.proxy(self._clearMouseMove, self));
                handler($clear, 'mouseleave', $.proxy(self._clearMouseLeave, self));
            }
            if ($form.length) {
                handler($form, 'reset', $.proxy(self._resetForm, self));
            }
            return $el;
        },
        _getStars: function (type) {
            var self = this, stars = '<span class="' + type + '-stars">', i;
            for (i = 1; i <= self.stars; i++) {
                stars += '<span class="star">' + self[type + 'Star'] + '</span>';
            }
            return stars + '</span>';
        },
        _setStars: function (pos) {
            var self = this, out = arguments.length ? self.calculate(pos) : self.calculate(), $el = self.$element;
            $el.val(out.val);
            self.$filledStars.css('width', out.width);
            self._setCaption(out.caption);
            self.cache = out;
            return $el;
        },
        showStars: function (val) {
            var self = this, v = parseFloat(val);
            self.$element.val(isNaN(v) ? self.clearValue : v);
            return self._setStars();
        },
        calculate: function (pos) {
            var self = this, defaultVal = isEmpty(self.$element.val()) ? 0 : self.$element.val(),
                val = arguments.length ? self.getValueFromPosition(pos) : defaultVal,
                caption = self.fetchCaption(val), width = self.getWidthFromValue(val);
            width += '%';
            return {caption: caption, width: width, val: val};
        },
        getValueFromPosition: function (pos) {
            var self = this, precision = getDecimalPlaces(self.step), val, factor, maxWidth = self.$rating.width();
            factor = (self.diff * pos) / (maxWidth * self.step);
            factor = self.rtl ? Math.floor(factor) : Math.ceil(factor);
            val = applyPrecision(parseFloat(self.min + factor * self.step), precision);
            val = Math.max(Math.min(val, self.max), self.min);
            return self.rtl ? (self.max - val) : val;
        },
        getWidthFromValue: function (val) {
            var self = this, min = self.min, max = self.max, factor, $r = self.$emptyStars, w;
            if (!val || val <= min || min === max) {
                return 0;
            }
            w = $r.outerWidth();
            factor = w ? $r.width() / w : 1;
            if (val >= max) {
                return 100;
            }
            return (val - min) * factor * 100 / (max - min);
        },
        fetchCaption: function (rating) {
            var self = this, val = parseFloat(rating) || self.clearValue, css, cap, capVal, cssVal, caption,
                vCap = self.starCaptions, vCss = self.starCaptionClasses;
            if (val && val !== self.clearValue) {
                val = applyPrecision(val, getDecimalPlaces(self.step));
            }
            cssVal = typeof vCss === "function" ? vCss(val) : vCss[val];
            capVal = typeof vCap === "function" ? vCap(val) : vCap[val];
            cap = isEmpty(capVal) ? self.defaultCaption.replace(/\{rating}/g, val) : capVal;
            css = isEmpty(cssVal) ? self.clearCaptionClass : cssVal;
            caption = (val === self.clearValue) ? self.clearCaption : cap;
            return '<span class="' + css + '">' + caption + '</span>';
        },
        destroy: function () {
            var self = this, $el = self.$element;
            if (!isEmpty(self.$container)) {
                self.$container.before($el).remove();
            }
            $.removeData($el.get(0));
            return $el.off('rating').removeClass('hide');
        },
        create: function (options) {
            var self = this, opts = options || self.options || {};
            return self.destroy().rating(opts);
        },
        clear: function () {
            var self = this, title = '<span class="' + self.clearCaptionClass + '">' + self.clearCaption + '</span>';
            if (!self.inactive) {
                self._setCaption(title);
            }
            return self.showStars(self.clearValue).trigger('change').trigger('rating.clear');
        },
        reset: function () {
            var self = this;
            return self.showStars(self.initialValue).trigger('rating.reset');
        },
        update: function (val) {
            var self = this;
            return arguments.length ? self.showStars(val) : self.$element;
        },
        refresh: function (options) {
            var self = this, $el = self.$element;
            if (!options) {
                return $el;
            }
            return self.destroy().rating($.extend(true, self.options, options)).trigger('rating.refresh');
        }
    };

    $.fn.rating = function (option) {
        var args = Array.apply(null, arguments), retvals = [];
        args.shift();
        this.each(function () {
            var self = $(this), data = self.data('rating'), options = typeof option === 'object' && option,
                theme = options.theme || self.data('theme'), lang = options.language || self.data('language') || 'en',
                thm = {}, loc = {}, opts;

            if (!data) {
                if (theme) {
                    thm = $.fn.ratingThemes[theme] || {};
                }
                if (lang !== 'en' && !isEmpty($.fn.ratingLocales[lang])) {
                    loc = $.fn.ratingLocales[lang];
                }
                opts = $.extend(true, {}, $.fn.rating.defaults, thm, $.fn.ratingLocales.en, loc, options, self.data());
                data = new Rating(this, opts);
                self.data('rating', data);
            }

            if (typeof option === 'string') {
                retvals.push(data[option].apply(data, args));
            }
        });
        switch (retvals.length) {
            case 0:
                return this;
            case 1:
                return retvals[0] === undefined ? this : retvals[0];
            default:
                return retvals;
        }
    };

    $.fn.rating.defaults = {
        theme: '',
        language: 'en',
        stars: 5,
        filledStar: '<i class="glyphicon glyphicon-star"></i>',
        emptyStar: '<i class="glyphicon glyphicon-star-empty"></i>',
        containerClass: '',
        size: 'md',
        animate: true,
        displayOnly: false,
        rtl: false,
        showClear: true,
        showCaption: true,
        starCaptionClasses: {
            0.5: 'label label-danger',
            1: 'label label-danger',
            1.5: 'label label-warning',
            2: 'label label-warning',
            2.5: 'label label-info',
            3: 'label label-info',
            3.5: 'label label-primary',
            4: 'label label-primary',
            4.5: 'label label-success',
            5: 'label label-success'
        },
        clearButton: '<i class="glyphicon glyphicon-minus-sign"></i>',
        clearButtonBaseClass: 'clear-rating',
        clearButtonActiveClass: 'clear-rating-active',
        clearCaptionClass: 'label label-default',
        clearValue: null,
        captionElement: null,
        clearElement: null,
        hoverEnabled: true,
        hoverChangeCaption: true,
        hoverChangeStars: true,
        hoverOnClear: true
    };

    $.fn.ratingLocales.en = {
        defaultCaption: '{rating} Stars',
        starCaptions: {
            0.5: 'Half Star',
            1: 'One Star',
            1.5: 'One & Half Star',
            2: 'Two Stars',
            2.5: 'Two & Half Stars',
            3: 'Three Stars',
            3.5: 'Three & Half Stars',
            4: 'Four Stars',
            4.5: 'Four & Half Stars',
            5: 'Five Stars'
        },
        clearButtonTitle: 'Clear',
        clearCaption: 'Not Rated'
    };

    $.fn.rating.Constructor = Rating;

    /**
     * Convert automatically inputs with class 'rating' into Krajee's star rating control.
     */
    $(document).ready(function () {
        var $input = $('input.rating');
        if ($input.length) {
            $input.removeClass('rating-loading').addClass('rating-loading').rating();
        }
    });
}));
/*! version : 4.17.43
 =========================================================
 bootstrap-datetimejs
 https://github.com/Eonasdan/bootstrap-datetimepicker
 Copyright (c) 2015 Jonathan Peterson
 =========================================================
 */
/*
 The MIT License (MIT)

 Copyright (c) 2015 Jonathan Peterson

 Permission is hereby granted, free of charge, to any person obtaining a copy
 of this software and associated documentation files (the "Software"), to deal
 in the Software without restriction, including without limitation the rights
 to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 copies of the Software, and to permit persons to whom the Software is
 furnished to do so, subject to the following conditions:

 The above copyright notice and this permission notice shall be included in
 all copies or substantial portions of the Software.

 THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 THE SOFTWARE.
 */
/*global define:false */
/*global exports:false */
/*global require:false */
/*global jQuery:false */
/*global moment:false */
!function(a){"use strict";if("function"==typeof define&&define.amd)
// AMD is used - Register as an anonymous module.
define(["jquery","moment"],a);else if("object"==typeof exports)module.exports=a(require("jquery"),require("moment"));else{
// Neither AMD nor CommonJS used. Use global variables.
if("undefined"==typeof jQuery)throw"bootstrap-datetimepicker requires jQuery to be loaded first";if("undefined"==typeof moment)throw"bootstrap-datetimepicker requires Moment.js to be loaded first";a(jQuery,moment)}}(function(a,b){"use strict";if(!b)throw new Error("bootstrap-datetimepicker requires Moment.js to be loaded first");var c=function(c,d){var e,f,g,h,i,j,k,l={},m=!0,n=!1,o=!1,p=0,q=[{clsName:"days",navFnc:"M",navStep:1},{clsName:"months",navFnc:"y",navStep:1},{clsName:"years",navFnc:"y",navStep:10},{clsName:"decades",navFnc:"y",navStep:100}],r=["days","months","years","decades"],s=["top","bottom","auto"],t=["left","right","auto"],u=["default","top","bottom"],v={up:38,38:"up",down:40,40:"down",left:37,37:"left",right:39,39:"right",tab:9,9:"tab",escape:27,27:"escape",enter:13,13:"enter",pageUp:33,33:"pageUp",pageDown:34,34:"pageDown",shift:16,16:"shift",control:17,17:"control",space:32,32:"space",t:84,84:"t",delete:46,46:"delete"},w={},/********************************************************************************
             *
             * Private functions
             *
             ********************************************************************************/
x=function(){return void 0!==b.tz&&void 0!==d.timeZone&&null!==d.timeZone&&""!==d.timeZone},y=function(a){var c;return c=void 0===a||null===a?b():x()?b.tz(a,j,d.useStrict,d.timeZone):b(a,j,d.useStrict),x()&&c.tz(d.timeZone),c},z=function(a){if("string"!=typeof a||a.length>1)throw new TypeError("isEnabled expects a single character string parameter");switch(a){case"y":return i.indexOf("Y")!==-1;case"M":return i.indexOf("M")!==-1;case"d":return i.toLowerCase().indexOf("d")!==-1;case"h":case"H":return i.toLowerCase().indexOf("h")!==-1;case"m":return i.indexOf("m")!==-1;case"s":return i.indexOf("s")!==-1;default:return!1}},A=function(){return z("h")||z("m")||z("s")},B=function(){return z("y")||z("M")||z("d")},C=function(){var b=a("<thead>").append(a("<tr>").append(a("<th>").addClass("prev").attr("data-action","previous").append(a("<span>").addClass(d.icons.previous))).append(a("<th>").addClass("picker-switch").attr("data-action","pickerSwitch").attr("colspan",d.calendarWeeks?"6":"5")).append(a("<th>").addClass("next").attr("data-action","next").append(a("<span>").addClass(d.icons.next)))),c=a("<tbody>").append(a("<tr>").append(a("<td>").attr("colspan",d.calendarWeeks?"8":"7")));return[a("<div>").addClass("datepicker-days").append(a("<table>").addClass("table-condensed").append(b).append(a("<tbody>"))),a("<div>").addClass("datepicker-months").append(a("<table>").addClass("table-condensed").append(b.clone()).append(c.clone())),a("<div>").addClass("datepicker-years").append(a("<table>").addClass("table-condensed").append(b.clone()).append(c.clone())),a("<div>").addClass("datepicker-decades").append(a("<table>").addClass("table-condensed").append(b.clone()).append(c.clone()))]},D=function(){var b=a("<tr>"),c=a("<tr>"),e=a("<tr>");return z("h")&&(b.append(a("<td>").append(a("<a>").attr({href:"#",tabindex:"-1",title:d.tooltips.incrementHour}).addClass("btn").attr("data-action","incrementHours").append(a("<span>").addClass(d.icons.up)))),c.append(a("<td>").append(a("<span>").addClass("timepicker-hour").attr({"data-time-component":"hours",title:d.tooltips.pickHour}).attr("data-action","showHours"))),e.append(a("<td>").append(a("<a>").attr({href:"#",tabindex:"-1",title:d.tooltips.decrementHour}).addClass("btn").attr("data-action","decrementHours").append(a("<span>").addClass(d.icons.down))))),z("m")&&(z("h")&&(b.append(a("<td>").addClass("separator")),c.append(a("<td>").addClass("separator").html(":")),e.append(a("<td>").addClass("separator"))),b.append(a("<td>").append(a("<a>").attr({href:"#",tabindex:"-1",title:d.tooltips.incrementMinute}).addClass("btn").attr("data-action","incrementMinutes").append(a("<span>").addClass(d.icons.up)))),c.append(a("<td>").append(a("<span>").addClass("timepicker-minute").attr({"data-time-component":"minutes",title:d.tooltips.pickMinute}).attr("data-action","showMinutes"))),e.append(a("<td>").append(a("<a>").attr({href:"#",tabindex:"-1",title:d.tooltips.decrementMinute}).addClass("btn").attr("data-action","decrementMinutes").append(a("<span>").addClass(d.icons.down))))),z("s")&&(z("m")&&(b.append(a("<td>").addClass("separator")),c.append(a("<td>").addClass("separator").html(":")),e.append(a("<td>").addClass("separator"))),b.append(a("<td>").append(a("<a>").attr({href:"#",tabindex:"-1",title:d.tooltips.incrementSecond}).addClass("btn").attr("data-action","incrementSeconds").append(a("<span>").addClass(d.icons.up)))),c.append(a("<td>").append(a("<span>").addClass("timepicker-second").attr({"data-time-component":"seconds",title:d.tooltips.pickSecond}).attr("data-action","showSeconds"))),e.append(a("<td>").append(a("<a>").attr({href:"#",tabindex:"-1",title:d.tooltips.decrementSecond}).addClass("btn").attr("data-action","decrementSeconds").append(a("<span>").addClass(d.icons.down))))),h||(b.append(a("<td>").addClass("separator")),c.append(a("<td>").append(a("<button>").addClass("btn btn-primary").attr({"data-action":"togglePeriod",tabindex:"-1",title:d.tooltips.togglePeriod}))),e.append(a("<td>").addClass("separator"))),a("<div>").addClass("timepicker-picker").append(a("<table>").addClass("table-condensed").append([b,c,e]))},E=function(){var b=a("<div>").addClass("timepicker-hours").append(a("<table>").addClass("table-condensed")),c=a("<div>").addClass("timepicker-minutes").append(a("<table>").addClass("table-condensed")),d=a("<div>").addClass("timepicker-seconds").append(a("<table>").addClass("table-condensed")),e=[D()];return z("h")&&e.push(b),z("m")&&e.push(c),z("s")&&e.push(d),e},F=function(){var b=[];return d.showTodayButton&&b.push(a("<td>").append(a("<a>").attr({"data-action":"today",title:d.tooltips.today}).append(a("<span>").addClass(d.icons.today)))),!d.sideBySide&&B()&&A()&&b.push(a("<td>").append(a("<a>").attr({"data-action":"togglePicker",title:d.tooltips.selectTime}).append(a("<span>").addClass(d.icons.time)))),d.showClear&&b.push(a("<td>").append(a("<a>").attr({"data-action":"clear",title:d.tooltips.clear}).append(a("<span>").addClass(d.icons.clear)))),d.showClose&&b.push(a("<td>").append(a("<a>").attr({"data-action":"close",title:d.tooltips.close}).append(a("<span>").addClass(d.icons.close)))),a("<table>").addClass("table-condensed").append(a("<tbody>").append(a("<tr>").append(b)))},G=function(){var b=a("<div>").addClass("bootstrap-datetimepicker-widget dropdown-menu"),c=a("<div>").addClass("datepicker").append(C()),e=a("<div>").addClass("timepicker").append(E()),f=a("<ul>").addClass("list-unstyled"),g=a("<li>").addClass("picker-switch"+(d.collapse?" accordion-toggle":"")).append(F());return d.inline&&b.removeClass("dropdown-menu"),h&&b.addClass("usetwentyfour"),z("s")&&!h&&b.addClass("wider"),d.sideBySide&&B()&&A()?(b.addClass("timepicker-sbs"),"top"===d.toolbarPlacement&&b.append(g),b.append(a("<div>").addClass("row").append(c.addClass("col-md-6")).append(e.addClass("col-md-6"))),"bottom"===d.toolbarPlacement&&b.append(g),b):("top"===d.toolbarPlacement&&f.append(g),B()&&f.append(a("<li>").addClass(d.collapse&&A()?"collapse in":"").append(c)),"default"===d.toolbarPlacement&&f.append(g),A()&&f.append(a("<li>").addClass(d.collapse&&B()?"collapse":"").append(e)),"bottom"===d.toolbarPlacement&&f.append(g),b.append(f))},H=function(){var b,e={};return b=c.is("input")||d.inline?c.data():c.find("input").data(),b.dateOptions&&b.dateOptions instanceof Object&&(e=a.extend(!0,e,b.dateOptions)),a.each(d,function(a){var c="date"+a.charAt(0).toUpperCase()+a.slice(1);void 0!==b[c]&&(e[a]=b[c])}),e},I=function(){var b,e=(n||c).position(),f=(n||c).offset(),g=d.widgetPositioning.vertical,h=d.widgetPositioning.horizontal;if(d.widgetParent)b=d.widgetParent.append(o);else if(c.is("input"))b=c.after(o).parent();else{if(d.inline)return void(b=c.append(o));b=c,c.children().first().after(o)}if(
// Top and bottom logic
"auto"===g&&(g=f.top+1.5*o.height()>=a(window).height()+a(window).scrollTop()&&o.height()+c.outerHeight()<f.top?"top":"bottom"),
// Left and right logic
"auto"===h&&(h=b.width()<f.left+o.outerWidth()/2&&f.left+o.outerWidth()>a(window).width()?"right":"left"),"top"===g?o.addClass("top").removeClass("bottom"):o.addClass("bottom").removeClass("top"),"right"===h?o.addClass("pull-right"):o.removeClass("pull-right"),
// find the first parent element that has a relative css positioning
"relative"!==b.css("position")&&(b=b.parents().filter(function(){return"relative"===a(this).css("position")}).first()),0===b.length)throw new Error("datetimepicker component should be placed within a relative positioned container");o.css({top:"top"===g?"auto":e.top+c.outerHeight(),bottom:"top"===g?b.outerHeight()-(b===c?0:e.top):"auto",left:"left"===h?b===c?0:e.left:"auto",right:"left"===h?"auto":b.outerWidth()-c.outerWidth()-(b===c?0:e.left)})},J=function(a){"dp.change"===a.type&&(a.date&&a.date.isSame(a.oldDate)||!a.date&&!a.oldDate)||c.trigger(a)},K=function(a){"y"===a&&(a="YYYY"),J({type:"dp.update",change:a,viewDate:f.clone()})},L=function(a){o&&(a&&(k=Math.max(p,Math.min(3,k+a))),o.find(".datepicker > div").hide().filter(".datepicker-"+q[k].clsName).show())},M=function(){var b=a("<tr>"),c=f.clone().startOf("w").startOf("d");for(d.calendarWeeks===!0&&b.append(a("<th>").addClass("cw").text("#"));c.isBefore(f.clone().endOf("w"));)b.append(a("<th>").addClass("dow").text(c.format("dd"))),c.add(1,"d");o.find(".datepicker-days thead").append(b)},N=function(a){return d.disabledDates[a.format("YYYY-MM-DD")]===!0},O=function(a){return d.enabledDates[a.format("YYYY-MM-DD")]===!0},P=function(a){return d.disabledHours[a.format("H")]===!0},Q=function(a){return d.enabledHours[a.format("H")]===!0},R=function(b,c){if(!b.isValid())return!1;if(d.disabledDates&&"d"===c&&N(b))return!1;if(d.enabledDates&&"d"===c&&!O(b))return!1;if(d.minDate&&b.isBefore(d.minDate,c))return!1;if(d.maxDate&&b.isAfter(d.maxDate,c))return!1;if(d.daysOfWeekDisabled&&"d"===c&&d.daysOfWeekDisabled.indexOf(b.day())!==-1)return!1;if(d.disabledHours&&("h"===c||"m"===c||"s"===c)&&P(b))return!1;if(d.enabledHours&&("h"===c||"m"===c||"s"===c)&&!Q(b))return!1;if(d.disabledTimeIntervals&&("h"===c||"m"===c||"s"===c)){var e=!1;if(a.each(d.disabledTimeIntervals,function(){if(b.isBetween(this[0],this[1]))return e=!0,!1}),e)return!1}return!0},S=function(){for(var b=[],c=f.clone().startOf("y").startOf("d");c.isSame(f,"y");)b.push(a("<span>").attr("data-action","selectMonth").addClass("month").text(c.format("MMM"))),c.add(1,"M");o.find(".datepicker-months td").empty().append(b)},T=function(){var b=o.find(".datepicker-months"),c=b.find("th"),g=b.find("tbody").find("span");c.eq(0).find("span").attr("title",d.tooltips.prevYear),c.eq(1).attr("title",d.tooltips.selectYear),c.eq(2).find("span").attr("title",d.tooltips.nextYear),b.find(".disabled").removeClass("disabled"),R(f.clone().subtract(1,"y"),"y")||c.eq(0).addClass("disabled"),c.eq(1).text(f.year()),R(f.clone().add(1,"y"),"y")||c.eq(2).addClass("disabled"),g.removeClass("active"),e.isSame(f,"y")&&!m&&g.eq(e.month()).addClass("active"),g.each(function(b){R(f.clone().month(b),"M")||a(this).addClass("disabled")})},U=function(){var a=o.find(".datepicker-years"),b=a.find("th"),c=f.clone().subtract(5,"y"),g=f.clone().add(6,"y"),h="";for(b.eq(0).find("span").attr("title",d.tooltips.prevDecade),b.eq(1).attr("title",d.tooltips.selectDecade),b.eq(2).find("span").attr("title",d.tooltips.nextDecade),a.find(".disabled").removeClass("disabled"),d.minDate&&d.minDate.isAfter(c,"y")&&b.eq(0).addClass("disabled"),b.eq(1).text(c.year()+"-"+g.year()),d.maxDate&&d.maxDate.isBefore(g,"y")&&b.eq(2).addClass("disabled");!c.isAfter(g,"y");)h+='<span data-action="selectYear" class="year'+(c.isSame(e,"y")&&!m?" active":"")+(R(c,"y")?"":" disabled")+'">'+c.year()+"</span>",c.add(1,"y");a.find("td").html(h)},V=function(){var a,c=o.find(".datepicker-decades"),g=c.find("th"),h=b({y:f.year()-f.year()%100-1}),i=h.clone().add(100,"y"),j=h.clone(),k=!1,l=!1,m="";for(g.eq(0).find("span").attr("title",d.tooltips.prevCentury),g.eq(2).find("span").attr("title",d.tooltips.nextCentury),c.find(".disabled").removeClass("disabled"),(h.isSame(b({y:1900}))||d.minDate&&d.minDate.isAfter(h,"y"))&&g.eq(0).addClass("disabled"),g.eq(1).text(h.year()+"-"+i.year()),(h.isSame(b({y:2e3}))||d.maxDate&&d.maxDate.isBefore(i,"y"))&&g.eq(2).addClass("disabled");!h.isAfter(i,"y");)a=h.year()+12,k=d.minDate&&d.minDate.isAfter(h,"y")&&d.minDate.year()<=a,l=d.maxDate&&d.maxDate.isAfter(h,"y")&&d.maxDate.year()<=a,m+='<span data-action="selectDecade" class="decade'+(e.isAfter(h)&&e.year()<=a?" active":"")+(R(h,"y")||k||l?"":" disabled")+'" data-selection="'+(h.year()+6)+'">'+(h.year()+1)+" - "+(h.year()+12)+"</span>",h.add(12,"y");m+="<span></span><span></span><span></span>",//push the dangling block over, at least this way it's even
c.find("td").html(m),g.eq(1).text(j.year()+1+"-"+h.year())},W=function(){var b,c,g,h,i=o.find(".datepicker-days"),j=i.find("th"),k=[];if(B()){for(j.eq(0).find("span").attr("title",d.tooltips.prevMonth),j.eq(1).attr("title",d.tooltips.selectMonth),j.eq(2).find("span").attr("title",d.tooltips.nextMonth),i.find(".disabled").removeClass("disabled"),j.eq(1).text(f.format(d.dayViewHeaderFormat)),R(f.clone().subtract(1,"M"),"M")||j.eq(0).addClass("disabled"),R(f.clone().add(1,"M"),"M")||j.eq(2).addClass("disabled"),b=f.clone().startOf("M").startOf("w").startOf("d"),h=0;h<42;h++)//always display 42 days (should show 6 weeks)
0===b.weekday()&&(c=a("<tr>"),d.calendarWeeks&&c.append('<td class="cw">'+b.week()+"</td>"),k.push(c)),g="",b.isBefore(f,"M")&&(g+=" old"),b.isAfter(f,"M")&&(g+=" new"),b.isSame(e,"d")&&!m&&(g+=" active"),R(b,"d")||(g+=" disabled"),b.isSame(y(),"d")&&(g+=" today"),0!==b.day()&&6!==b.day()||(g+=" weekend"),c.append('<td data-action="selectDay" data-day="'+b.format("L")+'" class="day'+g+'">'+b.date()+"</td>"),b.add(1,"d");i.find("tbody").empty().append(k),T(),U(),V()}},X=function(){var b=o.find(".timepicker-hours table"),c=f.clone().startOf("d"),d=[],e=a("<tr>");for(f.hour()>11&&!h&&c.hour(12);c.isSame(f,"d")&&(h||f.hour()<12&&c.hour()<12||f.hour()>11);)c.hour()%4===0&&(e=a("<tr>"),d.push(e)),e.append('<td data-action="selectHour" class="hour'+(R(c,"h")?"":" disabled")+'">'+c.format(h?"HH":"hh")+"</td>"),c.add(1,"h");b.empty().append(d)},Y=function(){for(var b=o.find(".timepicker-minutes table"),c=f.clone().startOf("h"),e=[],g=a("<tr>"),h=1===d.stepping?5:d.stepping;f.isSame(c,"h");)c.minute()%(4*h)===0&&(g=a("<tr>"),e.push(g)),g.append('<td data-action="selectMinute" class="minute'+(R(c,"m")?"":" disabled")+'">'+c.format("mm")+"</td>"),c.add(h,"m");b.empty().append(e)},Z=function(){for(var b=o.find(".timepicker-seconds table"),c=f.clone().startOf("m"),d=[],e=a("<tr>");f.isSame(c,"m");)c.second()%20===0&&(e=a("<tr>"),d.push(e)),e.append('<td data-action="selectSecond" class="second'+(R(c,"s")?"":" disabled")+'">'+c.format("ss")+"</td>"),c.add(5,"s");b.empty().append(d)},$=function(){var a,b,c=o.find(".timepicker span[data-time-component]");h||(a=o.find(".timepicker [data-action=togglePeriod]"),b=e.clone().add(e.hours()>=12?-12:12,"h"),a.text(e.format("A")),R(b,"h")?a.removeClass("disabled"):a.addClass("disabled")),c.filter("[data-time-component=hours]").text(e.format(h?"HH":"hh")),c.filter("[data-time-component=minutes]").text(e.format("mm")),c.filter("[data-time-component=seconds]").text(e.format("ss")),X(),Y(),Z()},_=function(){o&&(W(),$())},aa=function(a){var b=m?null:e;
// case of calling setValue(null or false)
// case of calling setValue(null or false)
//viewDate = date.clone(); // TODO this doesn't work right on first use
return a?(a=a.clone().locale(d.locale),x()&&a.tz(d.timeZone),1!==d.stepping&&a.minutes(Math.round(a.minutes()/d.stepping)*d.stepping).seconds(0),void(R(a)?(e=a,g.val(e.format(i)),c.data("date",e.format(i)),m=!1,_(),J({type:"dp.change",date:e.clone(),oldDate:b})):(d.keepInvalid?J({type:"dp.change",date:a,oldDate:b}):g.val(m?"":e.format(i)),J({type:"dp.error",date:a,oldDate:b})))):(m=!0,g.val(""),c.data("date",""),J({type:"dp.change",date:!1,oldDate:b}),void _())},/**
             * Hides the widget. Possibly will emit dp.hide
             */
ba=function(){var b=!1;
// Ignore event if in the middle of a picker transition
return o?(o.find(".collapse").each(function(){var c=a(this).data("collapse");return!c||!c.transitioning||(b=!0,!1)}),b?l:(n&&n.hasClass("btn")&&n.toggleClass("active"),o.hide(),a(window).off("resize",I),o.off("click","[data-action]"),o.off("mousedown",!1),o.remove(),o=!1,J({type:"dp.hide",date:e.clone()}),g.blur(),k=0,f=e.clone(),l)):l},ca=function(){aa(null)},da=function(a){
//inputDate.locale(options.locale);
return void 0===d.parseInputDate?b.isMoment(a)||(a=y(a)):a=d.parseInputDate(a),a},/********************************************************************************
             *
             * Widget UI interaction functions
             *
             ********************************************************************************/
ea={next:function(){var a=q[k].navFnc;f.add(q[k].navStep,a),W(),K(a)},previous:function(){var a=q[k].navFnc;f.subtract(q[k].navStep,a),W(),K(a)},pickerSwitch:function(){L(1)},selectMonth:function(b){var c=a(b.target).closest("tbody").find("span").index(a(b.target));f.month(c),k===p?(aa(e.clone().year(f.year()).month(f.month())),d.inline||ba()):(L(-1),W()),K("M")},selectYear:function(b){var c=parseInt(a(b.target).text(),10)||0;f.year(c),k===p?(aa(e.clone().year(f.year())),d.inline||ba()):(L(-1),W()),K("YYYY")},selectDecade:function(b){var c=parseInt(a(b.target).data("selection"),10)||0;f.year(c),k===p?(aa(e.clone().year(f.year())),d.inline||ba()):(L(-1),W()),K("YYYY")},selectDay:function(b){var c=f.clone();a(b.target).is(".old")&&c.subtract(1,"M"),a(b.target).is(".new")&&c.add(1,"M"),aa(c.date(parseInt(a(b.target).text(),10))),A()||d.keepOpen||d.inline||ba()},incrementHours:function(){var a=e.clone().add(1,"h");R(a,"h")&&aa(a)},incrementMinutes:function(){var a=e.clone().add(d.stepping,"m");R(a,"m")&&aa(a)},incrementSeconds:function(){var a=e.clone().add(1,"s");R(a,"s")&&aa(a)},decrementHours:function(){var a=e.clone().subtract(1,"h");R(a,"h")&&aa(a)},decrementMinutes:function(){var a=e.clone().subtract(d.stepping,"m");R(a,"m")&&aa(a)},decrementSeconds:function(){var a=e.clone().subtract(1,"s");R(a,"s")&&aa(a)},togglePeriod:function(){aa(e.clone().add(e.hours()>=12?-12:12,"h"))},togglePicker:function(b){var c,e=a(b.target),f=e.closest("ul"),g=f.find(".in"),h=f.find(".collapse:not(.in)");if(g&&g.length){if(c=g.data("collapse"),c&&c.transitioning)return;g.collapse?(// if collapse plugin is available through bootstrap.js then use it
g.collapse("hide"),h.collapse("show")):(// otherwise just toggle in class on the two views
g.removeClass("in"),h.addClass("in")),e.is("span")?e.toggleClass(d.icons.time+" "+d.icons.date):e.find("span").toggleClass(d.icons.time+" "+d.icons.date)}},showPicker:function(){o.find(".timepicker > div:not(.timepicker-picker)").hide(),o.find(".timepicker .timepicker-picker").show()},showHours:function(){o.find(".timepicker .timepicker-picker").hide(),o.find(".timepicker .timepicker-hours").show()},showMinutes:function(){o.find(".timepicker .timepicker-picker").hide(),o.find(".timepicker .timepicker-minutes").show()},showSeconds:function(){o.find(".timepicker .timepicker-picker").hide(),o.find(".timepicker .timepicker-seconds").show()},selectHour:function(b){var c=parseInt(a(b.target).text(),10);h||(e.hours()>=12?12!==c&&(c+=12):12===c&&(c=0)),aa(e.clone().hours(c)),ea.showPicker.call(l)},selectMinute:function(b){aa(e.clone().minutes(parseInt(a(b.target).text(),10))),ea.showPicker.call(l)},selectSecond:function(b){aa(e.clone().seconds(parseInt(a(b.target).text(),10))),ea.showPicker.call(l)},clear:ca,today:function(){var a=y();R(a,"d")&&aa(a)},close:ba},fa=function(b){return!a(b.currentTarget).is(".disabled")&&(ea[a(b.currentTarget).data("action")].apply(l,arguments),!1)},/**
             * Shows the widget. Possibly will emit dp.show and dp.change
             */
ga=function(){var b,c={year:function(a){return a.month(0).date(1).hours(0).seconds(0).minutes(0)},month:function(a){return a.date(1).hours(0).seconds(0).minutes(0)},day:function(a){return a.hours(0).seconds(0).minutes(0)},hour:function(a){return a.seconds(0).minutes(0)},minute:function(a){return a.seconds(0)}};// this handles clicks on the widget
return g.prop("disabled")||!d.ignoreReadonly&&g.prop("readonly")||o?l:(void 0!==g.val()&&0!==g.val().trim().length?aa(da(g.val().trim())):m&&d.useCurrent&&(d.inline||g.is("input")&&0===g.val().trim().length)&&(b=y(),"string"==typeof d.useCurrent&&(b=c[d.useCurrent](b)),aa(b)),o=G(),M(),S(),o.find(".timepicker-hours").hide(),o.find(".timepicker-minutes").hide(),o.find(".timepicker-seconds").hide(),_(),L(),a(window).on("resize",I),o.on("click","[data-action]",fa),o.on("mousedown",!1),n&&n.hasClass("btn")&&n.toggleClass("active"),I(),o.show(),d.focusOnShow&&!g.is(":focus")&&g.focus(),J({type:"dp.show"}),l)},/**
             * Shows or hides the widget
             */
ha=function(){return o?ba():ga()},ia=function(a){var b,c,e,f,g=null,h=[],i={},j=a.which,k="p";w[j]=k;for(b in w)w.hasOwnProperty(b)&&w[b]===k&&(h.push(b),parseInt(b,10)!==j&&(i[b]=!0));for(b in d.keyBinds)if(d.keyBinds.hasOwnProperty(b)&&"function"==typeof d.keyBinds[b]&&(e=b.split(" "),e.length===h.length&&v[j]===e[e.length-1])){for(f=!0,c=e.length-2;c>=0;c--)if(!(v[e[c]]in i)){f=!1;break}if(f){g=d.keyBinds[b];break}}g&&(g.call(l,o),a.stopPropagation(),a.preventDefault())},ja=function(a){w[a.which]="r",a.stopPropagation(),a.preventDefault()},ka=function(b){var c=a(b.target).val().trim(),d=c?da(c):null;return aa(d),b.stopImmediatePropagation(),!1},la=function(){g.on({change:ka,blur:d.debug?"":ba,keydown:ia,keyup:ja,focus:d.allowInputToggle?ga:""}),c.is("input")?g.on({focus:ga}):n&&(n.on("click",ha),n.on("mousedown",!1))},ma=function(){g.off({change:ka,blur:blur,keydown:ia,keyup:ja,focus:d.allowInputToggle?ba:""}),c.is("input")?g.off({focus:ga}):n&&(n.off("click",ha),n.off("mousedown",!1))},na=function(b){
// Store given enabledDates and disabledDates as keys.
// This way we can check their existence in O(1) time instead of looping through whole array.
// (for example: options.enabledDates['2014-02-27'] === true)
var c={};return a.each(b,function(){var a=da(this);a.isValid()&&(c[a.format("YYYY-MM-DD")]=!0)}),!!Object.keys(c).length&&c},oa=function(b){
// Store given enabledHours and disabledHours as keys.
// This way we can check their existence in O(1) time instead of looping through whole array.
// (for example: options.enabledHours['2014-02-27'] === true)
var c={};return a.each(b,function(){c[this]=!0}),!!Object.keys(c).length&&c},pa=function(){var a=d.format||"L LT";i=a.replace(/(\[[^\[]*\])|(\\)?(LTS|LT|LL?L?L?|l{1,4})/g,function(a){var b=e.localeData().longDateFormat(a)||a;return b.replace(/(\[[^\[]*\])|(\\)?(LTS|LT|LL?L?L?|l{1,4})/g,function(a){//temp fix for #740
return e.localeData().longDateFormat(a)||a})}),j=d.extraFormats?d.extraFormats.slice():[],j.indexOf(a)<0&&j.indexOf(i)<0&&j.push(i),h=i.toLowerCase().indexOf("a")<1&&i.replace(/\[.*?\]/g,"").indexOf("h")<1,z("y")&&(p=2),z("M")&&(p=1),z("d")&&(p=0),k=Math.max(p,k),m||aa(e)};
// initializing element and component attributes
if(/********************************************************************************
         *
         * Public API functions
         * =====================
         *
         * Important: Do not expose direct references to private objects or the options
         * object to the outer world. Always return a clone when returning values or make
         * a clone when setting a private variable.
         *
         ********************************************************************************/
l.destroy=function(){
///<summary>Destroys the widget and removes all attached event listeners</summary>
ba(),ma(),c.removeData("DateTimePicker"),c.removeData("date")},l.toggle=ha,l.show=ga,l.hide=ba,l.disable=function(){
///<summary>Disables the input element, the component is attached to, by adding a disabled="true" attribute to it.
///If the widget was visible before that call it is hidden. Possibly emits dp.hide</summary>
return ba(),n&&n.hasClass("btn")&&n.addClass("disabled"),g.prop("disabled",!0),l},l.enable=function(){
///<summary>Enables the input element, the component is attached to, by removing disabled attribute from it.</summary>
return n&&n.hasClass("btn")&&n.removeClass("disabled"),g.prop("disabled",!1),l},l.ignoreReadonly=function(a){if(0===arguments.length)return d.ignoreReadonly;if("boolean"!=typeof a)throw new TypeError("ignoreReadonly () expects a boolean parameter");return d.ignoreReadonly=a,l},l.options=function(b){if(0===arguments.length)return a.extend(!0,{},d);if(!(b instanceof Object))throw new TypeError("options() options parameter should be an object");return a.extend(!0,d,b),a.each(d,function(a,b){if(void 0===l[a])throw new TypeError("option "+a+" is not recognized!");l[a](b)}),l},l.date=function(a){
///<signature helpKeyword="$.fn.datetimepicker.date">
///<summary>Returns the component's model current date, a moment object or null if not set.</summary>
///<returns type="Moment">date.clone()</returns>
///</signature>
///<signature>
///<summary>Sets the components model current moment to it. Passing a null value unsets the components model current moment. Parsing of the newDate parameter is made using moment library with the options.format and options.useStrict components configuration.</summary>
///<param name="newDate" locid="$.fn.datetimepicker.date_p:newDate">Takes string, Date, moment, null parameter.</param>
///</signature>
if(0===arguments.length)return m?null:e.clone();if(!(null===a||"string"==typeof a||b.isMoment(a)||a instanceof Date))throw new TypeError("date() parameter must be one of [null, string, moment or Date]");return aa(null===a?null:da(a)),l},l.format=function(a){
///<summary>test su</summary>
///<param name="newFormat">info about para</param>
///<returns type="string|boolean">returns foo</returns>
if(0===arguments.length)return d.format;if("string"!=typeof a&&("boolean"!=typeof a||a!==!1))throw new TypeError("format() expects a string or boolean:false parameter "+a);return d.format=a,i&&pa(),l},l.timeZone=function(a){if(0===arguments.length)return d.timeZone;if("string"!=typeof a)throw new TypeError("newZone() expects a string parameter");return d.timeZone=a,l},l.dayViewHeaderFormat=function(a){if(0===arguments.length)return d.dayViewHeaderFormat;if("string"!=typeof a)throw new TypeError("dayViewHeaderFormat() expects a string parameter");return d.dayViewHeaderFormat=a,l},l.extraFormats=function(a){if(0===arguments.length)return d.extraFormats;if(a!==!1&&!(a instanceof Array))throw new TypeError("extraFormats() expects an array or false parameter");return d.extraFormats=a,j&&pa(),l},l.disabledDates=function(b){
///<signature helpKeyword="$.fn.datetimepicker.disabledDates">
///<summary>Returns an array with the currently set disabled dates on the component.</summary>
///<returns type="array">options.disabledDates</returns>
///</signature>
///<signature>
///<summary>Setting this takes precedence over options.minDate, options.maxDate configuration. Also calling this function removes the configuration of
///options.enabledDates if such exist.</summary>
///<param name="dates" locid="$.fn.datetimepicker.disabledDates_p:dates">Takes an [ string or Date or moment ] of values and allows the user to select only from those days.</param>
///</signature>
if(0===arguments.length)return d.disabledDates?a.extend({},d.disabledDates):d.disabledDates;if(!b)return d.disabledDates=!1,_(),l;if(!(b instanceof Array))throw new TypeError("disabledDates() expects an array parameter");return d.disabledDates=na(b),d.enabledDates=!1,_(),l},l.enabledDates=function(b){
///<signature helpKeyword="$.fn.datetimepicker.enabledDates">
///<summary>Returns an array with the currently set enabled dates on the component.</summary>
///<returns type="array">options.enabledDates</returns>
///</signature>
///<signature>
///<summary>Setting this takes precedence over options.minDate, options.maxDate configuration. Also calling this function removes the configuration of options.disabledDates if such exist.</summary>
///<param name="dates" locid="$.fn.datetimepicker.enabledDates_p:dates">Takes an [ string or Date or moment ] of values and allows the user to select only from those days.</param>
///</signature>
if(0===arguments.length)return d.enabledDates?a.extend({},d.enabledDates):d.enabledDates;if(!b)return d.enabledDates=!1,_(),l;if(!(b instanceof Array))throw new TypeError("enabledDates() expects an array parameter");return d.enabledDates=na(b),d.disabledDates=!1,_(),l},l.daysOfWeekDisabled=function(a){if(0===arguments.length)return d.daysOfWeekDisabled.splice(0);if("boolean"==typeof a&&!a)return d.daysOfWeekDisabled=!1,_(),l;if(!(a instanceof Array))throw new TypeError("daysOfWeekDisabled() expects an array parameter");if(d.daysOfWeekDisabled=a.reduce(function(a,b){return b=parseInt(b,10),b>6||b<0||isNaN(b)?a:(a.indexOf(b)===-1&&a.push(b),a)},[]).sort(),d.useCurrent&&!d.keepInvalid){for(var b=0;!R(e,"d");){if(e.add(1,"d"),31===b)throw"Tried 31 times to find a valid date";b++}aa(e)}return _(),l},l.maxDate=function(a){if(0===arguments.length)return d.maxDate?d.maxDate.clone():d.maxDate;if("boolean"==typeof a&&a===!1)return d.maxDate=!1,_(),l;"string"==typeof a&&("now"!==a&&"moment"!==a||(a=y()));var b=da(a);if(!b.isValid())throw new TypeError("maxDate() Could not parse date parameter: "+a);if(d.minDate&&b.isBefore(d.minDate))throw new TypeError("maxDate() date parameter is before options.minDate: "+b.format(i));return d.maxDate=b,d.useCurrent&&!d.keepInvalid&&e.isAfter(a)&&aa(d.maxDate),f.isAfter(b)&&(f=b.clone().subtract(d.stepping,"m")),_(),l},l.minDate=function(a){if(0===arguments.length)return d.minDate?d.minDate.clone():d.minDate;if("boolean"==typeof a&&a===!1)return d.minDate=!1,_(),l;"string"==typeof a&&("now"!==a&&"moment"!==a||(a=y()));var b=da(a);if(!b.isValid())throw new TypeError("minDate() Could not parse date parameter: "+a);if(d.maxDate&&b.isAfter(d.maxDate))throw new TypeError("minDate() date parameter is after options.maxDate: "+b.format(i));return d.minDate=b,d.useCurrent&&!d.keepInvalid&&e.isBefore(a)&&aa(d.minDate),f.isBefore(b)&&(f=b.clone().add(d.stepping,"m")),_(),l},l.defaultDate=function(a){
///<signature helpKeyword="$.fn.datetimepicker.defaultDate">
///<summary>Returns a moment with the options.defaultDate option configuration or false if not set</summary>
///<returns type="Moment">date.clone()</returns>
///</signature>
///<signature>
///<summary>Will set the picker's inital date. If a boolean:false value is passed the options.defaultDate parameter is cleared.</summary>
///<param name="defaultDate" locid="$.fn.datetimepicker.defaultDate_p:defaultDate">Takes a string, Date, moment, boolean:false</param>
///</signature>
if(0===arguments.length)return d.defaultDate?d.defaultDate.clone():d.defaultDate;if(!a)return d.defaultDate=!1,l;"string"==typeof a&&(a="now"===a||"moment"===a?y():y(a));var b=da(a);if(!b.isValid())throw new TypeError("defaultDate() Could not parse date parameter: "+a);if(!R(b))throw new TypeError("defaultDate() date passed is invalid according to component setup validations");return d.defaultDate=b,(d.defaultDate&&d.inline||""===g.val().trim())&&aa(d.defaultDate),l},l.locale=function(a){if(0===arguments.length)return d.locale;if(!b.localeData(a))throw new TypeError("locale() locale "+a+" is not loaded from moment locales!");return d.locale=a,e.locale(d.locale),f.locale(d.locale),i&&pa(),o&&(ba(),ga()),l},l.stepping=function(a){return 0===arguments.length?d.stepping:(a=parseInt(a,10),(isNaN(a)||a<1)&&(a=1),d.stepping=a,l)},l.useCurrent=function(a){var b=["year","month","day","hour","minute"];if(0===arguments.length)return d.useCurrent;if("boolean"!=typeof a&&"string"!=typeof a)throw new TypeError("useCurrent() expects a boolean or string parameter");if("string"==typeof a&&b.indexOf(a.toLowerCase())===-1)throw new TypeError("useCurrent() expects a string parameter of "+b.join(", "));return d.useCurrent=a,l},l.collapse=function(a){if(0===arguments.length)return d.collapse;if("boolean"!=typeof a)throw new TypeError("collapse() expects a boolean parameter");return d.collapse===a?l:(d.collapse=a,o&&(ba(),ga()),l)},l.icons=function(b){if(0===arguments.length)return a.extend({},d.icons);if(!(b instanceof Object))throw new TypeError("icons() expects parameter to be an Object");return a.extend(d.icons,b),o&&(ba(),ga()),l},l.tooltips=function(b){if(0===arguments.length)return a.extend({},d.tooltips);if(!(b instanceof Object))throw new TypeError("tooltips() expects parameter to be an Object");return a.extend(d.tooltips,b),o&&(ba(),ga()),l},l.useStrict=function(a){if(0===arguments.length)return d.useStrict;if("boolean"!=typeof a)throw new TypeError("useStrict() expects a boolean parameter");return d.useStrict=a,l},l.sideBySide=function(a){if(0===arguments.length)return d.sideBySide;if("boolean"!=typeof a)throw new TypeError("sideBySide() expects a boolean parameter");return d.sideBySide=a,o&&(ba(),ga()),l},l.viewMode=function(a){if(0===arguments.length)return d.viewMode;if("string"!=typeof a)throw new TypeError("viewMode() expects a string parameter");if(r.indexOf(a)===-1)throw new TypeError("viewMode() parameter must be one of ("+r.join(", ")+") value");return d.viewMode=a,k=Math.max(r.indexOf(a),p),L(),l},l.toolbarPlacement=function(a){if(0===arguments.length)return d.toolbarPlacement;if("string"!=typeof a)throw new TypeError("toolbarPlacement() expects a string parameter");if(u.indexOf(a)===-1)throw new TypeError("toolbarPlacement() parameter must be one of ("+u.join(", ")+") value");return d.toolbarPlacement=a,o&&(ba(),ga()),l},l.widgetPositioning=function(b){if(0===arguments.length)return a.extend({},d.widgetPositioning);if("[object Object]"!=={}.toString.call(b))throw new TypeError("widgetPositioning() expects an object variable");if(b.horizontal){if("string"!=typeof b.horizontal)throw new TypeError("widgetPositioning() horizontal variable must be a string");if(b.horizontal=b.horizontal.toLowerCase(),t.indexOf(b.horizontal)===-1)throw new TypeError("widgetPositioning() expects horizontal parameter to be one of ("+t.join(", ")+")");d.widgetPositioning.horizontal=b.horizontal}if(b.vertical){if("string"!=typeof b.vertical)throw new TypeError("widgetPositioning() vertical variable must be a string");if(b.vertical=b.vertical.toLowerCase(),s.indexOf(b.vertical)===-1)throw new TypeError("widgetPositioning() expects vertical parameter to be one of ("+s.join(", ")+")");d.widgetPositioning.vertical=b.vertical}return _(),l},l.calendarWeeks=function(a){if(0===arguments.length)return d.calendarWeeks;if("boolean"!=typeof a)throw new TypeError("calendarWeeks() expects parameter to be a boolean value");return d.calendarWeeks=a,_(),l},l.showTodayButton=function(a){if(0===arguments.length)return d.showTodayButton;if("boolean"!=typeof a)throw new TypeError("showTodayButton() expects a boolean parameter");return d.showTodayButton=a,o&&(ba(),ga()),l},l.showClear=function(a){if(0===arguments.length)return d.showClear;if("boolean"!=typeof a)throw new TypeError("showClear() expects a boolean parameter");return d.showClear=a,o&&(ba(),ga()),l},l.widgetParent=function(b){if(0===arguments.length)return d.widgetParent;if("string"==typeof b&&(b=a(b)),null!==b&&"string"!=typeof b&&!(b instanceof a))throw new TypeError("widgetParent() expects a string or a jQuery object parameter");return d.widgetParent=b,o&&(ba(),ga()),l},l.keepOpen=function(a){if(0===arguments.length)return d.keepOpen;if("boolean"!=typeof a)throw new TypeError("keepOpen() expects a boolean parameter");return d.keepOpen=a,l},l.focusOnShow=function(a){if(0===arguments.length)return d.focusOnShow;if("boolean"!=typeof a)throw new TypeError("focusOnShow() expects a boolean parameter");return d.focusOnShow=a,l},l.inline=function(a){if(0===arguments.length)return d.inline;if("boolean"!=typeof a)throw new TypeError("inline() expects a boolean parameter");return d.inline=a,l},l.clear=function(){return ca(),l},l.keyBinds=function(a){return 0===arguments.length?d.keyBinds:(d.keyBinds=a,l)},l.getMoment=function(a){return y(a)},l.debug=function(a){if("boolean"!=typeof a)throw new TypeError("debug() expects a boolean parameter");return d.debug=a,l},l.allowInputToggle=function(a){if(0===arguments.length)return d.allowInputToggle;if("boolean"!=typeof a)throw new TypeError("allowInputToggle() expects a boolean parameter");return d.allowInputToggle=a,l},l.showClose=function(a){if(0===arguments.length)return d.showClose;if("boolean"!=typeof a)throw new TypeError("showClose() expects a boolean parameter");return d.showClose=a,l},l.keepInvalid=function(a){if(0===arguments.length)return d.keepInvalid;if("boolean"!=typeof a)throw new TypeError("keepInvalid() expects a boolean parameter");return d.keepInvalid=a,l},l.datepickerInput=function(a){if(0===arguments.length)return d.datepickerInput;if("string"!=typeof a)throw new TypeError("datepickerInput() expects a string parameter");return d.datepickerInput=a,l},l.parseInputDate=function(a){if(0===arguments.length)return d.parseInputDate;if("function"!=typeof a)throw new TypeError("parseInputDate() sholud be as function");return d.parseInputDate=a,l},l.disabledTimeIntervals=function(b){
///<signature helpKeyword="$.fn.datetimepicker.disabledTimeIntervals">
///<summary>Returns an array with the currently set disabled dates on the component.</summary>
///<returns type="array">options.disabledTimeIntervals</returns>
///</signature>
///<signature>
///<summary>Setting this takes precedence over options.minDate, options.maxDate configuration. Also calling this function removes the configuration of
///options.enabledDates if such exist.</summary>
///<param name="dates" locid="$.fn.datetimepicker.disabledTimeIntervals_p:dates">Takes an [ string or Date or moment ] of values and allows the user to select only from those days.</param>
///</signature>
if(0===arguments.length)return d.disabledTimeIntervals?a.extend({},d.disabledTimeIntervals):d.disabledTimeIntervals;if(!b)return d.disabledTimeIntervals=!1,_(),l;if(!(b instanceof Array))throw new TypeError("disabledTimeIntervals() expects an array parameter");return d.disabledTimeIntervals=b,_(),l},l.disabledHours=function(b){
///<signature helpKeyword="$.fn.datetimepicker.disabledHours">
///<summary>Returns an array with the currently set disabled hours on the component.</summary>
///<returns type="array">options.disabledHours</returns>
///</signature>
///<signature>
///<summary>Setting this takes precedence over options.minDate, options.maxDate configuration. Also calling this function removes the configuration of
///options.enabledHours if such exist.</summary>
///<param name="hours" locid="$.fn.datetimepicker.disabledHours_p:hours">Takes an [ int ] of values and disallows the user to select only from those hours.</param>
///</signature>
if(0===arguments.length)return d.disabledHours?a.extend({},d.disabledHours):d.disabledHours;if(!b)return d.disabledHours=!1,_(),l;if(!(b instanceof Array))throw new TypeError("disabledHours() expects an array parameter");if(d.disabledHours=oa(b),d.enabledHours=!1,d.useCurrent&&!d.keepInvalid){for(var c=0;!R(e,"h");){if(e.add(1,"h"),24===c)throw"Tried 24 times to find a valid date";c++}aa(e)}return _(),l},l.enabledHours=function(b){
///<signature helpKeyword="$.fn.datetimepicker.enabledHours">
///<summary>Returns an array with the currently set enabled hours on the component.</summary>
///<returns type="array">options.enabledHours</returns>
///</signature>
///<signature>
///<summary>Setting this takes precedence over options.minDate, options.maxDate configuration. Also calling this function removes the configuration of options.disabledHours if such exist.</summary>
///<param name="hours" locid="$.fn.datetimepicker.enabledHours_p:hours">Takes an [ int ] of values and allows the user to select only from those hours.</param>
///</signature>
if(0===arguments.length)return d.enabledHours?a.extend({},d.enabledHours):d.enabledHours;if(!b)return d.enabledHours=!1,_(),l;if(!(b instanceof Array))throw new TypeError("enabledHours() expects an array parameter");if(d.enabledHours=oa(b),d.disabledHours=!1,d.useCurrent&&!d.keepInvalid){for(var c=0;!R(e,"h");){if(e.add(1,"h"),24===c)throw"Tried 24 times to find a valid date";c++}aa(e)}return _(),l},/**
         * Returns the component's model current viewDate, a moment object or null if not set. Passing a null value unsets the components model current moment. Parsing of the newDate parameter is made using moment library with the options.format and options.useStrict components configuration.
         * @param {Takes string, viewDate, moment, null parameter.} newDate
         * @returns {viewDate.clone()}
         */
l.viewDate=function(a){if(0===arguments.length)return f.clone();if(!a)return f=e.clone(),l;if(!("string"==typeof a||b.isMoment(a)||a instanceof Date))throw new TypeError("viewDate() parameter must be one of [string, moment or Date]");return f=da(a),K(),l},c.is("input"))g=c;else if(g=c.find(d.datepickerInput),0===g.length)g=c.find("input");else if(!g.is("input"))throw new Error('CSS class "'+d.datepickerInput+'" cannot be applied to non input element');if(c.hasClass("input-group")&&(
// in case there is more then one 'input-group-addon' Issue #48
n=0===c.find(".datepickerbutton").length?c.find(".input-group-addon"):c.find(".datepickerbutton")),!d.inline&&!g.is("input"))throw new Error("Could not initialize DateTimePicker without an input element");
// Set defaults for date here now instead of in var declaration
return e=y(),f=e.clone(),a.extend(!0,d,H()),l.options(d),pa(),la(),g.prop("disabled")&&l.disable(),g.is("input")&&0!==g.val().trim().length?aa(da(g.val().trim())):d.defaultDate&&void 0===g.attr("placeholder")&&aa(d.defaultDate),d.inline&&ga(),l};/********************************************************************************
     *
     * jQuery plugin constructor and defaults object
     *
     ********************************************************************************/
/**
    * See (http://jquery.com/).
    * @name jQuery
    * @class
    * See the jQuery Library  (http://jquery.com/) for full details.  This just
    * documents the function and classes that are added to jQuery by this plug-in.
    */
/**
     * See (http://jquery.com/)
     * @name fn
     * @class
     * See the jQuery Library  (http://jquery.com/) for full details.  This just
     * documents the function and classes that are added to jQuery by this plug-in.
     * @memberOf jQuery
     */
/**
     * Show comments
     * @class datetimepicker
     * @memberOf jQuery.fn
     */
a.fn.datetimepicker=function(b){b=b||{};var d,e=Array.prototype.slice.call(arguments,1),f=!0,g=["destroy","hide","show","toggle"];if("object"==typeof b)return this.each(function(){var d=a(this);d.data("DateTimePicker")||(
// create a private copy of the defaults object
b=a.extend(!0,{},a.fn.datetimepicker.defaults,b),d.data("DateTimePicker",c(d,b)))});if("string"==typeof b)return this.each(function(){var c=a(this),g=c.data("DateTimePicker");if(!g)throw new Error('bootstrap-datetimepicker("'+b+'") method was called on an element that is not using DateTimePicker');d=g[b].apply(g,e),f=d===g}),f||a.inArray(b,g)>-1?this:d;throw new TypeError("Invalid arguments for DateTimePicker: "+b)},a.fn.datetimepicker.defaults={timeZone:"",format:!1,dayViewHeaderFormat:"MMMM YYYY",extraFormats:!1,stepping:1,minDate:!1,maxDate:!1,useCurrent:!0,collapse:!0,locale:b.locale(),defaultDate:!1,disabledDates:!1,enabledDates:!1,icons:{time:"glyphicon glyphicon-time",date:"glyphicon glyphicon-calendar",up:"glyphicon glyphicon-chevron-up",down:"glyphicon glyphicon-chevron-down",previous:"glyphicon glyphicon-chevron-left",next:"glyphicon glyphicon-chevron-right",today:"glyphicon glyphicon-screenshot",clear:"glyphicon glyphicon-trash",close:"glyphicon glyphicon-remove"},tooltips:{today:"Go to today",clear:"Clear selection",close:"Close the picker",selectMonth:"Select Month",prevMonth:"Previous Month",nextMonth:"Next Month",selectYear:"Select Year",prevYear:"Previous Year",nextYear:"Next Year",selectDecade:"Select Decade",prevDecade:"Previous Decade",nextDecade:"Next Decade",prevCentury:"Previous Century",nextCentury:"Next Century",pickHour:"Pick Hour",incrementHour:"Increment Hour",decrementHour:"Decrement Hour",pickMinute:"Pick Minute",incrementMinute:"Increment Minute",decrementMinute:"Decrement Minute",pickSecond:"Pick Second",incrementSecond:"Increment Second",decrementSecond:"Decrement Second",togglePeriod:"Toggle Period",selectTime:"Select Time"},useStrict:!1,sideBySide:!1,daysOfWeekDisabled:!1,calendarWeeks:!1,viewMode:"days",toolbarPlacement:"default",showTodayButton:!1,showClear:!1,showClose:!1,widgetPositioning:{horizontal:"auto",vertical:"auto"},widgetParent:null,ignoreReadonly:!1,keepOpen:!1,focusOnShow:!0,inline:!1,keepInvalid:!1,datepickerInput:".datepickerinput",keyBinds:{up:function(a){if(a){var b=this.date()||this.getMoment();a.find(".datepicker").is(":visible")?this.date(b.clone().subtract(7,"d")):this.date(b.clone().add(this.stepping(),"m"))}},down:function(a){if(!a)return void this.show();var b=this.date()||this.getMoment();a.find(".datepicker").is(":visible")?this.date(b.clone().add(7,"d")):this.date(b.clone().subtract(this.stepping(),"m"))},"control up":function(a){if(a){var b=this.date()||this.getMoment();a.find(".datepicker").is(":visible")?this.date(b.clone().subtract(1,"y")):this.date(b.clone().add(1,"h"))}},"control down":function(a){if(a){var b=this.date()||this.getMoment();a.find(".datepicker").is(":visible")?this.date(b.clone().add(1,"y")):this.date(b.clone().subtract(1,"h"))}},left:function(a){if(a){var b=this.date()||this.getMoment();a.find(".datepicker").is(":visible")&&this.date(b.clone().subtract(1,"d"))}},right:function(a){if(a){var b=this.date()||this.getMoment();a.find(".datepicker").is(":visible")&&this.date(b.clone().add(1,"d"))}},pageUp:function(a){if(a){var b=this.date()||this.getMoment();a.find(".datepicker").is(":visible")&&this.date(b.clone().subtract(1,"M"))}},pageDown:function(a){if(a){var b=this.date()||this.getMoment();a.find(".datepicker").is(":visible")&&this.date(b.clone().add(1,"M"))}},enter:function(){this.hide()},escape:function(){this.hide()},
//tab: function (widget) { //this break the flow of the form. disabling for now
//    var toggle = widget.find('.picker-switch a[data-action="togglePicker"]');
//    if(toggle.length > 0) toggle.click();
//},
"control space":function(a){a&&a.find(".timepicker").is(":visible")&&a.find('.btn[data-action="togglePeriod"]').click()},t:function(){this.date(this.getMoment())},delete:function(){this.clear()}},debug:!1,allowInputToggle:!1,disabledTimeIntervals:!1,disabledHours:!1,enabledHours:!1,viewDate:!1},"undefined"!=typeof module&&(module.exports=a.fn.datetimepicker)});
//# sourceMappingURL=all.js.map
