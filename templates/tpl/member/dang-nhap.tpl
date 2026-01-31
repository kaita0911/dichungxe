<!---Content-->

    
    <div class="container">
		
       		<div class="main">	  
                <div class="row">
                    <!--{include file="member-left.tpl"}-->
                    
					<div class="users_info col-lg-9">
						<h1 class="title-page">Đăng nhập</h1>
						<form class="mem-register" name="dangky" >
                        	<div class="MemberAll">
                            	<div class="MemberName"> 
                                	Email&nbsp;<font color="#e5b540">*</font> 
                                </div>
                                <div class="MemberText">
                                	<input type="text" id="email" name="email" class="txt-input" />
                                </div>
                            </div>
                            
                            <div class="MemberAll">
                            	
                                <div class="MemberName"> 
                                	Mật khẩu&nbsp;<font color="#e5b540">*</font>
                                </div>
                                <div class="MemberText">
                                	<input type="password" id="password" name="password" class="txt-input" />
                                </div>
                            </div>
                            
                             <div class="MemberAll">
                            	<div class="MemberName">&nbsp;</div>
                                <div class="MemberText">
                                	<input type="button" value="Đăng nhập" name="submit" onclick="return loginMember();" class="button-submit-edit button">
                                     <a class="link_register" href="<!--{$path_url}-->/thanh-vien/dang-ky/" >Bạn chưa có tài khoản?</a>
                                    <br /><br />
                                    <div class="field_btn" style="padding:0; color:#e5b540; display:none;" id="errromsg"></div>
                                </div>
                            </div>
							
  						</form>
                    </div>
    
				</div>	                
            </div>
       
	</div>
<!---End Content-->
<script language="javascript" type="text/javascript">
	function loginMember(){
		$("#errromsg").hide();
		var email = $('#email').val();
		var password = $('#password').val();
		if((email=="") || (password=="")){
			$("#errromsg").html('Vui lòng nhập đầy đủ thông tin, dấu (*) là bắt buộc nhập.');
			$("#errromsg").show();
			return false;
		}
		
		else{
			jQuery.post('<!--{$path_url}-->/loading/thanhvien.php',{
				type: 'login',
				email:email,
				password:password			
			},function(data) {
			 var obj = jQuery.parseJSON(data);
				if(obj.status == 'success'){
					alert('Bạn đã đăng nhập thành công.');
					$(location).attr('href','<!--{$path_url}-->/'); 
				}
				else{
					$("#errromsg").html(obj.errors);
					$("#errromsg").show();	
				}
			});
			return false;
		}
	}
</script>
