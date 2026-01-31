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
						<h1><span>Chỉnh sửa thông tin các nhân</span></h1>
						<form name="form-user-edit" method="post" action="" id="form-user-edit" onsubmit="return myFunction();">
                        	<div class="MemberAll">
                            	<div class="MemberName"> 
                                	<strong>Họ và tên của bạn</strong>&nbsp;<font color="red">*</font> 
                                </div>
                                <div class="MemberText">
                                	<input type="text" value="<!--{$memberCar.name}-->" id="name" name="name" class="txt-input" />
                                </div>
                            </div>
                            
                            <div class="MemberAll">
                            	<div class="MemberName"> 
                                	<strong>Điện thoại</strong>
                                </div>
                                <div class="MemberText">
                                	<input type="text" value="<!--{$memberCar.phone}-->" id="phone" name="phone" class="txt-input" />
                                </div>
                            </div>
                            
                            <div class="MemberAll">
                            	<div class="MemberName"> 
                                	<strong>Email</strong>
                                </div>
                                <div class="MemberText">
                                	 <input type="text" value="<!--{$memberCar.email}-->" id="email" name="email" class="txt-input" />
                                </div>
                            </div>
                            
                            <div class="MemberAll">
                            	<div class="MemberName"> 
                                	<strong>Địa chỉ</strong>
                                </div>
                                <div class="MemberText">
                                	 <input type="text" value="<!--{$memberCar.address}-->" id="address" name="address" class="txt-input" />
                                </div>
                            </div>
                            
                            <div class="MemberAll">
                            	<div class="MemberName"> 
                                	<strong>Ngày sinh</strong>
                                </div>
                                <div class="MemberText">
                                    <div class="select-box pull-left">
                                        <select name="birth_day">
                                            <option>Ngày</option>
                                            <!--{section name=i start=1 loop = 32}-->
                                                <option <!--{if $memberCar.day eq $smarty.section.i.index}-->selected="selected"<!--{/if}--> value="<!--{$smarty.section.i.index}-->"> <!--{$smarty.section.i.index}--> </option>
                                            <!--{/section}-->
                                        </select>
                                    </div>
                                    <div class="select-box pull-left">
                                        <select name="birth_month">
                                            <option>Tháng</option>
                                            <!--{section name=i start=1 loop = 13}-->
                                                <option <!--{if $memberCar.month eq $smarty.section.i.index}-->selected="selected"<!--{/if}--> value="<!--{$smarty.section.i.index}-->"> <!--{$smarty.section.i.index}--> </option>
                                              <!--{/section}-->
                                        </select>
                                    </div>
                                    <div class="select-box pull-left">	
                                        <select name="birth_year">
                                            <option>năm</option>
                                            <!--{section name=i start=1950 loop=$yearView}-->
                                                <option <!--{if $memberCar.year eq $smarty.section.i.index}-->selected="selected"<!--{/if}--> value="<!--{$smarty.section.i.index}-->" > <!--{$smarty.section.i.index}--> </option>
                                              <!--{/section}-->
                                    </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="MemberAll">
                            	<div class="MemberName"> 
                                	<strong>Tỉnh/thành phố</strong>
                                </div>
                                <div class="MemberText">
                                	 <div class="select-box2">
                                        <select  name="tinhthanh" id="tinhthanh" class="ChosceDd" onchange="loadQuanHuyen(this.value)">
                                            <option value="">Tỉnh/thành phố</option>
                                            <!--{section name=i loop=$tinhthanh}-->
                                                <option <!--{if $memberCar.tinhthanh eq $tinhthanh[i].id}-->selected="selected"<!--{/if}--> value="<!--{$tinhthanh[i].id}-->"> 
                                                    <!--{$tinhthanh[i].name}--> 
                                                </option>
                                            <!--{/section}-->
                                        </select>
                                    </div>

                                </div>
                             </div>
                            
                            <div class="MemberAll">
                            	<div class="MemberName"> 
                                	<strong>Quận/huyện</strong>
                                </div>
                                <div class="MemberText">
                                	 <div class="select-box2" id="showQuanHuyen">
                                        <select name="quanhuyen" id="quanhuyen" class="ChosceDd">
                                        </select>
                                    </div>
                                </div>
                             </div>
                             
                             <div class="MemberAll">
                            	<div class="MemberName"> 
                                	<strong>Phường/Xã</strong>
                                </div>
                                <div class="MemberText">
                                	 <div class="select-box2" id="showPhuongXa">
                                        <select name="phuongxa" id="phuongxa" class="ChosceDd">
                                        </select>
                                    </div>
                                </div>
                             </div>
                             
                             <div class="MemberAll">
                            	<div class="MemberName">&nbsp;</div>
                                <div class="MemberText">
                                	<input type="submit" value="Lưu thông tin" name="submit"  onsun class="button-submit-edit button">
                                    <input type="reset" value="Nhập lại" name="reset" class="button-reset-edit button">
                                    <br /><br />
                                    <div class="field_btn" style="padding:0; color:#ed1b24; display:none;" id="errromsg"></div>
                                </div>
                            </div>
                            
                                
							<script type="text/javascript">
                                
                                function myFunction(){
                                    $("#errromsg").hide();
                                    var name = $("#name").val();
                                    var email = $("#email").val();
                                    var r = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                                    if(name==""){
                                        $("#errromsg").html('Bạn phải nhập vào họ tên.');
                                        $("#errromsg").show();
                                        return false;
                                    }
                                    else if(r.test(email)==false){
                                        $("#errromsg").html('Email không đúng định dạng.');
                                        $("#errromsg").show();
                                        return false;
                                    }
                                    else
                                        return true; 
                                }
                                
                                function buynow(){
                                
                                } 
                                function loadQuanHuyen(id,idq){
                                    jQuery.post('<!--{$path_url}-->/loading/loadQuanHuyen.php',{id:id,idq:idq,type:'add'},function(data) {
                                         var obj = jQuery.parseJSON(data);
                                         $('#showQuanHuyen').html(obj.status);
                                         // $('#phiship').html(obj.ship);
                                         
                                    });
                                    return false;
                                }
                                function loadPhuongXa(id,idx){
                                    jQuery.post('<!--{$path_url}-->/loading/loadPhuongXa.php',{id:id,idx:idx,type:'add'},function(data) {
                                     var obj = jQuery.parseJSON(data);
                                     $('#showPhuongXa').html(obj.status);
                                    // $('#phiship').html(obj.ship);
                                         
                                    });
                                    return false;
                                }
                                
                                jQuery(document).ready(function() {
                                    <!--{if $memberCar.quanhuyen neq ''}-->
                                        loadQuanHuyen(<!--{$memberCar.tinhthanh}-->,<!--{$memberCar.quanhuyen}-->)
                                    <!--{/if}-->
                                    
                                    <!--{if $memberCar.phuongxa neq ''}-->
                                        loadPhuongXa(<!--{$memberCar.quanhuyen}-->,<!--{$memberCar.phuongxa}-->)
                                    <!--{/if}-->
                                });	
                            </script>

                        </form>
                    </div>
    
				</div>	                
            </div>
        </div><!-- end.row -->
	</div>
<!---End Content-->