var isiPhone=navigator.platform.toLowerCase().indexOf("iphone"),isiPad=navigator.platform.toLowerCase().indexOf("ipad"),isiPod=navigator.platform.toLowerCase().indexOf("ipod"),isAndroidPhone=navigator.platform.toLowerCase().indexOf("linux"),checkboxFilter={$filters:null,$reset:null,groups:[],outputArray:[],outputString:"",init:function(){var e=this;e.$filters=$("#Filters");e.$reset=$(".close-btn");e.$container=$(".grid");e.$filters.find("fieldset").each(function(){e.groups.push({$inputs:$(this).find("input"),active:[],tracker:!1})});e.bindHandlers()},bindHandlers:function(){var e=this;e.$filters.on("change",function(){e.parseFilters()});e.$reset.on("click",function(t){e.$filters[0].reset();e.parseFilters()})},parseFilters:function(){var e=this;for(var t=0,n;n=e.groups[t];t++){n.active=[];n.$inputs.each(function(){$(this).is(":checked")&&n.active.push(this.value)});n.active.length&&(n.tracker=0)}e.concatenate()},concatenate:function(){var e=this,t="",n=!1,r=function(){var t=0;for(var n=0,r;r=e.groups[n];n++)r.tracker===!1&&t++;return t<e.groups.length},i=function(){for(var n=0,r;r=e.groups[n];n++){r.active[r.tracker]&&(t+=r.active[r.tracker]);if(n===e.groups.length-1){e.outputArray.push(t);t="";s()}}},s=function(){for(var t=e.groups.length-1;t>-1;t--){var r=e.groups[t];if(r.active[r.tracker+1]){r.tracker++;break}t>0?r.tracker&&(r.tracker=0):n=!0}};e.outputArray=[];do i();while(!n&&r());e.outputString=e.outputArray.join();!e.outputString.length&&(e.outputString="all");e.$container.mixItUp("isLoaded")&&e.$container.mixItUp("filter",e.outputString)}};$(function(){});$(document).ready(function(){checkboxFilter.init();$(".grid").mixItUp({controls:{enable:!1},animation:{easing:"cubic-bezier(0.86, 0, 0.07, 1)",duration:600}});$("body").on("click",".cell-btn",function(e){e.preventDefault();var t=$(e.currentTarget),n=t.closest("tr");switch(t.attr("data-action")){case"add":n.after(n.clone().find("input").val("").end());break;case"delete":n.remove()}var r=$(".step-counter").length;$(".step-counter").each(function(e){r=e+1;$(this).html("Step "+r+":")});return!1});$("body").on("click",".filter-btn",function(){$(".filter-closed").fadeOut("fast").promise().done(function(){$(".filter-open").fadeIn("fast").promise().done(function(){$(".filter-expand").slideDown("fast")})})});$("body").on("click",".close-btn",function(){$(".filter-expand").slideUp("fast").promise().done(function(){$(".filter-open").fadeOut("fast").promise().done(function(){$(".filter-closed").fadeIn("fast")})})})});