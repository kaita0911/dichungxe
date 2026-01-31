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
                    <div class="menu_users col-lg-2">
                        <div class="title_menu">
                            <span>Tài khoản của tôi</span>
                            <i>&nbsp;</i>
                        </div>
						<ul class="">
        	<li class="menu-item">
            	<a href="http://didongthongminh.vn/thong-tin-tai-khoan.html" class="logout exit">Thông tin tài khoản</a>
         	</li>
         	<li class="menu-item">
            	<a href="http://didongthongminh.vn/index.php?module=users&amp;task=address_book" class="">Sổ địa chỉ</a>
       		</li>
        	<li class="menu-item">
            	<a href="http://didongthongminh.vn/tinh-trang-don-hang.html" class="">Tình trạng đơn hàng</a>
            </li>
            <li class="menu-item">
            	<a href="http://didongthongminh.vn/lich-su-gia-dich.html" class="">Lịch sử giao dịch</a>
            </li>
            <li class="menu-item">
            	<a href="#">Lịch sử bảo hành</a>
            </li>
            <li class="menu-item">
            	<a href="http://didongthongminh.vn/index.php?module=users&amp;task=commemts">Danh sách bình luận</a>
            </li>
            <li class="menu-item">
           	 	<a href="http://didongthongminh.vn/yeu-thich.html" class="">Danh sách yêu thích</a>
          	</li>
            <li class="menu-item menu-item-last">
           		<a href="http://didongthongminh.vn/dang-xuat.html" class="logout exit">Thoát</a>
            </li>
        </ul>
					</div>
                    
					<div class="users_info col-lg-9">
						<h1><span>Chỉnh sửa thông tin các nhân</span></h1>
						<form name="form-user-edit" method="post" action="#" id="form-user-edit">
							<table width="100%" cellpadding="10" cellspacing="6" border="0">
								<tr>
                                    <td align="right" width="20%"><strong>Họ tên:</strong>&nbsp;<font color="red">*</font>&nbsp;&nbsp;</td>
                                    <td>
                                        <input type="text" value="<!--{$memberCar.name}-->" id="name" name="name" class="txt-input" />
                                    </td>
								</tr>
                                
                                <tr>
                                    <td align="right" width="20%"><strong>Điện thoại:</strong>&nbsp;&nbsp;</td>
                                    <td>
                                        <input type="text" value="<!--{$memberCar.phone}-->" id="phone" name="phone" class="txt-input" />
                                    </td>
								</tr>
                                
                                <tr>
                                    <td align="right"><b>Email:</b>&nbsp;<font color="red">*</font>&nbsp;&nbsp;</td>
                                    <td>
                                        <input type="text" value="<!--{$memberCar.email}-->" id="email" name="email" class="txt-input">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td align="right" width="20%"><strong>Địa chỉ:</strong>&nbsp;&nbsp;</td>
                                    <td>
                                        <input type="text" value="<!--{$memberCar.address}-->" id="address" name="address" class="txt-input" />
                                    </td>
								</tr>
                                
                                <tr>
                                    <td align="right"><b>Ngày sinh:</b>&nbsp;&nbsp;</td>
                                    <td id="td-wapper-birthday">
                                        <div class="select-box pull-left">
                                            <select name="birth_day">
                                                <option>Ngày</option>
                                                <option selected="" value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                            </select>
                                        </div>
                                        <div class="select-box pull-left">
                                            <select name="birth_month">
                                                <option>Tháng</option>
                                                <option selected="" value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                        </div>
                                        <div class="select-box pull-left">	
                                            <select name="birth_year">
                                                <option>Năm</option>
                                                <option value="2002">2002</option>
                                                <option value="2001">2001</option>
                                                <option value="2000">2000</option>
                                                <option value="1999">1999</option>
                                                <option value="1998">1998</option>
                                                <option value="1997">1997</option>
                                                <option value="1996">1996</option>
                                                <option value="1995">1995</option>
                                                <option value="1994">1994</option>
                                                <option value="1993">1993</option>
                                                <option value="1992">1992</option>
                                                <option value="1991">1991</option>
                                                <option value="1990">1990</option>
                                                <option value="1989">1989</option>
                                                <option value="1988">1988</option>
                                                <option value="1987">1987</option>
                                                <option value="1986">1986</option>
                                                <option value="1985">1985</option>
                                                <option value="1984">1984</option>
                                                <option value="1983">1983</option>
                                                <option value="1982">1982</option>
                                                <option value="1981">1981</option>
                                                <option value="1980">1980</option>
                                                <option value="1979">1979</option>
                                                <option value="1978">1978</option>
                                                <option value="1977">1977</option>
                                                <option value="1976">1976</option>
                                                <option value="1975">1975</option>
                                                <option value="1974">1974</option>
                                                <option value="1973">1973</option>
                                                <option value="1972">1972</option>
                                                <option value="1971">1971</option>
                                                <option selected="" value="1970">1970</option>
                                                <option value="1969">1969</option>
                                                <option value="1968">1968</option>
                                                <option value="1967">1967</option>
                                                <option value="1966">1966</option>
                                                <option value="1965">1965</option>
                                                <option value="1964">1964</option>
                                                <option value="1963">1963</option>
                                                <option value="1962">1962</option>
                                                <option value="1961">1961</option>
                                                <option value="1960">1960</option>
                                                <option value="1959">1959</option>
                                                <option value="1958">1958</option>
                                                <option value="1957">1957</option>
                                                <option value="1956">1956</option>
                                                <option value="1955">1955</option>
                                                <option value="1954">1954</option>
                                                <option value="1953">1953</option>
                                                <option value="1952">1952</option>
                                                <option value="1951">1951</option>
                                                <option value="1950">1950</option>
                                                <option value="1949">1949</option>
                                                <option value="1948">1948</option>
                                                <option value="1947">1947</option>
                                                <option value="1946">1946</option>
                                        </select>
                                        </div>
                                        <div class="clearfix"></div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td align="right"><b>Tỉnh/thành phố: </b>&nbsp;&nbsp;</td>
                                    <td>
                                        <div class="select-box2">
                                            <select id="district_id" name="district_id">
                                            	<option>Chọn tỉnh/thành phố</option>
												<option value="1473">Hà Nội</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td align="right"><b>Quận/huyện</b>&nbsp;&nbsp;</td>
                                    <td>
                                        <div class="select-box2">
                                            <select id="district_id" name="district_id">
                                                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td align="right"><b>Phường/Xã</b>&nbsp;&nbsp;</td>
                                    <td>
                                        <div class="select-box2">
                                            <select id="district_id" name="district_id">
                                                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td height="35">
                                        <input type="checkbox" id="edit_pass" name="edit_pass"> 
                                        <b><font color="#0066AB">Thay đổi mật khẩu</font></b>
                                    </td>
                                </tr>
                                <tr class="password_area" style="display: none;">
                                    <td align="right"><b>Nhập mật hiện tại</b>&nbsp;&nbsp;</td>
                                    <td>
                                        <input type="password" value="" id="old_password" name="old_password" class="txt-input">
                                    </td>
                                </tr>
                                <tr class="password_area" style="display: none;">
                                    <td align="right"><b>Mật khẩu mới</b>&nbsp;&nbsp;</td>
                                    <td>
                                        <input type="password" value="" id="password" name="password" class="txt-input">
                                    </td>
                                </tr>
                                <tr class="password_area" style="display: none;">
                                    <td align="right"><b>Xác nhận mật khẩu mới</b>&nbsp;&nbsp;</td>
                                    <td><input type="password" value="" id="re-password" name="re-password" class="txt-input"></td>
                                </tr>
                                
                                
                                <tr>
                                    <td>&nbsp;</td>
                                    <td class="button-submit-tr">
                                        <input type="submit" value="Lưu thông tin" name="submit" class="button-submit-edit button">
                                        <input type="reset" value="Nhập lại" name="reset" class="button-reset-edit button">
                                    </td>
                                </tr>
                                
                                <script type="text/javascript">
									//click_tab_detail(1);
									$(function(){
										$('.password_area').hide();
										$("#edit_pass").change(function() {
											var value = $(this).prop("checked") ? 'true' : 'false';     
											if(value =="true") {
												$('.password_area').show()
											} else {
												$('.password_area').hide()
											}
										});
									});
								</script>
						</table>
                        </form>
                    </div>
    
				</div>	                
            </div>
        </div><!-- end.row -->
	</div>
<!---End Content-->