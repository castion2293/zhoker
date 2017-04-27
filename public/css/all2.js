/* W3.CSS 2.65 by Jan Egil and Borge Refsnes */
*{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}

/* Extract from normalize.css by Nicolas Gallagher and Jonathan Neal git.io/normalize */
html{-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}body{margin:0}
article,aside,details,figcaption,figure,footer,header,hgroup,main,menu,nav,section,summary{display:block}
audio,canvas,video{display:inline-block;vertical-align:baseline}
audio:not([controls]){display:none;height:0}[hidden],template{display:none}
a{background-color:transparent}a:active,a:hover{outline:0}abbr[title]{border-bottom:1px dotted}
dfn{font-style:italic}mark{background:#ff0;color:#000}
small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}
sup{top:-0.5em}sub{bottom:-0.25em}
img{border:0}svg:not(:root){overflow:hidden}figure{margin:1em 40px}
hr{-moz-box-sizing:content-box;box-sizing:content-box}
code,kbd,pre,samp{font-family:monospace,monospace;font-size:1em}
button,input,select,textarea{font:inherit;margin:0}
button{overflow:visible}button,select{text-transform:none}
button,html input[type=button],input[type=reset],input[type=submit]{-webkit-appearance:button;cursor:pointer}
button[disabled],html input[disabled]{cursor:default}
button::-moz-focus-inner,input::-moz-focus-inner{border:0;padding:0}
input[type=checkbox],input[type=radio]{padding:0}
input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button{height:auto}
input[type=search]{box-sizing:content-box;-webkit-appearance:textfield;-moz-box-sizing:content-box;-webkit-box-sizing:content-box}
input[type=search]::-webkit-search-cancel-button,input[type=search]::-webkit-search-decoration{-webkit-appearance:none}
fieldset{border:1px solid #c0c0c0;margin:0 2px;padding:.35em .625em .75em}
legend{border:0;padding:0}pre,textarea{overflow:auto}
/* End extract from normalize.css */

html,body{font-family:Verdana,sans-serif;font-size:15px;line-height:1.5}html{overflow-x:hidden}
h1,h2,h3,h4,h5,h6,.w3-slim,.w3-wide{font-family:"Segoe UI",Arial,sans-serif}
h1{font-size:36px}h2{font-size:30px}h3{font-size:24px}h4{font-size:20px}h5{font-size:18px}h6{font-size:16px}
.w3-serif{font-family:"Times New Roman",Times,serif}
h1,h2,h3,h4,h5,h6{font-weight:400;margin:10px 0}.w3-wide{letter-spacing:4px}
h1 a,h2 a,h3 a,h4 a,h5 a,h6 a{font-weight:inherit}
hr{height:0;border:0;border-top:1px solid #eee;margin:20px 0}
img{margin-bottom:-5px}a{color:inherit}
table{border-collapse:collapse;border-spacing:0;width:100%;display:table}
table,th,td{border:none}
.w3-table-all{border:1px solid #ccc}
.w3-bordered tr,.w3-table-all tr{border-bottom:1px solid #ddd}
.w3-striped tbody tr:nth-child(even){background-color:#f1f1f1}
.w3-table-all tr:nth-child(odd){background-color:#fff}
.w3-table-all tr:nth-child(even){background-color:#f1f1f1}
.w3-hoverable tbody tr:hover,.w3-ul.w3-hoverable li:hover{background-color:#ccc}
.w3-centered tr th,.w3-centered tr td{text-align:center}
.w3-table td,.w3-table th,.w3-table-all td,.w3-table-all th{padding:6px 8px;display:table-cell;text-align:left;vertical-align:top}
.w3-table th:first-child,.w3-table td:first-child,.w3-table-all th:first-child,.w3-table-all td:first-child{padding-left:16px}
.w3-btn,.w3-btn-block{border:none;display:inline-block;outline:0;padding:6px 16px;vertical-align:middle;overflow:hidden;text-decoration:none!important;color:#fff;background-color:#000;text-align:center;cursor:pointer;white-space:nowrap}
.w3-disabled,.w3-btn:disabled,.w3-btn-floating:disabled,.w3-btn-floating-large:disabled{cursor:not-allowed;opacity:0.3}
.w3-btn.w3-disabled *,.w3-btn-block.w3-disabled,.w3-btn-floating.w3-disabled *,.w3-btn:disabled *,.w3-btn-floating:disabled *{pointer-events:none}
.w3-btn.w3-disabled:hover,.w3-btn-block.w3-disabled:hover,.w3-btn:disabled:hover,.w3-btn-floating.w3-disabled:hover,.w3-btn-floating:disabled:hover,
.w3-btn-floating-large.w3-disabled:hover,.w3-btn-floating-large:disabled:hover{box-shadow:none}
.w3-btn:hover,.w3-btn-block:hover,.w3-btn-floating:hover,.w3-btn-floating-large:hover{box-shadow:0 8px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19)}
.w3-btn-block{width:100%}
.w3-btn,.w3-btn-floating,.w3-btn-floating-large,.w3-closenav,.w3-opennav{-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}   
.w3-btn-floating,.w3-btn-floating-large{display:inline-block;text-align:center;color:#fff;background-color:#000;position:relative;overflow:hidden;z-index:1;padding:0;border-radius:50%;cursor:pointer;font-size:24px}
.w3-btn-floating{width:40px;height:40px;line-height:40px}
.w3-btn-floating-large{width:56px;height:56px;line-height:56px}
.w3-btn-group .w3-btn{float:left}
.w3-btn-bar .w3-btn{box-shadow:none;background-color:inherit;color:inherit;float:left}
.w3-btn-bar .w3-btn:hover{background-color:#ccc}
.w3-ripple{position:relative;overflow:hidden}
.w3-ripple:after{content:"";background:#ccc;position:absolute;padding:300%;bottom:0;left:0;opacity:0;transition:0.8s}
.w3-ripple:active:after{padding:0;opacity:1;transition:0s}
.w3-badge,.w3-tag,.w3-sign{background-color:#000;color:#fff;display:inline-block;padding-left:8px;padding-right:8px;text-align:center}
.w3-badge{border-radius:50%}
ul.w3-ul{list-style-type:none;padding:0;margin:0}
ul.w3-ul li{padding:6px 2px 6px 16px;border-bottom:1px solid #ddd}
ul.w3-ul li:last-child{border-bottom:none}
.w3-tooltip,.w3-display-container{position:relative}
.w3-fluid{max-width:100%;height:auto}
.w3-tooltip .w3-text{display:none}
.w3-tooltip:hover .w3-text{display:inline-block}
.w3-navbar{list-style-type:none;margin:0;padding:0;overflow:hidden}
.w3-navbar li{float:left}.w3-navbar li a{display:block;padding:8px 16px;color:white;}.w3-navbar li a:hover{color:#000}
.w3-navbar .w3-dropdown-hover,.w3-navbar .w3-dropdown-click{position:static}
.w3-navbar .w3-dropdown-hover:hover,.w3-navbar .w3-dropdown-hover:first-child,.w3-navbar .w3-dropdown-click:hover{background-color:#ccc;color:#000}
.w3-navbar a,.w3-topnav a,.w3-sidenav a,.w3-dropnav a,.w3-dropdown-content a,.w3-accordion-content a{text-decoration:none!important}
.w3-navbar .w3-opennav.w3-right{float:right!important}.w3-topnav{padding:8px 8px}
.w3-topnav a{padding:0 8px;border-bottom:3px solid transparent;-webkit-transition:border-bottom .3s;transition:border-bottom .3s}
.w3-topnav a:hover{border-bottom:3px solid #fff}.w3-topnav .w3-dropdown-hover a{border-bottom:0}
.w3-opennav,.w3-closenav{color:inherit}.w3-opennav:hover,.w3-closenav:hover{cursor:pointer;opacity:0.8}
.w3-btn,.w3-btn-floating,.w3-btn-floating-large,.w3-btn-block,.w3-hover-shadow,.w3-hover-opacity,
.w3-navbar a,.w3-sidenav a,.w3-dropnav a,.w3-pagination li a,.w3-hoverable tbody tr,.w3-hoverable li,.w3-accordion-content a,.w3-dropdown-content a,.w3-dropdown-click:hover,.w3-dropdown-hover:hover,.w3-opennav,.w3-closenav,.w3-closebtn,
.w3-hover-amber,.w3-hover-aqua,.w3-hover-blue,.w3-hover-light-blue,.w3-hover-brown,.w3-hover-cyan,.w3-hover-blue-grey,.w3-hover-green,.w3-hover-light-green,.w3-hover-indigo,.w3-hover-khaki,.w3-hover-lime,.w3-hover-orange,.w3-hover-deep-orange,.w3-hover-pink,
.w3-hover-purple,.w3-hover-deep-purple,.w3-hover-red,.w3-hover-sand,.w3-hover-teal,.w3-hover-yellow,.w3-hover-white,.w3-hover-black,.w3-hover-grey,.w3-hover-light-grey,.w3-hover-dark-grey,.w3-hover-text-amber,.w3-hover-text-aqua,.w3-hover-text-blue,.w3-hover-text-light-blue,
.w3-hover-text-brown,.w3-hover-text-cyan,.w3-hover-text-blue-grey,.w3-hover-text-green,.w3-hover-text-light-green,.w3-hover-text-indigo,.w3-hover-text-khaki,.w3-hover-text-lime,.w3-hover-text-orange,.w3-hover-text-deep-orange,.w3-hover-text-pink,.w3-hover-text-purple,
.w3-hover-text-deep-purple,.w3-hover-text-red,.w3-hover-text-sand,.w3-hover-text-teal,.w3-hover-text-yellow,.w3-hover-text-white,.w3-hover-text-black,.w3-hover-text-grey,.w3-hover-text-light-grey,.w3-hover-text-dark-grey
{-webkit-transition:background-color .3s,color .15s,box-shadow .3s,opacity 0.3s;transition:background-color .3s,color .15s,box-shadow .3s,opacity 0.3s}
.w3-sidenav{height:100%;width:200px;background-color:#fff;position:fixed!important;z-index:1;overflow:auto}
.w3-sidenav a{padding:4px 2px 4px 16px}.w3-sidenav a:hover{background-color:#ccc}.w3-sidenav a,.w3-dropnav a{display:block}
.w3-sidenav .w3-dropdown-hover:hover,.w3-sidenav .w3-dropdown-hover:first-child,.w3-sidenav .w3-dropdown-click:hover{background-color:#ccc;color:#000}
.w3-sidenav .w3-dropdown-hover,.w3-sidenav .w3-dropdown-click {width:100%}.w3-sidenav .w3-dropdown-hover .w3-dropdown-content,.w3-sidenav .w3-dropdown-click .w3-dropdown-content{min-width:100%}
.w3-main,#main{transition:margin-left .4s}
.w3-dropnav{background-color:#fff}.w3-dropnav a:hover{text-decoration:underline!important}
.w3-modal{z-index:3;display:none;padding-top:100px;position:fixed;left:0;top:0;width:100%;height:100%;overflow:auto;background-color:rgb(0,0,0);background-color:rgba(0,0,0,0.4)}
.w3-modal-content{margin:auto;background-color:#fff;position:relative;padding:0;outline:0;width:600px}.w3-closebtn{text-decoration:none;float:right;font-size:24px;font-weight:bold;color:inherit}
.w3-closebtn:hover,.w3-closebtn:focus{color:#000;text-decoration:none;cursor:pointer}
.w3-pagination{display:inline-block;padding:0;margin:0}.w3-pagination li{display:inline}
.w3-pagination li a{text-decoration:none;color:#000;float:left;padding:8px 16px}
.w3-pagination li a:hover{background-color:#ccc}
.w3-input-group,.w3-group{margin-top:24px;margin-bottom:24px}
.w3-input{padding:8px;display:block;border:none;border-bottom:1px solid #808080;width:100%}
.w3-label{color:#009688}.w3-input:not(:valid)~.w3-validate{color:#f44336}
.w3-select{padding:9px 0;width:100%;color:#000;border:1px solid transparent;border-bottom:1px solid #009688}
.w3-select select:focus{color:#000;border:1px solid #009688}.w3-select option[disabled]{color:#009688}
.w3-dropdown-click,.w3-dropdown-hover{position:relative;display:inline-block;cursor:pointer}
.w3-dropdown-hover:hover .w3-dropdown-content{display:block;z-index:1}
.w3-dropdown-content{cursor:auto;color:#000;background-color:#fff;display:none;position:absolute;min-width:160px;margin:0;padding:0}
.w3-dropdown-content a{padding:6px 16px;display:block}
.w3-dropdown-content a:hover{background-color:#ccc}
.w3-accordion {width:100%;cursor:pointer}
.w3-accordion-content{cursor:auto;display:none;position:relative;width:100%;margin:0;padding:0}
.w3-accordion-content a{padding:6px 16px;display:block}.w3-accordion-content a:hover{background-color:#ccc}
.w3-progress-container{width:100%;height:1.5em;position:relative;background-color:#f1f1f1}
.w3-progressbar{background-color:#757575;height:100%;position:absolute;line-height:inherit}
input[type=checkbox].w3-check,input[type=radio].w3-radio{width:24px;height:24px;position:relative;top:6px}
input[type=checkbox].w3-check:checked+.w3-validate,input[type=radio].w3-radio:checked+.w3-validate{color:#009688} 
input[type=checkbox].w3-check:disabled+.w3-validate,input[type=radio].w3-radio:disabled+.w3-validate{color:#aaa}
.w3-responsive{overflow-x:auto}
.w3-container:after,.w3-row:after,.w3-row-padding:after,.w3-topnav:after,.w3-clear:after,.w3-btn-group:before,.w3-btn-group:after,.w3-btn-bar:before,.w3-btn-bar:after
{content:"";display:table;clear:both}
.w3-col,.w3-half,.w3-third,.w3-twothird,.w3-threequarter,.w3-quarter{float:left;width:100%}
.w3-col.s1{width:8.33333%}
.w3-col.s2{width:16.66666%}
.w3-col.s3{width:24.99999%}
.w3-col.s4{width:33.33333%}
.w3-col.s5{width:41.66666%}
.w3-col.s6{width:49.99999%}
.w3-col.s7{width:58.33333%}
.w3-col.s8{width:66.66666%}
.w3-col.s9{width:74.99999%}
.w3-col.s10{width:83.33333%}
.w3-col.s11{width:91.66666%}
.w3-col.s12,.w3-half,.w3-third,.w3-twothird,.w3-threequarter,.w3-quarter{width:99.99999%}
@media only screen and (min-width:601px){
.w3-col.m1{width:8.33333%}
.w3-col.m2{width:16.66666%}
.w3-col.m3,.w3-quarter{width:24.99999%}
.w3-col.m4,.w3-third{width:33.33333%}
.w3-col.m5{width:41.66666%}
.w3-col.m6,.w3-half{width:49.99999%}
.w3-col.m7{width:58.33333%}
.w3-col.m8,.w3-twothird{width:66.66666%}
.w3-col.m9,.w3-threequarter{width:74.99999%}
.w3-col.m10{width:83.33333%}
.w3-col.m11{width:91.66666%}
.w3-col.m12{width:99.99999%}}
@media only screen and (min-width:993px){
.w3-col.l1{width:8.33333%}
.w3-col.l2{width:16.66666%}
.w3-col.l3,.w3-quarter{width:24.99999%}
.w3-col.l4,.w3-third{width:33.33333%}
.w3-col.l5{width:41.66666%}
.w3-col.l6,.w3-half{width:49.99999%}
.w3-col.l7{width:58.33333%}
.w3-col.l8,.w3-twothird{width:66.66666%}
.w3-col.l9,.w3-threequarter{width:74.99999%}
.w3-col.l10{width:83.33333%}
.w3-col.l11{width:91.66666%}
.w3-col.l12{width:99.99999%}}
.w3-content{max-width:980px;margin:auto}
.w3-rest{overflow:hidden}
.w3-hide{display:none!important}.w3-show-block,.w3-show{display:block!important}.w3-show-inline-block{display:inline-block!important}
@media (max-width:600px){.w3-modal-content{margin:0 10px;width:auto!important}.w3-modal{padding-top:30px}}
@media (max-width:768px){.w3-modal-content{width:500px}.w3-modal{padding-top:50px}}
@media (min-width:993px){.w3-modal-content{width:900px}}
@media screen and (max-width:600px){.w3-topnav a{display:block}.w3-navbar li:not(.w3-opennav){float:none;width:100%!important}.w3-navbar li.w3-right{float:none!important}}	
@media screen and (max-width:600px){.w3-topnav .w3-dropdown-hover .w3-dropdown-content,.w3-navbar .w3-dropdown-click .w3-dropdown-content,.w3-navbar .w3-dropdown-hover .w3-dropdown-content{position:relative}}	
@media screen and (max-width:600px){.w3-topnav,.w3-navbar{text-align:center}}
@media (max-width:600px){.w3-hide-small{display:none!important}}
@media (max-width:992px) and (min-width:601px){.w3-hide-medium{display:none!important}}
@media (min-width:993px){.w3-hide-large{display:none!important}}
@media screen and (max-width:992px){.w3-sidenav.w3-collapse{display:none}.w3-main{margin-left:0!important}}
@media screen and (min-width:992px){.w3-sidenav.w3-collapse{display:block!important}}
.w3-top,.w3-bottom{position:fixed;width:100%;z-index:1}.w3-top{top:0}.w3-bottom{bottom:0}
.w3-overlay{position:fixed;display:none;width:100%;height:100%;top:0;left:0;right:0;bottom:0;background-color:rgba(0,0,0,0.5);z-index:2}
.w3-left{float:left!important}.w3-right{float:right!important}
.w3-tiny{font-size:10px!important}.w3-small{font-size:12px!important}
.w3-medium{font-size:15px!important}
.w3-large{font-size:18px!important}
.w3-xlarge{font-size:24px!important}
.w3-xxlarge{font-size:36px!important}
.w3-xxxlarge{font-size:48px!important}
.w3-jumbo{font-size:64px!important}
.w3-vertical{word-break:break-all;line-height:1;text-align:center;width:0.6em}
.w3-left-align{text-align:left!important}.w3-right-align{text-align:right!important}
.w3-justify{text-align:justify!important}
.w3-center{text-align:center!important}
.w3-display-topleft{position:absolute;left:0;top:0}.w3-display-topright{position:absolute;right:0;top:0}
.w3-display-bottomleft{position:absolute;left:0;bottom:0}.w3-display-bottomright{position:absolute;right:0;bottom:0}
.w3-display-middle{position:absolute;left:0;bottom:50%;width:100%;text-align:center}
.w3-display-topmiddle{position:absolute;left:0;top:0;width:100%;text-align:center}.w3-display-bottommiddle{position:absolute;left:0;bottom:0;width:100%;text-align:center}
.w3-circle{border-radius:50%!important}
.w3-round-small{border-radius:2px!important}.w3-round,.w3-round-medium{border-radius:4px!important}
.w3-round-large{border-radius:8px!important}.w3-round-xlarge{border-radius:16px!important}
.w3-round-xxlarge{border-radius:32px!important}.w3-round-jumbo{border-radius:64px!important}
.w3-border-0{border:0!important}
.w3-border{border:1px solid #ccc!important}
.w3-border-top{border-top:1px solid #ccc!important}.w3-border-bottom{border-bottom:1px solid #ccc!important}
.w3-border-left{border-left:1px solid #ccc!important}.w3-border-right{border-right:1px solid #ccc!important}
.w3-margin{margin:16px!important}.w3-margin-0{margin:0!important}
.w3-margin-top{margin-top:16px!important}.w3-margin-bottom{margin-bottom:16px!important}
.w3-margin-left{margin-left:16px!important}.w3-margin-right{margin-right:16px!important}
.w3-section{margin-top:16px!important;margin-bottom:16px!important}
.w3-padding-tiny{padding:2px 4px!important}
.w3-padding-small{padding:4px 8px!important}
.w3-padding-medium,.w3-padding,.w3-form{padding:8px 16px!important}
.w3-padding-large{padding:12px 24px!important}
.w3-padding-xlarge{padding:16px 32px!important}
.w3-padding-xxlarge{padding:24px 48px!important}
.w3-padding-jumbo{padding:32px 64px!important}
.w3-padding-4,.w3-padding-hor-4{padding-top:4px!important;padding-bottom:4px!important}
.w3-padding-8,.w3-padding-hor-8{padding-top:8px!important;padding-bottom:8px!important}
.w3-padding-12,.w3-padding-hor-12{padding-top:12px!important;padding-bottom:12px!important}
.w3-padding-16,.w3-padding-hor-16{padding-top:16px!important;padding-bottom:16px!important}
.w3-padding-24,.w3-padding-hor-24{padding-top:24px!important;padding-bottom:24px!important}
.w3-padding-32,.w3-padding-hor-32{padding-top:32px!important;padding-bottom:32px!important}
.w3-padding-48,.w3-padding-hor-48{padding-top:48px!important;padding-bottom:48px!important}
.w3-padding-64,.w3-padding-hor-64{padding-top:64px!important;padding-bottom:64px!important}
.w3-padding-128,.w3-padding-hor-128{padding-top:128px!important;padding-bottom:128px!important}
.w3-padding-0{padding:0!important}
/* Will be removed in a later version */ 
.w3-padding-ver-4{padding-left:4px!important;padding-right:4px!important}
.w3-padding-ver-8{padding-left:8px!important;padding-right:8px!important}
.w3-padding-ver-12{padding-left:12px!important;padding-right:12px!important}
.w3-padding-ver-16{padding-left:16px!important;padding-right:16px!important}
.w3-padding-ver-24{padding-left:24px!important;padding-right:24px!important}
.w3-padding-ver-32{padding-left:32px!important;padding-right:32px!important}
.w3-padding-ver-48{padding-left:48px!important;padding-right:48px!important}
.w3-padding-ver-64{padding-left:64px!important;padding-right:64px!important}
/* End remove */
.w3-padding-top{padding-top:8px!important}.w3-padding-bottom{padding-bottom:8px!important}
.w3-padding-left{padding-left:16px!important}.w3-padding-right{padding-right:16px!important}
.w3-topbar{border-top:6px solid #ccc!important}.w3-bottombar{border-bottom:6px solid #ccc!important}
.w3-leftbar{border-left:6px solid #ccc!important}.w3-rightbar{border-right:6px solid #ccc!important}
.w3-row-padding,.w3-row-padding>.w3-half,.w3-row-padding>.w3-third,.w3-row-padding>.w3-twothird,.w3-row-padding>.w3-threequarter,.w3-row-padding>.w3-quarter,.w3-row-padding>.w3-col{padding:0 8px}
.w3-spin{animation:w3-spin 2s infinite linear;-webkit-animation:w3-spin 2s infinite linear}
@-webkit-keyframes w3-spin{
0%{-webkit-transform:rotate(0deg);transform:rotate(0deg)}
100%{-webkit-transform:rotate(359deg);transform:rotate(359deg)}}
@keyframes w3-spin{
0%{-webkit-transform:rotate(0deg);transform: rotate(0deg)}
100%{-webkit-transform:rotate(359deg);transform:rotate(359deg)}}
.w3-container{padding:0.01em 16px}
.w3-example{background-color:#f1f1f1;padding:0.01em 16px}
.w3-code{font-family:Consolas,"courier new";font-size:16px;line-height:1.4;width:auto;background-color:#fff;padding:8px 12px;border-left:4px solid #009688;word-wrap:break-word}
.w3-example,.w3-code,.w3-reference{margin:20px 0}
.w3-card{border:1px solid #ccc}
.w3-card-2,.w3-example{box-shadow:0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important}
.w3-card-4,.w3-hover-shadow:hover{box-shadow:0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19)!important}
.w3-card-8{box-shadow:0 8px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19)!important}
.w3-card-12{box-shadow:0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19)!important}
.w3-card-16{box-shadow:0 16px 24px 0 rgba(0,0,0,0.22),0 25px 55px 0 rgba(0,0,0,0.21)!important}
.w3-card-24{box-shadow:0 24px 24px 0 rgba(0,0,0,0.2),0 40px 77px 0 rgba(0,0,0,0.22)!important}
.w3-animate-fading{-webkit-animation:fading 10s infinite;animation:fading 10s infinite}
@-webkit-keyframes fading{0%{opacity:0}50%{opacity:1}100%{opacity:0}}
@keyframes fading{0%{opacity:0}50%{opacity:1}100%{opacity:0}}
.w3-animate-opacity{-webkit-animation:opac 1.5s;animation:opac 1.5s}
@-webkit-keyframes opac{from{opacity:0} to{opacity:1}}
@keyframes opac{from{opacity:0} to{opacity:1}}
.w3-animate-top{position:relative;-webkit-animation:animatetop 0.4s;animation:animatetop 0.4s}
@-webkit-keyframes animatetop{from{top:-300px;opacity:0} to{top:0;opacity:1}}
@keyframes animatetop{from{top:-300px;opacity:0} to{top:0;opacity:1}}
.w3-animate-left{position:relative;-webkit-animation:animateleft 0.4s;animation:animateleft 0.4s}
@-webkit-keyframes animateleft{from{left:-300px;opacity:0} to{left:0;opacity:1}}
@keyframes animateleft{from{left:-300px;opacity:0} to{left:0;opacity:1}}
.w3-animate-right{position:relative;-webkit-animation:animateright 0.4s;animation:animateright 0.4s}
@-webkit-keyframes animateright{from{right:-300px;opacity:0} to{right:0;opacity:1}}
@keyframes animateright{from{right:-300px;opacity:0} to{right:0;opacity:1}}
.w3-animate-bottom{position:relative;-webkit-animation:animatebottom 0.4s;animation:animatebottom 0.4s}
@-webkit-keyframes animatebottom{from{bottom:-300px;opacity:0} to{bottom:0px;opacity:1}}
@keyframes animatebottom{from{bottom:-300px;opacity:0} to{bottom:0;opacity:1}}
.w3-animate-zoom {-webkit-animation:animatezoom 0.6s;animation:animatezoom 0.6s}
@-webkit-keyframes animatezoom{from{-webkit-transform:scale(0)} to{-webkit-transform:scale(1)}}
@keyframes animatezoom{from{transform:scale(0)} to{transform:scale(1)}}
.w3-animate-input{-webkit-transition:width 0.4s ease-in-out;transition:width 0.4s ease-in-out}.w3-animate-input:focus{width:100%!important}
.w3-transparent{background-color:transparent!important}
.w3-hover-none:hover{box-shadow:none!important;background-color:transparent!important}
.w3-amber,.w3-hover-amber:hover{color:#000!important;background-color:#ffc107!important}
.w3-aqua,.w3-hover-aqua:hover{color:#000!important;background-color:#00ffff!important}
.w3-blue,.w3-hover-blue:hover{color:#fff!important;background-color:#2196F3!important}
.w3-light-blue,.w3-hover-light-blue:hover{color:#000!important;background-color:#87CEEB!important}
.w3-brown,.w3-hover-brown:hover{color:#fff!important;background-color:#795548!important}
.w3-cyan,.w3-hover-cyan:hover{color:#000!important;background-color:#00bcd4!important}
.w3-blue-grey,.w3-hover-blue-grey:hover{color:#fff!important;background-color:#607d8b!important}
.w3-green,.w3-hover-green:hover{color:#fff!important;background-color:#4CAF50!important}
.w3-light-green,.w3-hover-light-green:hover{color:#000!important;background-color:#8bc34a!important}
.w3-indigo,.w3-hover-indigo:hover{color:#fff!important;background-color:#3f51b5!important}
.w3-khaki,.w3-hover-khaki:hover{color:#000!important;background-color:#faffbd!important}
.w3-lime,.w3-hover-lime:hover{color:#000!important;background-color:#cddc39!important}
.w3-orange,.w3-hover-orange:hover{color:#000!important;background-color:#ff9800!important}
.w3-deep-orange,.w3-hover-deep-orange:hover{color:#fff!important;background-color:#ff5722!important}
.w3-pink,.w3-hover-pink:hover{color:#fff!important;background-color:#e91e63!important}
.w3-purple,.w3-hover-purple:hover{color:#fff!important;background-color:#9c27b0!important}
.w3-deep-purple,.w3-hover-deep-purple:hover{color:#fff!important;background-color:#673ab7!important}
.w3-red,.w3-hover-red:hover{color:#fff!important;background-color:#f44336!important}
.w3-sand,.w3-hover-sand:hover{color:#000!important;background-color:#fdf5e6!important}
.w3-teal,.w3-hover-teal:hover{color:#fff!important;background-color:#009688!important}
.w3-yellow,.w3-hover-yellow:hover{color:#000!important;background-color:#ffeb3b!important}
.w3-white,.w3-hover-white:hover{color:#000!important;background-color:#fff!important}
.w3-black,.w3-hover-black:hover{color:#fff!important;background-color:#000!important}
.w3-grey,.w3-hover-grey:hover{color:#000!important;background-color:#9e9e9e!important}
.w3-light-grey,.w3-hover-light-grey:hover{color:#000!important;background-color:#f1f1f1!important}
.w3-dark-grey,.w3-hover-dark-grey:hover{color:#fff!important;background-color:#616161!important}
.w3-pale-red,.w3-hover-pale-red:hover{color:#000!important;background-color:#ffe7e7!important}.w3-pale-green,.w3-hover-pale-green:hover{color:#000!important;background-color:#e7ffe7!important}
.w3-pale-yellow,.w3-hover-pale-yellow:hover{color:#000!important;background-color:#ffffd7!important}.w3-pale-blue,.w3-hover-pale-blue:hover{color:#000!important;background-color:#e7ffff!important}
.w3-text-amber,.w3-hover-text-amber:hover{color:#ffc107!important}
.w3-text-aqua,.w3-hover-text-aqua:hover{color:#00ffff!important}
.w3-text-blue,.w3-hover-text-blue:hover{color:#2196F3!important}
.w3-text-light-blue,.w3-hover-text-light-blue:hover{color:#87CEEB!important}
.w3-text-brown,.w3-hover-text-brown:hover{color:#795548!important}
.w3-text-cyan,.w3-hover-text-cyan:hover{color:#00bcd4!important}
.w3-text-blue-grey,.w3-hover-text-blue-grey:hover{color:#607d8b!important}
.w3-text-green,.w3-hover-text-green:hover{color:#4CAF50!important}
.w3-text-light-green,.w3-hover-text-light-green:hover{color:#8bc34a!important}
.w3-text-indigo,.w3-hover-text-indigo:hover{color:#3f51b5!important}
.w3-text-khaki,.w3-hover-text-khaki:hover{color:#b4aa50!important}
.w3-text-lime,.w3-hover-text-lime:hover{color:#cddc39!important}
.w3-text-orange,.w3-hover-text-orange:hover{color:#ff9800!important}
.w3-text-deep-orange,.w3-hover-text-deep-orange:hover{color:#ff5722!important}
.w3-text-pink,.w3-hover-text-pink:hover{color:#e91e63!important}
.w3-text-purple,.w3-hover-text-purple:hover{color:#9c27b0!important}
.w3-text-deep-purple,.w3-hover-text-deep-purple:hover{color:#673ab7!important}
.w3-text-red,.w3-hover-text-red:hover{color:#f44336!important}
.w3-text-sand,.w3-hover-text-sand:hover{color:#fdf5e6!important}
.w3-text-teal,.w3-hover-text-teal:hover{color:#009688!important}
.w3-text-yellow,.w3-hover-text-yellow:hover{color:#d2be0e!important}
.w3-text-white,.w3-hover-text-white:hover{color:#fff!important}
.w3-text-black,.w3-hover-text-black:hover{color:#000!important}
.w3-text-grey,.w3-hover-text-grey:hover{color:#757575!important}
.w3-text-light-grey,.w3-hover-text-light-grey:hover{color:#f1f1f1!important}
.w3-text-dark-grey,.w3-hover-text-dark-grey:hover{color:#3a3a3a!important}
.w3-border-amber,.w3-hover-border-amber:hover{border-color:#ffc107!important}
.w3-border-aqua,.w3-hover-border-aqua:hover{border-color:#00ffff!important}
.w3-border-blue,.w3-hover-border-blue:hover{border-color:#2196F3!important}
.w3-border-light-blue,.w3-hover-border-light-blue:hover{border-color:#87CEEB!important}
.w3-border-brown,.w3-hover-border-brown:hover{border-color:#795548!important}
.w3-border-cyan,.w3-hover-border-cyan:hover{border-color:#00bcd4!important}
.w3-border-blue-grey,.w3-hover-blue-grey:hover{border-color:#607d8b!important}
.w3-border-green,.w3-hover-border-green:hover{border-color:#4CAF50!important}
.w3-border-light-green,.w3-hover-border-light-green:hover{border-color:#8bc34a!important}
.w3-border-indigo,.w3-hover-border-indigo:hover{border-color:#3f51b5!important}
.w3-border-khaki,.w3-hover-border-khaki:hover{border-color:#f0e68c!important}
.w3-border-lime,.w3-hover-border-lime:hover{border-color:#cddc39!important}
.w3-border-orange,.w3-hover-border-orange:hover{border-color:#ff9800!important}
.w3-border-deep-orange,.w3-hover-border-deep-orange:hover{border-color:#ff5722!important}
.w3-border-pink,.w3-hover-border-pink:hover{border-color:#e91e63!important}
.w3-border-purple,.w3-hover-border-purple:hover{border-color:#9c27b0!important}
.w3-border-deep-purple,.w3-hover-border-deep-purple:hover{border-color:#673ab7!important}
.w3-border-red,.w3-hover-border-red:hover{border-color:#f44336!important}
.w3-border-sand,.w3-hover-border-sand:hover{border-color:#fdf5e6!important}
.w3-border-teal,.w3-hover-border-teal:hover{border-color:#009688!important}
.w3-border-yellow,.w3-hover-border-yellow:hover{border-color:#ffeb3b!important}
.w3-border-white,.w3-hover-border-white:hover{border-color:#fff!important}
.w3-border-black,.w3-hover-border-black:hover{border-color:#000!important}
.w3-border-grey,.w3-hover-border-grey:hover{border-color:#9e9e9e!important}
.w3-border-light-grey,.w3-hover-border-light-grey:hover{border-color:#f1f1f1!important}
.w3-border-dark-grey,.w3-hover-border-dark-grey:hover{border-color:#616161!important}
.w3-border-pale-red,.w3-hover-border-pale-red:hover{border-color:#ffe7e7!important}.w3-border-pale-green,.w3-hover-border-pale-green:hover{border-color:#e7ffe7!important}
.w3-border-pale-yellow,.w3-hover-border-pale-yellow:hover{border-color:#ffffd7!important}.w3-border-pale-blue,.w3-hover-border-pale-blue:hover{border-color:#e7ffff!important}
.w3-opacity,.w3-hover-opacity:hover{opacity:0.60}
.w3-text-shadow{text-shadow:1px 1px 0 #444}.w3-text-shadow-white{text-shadow:1px 1px 0 #ddd}
/* General styles */

.nav {
	position: relative;
	width: 8em;
	margin: 0 0 0 3em;
}

.nav__item {
	line-height: 1;
	position: relative;
	display: block;
	margin: 0;
	padding: 0;
	letter-spacing: 0;
	color: currentColor;
	border: 0;
	background: none;
	-webkit-tap-highlight-color: rgba(0,0,0,0);
}

.nav__item:focus {
	outline: none;
}

/* Individual styles */

/*** Timiro ***/

.nav--timiro .nav__item {
	overflow: hidden;
	width: 1.5em;
	height: 1.5em;
	margin: 0.5em 0;
	border-radius: 50%;
	background: #fff;
	-webkit-transform: scale3d(0.5,0.5,1);
	transform: scale3d(0.5,0.5,1);
	-webkit-transition: -webkit-transform 0.5s;
	transition: transform 0.5s;
	-webkit-transition-timing-function: cubic-bezier(0.2,1,0.3,1);
	transition-timing-function: cubic-bezier(0.2,1,0.3,1);
}

.nav--timiro .nav__item--current,
.nav--timiro .nav__item:not(.nav__item--current):focus,
.nav--timiro .nav__item:not(.nav__item--current):hover {
	-webkit-transform: scale3d(1,1,1);
	transform: scale3d(1,1,1);
}

.nav--timiro .nav__item::before {
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: #ff5722;
	-webkit-transform: translate3d(0,100%,0);
	transform: translate3d(0,100%,0);
	-webkit-transition: -webkit-transform 0.5s;
	transition: transform 0.5s;
	-webkit-transition-timing-function: cubic-bezier(0.2,1,0.3,1);
	transition-timing-function: cubic-bezier(0.2,1,0.3,1);
}

.nav--timiro .nav__item--current::before {
	-webkit-transform: translate3d(0,0,0);
	transform: translate3d(0,0,0);
}

/*** Shamso ***/

.nav--shamso .nav__item {
	width: 2.25em;
	height: 2.25em;
}

.nav--shamso .nav__item::before,
.nav--shamso .nav__item::after {
	content: '';
	position: absolute;
	border-radius: 50%;
}

.nav--shamso .nav__item::before {
	top: 25%;
	left: 25%;
	width: 50%;
	height: 50%;
	background: #ff5722;
	-webkit-transition: -webkit-transform 0.5s;
	transition: transform 0.5s;
	-webkit-transition-timing-function: cubic-bezier(0.2,1,0.3,1);
	transition-timing-function: cubic-bezier(0.2,1,0.3,1);
}

.nav--shamso .nav__item:not(.nav__item--current):focus::before,
.nav--shamso .nav__item:not(.nav__item--current):hover::before {
	-webkit-transform: scale3d(1.35,1.35,1);
	transform: scale3d(1.35,1.35,1);
}

.nav--shamso .nav__item--current::before {
	-webkit-transform: scale3d(0.35,0.35,1);
	transform: scale3d(0.35,0.35,1);
}

.nav--shamso .nav__item::after {
	top: 10%;
	left: 10%;
	width: 80%;
	height: 80%;
	opacity: 0;
	box-shadow: inset 0 0 0 3px #ff5722;
	-webkit-transform: scale3d(0.35,0.35,1);
	transform: scale3d(0.35,0.35,1);
	-webkit-transition: -webkit-transform 0.5s, box-shadow 0.5s, opacity 0.5s;
	transition: transform 0.5s, box-shadow 0.5s, opacity 0.5s;
	-webkit-transition-timing-function: cubic-bezier(0.2,1,0.3,1);
	transition-timing-function: cubic-bezier(0.2,1,0.3,1);
}

.nav--shamso .nav__item--current::after {
	opacity: 1;
	box-shadow: inset 0 0 0 3px #ff5722;
	-webkit-transform: scale3d(1,1,1);
	transform: scale3d(1,1,1);
}

.nav--shamso .nav__item-title {
	font-weight: bold;
	line-height: 1.5;
	display: block;
	margin: 0 0 0 2.5em;
	white-space: nowrap;
	pointer-events: none;
	opacity: 0;
	color: #ff5722;
	-webkit-transform: scale3d(0.1,0.1,1);
	transform: scale3d(0.1,0.1,1);
	-webkit-transform-origin: 50% 50%;
	transform-origin: 50% 50%;
	-webkit-transition: opacity 0.5s, -webkit-transform 0.5s;
	transition: opacity 0.5s, transform 0.5s;
	-webkit-transition-timing-function: cubic-bezier(0.2,1,0.3,1);
	transition-timing-function: cubic-bezier(0.2,1,0.3,1);
}

.nav--shamso .nav__item--current .nav__item-title {
	opacity: 1;
	-webkit-transform: scale3d(1,1,1);
	transform: scale3d(1,1,1);
	-webkit-transition-delay: 0.1s;
	transition-delay: 0.1s;
}

/*** Maxamed ***/

.nav--maxamed .nav__item {
	width: 2.25em;
	height: 2.25em;
}

.nav--maxamed .nav__item::before {
	content: '';
	position: absolute;
	top: 0.75em;
	right: 0;
	width: 1em;
	height: 1em;
	box-shadow: inset 0 0 0 6px #609279;
	border-radius: 50%;
	-webkit-transition: -webkit-transform 0.3s, box-shadow 0.3s;
	transition: transform 0.3s, box-shadow 0.3s;
}

.nav--maxamed .nav__item:not(.nav__item--current):focus::before,
.nav--maxamed .nav__item:not(.nav__item--current):hover::before {
	box-shadow: inset 0 0 0 6px #4b7560;
}

.nav--maxamed .nav__item--current::before {
	-webkit-transform: scale3d(1.75,1.75,1);
	transform: scale3d(1.75,1.75,1);
	box-shadow: inset 0 0 0 1px #609279;
}

.nav--maxamed .nav__item-title {
	position: absolute;
	left: 3.5em;
	top: 0;
	pointer-events: none;
	padding: 0.75em 0;
	font-weight: bold;
	white-space: nowrap;
	-webkit-transform-origin: 0 50%;
	transform-origin: 0 50%;
	opacity: 0;
	-webkit-transform: scale3d(0.5,0.5,1);
	transform: scale3d(0.5,0.5,1);
	-webkit-transition: opacity 0.5s, -webkit-transform 0.5s;
	transition: opacity 0.5s, transform 0.5s;
	-webkit-transition-timing-function: cubic-bezier(0.2,1,0.3,1);
	transition-timing-function: cubic-bezier(0.2,1,0.3,1);
}

.nav--maxamed .nav__item--current .nav__item-title {
	opacity: 1;
	-webkit-transform: scale3d(1,1,1);
	transform: scale3d(1,1,1);
}

/*** Xusni ***/

.nav--xusni .nav__item {
	width: 3em;
	height: 1.25em;
	margin: 0.5em 0;
}

.nav--xusni .nav__item::after {
	content: '';
	position: absolute;
	top: 35%;
	left: 0;
	width: 100%;
	height: 30%;
	background: #3c4a9a;
	-webkit-transform-origin: 0 0;
	transform-origin: 0 0;
	-webkit-transition: -webkit-transform 0.5s, background-color 0.5s;
	transition: transform 0.5s, background-color 0.5s;
	-webkit-transition-timing-function: cubic-bezier(0.7,0,0.3,1);
	transition-timing-function: cubic-bezier(0.7,0,0.3,1);
}

.nav--xusni .nav__item:not(.nav__item--current):hover::after,
.nav--xusni .nav__item:not(.nav__item--current):focus::after {
	background: #212956;
	-webkit-transition: background-color 0.3s;
	transition: background-color 0.3s;
}

.nav--xusni .nav__item--current::after {
	background: #212956;
	-webkit-transform: scale3d(0.2,1,1);
	transform: scale3d(0.2,1,1);
}

.nav--xusni .nav__item-title {
	margin: 0 0 0 1em;
	opacity: 0;
	display: block;
	-webkit-transform: translate3d(2em,0,0);
	transform: translate3d(2em,0,0);
	-webkit-transition: opacity 0.5s, -webkit-transform 0.5s;
	transition: opacity 0.5s, transform 0.5s;
	-webkit-transition-timing-function: cubic-bezier(0.7,0,0.3,1);
	transition-timing-function: cubic-bezier(0.7,0,0.3,1);
}

.nav--xusni .nav__item--current .nav__item-title {
	-webkit-transition-delay: 0.1s;
	transition-delay: 0.1s;
	opacity: 1;
	-webkit-transform: translate3d(0,0,0);
	transform: translate3d(0,0,0);
}

/*** Magool ***/

.nav--magool .nav__item {
	width: 1.5em;
	height: 1.25em;
}

.nav--magool .nav__item::after {
	content: '';
	position: absolute;
	top: 45%;
	left: 0;
	width: 100%;
	height: 10%;
	background: #949a52;
	-webkit-transform-origin: 0 0;
	transform-origin: 0 0;
	-webkit-transition: -webkit-transform 0.5s, background-color 0.5s;
	transition: transform 0.5s, background-color 0.5s;
	-webkit-transition-timing-function: cubic-bezier(0.2,1,0.3,1);
	transition-timing-function: cubic-bezier(0.2,1,0.3,1);
}

.nav--magool .nav__item:not(.nav__item--current):focus::after,
.nav--magool .nav__item:not(.nav__item--current):hover::after {
	background: #707539;
}

.nav--magool .nav__item:not(.nav__item--current):hover::after {
	-webkit-transform: scale3d(2,1,1);
	transform: scale3d(2,1,1);
}

.nav--magool .nav__item--current::after {
	background: #333;
	-webkit-transform: scale3d(2,1,1);
	transform: scale3d(2,1,1);
}

/*** Ubax ***/

.nav--ubax .nav__item {
	width: 1.5em;
	height: 1.5em;
}

.nav--ubax .nav__item::after {
	content: '';
	position: absolute;
	top: 2px;
	left: 2px;
	width: calc(100% - 4px);
	height: calc(100% - 4px);
	border: 2px solid transparent;
	background: #ddddda;
}

.nav--ubax .nav__item--current::after {
	z-index: 10;
	border-color: #31312f;
	background: #e9eae5;
	-webkit-transform: scale3d(1.5,1.5,1);
	transform: scale3d(1.5,1.5,1);
	-webkit-transition: -webkit-transform 0.3s, background-color 0.3s, border-color 0.3s;
	transition: transform 0.3s, background-color 0.3s, border-color 0.3s;
}

.nav--ubax .nav__item:not(.nav__item--current):focus::after,
.nav--ubax .nav__item:not(.nav__item--current):hover::after {
	background: #31312f;
	-webkit-transition: -webkit-transform 0.3s, background-color 0.3s;
	transition: transform 0.3s, background-color 0.3s;
}

.nav--ubax .nav__item-title {
	line-height: 1.5;
	display: block;
	padding: 0 0 0 2.5em;
	white-space: nowrap;
	pointer-events: none;
	opacity: 0;
	-webkit-transform: translate3d(-20px,0,0);
	transform: translate3d(-20px,0,0);
	-webkit-transition: -webkit-transform 0.3s, opacity 0.3s;
	transition: transform 0.3s, opacity 0.3s;
}

.nav--ubax .nav__item:not(.nav__item--current):focus .nav__item-title,
.nav--ubax .nav__item:not(.nav__item--current):hover .nav__item-title {
	opacity: 0.25;
	-webkit-transform: translate3d(0,0,0);
	transform: translate3d(0,0,0);
}

.nav--ubax .nav__item--current .nav__item-title {
	opacity: 1;
	-webkit-transform: translate3d(0,0,0);
	transform: translate3d(0,0,0);
}

/*** Zahi ***/

.nav--zahi .nav__item {
	width: 2em;
	height: 2em;
}

.nav--zahi .nav__item::before,
.nav--zahi .nav__item::after {
	content: '';
	position: absolute;
}

.nav--zahi .nav__item:not(:last-child)::before {
	top: calc(2em - 9px);
	left: 5px;
	width: 2px;
	height: calc(2em - 12px);
	background: #98322a;
}

.nav--zahi .nav__item::after {
	top: 50%;
	left: 0;
	width: 12px;
	height: 12px;
	margin: -5px 0 0 0;
	border: 2px solid #98322a;
	border-radius: 50%;
	background: #f44336;
	-webkit-transition: -webkit-transform 0.3s, border-color 0.3s, border-width 0.3s, background 0.3s;
	transition: transform 0.3s, border-color 0.3s, border-width 0.3s, background 0.3s;
}

.nav--zahi .nav__item--current::after {
	border-width: 1px;
	border-color: #fff;
	-webkit-transform: scale3d(1.6,1.6,1);
	transform: scale3d(1.6,1.6,1);
}

.nav--zahi .nav__item:not(.nav__item--current):focus::after,
.nav--zahi .nav__item:not(.nav__item--current):hover::after {
	border-color: #fff;
	background: #fff;
}

.nav--zahi .nav__item-title {
	font-family: 'Roboto Condensed', sans-serif;
	line-height: 1.5;
	display: block;
	position: relative;
	padding: 0 0 0 2.5em;
	white-space: nowrap;
	opacity: 0.3;
	color: #98322a;
	-webkit-transition: opacity 0.3s, color 0.3s;
	transition: opacity 0.3s, color 0.3s;
}

.nav--zahi .nav__item:not(.nav__item--current):focus .nav__item-title,
.nav--zahi .nav__item:not(.nav__item--current):hover .nav__item-title {
	opacity: 0.5;
}

.nav--zahi .nav__item--current .nav__item-title {
	opacity: 1;
	color: #fff;
}

/*** Beca ***/

.nav--beca {
	position: absolute;
	top: 50%;
	left: 0;
	margin: 0;
	-webkit-transform: translate3d(0,-50%,0);
	transform: translate3d(0,-50%,0);
}

.nav--beca .nav__item {
	width: 5em;
	height: 1.5em;
}

.nav--beca .nav__item::before {
	content: '';
	position: absolute;
	top: 50%;
	left: 0;
	width: 50%;
	height: 2px;
	margin: -1px 0 0 0;
	opacity: 0.5;
	background: #fff;
	-webkit-transform: scale3d(0.5,1,1);
	transform: scale3d(0.5,1,1);
	-webkit-transform-origin: 0% 50%;
	transform-origin: 0% 50%;
	-webkit-transition: -webkit-transform 0.5s, opacity 0.5s;
	transition: transform 0.5s, opacity 0.5s;
	-webkit-transition-timing-function: cubic-bezier(0.2,1,0.3,1);
	transition-timing-function: cubic-bezier(0.2,1,0.3,1);
}

.nav--beca .nav__item:not(.nav__item--current):focus::before,
.nav--beca .nav__item:not(.nav__item--current):hover::before {
	opacity: 1;
	-webkit-transform: scale3d(0.75,1,1);
	transform: scale3d(0.75,1,1);
}

.nav--beca .nav__item--current::before {
	opacity: 1;
	-webkit-transform: scale3d(2,1,1);
	transform: scale3d(2,1,1);
}

.nav--beca .nav__item-title {
	font-size: 1.25em;
	font-weight: bold;
	display: block;
	overflow: hidden;
	margin: -1.15em 0 0 1.6em;
	text-align: left;
	white-space: nowrap;
	pointer-events: none;
}

.nav--beca .nav__item-title span {
	display: block;
	-webkit-transform: translate3d(0,100%,0);
	transform: translate3d(0,100%,0);
	-webkit-transition: -webkit-transform 0.5s;
	transition: transform 0.5s;
	-webkit-transition-timing-function: cubic-bezier(0.2,1,0.3,1);
	transition-timing-function: cubic-bezier(0.2,1,0.3,1);
}

.nav--beca .nav__item--current .nav__item-title span {
	-webkit-transform: translate3d(0,0,0);
	transform: translate3d(0,0,0);
}

/*** Etefu ***/

.nav--etefu .nav__item {
	width: 2.5em;
	height: 3em;
	margin: 1em 0;
}

.nav--etefu .nav__item-inner {
	position: relative;
	display: block;
	overflow: hidden;
	width: 0.25em;
	height: 100%;
	margin: 0 0 0 1em;
	background: #4fc369;
	opacity: 0.7;
	-webkit-transition: opacity 0.3s;
    transition: opacity 0.3s;
}

.nav--etefu .nav__item:not(.nav__item--current):focus .nav__item-inner,
.nav--etefu .nav__item:not(.nav__item--current):hover .nav__item-inner{
	opacity: 1;
}

.nav--etefu .nav__item-inner::before {
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: #326b3f;
	-webkit-transform: translate3d(0,100%,0);
	transform: translate3d(0,100%,0);
	-webkit-transition: -webkit-transform 0.5s;
	transition: transform 0.5s;
	-webkit-transition-timing-function: cubic-bezier(0.2,1,0.3,1);
	transition-timing-function: cubic-bezier(0.2,1,0.3,1);
}

.nav--etefu .nav__item--current .nav__item-inner::before {
	-webkit-transform: translate3d(0,0,0);
	transform: translate3d(0,0,0);
}

.nav--etefu .nav__item-title {
	font-weight: bold;
	position: absolute;
	top: 0;
	left: 115%;
	width: 2em;
	font-size: 1.5em;
	opacity: 0;
	color: #4fc369;
	font-family: 'Roboto Condensed', sans-serif;
	-webkit-transform: rotate3d(0,0,1,90deg) translate3d(1em,0,0);
	transform: rotate3d(0,0,1,90deg) translate3d(1em,0,0);
	-webkit-transform-origin: 0 0;
	transform-origin: 0 0;
	-webkit-transition: -webkit-transform 0.5s, opacity 0.5s;
	transition: transform 0.5s, opacity 0.5s;
	-webkit-transition-timing-function: cubic-bezier(0.2,1,0.3,1);
	transition-timing-function: cubic-bezier(0.2,1,0.3,1);
}

.nav--etefu .nav__item--current .nav__item-title {
	opacity: 1;
	-webkit-transform: rotate3d(0,0,1,90deg);
	transform: rotate3d(0,0,1,90deg);
}

/*** Meklit ***/

.nav--meklit {
	position: absolute;
	top: 0;
	left: 0;
	display: -webkit-flex;
	display: flex;
	-webkit-flex-direction: column;
	flex-direction: column;
	-webkit-align-content: stretch;
	align-content: stretch;
	height: 100%;
	margin: 0;
}

.nav--meklit .nav__item {
	-webkit-flex: 1;
	flex: 1;
	width: 6em;
	height: 1.5em;
}

.nav--meklit .nav__item::before {
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	opacity: 0.5	;
	background: #141417;
	-webkit-transform: scale3d(0.2,1,1);
	transform: scale3d(0.2,1,1);
	-webkit-transform-origin: 0% 50%;
	transform-origin: 0% 50%;
	-webkit-transition: -webkit-transform 0.5s, opacity 0.5s;
	transition: transform 0.5s, opacity 0.5s;
	-webkit-transition-timing-function: cubic-bezier(0.2,1,0.3,1);
	transition-timing-function: cubic-bezier(0.2,1,0.3,1);
}

.nav--meklit .nav__item:nth-child(odd)::before {
	background: #0a0a0c;
}

.nav--meklit .nav__item:not(.nav__item--current):focus::before,
.nav--meklit .nav__item:not(.nav__item--current):hover::before {
	opacity: 1;
	-webkit-transform: scale3d(0.35,1,1);
	transform: scale3d(0.35,1,1);
}

.nav--meklit .nav__item--current::before {
	opacity: 1;
	-webkit-transform: scale3d(1,1,1);
	transform: scale3d(1,1,1);
}

.nav--meklit .nav__item-title {
	font-size: 1.25em;
	font-weight: bold;
	display: block;
	overflow: hidden;
	text-align: center;
	white-space: nowrap;
	pointer-events: none;
	-webkit-transform: rotate3d(0,0,1,-90deg);
	transform: rotate3d(0,0,1,-90deg);
}

.nav--meklit .nav__item-title span {
	display: block;
	-webkit-transform: translate3d(0,100%,0);
	transform: translate3d(0,100%,0);
	-webkit-transition: -webkit-transform 0.5s;
	transition: transform 0.5s;
	-webkit-transition-timing-function: cubic-bezier(0.2,1,0.3,1);
	transition-timing-function: cubic-bezier(0.2,1,0.3,1);
}

.nav--meklit .nav__item--current .nav__item-title span {
	-webkit-transform: translate3d(0,0,0);
	transform: translate3d(0,0,0);
}

/*** Mariame ***/

.nav--mariame .nav__item {
	height: 2.25em;
	margin: 0 0 1em 0;
	-webkit-perspective: 500px;
	perspective: 500px;
}

.nav--mariame .nav__item::before,
.nav--mariame .nav__item::after {
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	width: 1.75em;
	height: 2.25em;
	border: 2px solid #5050b9;
	background: #a9a9d4;
}

.nav--mariame .nav__item::before {
	-webkit-transition: background-color 0s 0.2s;
	transition: background-color 0s 0.2s;
}

.nav--mariame .nav__item--current::before {
	background: #f3f3f3;
	-webkit-transition: none;
	transition: none;
}

.nav--mariame .nav__item::after {
	box-shadow: 0px 0 9px -4px rgba(0,0,0,0);
	-webkit-transform-origin: 1px 50%;
	transform-origin: 1px 50%;
	-webkit-transition: -webkit-transform 0.5s, background-color 0s 0.15s, box-shadow 0.5s;
	transition: transform 0.5s, background-color 0s 0.15s, box-shadow 0.5s;
}

.nav--mariame .nav__item:not(.nav__item--current):hover::after,
.nav--mariame .nav__item:not(.nav__item--current):focus::after {
	box-shadow: 6px 0 9px -4px rgba(0,0,0,0.2);
	-webkit-transform: rotate3d(0,1,0,-15deg);
	transform: rotate3d(0,1,0,-15deg);
}

.nav--mariame .nav__item--current::after {
	background-color: #f3f3f3;
	box-shadow: 6px 0 9px -4px rgba(0,0,0,0.2);
	-webkit-transform: rotate3d(0,1,0,-145deg);
	transform: rotate3d(0,1,0,-145deg);
}

.nav--mariame .nav__item-title {
	font-size: 0.75em;
	font-weight: bold;
	margin: 0 0 0 3.5em;
	white-space: nowrap;
	display: block;
	opacity: 0.2;
	color: #5050b9;
	-webkit-transition: opacity 0.5s;
	transition: opacity 0.5s;
	-webkit-transition-timing-function: cubic-bezier(0.2,1,0.3,1);
	transition-timing-function: cubic-bezier(0.2,1,0.3,1);
}

.nav--mariame .nav__item:not(.nav__item--current):focus .nav__item-title,
.nav--mariame .nav__item:not(.nav__item--current):hover .nav__item-title {
	opacity: 0.5;
}

.nav--mariame .nav__item--current .nav__item-title {
	opacity: 1;
}

/*** Desta ***/

.nav--desta .nav__item {
	width: 5em;
	height: 3.5em;
}

.nav--desta .nav__icon {
	position: absolute;
	top: 1em;
	left: 0;
	width: 1.5em;
	height: 1.5em;
	-webkit-transform: rotate3d(0,0,1,-90deg);
	transform: rotate3d(0,0,1,-90deg);
	-webkit-transition: -webkit-transform 0.5s, fill 0.5s;
	transition: transform 0.5s, fill 0.5s;
	-webkit-transition-timing-function: cubic-bezier(0.2,1,0.3,1);
	transition-timing-function: cubic-bezier(0.2,1,0.3,1);
	fill: currentColor;
}

.nav--desta .nav__item:not(.nav__item--current):focus .nav__icon,
.nav--desta .nav__item:not(.nav__item--current):hover .nav__icon {
	fill: #fff;
}

.nav--desta .nav__item--current .nav__icon {
	-webkit-transform: rotate3d(0,0,1,0deg);
	transform: rotate3d(0,0,1,0deg);
	fill: #fff;
}

.nav--desta .nav__item-title {
	font-family: 'Roboto Condensed', sans-serif;
	line-height: 2;
	display: block;
	margin: 0 0 0 2.25em;
	white-space: nowrap;
	letter-spacing: 2px;
	text-transform: uppercase;
	opacity: 0;
	color: #f39468;
	-webkit-transform: translate3d(-10px,-10px,0);
	transform: translate3d(-10px,-10px,0);
	-webkit-transition: -webkit-transform 0.5s, opacity 0.5s;
	transition: transform 0.5s, opacity 0.5s;
	-webkit-transition-timing-function: cubic-bezier(0.2,1,0.3,1);
	transition-timing-function: cubic-bezier(0.2,1,0.3,1);
}

.nav--desta .nav__item-title:first-letter {
	color: #fff;
}

.nav--desta .nav__item--current .nav__item-title {
	opacity: 1;
	-webkit-transform: translate3d(0,0,0);
	transform: translate3d(0,0,0);
}

/*** Hagos ***/

.nav--hagos .nav__item {
	width: 2em;
	height: 2em;
}

.nav--hagos .nav__item::before {
	content: '';
	position: absolute;
	top: 25%;
	left: 0;
	width: 50%;
	height: 50%;
	border-radius: 50%;
	background: #7cb9a6;
	-webkit-transition: background 0.5s;
	transition: background 0.5s;
	-webkit-transition-timing-function: cubic-bezier(0.2,1,0.3,1);
	transition-timing-function: cubic-bezier(0.2,1,0.3,1);
}

.nav--hagos .nav__item--current::before,
.nav--hagos .nav__item:not(.nav__item--current):focus::before,
.nav--hagos .nav__item:not(.nav__item--current):hover::before {
	background: #9c7e64;
}

.nav--hagos .nav__icon {
	position: absolute;
	top: -85%;
	left: 65%;
	width: 225%;
	height: 125%;
	pointer-events: none;
	opacity: 0;
	-webkit-transform: scale3d(0,0,1);
	transform: scale3d(0,0,1);
	-webkit-transform-origin: 0 100%;
	transform-origin: 0 100%;
	-webkit-transition: opacity 0.5s, -webkit-transform 0.5s;
	transition: opacity 0.5s, transform 0.5s;
	-webkit-transition-timing-function: cubic-bezier(0.2,1,0.3,1);
	transition-timing-function: cubic-bezier(0.2,1,0.3,1);
	fill: #9c7e64;
}

.nav--hagos .nav__item--current .nav__icon {
	opacity: 1;
	-webkit-transform: scale3d(1,1,1);
	transform: scale3d(1,1,1);
}

.nav--hagos .nav__item-title {
	font-weight: bold;
	position: absolute;
	top: -55%;
	left: 65%;
	width: 225%;
	white-space: nowrap;
	pointer-events: none;
	opacity: 0;
	color: #9c7e64;
	-webkit-transform: scale3d(0,0,1);
	transform: scale3d(0,0,1);
	-webkit-transform-origin: 0 100%;
	transform-origin: 0 100%;
	-webkit-transition: -webkit-transform 0.5s, opacity 0.5s;
	transition: transform 0.5s, opacity 0.5s;
	-webkit-transition-timing-function: cubic-bezier(0.2,1,0.3,1);
	transition-timing-function: cubic-bezier(0.2,1,0.3,1);
}

.nav--hagos .nav__item--current .nav__item-title {
	opacity: 1;
	-webkit-transform: scale3d(1,1,1);
	transform: scale3d(1,1,1);
}

/*** Berta ***/
.nav--berta {
	width: 12em;
	margin: 0;
}

.nav--berta .nav__item {
	width: 100%;
	height: 2em;
}

.nav--berta .nav__item::before {
	content: '';
	position: absolute;
	top: 50%;
	right: 0;
	width: 100%;
	height: 4px;
	margin: -3px 0 0 0;
	pointer-events: none;
	opacity: 0.5;
	background: #e53e30;
	-webkit-transform: scale3d(0.2,1,1);
	transform: scale3d(0.2,1,1);
	-webkit-transform-origin: 0% 50%;
	transform-origin: 0% 50%;
	-webkit-transition: opacity 0.3s;
	transition: opacity 0.3s;
}

.nav--berta .nav__item:not(.nav__item--current):focus::before,
.nav--berta .nav__item:not(.nav__item--current):hover::before {
	opacity: 1;
}

.nav--berta .nav__item--current::before {
	opacity: 1;
	-webkit-animation: moveScale 0.5s ease-in forwards;
	animation: moveScale 0.5s ease-in forwards;
}

@-webkit-keyframes moveScale {
	50% {
		right: auto;
		left: 0;
		-webkit-transform: scale3d(1,1,1);
		transform: scale3d(1,1,1);
		-webkit-transform-origin: 0% 50%;
		transform-origin: 0% 50%;
	}
	51% {
		right: 0;
		left: auto;
		-webkit-transform: scale3d(1,1,1);
		transform: scale3d(1,1,1);
		-webkit-transform-origin: 100% 50%;
		transform-origin: 100% 50%;
		-webkit-animation-timing-function: cubic-bezier(0.2,1,0.3,1);
		animation-timing-function: cubic-bezier(0.2,1,0.3,1);
	}
	100% {
		right: 0;
		left: auto;
		-webkit-transform: scale3d(0.2,1,1);
		transform: scale3d(0.2,1,1);
		-webkit-transform-origin: 100% 50%;
		transform-origin: 100% 50%;
	}
}

@keyframes moveScale {
	50% {
		right: auto;
		left: 0;
		-webkit-transform: scale3d(1,1,1);
		transform: scale3d(1,1,1);
		-webkit-transform-origin: 0% 50%;
		transform-origin: 0% 50%;
	}
	51% {
		right: 0;
		left: auto;
		-webkit-transform: scale3d(1,1,1);
		transform: scale3d(1,1,1);
		-webkit-transform-origin: 100% 50%;
		transform-origin: 100% 50%;
		-webkit-animation-timing-function: cubic-bezier(0.2,1,0.3,1);
		animation-timing-function: cubic-bezier(0.2,1,0.3,1);
	}
	100% {
		right: 0;
		left: auto;
		-webkit-transform: scale3d(0.2,1,1);
		transform: scale3d(0.2,1,1);
		-webkit-transform-origin: 100% 50%;
		transform-origin: 100% 50%;
	}
}

.nav--berta .nav__item-title {
	font-family: 'Roboto Condensed', sans-serif;
	font-weight: bold;
	display: block;
	padding: 0 0 0 0.75em;
	text-align: left;
	white-space: nowrap;
	letter-spacing: 2px;
	text-transform: uppercase;
	pointer-events: none;
	opacity: 0;
	color: #ffe7db;
	-webkit-transform: translate3d(-100px,0,0);
	transform: translate3d(-100px,0,0);
}

.nav--berta .nav__item--current .nav__item-title {
	-webkit-animation: moveToRight 0.5s 0.2s forwards;
	animation: moveToRight 0.5s 0.2s forwards;
}

@-webkit-keyframes moveToRight {
	100% {
		opacity: 1;
		-webkit-transform: translate3d(0,0,0);
		transform: translate3d(0,0,0);
		-webkit-animation-timing-function: cubic-bezier(0.2,1,0.3,1);
		animation-timing-function: cubic-bezier(0.2,1,0.3,1);
	}
}

@keyframes moveToRight {
	100% {
		opacity: 1;
		-webkit-transform: translate3d(0,0,0);
		transform: translate3d(0,0,0);
		-webkit-animation-timing-function: cubic-bezier(0.2,1,0.3,1);
		animation-timing-function: cubic-bezier(0.2,1,0.3,1);
	}
}

/* Aman */
.nav--aman {
	font-size: 1.5em;
	margin: 0 0 0 1em;
	padding: 0 0 0 1em;
}

.nav--aman .nav__item {
	width: 2em;
	height: 2em;
	opacity: 0.8;
	background: url(../img/image.svg) no-repeat 50% 50%;
	background-size: auto 50%;
	-webkit-transition: -webkit-transform 0.5s, opacity 0.5s;
	transition: transform 0.5s, opacity 0.5s;
	-webkit-animation-timing-function: cubic-bezier(0.2,1,0.3,1);
	animation-timing-function: cubic-bezier(0.2,1,0.3,1);
}

.nav--aman .nav__item:not(.nav__item--current):focus,
.nav--aman .nav__item:not(.nav__item--current):hover {
	opacity: 1;
	-webkit-transform: scale3d(1.25,1.25,1);
	transform: scale3d(1.25,1.25,1);
}

.nav--aman .nav__item--current {
	pointer-events: none;
	opacity: 1;
	-webkit-transform: scale3d(1.85,1.85,1);
	transform: scale3d(1.85,1.85,1);
}

.nav--aman .nav__pointer {
	position: absolute;
	top: 0;
	left: 0;
	width: 2em;
	height: 2em;
	margin: 0.45em 0 0 1.25em;
	-webkit-transition: -webkit-transform 0.5s;
	transition: transform 0.5s;
	-webkit-animation-timing-function: cubic-bezier(0.2,1,0.3,1);
	animation-timing-function: cubic-bezier(0.2,1,0.3,1);
}

.nav--aman .nav__item--current:nth-child(2) ~ .nav__pointer {
	-webkit-transform: translate3d(0,100%,0);
	transform: translate3d(0,100%,0);
}

.nav--aman .nav__item--current:nth-child(3) ~ .nav__pointer {
	-webkit-transform: translate3d(0,200%,0);
	transform: translate3d(0,200%,0);
}

.nav--aman .nav__item--current:nth-child(4) ~ .nav__pointer {
	-webkit-transform: translate3d(0,300%,0);
	transform: translate3d(0,300%,0);
}

.nav--aman .nav__item--current:nth-child(5) ~ .nav__pointer {
	-webkit-transform: translate3d(0,400%,0);
	transform: translate3d(0,400%,0);
}

.nav--aman .nav__icon {
	display: block;
	width: 90%;
	height: 90%;
	fill: #94938a;
}

/* Kafa */

.nav--kafa .nav__item {
	margin: 0.5em 0;
}

.nav--kafa .nav__item--current {
	pointer-events: none;
}

.nav--kafa .nav__item-inner {
	display: block;
	overflow: hidden;
	width: 2.85em;
	height: 2.85em;
	opacity: 0.6;
	border-radius: 50%;
	background: #b5daab;
	-webkit-transform: scale3d(0.65,0.65,1);
	transform: scale3d(0.65,0.65,1);
	-webkit-transition: -webkit-transform 0.5s, opacity 0.3s;
	transition: transform 0.5s, opacity 0.3s;
	-webkit-animation-timing-function: cubic-bezier(0.2,1,0.3,1);
	animation-timing-function: cubic-bezier(0.2,1,0.3,1);
}

.nav--kafa .nav__item:not(.nav__item--current):focus .nav__item-inner,
.nav--kafa .nav__item:not(.nav__item--current):hover .nav__item-inner {
	opacity: 1;
}

.nav--kafa .nav__item--current .nav__item-inner {
	opacity: 1;
	-webkit-transform: scale3d(1,1,1);
	transform: scale3d(1,1,1);
}

.nav--kafa .nav__item-img {
	display: block;
	width: 2.5em;
	margin: 0.5em auto 0;
	-webkit-transform: translate3d(0,100%,0);
	transform: translate3d(0,100%,0);
	-webkit-transition: -webkit-transform 0.5s;
	transition: transform 0.5s;
	-webkit-animation-timing-function: cubic-bezier(0.2,1,0.3,1);
	animation-timing-function: cubic-bezier(0.2,1,0.3,1);
}

.nav--kafa .nav__item--current .nav__item-img {
	-webkit-transform: translate3d(0,0,0);
	transform: translate3d(0,0,0);
}

.nav--kafa .nav__item-title {
	font-weight: bold;
	line-height: 2.85em;
	position: absolute;
	top: 0;
	left: 3.75em;
	white-space: nowrap;
	pointer-events: none;
	opacity: 0;
	-webkit-transform: translate3d(-15px,0,0);
	transform: translate3d(-15px,0,0);
	-webkit-transition: -webkit-transform 0.5s, opacity 0.5s;
	transition: transform 0.5s, opacity 0.5s;
	-webkit-animation-timing-function: cubic-bezier(0.2,1,0.3,1);
	animation-timing-function: cubic-bezier(0.2,1,0.3,1);
}

.nav--kafa .nav__item--current .nav__item-title {
	opacity: 1;
	-webkit-transform: translate3d(0,0,0);
	transform: translate3d(0,0,0);
}

/* Totit */

.nav--totit .nav__item {
	width: 2.5em;
	height: 2.5em;
	margin: 0.5em 0;
}

.nav--totit .nav__item::before {
	content: '';
	position: absolute;
	top: 50%;
	left: 50%;
	width: 0.65em;
	height: 0.65em;
	margin: -0.325em 0 0 -0.325em;
	border-radius: 50%;
	background: #fff;
	-webkit-transition: -webkit-transform 0.3s, opacity 0.3s;
	transition: transform 0.3s, opacity 0.3s;
	-webkit-animation-timing-function: cubic-bezier(0.2,1,0.3,1);
	animation-timing-function: cubic-bezier(0.2,1,0.3,1);
}

.nav--totit .nav__item:not(.nav__item--current):focus::before,
.nav--totit .nav__item:not(.nav__item--current):hover::before {
	opacity: 0.6;
}

.nav--totit .nav__item--current::before {
	opacity: 0;
	-webkit-transform: translate3d(0,1.5em,0) scale3d(0,0,1);
	transform: translate3d(0,1.5em,0) scale3d(0,0,1);
}

.nav--totit .nav__icon {
	z-index: 100;
	display: block;
	width: 100%;
	height: 100%;
	margin: 0 auto;
	opacity: 0;
	-webkit-transform: scale3d(0,0,1);
	transform: scale3d(0,0,1);
	-webkit-transform-origin: 50% 100%;
	transform-origin: 50% 100%;
	-webkit-transition: -webkit-transform 0.3s, opacity 0.3s;
	transition: transform 0.3s, opacity 0.3s;
	-webkit-animation-timing-function: cubic-bezier(0.2,1,0.3,1);
	animation-timing-function: cubic-bezier(0.2,1,0.3,1);
	fill: #0b64ce;
}

.nav--totit .nav__item--current .nav__icon {
	opacity: 1;
	-webkit-transform: scale3d(1,1,1);
	transform: scale3d(1,1,1);
}

.nav--totit .nav__item-title {
	font-weight: bold;
	line-height: 2.5em;
	position: absolute;
	top: 0;
	left: 3em;
	white-space: nowrap;
	pointer-events: none;
	opacity: 0;
	-webkit-transform: translate3d(0,15px,0);
	transform: translate3d(0,15px,0);
	-webkit-transition: -webkit-transform 0.3s, opacity 0.3s;
	transition: transform 0.3s, opacity 0.3s;
	-webkit-animation-timing-function: cubic-bezier(0.2,1,0.3,1);
	animation-timing-function: cubic-bezier(0.2,1,0.3,1);
}

.nav--totit .nav__item--current .nav__item-title {
	opacity: 1;
	-webkit-transform: translate3d(0,0,0);
	transform: translate3d(0,0,0);
	-webkit-transition-delay: 0.15s;
	transition-delay: 0.15s;
}

/* Ayana */

.nav--ayana .nav__item {
	margin: 1em 0;
	width: 1.5em;
	height: 1.5em;
}

.nav--ayana .nav__item::before {
	content: '';
	position: absolute;
	width: 100%;
	height: 100%;
	background: #586c80;
	top: 0;
	left: 0;
	border-radius: 50%;
	-webkit-transform: scale3d(0,0,1);
	transform: scale3d(0,0,1);
	-webkit-transition: -webkit-transform 0.2s;
	transition: transform 0.2s;
	-webkit-animation-timing-function: cubic-bezier(0.2,1,0.3,1);
	animation-timing-function: cubic-bezier(0.2,1,0.3,1);
}

.nav--ayana .nav__item--current::before {
	-webkit-transform: scale3d(1,1,1);
	transform: scale3d(1,1,1);
	-webkit-transition-delay: 0.35s;
	transition-delay: 0.35s;
}

.nav--ayana .nav__icon {
	display: block;
	position: relative;
	z-index: 10;
	width: 100%;
	height: 100%;
	margin: 0 auto;
	fill: none;
	stroke: #fff;
	stroke-width: 2;
	stroke-linecap: round;
	stroke-linejoin: round;
	stroke-dasharray: 39 39;
	stroke-dashoffset: 0;
	-webkit-transition: stroke-dashoffset 0.4s, opacity 0.3s;
	transition: stroke-dashoffset 0.4s, opacity 0.3s;
	-webkit-animation-timing-function: cubic-bezier(0.2,1,0.3,1);
	animation-timing-function: cubic-bezier(0.2,1,0.3,1);
}

.nav--ayana .nav__item--current .nav__icon {
	opacity: 0;
	/* length of circle path (pi*2r) */
	stroke-dashoffset: 39;
	-webkit-transition-duration: 0.4s, 0.2s;
	transition-duration: 0.4s, 0.2s;
	-webkit-transition-delay: 0s, 0.2s;
	transition-delay: 0s, 0.2s;
}
/*!
 * Datetimepicker for Bootstrap 3
 * version : 4.17.43
 * https://github.com/Eonasdan/bootstrap-datetimepicker/
 */.bootstrap-datetimepicker-widget{list-style:none}.bootstrap-datetimepicker-widget.dropdown-menu{margin:2px 0;padding:4px;width:19em}@media (min-width:768px){.bootstrap-datetimepicker-widget.dropdown-menu.timepicker-sbs{width:38em}}@media (min-width:992px){.bootstrap-datetimepicker-widget.dropdown-menu.timepicker-sbs{width:38em}}@media (min-width:1200px){.bootstrap-datetimepicker-widget.dropdown-menu.timepicker-sbs{width:38em}}.bootstrap-datetimepicker-widget.dropdown-menu:before,.bootstrap-datetimepicker-widget.dropdown-menu:after{content:'';display:inline-block;position:absolute}.bootstrap-datetimepicker-widget.dropdown-menu.bottom:before{border-left:7px solid transparent;border-right:7px solid transparent;border-bottom:7px solid #ccc;border-bottom-color:rgba(0,0,0,0.2);top:-7px;left:7px}.bootstrap-datetimepicker-widget.dropdown-menu.bottom:after{border-left:6px solid transparent;border-right:6px solid transparent;border-bottom:6px solid white;top:-6px;left:8px}.bootstrap-datetimepicker-widget.dropdown-menu.top:before{border-left:7px solid transparent;border-right:7px solid transparent;border-top:7px solid #ccc;border-top-color:rgba(0,0,0,0.2);bottom:-7px;left:6px}.bootstrap-datetimepicker-widget.dropdown-menu.top:after{border-left:6px solid transparent;border-right:6px solid transparent;border-top:6px solid white;bottom:-6px;left:7px}.bootstrap-datetimepicker-widget.dropdown-menu.pull-right:before{left:auto;right:6px}.bootstrap-datetimepicker-widget.dropdown-menu.pull-right:after{left:auto;right:7px}.bootstrap-datetimepicker-widget .list-unstyled{margin:0}.bootstrap-datetimepicker-widget a[data-action]{padding:6px 0}.bootstrap-datetimepicker-widget a[data-action]:active{box-shadow:none}.bootstrap-datetimepicker-widget .timepicker-hour,.bootstrap-datetimepicker-widget .timepicker-minute,.bootstrap-datetimepicker-widget .timepicker-second{width:54px;font-weight:bold;font-size:1.2em;margin:0}.bootstrap-datetimepicker-widget button[data-action]{padding:6px}.bootstrap-datetimepicker-widget .btn[data-action="incrementHours"]::after{position:absolute;width:1px;height:1px;margin:-1px;padding:0;overflow:hidden;clip:rect(0, 0, 0, 0);border:0;content:"Increment Hours"}.bootstrap-datetimepicker-widget .btn[data-action="incrementMinutes"]::after{position:absolute;width:1px;height:1px;margin:-1px;padding:0;overflow:hidden;clip:rect(0, 0, 0, 0);border:0;content:"Increment Minutes"}.bootstrap-datetimepicker-widget .btn[data-action="decrementHours"]::after{position:absolute;width:1px;height:1px;margin:-1px;padding:0;overflow:hidden;clip:rect(0, 0, 0, 0);border:0;content:"Decrement Hours"}.bootstrap-datetimepicker-widget .btn[data-action="decrementMinutes"]::after{position:absolute;width:1px;height:1px;margin:-1px;padding:0;overflow:hidden;clip:rect(0, 0, 0, 0);border:0;content:"Decrement Minutes"}.bootstrap-datetimepicker-widget .btn[data-action="showHours"]::after{position:absolute;width:1px;height:1px;margin:-1px;padding:0;overflow:hidden;clip:rect(0, 0, 0, 0);border:0;content:"Show Hours"}.bootstrap-datetimepicker-widget .btn[data-action="showMinutes"]::after{position:absolute;width:1px;height:1px;margin:-1px;padding:0;overflow:hidden;clip:rect(0, 0, 0, 0);border:0;content:"Show Minutes"}.bootstrap-datetimepicker-widget .btn[data-action="togglePeriod"]::after{position:absolute;width:1px;height:1px;margin:-1px;padding:0;overflow:hidden;clip:rect(0, 0, 0, 0);border:0;content:"Toggle AM/PM"}.bootstrap-datetimepicker-widget .btn[data-action="clear"]::after{position:absolute;width:1px;height:1px;margin:-1px;padding:0;overflow:hidden;clip:rect(0, 0, 0, 0);border:0;content:"Clear the picker"}.bootstrap-datetimepicker-widget .btn[data-action="today"]::after{position:absolute;width:1px;height:1px;margin:-1px;padding:0;overflow:hidden;clip:rect(0, 0, 0, 0);border:0;content:"Set the date to today"}.bootstrap-datetimepicker-widget .picker-switch{text-align:center}.bootstrap-datetimepicker-widget .picker-switch::after{position:absolute;width:1px;height:1px;margin:-1px;padding:0;overflow:hidden;clip:rect(0, 0, 0, 0);border:0;content:"Toggle Date and Time Screens"}.bootstrap-datetimepicker-widget .picker-switch td{padding:0;margin:0;height:auto;width:auto;line-height:inherit}.bootstrap-datetimepicker-widget .picker-switch td span{line-height:2.5;height:2.5em;width:100%}.bootstrap-datetimepicker-widget table{width:100%;margin:0}.bootstrap-datetimepicker-widget table td,.bootstrap-datetimepicker-widget table th{text-align:center;border-radius:4px}.bootstrap-datetimepicker-widget table th{height:20px;line-height:20px;width:20px}.bootstrap-datetimepicker-widget table th.picker-switch{width:145px}.bootstrap-datetimepicker-widget table th.disabled,.bootstrap-datetimepicker-widget table th.disabled:hover{background:none;color:#777;cursor:not-allowed}.bootstrap-datetimepicker-widget table th.prev::after{position:absolute;width:1px;height:1px;margin:-1px;padding:0;overflow:hidden;clip:rect(0, 0, 0, 0);border:0;content:"Previous Month"}.bootstrap-datetimepicker-widget table th.next::after{position:absolute;width:1px;height:1px;margin:-1px;padding:0;overflow:hidden;clip:rect(0, 0, 0, 0);border:0;content:"Next Month"}.bootstrap-datetimepicker-widget table thead tr:first-child th{cursor:pointer}.bootstrap-datetimepicker-widget table thead tr:first-child th:hover{background:#eee}.bootstrap-datetimepicker-widget table td{height:54px;line-height:54px;width:54px}.bootstrap-datetimepicker-widget table td.cw{font-size:.8em;height:20px;line-height:20px;color:#777}.bootstrap-datetimepicker-widget table td.day{height:20px;line-height:20px;width:20px}.bootstrap-datetimepicker-widget table td.day:hover,.bootstrap-datetimepicker-widget table td.hour:hover,.bootstrap-datetimepicker-widget table td.minute:hover,.bootstrap-datetimepicker-widget table td.second:hover{background:#eee;cursor:pointer}.bootstrap-datetimepicker-widget table td.old,.bootstrap-datetimepicker-widget table td.new{color:#777}.bootstrap-datetimepicker-widget table td.today{position:relative}.bootstrap-datetimepicker-widget table td.today:before{content:'';display:inline-block;border:solid transparent;border-width:0 0 7px 7px;border-bottom-color:#337ab7;border-top-color:rgba(0,0,0,0.2);position:absolute;bottom:4px;right:4px}.bootstrap-datetimepicker-widget table td.active,.bootstrap-datetimepicker-widget table td.active:hover{background-color:#337ab7;color:#fff;text-shadow:0 -1px 0 rgba(0,0,0,0.25)}.bootstrap-datetimepicker-widget table td.active.today:before{border-bottom-color:#fff}.bootstrap-datetimepicker-widget table td.disabled,.bootstrap-datetimepicker-widget table td.disabled:hover{background:none;color:#777;cursor:not-allowed}.bootstrap-datetimepicker-widget table td span{display:inline-block;width:54px;height:54px;line-height:54px;margin:2px 1.5px;cursor:pointer;border-radius:4px}.bootstrap-datetimepicker-widget table td span:hover{background:#eee}.bootstrap-datetimepicker-widget table td span.active{background-color:#337ab7;color:#fff;text-shadow:0 -1px 0 rgba(0,0,0,0.25)}.bootstrap-datetimepicker-widget table td span.old{color:#777}.bootstrap-datetimepicker-widget table td span.disabled,.bootstrap-datetimepicker-widget table td span.disabled:hover{background:none;color:#777;cursor:not-allowed}.bootstrap-datetimepicker-widget.usetwentyfour td.hour{height:27px;line-height:27px}.bootstrap-datetimepicker-widget.wider{width:21em}.bootstrap-datetimepicker-widget .datepicker-decades .decade{line-height:1.8em !important}.input-group.date .input-group-addon{cursor:pointer}.sr-only{position:absolute;width:1px;height:1px;margin:-1px;padding:0;overflow:hidden;clip:rect(0, 0, 0, 0);border:0}
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
.rating-loading {
    width: 25px;
    height: 25px;
    font-size: 0;
    color: #fff;
    background: transparent url('../img/loading.gif') top left no-repeat;
    border: none;
}

/*
 * Stars
 */
.rating-container .rating {
    cursor: default;
    position: relative;
    vertical-align: middle;
    display: inline-block;
    overflow: hidden;
    white-space: nowrap;
}

.rating-disabled .rating {
    cursor: not-allowed;
}

.rating-container .star {
    display: inline-block;
    margin: 0 3px;
    text-align: center;
}

.rating-container .empty-stars {
    color: #aaa;
}

.rating-container .filled-stars {
    position: absolute;
    left: 0;
    top: 0;
    margin: auto;
    color: #fde16d;
    white-space: nowrap;
    overflow: hidden;
    -webkit-text-stroke: 1px #777;
    text-shadow: 1px 1px #999;
}

.rating-rtl {
    float: right;
}

.rating-animate .filled-stars {
    transition: width 0.25s ease;
    -o-transition: width 0.25s ease;
    -moz-transition: width 0.25s ease;
    -webkit-transition: width 0.25s ease;
}

.rating-rtl .filled-stars {
    left: auto;
    right: 0;
    -moz-transform: matrix(-1, 0, 0, 1, 0, 0) translate3d(0, 0, 0);
    -webkit-transform: matrix(-1, 0, 0, 1, 0, 0) translate3d(0, 0, 0);
    -o-transform: matrix(-1, 0, 0, 1, 0, 0) translate3d(0, 0, 0);
    transform: matrix(-1, 0, 0, 1, 0, 0) translate3d(0, 0, 0);
}

.rating-rtl.is-star .filled-stars {
    right: 0.06em;
}

.rating-rtl.is-heart .empty-stars {
    margin-right: 0.07em;
}

/**
 * Sizes
 */
.rating-xl {
    font-size: 4.89em;
}

.rating-lg {
    font-size: 3.91em;
}

.rating-md {
    font-size: 3.13em;
}

.rating-sm {
    font-size: 2.5em;
}

.rating-xs {
    font-size: 2em;
}

.rating-xl {
    font-size: 4.89em;
}

/**
 * Clear
 */
.rating-container .clear-rating {
    color: #aaa;
    cursor: not-allowed;
    display: inline-block;
    vertical-align: middle;
    font-size: 60%;
}

.clear-rating-active {
    cursor: pointer !important;
}

.clear-rating-active:hover {
    color: #843534;
}

.rating-container .clear-rating {
    padding-right: 5px;
}

/**
 * Caption
 */
.rating-container .caption {
    color: #999;
    display: inline-block;
    vertical-align: middle;
    font-size: 60%;
    margin-top: -0.6em;
}

.rating-container .caption {
    margin-left: 5px;
    margin-right: 0;
}

.rating-rtl .caption {
    margin-right: 5px;
    margin-left: 0;
}

/**
 * Print
 */
@media print {
    .rating-container .clear-rating {
        display: none;
    }
}
body,
  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    font-family: "Lato", sans-serif;
  }
  
  body,
  html {
    height: 100%;
    color: #777;
    line-height: 1.8;
  }

  img {
    max-width: 100%;
    height: auto;
    /*display: none;*/
    }

  /*Index input Form placeholder*/
  body #font input::-webkit-input-placeholder {
    color: #000;
    font-weight: bold;
  }

  body #font input::-moz-placeholder {
    color: #000;
    font-weight: bold;
  }

  /*Chef create input Form placeholder*/
  body #chef-createfont input::-webkit-input-placeholder {
    color: #9e9e9e;
    font-weight: bold;
    font-family: cursive;
  }

  body #chef-create input::-moz-placeholder {
    color: #9e9e9e;
    font-weight: bold;
    font-family: cursive;
  }
  
  /* index view image (Logo. Full height) */
  .bgimg-1 {
    opacity: 1;
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-image: url('https://s3-us-west-2.amazonaws.com/zhoker/images/0426201701.jpg');
  }
  
  /* Adjust the position of the parallax image text */
  
  .w3-display-middle {
    bottom: 45%;
  }
  
  .w3-wide {
    letter-spacing: 10px;
  }
  
  .w3-hover-opacity {
    cursor: pointer;
  }

  .inputbkg {
    /*background-color: rgba(76,175,80,0.9);*/
    background-color: rgba(255,255,255,0.7);
  }

  /*footer style*/
  footer ul {
     list-style-type: none;
  }

  footer .footlink {
    margin:0px;
  }  

  footer .footlink a {
    text-decoration: none;
  }

  footer .iconlist li {
     display: inline-block;
     margin: 0px 5px;
  }  

  footer .iconlist li .w3-btn-floating{
    border: 1px solid;
  }

  /*form validation message*/
  form.cmxform label.error,
    label.error {
      /* remove the next line when you have trouble in IE6 with labels in list */
      color:#f44336;
      /*font-style: italic;*/
    }

  /*shrink the word or icon when hover it*/
  .zk-shrink-hover:hover {
     -moz-transform: scale(0.95);
     -ms-transform: scale(0.95);
     -o-transform: scale(0.95);
     -webkit-transform: scale(0.95);
     transform: scale(0.95);
  }

  /*enlarge when hover it*/
  .zk-enlarge-hover:hover {
     -moz-transform: scale(1.5);
     -ms-transform: scale(1.5);
     -o-transform: scale(1.5);
     -webkit-transform: scale(1.5);
     transform: scale(1.5);
     transition: all 0.5s;
  }

  /* wrap image */
  .img-wrapper {
    display: inline-block; /* change the default display type to inline-block */
    overflow: hidden;      /* hide the overflow */
  }
  
  /* fixed-circle-navbar */
  .fixed-circle-nav {
    position: fixed;
    right: 0em;
    margin-top: 17em;
  }

  .fixed-circle-nav .section--nav a {
    text-decoration: none; 
    /*width: 13px;
    height: 10px;
    margin-top: 1.5em;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;*/
  }

  .bg-grey {
    background: rgba(34, 37, 51, 0.8);
  }

  /*delete image button in chef edit blade*/
  #delete_img:focus {
    outline:0;
  }

  /*for image checkbox*/
  #img-checkbox ul {
    list-style-type: none;
  }

  #img-checkbox li {
    display: inline-block;
  }

  #img-checkbox input[type="checkbox"][id^="cb"] {
    display: none;
  }

  #img-checkbox label {
    border: 1px solid #fff;
    padding: 10px;
    display: block;
    position: relative;
    margin: 10px;
    cursor: pointer;
  }

  #img-checkbox label:before {
    background-color: white;
    color: white;
    content: " ";
    display: block;
    border-radius: 50%;
    border: 1px solid grey;
    position: absolute;
    top: -5px;
    left: -5px;
    width: 25px;
    height: 25px;
    text-align: center;
    line-height: 28px;
    transition-duration: 0.4s;
    transform: scale(0);
  }

  #img-checkbox label img {
    height: 100px;
    width: 178px;
    transition-duration: 0.2s;
    transform-origin: 50% 50%;
  }

  #img-checkbox :checked + label {
    border-color: #4CAF50;
  }

  #img-checkbox :checked + label:before {
    content: "✓";
    background-color: #4CAF50;
    transform: scale(1);
  }

  #img-checkbox :checked + label img {
    transform: scale(0.9);
    box-shadow: 0 0 5px #333;
    z-index: -1;
  }

  /* Center the loader */
  #loader {
    position: absolute;
    /*left: 50%;*/
    /*top: 50%;*/
    /*z-index: 1;*/
    /*margin: -75px 0 0 -75px;*/
    border: 10px solid #f3f3f3;
    border-radius: 50%;
    border-top: 10px solid #4CAF50;
    width: 50px;
    height: 50px;
    -webkit-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
  }

  @-webkit-keyframes spin {
    0% { -webkit-transform: rotate(0deg); }
    100% { -webkit-transform: rotate(360deg); }
  }

  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }

  /* Add animation to "page content" */
  .animate-bottom {
    position: relative;
    -webkit-animation-name: animatebottom;
    -webkit-animation-duration: 1s;
    animation-name: animatebottom;
    animation-duration: 1s
  }

  @-webkit-keyframes animatebottom {
    from { bottom:-100px; opacity:0 } 
    to { bottom:0px; opacity:1 }
  }

  @keyframes animatebottom { 
    from{ bottom:-100px; opacity:0 } 
    to{ bottom:0; opacity:1 }
  }

/**
 * TABS
 *
 * -------------------------------------------------------------------------------------------------
 */
.tabs > DIV {
	margin-top: 10px;
	background: white !important;
}

.tabs UL.horizontal {
	list-style: none outside none;
	margin: 0;
}

.tabs LI {
	background: white;
	border-bottom: 4px solid #E5E5E5;
	margin: 0 10px 0 0;
	display: inline-block;
}

.tabs LI .tab-link {
	color: #ccc;
	display: block;
	font-size: 18px;
	font-weight: 300;
	padding: 14px 24px;
	text-decoration: none;
}

.tabs LI:hover {
	background: #4CAF50;
	border-bottom: 4px solid #9e9e9e;
}

.tabs LI:hover A {
	color: white;
}

.active {
	background: #4CAF50 !important;
	border-bottom: 4px solid #9e9e9e !important;
}

.active A {
	color: white !important;
}










.mb-pagination *,.mb-pagination :after,.mb-pagination :before{box-sizing:border-box}
.mb-pagination{font-size:14px;font-family:sans-serif;padding-left:0;margin:10px 0;text-align: center;}
.mb-pagination li{display:inline-block;border:1px solid #eee}
.mb-pagination li>*{padding:3px 10px;display:block;color:#2196F3}
.mb-pagination a,.mb-pagination span{text-decoration:none;line-height:1.3}
.mb-pagination a:hover{background:#eee}
.mb-pagination li.active{border-color:#2196F3}
.mb-pagination .active a{background:#2196F3;color:#fff;pointer-events:none}
.non-number-li.disabled a{background:#f7f7f7;pointer-events:none}
/*!
 * loadme v1.1.0 (https://github.com/zx1988826/loadme)
 * Copyright 2017 Tencent, Inc.
 * Licensed under the MIT license
 */
.loadme-mask {
  background-color: #DDD;
  width: 100px;
  height: 100px;
  position: fixed;
  z-index: 99;
  left: 50%;
  top: 50%;
  margin: -50px 0 0 -50px;
  border-radius: 10px;
}
.loadme-circular,
.loadme-circular:after {
  border-radius: 50%;
  width: 10em;
  height: 10em;
}
.loadme-circular {
  width: 40px;
  height: 40px;
  position: fixed;
  left: 50%;
  top: 50%;
  margin: -20px 0 0 -20px;
  z-index: 100;
  font-size: 10px;
  text-indent: -9999em;
  border-top: 1px solid rgba(237, 237, 237, 0.8);
  border-right: 1px solid rgba(237, 237, 237, 0.8);
  border-bottom: 1px solid rgba(237, 237, 237, 0.8);
  border-left: 1px solid #000;
  -webkit-transform: translateZ(0);
          transform: translateZ(0);
  -webkit-animation: loadme-circular-animate 1.1s infinite linear;
          animation: loadme-circular-animate 1.1s infinite linear;
}
@-webkit-keyframes loadme-circular-animate {
  0% {
    -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
  }
}
@keyframes loadme-circular-animate {
  0% {
    -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
  }
}
.loadme-rotateplane {
  width: 40px;
  height: 40px;
  background-color: #000;
  position: fixed;
  left: 50%;
  top: 50%;
  margin: -20px 0 0 -20px;
  -webkit-animation: loadme-rotateplane-animate 1.2s infinite ease-in-out;
          animation: loadme-rotateplane-animate 1.2s infinite ease-in-out;
  z-index: 100;
}
@-webkit-keyframes loadme-rotateplane-animate {
  0% {
    -webkit-transform: perspective(120px) rotateX(0deg) rotateY(0deg);
            transform: perspective(120px) rotateX(0deg) rotateY(0deg);
  }
  50% {
    -webkit-transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg);
            transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg);
  }
  100% {
    -webkit-transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
            transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
  }
}
@keyframes loadme-rotateplane-animate {
  0% {
    -webkit-transform: perspective(120px) rotateX(0deg) rotateY(0deg);
            transform: perspective(120px) rotateX(0deg) rotateY(0deg);
  }
  50% {
    -webkit-transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg);
            transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg);
  }
  100% {
    -webkit-transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
            transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
  }
}
.loadme-cube-grid {
  width: 50px;
  height: 50px;
  position: fixed;
  left: 50%;
  top: 50%;
  margin: -25px 0 0 -25px;
  z-index: 100;
}
.loadme-cube-grid .loadme-cubeGrid {
  width: 33%;
  height: 33%;
  background-color: #000;
  float: left;
  -webkit-animation: loadme-cubeGrid-animate 1.3s infinite ease-in-out;
          animation: loadme-cubeGrid-animate 1.3s infinite ease-in-out;
}
.loadme-cube-grid .loadme-cubeGrid1 {
  -webkit-animation-delay: 0.2s;
          animation-delay: 0.2s;
}
.loadme-cube-grid .loadme-cubeGrid2 {
  -webkit-animation-delay: 0.3s;
          animation-delay: 0.3s;
}
.loadme-cube-grid .loadme-cubeGrid3 {
  -webkit-animation-delay: 0.4s;
          animation-delay: 0.4s;
}
.loadme-cube-grid .loadme-cubeGrid4 {
  -webkit-animation-delay: 0.1s;
          animation-delay: 0.1s;
}
.loadme-cube-grid .loadme-cubeGrid5 {
  -webkit-animation-delay: 0.2s;
          animation-delay: 0.2s;
}
.loadme-cube-grid .loadme-cubeGrid6 {
  -webkit-animation-delay: 0.3s;
          animation-delay: 0.3s;
}
.loadme-cube-grid .loadme-cubeGrid7 {
  -webkit-animation-delay: 0s;
          animation-delay: 0s;
}
.loadme-cube-grid .loadme-cubeGrid8 {
  -webkit-animation-delay: 0.1s;
          animation-delay: 0.1s;
}
.loadme-cube-grid .loadme-cubeGrid9 {
  -webkit-animation-delay: 0.2s;
          animation-delay: 0.2s;
}
@-webkit-keyframes loadme-cubeGrid-animate {
  0%,
  70%,
  100% {
    -webkit-transform: scale3D(1, 1, 1);
            transform: scale3D(1, 1, 1);
  }
  35% {
    -webkit-transform: scale3D(0, 0, 1);
            transform: scale3D(0, 0, 1);
  }
}
@keyframes loadme-cubeGrid-animate {
  0%,
  70%,
  100% {
    -webkit-transform: scale3D(1, 1, 1);
            transform: scale3D(1, 1, 1);
  }
  35% {
    -webkit-transform: scale3D(0, 0, 1);
            transform: scale3D(0, 0, 1);
  }
}
.loadme-circleBounce {
  width: 40px;
  height: 40px;
  position: fixed;
  left: 50%;
  top: 50%;
  margin: -20px 0 0 -20px;
  z-index: 100;
}
.loadme-circleBounce1,
.loadme-circleBounce2 {
  width: 100%;
  height: 100%;
  border-radius: 50%;
  background-color: #000;
  opacity: 0.6;
  position: absolute;
  top: 0;
  left: 0;
  -webkit-animation: loadme-circleBounce-animate 2s infinite ease-in-out;
          animation: loadme-circleBounce-animate 2s infinite ease-in-out;
}
.loadme-circleBounce2 {
  -webkit-animation-delay: -1s;
  animation-delay: -1s;
}
@-webkit-keyframes loadme-circleBounce-animate {
  0%,
  100% {
    -webkit-transform: scale(0);
            transform: scale(0);
  }
  50% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}
@keyframes loadme-circleBounce-animate {
  0%,
  100% {
    -webkit-transform: scale(0);
            transform: scale(0);
  }
  50% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}
.loadmeRect {
  width: 50px;
  height: 40px;
  position: fixed;
  left: 50%;
  top: 50%;
  margin: -20px 0 0 -25px;
  text-align: center;
  font-size: 10px;
  z-index: 100;
}
.loadmeRect .loadmeRectChild {
  background-color: #000;
  height: 100%;
  width: 6px;
  display: inline-block;
  -webkit-animation: loadmeRect-animate 1.2s infinite ease-in-out;
          animation: loadmeRect-animate 1.2s infinite ease-in-out;
}
.loadmeRect .loadmeRect2 {
  -webkit-animation-delay: -1.1s;
          animation-delay: -1.1s;
}
.loadmeRect .loadmeRect3 {
  -webkit-animation-delay: -1s;
          animation-delay: -1s;
}
.loadmeRect .loadmeRect4 {
  -webkit-animation-delay: -0.9s;
          animation-delay: -0.9s;
}
.loadmeRect .loadmeRect5 {
  -webkit-animation-delay: -0.8s;
          animation-delay: -0.8s;
}
@-webkit-keyframes loadmeRect-animate {
  0%,
  40%,
  100% {
    -webkit-transform: scaleY(0.4);
            transform: scaleY(0.4);
  }
  20% {
    -webkit-transform: scaleY(1);
            transform: scaleY(1);
  }
}
@keyframes loadmeRect-animate {
  0%,
  40%,
  100% {
    -webkit-transform: scaleY(0.4);
            transform: scaleY(0.4);
  }
  20% {
    -webkit-transform: scaleY(1);
            transform: scaleY(1);
  }
}
.loadme-cube {
  width: 40px;
  height: 40px;
  position: fixed;
  left: 50%;
  top: 50%;
  margin: -20px 0 0 -20px;
  z-index: 100;
}
.loadme-cube1,
.loadme-cube2 {
  background-color: #000;
  width: 15px;
  height: 15px;
  position: absolute;
  top: 0;
  left: 0;
  -webkit-animation: sk-cubemove 1.8s infinite ease-in-out;
          animation: sk-cubemove 1.8s infinite ease-in-out;
}
.loadme-cube2 {
  -webkit-animation-delay: -0.9s;
          animation-delay: -0.9s;
}
@-webkit-keyframes sk-cubemove {
  25% {
    -webkit-transform: translateX(25px) rotate(-90deg) scale(0.5);
            transform: translateX(25px) rotate(-90deg) scale(0.5);
  }
  50% {
    -webkit-transform: translateX(25px) translateY(25px) rotate(-179deg);
            transform: translateX(25px) translateY(25px) rotate(-179deg);
  }
  50.1% {
    -webkit-transform: translateX(25px) translateY(25px) rotate(-180deg);
            transform: translateX(25px) translateY(25px) rotate(-180deg);
  }
  75% {
    -webkit-transform: translateX(0px) translateY(25px) rotate(-270deg) scale(0.5);
            transform: translateX(0px) translateY(25px) rotate(-270deg) scale(0.5);
  }
  100% {
    -webkit-transform: rotate(-360deg);
            transform: rotate(-360deg);
  }
}
@keyframes sk-cubemove {
  25% {
    -webkit-transform: translateX(25px) rotate(-90deg) scale(0.5);
            transform: translateX(25px) rotate(-90deg) scale(0.5);
  }
  50% {
    -webkit-transform: translateX(25px) translateY(25px) rotate(-179deg);
            transform: translateX(25px) translateY(25px) rotate(-179deg);
  }
  50.1% {
    -webkit-transform: translateX(25px) translateY(25px) rotate(-180deg);
            transform: translateX(25px) translateY(25px) rotate(-180deg);
  }
  75% {
    -webkit-transform: translateX(0px) translateY(25px) rotate(-270deg) scale(0.5);
            transform: translateX(0px) translateY(25px) rotate(-270deg) scale(0.5);
  }
  100% {
    -webkit-transform: rotate(-360deg);
            transform: rotate(-360deg);
  }
}
.loadme-scaleout {
  width: 40px;
  height: 40px;
  background-color: #000;
  position: fixed;
  left: 50%;
  top: 50%;
  margin: -20px 0 0 -20px;
  border-radius: 100%;
  -webkit-animation: loadme-scaleout-animate 1s infinite ease-in-out;
          animation: loadme-scaleout-animate 1s infinite ease-in-out;
  z-index: 100;
}
@-webkit-keyframes loadme-scaleout-animate {
  0% {
    -webkit-transform: scale(0);
            transform: scale(0);
  }
  100% {
    -webkit-transform: scale(1);
            transform: scale(1);
    opacity: 0;
  }
}
@keyframes loadme-scaleout-animate {
  0% {
    -webkit-transform: scale(0);
            transform: scale(0);
  }
  100% {
    -webkit-transform: scale(1);
            transform: scale(1);
    opacity: 0;
  }
}
.loadme-dot {
  width: 40px;
  height: 40px;
  text-align: center;
  position: fixed;
  left: 50%;
  top: 50%;
  margin: -20px 0 0 -20px;
  -webkit-animation: loadme-dot-rotate 2s infinite linear;
          animation: loadme-dot-rotate 2s infinite linear;
  z-index: 100;
}
.loadme-dot1,
.loadme-dot2 {
  width: 60%;
  height: 60%;
  display: inline-block;
  position: absolute;
  top: 0;
  background-color: #000;
  border-radius: 100%;
  -webkit-animation: loadme-dot-bounce 2s infinite ease-in-out;
          animation: loadme-dot-bounce 2s infinite ease-in-out;
}
.loadme-dot2 {
  top: auto;
  bottom: 0;
  -webkit-animation-delay: -1s;
          animation-delay: -1s;
}
@-webkit-keyframes loadme-dot-rotate {
  100% {
    -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
  }
}
@keyframes loadme-dot-rotate {
  100% {
    -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
  }
}
@-webkit-keyframes loadme-dot-bounce {
  0%,
  100% {
    -webkit-transform: scale(0);
            transform: scale(0);
  }
  50% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}
@keyframes loadme-dot-bounce {
  0%,
  100% {
    -webkit-transform: scale(0);
            transform: scale(0);
  }
  50% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}
.loadme-bounced {
  width: 70px;
  text-align: center;
  position: fixed;
  left: 50%;
  top: 50%;
  margin: 0 0 0 -35px;
  z-index: 100;
}
.loadme-bounced .loadme-bounced-child {
  width: 18px;
  height: 18px;
  background-color: #000;
  border-radius: 100%;
  display: inline-block;
  -webkit-animation: loadme-bouncedelay-animate 1.4s infinite ease-in-out both;
          animation: loadme-bouncedelay-animate 1.4s infinite ease-in-out both;
}
.loadme-bounced .loadme-bounced1 {
  -webkit-animation-delay: -0.32s;
          animation-delay: -0.32s;
}
.loadme-bounced .loadme-bounced2 {
  -webkit-animation-delay: -0.16s;
          animation-delay: -0.16s;
}
@-webkit-keyframes loadme-bouncedelay-animate {
  0%,
  80%,
  100% {
    -webkit-transform: scale(0);
            transform: scale(0);
  }
  40% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}
@keyframes loadme-bouncedelay-animate {
  0%,
  80%,
  100% {
    -webkit-transform: scale(0);
            transform: scale(0);
  }
  40% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}
.loadme-circlePoint {
  position: fixed;
  left: 50%;
  top: 50%;
  margin: -20px 0 0 -20px;
  width: 40px;
  height: 40px;
  z-index: 100;
}
.loadme-circlePoint .loadme-circlePoint-child {
  width: 100%;
  height: 100%;
  position: absolute;
  left: 0;
  top: 0;
}
.loadme-circlePoint .loadme-circlePoint-child:before {
  content: '';
  display: block;
  margin: 0 auto;
  width: 15%;
  height: 15%;
  background-color: #000;
  border-radius: 100%;
  -webkit-animation: loadme-circlePoint-animate 1.2s infinite ease-in-out both;
          animation: loadme-circlePoint-animate 1.2s infinite ease-in-out both;
}
.loadme-circlePoint .loadme-circlePoint2 {
  -webkit-transform: rotate(30deg);
          transform: rotate(30deg);
}
.loadme-circlePoint .loadme-circlePoint3 {
  -webkit-transform: rotate(60deg);
          transform: rotate(60deg);
}
.loadme-circlePoint .loadme-circlePoint4 {
  -webkit-transform: rotate(90deg);
          transform: rotate(90deg);
}
.loadme-circlePoint .loadme-circlePoint5 {
  -webkit-transform: rotate(120deg);
          transform: rotate(120deg);
}
.loadme-circlePoint .loadme-circlePoint6 {
  -webkit-transform: rotate(150deg);
          transform: rotate(150deg);
}
.loadme-circlePoint .loadme-circlePoint7 {
  -webkit-transform: rotate(180deg);
          transform: rotate(180deg);
}
.loadme-circlePoint .loadme-circlePoint8 {
  -webkit-transform: rotate(210deg);
          transform: rotate(210deg);
}
.loadme-circlePoint .loadme-circlePoint9 {
  -webkit-transform: rotate(240deg);
          transform: rotate(240deg);
}
.loadme-circlePoint .loadme-circlePoint10 {
  -webkit-transform: rotate(270deg);
          transform: rotate(270deg);
}
.loadme-circlePoint .loadme-circlePoint11 {
  -webkit-transform: rotate(300deg);
          transform: rotate(300deg);
}
.loadme-circlePoint .loadme-circlePoint12 {
  -webkit-transform: rotate(330deg);
          transform: rotate(330deg);
}
.loadme-circlePoint .loadme-circlePoint2:before {
  -webkit-animation-delay: -1.1s;
          animation-delay: -1.1s;
}
.loadme-circlePoint .loadme-circlePoint3:before {
  -webkit-animation-delay: -1s;
          animation-delay: -1s;
}
.loadme-circlePoint .loadme-circlePoint4:before {
  -webkit-animation-delay: -0.9s;
          animation-delay: -0.9s;
}
.loadme-circlePoint .loadme-circlePoint5:before {
  -webkit-animation-delay: -0.8s;
          animation-delay: -0.8s;
}
.loadme-circlePoint .loadme-circlePoint6:before {
  -webkit-animation-delay: -0.7s;
          animation-delay: -0.7s;
}
.loadme-circlePoint .loadme-circlePoint7:before {
  -webkit-animation-delay: -0.6s;
          animation-delay: -0.6s;
}
.loadme-circlePoint .loadme-circlePoint8:before {
  -webkit-animation-delay: -0.5s;
          animation-delay: -0.5s;
}
.loadme-circlePoint .loadme-circlePoint9:before {
  -webkit-animation-delay: -0.4s;
          animation-delay: -0.4s;
}
.loadme-circlePoint .loadme-circlePoint10:before {
  -webkit-animation-delay: -0.3s;
          animation-delay: -0.3s;
}
.loadme-circlePoint .loadme-circlePoint11:before {
  -webkit-animation-delay: -0.2s;
          animation-delay: -0.2s;
}
.loadme-circlePoint .loadme-circlePoint12:before {
  -webkit-animation-delay: -0.1s;
          animation-delay: -0.1s;
}
@-webkit-keyframes loadme-circlePoint-animate {
  0%,
  80%,
  100% {
    -webkit-transform: scale(0);
            transform: scale(0);
  }
  40% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}
@keyframes loadme-circlePoint-animate {
  0%,
  80%,
  100% {
    -webkit-transform: scale(0);
            transform: scale(0);
  }
  40% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}
.loadme-fadingCircle {
  width: 40px;
  height: 40px;
  position: fixed;
  left: 50%;
  top: 50%;
  margin: -20px 0 0 -20px;
  z-index: 100;
}
.loadme-fadingCircle .loadme-fadingCircle-child {
  width: 100%;
  height: 100%;
  position: absolute;
  left: 0;
  top: 0;
}
.loadme-fadingCircle .loadme-fadingCircle-child:before {
  content: '';
  display: block;
  margin: 0 auto;
  width: 15%;
  height: 15%;
  background-color: #000;
  border-radius: 100%;
  -webkit-animation: loadme-fadingCircle 1.2s infinite ease-in-out both;
          animation: loadme-fadingCircle 1.2s infinite ease-in-out both;
}
.loadme-fadingCircle .loadme-fadingCircle-child2 {
  -webkit-transform: rotate(30deg);
          transform: rotate(30deg);
}
.loadme-fadingCircle .loadme-fadingCircle-child3 {
  -webkit-transform: rotate(60deg);
          transform: rotate(60deg);
}
.loadme-fadingCircle .loadme-fadingCircle-child4 {
  -webkit-transform: rotate(90deg);
          transform: rotate(90deg);
}
.loadme-fadingCircle .loadme-fadingCircle-child5 {
  -webkit-transform: rotate(120deg);
          transform: rotate(120deg);
}
.loadme-fadingCircle .loadme-fadingCircle-child6 {
  -webkit-transform: rotate(150deg);
          transform: rotate(150deg);
}
.loadme-fadingCircle .loadme-fadingCircle-child7 {
  -webkit-transform: rotate(180deg);
          transform: rotate(180deg);
}
.loadme-fadingCircle .loadme-fadingCircle-child8 {
  -webkit-transform: rotate(210deg);
          transform: rotate(210deg);
}
.loadme-fadingCircle .loadme-fadingCircle-child9 {
  -webkit-transform: rotate(240deg);
          transform: rotate(240deg);
}
.loadme-fadingCircle .loadme-fadingCircle-child10 {
  -webkit-transform: rotate(270deg);
          transform: rotate(270deg);
}
.loadme-fadingCircle .loadme-fadingCircle-child11 {
  -webkit-transform: rotate(300deg);
          transform: rotate(300deg);
}
.loadme-fadingCircle .loadme-fadingCircle-child12 {
  -webkit-transform: rotate(330deg);
          transform: rotate(330deg);
}
.loadme-fadingCircle .loadme-fadingCircle-child2:before {
  -webkit-animation-delay: -1.1s;
          animation-delay: -1.1s;
}
.loadme-fadingCircle .loadme-fadingCircle-child3:before {
  -webkit-animation-delay: -1s;
          animation-delay: -1s;
}
.loadme-fadingCircle .loadme-fadingCircle-child4:before {
  -webkit-animation-delay: -0.9s;
          animation-delay: -0.9s;
}
.loadme-fadingCircle .loadme-fadingCircle-child5:before {
  -webkit-animation-delay: -0.8s;
          animation-delay: -0.8s;
}
.loadme-fadingCircle .loadme-fadingCircle-child6:before {
  -webkit-animation-delay: -0.7s;
          animation-delay: -0.7s;
}
.loadme-fadingCircle .loadme-fadingCircle-child7:before {
  -webkit-animation-delay: -0.6s;
          animation-delay: -0.6s;
}
.loadme-fadingCircle .loadme-fadingCircle-child8:before {
  -webkit-animation-delay: -0.5s;
          animation-delay: -0.5s;
}
.loadme-fadingCircle .loadme-fadingCircle-child9:before {
  -webkit-animation-delay: -0.4s;
          animation-delay: -0.4s;
}
.loadme-fadingCircle .loadme-fadingCircle-child10:before {
  -webkit-animation-delay: -0.3s;
          animation-delay: -0.3s;
}
.loadme-fadingCircle .loadme-fadingCircle-child11:before {
  -webkit-animation-delay: -0.2s;
          animation-delay: -0.2s;
}
.loadme-fadingCircle .loadme-fadingCircle-child12:before {
  -webkit-animation-delay: -0.1s;
          animation-delay: -0.1s;
}
@-webkit-keyframes loadme-fadingCircle {
  0%,
  39%,
  100% {
    opacity: 0;
  }
  40% {
    opacity: 1;
  }
}
@keyframes loadme-fadingCircle {
  0%,
  39%,
  100% {
    opacity: 0;
  }
  40% {
    opacity: 1;
  }
}
.loadme-foldingCube {
  width: 40px;
  height: 40px;
  -webkit-transform: rotateZ(45deg);
          transform: rotateZ(45deg);
  position: fixed;
  left: 50%;
  top: 50%;
  margin: -20px 0 0 -20px;
  z-index: 100;
}
.loadme-foldingCube .loadme-foldingCube-child {
  float: left;
  width: 50%;
  height: 50%;
  position: relative;
  -webkit-transform: scale(1.1);
          transform: scale(1.1);
}
.loadme-foldingCube .loadme-foldingCube-child:before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: #000;
  -webkit-animation: loadme-foldCubeAngle-animate 2.4s infinite linear both;
          animation: loadme-foldCubeAngle-animate 2.4s infinite linear both;
  -webkit-transform-origin: 100% 100%;
          transform-origin: 100% 100%;
}
.loadme-foldingCube .loadme-foldingCube-child2 {
  -webkit-transform: scale(1.1) rotateZ(90deg);
          transform: scale(1.1) rotateZ(90deg);
}
.loadme-foldingCube .loadme-foldingCube-child3 {
  -webkit-transform: scale(1.1) rotateZ(180deg);
          transform: scale(1.1) rotateZ(180deg);
}
.loadme-foldingCube .loadme-foldingCube-child4 {
  -webkit-transform: scale(1.1) rotateZ(270deg);
          transform: scale(1.1) rotateZ(270deg);
}
.loadme-foldingCube .loadme-foldingCube-child2:before {
  -webkit-animation-delay: 0.3s;
          animation-delay: 0.3s;
}
.loadme-foldingCube .loadme-foldingCube-child3:before {
  -webkit-animation-delay: 0.6s;
          animation-delay: 0.6s;
}
.loadme-foldingCube .loadme-foldingCube-child4:before {
  -webkit-animation-delay: 0.9s;
          animation-delay: 0.9s;
}
@-webkit-keyframes loadme-foldCubeAngle-animate {
  0%,
  10% {
    -webkit-transform: perspective(140px) rotateX(-180deg);
            transform: perspective(140px) rotateX(-180deg);
    opacity: 0;
  }
  25%,
  75% {
    -webkit-transform: perspective(140px) rotateX(0deg);
            transform: perspective(140px) rotateX(0deg);
    opacity: 1;
  }
  90%,
  100% {
    -webkit-transform: perspective(140px) rotateY(180deg);
            transform: perspective(140px) rotateY(180deg);
    opacity: 0;
  }
}
@keyframes loadme-foldCubeAngle-animate {
  0%,
  10% {
    -webkit-transform: perspective(140px) rotateX(-180deg);
            transform: perspective(140px) rotateX(-180deg);
    opacity: 0;
  }
  25%,
  75% {
    -webkit-transform: perspective(140px) rotateX(0deg);
            transform: perspective(140px) rotateX(0deg);
    opacity: 1;
  }
  90%,
  100% {
    -webkit-transform: perspective(140px) rotateY(180deg);
            transform: perspective(140px) rotateY(180deg);
    opacity: 0;
  }
}
.loadmeLove {
  position: fixed;
  width: 50px;
  height: 50px;
  left: 50%;
  top: 50%;
  margin: -25px 0 0 -25px;
  z-index: 100;
  background-color: #000;
  -webkit-animation: loadme-love-animate 0.8s infinite alternate;
          animation: loadme-love-animate 0.8s infinite alternate;
  -webkit-animation-timing-function: ease-in;
          animation-timing-function: ease-in;
}
.loadmeLove:before,
.loadmeLove:after {
  position: absolute;
  width: 50px;
  height: 50px;
  content: '';
  border-radius: 50%;
  background-color: #000;
}
.loadmeLove:before {
  bottom: 0px;
  left: -25px;
}
.loadmeLove:after {
  top: -25px;
  right: 0px;
}
@-webkit-keyframes loadme-love-animate {
  0% {
    -webkit-transform: scale(1, 1) rotate(45deg);
            transform: scale(1, 1) rotate(45deg);
  }
  100% {
    -webkit-transform: scale(0.5, 0.5) rotate(45deg);
            transform: scale(0.5, 0.5) rotate(45deg);
  }
}
@keyframes loadme-love-animate {
  0% {
    -webkit-transform: scale(1, 1) rotate(45deg);
            transform: scale(1, 1) rotate(45deg);
  }
  100% {
    -webkit-transform: scale(0.5, 0.5) rotate(45deg);
            transform: scale(0.5, 0.5) rotate(45deg);
  }
}
.loadmeClock {
  height: 70px;
  width: 110px;
  position: fixed;
  left: 50%;
  top: 50%;
  margin: -35px 0 0 -55px;
  z-index: 100;
}
.loadmeClock-body .loadmeClock-pendulum {
  height: 70px;
  -webkit-animation-duration: 1s;
          animation-duration: 1s;
  -webkit-animation-name: loadme-ticktock;
          animation-name: loadme-ticktock;
  -webkit-animation-iteration-count: infinite;
          animation-iteration-count: infinite;
  -webkit-animation-timing-function: cubic-bezier(0.645, 0.045, 0.355, 1);
          animation-timing-function: cubic-bezier(0.645, 0.045, 0.355, 1);
  -webkit-animation-direction: alternate;
          animation-direction: alternate;
  -webkit-animation-fill-mode: both;
          animation-fill-mode: both;
  -webkit-animation-play-state: running;
          animation-play-state: running;
  -webkit-transform-origin: 50% -70%;
          transform-origin: 50% -70%;
}
.loadmeClock-pendulum .loadmePendulum-stick {
  height: 70%;
  width: 6px;
  margin: 0 auto;
  background-color: #000;
}
.loadmeClock-pendulum .loadmePendulum-body {
  height: 20px;
  width: 20px;
  border-radius: 40px;
  margin: 0 auto;
  margin-top: -2px;
  background-color: #000;
}
@-webkit-keyframes loadme-ticktock {
  0% {
    -webkit-transform: rotate(15deg);
            transform: rotate(15deg);
  }
  100% {
    -webkit-transform: rotate(-15deg);
            transform: rotate(-15deg);
  }
}
@keyframes loadme-ticktock {
  0% {
    -webkit-transform: rotate(15deg);
            transform: rotate(15deg);
  }
  100% {
    -webkit-transform: rotate(-15deg);
            transform: rotate(-15deg);
  }
}

/*# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInN0eWxlL2Jhc2UvbWFzay5sZXNzIiwic3R5bGUvbG9hZG1lLmNzcyIsInN0eWxlL2NvbXBvbmVudHMvY2lyY3VsYXIubGVzcyIsInN0eWxlL2NvbXBvbmVudHMvcm90YXRlcGxhbmUubGVzcyIsInN0eWxlL2NvbXBvbmVudHMvY3ViZUdyaWQubGVzcyIsInN0eWxlL2NvbXBvbmVudHMvY2lyY2xlQm91bmNlLmxlc3MiLCJzdHlsZS9jb21wb25lbnRzL2xvYWRtZVJlY3QubGVzcyIsInN0eWxlL2NvbXBvbmVudHMvY3ViZS5sZXNzIiwic3R5bGUvY29tcG9uZW50cy9zY2FsZW91dC5sZXNzIiwic3R5bGUvY29tcG9uZW50cy9kb3QubGVzcyIsInN0eWxlL2NvbXBvbmVudHMvYm91bmNlZC5sZXNzIiwic3R5bGUvY29tcG9uZW50cy9jaXJjbGVQb2ludC5sZXNzIiwic3R5bGUvY29tcG9uZW50cy9mYWRpbmdDaXJjbGUubGVzcyIsInN0eWxlL2NvbXBvbmVudHMvZm9sZGluZ0N1YmUubGVzcyIsInN0eWxlL2NvbXBvbmVudHMvbG92ZS5sZXNzIiwic3R5bGUvY29tcG9uZW50cy9jbG9jay5sZXNzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiI7Ozs7O0FBQUE7RUFDSSx1QkFBQTtFQUNBLGFBQUE7RUFDQSxjQUFBO0VBQ0EsZ0JBQUE7RUFDQSxZQUFBO0VBQ0EsVUFBQTtFQUNBLFNBQUE7RUFDQSx3QkFBQTtFQUNBLG9CQUFBO0VBQ0EsYUFBQTtDQ0NIO0FDWEQ7O0VBRUksbUJBQUE7RUFDQSxZQUFBO0VBQ0EsYUFBQTtDRGFIO0FDVkQ7RUFDSSxZQUFBO0VBQ0EsYUFBQTtFQUNBLGdCQUFBO0VBQ0EsVUFBQTtFQUNBLFNBQUE7RUFDQSx3QkFBQTtFQUNBLGFBQUE7RUFDQSxnQkFBQTtFQUNBLHFCQUFBO0VBQ0EsK0NBQUE7RUFDQSxpREFBQTtFQUNBLGtEQUFBO0VBQ0EsNEJBQUE7RUFDQSxpQ0FBQTtVQUFBLHlCQUFBO0VBQ0EsZ0VBQUE7VUFBQSx3REFB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RDtFQUNJLFlBQUE7RUFDQSxZQUFBO0NiZ2xCSDtBYTdrQkQ7RUFDSSxXQUFBO0VBQ0EsV0FBQTtDYitrQkg7QWE1a0JEO0VBQ0k7SUFDSSw2Q0FBQTtZQUFBLHFDQUFBO0diOGtCTDtFYTVrQkM7SUFDSSxpREFBQTtZQUFBLHlDQUFBO0diOGtCTDtDQUNGO0FhcGxCRDtFQUNJO0lBQ0ksNkNBQUE7WUFBQSxxQ0FBQTtHYjhrQkw7RWE1a0JDO0lBQ0ksaURBQUE7WUFBQSx5Q0FBQTtHYjhrQkw7Q0FDRjtBY3JuQkQ7RUFDSSxhQUFBO0VBQ0EsYUFBQTtFQUNBLGdCQUFBO0VBQ0EsVUFBQTtFQUNBLFNBQUE7RUFDQSx3QkFBQTtFQUNBLGFBQUE7Q2R1bkJIO0FjcG5CRDtFQUNJLGFBQUE7RUFDQSwrQkFBQTtVQUFBLHVCQUFBO0VBQ0Esd0NBQUE7VUFBQSxnQ0FBQTtFQUNBLDRDQUFBO1VBQUEsb0NBQUE7RUFDQSx3RUFBQTtVQUFBLGdFQUFBO0VBQ0EsdUNBQUE7VUFBQSwrQkFBQTtFQUNBLGtDQUFBO1VBQUEsMEJBQUE7RUFDQSxzQ0FBQTtVQUFBLDhCQUFBO0VBQ0EsbUNBQUE7VUFBQSwyQkFBQTtDZHNuQkg7QWNubkJEO0VBQ0ksWUFBQTtFQUNBLFdBQUE7RUFDQSxlQUFBO0VBQ0EsdUJBQUE7Q2RxbkJIO0FjbG5CRDtFQUNJLGFBQUE7RUFDQSxZQUFBO0VBQ0Esb0JBQUE7RUFDQSxlQUFBO0VBQ0EsaUJBQUE7RUFDQSx1QkFBQTtDZG9uQkg7QWNqbkJEO0VBQ0k7SUFDSSxpQ0FBQTtZQUFBLHlCQUFBO0dkbW5CTDtFY2puQkM7SUFDSSxrQ0FBQTtZQUFBLDBCQUFBO0dkbW5CTDtDQUNGO0Fjem5CRDtFQUNJO0lBQ0ksaUNBQUE7WUFBQSx5QkFBQTtHZG1uQkw7RWNqbkJDO0lBQ0ksa0NBQUE7WUFBQSwwQkFBQTtHZG1uQkw7Q0FDRiIsImZpbGUiOiJzdHlsZS9sb2FkbWUuY3NzIiwic291cmNlc0NvbnRlbnQiOlsiLmxvYWRtZS1tYXNrIHtcbiAgICBiYWNrZ3JvdW5kLWNvbG9yOiBAbWFzay1jb2xvcjtcbiAgICB3aWR0aDogMTAwcHg7XG4gICAgaGVpZ2h0OiAxMDBweDtcbiAgICBwb3NpdGlvbjogZml4ZWQ7XG4gICAgei1pbmRleDogOTk7XG4gICAgbGVmdDogNTAlO1xuICAgIHRvcDogNTAlO1xuICAgIG1hcmdpbjogLTUwcHggMCAwIC01MHB4O1xuICAgIGJvcmRlci1yYWRpdXM6IDEwcHg7XG4gICAgb3BhY2l0eTogQG1hc2stb3BhY2l0eTtcbn1cbiIsIi5sb2FkbWUtbWFzayB7XG4gIGJhY2tncm91bmQtY29sb3I6ICNEREQ7XG4gIHdpZHRoOiAxMDBweDtcbiAgaGVpZ2h0OiAxMDBweDtcbiAgcG9zaXRpb246IGZpeGVkO1xuICB6LWluZGV4OiA5OTtcbiAgbGVmdDogNTAlO1xuICB0b3A6IDUwJTtcbiAgbWFyZ2luOiAtNTBweCAwIDAgLTUwcHg7XG4gIGJvcmRlci1yYWRpdXM6IDEwcHg7XG4gIG9wYWNpdHk6IDAuNTtcbn1cbi5sb2FkbWUtY2lyY3VsYXIsXG4ubG9hZG1lLWNpcmN1bGFyOmFmdGVyIHtcbiAgYm9yZGVyLXJhZGl1czogNTAlO1xuICB3aWR0aDogMTBlbTtcbiAgaGVpZ2h0OiAxMGVtO1xufVxuLmxvYWRtZS1jaXJjdWxhciB7XG4gIHdpZHRoOiA0MHB4O1xuICBoZWlnaHQ6IDQwcHg7XG4gIHBvc2l0aW9uOiBmaXhlZDtcbiAgbGVmdDogNTAlO1xuICB0b3A6IDUwJTtcbiAgbWFyZ2luOiAtMjBweCAwIDAgLTIwcHg7XG4gIHotaW5kZXg6IDEwMDtcbiAgZm9udC1zaXplOiAxMHB4O1xuICB0ZXh0LWluZGVudDogLTk5OTllbTtcbiAgYm9yZGVyLXRvcDogMXB4IHNvbGlkIHJnYmEoMjM3LCAyMzcsIDIzNywgMC44KTtcbiAgYm9yZGVyLXJpZ2h0OiAxcHggc29saWQgcmdiYSgyMzcsIDIzNywgMjM3LCAwLjgpO1xuICBib3JkZXItYm90dG9tOiAxcHggc29saWQgcmdiYSgyMzcsIDIzNywgMjM3LCAwLjgpO1xuICBib3JkZXItbGVmdDogMXB4IHNvbGlkICMwMDA7XG4gIHRyYW5zZm9ybTogdHJhbnNsYXRlWigwKTtcbiAgYW5pbWF0aW9uOiBsb2FkbWUtY2lyY3VsYXItYW5pbWF0ZSAxLjFzIGluZmluaXRlIGxpbmVhcjtcbn1cbkBrZXlmcmFtZXMgbG9hZG1lLWNpcmN1bGFyLWFuaW1hdGUge1xuICAwJSB7XG4gICAgdHJhbnNmb3JtOiByb3RhdGUoMGRlZyk7XG4gIH1cbiAgMTAwJSB7XG4gICAgdHJhbnNmb3JtOiByb3RhdGUoMzYwZGVnKTtcbiAgfVxufVxuLmxvYWRtZS1yb3RhdGVwbGFuZSB7XG4gIHdpZHRoOiA0MHB4O1xuICBoZWlnaHQ6IDQwcHg7XG4gIGJhY2tncm91bmQtY29sb3I6ICMwMDA7XG4gIHBvc2l0aW9uOiBmaXhlZDtcbiAgbGVmdDogNTAlO1xuICB0b3A6IDUwJTtcbiAgbWFyZ2luOiAtMjBweCAwIDAgLTIwcHg7XG4gIGFuaW1hdGlvbjogbG9hZG1lLXJvdGF0ZXBsYW5lLWFuaW1hdGUgMS4ycyBpbmZpbml0ZSBlYXNlLWluLW91dDtcbiAgei1pbmRleDogMTAwO1xufVxuQGtleWZyYW1lcyBsb2FkbWUtcm90YXRlcGxhbmUtYW5pbWF0ZSB7XG4gIDAlIHtcbiAgICB0cmFuc2Zvcm06IHBlcnNwZWN0aXZlKDEyMHB4KSByb3RhdGVYKDBkZWcpIHJvdGF0ZVkoMGRlZyk7XG4gIH1cbiAgNTAlIHtcbiAgICB0cmFuc2Zvcm06IHBlcnNwZWN0aXZlKDEyMHB4KSByb3RhdGVYKC0xODAuMWRlZykgcm90YXRlWSgwZGVnKTtcbiAgfVxuICAxMDAlIHtcbiAgICB0cmFuc2Zvcm06IHBlcnNwZWN0aXZlKDEyMHB4KSByb3RhdGVYKC0xODBkZWcpIHJvdGF0ZVkoLTE3OS45ZGVnKTtcbiAgfVxufVxuLmxvYWRtZS1jdWJlLWdyaWQge1xuICB3aWR0aDogNTBweDtcbiAgaGVpZ2h0OiA1MHB4O1xuICBwb3NpdGlvbjogZml4ZWQ7XG4gIGxlZnQ6IDUwJTtcbiAgdG9wOiA1MCU7XG4gIG1hcmdpbjogLTI1cHggMCAwIC0yNXB4O1xuICB6LWluZGV4OiAxMDA7XG59XG4ubG9hZG1lLWN1YmUtZ3JpZCAubG9hZG1lLWN1YmVHcmlkIHtcbiAgd2lkdGg6IDMzJTtcbiAgaGVpZ2h0OiAzMyU7XG4gIGJhY2tncm91bmQtY29sb3I6ICMwMDA7XG4gIGZsb2F0OiBsZWZ0O1xuICBhbmltYXRpb246IGxvYWRtZS1jdWJlR3JpZC1hbmltYXRlIDEuM3MgaW5maW5pdGUgZWFzZS1pbi1vdXQ7XG59XG4ubG9hZG1lLWN1YmUtZ3JpZCAubG9hZG1lLWN1YmVHcmlkMSB7XG4gIGFuaW1hdGlvbi1kZWxheTogMC4ycztcbn1cbi5sb2FkbWUtY3ViZS1ncmlkIC5sb2FkbWUtY3ViZUdyaWQyIHtcbiAgYW5pbWF0aW9uLWRlbGF5OiAwLjNzO1xufVxuLmxvYWRtZS1jdWJlLWdyaWQgLmxvYWRtZS1jdWJlR3JpZDMge1xuICBhbmltYXRpb24tZGVsYXk6IDAuNHM7XG59XG4ubG9hZG1lLWN1YmUtZ3JpZCAubG9hZG1lLWN1YmVHcmlkNCB7XG4gIGFuaW1hdGlvbi1kZWxheTogMC4xcztcbn1cbi5sb2FkbWUtY3ViZS1ncmlkIC5sb2FkbWUtY3ViZUdyaWQ1IHtcbiAgYW5pbWF0aW9uLWRlbGF5OiAwLjJzO1xufVxuLmxvYWRtZS1jdWJlLWdyaWQgLmxvYWRtZS1jdWJlR3JpZDYge1xuICBhbmltYXRpb24tZGVsYXk6IDAuM3M7XG59XG4ubG9hZG1lLWN1YmUtZ3JpZCAubG9hZG1lLWN1YmVHcmlkNyB7XG4gIGFuaW1hdGlvbi1kZWxheTogMHM7XG59XG4ubG9hZG1lLWN1YmUtZ3JpZCAubG9hZG1lLWN1YmVHcmlkOCB7XG4gIGFuaW1hdGlvbi1kZWxheTogMC4xcztcbn1cbi5sb2FkbWUtY3ViZS1ncmlkIC5sb2FkbWUtY3ViZUdyaWQ5IHtcbiAgYW5pbWF0aW9uLWRlbGF5OiAwLjJzO1xufVxuQGtleWZyYW1lcyBsb2FkbWUtY3ViZUdyaWQtYW5pbWF0ZSB7XG4gIDAlLFxuICA3MCUsXG4gIDEwMCUge1xuICAgIHRyYW5zZm9ybTogc2NhbGUzRCgxLCAxLCAxKTtcbiAgfVxuICAzNSUge1xuICAgIHRyYW5zZm9ybTogc2NhbGUzRCgwLCAwLCAxKTtcbiAgfVxufVxuLmxvYWRtZS1jaXJjbGVCb3VuY2Uge1xuICB3aWR0aDogNDBweDtcbiAgaGVpZ2h0OiA0MHB4O1xuICBwb3NpdGlvbjogZml4ZWQ7XG4gIGxlZnQ6IDUwJTtcbiAgdG9wOiA1MCU7XG4gIG1hcmdpbjogLTIwcHggMCAwIC0yMHB4O1xuICB6LWluZGV4OiAxMDA7XG59XG4ubG9hZG1lLWNpcmNsZUJvdW5jZTEsXG4ubG9hZG1lLWNpcmNsZUJvdW5jZTIge1xuICB3aWR0aDogMTAwJTtcbiAgaGVpZ2h0OiAxMDAlO1xuICBib3JkZXItcmFkaXVzOiA1MCU7XG4gIGJhY2tncm91bmQtY29sb3I6ICMwMDA7XG4gIG9wYWNpdHk6IDAuNjtcbiAgcG9zaXRpb246IGFic29sdXRlO1xuICB0b3A6IDA7XG4gIGxlZnQ6IDA7XG4gIGFuaW1hdGlvbjogbG9hZG1lLWNpcmNsZUJvdW5jZS1hbmltYXRlIDJzIGluZmluaXRlIGVhc2UtaW4tb3V0O1xufVxuLmxvYWRtZS1jaXJjbGVCb3VuY2UyIHtcbiAgLXdlYmtpdC1hbmltYXRpb24tZGVsYXk6IC0xcztcbiAgYW5pbWF0aW9uLWRlbGF5OiAtMXM7XG59XG5Aa2V5ZnJhbWVzIGxvYWRtZS1jaXJjbGVCb3VuY2UtYW5pbWF0ZSB7XG4gIDAlLFxuICAxMDAlIHtcbiAgICB0cmFuc2Zvcm06IHNjYWxlKDApO1xuICB9XG4gIDUwJSB7XG4gICAgdHJhbnNmb3JtOiBzY2FsZSgxKTtcbiAgfVxufVxuLmxvYWRtZVJlY3Qge1xuICB3aWR0aDogNTBweDtcbiAgaGVpZ2h0OiA0MHB4O1xuICBwb3NpdGlvbjogZml4ZWQ7XG4gIGxlZnQ6IDUwJTtcbiAgdG9wOiA1MCU7XG4gIG1hcmdpbjogLTIwcHggMCAwIC0yNXB4O1xuICB0ZXh0LWFsaWduOiBjZW50ZXI7XG4gIGZvbnQtc2l6ZTogMTBweDtcbiAgei1pbmRleDogMTAwO1xufVxuLmxvYWRtZVJlY3QgLmxvYWRtZVJlY3RDaGlsZCB7XG4gIGJhY2tncm91bmQtY29sb3I6ICMwMDA7XG4gIGhlaWdodDogMTAwJTtcbiAgd2lkdGg6IDZweDtcbiAgZGlzcGxheTogaW5saW5lLWJsb2NrO1xuICBhbmltYXRpb246IGxvYWRtZVJlY3QtYW5pbWF0ZSAxLjJzIGluZmluaXRlIGVhc2UtaW4tb3V0O1xufVxuLmxvYWRtZVJlY3QgLmxvYWRtZVJlY3QyIHtcbiAgYW5pbWF0aW9uLWRlbGF5OiAtMS4xcztcbn1cbi5sb2FkbWVSZWN0IC5sb2FkbWVSZWN0MyB7XG4gIGFuaW1hdGlvbi1kZWxheTogLTFzO1xufVxuLmxvYWRtZVJlY3QgLmxvYWRtZVJlY3Q0IHtcbiAgYW5pbWF0aW9uLWRlbGF5OiAtMC45cztcbn1cbi5sb2FkbWVSZWN0IC5sb2FkbWVSZWN0NSB7XG4gIGFuaW1hdGlvbi1kZWxheTogLTAuOHM7XG59XG5Aa2V5ZnJhbWVzIGxvYWRtZVJlY3QtYW5pbWF0ZSB7XG4gIDAlLFxuICA0MCUsXG4gIDEwMCUge1xuICAgIHRyYW5zZm9ybTogc2NhbGVZKDAuNCk7XG4gIH1cbiAgMjAlIHtcbiAgICB0cmFuc2Zvcm06IHNjYWxlWSgxKTtcbiAgfVxufVxuLmxvYWRtZS1jdWJlIHtcbiAgd2lkdGg6IDQwcHg7XG4gIGhlaWdodDogNDBweDtcbiAgcG9zaXRpb246IGZpeGVkO1xuICBsZWZ0OiA1MCU7XG4gIHRvcDogNTAlO1xuICBtYXJnaW46IC0yMHB4IDAgMCAtMjBweDtcbiAgei1pbmRleDogMTAwO1xufVxuLmxvYWRtZS1jdWJlMSxcbi5sb2FkbWUtY3ViZTIge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjMDAwO1xuICB3aWR0aDogMTVweDtcbiAgaGVpZ2h0OiAxNXB4O1xuICBwb3NpdGlvbjogYWJzb2x1dGU7XG4gIHRvcDogMDtcbiAgbGVmdDogMDtcbiAgYW5pbWF0aW9uOiBzay1jdWJlbW92ZSAxLjhzIGluZmluaXRlIGVhc2UtaW4tb3V0O1xufVxuLmxvYWRtZS1jdWJlMiB7XG4gIGFuaW1hdGlvbi1kZWxheTogLTAuOXM7XG59XG5Aa2V5ZnJhbWVzIHNrLWN1YmVtb3ZlIHtcbiAgMjUlIHtcbiAgICB0cmFuc2Zvcm06IHRyYW5zbGF0ZVgoMjVweCkgcm90YXRlKC05MGRlZykgc2NhbGUoMC41KTtcbiAgfVxuICA1MCUge1xuICAgIHRyYW5zZm9ybTogdHJhbnNsYXRlWCgyNXB4KSB0cmFuc2xhdGVZKDI1cHgpIHJvdGF0ZSgtMTc5ZGVnKTtcbiAgfVxuICA1MC4xJSB7XG4gICAgdHJhbnNmb3JtOiB0cmFuc2xhdGVYKDI1cHgpIHRyYW5zbGF0ZVkoMjVweCkgcm90YXRlKC0xODBkZWcpO1xuICB9XG4gIDc1JSB7XG4gICAgdHJhbnNmb3JtOiB0cmFuc2xhdGVYKDBweCkgdHJhbnNsYXRlWSgyNXB4KSByb3RhdGUoLTI3MGRlZykgc2NhbGUoMC41KTtcbiAgfVxuICAxMDAlIHtcbiAgICB0cmFuc2Zvcm06IHJvdGF0ZSgtMzYwZGVnKTtcbiAgfVxufVxuLmxvYWRtZS1zY2FsZW91dCB7XG4gIHdpZHRoOiA0MHB4O1xuICBoZWlnaHQ6IDQwcHg7XG4gIGJhY2tncm91bmQtY29sb3I6ICMwMDA7XG4gIHBvc2l0aW9uOiBmaXhlZDtcbiAgbGVmdDogNTAlO1xuICB0b3A6IDUwJTtcbiAgbWFyZ2luOiAtMjBweCAwIDAgLTIwcHg7XG4gIGJvcmRlci1yYWRpdXM6IDEwMCU7XG4gIGFuaW1hdGlvbjogbG9hZG1lLXNjYWxlb3V0LWFuaW1hdGUgMXMgaW5maW5pdGUgZWFzZS1pbi1vdXQ7XG4gIHotaW5kZXg6IDEwMDtcbn1cbkBrZXlmcmFtZXMgbG9hZG1lLXNjYWxlb3V0LWFuaW1hdGUge1xuICAwJSB7XG4gICAgdHJhbnNmb3JtOiBzY2FsZSgwKTtcbiAgfVxuICAxMDAlIHtcbiAgICB0cmFuc2Zvcm06IHNjYWxlKDEpO1xuICAgIG9wYWNpdHk6IDA7XG4gIH1cbn1cbi5sb2FkbWUtZG90IHtcbiAgd2lkdGg6IDQwcHg7XG4gIGhlaWdodDogNDBweDtcbiAgdGV4dC1hbGlnbjogY2VudGVyO1xuICBwb3NpdGlvbjogZml4ZWQ7XG4gIGxlZnQ6IDUwJTtcbiAgdG9wOiA1MCU7XG4gIG1hcmdpbjogLTIwcHggMCAwIC0yMHB4O1xuICBhbmltYXRpb246IGxvYWRtZS1kb3Qtcm90YXRlIDJzIGluZmluaXRlIGxpbmVhcjtcbiAgei1pbmRleDogMTAwO1xufVxuLmxvYWRtZS1kb3QxLFxuLmxvYWRtZS1kb3QyIHtcbiAgd2lkdGg6IDYwJTtcbiAgaGVpZ2h0OiA2MCU7XG4gIGRpc3BsYXk6IGlubGluZS1ibG9jaztcbiAgcG9zaXRpb246IGFic29sdXRlO1xuICB0b3A6IDA7XG4gIGJhY2tncm91bmQtY29sb3I6ICMwMDA7XG4gIGJvcmRlci1yYWRpdXM6IDEwMCU7XG4gIGFuaW1hdGlvbjogbG9hZG1lLWRvdC1ib3VuY2UgMnMgaW5maW5pdGUgZWFzZS1pbi1vdXQ7XG59XG4ubG9hZG1lLWRvdDIge1xuICB0b3A6IGF1dG87XG4gIGJvdHRvbTogMDtcbiAgYW5pbWF0aW9uLWRlbGF5OiAtMXM7XG59XG5Aa2V5ZnJhbWVzIGxvYWRtZS1kb3Qtcm90YXRlIHtcbiAgMTAwJSB7XG4gICAgdHJhbnNmb3JtOiByb3RhdGUoMzYwZGVnKTtcbiAgfVxufVxuQGtleWZyYW1lcyBsb2FkbWUtZG90LWJvdW5jZSB7XG4gIDAlLFxuICAxMDAlIHtcbiAgICB0cmFuc2Zvcm06IHNjYWxlKDApO1xuICB9XG4gIDUwJSB7XG4gICAgdHJhbnNmb3JtOiBzY2FsZSgxKTtcbiAgfVxufVxuLmxvYWRtZS1ib3VuY2VkIHtcbiAgd2lkdGg6IDcwcHg7XG4gIHRleHQtYWxpZ246IGNlbnRlcjtcbiAgcG9zaXRpb246IGZpeGVkO1xuICBsZWZ0OiA1MCU7XG4gIHRvcDogNTAlO1xuICBtYXJnaW46IDAgMCAwIC0zNXB4O1xuICB6LWluZGV4OiAxMDA7XG59XG4ubG9hZG1lLWJvdW5jZWQgLmxvYWRtZS1ib3VuY2VkLWNoaWxkIHtcbiAgd2lkdGg6IDE4cHg7XG4gIGhlaWdodDogMThweDtcbiAgYmFja2dyb3VuZC1jb2xvcjogIzAwMDtcbiAgYm9yZGVyLXJhZGl1czogMTAwJTtcbiAgZGlzcGxheTogaW5saW5lLWJsb2NrO1xuICBhbmltYXRpb246IGxvYWRtZS1ib3VuY2VkZWxheS1hbmltYXRlIDEuNHMgaW5maW5pdGUgZWFzZS1pbi1vdXQgYm90aDtcbn1cbi5sb2FkbWUtYm91bmNlZCAubG9hZG1lLWJvdW5jZWQxIHtcbiAgYW5pbWF0aW9uLWRlbGF5OiAtMC4zMnM7XG59XG4ubG9hZG1lLWJvdW5jZWQgLmxvYWRtZS1ib3VuY2VkMiB7XG4gIGFuaW1hdGlvbi1kZWxheTogLTAuMTZzO1xufVxuQGtleWZyYW1lcyBsb2FkbWUtYm91bmNlZGVsYXktYW5pbWF0ZSB7XG4gIDAlLFxuICA4MCUsXG4gIDEwMCUge1xuICAgIHRyYW5zZm9ybTogc2NhbGUoMCk7XG4gIH1cbiAgNDAlIHtcbiAgICB0cmFuc2Zvcm06IHNjYWxlKDEpO1xuICB9XG59XG4ubG9hZG1lLWNpcmNsZVBvaW50IHtcbiAgcG9zaXRpb246IGZpeGVkO1xuICBsZWZ0OiA1MCU7XG4gIHRvcDogNTAlO1xuICBtYXJnaW46IC0yMHB4IDAgMCAtMjBweDtcbiAgd2lkdGg6IDQwcHg7XG4gIGhlaWdodDogNDBweDtcbiAgei1pbmRleDogMTAwO1xufVxuLmxvYWRtZS1jaXJjbGVQb2ludCAubG9hZG1lLWNpcmNsZVBvaW50LWNoaWxkIHtcbiAgd2lkdGg6IDEwMCU7XG4gIGhlaWdodDogMTAwJTtcbiAgcG9zaXRpb246IGFic29sdXRlO1xuICBsZWZ0OiAwO1xuICB0b3A6IDA7XG59XG4ubG9hZG1lLWNpcmNsZVBvaW50IC5sb2FkbWUtY2lyY2xlUG9pbnQtY2hpbGQ6YmVmb3JlIHtcbiAgY29udGVudDogJyc7XG4gIGRpc3BsYXk6IGJsb2NrO1xuICBtYXJnaW46IDAgYXV0bztcbiAgd2lkdGg6IDE1JTtcbiAgaGVpZ2h0OiAxNSU7XG4gIGJhY2tncm91bmQtY29sb3I6ICMwMDA7XG4gIGJvcmRlci1yYWRpdXM6IDEwMCU7XG4gIGFuaW1hdGlvbjogbG9hZG1lLWNpcmNsZVBvaW50LWFuaW1hdGUgMS4ycyBpbmZpbml0ZSBlYXNlLWluLW91dCBib3RoO1xufVxuLmxvYWRtZS1jaXJjbGVQb2ludCAubG9hZG1lLWNpcmNsZVBvaW50MiB7XG4gIHRyYW5zZm9ybTogcm90YXRlKDMwZGVnKTtcbn1cbi5sb2FkbWUtY2lyY2xlUG9pbnQgLmxvYWRtZS1jaXJjbGVQb2ludDMge1xuICB0cmFuc2Zvcm06IHJvdGF0ZSg2MGRlZyk7XG59XG4ubG9hZG1lLWNpcmNsZVBvaW50IC5sb2FkbWUtY2lyY2xlUG9pbnQ0IHtcbiAgdHJhbnNmb3JtOiByb3RhdGUoOTBkZWcpO1xufVxuLmxvYWRtZS1jaXJjbGVQb2ludCAubG9hZG1lLWNpcmNsZVBvaW50NSB7XG4gIHRyYW5zZm9ybTogcm90YXRlKDEyMGRlZyk7XG59XG4ubG9hZG1lLWNpcmNsZVBvaW50IC5sb2FkbWUtY2lyY2xlUG9pbnQ2IHtcbiAgdHJhbnNmb3JtOiByb3RhdGUoMTUwZGVnKTtcbn1cbi5sb2FkbWUtY2lyY2xlUG9pbnQgLmxvYWRtZS1jaXJjbGVQb2ludDcge1xuICB0cmFuc2Zvcm06IHJvdGF0ZSgxODBkZWcpO1xufVxuLmxvYWRtZS1jaXJjbGVQb2ludCAubG9hZG1lLWNpcmNsZVBvaW50OCB7XG4gIHRyYW5zZm9ybTogcm90YXRlKDIxMGRlZyk7XG59XG4ubG9hZG1lLWNpcmNsZVBvaW50IC5sb2FkbWUtY2lyY2xlUG9pbnQ5IHtcbiAgdHJhbnNmb3JtOiByb3RhdGUoMjQwZGVnKTtcbn1cbi5sb2FkbWUtY2lyY2xlUG9pbnQgLmxvYWRtZS1jaXJjbGVQb2ludDEwIHtcbiAgdHJhbnNmb3JtOiByb3RhdGUoMjcwZGVnKTtcbn1cbi5sb2FkbWUtY2lyY2xlUG9pbnQgLmxvYWRtZS1jaXJjbGVQb2ludDExIHtcbiAgdHJhbnNmb3JtOiByb3RhdGUoMzAwZGVnKTtcbn1cbi5sb2FkbWUtY2lyY2xlUG9pbnQgLmxvYWRtZS1jaXJjbGVQb2ludDEyIHtcbiAgdHJhbnNmb3JtOiByb3RhdGUoMzMwZGVnKTtcbn1cbi5sb2FkbWUtY2lyY2xlUG9pbnQgLmxvYWRtZS1jaXJjbGVQb2ludDI6YmVmb3JlIHtcbiAgYW5pbWF0aW9uLWRlbGF5OiAtMS4xcztcbn1cbi5sb2FkbWUtY2lyY2xlUG9pbnQgLmxvYWRtZS1jaXJjbGVQb2ludDM6YmVmb3JlIHtcbiAgYW5pbWF0aW9uLWRlbGF5OiAtMXM7XG59XG4ubG9hZG1lLWNpcmNsZVBvaW50IC5sb2FkbWUtY2lyY2xlUG9pbnQ0OmJlZm9yZSB7XG4gIGFuaW1hdGlvbi1kZWxheTogLTAuOXM7XG59XG4ubG9hZG1lLWNpcmNsZVBvaW50IC5sb2FkbWUtY2lyY2xlUG9pbnQ1OmJlZm9yZSB7XG4gIGFuaW1hdGlvbi1kZWxheTogLTAuOHM7XG59XG4ubG9hZG1lLWNpcmNsZVBvaW50IC5sb2FkbWUtY2lyY2xlUG9pbnQ2OmJlZm9yZSB7XG4gIGFuaW1hdGlvbi1kZWxheTogLTAuN3M7XG59XG4ubG9hZG1lLWNpcmNsZVBvaW50IC5sb2FkbWUtY2lyY2xlUG9pbnQ3OmJlZm9yZSB7XG4gIGFuaW1hdGlvbi1kZWxheTogLTAuNnM7XG59XG4ubG9hZG1lLWNpcmNsZVBvaW50IC5sb2FkbWUtY2lyY2xlUG9pbnQ4OmJlZm9yZSB7XG4gIGFuaW1hdGlvbi1kZWxheTogLTAuNXM7XG59XG4ubG9hZG1lLWNpcmNsZVBvaW50IC5sb2FkbWUtY2lyY2xlUG9pbnQ5OmJlZm9yZSB7XG4gIGFuaW1hdGlvbi1kZWxheTogLTAuNHM7XG59XG4ubG9hZG1lLWNpcmNsZVBvaW50IC5sb2FkbWUtY2lyY2xlUG9pbnQxMDpiZWZvcmUge1xuICBhbmltYXRpb24tZGVsYXk6IC0wLjNzO1xufVxuLmxvYWRtZS1jaXJjbGVQb2ludCAubG9hZG1lLWNpcmNsZVBvaW50MTE6YmVmb3JlIHtcbiAgYW5pbWF0aW9uLWRlbGF5OiAtMC4ycztcbn1cbi5sb2FkbWUtY2lyY2xlUG9pbnQgLmxvYWRtZS1jaXJjbGVQb2ludDEyOmJlZm9yZSB7XG4gIGFuaW1hdGlvbi1kZWxheTogLTAuMXM7XG59XG5Aa2V5ZnJhbWVzIGxvYWRtZS1jaXJjbGVQb2ludC1hbmltYXRlIHtcbiAgMCUsXG4gIDgwJSxcbiAgMTAwJSB7XG4gICAgdHJhbnNmb3JtOiBzY2FsZSgwKTtcbiAgfVxuICA0MCUge1xuICAgIHRyYW5zZm9ybTogc2NhbGUoMSk7XG4gIH1cbn1cbi5sb2FkbWUtZmFkaW5nQ2lyY2xlIHtcbiAgd2lkdGg6IDQwcHg7XG4gIGhlaWdodDogNDBweDtcbiAgcG9zaXRpb246IGZpeGVkO1xuICBsZWZ0OiA1MCU7XG4gIHRvcDogNTAlO1xuICBtYXJnaW46IC0yMHB4IDAgMCAtMjBweDtcbiAgei1pbmRleDogMTAwO1xufVxuLmxvYWRtZS1mYWRpbmdDaXJjbGUgLmxvYWRtZS1mYWRpbmdDaXJjbGUtY2hpbGQge1xuICB3aWR0aDogMTAwJTtcbiAgaGVpZ2h0OiAxMDAlO1xuICBwb3NpdGlvbjogYWJzb2x1dGU7XG4gIGxlZnQ6IDA7XG4gIHRvcDogMDtcbn1cbi5sb2FkbWUtZmFkaW5nQ2lyY2xlIC5sb2FkbWUtZmFkaW5nQ2lyY2xlLWNoaWxkOmJlZm9yZSB7XG4gIGNvbnRlbnQ6ICcnO1xuICBkaXNwbGF5OiBibG9jaztcbiAgbWFyZ2luOiAwIGF1dG87XG4gIHdpZHRoOiAxNSU7XG4gIGhlaWdodDogMTUlO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjMDAwO1xuICBib3JkZXItcmFkaXVzOiAxMDAlO1xuICBhbmltYXRpb246IGxvYWRtZS1mYWRpbmdDaXJjbGUgMS4ycyBpbmZpbml0ZSBlYXNlLWluLW91dCBib3RoO1xufVxuLmxvYWRtZS1mYWRpbmdDaXJjbGUgLmxvYWRtZS1mYWRpbmdDaXJjbGUtY2hpbGQyIHtcbiAgdHJhbnNmb3JtOiByb3RhdGUoMzBkZWcpO1xufVxuLmxvYWRtZS1mYWRpbmdDaXJjbGUgLmxvYWRtZS1mYWRpbmdDaXJjbGUtY2hpbGQzIHtcbiAgdHJhbnNmb3JtOiByb3RhdGUoNjBkZWcpO1xufVxuLmxvYWRtZS1mYWRpbmdDaXJjbGUgLmxvYWRtZS1mYWRpbmdDaXJjbGUtY2hpbGQ0IHtcbiAgdHJhbnNmb3JtOiByb3RhdGUoOTBkZWcpO1xufVxuLmxvYWRtZS1mYWRpbmdDaXJjbGUgLmxvYWRtZS1mYWRpbmdDaXJjbGUtY2hpbGQ1IHtcbiAgdHJhbnNmb3JtOiByb3RhdGUoMTIwZGVnKTtcbn1cbi5sb2FkbWUtZmFkaW5nQ2lyY2xlIC5sb2FkbWUtZmFkaW5nQ2lyY2xlLWNoaWxkNiB7XG4gIHRyYW5zZm9ybTogcm90YXRlKDE1MGRlZyk7XG59XG4ubG9hZG1lLWZhZGluZ0NpcmNsZSAubG9hZG1lLWZhZGluZ0NpcmNsZS1jaGlsZDcge1xuICB0cmFuc2Zvcm06IHJvdGF0ZSgxODBkZWcpO1xufVxuLmxvYWRtZS1mYWRpbmdDaXJjbGUgLmxvYWRtZS1mYWRpbmdDaXJjbGUtY2hpbGQ4IHtcbiAgdHJhbnNmb3JtOiByb3RhdGUoMjEwZGVnKTtcbn1cbi5sb2FkbWUtZmFkaW5nQ2lyY2xlIC5sb2FkbWUtZmFkaW5nQ2lyY2xlLWNoaWxkOSB7XG4gIHRyYW5zZm9ybTogcm90YXRlKDI0MGRlZyk7XG59XG4ubG9hZG1lLWZhZGluZ0NpcmNsZSAubG9hZG1lLWZhZGluZ0NpcmNsZS1jaGlsZDEwIHtcbiAgdHJhbnNmb3JtOiByb3RhdGUoMjcwZGVnKTtcbn1cbi5sb2FkbWUtZmFkaW5nQ2lyY2xlIC5sb2FkbWUtZmFkaW5nQ2lyY2xlLWNoaWxkMTEge1xuICB0cmFuc2Zvcm06IHJvdGF0ZSgzMDBkZWcpO1xufVxuLmxvYWRtZS1mYWRpbmdDaXJjbGUgLmxvYWRtZS1mYWRpbmdDaXJjbGUtY2hpbGQxMiB7XG4gIHRyYW5zZm9ybTogcm90YXRlKDMzMGRlZyk7XG59XG4ubG9hZG1lLWZhZGluZ0NpcmNsZSAubG9hZG1lLWZhZGluZ0NpcmNsZS1jaGlsZDI6YmVmb3JlIHtcbiAgYW5pbWF0aW9uLWRlbGF5OiAtMS4xcztcbn1cbi5sb2FkbWUtZmFkaW5nQ2lyY2xlIC5sb2FkbWUtZmFkaW5nQ2lyY2xlLWNoaWxkMzpiZWZvcmUge1xuICBhbmltYXRpb24tZGVsYXk6IC0xcztcbn1cbi5sb2FkbWUtZmFkaW5nQ2lyY2xlIC5sb2FkbWUtZmFkaW5nQ2lyY2xlLWNoaWxkNDpiZWZvcmUge1xuICBhbmltYXRpb24tZGVsYXk6IC0wLjlzO1xufVxuLmxvYWRtZS1mYWRpbmdDaXJjbGUgLmxvYWRtZS1mYWRpbmdDaXJjbGUtY2hpbGQ1OmJlZm9yZSB7XG4gIGFuaW1hdGlvbi1kZWxheTogLTAuOHM7XG59XG4ubG9hZG1lLWZhZGluZ0NpcmNsZSAubG9hZG1lLWZhZGluZ0NpcmNsZS1jaGlsZDY6YmVmb3JlIHtcbiAgYW5pbWF0aW9uLWRlbGF5OiAtMC43cztcbn1cbi5sb2FkbWUtZmFkaW5nQ2lyY2xlIC5sb2FkbWUtZmFkaW5nQ2lyY2xlLWNoaWxkNzpiZWZvcmUge1xuICBhbmltYXRpb24tZGVsYXk6IC0wLjZzO1xufVxuLmxvYWRtZS1mYWRpbmdDaXJjbGUgLmxvYWRtZS1mYWRpbmdDaXJjbGUtY2hpbGQ4OmJlZm9yZSB7XG4gIGFuaW1hdGlvbi1kZWxheTogLTAuNXM7XG59XG4ubG9hZG1lLWZhZGluZ0NpcmNsZSAubG9hZG1lLWZhZGluZ0NpcmNsZS1jaGlsZDk6YmVmb3JlIHtcbiAgYW5pbWF0aW9uLWRlbGF5OiAtMC40cztcbn1cbi5sb2FkbWUtZmFkaW5nQ2lyY2xlIC5sb2FkbWUtZmFkaW5nQ2lyY2xlLWNoaWxkMTA6YmVmb3JlIHtcbiAgYW5pbWF0aW9uLWRlbGF5OiAtMC4zcztcbn1cbi5sb2FkbWUtZmFkaW5nQ2lyY2xlIC5sb2FkbWUtZmFkaW5nQ2lyY2xlLWNoaWxkMTE6YmVmb3JlIHtcbiAgYW5pbWF0aW9uLWRlbGF5OiAtMC4ycztcbn1cbi5sb2FkbWUtZmFkaW5nQ2lyY2xlIC5sb2FkbWUtZmFkaW5nQ2lyY2xlLWNoaWxkMTI6YmVmb3JlIHtcbiAgYW5pbWF0aW9uLWRlbGF5OiAtMC4xcztcbn1cbkBrZXlmcmFtZXMgbG9hZG1lLWZhZGluZ0NpcmNsZSB7XG4gIDAlLFxuICAzOSUsXG4gIDEwMCUge1xuICAgIG9wYWNpdHk6IDA7XG4gIH1cbiAgNDAlIHtcbiAgICBvcGFjaXR5OiAxO1xuICB9XG59XG4ubG9hZG1lLWZvbGRpbmdDdWJlIHtcbiAgd2lkdGg6IDQwcHg7XG4gIGhlaWdodDogNDBweDtcbiAgdHJhbnNmb3JtOiByb3RhdGVaKDQ1ZGVnKTtcbiAgcG9zaXRpb246IGZpeGVkO1xuICBsZWZ0OiA1MCU7XG4gIHRvcDogNTAlO1xuICBtYXJnaW46IC0yMHB4IDAgMCAtMjBweDtcbiAgei1pbmRleDogMTAwO1xufVxuLmxvYWRtZS1mb2xkaW5nQ3ViZSAubG9hZG1lLWZvbGRpbmdDdWJlLWNoaWxkIHtcbiAgZmxvYXQ6IGxlZnQ7XG4gIHdpZHRoOiA1MCU7XG4gIGhlaWdodDogNTAlO1xuICBwb3NpdGlvbjogcmVsYXRpdmU7XG4gIHRyYW5zZm9ybTogc2NhbGUoMS4xKTtcbn1cbi5sb2FkbWUtZm9sZGluZ0N1YmUgLmxvYWRtZS1mb2xkaW5nQ3ViZS1jaGlsZDpiZWZvcmUge1xuICBjb250ZW50OiAnJztcbiAgcG9zaXRpb246IGFic29sdXRlO1xuICB0b3A6IDA7XG4gIGxlZnQ6IDA7XG4gIHdpZHRoOiAxMDAlO1xuICBoZWlnaHQ6IDEwMCU7XG4gIGJhY2tncm91bmQtY29sb3I6ICMwMDA7XG4gIGFuaW1hdGlvbjogbG9hZG1lLWZvbGRDdWJlQW5nbGUtYW5pbWF0ZSAyLjRzIGluZmluaXRlIGxpbmVhciBib3RoO1xuICB0cmFuc2Zvcm0tb3JpZ2luOiAxMDAlIDEwMCU7XG59XG4ubG9hZG1lLWZvbGRpbmdDdWJlIC5sb2FkbWUtZm9sZGluZ0N1YmUtY2hpbGQyIHtcbiAgdHJhbnNmb3JtOiBzY2FsZSgxLjEpIHJvdGF0ZVooOTBkZWcpO1xufVxuLmxvYWRtZS1mb2xkaW5nQ3ViZSAubG9hZG1lLWZvbGRpbmdDdWJlLWNoaWxkMyB7XG4gIHRyYW5zZm9ybTogc2NhbGUoMS4xKSByb3RhdGVaKDE4MGRlZyk7XG59XG4ubG9hZG1lLWZvbGRpbmdDdWJlIC5sb2FkbWUtZm9sZGluZ0N1YmUtY2hpbGQ0IHtcbiAgdHJhbnNmb3JtOiBzY2FsZSgxLjEpIHJvdGF0ZVooMjcwZGVnKTtcbn1cbi5sb2FkbWUtZm9sZGluZ0N1YmUgLmxvYWRtZS1mb2xkaW5nQ3ViZS1jaGlsZDI6YmVmb3JlIHtcbiAgYW5pbWF0aW9uLWRlbGF5OiAwLjNzO1xufVxuLmxvYWRtZS1mb2xkaW5nQ3ViZSAubG9hZG1lLWZvbGRpbmdDdWJlLWNoaWxkMzpiZWZvcmUge1xuICBhbmltYXRpb24tZGVsYXk6IDAuNnM7XG59XG4ubG9hZG1lLWZvbGRpbmdDdWJlIC5sb2FkbWUtZm9sZGluZ0N1YmUtY2hpbGQ0OmJlZm9yZSB7XG4gIGFuaW1hdGlvbi1kZWxheTogMC45cztcbn1cbkBrZXlmcmFtZXMgbG9hZG1lLWZvbGRDdWJlQW5nbGUtYW5pbWF0ZSB7XG4gIDAlLFxuICAxMCUge1xuICAgIHRyYW5zZm9ybTogcGVyc3BlY3RpdmUoMTQwcHgpIHJvdGF0ZVgoLTE4MGRlZyk7XG4gICAgb3BhY2l0eTogMDtcbiAgfVxuICAyNSUsXG4gIDc1JSB7XG4gICAgdHJhbnNmb3JtOiBwZXJzcGVjdGl2ZSgxNDBweCkgcm90YXRlWCgwZGVnKTtcbiAgICBvcGFjaXR5OiAxO1xuICB9XG4gIDkwJSxcbiAgMTAwJSB7XG4gICAgdHJhbnNmb3JtOiBwZXJzcGVjdGl2ZSgxNDBweCkgcm90YXRlWSgxODBkZWcpO1xuICAgIG9wYWNpdHk6IDA7XG4gIH1cbn1cbi5sb2FkbWVMb3ZlIHtcbiAgcG9zaXRpb246IGZpeGVkO1xuICB3aWR0aDogNTBweDtcbiAgaGVpZ2h0OiA1MHB4O1xuICBsZWZ0OiA1MCU7XG4gIHRvcDogNTAlO1xuICBtYXJnaW46IC0yNXB4IDAgMCAtMjVweDtcbiAgei1pbmRleDogMTAwO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjMDAwO1xuICBhbmltYXRpb246IGxvYWRtZS1sb3ZlLWFuaW1hdGUgMC44cyBpbmZpbml0ZSBhbHRlcm5hdGU7XG4gIGFuaW1hdGlvbi10aW1pbmctZnVuY3Rpb246IGVhc2UtaW47XG59XG4ubG9hZG1lTG92ZTpiZWZvcmUsXG4ubG9hZG1lTG92ZTphZnRlciB7XG4gIHBvc2l0aW9uOiBhYnNvbHV0ZTtcbiAgd2lkdGg6IDUwcHg7XG4gIGhlaWdodDogNTBweDtcbiAgY29udGVudDogJyc7XG4gIGJvcmRlci1yYWRpdXM6IDUwJTtcbiAgYmFja2dyb3VuZC1jb2xvcjogIzAwMDtcbn1cbi5sb2FkbWVMb3ZlOmJlZm9yZSB7XG4gIGJvdHRvbTogMHB4O1xuICBsZWZ0OiAtMjVweDtcbn1cbi5sb2FkbWVMb3ZlOmFmdGVyIHtcbiAgdG9wOiAtMjVweDtcbiAgcmlnaHQ6IDBweDtcbn1cbkBrZXlmcmFtZXMgbG9hZG1lLWxvdmUtYW5pbWF0ZSB7XG4gIDAlIHtcbiAgICB0cmFuc2Zvcm06IHNjYWxlKDEsIDEpIHJvdGF0ZSg0NWRlZyk7XG4gIH1cbiAgMTAwJSB7XG4gICAgdHJhbnNmb3JtOiBzY2FsZSgwLjUsIDAuNSkgcm90YXRlKDQ1ZGVnKTtcbiAgfVxufVxuLmxvYWRtZUNsb2NrIHtcbiAgaGVpZ2h0OiA3MHB4O1xuICB3aWR0aDogMTEwcHg7XG4gIHBvc2l0aW9uOiBmaXhlZDtcbiAgbGVmdDogNTAlO1xuICB0b3A6IDUwJTtcbiAgbWFyZ2luOiAtMzVweCAwIDAgLTU1cHg7XG4gIHotaW5kZXg6IDEwMDtcbn1cbi5sb2FkbWVDbG9jay1ib2R5IC5sb2FkbWVDbG9jay1wZW5kdWx1bSB7XG4gIGhlaWdodDogNzBweDtcbiAgYW5pbWF0aW9uLWR1cmF0aW9uOiAxcztcbiAgYW5pbWF0aW9uLW5hbWU6IGxvYWRtZS10aWNrdG9jaztcbiAgYW5pbWF0aW9uLWl0ZXJhdGlvbi1jb3VudDogaW5maW5pdGU7XG4gIGFuaW1hdGlvbi10aW1pbmctZnVuY3Rpb246IGN1YmljLWJlemllcigwLjY0NSwgMC4wNDUsIDAuMzU1LCAxKTtcbiAgYW5pbWF0aW9uLWRpcmVjdGlvbjogYWx0ZXJuYXRlO1xuICBhbmltYXRpb24tZmlsbC1tb2RlOiBib3RoO1xuICBhbmltYXRpb24tcGxheS1zdGF0ZTogcnVubmluZztcbiAgdHJhbnNmb3JtLW9yaWdpbjogNTAlIC03MCU7XG59XG4ubG9hZG1lQ2xvY2stcGVuZHVsdW0gLmxvYWRtZVBlbmR1bHVtLXN0aWNrIHtcbiAgaGVpZ2h0OiA3MCU7XG4gIHdpZHRoOiA2cHg7XG4gIG1hcmdpbjogMCBhdXRvO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjMDAwO1xufVxuLmxvYWRtZUNsb2NrLXBlbmR1bHVtIC5sb2FkbWVQZW5kdWx1bS1ib2R5IHtcbiAgaGVpZ2h0OiAyMHB4O1xuICB3aWR0aDogMjBweDtcbiAgYm9yZGVyLXJhZGl1czogNDBweDtcbiAgbWFyZ2luOiAwIGF1dG87XG4gIG1hcmdpbi10b3A6IC0ycHg7XG4gIGJhY2tncm91bmQtY29sb3I6ICMwMDA7XG59XG5Aa2V5ZnJhbWVzIGxvYWRtZS10aWNrdG9jayB7XG4gIDAlIHtcbiAgICB0cmFuc2Zvcm06IHJvdGF0ZSgxNWRlZyk7XG4gIH1cbiAgMTAwJSB7XG4gICAgdHJhbnNmb3JtOiByb3RhdGUoLTE1ZGVnKTtcbiAgfVxufVxuIiwiLmxvYWRtZS1jaXJjdWxhcixcbi5sb2FkbWUtY2lyY3VsYXI6YWZ0ZXIge1xuICAgIGJvcmRlci1yYWRpdXM6IDUwJTtcbiAgICB3aWR0aDogMTBlbTtcbiAgICBoZWlnaHQ6IDEwZW07XG59XG5cbi5sb2FkbWUtY2lyY3VsYXIge1xuICAgIHdpZHRoOiA0MHB4O1xuICAgIGhlaWdodDogNDBweDtcbiAgICBwb3NpdGlvbjogZml4ZWQ7XG4gICAgbGVmdDogNTAlO1xuICAgIHRvcDogNTAlO1xuICAgIG1hcmdpbjogLTIwcHggMCAwIC0yMHB4O1xuICAgIHotaW5kZXg6IDEwMDtcbiAgICBmb250LXNpemU6IDEwcHg7XG4gICAgdGV4dC1pbmRlbnQ6IC05OTk5ZW07XG4gICAgYm9yZGVyLXRvcDogMXB4IHNvbGlkIHJnYmEoMjM3LCAyMzcsIDIzNywgMC44KTtcbiAgICBib3JkZXItcmlnaHQ6IDFweCBzb2xpZCByZ2JhKDIzNywgMjM3LCAyMzcsIDAuOCk7XG4gICAgYm9yZGVyLWJvdHRvbTogMXB4IHNvbGlkIHJnYmEoMjM3LCAyMzcsIDIzNywgMC44KTtcbiAgICBib3JkZXItbGVmdDogMXB4IHNvbGlkIEBsb2FkLWNvbG9yO1xuICAgIHRyYW5zZm9ybTogdHJhbnNsYXRlWigwKTtcbiAgICBhbmltYXRpb246IGxvYWRtZS1jaXJjdWxhci1hbmltYXRlIDEuMXMgaW5maW5pdGUgbGluZWFyO1xufVxuXG5Aa2V5ZnJhbWVzIGxvYWRtZS1jaXJjdWxhci1hbmltYXRlIHtcbiAgICAwJSB7XG4gICAgICAgIHRyYW5zZm9ybTogcm90YXRlKDBkZWcpO1xuICAgIH1cbiAgICAxMDAlIHtcbiAgICAgICAgdHJhbnNmb3JtOiByb3RhdGUoMzYwZGVnKTtcbiAgICB9XG59XG4iLCIubG9hZG1lLXJvdGF0ZXBsYW5lIHtcbiAgICB3aWR0aDogNDBweDtcbiAgICBoZWlnaHQ6IDQwcHg7XG4gICAgYmFja2dyb3VuZC1jb2xvcjogQGxvYWQtY29sb3I7XG4gICAgcG9zaXRpb246IGZpeGVkO1xuICAgIGxlZnQ6IDUwJTtcbiAgICB0b3A6IDUwJTtcbiAgICBtYXJnaW46IC0yMHB4IDAgMCAtMjBweDtcbiAgICBhbmltYXRpb246IGxvYWRtZS1yb3RhdGVwbGFuZS1hbmltYXRlIDEuMnMgaW5maW5pdGUgZWFzZS1pbi1vdXQ7XG4gICAgei1pbmRleDogMTAwO1xufVxuXG5Aa2V5ZnJhbWVzIGxvYWRtZS1yb3RhdGVwbGFuZS1hbmltYXRlIHtcbiAgICAwJSB7XG4gICAgICAgIHRyYW5zZm9ybTogcGVyc3BlY3RpdmUoMTIwcHgpIHJvdGF0ZVgoMGRlZykgcm90YXRlWSgwZGVnKTtcbiAgICB9XG4gICAgNTAlIHtcbiAgICAgICAgdHJhbnNmb3JtOiBwZXJzcGVjdGl2ZSgxMjBweCkgcm90YXRlWCgtMTgwLjFkZWcpIHJvdGF0ZVkoMGRlZyk7XG4gICAgfVxuICAgIDEwMCUge1xuICAgICAgICB0cmFuc2Zvcm06IHBlcnNwZWN0aXZlKDEyMHB4KSByb3RhdGVYKC0xODBkZWcpIHJvdGF0ZVkoLTE3OS45ZGVnKTtcbiAgICB9XG59XG4iLCIubG9hZG1lLWN1YmUtZ3JpZCB7XG4gICAgd2lkdGg6IDUwcHg7XG4gICAgaGVpZ2h0OiA1MHB4O1xuICAgIHBvc2l0aW9uOiBmaXhlZDtcbiAgICBsZWZ0OiA1MCU7XG4gICAgdG9wOiA1MCU7XG4gICAgbWFyZ2luOiAtMjVweCAwIDAgLTI1cHg7XG4gICAgei1pbmRleDogMTAwO1xuICAgIC5sb2FkbWUtY3ViZUdyaWQge1xuICAgICAgICB3aWR0aDogMzMlO1xuICAgICAgICBoZWlnaHQ6IDMzJTtcbiAgICAgICAgYmFja2dyb3VuZC1jb2xvcjogQGxvYWQtY29sb3I7XG4gICAgICAgIGZsb2F0OiBsZWZ0O1xuICAgICAgICBhbmltYXRpb246IGxvYWRtZS1jdWJlR3JpZC1hbmltYXRlIDEuM3MgaW5maW5pdGUgZWFzZS1pbi1vdXQ7XG4gICAgfVxuICAgIC5sb2FkbWUtY3ViZUdyaWQxIHtcbiAgICAgICAgYW5pbWF0aW9uLWRlbGF5OiAwLjJzO1xuICAgIH1cbiAgICAubG9hZG1lLWN1YmVHcmlkMiB7XG4gICAgICAgIGFuaW1hdGlvbi1kZWxheTogMC4zcztcbiAgICB9XG4gICAgLmxvYWRtZS1jdWJlR3JpZDMge1xuICAgICAgICBhbmltYXRpb24tZGVsYXk6IDAuNHM7XG4gICAgfVxuICAgIC5sb2FkbWUtY3ViZUdyaWQ0IHtcbiAgICAgICAgYW5pbWF0aW9uLWRlbGF5OiAwLjFzO1xuICAgIH1cbiAgICAubG9hZG1lLWN1YmVHcmlkNSB7XG4gICAgICAgIGFuaW1hdGlvbi1kZWxheTogMC4ycztcbiAgICB9XG4gICAgLmxvYWRtZS1jdWJlR3JpZDYge1xuICAgICAgICBhbmltYXRpb24tZGVsYXk6IDAuM3M7XG4gICAgfVxuICAgIC5sb2FkbWUtY3ViZUdyaWQ3IHtcbiAgICAgICAgYW5pbWF0aW9uLWRlbGF5OiAwcztcbiAgICB9XG4gICAgLmxvYWRtZS1jdWJlR3JpZDgge1xuICAgICAgICBhbmltYXRpb24tZGVsYXk6IDAuMXM7XG4gICAgfVxuICAgIC5sb2FkbWUtY3ViZUdyaWQ5IHtcbiAgICAgICAgYW5pbWF0aW9uLWRlbGF5OiAwLjJzO1xuICAgIH1cbn1cblxuQGtleWZyYW1lcyBsb2FkbWUtY3ViZUdyaWQtYW5pbWF0ZSB7XG4gICAgMCUsXG4gICAgNzAlLFxuICAgIDEwMCUge1xuICAgICAgICB0cmFuc2Zvcm06IHNjYWxlM0QoMSwgMSwgMSk7XG4gICAgfVxuICAgIDM1JSB7XG4gICAgICAgIHRyYW5zZm9ybTogc2NhbGUzRCgwLCAwLCAxKTtcbiAgICB9XG59XG4iLCIubG9hZG1lLWNpcmNsZUJvdW5jZSB7XG4gICAgd2lkdGg6IDQwcHg7XG4gICAgaGVpZ2h0OiA0MHB4O1xuICAgIHBvc2l0aW9uOiBmaXhlZDtcbiAgICBsZWZ0OiA1MCU7XG4gICAgdG9wOiA1MCU7XG4gICAgbWFyZ2luOiAtMjBweCAwIDAgLTIwcHg7XG4gICAgei1pbmRleDogMTAwO1xufVxuXG4ubG9hZG1lLWNpcmNsZUJvdW5jZTEsXG4ubG9hZG1lLWNpcmNsZUJvdW5jZTIge1xuICAgIHdpZHRoOiAxMDAlO1xuICAgIGhlaWdodDogMTAwJTtcbiAgICBib3JkZXItcmFkaXVzOiA1MCU7XG4gICAgYmFja2dyb3VuZC1jb2xvcjogQGxvYWQtY29sb3I7XG4gICAgb3BhY2l0eTogMC42O1xuICAgIHBvc2l0aW9uOiBhYnNvbHV0ZTtcbiAgICB0b3A6IDA7XG4gICAgbGVmdDogMDtcbiAgICBhbmltYXRpb246IGxvYWRtZS1jaXJjbGVCb3VuY2UtYW5pbWF0ZSAyLjBzIGluZmluaXRlIGVhc2UtaW4tb3V0O1xufVxuXG4ubG9hZG1lLWNpcmNsZUJvdW5jZTIge1xuICAgIC13ZWJraXQtYW5pbWF0aW9uLWRlbGF5OiAtMS4wcztcbiAgICBhbmltYXRpb24tZGVsYXk6IC0xLjBzO1xufVxuXG5Aa2V5ZnJhbWVzIGxvYWRtZS1jaXJjbGVCb3VuY2UtYW5pbWF0ZSB7XG4gICAgMCUsXG4gICAgMTAwJSB7XG4gICAgICAgIHRyYW5zZm9ybTogc2NhbGUoMC4wKTtcbiAgICB9XG4gICAgNTAlIHtcbiAgICAgICAgdHJhbnNmb3JtOiBzY2FsZSgxLjApO1xuICAgIH1cbn1cbiIsIi5sb2FkbWVSZWN0IHtcbiAgICB3aWR0aDogNTBweDtcbiAgICBoZWlnaHQ6IDQwcHg7XG4gICAgcG9zaXRpb246IGZpeGVkO1xuICAgIGxlZnQ6IDUwJTtcbiAgICB0b3A6IDUwJTtcbiAgICBtYXJnaW46IC0yMHB4IDAgMCAtMjVweDtcbiAgICB0ZXh0LWFsaWduOiBjZW50ZXI7XG4gICAgZm9udC1zaXplOiAxMHB4O1xuICAgIHotaW5kZXg6IDEwMDtcbiAgICAubG9hZG1lUmVjdENoaWxkIHtcbiAgICAgICAgYmFja2dyb3VuZC1jb2xvcjogQGxvYWQtY29sb3I7XG4gICAgICAgIGhlaWdodDogMTAwJTtcbiAgICAgICAgd2lkdGg6IDZweDtcbiAgICAgICAgZGlzcGxheTogaW5saW5lLWJsb2NrO1xuICAgICAgICBhbmltYXRpb246IGxvYWRtZVJlY3QtYW5pbWF0ZSAxLjJzIGluZmluaXRlIGVhc2UtaW4tb3V0O1xuICAgIH1cbiAgICAubG9hZG1lUmVjdDIge1xuICAgICAgICBhbmltYXRpb24tZGVsYXk6IC0xLjFzO1xuICAgIH1cbiAgICAubG9hZG1lUmVjdDMge1xuICAgICAgICBhbmltYXRpb24tZGVsYXk6IC0xLjBzO1xuICAgIH1cbiAgICAubG9hZG1lUmVjdDQge1xuICAgICAgICBhbmltYXRpb24tZGVsYXk6IC0wLjlzO1xuICAgIH1cbiAgICAubG9hZG1lUmVjdDUge1xuICAgICAgICBhbmltYXRpb24tZGVsYXk6IC0wLjhzO1xuICAgIH1cbn1cblxuQGtleWZyYW1lcyBsb2FkbWVSZWN0LWFuaW1hdGUge1xuICAgIDAlLFxuICAgIDQwJSxcbiAgICAxMDAlIHtcbiAgICAgICAgdHJhbnNmb3JtOiBzY2FsZVkoMC40KTtcbiAgICB9XG4gICAgMjAlIHtcbiAgICAgICAgdHJhbnNmb3JtOiBzY2FsZVkoMS4wKTtcbiAgICB9XG59XG4iLCIubG9hZG1lLWN1YmUge1xuICAgIHdpZHRoOiA0MHB4O1xuICAgIGhlaWdodDogNDBweDtcbiAgICBwb3NpdGlvbjogZml4ZWQ7XG4gICAgbGVmdDogNTAlO1xuICAgIHRvcDogNTAlO1xuICAgIG1hcmdpbjogLTIwcHggMCAwIC0yMHB4O1xuICAgIHotaW5kZXg6IDEwMDtcbn1cblxuLmxvYWRtZS1jdWJlMSxcbi5sb2FkbWUtY3ViZTIge1xuICAgIGJhY2tncm91bmQtY29sb3I6IEBsb2FkLWNvbG9yO1xuICAgIHdpZHRoOiAxNXB4O1xuICAgIGhlaWdodDogMTVweDtcbiAgICBwb3NpdGlvbjogYWJzb2x1dGU7XG4gICAgdG9wOiAwO1xuICAgIGxlZnQ6IDA7XG4gICAgYW5pbWF0aW9uOiBzay1jdWJlbW92ZSAxLjhzIGluZmluaXRlIGVhc2UtaW4tb3V0O1xufVxuXG4ubG9hZG1lLWN1YmUyIHtcbiAgICBhbmltYXRpb24tZGVsYXk6IC0wLjlzO1xufVxuXG5Aa2V5ZnJhbWVzIHNrLWN1YmVtb3ZlIHtcbiAgICAyNSUge1xuICAgICAgICB0cmFuc2Zvcm06IHRyYW5zbGF0ZVgoMjVweCkgcm90YXRlKC05MGRlZykgc2NhbGUoMC41KTtcbiAgICB9XG4gICAgNTAlIHtcbiAgICAgICAgdHJhbnNmb3JtOiB0cmFuc2xhdGVYKDI1cHgpIHRyYW5zbGF0ZVkoMjVweCkgcm90YXRlKC0xNzlkZWcpO1xuICAgIH1cbiAgICA1MC4xJSB7XG4gICAgICAgIHRyYW5zZm9ybTogdHJhbnNsYXRlWCgyNXB4KSB0cmFuc2xhdGVZKDI1cHgpIHJvdGF0ZSgtMTgwZGVnKTtcbiAgICB9XG4gICAgNzUlIHtcbiAgICAgICAgdHJhbnNmb3JtOiB0cmFuc2xhdGVYKDBweCkgdHJhbnNsYXRlWSgyNXB4KSByb3RhdGUoLTI3MGRlZykgc2NhbGUoMC41KTtcbiAgICB9XG4gICAgMTAwJSB7XG4gICAgICAgIHRyYW5zZm9ybTogcm90YXRlKC0zNjBkZWcpO1xuICAgIH1cbn1cbiIsIi5sb2FkbWUtc2NhbGVvdXQge1xuICAgIHdpZHRoOiA0MHB4O1xuICAgIGhlaWdodDogNDBweDtcbiAgICBiYWNrZ3JvdW5kLWNvbG9yOiBAbG9hZC1jb2xvcjtcbiAgICBwb3NpdGlvbjogZml4ZWQ7XG4gICAgbGVmdDogNTAlO1xuICAgIHRvcDogNTAlO1xuICAgIG1hcmdpbjogLTIwcHggMCAwIC0yMHB4O1xuICAgIGJvcmRlci1yYWRpdXM6IDEwMCU7XG4gICAgYW5pbWF0aW9uOiBsb2FkbWUtc2NhbGVvdXQtYW5pbWF0ZSAxLjBzIGluZmluaXRlIGVhc2UtaW4tb3V0O1xuICAgIHotaW5kZXg6IDEwMDtcbn1cblxuQGtleWZyYW1lcyBsb2FkbWUtc2NhbGVvdXQtYW5pbWF0ZSB7XG4gICAgMCUge1xuICAgICAgICB0cmFuc2Zvcm06IHNjYWxlKDApO1xuICAgIH1cbiAgICAxMDAlIHtcbiAgICAgICAgdHJhbnNmb3JtOiBzY2FsZSgxLjApO1xuICAgICAgICBvcGFjaXR5OiAwO1xuICAgIH1cbn1cbiIsIi5sb2FkbWUtZG90IHtcbiAgICB3aWR0aDogNDBweDtcbiAgICBoZWlnaHQ6IDQwcHg7XG4gICAgdGV4dC1hbGlnbjogY2VudGVyO1xuICAgIHBvc2l0aW9uOiBmaXhlZDtcbiAgICBsZWZ0OiA1MCU7XG4gICAgdG9wOiA1MCU7XG4gICAgbWFyZ2luOiAtMjBweCAwIDAgLTIwcHg7XG4gICAgYW5pbWF0aW9uOiBsb2FkbWUtZG90LXJvdGF0ZSAyLjBzIGluZmluaXRlIGxpbmVhcjtcbiAgICB6LWluZGV4OiAxMDA7XG59XG5cbi5sb2FkbWUtZG90MSxcbi5sb2FkbWUtZG90MiB7XG4gICAgd2lkdGg6IDYwJTtcbiAgICBoZWlnaHQ6IDYwJTtcbiAgICBkaXNwbGF5OiBpbmxpbmUtYmxvY2s7XG4gICAgcG9zaXRpb246IGFic29sdXRlO1xuICAgIHRvcDogMDtcbiAgICBiYWNrZ3JvdW5kLWNvbG9yOiBAbG9hZC1jb2xvcjtcbiAgICBib3JkZXItcmFkaXVzOiAxMDAlO1xuICAgIGFuaW1hdGlvbjogbG9hZG1lLWRvdC1ib3VuY2UgMi4wcyBpbmZpbml0ZSBlYXNlLWluLW91dDtcbn1cblxuLmxvYWRtZS1kb3QyIHtcbiAgICB0b3A6IGF1dG87XG4gICAgYm90dG9tOiAwO1xuICAgIGFuaW1hdGlvbi1kZWxheTogLTEuMHM7XG59XG5cbkBrZXlmcmFtZXMgbG9hZG1lLWRvdC1yb3RhdGUge1xuICAgIDEwMCUge1xuICAgICAgICB0cmFuc2Zvcm06IHJvdGF0ZSgzNjBkZWcpO1xuICAgIH1cbn1cblxuQGtleWZyYW1lcyBsb2FkbWUtZG90LWJvdW5jZSB7XG4gICAgMCUsXG4gICAgMTAwJSB7XG4gICAgICAgIHRyYW5zZm9ybTogc2NhbGUoMC4wKTtcbiAgICB9XG4gICAgNTAlIHtcbiAgICAgICAgdHJhbnNmb3JtOiBzY2FsZSgxLjApO1xuICAgIH1cbn1cbiIsIi5sb2FkbWUtYm91bmNlZCB7XG4gICAgd2lkdGg6IDcwcHg7XG4gICAgdGV4dC1hbGlnbjogY2VudGVyO1xuICAgIHBvc2l0aW9uOiBmaXhlZDtcbiAgICBsZWZ0OiA1MCU7XG4gICAgdG9wOiA1MCU7XG4gICAgbWFyZ2luOiAwIDAgMCAtMzVweDtcbiAgICB6LWluZGV4OiAxMDA7XG4gICAgLmxvYWRtZS1ib3VuY2VkLWNoaWxkIHtcbiAgICAgICAgd2lkdGg6IDE4cHg7XG4gICAgICAgIGhlaWdodDogMThweDtcbiAgICAgICAgYmFja2dyb3VuZC1jb2xvcjogQGxvYWQtY29sb3I7XG4gICAgICAgIGJvcmRlci1yYWRpdXM6IDEwMCU7XG4gICAgICAgIGRpc3BsYXk6IGlubGluZS1ibG9jaztcbiAgICAgICAgYW5pbWF0aW9uOiBsb2FkbWUtYm91bmNlZGVsYXktYW5pbWF0ZSAxLjRzIGluZmluaXRlIGVhc2UtaW4tb3V0IGJvdGg7XG4gICAgfVxuICAgIC5sb2FkbWUtYm91bmNlZDEge1xuICAgICAgICBhbmltYXRpb24tZGVsYXk6IC0wLjMycztcbiAgICB9XG4gICAgLmxvYWRtZS1ib3VuY2VkMiB7XG4gICAgICAgIGFuaW1hdGlvbi1kZWxheTogLTAuMTZzO1xuICAgIH1cbn1cblxuQGtleWZyYW1lcyBsb2FkbWUtYm91bmNlZGVsYXktYW5pbWF0ZSB7XG4gICAgMCUsXG4gICAgODAlLFxuICAgIDEwMCUge1xuICAgICAgICB0cmFuc2Zvcm06IHNjYWxlKDApO1xuICAgIH1cbiAgICA0MCUge1xuICAgICAgICB0cmFuc2Zvcm06IHNjYWxlKDEuMCk7XG4gICAgfVxufVxuIiwiLmxvYWRtZS1jaXJjbGVQb2ludCB7XG4gICAgcG9zaXRpb246IGZpeGVkO1xuICAgIGxlZnQ6IDUwJTtcbiAgICB0b3A6IDUwJTtcbiAgICBtYXJnaW46IC0yMHB4IDAgMCAtMjBweDtcbiAgICB3aWR0aDogNDBweDtcbiAgICBoZWlnaHQ6IDQwcHg7XG4gICAgei1pbmRleDogMTAwO1xuICAgIC5sb2FkbWUtY2lyY2xlUG9pbnQtY2hpbGQge1xuICAgICAgICB3aWR0aDogMTAwJTtcbiAgICAgICAgaGVpZ2h0OiAxMDAlO1xuICAgICAgICBwb3NpdGlvbjogYWJzb2x1dGU7XG4gICAgICAgIGxlZnQ6IDA7XG4gICAgICAgIHRvcDogMDtcbiAgICB9XG4gICAgLmxvYWRtZS1jaXJjbGVQb2ludC1jaGlsZDpiZWZvcmUge1xuICAgICAgICBjb250ZW50OiAnJztcbiAgICAgICAgZGlzcGxheTogYmxvY2s7XG4gICAgICAgIG1hcmdpbjogMCBhdXRvO1xuICAgICAgICB3aWR0aDogMTUlO1xuICAgICAgICBoZWlnaHQ6IDE1JTtcbiAgICAgICAgYmFja2dyb3VuZC1jb2xvcjogQGxvYWQtY29sb3I7XG4gICAgICAgIGJvcmRlci1yYWRpdXM6IDEwMCU7XG4gICAgICAgIGFuaW1hdGlvbjogbG9hZG1lLWNpcmNsZVBvaW50LWFuaW1hdGUgMS4ycyBpbmZpbml0ZSBlYXNlLWluLW91dCBib3RoO1xuICAgIH1cbiAgICAubG9hZG1lLWNpcmNsZVBvaW50MiB7XG4gICAgICAgIHRyYW5zZm9ybTogcm90YXRlKDMwZGVnKTtcbiAgICB9XG4gICAgLmxvYWRtZS1jaXJjbGVQb2ludDMge1xuICAgICAgICB0cmFuc2Zvcm06IHJvdGF0ZSg2MGRlZyk7XG4gICAgfVxuICAgIC5sb2FkbWUtY2lyY2xlUG9pbnQ0IHtcbiAgICAgICAgdHJhbnNmb3JtOiByb3RhdGUoOTBkZWcpO1xuICAgIH1cbiAgICAubG9hZG1lLWNpcmNsZVBvaW50NSB7XG4gICAgICAgIHRyYW5zZm9ybTogcm90YXRlKDEyMGRlZyk7XG4gICAgfVxuICAgIC5sb2FkbWUtY2lyY2xlUG9pbnQ2IHtcbiAgICAgICAgdHJhbnNmb3JtOiByb3RhdGUoMTUwZGVnKTtcbiAgICB9XG4gICAgLmxvYWRtZS1jaXJjbGVQb2ludDcge1xuICAgICAgICB0cmFuc2Zvcm06IHJvdGF0ZSgxODBkZWcpO1xuICAgIH1cbiAgICAubG9hZG1lLWNpcmNsZVBvaW50OCB7XG4gICAgICAgIHRyYW5zZm9ybTogcm90YXRlKDIxMGRlZyk7XG4gICAgfVxuICAgIC5sb2FkbWUtY2lyY2xlUG9pbnQ5IHtcbiAgICAgICAgdHJhbnNmb3JtOiByb3RhdGUoMjQwZGVnKTtcbiAgICB9XG4gICAgLmxvYWRtZS1jaXJjbGVQb2ludDEwIHtcbiAgICAgICAgdHJhbnNmb3JtOiByb3RhdGUoMjcwZGVnKTtcbiAgICB9XG4gICAgLmxvYWRtZS1jaXJjbGVQb2ludDExIHtcbiAgICAgICAgdHJhbnNmb3JtOiByb3RhdGUoMzAwZGVnKTtcbiAgICB9XG4gICAgLmxvYWRtZS1jaXJjbGVQb2ludDEyIHtcbiAgICAgICAgdHJhbnNmb3JtOiByb3RhdGUoMzMwZGVnKTtcbiAgICB9XG4gICAgLmxvYWRtZS1jaXJjbGVQb2ludDI6YmVmb3JlIHtcbiAgICAgICAgYW5pbWF0aW9uLWRlbGF5OiAtMS4xcztcbiAgICB9XG4gICAgLmxvYWRtZS1jaXJjbGVQb2ludDM6YmVmb3JlIHtcbiAgICAgICAgYW5pbWF0aW9uLWRlbGF5OiAtMXM7XG4gICAgfVxuICAgIC5sb2FkbWUtY2lyY2xlUG9pbnQ0OmJlZm9yZSB7XG4gICAgICAgIGFuaW1hdGlvbi1kZWxheTogLTAuOXM7XG4gICAgfVxuICAgIC5sb2FkbWUtY2lyY2xlUG9pbnQ1OmJlZm9yZSB7XG4gICAgICAgIGFuaW1hdGlvbi1kZWxheTogLTAuOHM7XG4gICAgfVxuICAgIC5sb2FkbWUtY2lyY2xlUG9pbnQ2OmJlZm9yZSB7XG4gICAgICAgIGFuaW1hdGlvbi1kZWxheTogLTAuN3M7XG4gICAgfVxuICAgIC5sb2FkbWUtY2lyY2xlUG9pbnQ3OmJlZm9yZSB7XG4gICAgICAgIGFuaW1hdGlvbi1kZWxheTogLTAuNnM7XG4gICAgfVxuICAgIC5sb2FkbWUtY2lyY2xlUG9pbnQ4OmJlZm9yZSB7XG4gICAgICAgIGFuaW1hdGlvbi1kZWxheTogLTAuNXM7XG4gICAgfVxuICAgIC5sb2FkbWUtY2lyY2xlUG9pbnQ5OmJlZm9yZSB7XG4gICAgICAgIGFuaW1hdGlvbi1kZWxheTogLTAuNHM7XG4gICAgfVxuICAgIC5sb2FkbWUtY2lyY2xlUG9pbnQxMDpiZWZvcmUge1xuICAgICAgICBhbmltYXRpb24tZGVsYXk6IC0wLjNzO1xuICAgIH1cbiAgICAubG9hZG1lLWNpcmNsZVBvaW50MTE6YmVmb3JlIHtcbiAgICAgICAgYW5pbWF0aW9uLWRlbGF5OiAtMC4ycztcbiAgICB9XG4gICAgLmxvYWRtZS1jaXJjbGVQb2ludDEyOmJlZm9yZSB7XG4gICAgICAgIGFuaW1hdGlvbi1kZWxheTogLTAuMXM7XG4gICAgfVxufVxuXG5Aa2V5ZnJhbWVzIGxvYWRtZS1jaXJjbGVQb2ludC1hbmltYXRlIHtcbiAgICAwJSxcbiAgICA4MCUsXG4gICAgMTAwJSB7XG4gICAgICAgIHRyYW5zZm9ybTogc2NhbGUoMCk7XG4gICAgfVxuICAgIDQwJSB7XG4gICAgICAgIHRyYW5zZm9ybTogc2NhbGUoMSk7XG4gICAgfVxufVxuIiwiLmxvYWRtZS1mYWRpbmdDaXJjbGUge1xuICAgIHdpZHRoOiA0MHB4O1xuICAgIGhlaWdodDogNDBweDtcbiAgICBwb3NpdGlvbjogZml4ZWQ7XG4gICAgbGVmdDogNTAlO1xuICAgIHRvcDogNTAlO1xuICAgIG1hcmdpbjogLTIwcHggMCAwIC0yMHB4O1xuICAgIHotaW5kZXg6IDEwMDtcbiAgICAubG9hZG1lLWZhZGluZ0NpcmNsZS1jaGlsZCB7XG4gICAgICAgIHdpZHRoOiAxMDAlO1xuICAgICAgICBoZWlnaHQ6IDEwMCU7XG4gICAgICAgIHBvc2l0aW9uOiBhYnNvbHV0ZTtcbiAgICAgICAgbGVmdDogMDtcbiAgICAgICAgdG9wOiAwO1xuICAgIH1cbiAgICAubG9hZG1lLWZhZGluZ0NpcmNsZS1jaGlsZDpiZWZvcmUge1xuICAgICAgICBjb250ZW50OiAnJztcbiAgICAgICAgZGlzcGxheTogYmxvY2s7XG4gICAgICAgIG1hcmdpbjogMCBhdXRvO1xuICAgICAgICB3aWR0aDogMTUlO1xuICAgICAgICBoZWlnaHQ6IDE1JTtcbiAgICAgICAgYmFja2dyb3VuZC1jb2xvcjogQGxvYWQtY29sb3I7XG4gICAgICAgIGJvcmRlci1yYWRpdXM6IDEwMCU7XG4gICAgICAgIGFuaW1hdGlvbjogbG9hZG1lLWZhZGluZ0NpcmNsZSAxLjJzIGluZmluaXRlIGVhc2UtaW4tb3V0IGJvdGg7XG4gICAgfVxuICAgIC5sb2FkbWUtZmFkaW5nQ2lyY2xlLWNoaWxkMiB7XG4gICAgICAgIHRyYW5zZm9ybTogcm90YXRlKDMwZGVnKTtcbiAgICB9XG4gICAgLmxvYWRtZS1mYWRpbmdDaXJjbGUtY2hpbGQzIHtcbiAgICAgICAgdHJhbnNmb3JtOiByb3RhdGUoNjBkZWcpO1xuICAgIH1cbiAgICAubG9hZG1lLWZhZGluZ0NpcmNsZS1jaGlsZDQge1xuICAgICAgICB0cmFuc2Zvcm06IHJvdGF0ZSg5MGRlZyk7XG4gICAgfVxuICAgIC5sb2FkbWUtZmFkaW5nQ2lyY2xlLWNoaWxkNSB7XG4gICAgICAgIHRyYW5zZm9ybTogcm90YXRlKDEyMGRlZyk7XG4gICAgfVxuICAgIC5sb2FkbWUtZmFkaW5nQ2lyY2xlLWNoaWxkNiB7XG4gICAgICAgIHRyYW5zZm9ybTogcm90YXRlKDE1MGRlZyk7XG4gICAgfVxuICAgIC5sb2FkbWUtZmFkaW5nQ2lyY2xlLWNoaWxkNyB7XG4gICAgICAgIHRyYW5zZm9ybTogcm90YXRlKDE4MGRlZyk7XG4gICAgfVxuICAgIC5sb2FkbWUtZmFkaW5nQ2lyY2xlLWNoaWxkOCB7XG4gICAgICAgIHRyYW5zZm9ybTogcm90YXRlKDIxMGRlZyk7XG4gICAgfVxuICAgIC5sb2FkbWUtZmFkaW5nQ2lyY2xlLWNoaWxkOSB7XG4gICAgICAgIHRyYW5zZm9ybTogcm90YXRlKDI0MGRlZyk7XG4gICAgfVxuICAgIC5sb2FkbWUtZmFkaW5nQ2lyY2xlLWNoaWxkMTAge1xuICAgICAgICB0cmFuc2Zvcm06IHJvdGF0ZSgyNzBkZWcpO1xuICAgIH1cbiAgICAubG9hZG1lLWZhZGluZ0NpcmNsZS1jaGlsZDExIHtcbiAgICAgICAgdHJhbnNmb3JtOiByb3RhdGUoMzAwZGVnKTtcbiAgICB9XG4gICAgLmxvYWRtZS1mYWRpbmdDaXJjbGUtY2hpbGQxMiB7XG4gICAgICAgIHRyYW5zZm9ybTogcm90YXRlKDMzMGRlZyk7XG4gICAgfVxuICAgIC5sb2FkbWUtZmFkaW5nQ2lyY2xlLWNoaWxkMjpiZWZvcmUge1xuICAgICAgICBhbmltYXRpb24tZGVsYXk6IC0xLjFzO1xuICAgIH1cbiAgICAubG9hZG1lLWZhZGluZ0NpcmNsZS1jaGlsZDM6YmVmb3JlIHtcbiAgICAgICAgYW5pbWF0aW9uLWRlbGF5OiAtMXM7XG4gICAgfVxuICAgIC5sb2FkbWUtZmFkaW5nQ2lyY2xlLWNoaWxkNDpiZWZvcmUge1xuICAgICAgICBhbmltYXRpb24tZGVsYXk6IC0wLjlzO1xuICAgIH1cbiAgICAubG9hZG1lLWZhZGluZ0NpcmNsZS1jaGlsZDU6YmVmb3JlIHtcbiAgICAgICAgYW5pbWF0aW9uLWRlbGF5OiAtMC44cztcbiAgICB9XG4gICAgLmxvYWRtZS1mYWRpbmdDaXJjbGUtY2hpbGQ2OmJlZm9yZSB7XG4gICAgICAgIGFuaW1hdGlvbi1kZWxheTogLTAuN3M7XG4gICAgfVxuICAgIC5sb2FkbWUtZmFkaW5nQ2lyY2xlLWNoaWxkNzpiZWZvcmUge1xuICAgICAgICBhbmltYXRpb24tZGVsYXk6IC0wLjZzO1xuICAgIH1cbiAgICAubG9hZG1lLWZhZGluZ0NpcmNsZS1jaGlsZDg6YmVmb3JlIHtcbiAgICAgICAgYW5pbWF0aW9uLWRlbGF5OiAtMC41cztcbiAgICB9XG4gICAgLmxvYWRtZS1mYWRpbmdDaXJjbGUtY2hpbGQ5OmJlZm9yZSB7XG4gICAgICAgIGFuaW1hdGlvbi1kZWxheTogLTAuNHM7XG4gICAgfVxuICAgIC5sb2FkbWUtZmFkaW5nQ2lyY2xlLWNoaWxkMTA6YmVmb3JlIHtcbiAgICAgICAgYW5pbWF0aW9uLWRlbGF5OiAtMC4zcztcbiAgICB9XG4gICAgLmxvYWRtZS1mYWRpbmdDaXJjbGUtY2hpbGQxMTpiZWZvcmUge1xuICAgICAgICBhbmltYXRpb24tZGVsYXk6IC0wLjJzO1xuICAgIH1cbiAgICAubG9hZG1lLWZhZGluZ0NpcmNsZS1jaGlsZDEyOmJlZm9yZSB7XG4gICAgICAgIGFuaW1hdGlvbi1kZWxheTogLTAuMXM7XG4gICAgfVxufVxuXG5Aa2V5ZnJhbWVzIGxvYWRtZS1mYWRpbmdDaXJjbGUge1xuICAgIDAlLFxuICAgIDM5JSxcbiAgICAxMDAlIHtcbiAgICAgICAgb3BhY2l0eTogMDtcbiAgICB9XG4gICAgNDAlIHtcbiAgICAgICAgb3BhY2l0eTogMTtcbiAgICB9XG59XG4iLCIubG9hZG1lLWZvbGRpbmdDdWJlIHtcbiAgICB3aWR0aDogNDBweDtcbiAgICBoZWlnaHQ6IDQwcHg7XG4gICAgdHJhbnNmb3JtOiByb3RhdGVaKDQ1ZGVnKTtcbiAgICBwb3NpdGlvbjogZml4ZWQ7XG4gICAgbGVmdDogNTAlO1xuICAgIHRvcDogNTAlO1xuICAgIG1hcmdpbjogLTIwcHggMCAwIC0yMHB4O1xuICAgIHotaW5kZXg6IDEwMDtcbiAgICAubG9hZG1lLWZvbGRpbmdDdWJlLWNoaWxkIHtcbiAgICAgICAgZmxvYXQ6IGxlZnQ7XG4gICAgICAgIHdpZHRoOiA1MCU7XG4gICAgICAgIGhlaWdodDogNTAlO1xuICAgICAgICBwb3NpdGlvbjogcmVsYXRpdmU7XG4gICAgICAgIHRyYW5zZm9ybTogc2NhbGUoMS4xKTtcbiAgICB9XG4gICAgLmxvYWRtZS1mb2xkaW5nQ3ViZS1jaGlsZDpiZWZvcmUge1xuICAgICAgICBjb250ZW50OiAnJztcbiAgICAgICAgcG9zaXRpb246IGFic29sdXRlO1xuICAgICAgICB0b3A6IDA7XG4gICAgICAgIGxlZnQ6IDA7XG4gICAgICAgIHdpZHRoOiAxMDAlO1xuICAgICAgICBoZWlnaHQ6IDEwMCU7XG4gICAgICAgIGJhY2tncm91bmQtY29sb3I6IEBsb2FkLWNvbG9yO1xuICAgICAgICBhbmltYXRpb246IGxvYWRtZS1mb2xkQ3ViZUFuZ2xlLWFuaW1hdGUgMi40cyBpbmZpbml0ZSBsaW5lYXIgYm90aDtcbiAgICAgICAgdHJhbnNmb3JtLW9yaWdpbjogMTAwJSAxMDAlO1xuICAgIH1cbiAgICAubG9hZG1lLWZvbGRpbmdDdWJlLWNoaWxkMiB7XG4gICAgICAgIHRyYW5zZm9ybTogc2NhbGUoMS4xKSByb3RhdGVaKDkwZGVnKTtcbiAgICB9XG4gICAgLmxvYWRtZS1mb2xkaW5nQ3ViZS1jaGlsZDMge1xuICAgICAgICB0cmFuc2Zvcm06IHNjYWxlKDEuMSkgcm90YXRlWigxODBkZWcpO1xuICAgIH1cbiAgICAubG9hZG1lLWZvbGRpbmdDdWJlLWNoaWxkNCB7XG4gICAgICAgIHRyYW5zZm9ybTogc2NhbGUoMS4xKSByb3RhdGVaKDI3MGRlZyk7XG4gICAgfVxuICAgIC5sb2FkbWUtZm9sZGluZ0N1YmUtY2hpbGQyOmJlZm9yZSB7XG4gICAgICAgIGFuaW1hdGlvbi1kZWxheTogMC4zcztcbiAgICB9XG4gICAgLmxvYWRtZS1mb2xkaW5nQ3ViZS1jaGlsZDM6YmVmb3JlIHtcbiAgICAgICAgYW5pbWF0aW9uLWRlbGF5OiAwLjZzO1xuICAgIH1cbiAgICAubG9hZG1lLWZvbGRpbmdDdWJlLWNoaWxkNDpiZWZvcmUge1xuICAgICAgICBhbmltYXRpb24tZGVsYXk6IDAuOXM7XG4gICAgfVxufVxuXG5Aa2V5ZnJhbWVzIGxvYWRtZS1mb2xkQ3ViZUFuZ2xlLWFuaW1hdGUge1xuICAgIDAlLFxuICAgIDEwJSB7XG4gICAgICAgIHRyYW5zZm9ybTogcGVyc3BlY3RpdmUoMTQwcHgpIHJvdGF0ZVgoLTE4MGRlZyk7XG4gICAgICAgIG9wYWNpdHk6IDA7XG4gICAgfVxuICAgIDI1JSxcbiAgICA3NSUge1xuICAgICAgICB0cmFuc2Zvcm06IHBlcnNwZWN0aXZlKDE0MHB4KSByb3RhdGVYKDBkZWcpO1xuICAgICAgICBvcGFjaXR5OiAxO1xuICAgIH1cbiAgICA5MCUsXG4gICAgMTAwJSB7XG4gICAgICAgIHRyYW5zZm9ybTogcGVyc3BlY3RpdmUoMTQwcHgpIHJvdGF0ZVkoMTgwZGVnKTtcbiAgICAgICAgb3BhY2l0eTogMDtcbiAgICB9XG59XG4iLCIubG9hZG1lTG92ZSB7XG4gICAgcG9zaXRpb246IGZpeGVkO1xuICAgIHdpZHRoOiA1MHB4O1xuICAgIGhlaWdodDogNTBweDtcbiAgICBsZWZ0OiA1MCU7XG4gICAgdG9wOiA1MCU7XG4gICAgbWFyZ2luOiAtMjVweCAwIDAgLTI1cHg7XG4gICAgei1pbmRleDogMTAwO1xuICAgIGJhY2tncm91bmQtY29sb3I6IEBsb2FkLWNvbG9yO1xuICAgIGFuaW1hdGlvbjogbG9hZG1lLWxvdmUtYW5pbWF0ZSAwLjhzIGluZmluaXRlIGFsdGVybmF0ZTtcbiAgICBhbmltYXRpb24tdGltaW5nLWZ1bmN0aW9uOiBlYXNlLWluO1xufVxuXG4ubG9hZG1lTG92ZTpiZWZvcmUsXG4ubG9hZG1lTG92ZTphZnRlciB7XG4gICAgcG9zaXRpb246IGFic29sdXRlO1xuICAgIHdpZHRoOiA1MHB4O1xuICAgIGhlaWdodDogNTBweDtcbiAgICBjb250ZW50OiAnJztcbiAgICBib3JkZXItcmFkaXVzOiA1MCU7XG4gICAgYmFja2dyb3VuZC1jb2xvcjogQGxvYWQtY29sb3I7XG59XG5cbi5sb2FkbWVMb3ZlOmJlZm9yZSB7XG4gICAgYm90dG9tOiAwcHg7XG4gICAgbGVmdDogLTI1cHg7XG59XG5cbi5sb2FkbWVMb3ZlOmFmdGVyIHtcbiAgICB0b3A6IC0yNXB4O1xuICAgIHJpZ2h0OiAwcHg7XG59XG5cbkBrZXlmcmFtZXMgbG9hZG1lLWxvdmUtYW5pbWF0ZSB7XG4gICAgMCUge1xuICAgICAgICB0cmFuc2Zvcm06c2NhbGUoMSwxKSByb3RhdGUoNDVkZWcpO1xuICAgIH1cbiAgICAxMDAlIHtcbiAgICAgICAgdHJhbnNmb3JtOnNjYWxlKDAuNSwwLjUpIHJvdGF0ZSg0NWRlZyk7XG4gICAgfVxufVxuXG4iLCIubG9hZG1lQ2xvY2sge1xuICAgIGhlaWdodDogNzBweDtcbiAgICB3aWR0aDogMTEwcHg7XG4gICAgcG9zaXRpb246IGZpeGVkO1xuICAgIGxlZnQ6IDUwJTtcbiAgICB0b3A6IDUwJTtcbiAgICBtYXJnaW46IC0zNXB4IDAgMCAtNTVweDtcbiAgICB6LWluZGV4OiAxMDA7XG59XG5cbi5sb2FkbWVDbG9jay1ib2R5IC5sb2FkbWVDbG9jay1wZW5kdWx1bSB7XG4gICAgaGVpZ2h0OiA3MHB4O1xuICAgIGFuaW1hdGlvbi1kdXJhdGlvbjogMXM7XG4gICAgYW5pbWF0aW9uLW5hbWU6IGxvYWRtZS10aWNrdG9jaztcbiAgICBhbmltYXRpb24taXRlcmF0aW9uLWNvdW50OiBpbmZpbml0ZTtcbiAgICBhbmltYXRpb24tdGltaW5nLWZ1bmN0aW9uOiBjdWJpYy1iZXppZXIoMC42NDUsIDAuMDQ1LCAwLjM1NSwgMS4wMDApO1xuICAgIGFuaW1hdGlvbi1kaXJlY3Rpb246IGFsdGVybmF0ZTtcbiAgICBhbmltYXRpb24tZmlsbC1tb2RlOiBib3RoO1xuICAgIGFuaW1hdGlvbi1wbGF5LXN0YXRlOiBydW5uaW5nO1xuICAgIHRyYW5zZm9ybS1vcmlnaW46IDUwJSAtNzAlO1xufVxuXG4ubG9hZG1lQ2xvY2stcGVuZHVsdW0gLmxvYWRtZVBlbmR1bHVtLXN0aWNrIHtcbiAgICBoZWlnaHQ6IDcwJTtcbiAgICB3aWR0aDogNnB4O1xuICAgIG1hcmdpbjogMCBhdXRvO1xuICAgIGJhY2tncm91bmQtY29sb3I6IEBsb2FkLWNvbG9yO1xufVxuXG4ubG9hZG1lQ2xvY2stcGVuZHVsdW0gLmxvYWRtZVBlbmR1bHVtLWJvZHkge1xuICAgIGhlaWdodDogMjBweDtcbiAgICB3aWR0aDogMjBweDtcbiAgICBib3JkZXItcmFkaXVzOiA0MHB4O1xuICAgIG1hcmdpbjogMCBhdXRvO1xuICAgIG1hcmdpbi10b3A6IC0ycHg7XG4gICAgYmFja2dyb3VuZC1jb2xvcjogQGxvYWQtY29sb3I7XG59XG5cbkBrZXlmcmFtZXMgbG9hZG1lLXRpY2t0b2NrIHtcbiAgICAwJSB7XG4gICAgICAgIHRyYW5zZm9ybTogcm90YXRlKDE1ZGVnKTtcbiAgICB9XG4gICAgMTAwJSB7XG4gICAgICAgIHRyYW5zZm9ybTogcm90YXRlKC0xNWRlZyk7XG4gICAgfVxufVxuIl19 */

/* 
	
The MIT License (MIT)

Copyright (c) 2017 Etienne Martin

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

*/

#dialog-holder,#dialog-overlay{position:absolute;top:0;left:0;right:0;transform:translateZ(0)}#dialog-holder,#dialog-holder #dialog-center td .dialog-alert label input{font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}#dialog-overlay{bottom:0;z-index:966;color:#fff;text-align:center;font-size:18px;text-shadow:none;background:rgba(51,51,51,.6);opacity:0;transition:opacity .5s}#dialog-overlay.dialog-closing{transition:opacity .25s}#dialog-overlay.dialog-visible{opacity:1}#dialog-holder{height:100%;z-index:977;cursor:default}#dialog-holder.dialog-fixed{position:fixed;overflow:auto}#dialog-holder #dialog-center{width:100%;height:100%;z-index:999;border-spacing:0;padding:0;margin:0}#dialog-holder #dialog-center td{text-align:center;vertical-align:middle;padding:5%;margin:0;width:90%;perspective:1000px}#dialog-holder #dialog-center td .dialog-alert{position:relative;margin:0 auto;padding:10px 30px;background:#fff;z-index:999;max-width:400px;word-break:break-word;display:none;border-radius:4px;box-shadow:rgba(0,0,0,.1) 0 2px 3px,rgba(0,0,0,.2) 0 5px 15px;opacity:0;transition:transform .5s,opacity .45s;font-size:14px;color:#666}@keyframes shake{20%,60%{transform:translateX(-12px) rotateY(-8deg)}40%,80%{transform:translateX(12px) rotateY(8deg)}}#dialog-holder #dialog-center td .dialog-alert[data-dialog-animation=scale]{-ms-transform:scale(.8);transform:scale(.8)}#dialog-holder #dialog-center td .dialog-alert[data-dialog-animation=slide]{-ms-transform:translateY(-50%);transform:translateY(-50%)}#dialog-holder #dialog-center td .dialog-alert.dialog-closing{transition:transform .25s,opacity .2s}#dialog-holder #dialog-center td .dialog-alert.dialog-visible{-ms-transform:scale(1);transform:scale(1);opacity:1}#dialog-holder #dialog-center td .dialog-alert.dialog-shaking{animation:shake .5s linear}#dialog-holder #dialog-center td .dialog-alert .dialog-border{position:absolute;top:-1px;left:-1px;right:-1px;bottom:-1px;border:1px solid #000;z-index:-1;border-radius:5px;opacity:.2}#dialog-holder #dialog-center td .dialog-alert .dialog-title{padding:20px 5px 0;line-height:25px;font-size:24px;display:block;color:#555;font-weight:400}#dialog-holder #dialog-center td .dialog-alert .dialog-title:empty{padding-top:0}#dialog-holder #dialog-center td .dialog-alert .dialog-message{padding:20px 5px 0;line-height:1.444;display:block;max-width:370px;margin:0 auto}#dialog-holder #dialog-center td .dialog-alert .dialog-message a{color:#4CAF50}#dialog-holder #dialog-center td .dialog-alert .dialog-message:empty{padding-top:0}#dialog-holder #dialog-center td .dialog-alert label{display:block;margin:20px auto 0;max-width:300px}#dialog-holder #dialog-center td .dialog-alert label input{box-sizing:border-box;padding:15px 20px;border:2px solid #4CAF50;border-radius:100px;outline:0;width:100%;font-size:14px;color:#555}#dialog-holder #dialog-center td .dialog-alert .dialog-cancel,#dialog-holder #dialog-center td .dialog-alert .dialog-confirm{display:block;margin:20px auto 10px;padding:15px 30px;background:#eee;cursor:pointer;border-radius:100px;font-weight:700;max-width:240px;transition:background .25s;box-shadow:inset 0 -1px 0 rgba(0,0,0,.1);-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}#dialog-holder #dialog-center td .dialog-alert .dialog-cancel:hover,#dialog-holder #dialog-center td .dialog-alert .dialog-confirm:hover{background:#e1e1e1}#dialog-holder #dialog-center td .dialog-alert .dialog-cancel:active,#dialog-holder #dialog-center td .dialog-alert .dialog-confirm:active{box-shadow:inset 0 1px 0 rgba(0,0,0,.1)}#dialog-holder #dialog-center td .dialog-alert .dialog-cancel.dialog-confirm,#dialog-holder #dialog-center td .dialog-alert .dialog-confirm.dialog-confirm{background:#4CAF50;color:#fff;margin-bottom:20px}#dialog-holder #dialog-center td .dialog-alert .dialog-cancel.dialog-confirm:hover,#dialog-holder #dialog-center td .dialog-alert .dialog-confirm.dialog-confirm:hover{background:#4CAF50}#dialog-holder #dialog-center td .dialog-alert .dialog-cancel.dialog-cancel+.dialog-confirm,#dialog-holder #dialog-center td .dialog-alert .dialog-confirm.dialog-cancel+.dialog-confirm{margin-top:10px}#dialog-holder #dialog-center td .dialog-alert .dialog-close{position:absolute;top:15px;right:15px;margin-bottom:-10px;cursor:pointer;line-height:10px;padding:5px;font-size:24px;opacity:.5;transition:opacity .25s;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;-webkit-transform:translateZ(0)}#dialog-holder #dialog-center td .dialog-alert .dialog-close:hover{opacity:1}#dialog-holder #dialog-center td .dialog-alert .dialog-close:before{content:"";position:absolute;top:-15px;left:-15px;right:-15px;bottom:-15px}#dialog-holder #dialog-center td .dialog-alert .dialog-clearFloat{clear:both;width:100%;height:1px;display:block}
//# sourceMappingURL=all2.js.map
