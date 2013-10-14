<h1 class="login-head">Photo Gallery</h1>
<div class="login-box">
		<div class="login-heading"><strong>Login</strong></div>
        <div class="error-msg"><?php echo validation_errors(); ?></div>
		<?php echo form_open('verifylogin'); ?>
			<table cellpadding="10">
				<tr>
					<td>Username:</td>
					<td><input type="text" name="username" size="30"/></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="password" size="30"/></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td align="center">
						<input type="submit" name="submit" value="Sign In">
						<input type="reset" name="reset" value="Reset">
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center" class="login-links">
						<a href="user/forgot">Forgot Password?</a> &nbsp;&nbsp;&nbsp;&nbsp;
						New user? <a href="user/signup">Sign Up</a>
					</td>
				</tr>
			</table>
		</form>
	</div>


