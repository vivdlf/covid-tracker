/* 
Written by: Viviannie De La Fuente
Tested by: Viviannie De La Fuente
Debugged by: Viviannie De La Fuente 
*/ 
const businessNameEl = document.querySelector('#business_name');
//doesElementExist(businessNameEl);//checks whether selected element actually exists on the page
const emailEl = document.querySelector('#email');
//doesElementExist(emailEl);
const addressStreetEl = document.querySelector('#address_street');
//doesElementExist(addressStreetEl);
const addressNumberEl = document.querySelector('#address_number');
//doesElementExist(addressNumberEl);
const addressCityEl = document.querySelector('#address_city');
//doesElementExist(addressCityEl);
const addressDistrictEl = document.querySelector('#address_district');
//doesElementExist(addressDistrictEl);

const form = document.querySelector('#signup');
//doesElementExist(form);

const checkName = (nameEl, minLength = 3, maxLength = 25) => {

    let isValidName = false;

    const name = nameEl.value.trim();

    if (isEmpty(name)) {
        showError(nameEl, 'Cannot be blank.');
    } else if (!isBetween(name.length, minLength, maxLength)) {
        showError(nameEl, `Value must be between ${minLength} and ${maxLength} characters.`)
    } else {
        showSuccess(nameEl);
        isValidName = true;
    }
    return isValidName;
};

const checkGender = () => {
    if (document.getElementById('male').checked) {
        //male radio button is checked
        showSuccess(document.getElementById('male'));
        return true;
    } else if (document.getElementById('female').checked) {
        //female radio button is checked
        showSuccess(document.getElementById('female'));
        return true;
    } else if (document.getElementById('other').checked) {
        //other radio button is checked
        showSuccess(document.getElementById('other'));
        return true;
    }
    else {
        showError(document.getElementById('other'), 'Please choose a gender.');
        return false;//no radio button was checked
    }
}

const checkEmail = (emailEl) => {
    let isValidEmail = false;
    const email = emailEl.value.trim();
    if (isEmpty(email)) {
        showError(emailEl, 'Email cannot be blank.');
    } else if (!isEmailValid(email)) {
        showError(emailEl, 'Email is not valid.')
    } else {
        showSuccess(emailEl);
        isValidEmail = true;
    }
    return isValidEmail;
};


const checkAddressNumber = (addressNumberEl) => {
    let isValidAddressNumber = false;

    const addressNum = addressNumberEl.value.trim();
    if (isEmpty(addressNum)) {
        showError(addressNumberEl, 'Street number cannot be blank.');
    } else if (!isNumeric(addressNum)) {
        showError(addressNumberEl, 'Street number must be a number.')
    } else {
        showSuccess(addressNumberEl);
        isValidAddressNumber = true;
    }
    return isValidAddressNumber;

}



const checkPassword = (passwordEl) => {

    let isValidPassword = false;

    const password = passwordEl.value.trim();

    if (isEmpty(password)) {
        showError(passwordEl, 'Password cannot be blank.');
    } else if (!isPasswordSecure(password)) {
        showError(passwordEl, 'Password must has at least 8 characters that include at least 1 lowercase character, 1 uppercase characters, 1 number, and 1 special character in (!@#$%^&*)');
    } else {
        showSuccess(passwordEl);
        isValidPassword = true;
    }
    return isValidPassword;
};

const checkConfirmPassword = (passwordEl, confirmPasswordEl) => {
    let valid = false;
    // check confirm password
    const confirmPassword = confirmPasswordEl.value.trim();
    const password = passwordEl.value.trim();

    if (isEmpty(confirmPassword)) {
        showError(confirmPasswordEl, 'Please enter the password again');
    } else if (password !== confirmPassword) {
        showError(confirmPasswordEl, 'The password does not match');
    } else {
        showSuccess(confirmPasswordEl);
        valid = true;
    }

    return valid;
};

const checkDate = (dateEl) => {
    let isValidDate = false;

    const date = dateEl.value.trim();

    if (isEmpty(date)) {
        showError(dateEl, 'Please enter a valid date.');
    } else {
        showSuccess(dateEl);
        isValidDate = true;
    }
    return isValidDate;
}

const isEmailValid = (email) => {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
};

const isPasswordSecure = (password) => {
    const re = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
    return re.test(password);
};

const isEmpty = (str) => {
    return (!str || str.length === 0)
};

const isBetween = (length, min, max) => length < min || length > max ? false : true;

const isNumeric = (value) => {
    if (isNaN(value)) {
        return false;
    } else {
        return true;
    }
}

//checks whether the function argument is an actual element on the page
function doesElementExist(element) {

    if (element !== null) {
        alert('Element is type: ' + element.tagName + ' with id: ' + element.id);
    } else {
        alert('The element does not exist in the page.');
    }
}


const showError = (currElement, message) => {
    // get the form-field element
    const formField = currElement.parentElement;
    // add the error class
    formField.classList.remove('success');
    formField.classList.add('error');

    // show the error message
    const error = formField.querySelector('small');
    error.textContent = message;
};

const showSuccess = (currElement) => {
    // get the form-field element
    const formField = currElement.parentElement;

    // remove the error class
    formField.classList.remove('error');
    formField.classList.add('success');

    // hide the error message
    const error = formField.querySelector('small');
    error.textContent = '';
}


form.addEventListener('submit', function (e) {
    // prevent the form from submitting
    e.preventDefault();

    // validate forms
    let isBusinessNameValid = checkName(businessNameEl, 2),        
        isEmailValid = checkEmail(emailEl),
        isAddressStreetValid = checkName(addressStreetEl, 2),
        isAddressNumberValid = checkAddressNumber(addressNumberEl),
        isAddressCityValid = checkName(addressCityEl, 2),
        isAddressDistrictValid = checkName(addressDistrictEl, 2);

    let isFormValid = isBusinessNameValid &&        
        isEmailValid &&
        isAddressStreetValid &&
        isAddressNumberValid &&
        isAddressCityValid &&
        isAddressDistrictValid;

    // submit to the server if the form is valid
    if (isFormValid) {
        this.submit();
    }
});

//validates the current form element in real time using a delay that allows users to type before starting to validate
const debounce = (fn, delay = 500) => {
    let timeoutId;
    return (...args) => {
        // cancel the previous timer
        if (timeoutId) {
            clearTimeout(timeoutId);
        }
        // setup a new timer
        timeoutId = setTimeout(() => {
            fn.apply(null, args)
        }, delay);
    };
};

//validates the current form element in real time using a delay that allows users to type before starting to validate
form.addEventListener('input', debounce(function (e) {
    switch (e.target.id) {
        case 'business_name'://first_name is the id
            checkName(businessNameEl, 2);
            break;        
        case 'email':
            checkEmail(emailEl);
            break;        
        case 'address_street':
            checkName(addressStreetEl, 2);
            break;
        case 'address_number':
            checkAddressNumber(addressNumberEl);
            break;
        case 'address_city':
            checkName(addressCityEl, 2);
            break;
        case 'address_district':
            checkName(addressDistrictEl, 2);
            break;
    }
}));

