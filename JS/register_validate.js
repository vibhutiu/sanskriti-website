function register_validate()
{
	var fullname = document.register_form.fullname.value;
	var fullname_pat = /^[a-zA-Z ]+$/;

	if(!(fullname_pat.test(fullname)))
		{
			alert("Enter Valid Name");
			document.register_form.fullname.focus();
			return false;
		}
    
    var email = document.register_form.email.value;
	var email_pat = /^[a-z0-9._-]+[@][a-z]+[.][a-z]{2,3}([.][a-z]{2})*$/;
	
	if(!(email_pat.test(email)))
		{
			alert("Enter Valid Email ID");
			document.register_form.email.focus();
			return false;
		}


	var phone_number = document.register_form.phone_number.value;
	var phone_number_pat = /^[0-9]{10}$/;
	
	if (!(phone_number_pat.test(phone_number)))
		{
			alert("Enter Valid Mobile Number");
			document.register_form.phone_number.focus();
			return false;
		}

	
	var password = document.register_form.password.value;
	var password_pat = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

	if(!(password_pat.test(password)))
		{
			alert("Password Must Contain: \n\u2022Minimum 8 Characters \n\u2022A Lowercase \n\u2022A Uppercase \n\u2022A Special Character");
			document.register_form.password.focus();
			return false;
		}

	var confirm_password = document.register_form.confirm_password.value;
	
	if(password != confirm_password)
		{
			alert("Password Don't Match");
			document.register_form.confirm_password.focus();
			return false;
		}
}