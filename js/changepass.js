
      function validate() {
        var valid = true;
        console.log(valid);
        valid = checkOPass($("#opass"));
        valid = valid && checkPass($("#npass"));
        valid = valid && checkCpass($("#npass"), $("#cnpass"));
        
        console.log(valid);
        $("#changepass").attr("disabled", true).css("border", "#FF0000 1px solid").css("background-color","red");
        console.log("button disabled");
        if (valid) {
          console.log("valid");
          $("#changepass").attr("disabled", false).css("border", "#00b894 1px solid").css("background-color","#00b894");
        }
      }

      function checkEmpty(obj) {
        if ($(obj).val() == "") {
          return false;
        }
        return true;
      }

      function checkOPass(obj) {
        var result = true;
        $(obj).css("border", "");
        $("#opass_err").html("");
        result = checkEmpty(obj);

        if (!result) {
          $(obj).css("border", "#FF0000 1px solid");
          $("#opass_err")
            .html("Required")
            .css("color", "red")
            .css("font-size", "13px");
          return false;
        }
        return true;
    }

      function checkPass(obj) {
        var result = true;

        $(obj).css("border", "");
        $("#npass_err").html("");
        result = checkEmpty(obj);

        if (!result) {
          $(obj).css("border", "#FF0000 1px solid");
          $("#npass_err")
            .html("Required")
            .css("color", "red")
            .css("font-size", "13px");
          return false;
        }

        var pass_regex = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[*.!@$%^&(){}[]).{8,32}$/;
        result = pass_regex.test($(obj).val());
        console.log("jssss");
        if (!result) {
          $(obj).css("border", "#FF0000 1px solid");
          $("#npass_err")
            .html("Must contain Uppercase,lowercase,number and of > 8 length.")
            .css("color", "red")
            .css("font-size", "13px");
          return false;
        }

        return result;
      }

      function checkCpass(obj1, obj2) {
        var result = true;

        $("#cnpass_err").html("");
        $(obj1).css("border", "");
        result = checkEmpty(obj1);

        if (!result) {
          $(obj1).css("border", "#FF0000 1px solid");
          $("#cnpass_err")
            .html("Required")
            .css("color", "red")
            .css("font-size", "13px");
          return false;
        }

        var cpass = $(obj1).val();
        console.log(cpass);
        var pass = $(obj2).val();
        console.log(pass);

        if (cpass.localeCompare(pass) != 0) {
          $(obj1).css("border", "#FF0000 1px solid");
          $("#cnpass_err")
            .html("Password and confirm password not same!")
            .css("color", "red")
            .css("font-size", "13px");
          return false;
        }

        return result;
      }

   