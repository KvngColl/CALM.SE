function trans_det() {
    const first = document.getElementById("fname");
    const last = document.getElementById("lname");
    const birth = document.getElementById("dob");
    const mail = document.getElementById("mail");
    const phone = document.getElementById("phone");
    const text_reg = /[a-zA-z]/;
    const birth_reg = /^\d{4}(-)(((0)[0-9])|((1)[0-2]))(-)([0-2][0-9]|(3)[0-1])$/;
    const mail_reg = /^[\w-]+@([\w-]+\.)+[\w-]{2,4}$/;
    const phone_reg = /^[0]([2,5])([0-9]){8}/;

    let valid;
    if (!first.value.match(text_reg)) {
        first.style.border = "3px solid red";
        valid = false;
    } else {
        first.style.border = "3px solid green";

    }

    if (!last.value.match(text_reg)) {
        last.style.border = "3px solid red";
        valid = false;
    } else {
        last.style.border = "3px solid green";

    }

    if (!birth.value.match(birth_reg)) {
        birth.style.border = "3px solid red";
        valid = false;
    } else {
        birth.style.border = "3px solid green";
    }

    if (!mail.value.match(mail_reg)) {
        mail.style.border = "3px solid red";
        valid = false;
    } else {
        mail.style.border = "3px solid green";
    }

    if (!phone.value.match(phone_reg)) {
        phone.style.border = "3px solid red";
        valid = false;
    } else {
        phone.style.border = "3px solid green";
    }

    if (
        first.value === "" &&
        last.value === "" &&
        birth.value === "" &&
        mail.value === "" &&
        phone.value === "" &&
        text_reg === "" &&
        birth_reg.value === "" &&
        mail_reg.value === "" &&
        phone_reg.value === ""
    ) {
        valid = false;
    } else {
        const msg = document.getElementById("errorEmpty");
        msg.innerText = "Please fill empty fields";
    }

    return valid;
}

function w3_open() {
    document.getElementById("sidebar").style.display = "block";

}

function w3_close() {
    document.getElementById("sidebar").style.display = "none";
}

function display_elective() {
    const course = document.getElementById("course");
    const elective = document.getElementById("science");
    const arts = document.getElementById("arts");

    if (course.value === "General Science") {
        elective.style.display = "inline";
    }
    if (course.value === "General Arts") {
        arts.style.display = "inline";

    }
}

let email = document.getElementById("email");
let password = document.getElementById("password");
let confirm_password = document.getElementById("confirm_password");

function validate_email(input) {
    let regex = /^[\w-]+@([\w-]+\.)+[\w-]{2,4}$/;

    if (input.value === "") {
        document.getElementById("email_error").innerText = "Please enter an email";
        return false;
    } else if (regex.test(input.value)) {
        return true;
    } else {
        document.getElementById("email_error").innerText = `Please enter a correct email`;
        return false;
    }
}

function empty_pass(input) {
    if (input.value === "") {
        document.getElementById("password_error").innerText = "Please enter a password";
        return false;
    } else {
        return true;
    }
}

function validate_password_length(input) {
    if (input.value.length < 6) {
        document.getElementById("password_error").innerText = "Please password must be more than 6 characters";
        return false;
    } else {
        return true;
    }
}

// Check passwords match
function checkPasswordsMatch(input1, input2) {
    if (input1.value !== input2.value) {
        document.getElementById("password_conf_error").innerText = "Passwords do not match";
        return false;
    } else {
        return true;
    }
}

function validate() {
    return validate_email(email) &&
        empty_pass(password) &&
        validate_password_length(password) &&
        checkPasswordsMatch(password, confirm_password);
}

function validate_login() {
    return validate_email(email) &&
        empty_pass(password) &&
        validate_password_length(password);
}

