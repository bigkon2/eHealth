<!DOCTYPE html>
<!-- <html manifest="cache.manifest"> -->
<html>

<head>
<title>DICOM Web Viewer</title>
<meta charset="UTF-8">
<meta name="description" content="DICOM Web Viewer (DWV) mobile version">
<meta name="keywords" content="DICOM,HTML5,JavaScript,medical,imaging,DWV">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link type="text/css" rel="stylesheet" href="../../css/style.css" />
<style type="text/css" >
body { margin: 10px; padding: 0; }
.layerContainer { margin: auto; text-align: center; }
.imageLayer { left: 0px; }
.dropBox { margin: 20px auto; }
</style>
<link type="text/css" rel="stylesheet" href="../../ext/jquery-mobile/jquery.mobile-1.4.5.min.css" />
<!-- mobile web app -->
<meta name="mobile-web-app-capable" content="yes" />
<link rel="shortcut icon" sizes="16x16" href="../../resources/dwv-16.png" />
<link rel="shortcut icon" sizes="60x60" href="../../resources/dwv-60.png" />
<link rel="shortcut icon" sizes="128x128" href="../../resources/dwv-128.png" />
<!-- apple specific -->
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<link rel="apple-touch-icon" sizes="16x16" href="../../resources/dwv-16.png" />
<link rel="apple-touch-icon" sizes="60x60" href="../../resources/dwv-60.png" />
<link rel="apple-touch-icon" sizes="128x128" href="../../resources/dwv-128.png" />
<!-- Third party -->  
<script type="text/javascript" src="../../ext/jquery/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="../../ext/jquery-mobile/jquery.mobile-1.4.5.min.js"></script>
<script type="text/javascript" src="../../ext/flot/jquery.flot.min.js"></script>
<script type="text/javascript" src="../../ext/pdfjs/jpx.js"></script>
<script type="text/javascript" src="../../ext/pdfjs/util.js"></script>
<script type="text/javascript" src="../../ext/pdfjs/arithmetic_decoder.js"></script>
<script type="text/javascript" src="../../ext/kinetic/kinetic-v5.1.1-06.10.min.js"></script>
<!-- Local -->
<script type="text/javascript" src="../../src/app/application.js"></script>
<script type="text/javascript" src="../../src/app/state.js"></script>
<script type="text/javascript" src="../../src/app/toolboxController.js"></script>
<script type="text/javascript" src="../../src/app/viewController.js"></script>
<script type="text/javascript" src="../../src/dicom/dicomParser.js"></script>
<script type="text/javascript" src="../../src/dicom/dictionary.js"></script>
<script type="text/javascript" src="../../src/gui/browser.js"></script>
<script type="text/javascript" src="../../src/gui/filter.js"></script>
<script type="text/javascript" src="../../src/gui/generic.js"></script>
<script type="text/javascript" src="../../src/gui/help.js"></script>
<script type="text/javascript" src="../../src/gui/html.js"></script>
<script type="text/javascript" src="../../src/gui/layer.js"></script>
<script type="text/javascript" src="../../src/gui/loader.js"></script>
<script type="text/javascript" src="../../src/gui/style.js"></script>
<script type="text/javascript" src="../../src/gui/tools.js"></script>
<script type="text/javascript" src="../../src/gui/undo.js"></script>
<script type="text/javascript" src="../../src/image/filter.js"></script>
<script type="text/javascript" src="../../src/image/geometry.js"></script>
<script type="text/javascript" src="../../src/image/image.js"></script>
<script type="text/javascript" src="../../src/image/luts.js"></script>
<script type="text/javascript" src="../../src/image/view.js"></script>
<script type="text/javascript" src="../../src/image/reader.js"></script>
<script type="text/javascript" src="../../src/io/file.js"></script>
<script type="text/javascript" src="../../src/io/url.js"></script>
<script type="text/javascript" src="../../src/math/bucketQueue.js"></script>
<script type="text/javascript" src="../../src/math/point.js"></script>
<script type="text/javascript" src="../../src/math/scissors.js"></script>
<script type="text/javascript" src="../../src/math/shapes.js"></script>
<script type="text/javascript" src="../../src/math/stats.js"></script>
<script type="text/javascript" src="../../src/tools/draw.js"></script>
<script type="text/javascript" src="../../src/tools/editor.js"></script>
<script type="text/javascript" src="../../src/tools/ellipse.js"></script>
<script type="text/javascript" src="../../src/tools/filter.js"></script>
<script type="text/javascript" src="../../src/tools/info.js"></script>
<script type="text/javascript" src="../../src/tools/line.js"></script>
<script type="text/javascript" src="../../src/tools/livewire.js"></script>
<script type="text/javascript" src="../../src/tools/protractor.js"></script>
<script type="text/javascript" src="../../src/tools/rectangle.js"></script>
<script type="text/javascript" src="../../src/tools/roi.js"></script>
<script type="text/javascript" src="../../src/tools/scroll.js"></script>
<script type="text/javascript" src="../../src/tools/toolbox.js"></script>
<script type="text/javascript" src="../../src/tools/undo.js"></script>
<script type="text/javascript" src="../../src/tools/windowLevel.js"></script>
<script type="text/javascript" src="../../src/tools/zoomPan.js"></script>
<script type="text/javascript" src="../../src/utils/string.js"></script>

<!-- Launch the app -->
<script type="text/javascript" src="appgui.js"></script>
<script type="text/javascript" src="applauncher.js"></script>
</head>

<body>

<!-- Main page -->
<div data-role="page" data-theme="b" id="main">

<!-- pageHeader #dwvversion -->
<div id="pageHeader" data-role="header">
<!--<h1>DWV <span class="dwv-version"></span></h1>-->
<!--    <button class="pat_ful btn1" onclick="javascript:screenshare();" >Share Screen<i class="fa fa-desktop"></i></button>
                    <a href="javascript:void(0);" class="fullscreen pat_ful btn1">Full Screen<i class="fa fa-arrows-alt"></i></a>-->
<h1>DWV Dicom Viewer</h1>
<!--<a href="#help_page" data-icon="carat-r" class="ui-btn-right"
  data-transition="slide">Help</a>-->
</div><!-- /pageHeader -->

<div id="pageMain" data-role="content" style="padding:2px;">   

<!-- Toolbar -->
<div id="toolbar"></div>

<!-- Open popup -->
<div data-role="popup" id="popupOpen">
<a href="#" data-rel="back" data-role="button" 
  data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a> 
<div style="padding:10px 20px;">
<h3>Open</h3>
<div id="loaderlist"></div>
</div>
</div><!-- /popup -->
 
<!-- Layer Container -->
<div id="dwv" class="layerContainer">
<div id="dwv-dropBox" class="dropBox"></div>
<canvas id="dwv-imageLayer" class="imageLayer">Only for HTML5 compatible browsers...</canvas>
<div id="dwv-drawDiv" class="drawDiv"></div>
<div id="dwv-infoLayer" class="infoLayer">
<div id="dwv-infotl" class="infotl"></div>
<div id="dwv-infotr" class="infotr"></div>
<div id="dwv-infobl" class="infobl"></div>
<div id="dwv-infobr" class="infobr"><div id="dwv-plot" class="plot"></div></div>
</div><!-- /dwv-infoLayer -->
</div><!-- /dwv -->

<!-- History -->
<div id="history" title="History" style="display:none;"></div>

</div><!-- /content -->

<div data-role="footer" id="footer">        
<div data-role="navbar" id="toolbox">
<ul id="toolList"><li></li><li></li><li></li></ul>
</div><!-- /navbar: main -->
</div><!-- /footer -->

</div><!-- /page main -->


<!-- Tags page -->
<div data-role="page" data-theme="b" id="tags_page">

<div data-role="header">
<a href="#main" data-icon="back" 
  data-transition="slide" data-direction="reverse">Back</a>
<h1>DICOM Tags</h1>
</div><!-- /header -->

<div data-role="content">   
<!-- Tags -->
<div id="tags" title="Tags"></div>
</div><!-- /content -->

</div><!-- /page tags_page-->

<!-- Help page -->
<div data-role="page" data-theme="b" id="help_page">

<div data-role="header">
<a href="#main" data-icon="back" 
  data-transition="slide" data-direction="reverse">Back</a>
<h1>DWV Help</h1>
</div><!-- /header -->

<div data-role="content">   
<!-- Tags -->
<div id="help" title="Help"></div>
</div><!-- /content -->

</div><!-- /page help_page-->

</body>
</html>
