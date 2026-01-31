<!---Content-->
    <div class="breadcrumbs">
 		<div class="container">
 			<div class="row">
 				<div class="col-xs-12">		
                	<div class="breadcrumb">
                        <div class="breadcrumb flever_12">
                            <a title="Trang chủ" href="<!--{$path_url}-->/">Trang chủ</a>
                        </div>
                        <div class="breadcrumbs_sepa">&gt;</div>
                        
                        <div class="breadcrumb">
                            <span><!--{$seo.title}--></span>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container mt20">
		<div class="row">
       		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-column">	  
                <div class="row">
                    <!--{include file="member-left.tpl"}-->
                    
					<div class="users_info col-lg-9">
						<h1><span>Thay đổi mật khẩu</span></h1>
						<form name="dangnhap" >
                        	<div class="MemberAll">
                            	<div class="MemberName"> 
                                	<strong>Nhập mật hiện tại</strong>&nbsp;<font color="red">*</font> 
                                </div>
                                <div class="MemberText">
                                	<input type="password" id="passwordold" name="passwordold" class="txt-input" />
                                </div>
                            </div>
                            
                            <div class="MemberAll">
                            	<div class="MemberName"> 
                                	<strong>Mật khẩu mới</strong>&nbsp;<font color="red">*</font> 
                                </div>
                                <div class="MemberText">
                                	<input type="password" value="" id="password" name="password" class="txt-input" />
                                </div>
                            </div>
                            
                            
                            <div class="MemberAll">
                            	<div class="MemberName"> 
                                	<strong>Xác nhận mật khẩu mới</strong>&nbsp;<font color="red">*</font> 
                                </div>
                                <div class="MemberText">
                                	<input type="password" value="" id="cfpassword" name="cfpassword" class="txt-input" />
                                </div>
                            </div>
                            
                             <div class="MemberAll">
                            	<div class="MemberName">&nbsp;</div>
                                <div class="MemberText">
                                	<input type="button" value="Lưu thông tin" name="submit" onclick="return changePw();" class="button-submit-edit button">
                                    <input type="reset" value="Nhập lại" name="reset" class="button-reset-edit button">
                                    <br /><br />
                                    <div class="field_btn" style="padding:0; color:#ed1b24; display:none;" id="errromsg"></div>
                                </div>
                            </div>
  						</form>
							
  
                    </div>
    
				</div>	                
            </div>
        </div><!-- end.row -->
	</div>
<!---End Content-->


<script language="javascript" type="text/javascript">
	function changePw(){
		$("#errromsg").hide();
		var passwordold = $('#passwordold').val();
		var password = $('#password').val();
		var cfpassword = $('#cfpassword').val();
		if((passwordold=="") || (password=="")){
			//alert( "Vui lòng nhập tên miền cần chuyển đổi nhà cung cấp." );
			$("#errromsg").html('Vui lòng nhập đầy đủ thông tin, dấu (*) là bắt buộc nhập.');
			$("#errromsg").show();
			return false;
		}
		else if(password != cfpassword){
			$("#errromsg").html('Xác nhận mật khẩu không đúng.');
			$("#errromsg").show();
		}
		else{
			jQuery.post('<!--{$path_url}-->/loading/thanhvien.php',{
				type: 'changepw',
				passwordold:passwordold,
				password:password					
			},function(data) {
			 var obj = jQuery.parseJSON(data);
				if(obj.status == 'success'){
					alert('Bạn đã thay đổi mật khẩu thành công.');
					location.reload();
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