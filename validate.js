function formValidation() {
    var uid = document.getElementById('ph_no');
    var passid = document.getElementById('passid');
    var uname = document.getElementById('username');
    var uadd = document.getElementById('address');
    var ucountry = document.getElementById('country');
    var uzip = document.getElementById('zip');
    var uemail = document.getElementById('email');
    var umsex = document.getElementById('msex');
    var ufsex = document.getElementById('fsex');
    
    if (ph_no_validation(uid, 10, 12)) {
      if (passid_validation(passid, 7, 12)) {
        if (allLetter(uname)) {
          if (alphanumeric(uadd)) {
            if (countryselect(ucountry)) {
              if (allnumeric(uzip)) {
                if (ValidateEmail(uemail)) {
                  if (validsex(umsex, ufsex)) {
                    // return true;
                  }
                }
              }
            }
          }
        }
      }
    }
    return false;
  }
  
  function ph_no_validation(uid, mx, my) {
    var uid_len = uid.value.length;
    if (uid_len == 0 || uid_len >= my || uid_len < mx) {
      alert("Phone Number should be minimum of " + mx + " digits ");
      uid.focus();
      return false;
    }
    return true;
  }
  
  function passid_validation(passid, mx, my) {
    var passid_len = passid.value.length;
    if (passid_len == 0 || passid_len >= my || passid_len < mx) {
      alert("Password should not be empty / length be between " + mx + " to " + my);
      passid.focus();
      return false;
    }
    return true;
  }
  
  function allLetter(uname) {
    var letters = /^[A-Za-z]+$/;
    if (uname.value.match(letters)) {
      return true;
    } else {
      alert('Name must have alphabet characters only');
      uname.focus();
      return false;
    }
  }
  
  // function alphanumeric(uadd) {
  //   var letters = /^[0-9a-zA-Z]+$/;
  //   if (uadd.value.match(letters)) {
  //     return true;
  //   } else {
  //     alert('User address must have alphanumeric characters only');
  //     uadd.focus();
  //     return false;
  //   }
  // }
  
  function countryselect(ucountry) {
    if (ucountry.value == "Default") {
      alert('Select your country from the list');
      ucountry.focus();
      return false;
    } else {
      return true;
    }
  }
  
  function allnumeric(uzip) {
    var numbers = /^[0-9]+$/;
    if (uzip.value.match(numbers)) {
      return true;
    } else {
      alert('ZIP code must have numeric characters only');
      uzip.focus();
      return false;
    }
  }
  
  function ValidateEmail(uemail) {
    var mailformat = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(.\w{2,3})+$/;
    if (uemail.value.match(mailformat)) {
      return true;
    } else {
      alert("You have entered an invalid email address!");
      uemail.focus();
      return false;
    }
  }
  
  function validsex(umsex, ufsex) {
    if (umsex.checked || ufsex.checked) {
      alert('Form Successfully Submitted');
      window.location.reload();
      return true;
    } else {
      alert('Select Male/Female');
      umsex.focus();
      return false;
    }
  }
  