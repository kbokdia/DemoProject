var pageValidation = {
    addError : function(formID,msg){
        var formElement = formID,
            errorMessage = msg;
            console.log(formElement);
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

                //Alphaber Validation
                else if($(this).is(".alphabet")){

                    if(elemValue == ""){
                        pageValidation.addError(this,"Required");
                        isValid = false;
                    }
                    else{
                        var regEx = /^[a-zA-Z]*$/g;
                        if(regEx.test(elemValue)){
                            pageValidation.addError(this,"Only Alphabets");
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
        });
        return isValid;
    },
    removeError : function(formID){
        var formElement = $(formID);
        $(formElement).find("fieldset").each(function () {
            //Remove Class form-control-danger from elem, has-danger from form-group & make error div null
            $(this).removeClass("form-control-danger").closest(".form-group").removeClass("has-danger").find(".error").html("");
        });
    }
};