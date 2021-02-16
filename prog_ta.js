  //current progress
  var currProgress_ta = 0;
  //is the task complete
  var done_ta = false;
  //total progress amount
  var total = 100;
  //function to update progress
  function startProgress_ta() {
     //get the progress element
      var prBar_ta = document.getElementById("prog-ta");
      //get the start button
      var startButt_ta = document.getElementById("startBtn-ta");
      //get the textual element
      var val_ta = document.getElementById("numValue_ta");
   
      //disable the button while the task is unfolding
      startButt_ta.disabled=true;
      //update the progress level
      prBar_ta.value = currProgress_ta;
      

      //update the textual indicator
      val_ta.innerHTML = Math.round((currProgress_ta/total)*100)+"%";
      //increment the progress level each time this function executes
      currProgress_ta++;
      //check whether we are done yet
      if(currProgress_ta>100) done_ta=true;
      //check whether we are done yet
      if(!done_ta)
          setTimeout("startProgress_ta()", 100);
      //task done, enable the button and reset variables
      else
      {
          document.getElementById("startBtn-ta").disabled = false;
          done_ta = false;
          currProgress_ta = 0;
      }
  }