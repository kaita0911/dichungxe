<div class="main_wrapper">
    <div class="main">
		<div class="title">
        	##Quen_mat_khau##
        </div>
        <div class="register_main" id="thuongkhachtop">
        	<div class="left">
           		<div class="registerbg1"></div>
                <div class="registerbg2">
                	<form >
                    	<div class="note_text"> ##Email## </div>
                        <div class="register_text"> 
                            <input type="text" class="name_input" name="email" id="email"/>
                        </div>
                        <div class="note" style="display:none;" id="erro_email"></div>
                        
						
                         <a href="javascript:void(0)" onclick="return forgotpw();" title="##Quen_mat_khau##">
                            <div class="register_submint">
                               ##Goi##  &nbsp;&nbsp;
                            </div>
                            <div  align="center" id="loader" style="display:none">
                               <img  src="<!--{$path_url}-->/ajax-loader.gif" />
                            </div>
                        </a> 
                    </form>
                </div>
                <div class="registerbg3"></div>
            </div>
            
            <div class="right" style="padding:80px 0 0 0;">
            	<div class="right_text">
                	##Ban_chua_la_thanh_vien##
                </div>
            	<a href="<!--{$path_url}-->/thanh-vien/dang-ky/#thuongkhachtop" title="##Dang_ky##">
                    <div class="register_submint">
                        ##Dang_ky##  &nbsp;&nbsp;
                    </div>
                    
                </a> 
            </div>
            <div class="clear"></div>
        </div>
	</div>
</div>

<script language="javascript" type="text/javascript">
function forgotpw(){
	var email = $("#email").val();
	var r = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var flag = 0;
   
	if (r.test(email)==false){
		$("#erro_email").attr("style", "display:block");
		$("#erro_email").html('##EmailFormatValidate##');
		flag = 1;
		location.hash = "#thuongkhachtop";
	}
	else{
		$("#erro_email").attr("style", "display:none");
	}
	
	if(flag == 1)
		return false;
	else
	{
		$("#loader").attr("style", "display:block");	
		jQuery.post('<!--{$path_url}-->/loading/thanhvien.php',{ 
		type: 'forgot',
		email: email
		},function(data){
			$("#loader").attr("style", "display:none");
			var obj = jQuery.parseJSON(data);
			if(obj.status == 'success'){
				$('#thuongkhachtop').html(obj.msg); 
			}
			else{
				jQuery.each(obj.errors, function(index, value) {
					
					$('#erro_'+index).html(value);
					$('#erro_'+index).show();
				});
				//location.hash = "#thuongkhachtop";	
			}
		});
		return false;
	}
		
}

</script>