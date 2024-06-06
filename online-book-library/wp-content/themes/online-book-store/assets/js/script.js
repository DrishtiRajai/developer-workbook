/* Email Vadidation Functio trigger on submit button click event*/
function emailvalidation(){
  var errormsg = document.getElementById("errormsg");
  var email = document.getElementById("email");
  var regex = /^([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)@([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)[\\.]([a-zA-Z]{2,9})$/;

  if(!regex.test(email.value)){
      errormsg.style.display = 'block';
      return false;
  }
  else{
      errormsg.style.display='none';
      email.style.fontSize='15px';   
      return true;
  }
}     

/**
 * Email Validation of Footer section
 * 
 * @returns true or false
 */
function emailvalidationForFooter(){
  var errormsgtext = document.getElementById("errormsgtext");
  var footer_email = document.getElementById("footer_email");
  var regex = /^([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)@([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)[\\.]([a-zA-Z]{2,9})$/;

  if(!regex.test(footer_email.value)){
    errormsgtext.style.display = 'block';
    return false;
  }
  else{
    errormsgtext.style.display='none';   
    return true;
  }
}  