function showDateTime() {
    var currentDate = new Date();
    var dateTimeString = currentDate.toLocaleString();
    var datetimeDiv = document.getElementById("datetime");
    datetimeDiv.innerHTML = "Current Date and Time: " + dateTimeString;
    setTimeout(showDateTime, 1000);
  }
  
  window.onload = function() {
    showDateTime();
  };
  // to show current time and date