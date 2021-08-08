//Global variables
//Get input details of signup page 1 from session storage
var studName = (sessionStorage.getItem("studName") || "");
var email = (sessionStorage.getItem("email") || "");
var password = (sessionStorage.getItem("password") || "");
var confirm_password = (sessionStorage.getItem("confirm_password") || "");
var course_code;
var faculty;
var studentID;
var phone_number;
var ic_no;

//Regex pattern
namePattern = /^([A-Z]+\s?)+$/i;
emailPattern = /^\b[\w\.-]+@[\w\.-]+\.\w{2,4}\b$/i;
passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;
courseCodePattern = /^[A-Z]{3}$/i;
facultyPattern = /^[A-Z]{4}$/i;
studentIDPattern = /^[0-9]{2}[A-Z]{3}[0-9]{5}$/i;
phoneNoPattern = /^(|\+6)(?:[0-9]( |-)?){6,10}[0-9]/;
icNoPattern = /^(([[0-9]{2})(0[1-9]|1[0-2])(0[1-9]|[12][0-9]|3[01]))-([0-9]{2})-([0-9]{4})$/;

//Elements declaration
const formElement = document.getElementById("user-details");
const nameElement = document.getElementById("name");
const emailElement = document.getElementById("email");
const passwordElement = document.getElementById("pwd");
const confirmPasswordElement = document.getElementById("repwd");
const courseCodeElement = document.getElementById("ccode");
const facultyElement = document.getElementById("faculty");
const studentIDElement = document.getElementById("studID");
const phoneNoElement = document.getElementById("pnum");
const icNoElement = document.getElementById("nric");
const emailErrorMessageElement = document.getElementById("error2");
const passwordErrorMessageElement = document.getElementById("error3");
const confirmPasswordErrorMessageElement = document.getElementById("error4");
const courseCodeErrorMessageElement = document.getElementById("error5");
const facultyErrorMessageElement = document.getElementById("error6");
const studentIDErrorMessageElement = document.getElementById("error7");
const phoneNoErrorMessageElement = document.getElementById("error8");
const icNoErrorMessageElement = document.getElementById("error9");

window.onload = () => {
    //Get page name
    var path = window.location.pathname;
    var page = path.split("/").pop();

    //.toUpperCase() because site can be accessed case insensitively
    if ((page.toUpperCase() === "signUp_2.html".toUpperCase() || page.toUpperCase() === "signup2".toUpperCase()) && !signupValidate(-1)) {
        //Direct access to signup2 without going through 1st sign up page
        window.history.back();
    }

    formElement.addEventListener("keypress", (e) => {
        if ((page.toUpperCase() === "signup.html".toUpperCase() || page.toUpperCase() === "signup".toUpperCase()) && e.key === "Enter") {
            nextPage();
        } else if (e.key === "Enter"){
            //Perform signup
            signupPerform();
        }            
    })

    
}

function resetErrorMessagePage1() {
    emailErrorMessageElement.style.visibility = "hidden";
    passwordErrorMessageElement.style.visibility = "hidden";
    confirmPasswordErrorMessageElement.style.visibility = "hidden";
}

function resetErrorMessagePage2() {
    courseCodeErrorMessageElement.style.visibility = "hidden";
    facultyErrorMessageElement.style.visibility = "hidden";
    studentIDErrorMessageElement.style.visibility = "hidden";
    phoneNoErrorMessageElement.style.visibility = "hidden";
    icNoErrorMessageElement.style.visibility = "hidden";
}


function signupValidate(pageNo) {
    //Assume -1 is used to validate page 1 from page 2
    //This can prevent users to bypass page 1 validation using the forward button
    if (pageNo == 1 || pageNo == -1) {
        if (pageNo == 1) {
            resetErrorMessagePage1();
            studName = nameElement.value;
            email = emailElement.value;
            password = passwordElement.value;
            confirm_password = confirmPasswordElement.value;

            //Pass into session storage to be used in signup 2 page
            sessionStorage.setItem("studName", studName);
            sessionStorage.setItem("email", email);
            sessionStorage.setItem("password", password);
            sessionStorage.setItem("confirm_password", confirm_password);
        }

        if (studName != "" && email != "" && password != "" && confirm_password != "") {
            //Validation test
            var checkPassed = true;

            //Password and confirm password check
            if (password === confirm_password) {} 
            else {
                //password and confirm password not match
                if (pageNo == 1) {
                    confirmPasswordErrorMessageElement.style.visibility = "visible";
                    confirmPasswordErrorMessageElement.innerHTML = "Passwords Do Not Match";
                }
                checkPassed = false;
            }

            //Student name check
            if (namePattern.test(studName)) {}
            else {
                //Student name check fail
                checkPassed = false;
            }

            //Email check
            if (emailPattern.test(email)) {}
            else {
                //Email check fail
                if (pageNo == 1) {
                    emailErrorMessageElement.style.visibility = "visible";
                    emailErrorMessageElement.innerHTML = "Invalid E-Mail";
                }
                checkPassed = false;
            }

            //Password check
            if (passwordPattern.test(password)) {}
            else {
                //Password check fail
                if (pageNo == 1) {
                    passwordErrorMessageElement.style.visibility = "visible";
                    passwordErrorMessageElement.innerHTML = "Password must consist of at least 1 upper character and 1 number";
                }
                checkPassed = false;
            }

            //Passed all checks
            return checkPassed;
        } else {
            //One or more fields no fill
            if (pageNo != 1) return false;

            if (studName === "") {

            }

            if (email === "") {
                emailErrorMessageElement.style.visibility = "visible";
                emailErrorMessageElement.innerHTML = "Empty E-Mail";
            }

            if (password === "") {
                passwordErrorMessageElement.style.visibility = "visible";
                passwordErrorMessageElement.innerHTML = "Empty password";
            }

            if (confirm_password === "") {
                confirmPasswordErrorMessageElement.style.visibility = "visible";
                confirmPasswordErrorMessageElement.innerHTML = "Empty Confirm Password";
            }

            return false;
        }
    } else {
        //2nd page
        resetErrorMessagePage2();

        course_code = courseCodeElement.value;
        faculty = facultyElement.value;
        studentID = studentIDElement.value;
        phone_number = phoneNoElement.value;
        ic_no = icNoElement.value;

        //Check for all values again
        if (studName != "" && email != "" && password != "" && confirm_password != "" && course_code != "" && faculty != "" && studentID != "" && phone_number != "" && ic_no != "") {
            //Validation test
            var checkPassed = true;

            //Revalidate page 1
            if (signupValidate(-1)) {}
            else {
                //Page 1 validation fail
                window.location.href = "/wst-ldds/login/signUp.html";
                checkPassed = false;
            }
            //Course code check
            if (courseCodePattern.test(course_code)) {}
            else {
                //Course code check fail
                courseCodeErrorMessageElement.style.visibility = "visible";
                courseCodeErrorMessageElement.innerHTML = "Invalid Course Code";
                checkPassed = false;
            }

            //Faculty check
            if (facultyPattern.test(faculty)) {}
            else {
                //Faculty check fail
                facultyErrorMessageElement.style.visibility = "visible";
                facultyErrorMessageElement.innerHTML = "Invalid Course Code";
                checkPassed = false;
            }

            //Student ID check
            if (studentIDPattern.test(studentID)) {}
            else {
                //Student ID check fail
                studentIDErrorMessageElement.style.visibility = "visible";
                studentIDErrorMessageElement.innerHTML = "Invalid Student ID";
                checkPassed = false;
            }

            //Phone number check
            if (phoneNoPattern.test(phone_number)) {}
            else {
                //Phone number check fail
                phoneNoErrorMessageElement.style.visibility = "visible";
                phoneNoErrorMessageElement.innerHTML = "Invalid Phone Number";
                checkPassed = false
            }

            if (icNoPattern.test(ic_no)) {}
            else {
                //IC No check fail
                icNoErrorMessageElement.style.visibility = "visible";
                icNoErrorMessageElement.innerHTML = "Invalid NRIC Number";
                checkPassed = false;
            }

            //Passed all checks
            return checkPassed;
        } else {
            //One or more fields no fill
            if (course_code === "") {
                courseCodeErrorMessageElement.style.visibility = "visible";
                courseCodeErrorMessageElement.innerHTML = "Empty Course Code";
            }
            if (faculty === "") {
                facultyErrorMessageElement.style.visibility = "visible";
                facultyErrorMessageElement.innerHTML = "Empty Faculty Code";
            }
            if (studentID === "") {
                studentIDErrorMessageElement.style.visibility = "visible";
                studentIDErrorMessageElement.innerHTML = "Empty Student ID";
            }
            if (phone_number === "") {
                phoneNoErrorMessageElement.style.visibility = "visible";
                phoneNoErrorMessageElement.innerHTML = "Empty Phone Number";
            }
            if (ic_no === "") {
                icNoErrorMessageElement.style.visibility = "visible";
                icNoErrorMessageElement.innerHTML = "Empty NRIC Number";
            }
        }
    }
}

function nextPage() {
    if (signupValidate(1)) {
        window.location.href = "/wst-ldds/signup2";
    } else {
        //Do nothing since signupValidate will display error to user
        alert("Validation fail");
    }
}

function signupPerform() {
    if (signupValidate(2)) {
        var authDetails = {
            "authType": "signup",
            "name": studName,
            "email": email,
            "password": password,
            "courseCode": course_code,
            "faculty": faculty,
            "studentID": studentID,
            "phoneNumber": phone_number,
            "icNo": ic_no
        }

        //Format into JSON format
        authJSON = JSON.stringify(authDetails);

        fetch("/wst-ldds/auth/", {
            method: "POST",
            headers: {
                "Content-type": "application/json",
            },
            body: authJSON
        })
        .then(response => response.json())
        .then((varResponse) => {
            alert("Signup" + varResponse.status);
        })
        .catch((error) => {
            console.error("Error: ", error);
        })
    } else {
        //Do nothing since signupValidate will display error to user
    }
}