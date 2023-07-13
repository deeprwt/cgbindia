/**
 *	jQuery Canvas Animated Background: Circlus
 *	Copyright (c) 2016 Gonzalo Albito Méndez Rey
 *	Licensed under GNU GPL 3.0 (https://www.gnu.org/licenses/gpl-3.0-standalone.html)
 *	@version	0.8.1	(2016-07-18)
 *	@author		Gonzalo Albito Méndez Rey	<gonzalo@albito.es>
 *	@license	GPL-3.0
 */

(function($){
	$.fn.extend({
		circlus: function(options){
	    	var defaults = {
					fps: 60,
					scale: 1,
					background: false,
					items: 25,
					itemMinSpeed: 1000,
					itemMaxSpeed: 2500,
					itemMinSize: 50,
					itemMaxSize: 100,
					itemShapes: ["circle"],
					itemColors: ["#0000ff", "#00ff00", "#00ffff", "#ff0000", "#ff00ff", "#ffff00"],
					unique: true,
				};
	    	
        	options = $.extend({}, defaults, options);
        	
        	return this.each(function(){
				var element = $(this);
				new Circlus(options, element);
			});
		}
	});
	
	function Circlus(opts, elemt)
	{
		var obj = this;
		var element = elemt;
		var options = opts;
		var jCanvas = null;
		var canvas = null;
		var context = null;
		var frameTime = Math.floor(1000/options.fps);
		var pi2 = 2*Math.PI;
		var items = [];
		
		var random = function(min, max){
				var diff = max-min;
				return Math.floor(Math.random()*diff)+min;
			};
		
		var clear = function(){
				context.clearRect(0, 0, canvas.width, canvas.height);
				if(options.background)
				{
					context.fillStyle = options.background;
					context.fillRect(0, 0, canvas.width, canvas.height);
				}
			};
		
		var drawCircle = function(x, y, radius, background, border, line){
				context.beginPath();
				context.arc(x, y, radius, 0, pi2, false);
				if(background)
				{
					context.fillStyle = background;
					context.fill();
				}
				if(border)
				{
					context.lineWidth = line? line : 1;
					context.strokeStyle = border;
					context.stroke();
				}
			};
		
		var draw = function(){
				clear();
				for(var i=0; i<items.length; i++)
				{
					var item = items[i];
					context.globalAlpha = item.alpha;
					switch(item.shape)
					{
						case "circle":
							drawCircle(item.x, item.y, item.size/2, item.color);
							break;
						default:
							break;
					}
				}
				context.globalAlpha = 1;
			};
		
		var buildItem = function(){
				var item = {
						x: random(0, canvas.width),
						y: random(0, canvas.height),
						progress: 0.0,
						time: 0,
						size: 0,
						alpha: 0.0,
						speed: random(options.itemMinSpeed, options.itemMaxSpeed),
						scope: random(options.itemMinSize, options.itemMaxSize),
						shape: options.itemShapes[random(0, options.itemShapes.length)],
						color: options.itemColors[random(0, options.itemColors.length)]
					};
				return item;
			};
		
		var populate = function(){
				while(items.length<options.items)
				{
					var item = buildItem();
					items.push(item);
				}
			};
		
		var update = function(time){
				for(var i=0; i<items.length; i++)
				{
					var item = items[i];
					item.time += time;
					item.progress = item.time/item.speed;
					if(item.progress>1.0)
					{
						items.splice(i, 1);
					}
					else
					{
						item.alpha = 1.0-item.progress;
						item.size = item.scope*item.progress;
					}
				}
				populate();
			};
		
		var loop = function(){
				update(frameTime);
				draw();
				setTimeout(loop, frameTime);
			};
		
		var resize = function(){
				canvas.width = Math.floor(jCanvas.width()/options.scale);
				canvas.height = Math.floor(jCanvas.height()/options.scale);
			};
		
		var init = function(){
				if(options.unique)
				{
					element.children(".jq-cabg-canvas").remove();
				}
				jCanvas = $("<canvas class=\"jq-cabg-canvas interactive-background\"></canvas>");
				jCanvas.css({position:"fixed",left:"0px",top:"0px",right:"0px",bottom:"0px",width:"100%",height:"100%",zIndex:"-1"});
				element.addClass("jq-cabg canvas-background");
				element.append(jCanvas);
				canvas = jCanvas[0];
				context = canvas.getContext("2d");
				$(window).resize(resize);
				resize();
				loop();
			};
		
		init();
	};
})(jQuery);