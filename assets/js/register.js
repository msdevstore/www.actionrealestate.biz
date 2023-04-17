/**
 * Summary. Read Register's page form, email and passwords fields 
 *          and check if they are equal each other before post
 *          to server
 * 
 * @return {type} Return false if they do not much each other
 */
function validateForm() {
    var pass1 = document.forms["register-form"]["register-pwd1"].value;
    var pass2 = document.forms["register-form"]["register-pwd2"].value;

    if (pass1 !== pass2) {
        alert("Passwords must match");
        return false;
    }

    return true;
  } 