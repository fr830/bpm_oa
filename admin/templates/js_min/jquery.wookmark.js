/*
  jQuery Wookmark plugin 0.5
  @name jquery.wookmark.js
  @author Christoph Ono (chri@sto.ph or @gbks)
  @version 0.5
  @date 3/19/2012
  @category jQuery plugin
  @copyright (c) 2009-2012 Christoph Ono (www.wookmark.com)
  @license Licensed under the MIT (http://www.opensource.org/licenses/mit-license.php) license.
  
  Added modifications
  https://github.com/HenriMorlaye/Wookmark-jQuery/commit/56f8b6fc88feef86507ac8086a284fc0779d7ade 
*/
$.fn.wookmark=function(a){if(!this.wookmarkOptions)this.wookmarkOptions=$.extend({container:$("body"),offset:2,autoResize:false,itemWidth:$(this[0]).outerWidth(),resizeDelay:50,resizeContainerHeight:true,flexibleItemWidth:false},a);else if(a)this.wookmarkOptions=$.extend(this.wookmarkOptions,a);if(!this.wookmarkColumns){this.wookmarkColumns=null;this.wookmarkContainerWidth=null}this.wookmarkLayout=function(){var c=this.wookmarkOptions.container.width(),a=this.wookmarkOptions.itemWidth+this.wookmarkOptions.offset,b=Math.floor((c+this.wookmarkOptions.offset)/a);if(this.wookmarkOptions.flexibleItemWidth){var d=c%a;if(d<a/2){a+=d/b;var f=this.wookmarkOptions.itemWidth+d/b;this.width(f)}else{b+=1;a=c/b;var f=a-this.wookmarkOptions.offset;this.width(f)}}var g=Math.round((c-(b*a-this.wookmarkOptions.offset))/2),e=0;if(this.wookmarkColumns!=null&&this.wookmarkColumns.length==b)e=this.wookmarkLayoutColumns(a,g);else e=this.wookmarkLayoutFull(a,b,g);this.wookmarkOptions.resizeContainerHeight&&this.wookmarkOptions.container.css("height",e+"px")};this.wookmarkLayoutFull=function(i,f,k){var c=[];while(c.length<f)c.push(0);this.wookmarkColumns=[];while(this.wookmarkColumns.length<f)this.wookmarkColumns.push([]);for(var e,m,l,h=0,d=0,j=this.length,b=null,a=null,g=0;h<j;h++){e=$(this[h]);b=null;a=0;for(d=0;d<f;d++)if(b==null||c[d]<b){b=c[d];a=d}e.css({position:"absolute",top:b+"px",left:a*i+k+"px"});c[a]=b+e.outerHeight()+this.wookmarkOptions.offset;g=Math.max(g,c[a]);this.wookmarkColumns[a].push(e)}return g};this.wookmarkLayoutColumns=function(h,j){var b=[];while(b.length<this.wookmarkColumns.length)b.push(0);for(var a=0,i=this.wookmarkColumns.length,e,c=0,g,f,d=0;a<i;a++){e=this.wookmarkColumns[a];g=e.length;for(c=0;c<g;c++){f=e[c];f.css({left:a*h+j+"px",top:b[a]+"px"});b[a]+=f.outerHeight()+this.wookmarkOptions.offset;d=Math.max(d,b[a])}}return d};this.wookmarkResizeTimer=null;if(!this.wookmarkResizeMethod)this.wookmarkResizeMethod=null;if(this.wookmarkOptions.autoResize){this.wookmarkOnResize=function(){this.wookmarkResizeTimer&&clearTimeout(this.wookmarkResizeTimer);this.wookmarkResizeTimer=setTimeout($.proxy(this.wookmarkLayout,this),this.wookmarkOptions.resizeDelay)};if(!this.wookmarkResizeMethod)this.wookmarkResizeMethod=$.proxy(this.wookmarkOnResize,this);$(window).resize(this.wookmarkResizeMethod)}this.wookmarkClear=function(){if(this.wookmarkResizeTimer){clearTimeout(this.wookmarkResizeTimer);this.wookmarkResizeTimer=null}this.wookmarkResizeMethod&&$(window).unbind("resize",this.wookmarkResizeMethod)};this.wookmarkLayout();this.show()}