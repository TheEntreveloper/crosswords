<?php
/**
 * Sample PHP file to load a crossword
 * You can just run any crossword by passing its name (without the extension) to cwvstatic.html, like this:
 * https://yourdomain/cwvstatic.html?cw=mycrossword
 * assuming above that you have a crossword created (under the data folder of the viewer installation) with the above name:
 * data/mycrossword.xml
 *
 * but if you want to select the crosswords in php code, this file can be a starting point.
 *
 *  License: MIT
 * -----------------------------------
 *
 * MIT License
 *
 * Copyright Entreveloper.com (https://entreveloper.com)
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 */
// available sample data:
$data = array('celebrities' => 'data/celebrities.xml', 'countries' => 'data/countries.xml');
$chosenCw = $data[$_GET['cw']];
$cwtitle = ucfirst($_GET['cw']);
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="oss crossword viewer in html5 canvas">
  <meta name="author" content="Entreveloper">
  <title>Open source html canvas crossword viewer</title>
  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<section class="content-section bg-light" id="about">
	<div class="container text-center">
		<div class="row">
			<div class="col-lg-10 mx-auto">
				<h2>Crossword - <?php echo($cwtitle);?></h2>
				<p class="lead mb-5">Your crossword is ready. Use your mouse and keyboard to interact with it (Shift-click changes writing direction)</p>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-lg-8">
				<div id="myParent"></div>
				<input id="kb" type="text" autocomplete="off" style="position:fixed;left:-1700px;top:0px";>
			</div>
			<div class="col-6 col-lg-4">
				<div class="row">
					<div class="col-12 text-left" id="messages">Press on a cell to view hints here. Use Shift-click to change writing direction</div>
					<div class="col-12">
						<button class="btn btn-info" value="solve" onclick="cw.solve();">View solution</button>
						<button class="btn btn-info" value="evaluate" onclick="cw.evaluate();">Check for mistakes</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/cwviewer.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var cwidth = 500;
        if (window.screen.width<500) {
			cwidth = window.screen.width-25;
		}
        var canvas = '<canvas id="cwCanvas" width="'+cwidth+'" height="'+cwidth+'" style="border:1px solid #0b0b0b"></canvas>';
        $('#myParent').html(canvas);
        crossword('cwCanvas', '<?php echo($chosenCw);?>', function(data) { //cwhtml5/cw
            $('#messages').html(data);
        });
        // workaround to make keyboards visible and get pressed keys on certain mobile browsers.
        var isMobile = window.matchMedia("only screen and (max-width: 760px)").matches;
        if (!isMobile) { // workaround because window.matchMedia fails at least on older iPads
            if ("iPad" === window.clientInformation.platform || "iPhone" === window.clientInformation.platform) {
                isMobile = true;
			}
		}
		if (isMobile) {
		    var isChrome = false;
		    cw.setMobile(true);
            $('#kb').keydown(function(e) {
                e.preventDefault();
            });
            $('#kb').on("input", function() {
                var c = $(this).val();
                console.log("input, c is " + c + " isChrome? " + isChrome);
                if (c != null && c.length > 0) {
                    if (isChrome) {
                        cwkbd(c.charAt(c.length - 1), 1);
					}
				}
            });
            $('#kb').keyup(function(e) {
                var c = e.target.value, k = e.originalEvent.keyCode;
                console.log("keyup, c is " + c);
                if (c == null || c === "") {
                    c = String.fromCharCode(e.keyCode);
				}
                isChrome = (e.keyCode === 229);
                e.preventDefault();
                cwkbd(c, k);
            });
            document.getElementById("cwCanvas").addEventListener('click', function () {
                document.getElementById("kb").focus();
            });
            function cwkbd(c, k) {
                var o = {key: c, keyCode: k, mbke: true};
                console.log("char="+o.key)
                cw.keyDown(o);
			}
        }
    });
</script>
</body>

</html>
