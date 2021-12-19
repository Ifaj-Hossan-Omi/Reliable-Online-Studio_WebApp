function nameVal() {
        var name=document.getElementById("name").value;

        var regex= /^[a-zA-Z][a-zA-Z.\_\-\ ][\ a-zA-Z.\-\_]+/ ;


        if (regex.test(name)) {
            document.getElementById("nameErr").innerHTML= "";
            //return true;
            //document.getElementById("username").style.backgroundColor="Green";
            
        }
        else
        {

            //document.getElementById("username").style.backgroundColor="RED";

            document.getElementById("nameErr").innerHTML= "Only Can contain a-z, A-Z, period(.) , dash only(-) and at least two words";
        }


    }


    function emailVal() {
        var email=document.getElementById("email").value;
        regex= /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/ ;
        

        if (regex.test(email)) {
            document.getElementById("emailErr").innerHTML= ""; 
        }
        else
        {
            document.getElementById("emailErr").innerHTML= "Must be a valid email_address : anything@example.Com";
        }


    }




function userVal() {
        var userName=document.getElementById("userName").value;
        document.getElementById("usernameErr").innerHTML= "khbjhvbj";

        var regex= /^[0-9a-zA-Z-_]{2,}[^\s.]$/ ;


        if (regex.test(userName)) {
            document.getElementById("usernameErr").innerHTML= "";
            //return true;
            //document.getElementById("username").style.backgroundColor="Green";
            
        }
        else
        {

            //document.getElementById("username").style.backgroundColor="RED";

            document.getElementById("usernameErr").innerHTML= "Can contain a-z, A-Z, period(.) , dash only(-) and at least two words";
        }


    }


    function passVal() {
        var password=document.getElementById("password").value;
        var regex= /^[0-9a-zA-Z@%#$]{8,}$/ ;
        

        if (regex.test(password)) {
            document.getElementById("passwordErr").innerHTML= ""; 
        }
        else
        {
            document.getElementById("passwordErr").innerHTML= "At least 8 and No use of special characters (space,@, #, $, %)";
        }


    }


    function nidVal() {
        var nid=document.getElementById("nid").value;
        regex= /^([0-9])+$/ ;
        

        if (regex.test(nid)) {
            document.getElementById("nidErr").innerHTML= ""; 
        }
        else
        {
            document.getElementById("nidErr").innerHTML= "Only  integer number accepted";
        }


    }




    function addressVal() {
        var address=document.getElementById("address").value;
        var regex= /^([A-Za-z,. ]{4,}$)/ ;
        

        if (regex.test(address)) {
            document.getElementById("addressErr").innerHTML= "";
        }
        else
        {
            document.getElementById("addressErr").innerHTML= "Only alphabet is allowed and atleast 4 characters";
        }


    }


    function dateVal() {
        var date=document.getElementById("birthdate").value;
        //regex= /^([0-9])+$/ ;
        

        if (date == "") {
             document.getElementById("birthdateErr").innerHTML= "Please enter your birth date ";
        }
        else
        {   
            document.getElementById("birthdateErr").innerHTML= "";
            
        }


    }




function detailsVal() {
        var details=document.getElementById("details").value;

        var regex= /^([A-Za-z,. ]{4,}$)/ ;


        if (regex.test(details)) {
            document.getElementById("detailsErr").innerHTML= "";
            document.getElementById("button").innerHTML= '<input class="submit" type="submit" value="Upload" />';
            //return true;
            //document.getElementById("username").style.backgroundColor="Green";
            
        }
        else
        {

            //document.getElementById("username").style.backgroundColor="RED";

            document.getElementById("detailsErr").innerHTML= "Only Can contain a-z, A-Z, period(.) , dash only(-) and at least two words";
            document.getElementById("button").innerHTML= '';
        }


    }