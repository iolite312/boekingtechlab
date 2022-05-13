<!DOCTYPE html>
<html>
<head>
<script>

// stores the device context of the canvas we use to draw the outlines
// initialized in myInit, used in myHover and myLeave
var hdc;

// shorthand func
function byId(e){return document.getElementById(e);}

// takes a string that contains coords eg - "227,307,261,309, 339,354, 328,371, 240,331"
// draws a line from each co-ord pair to the next - assumes starting point needs to be repeated as ending point.
function drawPoly(coOrdStr)
{
    var mCoords = coOrdStr.split(',');
    var i, n;
    n = mCoords.length;

    hdc.beginPath();
    hdc.moveTo(mCoords[0], mCoords[1]);
    for (i=2; i<n; i+=2)
    {
        hdc.lineTo(mCoords[i], mCoords[i+1]);
    }
    hdc.lineTo(mCoords[0], mCoords[1]);
    hdc.stroke();
}

function drawRect(coOrdStr)
{
    var mCoords = coOrdStr.split(',');
    var top, left, bot, right;
    left = mCoords[0];
    top = mCoords[1];
    right = mCoords[2];
    bot = mCoords[3];
    hdc.strokeRect(left,top,right-left,bot-top); 
}

function myHover(element)
{
    var hoveredElement = element;
    var coordStr = element.getAttribute('coords');
    var areaType = element.getAttribute('shape');

    switch (areaType)
    {
        case 'polygon':
        case 'poly':
            drawPoly(coordStr);
            break;

        case 'rect':
            drawRect(coordStr);
    }
}

function myLeave()
{
    var canvas = byId('myCanvas');
    hdc.clearRect(0, 0, canvas.width, canvas.height);
}

function myInit()
{
    // get the target image
    var img = byId('img-imgmap201293016112');

    var x,y, w,h;

    // get it's position and width+height
    x = img.offsetLeft;
    y = img.offsetTop;
    w = img.clientWidth;
    h = img.clientHeight;

    // move the canvas, so it's contained by the same parent as the image
    var imgParent = img.parentNode;
    var can = byId('myCanvas');
    imgParent.appendChild(can);

    // place the canvas in front of the image
    can.style.zIndex = 1;

    // position it over the image
    can.style.left = x+'px';
    can.style.top = y+'px';

    // make same size as the image
    can.setAttribute('width', w+'px');
    can.setAttribute('height', h+'px');

    // get it's context
    hdc = can.getContext('2d');

    // set the 'default' values for the colour/width of fill/stroke operations
    hdc.fillStyle = 'red';
    hdc.strokeStyle = 'red';
    hdc.lineWidth = 2;
}
</script>

<style>
body
{
    background-color: gray;
}
canvas
{
    pointer-events: none;       /* make the canvas transparent to the mouse - needed since canvas is position infront of image */
    position: absolute;
}
</style>

<title></title>
</head>
<body onload='myInit()'>
    <canvas id='myCanvas'></canvas>     <!-- gets re-positioned in myInit(); -->
<center>
<img src='/assets/images/layout.png' usemap='#imgmap_css_container_imgmap201293016112' class='imgmap_css_container' title='imgmap201293016112' alt='imgmap201293016112' id='img-imgmap201293016112' />
<map id='imgmap201293016112' name='imgmap_css_container_imgmap201293016112'>
    <area shape="poly" onmouseover='myHover(this);' onmouseout='myLeave();' coords="611,47 611,47 611,427 836,428 836,374 878,322 940,304 943,49 943,49 943,49 " href="" alt="imgmap201293016112-0" title="imgmap201293016112-0" class="imgmap201293016112-area" id="imgmap201293016112-area-0" />
    <area shape="poly" onmouseover='myHover(this);' onmouseout='myLeave();' coords="1275,65 1281,50 1281,480 1073,482 1082,433 1063,360 1016,304 947,286 939,49 1283,49 " href="" alt="imgmap201293016112-1" title="imgmap201293016112-1" class="imgmap201293016112-area" id="imgmap201293016112-area-1" />
    <area shape="poly" onmouseover='myHover(this);' onmouseout='myLeave();' coords="608,436 608,436 609,814 937,814 943,559 878,538 838,497 833,437 " href="" alt="imgmap201293016112-2" title="imgmap201293016112-2" class="imgmap201293016112-area" id="imgmap201293016112-area-2" />
    <area shape="poly" onmouseover='myHover(this);' onmouseout='myLeave();' coords="1277,506 1154,506 1113,550 1111,689 1281,686 " href="" alt="imgmap201293016112-3" title="imgmap201293016112-3" class="imgmap201293016112-area" id="imgmap201293016112-area-3" />
    <area shape="poly" onmouseover='myHover(this);' onmouseout='myLeave();' coords="590,537 92,538 90,648 99,701 122,750 162,792 205,815 258,820 593,820 " href="" alt="imgmap201293016112-4" title="imgmap201293016112-4" class="imgmap201293016112-area" id="imgmap201293016112-area-4" />
    <area shape="poly" onmouseover='myHover(this);' onmouseout='myLeave();' coords="944,310 882,325 841,368 841,494 882,535 942,550 1002,540 1047,495 1059,431 1044,372 1004,328 946,310 " href="" alt="imgmap201293016112-5" title="imgmap201293016112-5" class="imgmap201293016112-area" id="imgmap201293016112-area-5" />
</map>
</center>

</body>
</html>










<!-- <link rel="stylesheet" href="/css/map.css">
<img src="/assets/images/layout.png" usemap="#image_map">
<map name="image_map">
  <area class="hover" alt="Lab 1" title="Lab 1" href="#" coords="611,47 611,47 611,427 836,428 836,374 878,322 940,304 943,49 943,49 943,49 " shape="polygon">
  <area class="hover" alt="test" title="test" href="#" coords="1275,65 1281,50 1281,480 1073,482 1082,433 1063,360 1016,304 947,286 939,49 1283,49 " shape="polygon">
  <area class="hover" alt="Lab 2" title="Lab 2" href="#" coords="608,436 608,436 609,814 937,814 943,559 878,538 838,497 833,437 " shape="polygon">
  <area class="hover" alt="Greenroom" title="Greenroom" href="#" coords="1277,506 1154,506 1113,550 1111,689 1281,686 " shape="polygon">
  <area class="hover" alt="VR room" title="VR room" href="#" coords="590,537 92,538 90,648 99,701 122,750 162,792 205,815 258,820 593,820 " shape="polygon">
  <area class="hover" alt="Test" title="Test" href="#" coords="944,310 882,325 841,368 841,494 882,535 942,550 1002,540 1047,495 1059,431 1044,372 1004,328 946,310 " shape="polygon">
</map> -->