function tuiteleticker() {
  // Settable options
  this.interval    = 5000; // 5 seconds
  this.tickerStyle = 'fit-largest'; // 'single-line' or 'fit-largest'
  this.fadeEnd     = '#E3E3B7'; // This is what lines fade away TO - you can leave this blank
  this.fadeStart   = '#000000'; // This is what lines fade FROM
  this.fade        = true; // Set to false if you can't be bothered

  // These get overwritten, so there's no point playing with them
  this.numItems    = 0;
  this.listItems   = [];
  this.currentItem = 0;
  this.tickers     = [];
  this.tickerElem  = false;
  this.intervalId  = false;
}

tuiteleticker.prototype.initTickers = function() {
  var t, i;

  // Get the elements to ticker
  var tickerdivs = [];

  var re = new RegExp("(^|\\s)tuiticker(\\s|$)");
  var els = document.getElementsByTagName("*");
  for(var i=0,j=els.length; i<j; i++) {
    if(re.test(els[i].className)) {
      tickerdivs.push(els[i]);
    }
  }
  if (!tickerdivs) return false;

  for(i=tickerdivs.length-1;i>=0;i--) {
    t = new tuiteleticker();
    t.tickerElem = tickerdivs[i];
    t.init();

    this.tickers.push( t );
  }
            
  // Queue up a setTimeout to start cycling the items
  ttt.tickerLoop();
  this.intervalId = window.setInterval("ttt.tickerLoop()",this.interval);
}

tuiteleticker.prototype.setcol = function(eleid,col) {
  o = document.getElementById(eleid);
  o.style.color = col;
  
  if (o.childNodes) {
    oc = o.getElementsByTagName("*");
    for(c=oc.length-1;c>=0;c--) {
      if (oc[c].style) oc[c].style.color = col;
    }
  }
  
}


tuiteleticker.prototype.tickerLoop = function() {
  var i;
  
  for (i=this.tickers.length-1;i>=0;i--) { 
     // Make current item invisible
     var o;
     o = this.tickers[i].listItems[this.tickers[i].currentItem];
     o.style.display = 'none';
     
     if (this.fade){
       if (o.childNodes) {
         oc = o.getElementsByTagName("*");
         for(c=oc.length-1;c>=0;c--) {
           if (oc[c].style) oc[c].style.color = '';
         }
       }
     }
     // Get next item
     this.tickers[i].currentItem++;
     if (this.tickers[i].currentItem >= this.tickers[i].numItems) {
       this.tickers[i].currentItem = 0;
     }
     
     // Make next item visible
     if (this.fade) this.tickers[i].listItems[this.tickers[i].currentItem].style.color = this.fadeStart;
     this.tickers[i].listItems[this.tickers[i].currentItem].style.display = 'block';

     if (this.fade){
       if (!this.tickers[i].listItems[this.tickers[i].currentItem].id) {
         this.tickers[i].listItems[this.tickers[i].currentItem].id = 'tickitem_'+i+'_'+this.tickers[i].currentItem;
       }
       liid = this.tickers[i].listItems[this.tickers[i].currentItem].id;
     
       // Start the fade 25fps into interval
       var frames = Math.round(15 * ((this.interval/4) / 1000));
       var interval = Math.round( (this.interval/4) / frames);
       var delay = interval; 
       var frame = 0;
     
       var startdelay = Math.round((this.interval/4)*3);
     
        var rf = parseInt(this.tickers[i].fadeStart.substr(1,2),16);
        var gf = parseInt(this.tickers[i].fadeStart.substr(3,2),16);
        var bf = parseInt(this.tickers[i].fadeStart.substr(5,2),16);
        var rt = parseInt(this.tickers[i].fadeEnd.substr(1,2),16);
        var gt = parseInt(this.tickers[i].fadeEnd.substr(3,2),16);
        var bt = parseInt(this.tickers[i].fadeEnd.substr(5,2),16);
     
       var r,g,b,h;
       while (frame < frames) {
          r = Math.floor(rf * ((frames-frame)/frames) + rt * (frame/frames));
          g = Math.floor(gf * ((frames-frame)/frames) + gt * (frame/frames));
          b = Math.floor(bf * ((frames-frame)/frames) + bt * (frame/frames));
          h = this.make_hex(r,g,b);
   
         setTimeout("ttt.setcol('"+liid+"','"+h+"')", startdelay+delay);
       
         delay = interval * ++frame;
       }
     }
  }
     
}

tuiteleticker.prototype.make_hex = function(r,g,b) {
  r = r.toString(16); if (r.length == 1) r = '0' + r;
	g = g.toString(16); if (g.length == 1) g = '0' + g;
	b = b.toString(16); if (b.length == 1) b = '0' + b;
	return "#" + r + g + b;
}


tuiteleticker.prototype.get_bgcolor = function (elem)	{
	var o = elem;
	while(o)
	{
		var c;
		if (window.getComputedStyle) c = window.getComputedStyle(o,null).getPropertyValue("background-color");
		if (o.currentStyle) c = o.currentStyle.backgroundColor;
		if ((c != "" && c != "transparent") || o.tagName == "BODY") { break; }
		o = o.parentNode;
	}
	if (c == undefined || c == "" || c == "transparent") c = "#FFFFFF";
	var rgb = c.match(/rgb\s*\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*\)/);
	if (rgb) c = this.make_hex(parseInt(rgb[1]),parseInt(rgb[2]),parseInt(rgb[3]));
	
	return c;
}


tuiteleticker.prototype.init = function() {
  
  items = this.tickerElem.getElementsByTagName('li');
  if (!items) return false;
  
  // Get the height of the tallest item, set the ticker box to that height, and then hide all items.
  this.numItems = items.length;
  
  var maxheight = 0;
  for(ii=items.length-1;ii>=0;ii--) {
    if ((this.tickerStyle == 'fit-largest') && (maxheight < items[ii].offsetHeight)) {
      maxheight = items[ii].offsetHeight;
    }
    items[ii].style.display = 'none';
    
    this.listItems.push(items[ii]);
  }

  if (this.tickerStyle == 'fit-largest') {
    this.tickerElem.style.height = (maxheight)+'px';
  } else {
    this.tickerElem.style.height = '1.2em';
  }
  
  if (this.fadeEnd == '') this.fadeEnd = this.get_bgcolor(this.tickerElem);
  if (!this.fadeEnd) this.fadeEnd = '#FFFFFF';
  
}



var oldonload = window.onload;
 if (typeof window.onload != 'function') {
   window.onload = function(){ ttt = new tuiteleticker(); ttt.initTickers(); }
 } else {
   window.onload = function() {
   	oldonload();
   	ttt = new tuiteleticker(); ttt.initTickers();
   }
 }