//made by vipul mirajkar thevipulm.appspot.com
var TxtType = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 2000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

        var that = this;
        var delta = 200 - Math.random() * 100;

        if (this.isDeleting) { delta /= 2; }

        if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
        }

        setTimeout(function() {
        that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('typewrite');
        for (var i=0; i<elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
              new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
        document.body.appendChild(css);
    };


function overlayui(anydata){

        $.blockUI({message: '<h4>'+anydata+'</h4>', css: { 
            border: 'none', 
            padding: '15px', 
            backgroundColor: '#000', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px', 
            opacity: 1,
            color: '#000' 
        } }); 
 
        //setTimeout($.unblockUI, 2000); 
  
}

$(document).ready(function(){
	$('#registeration-form').on('submit',function(pre){
pre.preventDefault(); 
//alert('ok');
            var sitename = $('#Email').data('id');
             overlayui(sitename);         
            $.ajax({
            url:'assets/functions/func_register.php',
            type:'POST',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success:function(result)
            {
                //alert(result);
                setTimeout(function(){
                switch(result)
                {
                case'no match':
                 $.blockUI({ message: "<h5>Password does not match</h5>",
                    css: { backgroundColor: '#FCD116', color: '#000', border: 'none', padding: '1%'} });
                   setTimeout($.unblockUI, 2000);    
                break;  

                case'existed':
                   $.blockUI({ message: "<h5>Account already exist(check phone number or email)</h5>", 
                    css: { backgroundColor: '#FCD116', color: 'darkred'} });
                   setTimeout($.unblockUI, 2000);   
                break;       

                case'success':  
                $.unblockUI();              
                  window.location.href='#login';
                break;      

                default:
                alert(result);
                break
                }

                },2000);        

            }   
            });       
 
            $('#no').click(function() { 
                $.unblockUI();
                return false; 
            });  
});






	$('#login-form').on('submit',function(pre2){
		pre2.preventDefault(); 
		//alert('ok');
            // update the block message 
            var sitename = $('#Email').data('id');
             overlayui(sitename);         
            $.ajax({
            url:'assets/functions/func_login.php',
            type:'POST',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success:function(result)
            {
                //alert(result);
                setTimeout(function(){
                switch(result)
                {
                case'blocked':
                   $.blockUI({ message: "<h5>Account has been blocked</h5>", 
                    css: { backgroundColor: '#FCD116', color: '#000', border: 'none', padding: '1%'} });
                   setTimeout($.unblockUI, 2000);   
                break;

                case'false':
                   $.blockUI({ message: "<h5>Invalid login details</h5>",
                    css: { backgroundColor: '#FCD116', color: '#000', border: 'none', padding: '1%'} });
                   setTimeout($.unblockUI, 2000);   
                break;    

                case'success':           
                    window.location.href='en/';
                break;      

                default:
                alert(result);
                break
                }

                },2000);        

            }   
            });       
 
            $('#no').click(function() { 
                $.unblockUI();
                return false; 
            });  
});


$("#fakeloader").fakeLoader({
timeToHide:1200, //Time in milliseconds for fakeLoader disappear
zIndex:"999",//Default zIndex
spinner:"spinner5",//Options: 'spinner1', 'spinner2', 'spinner3', 'spinner4', 'spinner5', 'spinner6', 'spinner7'
bgColor:"#000", //Hex, RGB or RGBA colors
imagePath:"images/logo.png" //If you want can you insert your custom image
});

});