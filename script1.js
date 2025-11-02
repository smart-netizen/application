
$(function() {
  $('#regForm').on('submit', function(e){
   
    const name = $('#full_name').val().trim();
    const email = $('#email').val().trim();

    if (!name) {
      alert('Please enter your full name.');
      $('#full_name').focus();
      e.preventDefault();
      return false;
    }
    if (!email) {
      alert('Please enter your email address.');
      $('#email').focus();
      e.preventDefault();
      return false;
    }
   
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      alert('Please enter a valid email address.');
      $('#email').focus();
      e.preventDefault();
      return false;
    }
    
    $('#submitBtn').text('Submitting...').prop('disabled', true);
    return true;
  });
});
