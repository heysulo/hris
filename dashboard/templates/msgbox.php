<span id="msgbox">
<div class="msgbox_background">
	<div class="msgbox_section_title">
		<div class="msgbox_title">Are you happy now?</div>
		<div class="msgbox_close_button" onclick='closemsgbox()'></div>
	</div>
	<div class="msgbox_section_content">
		<p>
			Nunc at magna et neque fringilla viverra sed a libero. Vivamus lobortis diam dolor, nec finibus magna pharetra a. Fusce accumsan in est non sodales. Donec faucibus urna sed ex pulvinar, sed vulputate odio porttitor. Ut accumsan eu nunc in aliquet. Quisque at nisi et mauris pharetra rhoncus sit amet vitae leo. Nulla nec bibendum turpis, in mollis felis. Curabitur volutpat nisi et nibh tempor, eget placerat urna accumsan. Vivamus eget sagittis felis, non egestas magna. Aenean pulvinar urna nibh. Morbi auctor eleifend eros sollicitudin aliquet. 
		</p>
	</div>
	<div class="msgbbox_section_bottom" align="right">

		<button class="msgbox_button msgbox_button_default" onclick='closemsgbox();window.alert(";)");'>Continue</button>
		<button class="msgbox_button" onclick="closemsgbox()">Cancel</button>

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



		function closemsgbox () {
			var element = document.getElementById("msgbox");element.outerHTML = "";delete element;
		}
	</script>
</div>

<div class="msgbox_dimmer">

</div>
</span>