
  var canvas = document.getElementById('drawCanvas');
  var ctx = canvas.getContext('2d');
  ctx.lineWidth = '1';
  ctx.strokeStyle = "#222d";
  canvas.addEventListener('mousedown', startDraw, false);
  canvas.addEventListener('mousemove', draw, false);
  canvas.addEventListener('mouseup', endDraw, false);
  canvas.addEventListener('touchstart', startDraw, false);
  canvas.addEventListener('touchmove', draw, false);
  canvas.addEventListener('touchend', endDraw, false);

  // create a flag
var isActive = false;

// array to collect coordinates
var plots = [];

function draw(e) {
  if(!isActive) return;
  console.log(e);
  var rect = canvas.getBoundingClientRect();
  
  // cross-browser canvas coordinates
  var x = e.offsetX || e.layerX - canvas.offsetLeft || e.touches[0].clientX - rect.left; 
  var y = e.offsetY || e.layerY - canvas.offsetTop  || e.touches[0].clientY - rect.top;
  plots.push({x: x, y: y});
  ctx.beginPath();
  
  ctx.moveTo(plots[0].x, plots[0].y);

  for(var i=1; i<plots.length; i++) {
    ctx.lineTo(plots[i].x, plots[i].y);
  }
  ctx.stroke();
  
}



function startDraw(e) {
  isActive = true;
}

function endDraw(e) {
  isActive = false;

  // empty the array
  plots = [];
}

