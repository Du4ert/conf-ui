import 'bootstrap';
import './bootstrap';
import './theme';


export default {
    init() {
      // JavaScript to be fired on all pages
      console.log('HELLO');

      let checkbox = document.getElementById("poser_radio");

      //your div
      let inputDiv = document.getElementById("poster_input");
      
      //function that will show hidden inputs when clicked
      function showInputDiv() {
        if (checkbox.checked = true) {
          inputDiv.style.display = "block";
        }
      }
      
      //function that will hide the inputs when another checkbox is clicked
      function hideInputDiv() {
        inputDiv.style.display = "none";
      }
    },
    finalize() {
      // JavaScript to be fired on all pages, after page specific JS is fired
    },
  };

