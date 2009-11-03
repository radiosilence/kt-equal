
var e = "abbr,article,aside,audio,canvas,datalist,details," +
"figure,footer,header,hgroup,mark,menu,meter,nav,output," +
"progress,section,time,video".split(',');
var i = e.length;
while (i--) {
document.createElement(e[i]);
}