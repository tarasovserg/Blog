(function ($) {
	var _className = 'obz_check_strength';
	
	$.fn.checkStrength = function( ) {
		return this.each(function() {
			var $this = $(this),
				_container = $('<span/>').attr('class', _className).insertAfter(this).append(this),
				_display = $('<span/>').attr('class', 'display').appendTo(_container)
			;

			$this
				.bind('keyup change', countStrength )
			;
			
			var messages = ['Too Short','Too Weak','Weak','Good','Strong'];
			var colors = ['#BABEBA','#A1F3C0','#3AC06E','#49B351','#0EAD1B'];
			

			function countStrength() {
					var str = '';
					var strength = 0;
					
					str = $this.val();
					if(!str) {
						_display.hide();
						return;			
					}

					strength = strengthValue( str, strength );
					outputReslut( strength );
	
			}
			function strengthValue( str, strength ) {

				var strength_check_res =[ /[0-9]/,/[a-z]/,/[A-Z]/,/\W/];
				if(str.length<6) {
					strength =0;
					} else {
					for(var i = 0; i<strength_check_res.length;i++){
					    if(strength_check_res[i].test(str)) {
						strength++;
					    }
					}
					if(str.length<8 && strength==4) {
					    strength--;
					}
				}
				return strength;
			}
			function outputReslut( strength ) {
				_display					
					.css('color', colors[strength])
					.text(messages[strength])
					.show()
				;
			}

		});
	}

}) ( jQuery );	

