

// ----------------------------------------------------------- 
function submitForm() {
  alert("Thank you for submitting your request, someone will get back to you as soon as possible.");
  return false;
}

// -------------------------------------------------------------
document.getElementById('sndHolReq').onclick = function(){
	swal("Thanks!", "We have submitted your holiday request.", "success");
};