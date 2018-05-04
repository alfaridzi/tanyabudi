<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tanyabudi</title>
    </head>
    <body>
    	<h3>Scan Voucher</h3>
        <hr>
        <canvas></canvas>
        <hr>
        <ul></ul>
        <script type="text/javascript" src="{{ asset('js/qrcodelib.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/webcodecamjs.js') }}"></script>
        <script type="text/javascript">
        	var txt = "innerText" in HTMLElement.prototype ? "innerText" : "textContent";
            var arg = {
                resultFunction: function(result) {
                	
                     window.location.replace(result.code);
                    return false;
                   
                }
            };
            new WebCodeCamJS("canvas").init(arg).play();
        </script>
    </body>
</html>