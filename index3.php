
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Meme Generator</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="123.css">
  <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:wght@700&display=swap" rel="stylesheet">
</head>
<body>
  

<?php 
 include_once('config.php'); 

 if(empty($_SESSION['username']))
	{
		header('Location: login.php');
	}
  
?>

<h1>jsadjsdja  <strong> <?php echo $_SESSION['username']; ?> </strong></h1>
<div id="content">

<div class="box">
  <div>
    <div id="canvasWrapper">
    </div>
  </div>
   
  
  
  <form method="POST" action="index3.php" enctype="multipart/form-data">
    <h3><i class="fa fa-picture-o fa-fw" aria-hidden="true"></i>Source Image</h3>
    <div class="box">
      <div>
        <p>From URL</p>
        <input id="imgURL" class="block" type="text" placeholder="Link to image" />
        <a href="http://memeful.com/" target="_blank">Memeful.com</a>
      </div>
      <div>
        <p>From Local Disk</p>
        <input id="imgFile" type="file" accept="image/*" name="image"/>
        <label for="imgFile" class="btn" ><i class="fa fa-upload fa-fw"></i></label>
      </div>
    </div>


    
    <h3><i class="fa fa-commenting-o fa-fw" aria-hidden="true"></i>Meme Text</h3>
    <div class="box">
      <div>
        <p>Top Text</p>
        <input id="textTop" type="text" class="block" placeholder="Top text" />
      </div>
      <div>
        <p>Bottom Text</p>
        <input id="textBottom" type="text" class="block" placeholder="Bottom text" />
      </div>
    </div>

    
    
    <h3><i class="fa fa-text-height fa-fw" aria-hidden="true"></i>Text Size</h3>
    <div class="box">
      <div>
        <p>Top Text: <span id="textSizeTopOut">10</span></p>
        <input id="textSizeTop" type="range" min="2" max="50" step="2" />
      </div>
      <div>
        <p>Bottom Text: <span id="textSizeBottomOut">10</span></p>
        <input id="textSizeBottom" type="range" min="2" max="50" step="2" />
      </div>
    </div>

    
    
    <div class="box">
      <div>
        <h3><i class="fa fa-eye fa-fw" aria-hidden="true"></i>Preview Size</h3>
        <input id="trueSize" type="checkbox"/>
        <label for="trueSize"><span>Show true size</span></label>
      </div>
      
      
      
      <div>
        <h3><i class="fa fa-download fa-fw" aria-hidden="true"></i>Export</h3>
        <p>If the button doesn't work, right-click the image and save it</p>
        <p>If you are one mobile, download the source image and directly upload it</p>
        <input id="export" type="submit" name="submit">Export!</input>
      </div>

    </div>


  </form>
</div>
  
  <script>
  // CAN\NVAS.js plugin
// ninivert, december 2016
(function (window, document) {
  /**
  * CAN\VAS Plugin - Adding line breaks to canvas
  * @arg {string} [str=Hello World] - text to be drawn
  * @arg {number} [x=0]             - top left x coordinate of the text
  * @arg {number} [y=textSize]      - top left y coordinate of the text
  * @arg {number} [w=canvasWidth]   - maximum width of drawn text
  * @arg {number} [lh=1]            - line height
  * @arg {number} [method=fill]     - text drawing method, if 'none', text will not be rendered
  */

	CanvasRenderingContext2D.prototype.drawBreakingText = function (str, x, y, w, lh, method) {
		// local variables and defaults
		var textSize = parseInt(this.font.replace(/\D/gi, ''));
		var textParts = [];
		var textPartsNo = 0;
		var words = [];
		var currLine = '';
		var testLine = '';
		str = str || '';
		x = x || 0;
		y = y || 0;
		w = w || this.canvas.width;
		lh = lh || 1;
		method = method || 'fill';

		// manual linebreaks
		textParts = str.split('\n');
		textPartsNo = textParts.length;

		// split the words of the parts
		for (var i = 0; i < textParts.length; i++) {
			words[i] = textParts[i].split(' ');
		}

		// now that we have extracted the words
		// we reset the textParts
		textParts = [];

		// calculate recommended line breaks
		// split between the words
		for (var i = 0; i < textPartsNo; i++) {

			// clear the testline for the next manually broken line
			currLine = '';

			for (var j = 0; j < words[i].length; j++) {
				testLine = currLine + words[i][j] + ' ';

				// check if the testLine is of good width
				if (this.measureText(testLine).width > w && j > 0) {
					textParts.push(currLine);
					currLine = words[i][j] + ' ';
				} else {
					currLine = testLine;
				}
			}
      // replace is to remove trailing whitespace
			textParts.push(currLine);
		}

		// render the text on the canvas
		for (var i = 0; i < textParts.length; i++) {
			if (method === 'fill') {
				this.fillText(textParts[i].replace(/((\s*\S+)*)\s*/, '$1'), x, y+(textSize*lh*i));
			} else if (method === 'stroke') {
				this.strokeText(textParts[i].replace(/((\s*\S+)*)\s*/, '$1'), x, y+(textSize*lh*i));
			} else if (method === 'none') {
        return {'textParts': textParts, 'textHeight': textSize*lh*textParts.length};
			} else {
        console.warn('drawBreakingText: ' + method + 'Text() does not exist');
				return false;
			}
		}

		return {'textParts': textParts, 'textHeight': textSize*lh*textParts.length};
	};
}) (window, document);





var canvas = document.createElement('canvas');
var canvasWrapper = document.getElementById('canvasWrapper');
canvasWrapper.appendChild(canvas);
canvas.width = 500;
canvas.height = 500;
var ctx = canvas.getContext('2d');
var padding = 15;
var textTop = 'i don\'t always make a meme';
var textBottom = 'but when i do, i use ninivert\'s generator';
var textSizeTop = 10;
var textSizeBottom = 10;
var image = document.createElement('img');





image.onload = function (ev) {
  // delete and recreate canvas do untaint it
  canvas.outerHTML = '';
  canvas = document.createElement('canvas');
  canvasWrapper.appendChild(canvas);
  ctx = canvas.getContext('2d');
  document.getElementById('trueSize').click();
  document.getElementById('trueSize').click();
  
  draw();
};

document.getElementById('imgURL').oninput = function(ev) {
  image.src = this.value;
};

document.getElementById('imgFile').onchange = function(ev) {
  var reader = new FileReader();
  reader.onload = function(ev) {
    image.src = reader.result;
  };
  reader.readAsDataURL(this.files[0]);
};



document.getElementById('textTop').oninput = function(ev) {
  textTop = this.value;
  draw();
};

document.getElementById('textBottom').oninput = function(ev) {
  textBottom = this.value;
  draw();
};



document.getElementById('textSizeTop').oninput = function(ev) {
  textSizeTop = parseInt(this.value);
  draw();
  document.getElementById('textSizeTopOut').innerHTML = this.value;
};
document.getElementById('textSizeBottom').oninput = function(ev) {
  textSizeBottom = parseInt(this.value);
  draw();
  document.getElementById('textSizeBottomOut').innerHTML = this.value;
};



document.getElementById('trueSize').onchange = function(ev) {
  if (document.getElementById('trueSize').checked) {
    canvas.classList.remove('fullwidth');
  } else {
    canvas.classList.add('fullwidth');
  }
};







function style(font, size, align, base) {
  ctx.font = size + 'px ' + font;
  ctx.textAlign = align;
  ctx.textBaseline = base;
}

function draw() {
  // uppercase the text
  var top = textTop.toUpperCase();
  var bottom = textBottom.toUpperCase();
  
  // set appropriate canvas size
  canvas.width = image.width;
  canvas.height = image.height;
  
  // draw the image
  ctx.drawImage(image, 0, 0, canvas.width, canvas.height);
  
  // styles
  ctx.fillStyle = '#fff';
  ctx.strokeStyle = '#000';
  ctx.lineWidth = canvas.width*0.004;
  
  var _textSizeTop = textSizeTop/100*canvas.width;
  var _textSizeBottom = textSizeBottom/100*canvas.width;
  
  // draw top text
  style('Impact', _textSizeTop, 'center', 'bottom');
  ctx.drawBreakingText(top, canvas.width/2, _textSizeTop+padding, null, 1, 'fill');
  ctx.drawBreakingText(top, canvas.width/2, _textSizeTop+padding, null, 1, 'stroke');

  // draw bottom text
  style('Impact', _textSizeBottom, 'center', 'top');
  var height = ctx.drawBreakingText(bottom, 0, 0, null, 1, 'none').textHeight;
  console.log(ctx.drawBreakingText(bottom, 0, 0, null, 1, 'none'));
  ctx.drawBreakingText(bottom, canvas.width/2, canvas.height-padding-height, null, 1, 'fill');
  ctx.drawBreakingText(bottom, canvas.width/2, canvas.height-padding-height, null, 1, 'stroke');
}





image.src = 'https://imgflip.com/s/meme/The-Most-Interesting-Man-In-The-World.jpg';
document.getElementById('textSizeTop').value = textSizeTop;
document.getElementById('textSizeBottom').value = textSizeBottom;
document.getElementById('textSizeTopOut').innerHTML = textSizeTop;
document.getElementById('textSizeBottomOut').innerHTML = textSizeBottom;
  </script>

<script>
         $(function(){
         $("#export").click(function(){
         html2canvas($("#canvasWrapper"), {
         	onrendered: function(canvas) {
         	var imgsrc = canvas.toDataURL("image/png");
         	console.log("here:" + imgsrc);
         	$("#newimg").attr('src',imgsrc);
         	$("#img").show();
         var dataURL = canvas.toDataURL();
            $.ajax({
           type: "POST",
           url: "script.php",
           data: { 
              imgBase64: dataURL
           }
         }).done(function(o) {
           console.log('saved'); 
           // If you want the file to be visible in the browser 
           // - please modify the callback in javascript. All you
           // need is to return the url to the file, you just saved 
           // and than put the image in your browser.
         });
         }
         });
         });
         });
      </script>



</body>
</html>
