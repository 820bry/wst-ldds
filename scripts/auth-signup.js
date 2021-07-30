//Global variables
var studName;
var email;
var password;
var confirm_password;
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
formElement = document.getElementById("user-details");
nameElement = document.getElementById("name");
emailElement = document.getElementById("email");
passwordElement = document.getElementById("pwd");
confirmPasswordElement = document.getElementById("repwd");
courseCodeElement = document.getElementById("ccode");
facultyElement = document.getElementById("faculty");
studentIDElement = document.getElementById("studID");
phoneNoElement = document.getElementById("pnum");
icNoElement = document.getElementById("nric");


window.onload = () => {
    formElement.addEventListener("keypress", (e) => {
        //Get page name
        var path = window.location.pathname;
        var page = path.split("/").pop();

        if (page === "signup.html" && e.key === "Enter") {
            nextPage();
        } else if (e.key === "Enter"){
            //Perform signup
            signupPerform();
        }            
    })
}

function signupValidate(pageNo) {
    //Assume -1 is used to validate page 1 from page 2
    //This can prevent users to bypass page 1 validation using the forward button
    if (pageNo == 1 || pageNo == -1) {
        if (pageNo == 1) {
            studName = nameElement.value;
            email = emailElement.value;
            password = passwordElement.value;
            confirm_password = confirmPasswordElement.value;
        }

        if (studName != "" && email != "" && password != "" && confirm_password != "") {
            //Validation test
            if (password === confirm_password) {
                //Student name check
                if (namePattern.test(studName)) {}
                else {
                    //Student name check fail
                    return false;
                }

                //Email check
                if (emailPattern.test(email)) {}
                else {
                    //Email check fail
                    return false;
                }

                //Password check
                if (passwordPattern.test(password)) {}
                else {
                    //Password check fail
                    return false;
                }

                //Passed all checks
                return true;
            } else {
                //password and confirm password not match
                return false;
            }
        } else {
            //One or more fields no fill
            return false;
        }
    } else {
        //2nd page
        course_code = courseCodeElement.value;
        faculty = facultyElement.value;
        studentID = studentIDElement.value;
        phone_number = phoneNoElement.value;
        ic_no = icNoElement.value;

        //Check for all values again
        if (studName != "" && email != "" && password != "" && confirm_password != "" && course_code != "" && faculty != "" && studentID != "" && phone_number != "" && ic_no != "") {
            //Validation test
            //Revalidate page 1
            if (signupValidate(-1)) {}
            else {
                //Page 1 validation fail
                window.location.href = "/wst-ldds/login/signUp.html";
                return false;
            }
            //Course code check
            if (courseCodePattern.test(course_code)) {}
            else {
                //Course code check fail
                return false;
            }

            //Faculty check
            if (facultyPattern.test(faculty)) {}
            else {
                //Faculty check fail
                return false;
            }

            //Student ID check
            if (studentIDPattern.test(studentID)) {}
            else {
                //Student ID check fail
                return false;
            }

            //Phone number check
            if (phoneNoPattern.test(phone_number)) {}
            else {
                //Phone number check fail
                return false
            }

            if (icNoPattern.test(ic_no)) {}
            else {
                //IC No check fail
                return false;
            }

            //Passed all checks
            return true;
        } else {
            //One or more fields no fill
        }
    }
}

function nextPage() {
    if (signupValidate(1)) {
        window.location.href = "/wst-ldds/login/signUp_2.html";
    } else {
        //Do nothing since signupValidate will display error to user
        alert("Validation fail");
    }
}

function signupPerform() {
    
}