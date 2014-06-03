function inValidate(validation, eventType, selector) {
  
  exclude = false;
  if (eventType == 'keyup') {
    exclude = true;
  }
  $('#overlay-error .error .message').text("");
  $('#overlay-error').addClass('hide'); 
  $('#overlay-error2 .error .message').text("");
  $('#overlay-error2').addClass('hide');   
  //$('.help-inline span').closest('.control-group').removeClass('error'); 
  var invalid = false   
  $.each(validation.rules, function( index, value ) {
    $("#"+index).removeClass('error');
    if (typeof value === 'string') {
      if (value == 'required') {
        if ($("#"+index).val() == '') {          
          validationMsg(index, validation.messages[index]);          
          invalid = true;           
        }
      }  
    } else {      
      $.each(value, function( rule, expression ) {    
        if (exclude) {
          if (rule == 'min') {
            return;
          }
        }
        if($("#"+index).hasClass('hide')) {
          return;
        } 

        if ($("#"+index).length < 0) {
          return;
        }
        if (rule == 'required') {          
          if ($("#"+index).val() == '') {
            validationMsg(index, validation.messages[index][rule]);                      
            invalid = true;  
            return false;        
          }
        }  else if (rule == 'excludeStr') {
          var str = $("#"+index).val();             
          $.each(expression, function(key, value) {
            var excludeSymLength = value.length;
            var forStr = str.substring(0, excludeSymLength);           
            if (value == forStr) {

              validationMsg(index, validation.messages[index][rule]);          
              invalid = true;
              return false;            
            }
          });                              
        } else if (rule == 'min') {
          if ($("#"+index).val().length < expression) {
            validationMsg(index, validation.messages[index][rule]);             
            invalid = true;   
            return false;        
          }
        } else if (rule == 'max') {  
          //$("#"+index).attr('maxlength', expression);
          if ($("#"+index).val().length > expression) {
        	  //$("#"+index).attr('maxlength', expression);
            validationMsg(index, validation.messages[index][rule]);              
            invalid = true; 
            return false;        
          }
        } else if (rule == 'leading') { 
          
          var str = $("#"+index).val();     
          var strLength = str.length;
          if (strLength > 0) {
            var forStr = str.substring(0, 1);
        
            if (expression != forStr) {                 
              if (strLength > 1) {
                $("#"+index).val(str.substr(0, (strLength-2)));  
              }
          
              validationMsg(index, validation.messages[index][rule]);
              invalid = true;
              return false;            
            }                  
          }                                       
                              
        } else if (rule == 'checkStr') {          
          var str = $("#"+index).val();
          if (str.indexOf("$") != -1) {
            invalid = true;        
            validationMsg(index, validation.messages[index][rule]);            
            return false;        
          }           
        } else if (rule == 'spclChar') {
          var str = $("#"+index).val();
          if (!isSplChar(str)) {
            validationMsg(index, validation.messages[index][rule]);
            invalid = true;            
            return false;        
          }
        } else if (rule == 'typeahead') {       
          if (($("#"+expression[1]).val() != '') && ($("#"+expression[0]).val() == '')) {
            //$("#"+expression[1]).closest('.input-append').removeClass('input-append');
            validationMsg(index, validation.messages[index][rule]);          
            invalid = true;
            return false;
          }                  
        } else if (rule == 'beforeCheck') {         
          if ((index == selector) && ("#"+index+":checked").length > 0 && $("#"+expression).val() == '') {            
            validationMsg(index, validation.messages[index][rule]);          
            invalid = true;
            return false;            
          }                  
        }              
      });
    }  
   
  }); 
 
  return invalid;
 
}//end inValidate()



function classInValidate(classValidation, eventType, obj) { 
   
  var exclude = false;
  if (eventType == 'keyup') {
    exclude = true;
  }

  $('#overlay-error .error .message').text('');
  $('#overlay-error').addClass('hide');

  var invalid = false   
  $.each(classValidation.rules, function( index, value ) {
    //console.log(index);
    //console.log(value);
    $("."+index).removeClass('error');
    if ($("input."+index).length > 0) {
      $("input."+index).each(function(x, curObj) {
        if (typeof obj != 'undefined') {
          curObj = obj;
        }
        if (typeof value === 'string') {
          if (value == 'required') {
            if ($(curObj).val() == '') {          
              ClassValidationMsg(curObj, index, classValidation.messages[index]);          
              invalid = true;           
            }
          }  
        } else {      
          $.each(value, function( rule, expression ) {  

            if (exclude) {
              if (rule == 'min') {
                return;
              }
            }  

            if($(curObj).hasClass('hide') || $(curObj).is(":hidden")) {
              return;
            } 
            if (rule == 'required') {          
              if ($(curObj).val() == '') {
                ClassValidationMsg(curObj, index, classValidation.messages[index][rule]);                      
                invalid = true;  
                return false;        
              }
            } else if (rule == 'leading') {                
              var str = $(curObj).val();     
              var strLength = str.length;
              if (strLength > 0) {
                var forStr = str.substring(0, 1);
            
                if (expression != forStr) {                 
                  if (strLength > 1) {
                    $(curObj).val(str.substr(0, (strLength-1)));  
                  }
              
                  ClassValidationMsg(curObj, index, classValidation.messages[index][rule]);
                  invalid = true;
                  return false;            
                }                  
              }                         
                              
            } else if (rule == 'excludeStr') { 
                
                var str = $(curObj).val();
                 
                $.each(expression, function(key, value) {
                  var excludeSymLength = value.length;
                  
                  var forStr = str.substring(0, excludeSymLength);           
                
                  if (value == forStr) {
                
                    ClassValidationMsg(curObj, index, classValidation.messages[index][rule]);
                    invalid = true;
                    return false;            
                  }
                });                                 
                              
            } else if (rule == 'min') {    
              var str = $(curObj).val();    
              if (str.length > 0) {          
                if (str.length < expression) {
                  ClassValidationMsg(curObj, index, classValidation.messages[index][rule]);             
                  invalid = true;   
                  return false;        
                }
              }
            } else if (rule == 'max') {  
              //$(curObj).attr('maxlength', expression);           
              if ($(curObj).val().length > expression) {
            	  //$(curObj).attr('maxlength', expression); 
                ClassValidationMsg(curObj, index, classValidation.messages[index][rule]);              
                invalid = true; 
                return false;        
              }
            }              
          });// inner each
        }//end else
      }); //end class each
    }//end if
   
                  
  }); 
 
  return invalid;
 
}//end classInValidate()

function ClassValidationMsg(curObj, index, message) {
  $('#overlay-error .error .message').text(message);
  $('#overlay-error').removeClass('hide');
  //$('#overlay-sucess').addClass('hide');  
  $(curObj).removeClass('form-change');
  $(curObj).addClass('error');
}


/*Check for a special character'***/
function isSplChar(str)
{ 
  var spchar, getChar, SpecialChar; 
  spchar ="AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz0123456789_ "; 
  getChar='Empty';
  SpecialChar='No';
  for(var i=0; i<str.length;i++)
  {
    for(var j=0; j<spchar.length;j++)
    {     
      if(str.charAt(i)== spchar.charAt(j))
      {     
          SpecialChar='No';
          break;
      }
      else
      {
        SpecialChar='Yes';
      }
    }   
    if (SpecialChar == 'Yes')
    {
      break;
    }
  }
  if (SpecialChar == 'Yes')
  {
    return false;
  }
  else if (SpecialChar == 'No')
  {
    return true;
  }
}//end isSplChar()


function validationMsg(index, message) {  
  $('#overlay-error .error .message').text(message);
  $('#overlay-error').removeClass('hide');
  
  $('#overlay-error2 .error .message').text(message);
  $('#overlay-error2').removeClass('hide');
  
  $("#"+index).addClass('error');
}

$(document).ready(function() {

  $("body").on('keypress', '.numeric_check', function (e)  
  {
    //if the letter is not digit then display error and don't type anything
    if( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57))
    {
      //display error message
      //$("#errmsg").html("Digits Only").show().fadeOut("slow"); 
      return false;
    } 
  });
  function interceptKeys(evt) {
    evt = evt||window.event // IE support
    var c = evt.keyCode
    var ctrlDown = evt.ctrlKey||evt.metaKey // Mac support

    // Check for Alt+Gr (http://en.wikipedia.org/wiki/AltGr_key)
    if (ctrlDown && evt.altKey) return true

    // Check for ctrl+c, v and x
    //else if (ctrlDown && c==67) return false // c
    else if (ctrlDown && c==86) return false // v
    //else if (ctrlDown && c==88) return false // x

    // Otherwise allow
    return true
}
  $("body").on('paste keyup', '.numeric_check', function(e) {
      if(!interceptKeys(e))
      {
        var obj = $(this);
        var str = $(obj).val();
          if(!str.match(/^\d+$/)) {
            (obj).val('')
          }
      }
    var obj = $(this);
    setTimeout(function () {      
      var str = $(obj).val();
      if(!str.match(/^\d+$/)) {
        (obj).val('')
      } 
    }, 10); 
    //return false;
  });


  $("body").on('click', 'input[type="checkbox"]', function() {

    var readonly = $(this).attr('readonly');

    if (typeof readonly != 'undefined') {
      return false;
    }
   
    var form = $(this).parents('form:first');
    var invalidate = form.attr("invalidate");
    var chkId = $(this).attr('id');
    if (typeof invalidate != "undefined") {      
      //if (inValidate(validation)) {
        if($(this).is(':checked')) {          
          if (inValidate(validation, null, chkId)) {
            $(this).attr('checked', false);  
          } else {
            $(this).addClass('form-change');
          }          
        } else {
          $(this).addClass('form-change');
        }
      //}        
    }
    return true;
  });

  $("body").on('change', 'select', function() {
    var form = $(this).parents('form:first');
    var invalidate = form.attr("invalidate");
    if (typeof invalidate != "undefined") {
      $(this).addClass('form-change');
    } else {
      console.log("no validation");
    }
  });

  $("body").on('focus', 'input', function() {
    var form = $(this).parents('form:first');
    var invalidate = form.attr("invalidate");
    var oldVal = $(this).val();   
    if (oldVal == '') {
      oldVal="1";
    }
      
    $(this).attr('data-value', oldVal);      

  });

  $("body").on('keyup', 'input, textarea', function() {  
  
    var form = $(this).parents('form:first');
    var invalidate = form.attr("invalidate");    

    var oldVal = $(this).val();   
    
    var priorVal = $(this).attr('data-value'); 
    
    if (priorVal != '' && oldVal != priorVal) {
        $(this).addClass('form-change');
    }   

    if (typeof invalidate != "undefined") {
      
      $("input, textarea").not('.numeric_check').keyup(function() {
              
        inValidate(validation, 'keyup');
       
      });      
      
    } else {
      console.log("no validation");
    }
  });

});


