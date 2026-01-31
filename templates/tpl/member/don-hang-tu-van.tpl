<!---Content-->
    <div class="breadcrumbs">
 		<div class="container">
 			<div class="row">
 				<div class="col-xs-12">		
                	<div class="breadcrumb">
                        <div class="breadcrumb flever_12">
                            <a title="Trang chủ" href="<!--{$path_url}-->">Trang chủ</a>
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
                                        <td align="center"><b>Mã ĐH</b></td>
                                        <td align="center"><b>Ngày</b></td>
                                        <td align="center"><b>Tên</b></td>
                                        <td align="center"><b>Thành Tiền</b></td>
                                        <td align="center"><b>Loại ĐH</b></td>
                                        <td align="center"><b>Xem CT</b></td>
                                    </tr>
                                </thead>
                                <tbody>
                                <!--{section name=i loop=$view}-->
                                    <tr>
                                        <td align="center"> 
                                            <span> <!--{$view[i].id}--></span>
                                        </td>
                                        
                                        <td align="center"> 
                                            <span> <!--{$view[i].dated|date_format:"%d-%m-%Y"}--></span>
                                        </td>
                                        
                                        <td align="center"> 
                                            <span> <!--{$view[i].name}--></span>
                                        </td>
                                        
                                        <td align="center"> 
                                             <span> <!--{$view[i].total|number_format:0:".":","}--></span>
                                        </td>
                                        
                                        <td align="center"> 
                                             <span> 
                                             	<!--{if $view[i].type eq 1}-->
                                                    Trả góp
                                                <!--{else}-->
                                                    Mua
                                                 <!--{/if}--> 
                                             </span>
                                        </td>
                                        <td align="center"> 
                                 			<a href="javascript:void(0)" onclick="window.open('<!--{$path_url}-->/OrderDetail.php?id=<!--{$view[i].id}-->','mywindow','width=850,height=700,scrollbars=yes')" title="View"> View</a>
                                        </td>
                                        
                                    </tr>
                                <!--{/section}-->  
                                	 <tr height="30">
                                     	<td align="right" colspan="6">
                                        	<div style="margin-right:20px;"> 
                                            	Tổng Thành Tiền: <span style="color:#ed1b24"> <!--{$thanhtien|number_format:0:".":","}--> vnđ</span>  
                                            </div>
                                        </td>
                                     </tr>                                                
                                </tbody>
                                
                            </table>	
                        </div>
			
                        
                    </div>
    
				</div>	                
            </div>
        </div><!-- end.row -->
	</div>
<!---End Content-->