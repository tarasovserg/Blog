(function( $ ) {
    var settings = {
        messages: ['Too Short','Too Weak','Weak','Good','Strong'],
        colors: ['#BABEBA','#A1F3C0','#3AC06E','#49B351','#0EAD1B']
    }

    var methods = {
        init: function ( options ) {

            if ( options ) {
                $.extend( settings, options );
            }
            return this.each(function() {
                    var strength = 0;
                    var strength_check_res =[ /[0-9]/,/[a-z]/,/[A-Z]/,/\W/];
                    if(options.str.length<6) {
                        strength =0;
                    } else {
                        for(var i = 0; i<strength_check_res.length;i++){
                            if(strength_check_res[i].test(options.str)) {
                                strength++;
                            }
                        }
                        if(options.str.length<8 && strength==4) {
                            strength--;
                        }
                    }
            });
        },
        destroy: function ( ) {

            $('#strength_password').hide();
        }
    }
    $.fn.checkStrength = function( method ) {

        if ( methods[method] ) {
            return methods[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
        } else if ( typeof method === 'object' || ! method ) {
            return methods.init.apply( this, arguments );
        } else {
            $.error( 'Method ' +  method + ' does not exist on jQuery.checkStrength' );
        }

    };
}) ( jQuery );

