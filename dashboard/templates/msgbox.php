<span id="msgbox">
<div class="msgbox_background">
	<div class="msgbox_section_title">
		<div class="msgbox_title">Are you happy now?</div>
		<div class="msgbox_close_button" onclick='var element = document.getElementById("msgbox");element.outerHTML = ""';delete element;"></div>
	</div>


	<script type="text/javascript">
		function blurClearFix () {
			var x = 0;
			function fadein () {
				document.getElementById("clearfix").style.filter = "blur("+x+"px)";
				x=x+1;
				if(x>=10){
					clearInterval(a);
				}
				
				console.log(x);
			}
			
			var a = setInterval(fadein,5);
		}

		function restoreClearFix () {
			var x = 10;
			function fadeout () {
				
				if(x<=0){
					clearInterval(a);
				}
				document.getElementById("clearfix").style.filter = "blur("+x+"px)";
				x=x-1;
				console.log(x);
			}
			
			var a = setInterval(fadeout,5);
		}
	</script>
</div>

<div class="msgbox_dimmer">

</div>
</span>