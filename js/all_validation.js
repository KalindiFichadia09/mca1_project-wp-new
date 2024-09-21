let validate = true;

// Function to reset the validation state
function resetValidation() {
  validate = true;
}

// Fullname validation
function nameValidate(fullName, fullNameMsg) {
  if (fullName.value === "") {
    fullNameMsg.innerHTML = "Required !";
    fullNameMsg.style.color = "red";
    validate = false;
  } else {
    let fullNameReg = /^[A-Za-z\s]{3,100}$/;
    if (fullNameReg.test(fullName.value)) {
      fullNameMsg.innerHTML = "";
    } else {
      fullNameMsg.innerHTML = "Invalid- length should be 3 to 100";
      fullNameMsg.style.color = "red";
      validate = false;
    }
  }
}

//Email Validation
function emailValidate(email, emailMsg) {
  if (email.value === "") {
    emailMsg.innerHTML = "Required !";
    emailMsg.style.color = "red";
    validate = false;
  } else {
    let emailReg = /^[A-Za-z0-9._-]+@[A-Za-z]+\.[A-Za-z]{2,3}$/;
    if (emailReg.test(email.value)) {
      emailMsg.innerHTML = "";
    } else {
      emailMsg.innerHTML = "Invalid email format";
      emailMsg.style.color = "red";
      validate = false;
    }
  }
}

// Mobile validation
function mobileValidate(mobile, mobileMsg) {
  if (mobile.value === "") {
    mobileMsg.innerHTML = "Required !";
    mobileMsg.style.color = "red";
    validate = false;
  } else {
    let mobileReg = /^(?:\+?\d{1,3})?[-.\s]?\d{10}$/;
    if (mobileReg.test(mobile.value)) {
      mobileMsg.innerHTML = "";
    } else {
      mobileMsg.innerHTML = "Invalid - length should be 10";
      mobileMsg.style.color = "red";
      validate = false;
    }
  }
}

//Address validation
function addressValidate(address, addressMsg) {
  if (address.value === "") {
    addressMsg.innerHTML = "Required !";
    addressMsg.style.color = "red";
    validate = false;
  } else {
    let addressReg = /^[A-Za-z0-9\s]{10,250}$/;
    if (addressReg.test(address.value)) {
      addressMsg.innerHTML = "";
    } else {
      addressMsg.innerHTML = "Invalid - length should be 10 to 250";
      addressMsg.style.color = "red";
      validate = false;
    }
  }
}

// City, State, Country validation
function cscValidate(csc, cscMsg) {
  if (csc.value === "") {
    cscMsg.innerHTML = "Required !";
    cscMsg.style.color = "red";
    validate = false;
  } else {
    let cscReg = /^[A-Za-z\s]{3,25}$/;
    if (cscReg.test(csc.value)) {
      cscMsg.innerHTML = "";
    } else {
      cscMsg.innerHTML = "Invalid - length should be 3 to 25";
      cscMsg.style.color = "red";
      validate = false;
    }
  }
}

// Pincode validation
function pincodeValidate(pincode, pincodeMsg) {
  if (pincode.value === "") {
    pincodeMsg.innerHTML = "Required !";
    pincodeMsg.style.color = "red";
    validate = false;
  } else {
    let pincodeReg = /^[0-9]{6}$/;
    if (pincodeReg.test(pincode.value)) {
      pincodeMsg.innerHTML = "";
    } else {
      pincodeMsg.innerHTML =
        "Invalid - length should be 6 and only allowed numbers";
      pincodeMsg.style.color = "red";
      validate = false;
    }
  }
}

//Password Validation
function passwordValidate(password, passwordMsg) {
  if (password.value === "") {
    passwordMsg.innerHTML = "Enter Password";
    passwordMsg.style.color = "red";
    validate = false;
  } else {
    let passwordReg =
      /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,10}$/;
    if (passwordReg.test(password.value)) {
      passwordMsg.innerHTML = "";
    } else {
      passwordMsg.innerHTML =
        "Password must be 8 to 10 characters long, contain an uppercase letter, a lowercase letter, a number, and a special character.";
      passwordMsg.style.color = "red";
      validate = false;
    }
  }
}

// Confirm password validation
function confirmPasswordValidate(confirmPassword, confirmPasswordMsg) {
  if (confirmPassword.value === "") {
    confirmPasswordMsg.innerHTML = "Enter Confirm Password";
    confirmPasswordMsg.style.color = "red";
    validate = false;
  } else {
    if (password.value === confirmPassword.value) {
      confirmPasswordMsg.innerHTML = "";
    } else {
      confirmPasswordMsg.innerHTML =
        "Password and confirm password do not match.";
      confirmPasswordMsg.style.color = "red";
      validate = false;
    }
  }
}

// Gender validation
function genderValidate(gender, genderMsg) {
  let selectedGender = false;
  for (let i = 0; i < gender.length; i++) {
    if (gender[i].checked) {
      selectedGender = true;
      break;
    }
  }

  if (selectedGender) {
    genderMsg.innerHTML = "";
  } else {
    genderMsg.innerHTML = "Please select a gender!";
    genderMsg.style.color = "red";
    validate = false;
  }
}

// Dropdown validation
function dropdownValidate(dropdown, dropdownMsg) {
  if (dropdown.value === "none") {
    dropdownMsg.innerHTML = "Select a valid option!";
    dropdownMsg.style.color = "red";
    validate = false;
  } else {
    dropdownMsg.innerHTML = "";
  }
}

// File validation
function fileValidate(fileInput, fileMsg) {
  if (!fileInput.files.length) {
    fileMsg.innerHTML = "Required!";
    fileMsg.style.color = "red";
    validate = false;
  } else {
    let file = fileInput.files[0];
    let allowedTypes = ["image/jpeg", "image/png", "image/jpg"];

    // Validate file type
    if (!allowedTypes.includes(file.type)) {
      fileMsg.innerHTML = "File type should be .jpeg, .jpg, or .png";
      fileMsg.style.color = "red";
      validate = false;
    } else {
      fileMsg.innerHTML = "";
    }

    // Validate file size
    let maxSize = 2 * 1024 * 1024; // 2MB in bytes
    if (file.size > maxSize) {
      fileMsg.innerHTML = "File size exceeds 2MB limit.";
      fileMsg.style.color = "red";
      validate = false;
    } else if (validate) {
      fileMsg.innerHTML = "";
    }
  }
}

//Price & weight Validation
function pwValidate(price, priceMsg) {
  if (price.value === "") {
    priceMsg.innerHTML = "Required !";
    priceMsg.style.color = "red";
    validate = false;
  } else {
    let priceReg = /^\d+(\.\d{1,2})?$/;
    if (priceReg.test(price.value)) {
      priceMsg.innerHTML = "";
    } else {
      priceMsg.innerHTML = "Enter a valid value (e.g., 12.99)";
      priceMsg.style.color = "red";
      validate = false;
    }
  }
}

//number validation
function numberValidate(number, numberMsg) {
  if (number.value === "") {
    numberMsg.innerHTML = "Required !";
    numberMsg.style.color = "red";
    validate = false;
  } else {
    let numberReg = /^\d+$/;
    if (numberReg.test(number.value)) {
      numberMsg.innerHTML = "";
    } else {
      numberMsg.innerHTML = "Enter a valid value (e.g., 1, 2, etc.)";
      numberMsg.style.color = "red";
      validate = false;
    }
  }
}

// code validation
function codeValidate(code, codeMsg) {
  if (code.value === "") {
    codeMsg.innerHTML = "Required !";
    codeMsg.style.color = "red";
    validate = false;
  } else {
    let codeReg = /^[A-Z]{1}\d+$/;
    if (codeReg.test(code.value)) {
      codeMsg.innerHTML = "";
    } else {
      codeMsg.innerHTML = "Enter a valid code (e.g., PRO123, CAT123)";
      codeMsg.style.color = "red";
      validate = false;
    }
  }
}

// User Insert Validation (admin) / signup validation(user)
function userInsertValidation() {
  resetValidation();
  nameValidate(
    document.querySelector("#fullName"),
    document.querySelector("#fullNameMsg")
  );
  genderValidate(
    document.querySelectorAll('input[name="gender"]'),
    document.querySelector("#genderMsg")
  );
  emailValidate(
    document.querySelector("#email"),
    document.querySelector("#emailMsg")
  );
  mobileValidate(
    document.querySelector("#mobile"),
    document.querySelector("#mobileMsg")
  );
  addressValidate(
    document.querySelector("#address"),
    document.querySelector("#addressMsg")
  );
  cscValidate(
    document.querySelector("#city"),
    document.querySelector("#cityMsg")
  );
  cscValidate(
    document.querySelector("#state"),
    document.querySelector("#stateMsg")
  );
  pincodeValidate(
    document.querySelector("#pincode"),
    document.querySelector("#pincodeMsg")
  );
  fileValidate(
    document.querySelector("#profilePhoto"),
    document.querySelector("#profilePhotoMsg")
  );
  passwordValidate(
    document.querySelector("#password"),
    document.querySelector("#passwordMsg")
  );
  confirmPasswordValidate(
    document.querySelector("#confirmPassword"),
    document.querySelector("#confirmPasswordMsg")
  );

  return validate;
}

// User Update Validation (admin)
function userUpdateValidation(form) {
  resetValidation();
  nameValidate(
    form.querySelector(".fullNameU"),
    form.querySelector(".fullNameMsgU")
  );
  genderValidate(
    form.querySelectorAll('input[name="genderU"]'),
    form.querySelector(".genderMsgU")
  );
  emailValidate(
    form.querySelector(".emailU"),
    form.querySelector(".emailMsgU")
  );
  mobileValidate(
    form.querySelector(".mobileU"),
    form.querySelector(".mobileMsgU")
  );
  addressValidate(
    form.querySelector(".addressU"),
    form.querySelector(".addressMsgU")
  );
  cscValidate(form.querySelector(".cityU"), form.querySelector(".cityMsgU"));
  cscValidate(form.querySelector(".stateU"), form.querySelector(".stateMsgU"));
  pincodeValidate(
    form.querySelector(".pincodeU"),
    form.querySelector(".pincodeMsgU")
  );
  fileValidate(
    form.querySelector(".profilePhotoU"),
    form.querySelector(".profilePhotoUMsg")
  );
  passwordValidate(
    form.querySelector(".passwordU"),
    form.querySelector(".passwordMsgU")
  );
  confirmPasswordValidate(
    form.querySelector(".confirmPasswordU"),
    form.querySelector(".confirmPasswordMsgU")
  );

  return validate;
}

//category Insert Validation (admin)
function categoryInsertValidation() {
  resetValidation();
  nameValidate(
    document.querySelector("#categoryName"),
    document.querySelector("#categoryNameMsg")
  );
  genderValidate(
    document.querySelectorAll('input[name="c_gender"]'),
    document.querySelector("#categoryGenderMsg")
  );
  fileValidate(
    document.querySelector("#categoryImage"),
    document.querySelector("#categoryImageMsg")
  );

  return validate;
}

//category update Validation (admin)
function categoryUpdateValidation(form) {
  resetValidation();
  nameValidate(
    form.querySelector("#categoryNameU"),
    form.querySelector("#categoryNameMsgU")
  );
  genderValidate(
    form.querySelectorAll('input[name="category_genderU"]'),
    form.querySelector("#categoryGenderMsgU")
  );
  fileValidate(
    form.querySelector("#categoryImageU"),
    form.querySelector("#categoryImageMsgU")
  );
  return validate;
}

//product Insert Validation (admin)
function productInsertValidation() {
  resetValidation();
  nameValidate(
    document.querySelector("#productName"),
    document.querySelector("#productNameMsg")
  );
  dropdownValidate(
    document.querySelector("#productType"),
    document.querySelector("#productTypeMsg")
  );
  numberValidate(
    document.querySelector("#stock"),
    document.querySelector("#stockMsg")
  );
  codeValidate(
    document.querySelector("#productCategoryCode"),
    document.querySelector("#productCategoryCodeMsg")
  );
  pwValidate(
    document.querySelector("#grossWeight"),
    document.querySelector("#grossWeightMsg")
  );
  pwValidate(
    document.querySelector("#diamondWeight"),
    document.querySelector("#diamondWeightMsg")
  );
  pwValidate(
    document.querySelector("#overheadCharges"),
    document.querySelector("#overheadChargesMsg")
  );
  numberValidate(
    document.querySelector("#diamondPieces"),
    document.querySelector("#diamondPiecesMsg")
  );
  dropdownValidate(
    document.querySelector("#purity"),
    document.querySelector("#purityMsg")
  );
  nameValidate(
    document.querySelector("#diamondColor"),
    document.querySelector("#diamondColorMsg")
  );
  fileValidate(
    document.querySelector("#productImage"),
    document.querySelector("#productImageMsg")
  );

  return validate;
}

// product update validation (admin)
function productUpdateValidation(form) {
  resetValidation();
  nameValidate(
    form.querySelector("#productNameU"),
    form.querySelector("#productNameMsgU")
  );
  dropdownValidate(
    form.querySelector("#productTypeU"),
    form.querySelector("#productTypeMsgU")
  );
  numberValidate(
    form.querySelector("#stockU"),
    form.querySelector("#stockMsgU")
  );
  codeValidate(
    form.querySelector("#productCategoryCodeU"),
    form.querySelector("#productCategoryCodeMsgU")
  );
  pwValidate(
    form.querySelector("#grossWeightU"),
    form.querySelector("#grossWeightMsgU")
  );
  pwValidate(
    form.querySelector("#diamondWeightU"),
    form.querySelector("#diamondWeightMsgU")
  );
  pwValidate(
    form.querySelector("#overheadChargesU"),
    form.querySelector("#overheadChargesMsgU")
  );
  numberValidate(
    form.querySelector("#diamondPiecesU"),
    form.querySelector("#diamondPiecesMsgU")
  );
  dropdownValidate(
    form.querySelector("#purityU"),
    form.querySelector("#purityMsgU")
  );
  nameValidate(
    form.querySelector("#diamondColorU"),
    form.querySelector("#diamondColorMsgU")
  );
  fileValidate(
    form.querySelector("#productImageU"),
    form.querySelector("#productImageMsgU")
  );
  return validate;
}

// order insert validation (admin)
function orderInsertValidation() {
  resetValidation();
  codeValidate(
    document.querySelector("#productId"),
    document.querySelector("#productIdMsg")
  );
  nameValidate(
    document.querySelector("#fullName"),
    document.querySelector("#fullNameMsg")
  );
  emailValidate(
    document.querySelector("#email"),
    document.querySelector("#emailMsg")
  );
  mobileValidate(
    document.querySelector("#mobile"),
    document.querySelector("#mobileMsg")
  );
  addressValidate(
    document.querySelector("#address"),
    document.querySelector("#addressMsg")
  );
  cscValidate(
    document.querySelector("#city"),
    document.querySelector("#cityMsg")
  );
  cscValidate(
    document.querySelector("#state"),
    document.querySelector("#stateMsg")
  );
  pincodeValidate(
    document.querySelector("#pincode"),
    document.querySelector("#pincodeMsg")
  );

  return validate;
}

// order update validation (admin)
function orderUpdateValidation(form) {
  resetValidation();
  codeValidate(
    form.querySelector("#productIdU"),
    form.querySelector("#productIdMsgU")
  );
  nameValidate(
    form.querySelector("#fullNameU"),
    form.querySelector("#fullNameMsgU")
  );
  emailValidate(
    form.querySelector("#emailU"),
    form.querySelector("#emailMsgU")
  );
  mobileValidate(
    form.querySelector("#mobileU"),
    form.querySelector("#mobileMsgU")
  );
  addressValidate(
    form.querySelector("#addressU"),
    form.querySelector("#addressMsgU")
  );
  cscValidate(form.querySelector("#cityU"), form.querySelector("#cityMsgU"));
  cscValidate(form.querySelector("#stateU"), form.querySelector("#stateMsgU"));
  pincodeValidate(
    form.querySelector("#pincodeU"),
    form.querySelector("#pincodeMsgU")
  );

  return validate;
}

// image carousel validation (admin)
function carouselValidation() {
  resetValidation();

  nameValidate(
    document.querySelector("#imageName"),
    document.querySelector("#imageNameMsg")
  );
  genderValidate(
    document.querySelectorAll('input[name="imagestatus"]'),
    document.querySelector("#statusMsg")
  );
  fileValidate(
    document.querySelector("#image"),
    document.querySelector("#imageMsg")
  );

  return validate;
}

// signin validation (user)
function signin_validation() {
  resetValidation();
  emailValidate(
    document.querySelector("#eml"),
    document.querySelector("#eml_msg")
  );
  passwordValidate(
    document.querySelector("#pwd"),
    document.querySelector("#pwd_msg")
  );

  return validate;
}

//Forgot password validation
function forgotPassword_validation() {
  resetValidation();
  emailValidate(
    document.querySelector("#email"),
    document.querySelector("#emailMsg")
  );
  return validate;
}

//Update profile validation (user)
function updateProfileValidation() {
  resetValidation();

  nameValidate(
    document.querySelector("#fullName"),
    document.querySelector("#fullNameMsg")
  );
  genderValidate(
    document.querySelectorAll('input[name="gender"]'),
    document.querySelector("#genderMsg")
  );
  emailValidate(
    document.querySelector("#email"),
    document.querySelector("#emailMsg")
  );
  mobileValidate(
    document.querySelector("#mobile"),
    document.querySelector("#mobileMsg")
  );
  fileValidate(
    document.querySelector("#profilePhoto"),
    document.querySelector("#profilePhotoMsg")
  );
  addressValidate(
    document.querySelector("#address"),
    document.querySelector("#addressMsg")
  );
  cscValidate(
    document.querySelector("#city"),
    document.querySelector("#cityMsg")
  );
  cscValidate(
    document.querySelector("#state"),
    document.querySelector("#stateMsg")
  );
  pincodeValidate(
    document.querySelector("#pincode"),
    document.querySelector("#pincodeMsg")
  );

  return validate;
}

//place order validation (user)
function orderValidation() {
  resetValidation();

  nameValidate(
    document.querySelector("#fullName"),
    document.querySelector("#fullNameMsg")
  );
  emailValidate(
    document.querySelector("#email"),
    document.querySelector("#emailMsg")
  );
  mobileValidate(
    document.querySelector("#mobile"),
    document.querySelector("#mobileMsg")
  );
  addressValidate(
    document.querySelector("#address"),
    document.querySelector("#addressMsg")
  );
  cscValidate(
    document.querySelector("#city"),
    document.querySelector("#cityMsg")
  );
  cscValidate(
    document.querySelector("#state"),
    document.querySelector("#stateMsg")
  );
  pincodeValidate(
    document.querySelector("#pincode"),
    document.querySelector("#pincodeMsg")
  );

  return validate;
}

//contactUs validation (user)
function contactValidaton() {
  resetValidation();
  nameValidate(
    document.querySelector("#contactName"),
    document.querySelector("#contactNameMsg")
  );
  emailValidate(
    document.querySelector("#contactEmail"),
    document.querySelector("#contactEmailMsg")
  );
  addressValidate(
    document.querySelector("#contactMessage"),
    document.querySelector("#contactMessageMsg")
  );

  return validate;
}

//Feedback validation (user)
function feedbackValidaton() {
  resetValidation();

  nameValidate(
    document.querySelector("#feedbackName"),
    document.querySelector("#feedbackNameMsg")
  );
  emailValidate(
    document.querySelector("#feedbackEmail"),
    document.querySelector("#feedbackEmailMsg")
  );
  addressValidate(
    document.querySelector("#feedbackMessage"),
    document.querySelector("#feedbackMessageMsg")
  );

  return validate;
}

//change password (user)
function changePassword_validation() {
  resetValidation();

  passwordValidate(
    document.querySelector("#currentPassword"),
    document.querySelector("#currentPasswordMsg")
  );
  passwordValidate(
    document.querySelector("#newPassword"),
    document.querySelector("#newPasswordMsg")
  );
  confirmPasswordValidate(
    document.querySelector("#confirmPassword"),
    document.querySelector("#confirmPasswordMsg")
  );

  return validate;
}
