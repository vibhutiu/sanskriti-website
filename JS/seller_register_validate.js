function register_validate_seller()
{
	
    var email = document.register_form_seller.email.value;
	var email_pat = /^[a-z0-9._-]+[@][a-z]+[.][a-z]{2,3}([.][a-z]{2})*$/;
	
	if(!(email_pat.test(email)))
		{
			alert("Enter Valid Email ID");
			document.register_form_seller.email.focus();
			return false;
		}
    
    var phone_number = document.register_form_seller.phone_number.value;
	var phone_number_pat = /^[0-9]{10}$/;
	
	if (!(phone_number_pat.test(phone_number)))
		{
			alert("Enter Valid Mobile Number");
			document.register_form_seller.phone_number.focus();
			return false;
		}


	var password = document.register_form_seller.password.value;
	var password_pat = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

	if(!(password_pat.test(password)))
		{
			alert("Password Must Contain: \n\u2022Minimum 8 Characters \n\u2022A Lowercase \n\u2022A Uppercase \n\u2022A Special Character");
			document.register_form_seller.password.focus();
			return false;
		}

	var confirm_password = document.register_form_seller.confirm_password.value;
	
	if(password != confirm_password)
		{
			alert("Password Don't Match");
			document.register_form_seller.confirm_password.focus();
			return false;
		}
}