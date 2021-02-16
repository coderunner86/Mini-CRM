  //current progress
  var currProgress_ps = 0;
  //is the task complete
  var done_ps = false;
  //total progress amount
  var total = 100;
  //function to update progress
  function startProgress_ps() {
     //get the progress element
      var prBar_ps = document.getElementById("prog-ps");
      //get the start button
      var startButt_ps = document.getElementById("startBtn-ps");
      //get the textual element
      var val_ps = document.getElementById("numValue_ps");
   
      //disable the button while the task is unfolding
      startButt_ps.disabled=true;
      //update the progress level
      prBar_ps.value = currProgress_ps;
      

      //update the textual indicator
      val_ps.innerHTML = Math.round((currProgress_ps/total)*100)+"%";
      //increment the progress level each time this function executes
      currProgress_ps++;
      //check whether we are done yet
      if(currProgress_ps>100) done_ps=true;
      //check whether we are done yet
      if(!done_ps)
          setTimeout("startProgress_ps()", 100);
      //task done, enable the button and reset variables
      else
      {
          document.getElementById("startBtn-ps").disabled = false;
          done_ps = false;
          currProgress_ps = 0;
      }
  }