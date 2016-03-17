var pageValidation = {
    addError : function(formID,msg){
        var formElement = formID,
            errorMessage = msg;
            $(formElement).addClass("form-control-danger").closest(".form-group").addClass("has-danger").find(".error").html(errorMessage);
    },
    validateForm : function(formID){
        //Pass the form ID for validation
        var formElement = $(formID),
            isValid = true,
            elemValue = "",
            regEx = "";
        pageValidation.removeError(formID);

        //Check for validation in each element in form
        formElement.find('input').each(function(){

            elemValue = $(this).val().trim();
            if($(this).prop('required')){

               //Validation for Email
                if($(this).is(".email")){

                    if(elemValue == ""){
                        pageValidation.addError(this,"Required");
                        console.log("Email Required");
                        isValid = false;
                    }
                    else{
                        regEx = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                        if(regEx.test(elemValue)){
                            pageValidation.addError(this,"Invalid Email");
                            console.log("Email Invalid");
                            isValid = false;
                        }
                    }
                }

                //Number Validation
                else if($(this).is(".number")){

                    if(elemValue == ""){
                        pageValidation.addError(this,"Required");
                        console.log("Number Required");
                        isValid = false;
                    }
                    else{
                        regEx = /^[0-9]+$/g;
                        if(regEx.test(elemValue)){
                            pageValidation.addError(this,"Invalid Number");
                            console.log("Number Invalid");
                            isValid = false;
                        }
                    }
                }

                //Alphabet Validation
                else if($(this).is(".alphabet")){

                    if(elemValue == ""){
                        pageValidation.addError(this,"Required");
                        isValid = false;
                    }
                    else{
                        regEx = /^[a-zA-Z. ]*$/g;
                        if(!regEx.test(elemValue)){
                            pageValidation.addError(this,"Only Alphabets");
                            isValid = false;
                        }
                    }
                }

                //Not Special Char Validation
                else if($(this).is(".noSpecialChar")){

                    if(elemValue == ""){
                        pageValidation.addError(this,"Required");
                        isValid = false;
                    }
                    else{
                        regEx = /^[a-zA-Z0-9'. ]*$/g;
                        if(!regEx.test(elemValue)){
                            pageValidation.addError(this,"No Special Characters Allowed");
                            isValid = false;
                        }
                    }
                }

                //Validation for any other required field
                else if($(this).val().trim() === "")
                {
                    pageValidation.addError(this,"Required");
                    isValid = false;
                    console.log(isValid);

                }

            }

            else{
                //Validation for Email
                if($(this).is(".email")){
                    regEx = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                    if(regEx.test(elemValue)){
                        pageValidation.addError(this,"Invalid Email");
                        console.log("Email Invalid");
                        isValid = false;
                    }
                }

                //Number Validation
                else if($(this).is(".number")){
                    regEx = /^[0-9]+$/g;
                    if(regEx.test(elemValue)){
                        pageValidation.addError(this,"Invalid Number");
                        console.log("Number Invalid");
                        isValid = false;
                    }
                }

                //Alphaber Validation
                else if($(this).is(".alphabet")){
                    regEx = /^[a-zA-Z. ]*$/g;
                    if(!regEx.test(elemValue)){
                        pageValidation.addError(this,"Only Alphabets");
                        isValid = false;
                    }
                }

                //Not Special Char Validation
                else if($(this).is(".noSpecialChar")){
                    regEx = /^[a-zA-Z0-9'. ]*$/g;
                    if(!regEx.test(elemValue)){
                        pageValidation.addError(this,"No Special Characters Allowed");
                        isValid = false;
                    }
                }
            }
        });
        formElement.find('textarea').each(function(){

            elemValue = $(this).val().trim();
            if($(this).prop('required')){

                //Validation for Email
                if($(this).is(".email")){

                    if(elemValue == ""){
                        pageValidation.addError(this,"Required");
                        console.log("Email Required");
                        isValid = false;
                    }
                    else{
                        regEx = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                        if(regEx.test(elemValue)){
                            pageValidation.addError(this,"Invalid Email");
                            console.log("Email Invalid");
                            isValid = false;
                        }
                    }
                }

                //Number Validation
                else if($(this).is(".number")){

                    if(elemValue == ""){
                        pageValidation.addError(this,"Required");
                        console.log("Number Required");
                        isValid = false;
                    }
                    else{
                        regEx = /^[0-9]+$/g;
                        if(regEx.test(elemValue)){
                            pageValidation.addError(this,"Invalid Number");
                            console.log("Number Invalid");
                            isValid = false;
                        }
                    }
                }

                //Alphaber Validation
                else if($(this).is(".alphabet")){

                    if(elemValue == ""){
                        pageValidation.addError(this,"Required");
                        isValid = false;
                    }
                    else{
                        regEx = /^[a-zA-Z. ]*$/g;
                        if(!regEx.test(elemValue)){
                            pageValidation.addError(this,"Only Alphabets");
                            isValid = false;
                        }
                    }
                }

                //Not Special Char Validation
                else if($(this).is(".noSpecialChar")){

                    if(elemValue == ""){
                        pageValidation.addError(this,"Required");
                        isValid = false;
                    }
                    else{
                        regEx = /^[a-zA-Z0-9'. ]*$/g;
                        if(!regEx.test(elemValue)){
                            pageValidation.addError(this,"No Special Characters Allowed");
                            isValid = false;
                        }
                    }
                }

                //Validation for any other required field
                else if($(this).val().trim() === "")
                {
                    pageValidation.addError(this,"Required");
                    isValid = false;
                    console.log(isValid);

                }

            }

            else{
                //Validation for Email
                if($(this).is(".email")){
                    regEx = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                    if(regEx.test(elemValue)){
                        pageValidation.addError(this,"Invalid Email");
                        console.log("Email Invalid");
                        isValid = false;
                    }
                }

                //Number Validation
                else if($(this).is(".number")){
                    regEx = /^[0-9]+$/g;
                    if(regEx.test(elemValue)){
                        pageValidation.addError(this,"Invalid Number");
                        console.log("Number Invalid");
                        isValid = false;
                    }
                }

                //Alphaber Validation
                else if($(this).is(".alphabet")){
                    regEx = /^[a-zA-Z. ]*$/g;
                    if(!regEx.test(elemValue)){
                        pageValidation.addError(this,"Only Alphabets");
                        isValid = false;
                    }
                }

                //Not Special Char Validation
                else if($(this).is(".noSpecialChar")){
                    regEx = /^[a-zA-Z0-9'. ]*$/g;
                    if(!regEx.test(elemValue)){
                        pageValidation.addError(this,"No Special Characters Allowed");
                        isValid = false;
                    }
                }
            }
        });
        return isValid;
    },
    validateField : function(elem){
        var Element = $(elem),
            isValid = true,
            elemValue = "",
            regEx = "";

            elemValue = Element.val().trim();
            pageValidation.removeFieldError(elem);

            if(Element.prop('required')){

                //Validation for Email
                if(Element.is(".email")){

                    if(elemValue == ""){
                        pageValidation.addError(elem,"Required");
                        console.log("Email Required");
                        isValid = false;
                    }
                    else{
                        regEx = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                        if(regEx.test(elemValue)){
                            pageValidation.addError(elem,"Invalid Email");
                            console.log("Email Invalid");
                            isValid = false;
                        }
                    }

                }

                //Number Validation
                else if(Element.is(".number")){

                    if(elemValue == ""){
                        pageValidation.addError(elem,"Required");
                        console.log("Number Required");
                        isValid = false;
                    }
                    else{
                        regEx = /^[0-9]+$/g;
                        if(regEx.test(elemValue)){
                            pageValidation.addError(elem,"Invalid Number");
                            console.log("Number Invalid");
                            isValid = false;
                        }
                    }
                }

                //Alphaber Validation
                else if(Element.is(".alphabet")){

                    if(elemValue == ""){
                        pageValidation.addError(elem,"Required");
                        isValid = false;
                    }
                    else{
                        regEx = /^[a-zA-Z. ]*$/g;
                        if(!regEx.test(elemValue)){
                            pageValidation.addError(elem,"Only Alphabets");
                            isValid = false;
                        }
                    }
                }

                //Not Special Char Validation
                else if(Element.is(".noSpecialChar")){

                    if(elemValue == ""){
                        pageValidation.addError(elem,"Required");
                        isValid = false;
                    }
                    else{
                        regEx = /^[a-zA-Z0-9'. ]*$/g;
                        if(!regEx.test(elemValue)){
                            pageValidation.addError(elem,"No Special Characters Allowed");
                            isValid = false;
                        }
                    }
                }

                //Validation for any other required field
                else if(elemValue === "")
                {
                    pageValidation.addError(elem,"Required");
                    isValid = false;
                    console.log(isValid);

                }

            }

            else{
                //Validation for Email
                if(elemValue.is(".email")){
                    regEx = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                    if(regEx.test(elemValue)){
                        pageValidation.addError(elem,"Invalid Email");
                        console.log("Email Invalid");
                        isValid = false;
                    }
                }

                //Number Validation
                else if(elemValue.is(".number")){
                    regEx = /^[0-9]+$/g;
                    if(regEx.test(elemValue)){
                        pageValidation.addError(elem,"Invalid Number");
                        console.log("Number Invalid");
                        isValid = false;
                    }
                }

                //Alphaber Validation
                else if(elemValue.is(".alphabet")){
                    regEx = /^[a-zA-Z. ]*$/g;
                    if(!regEx.test(elemValue)){
                        pageValidation.addError(elem,"Only Alphabets");
                        isValid = false;
                    }
                }

                //Not Special Char Validation
                else if(elemValue.is(".noSpecialChar")){
                    regEx = /^[a-zA-Z0-9'. ]*$/g;
                    if(!regEx.test(elemValue)){
                        pageValidation.addError(elem,"No Special Characters Allowed");
                        isValid = false;
                    }
                }
            }

        return isValid;
    },
    removeError : function(formID){
        var formElement = $(formID);
        $(formElement).find("fieldset").each(function () {
            //Remove Class form-control-danger from elem, has-danger from form-group & make error div null
            $(this).removeClass("form-control-danger").closest(".form-group").removeClass("has-danger").find(".error").html("");
        });
    },
    removeFieldError : function (elem) {
        $(elem).removeClass("form-control-danger").closest(".form-group").removeClass("has-danger").find(".error").html("");
    }
};