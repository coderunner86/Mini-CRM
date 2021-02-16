  //current progress
  var currProgress_cc = 0;
  //is the task complete
  var done_cc = false;
  //total progress amount
  var total = 100;
  //function to update progress
  function startProgress_cc() {
     //get the progress element
      var prBar_cc = document.getElementById("prog-cc");
      //get the start button
      var startButt_cc = document.getElementById("startBtn-cc");
      //get the textual element
      var val_cc = document.getElementById("numValue_cc");
   
      //disable the button while the task is unfolding
      startButt_cc.disabled=true;
      //update the progress level
      prBar_cc.value = currProgress_cc;
      

      //update the textual indicator
      val_cc.innerHTML = Math.round((currProgress_cc/total)*100)+"%";
      //increment the progress level each time this function executes
      currProgress_cc++;
      //check whether we are done yet
      if(currProgress_cc>100) done_cc=true;
      //check whether we are done yet
      if(!done_cc)
          setTimeout("startProgress_cc()", 100);
      //task done, enable the button and reset variables
      else
      {
          document.getElementById("startBtn-cc").disabled = false;
          done_cc = false;
          currProgress_cc = 0;
      }
  }