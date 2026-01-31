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
						<h1><span><!--{$seo.title}--></span></h1>
                        
                        <div class="form_user_footer_body">
                            <table width="100%" cellspacing="0" cellpadding="6" bordercolor="#DDDDDD" border="1">
                                <thead>
                                    <tr class="head-tr" height="30">
                                        <td align="center"><b>Sản phẩm</b></td>
                                        <td align="center"><b>Ngày</b></td>
                                        <td align="center"><b>Mua hàng</b></td>
                                        <td align="center"><b>Xóa</b></td>
                                    </tr>
                                </thead>
                                <tbody>
                                <!--{section name=i loop=$view}-->
                                    <tr>
                                        <td> 
                                            <a class="pull-left" href="<!--{$path_url}-->/<!--{$view[i].unique_key}-->.html" title="<!--{$view[i].title_link}-->">
                                                <img align="center" style="margin: 5px;" width="80" class="img-responsive" src="<!--{$path_url}-->/<!--{$view[i].img_thumb_vn}-->" alt="<!--{$view[i].alt_img}-->" title="<!--{$newsHome1[i].title_img}-->" />
                                           </a>
                                            <div class="media-body product-like">
                                                <h4 class="media-heading">
                                                	<a href="<!--{$path_url}-->/<!--{$view[i].unique_key}-->.html" title="<!--{$view[i].title_link}-->">
                                                       <!--{$view[i].$name}-->
                                                    </a> 
                                                    
                                                </h4>
                                                <p class="price"><span class="red"><!--{$view[i].$price|number_format:0:",":"."}--> VNĐ </span></p>
                                            </div>	
                                        </td>
                                        
                                        <td align="center"> 
                                            <span> <!--{$view[i].dated|date_format:"%d-%m-%Y"}--></span>
                                        </td>
                                        <td align="center"> 
                                            <a href="<!--{$path_url}-->/<!--{$view[i].unique_key}-->.html" class="btn  btn-buy-like">&nbsp;</a>
                                        </td>
                                        <td align="center" class="remove-fav">
                                            <a href="javascript:void(0)" onclick="dellike(<!--{$view[i].idsp}-->)">
                                                <img alt="del" src="<!--{$path_url}-->/images/delete.png">
                                            </a>
                                            <script type="text/javascript">
												function dellike(id){
													var answer = confirm("Bạn chắc chắn muốn xóa?");
													if (answer)
													{
														$.post('<!--{$path_url}-->/loading/thanhvien.php',{
															type: 'dellike',
															id:id		
														},function(data) {
														 var obj = jQuery.parseJSON(data);
															if(obj.status == 'success'){
																alert('Xóa thành công sản phẩm yêu thích.');
																location.reload();
															}
														});
													}
												}
											</script>
                                        </td>
                                    </tr>
                                <!--{/section}-->                                                  
                                </tbody>
                                
                            </table>	
                        </div>
			
                        
                    </div>
    
				</div>	                
            </div>
        </div><!-- end.row -->
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
					$(location).attr('href','<!--{$path_url}-->/thanh-vien/thong-tin-tai-khoan/'); 
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
