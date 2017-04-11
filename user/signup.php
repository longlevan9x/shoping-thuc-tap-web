<div class="intro-section">
        <div class="container">
        	<h2></h2>
			<div class="col-xs-6 col-sm-6 col-md-offset-3 col-md-6 col-lg-6">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title text-center" style="font-size: 20px;">Đăng ký</h3>
					</div>
					<div class="panel-body">
						<form action="user/user.php" method="POST" role="form">
							<div class="form-group">
								<label for="">Tên tài khoản</label>
								<input type="text" class="form-control" minlength="6" maxlength="50" name="txtUsername" required="required" id="txtUsername" placeholder="Tên tài khoản">
							</div>
							<div class="form-group">
								<label for="">Họ tên</label>
								<input type="text" class="form-control" minlength="6" maxlength="50" name="txtFullname" required="required" id="txtFullname" placeholder="Họ tên">
							</div>
							<div class="form-group">
								<label for="">Mật khẩu</label>
								<input type="password" class="form-control" minlength="6" maxlength="50" name="txtPassword" required="required" id="txtPassword" placeholder="Mật khẩu">
							</div>
							<div class="form-group">
								<label for="">Mật khẩu nhập lại</label>
								<input type="password" class="form-control" minlength="6" maxlength="50" name="txtRepass" required="required" id="txtRepass" placeholder="Mật khẩu nhập lại">
							</div>
							<div class="form-group">
								<label for="">Email</label>
								<input type="email" class="form-control" name="txtEmail" required="required" id="txtEmail" placeholder="Email">
							</div>
							<div class="form-group">
								<label for="">Số điện thoại</label>
								<input type="text" class="form-control" minlength="10" maxlength="11" name="txtPhone" required="required" id="txtPhone" placeholder="Số điện thoại">
							</div>
							<div class="form-group">
								<label for="">Giới tính</label>
								<input type="radio" value="0" name="txtGender" required="required" id="txtGender" placeholder="Tên tài khoản"> Nam
								<input type="radio" value="1" name="txtGender" required="required" id="txtGender" placeholder="Tên tài khoản"> Nữ
							</div>
							<button type="submit" name="btnSignup" class="btn btn-primary">Đăng ký</button>
						</form>
					</div>
				</div>
			</div>
        </div>
    </div>



