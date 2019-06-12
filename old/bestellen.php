<?php include 'header.php'; ?>

<!-- 
	========================================================
	======================================================== 
				START: DROPDOWN container -> BESTELLEN PAGE 
	========================================================
	======================================================== 
-->
<div class="grid-960">


	<!-- START: Title container -->
	<div class="title-container grid-800">
		<h1>BESTELLEN</h1>
	</div><!-- END: Title container -->
	


	<!-- START: Text container -->
	<div class="textContH pb-40">
		<p>
			Nach der Eingabe, wird Ihnen ein Link geschickt, der Sie zum Shop der jeweiligen Schule führt. Dort können Sie die gewünschten Laschen nachbestellen.
		</p>

		<p class="pt-20">
			Sie können auch eine PDF herunterladen und die benötigten Elemente per Fax bestellen.
		</p>
	</div><!-- END: Text container -->




	<!-- START: class: ==== bg-grey === -->
	<div class="bg-grey">
	
		<!-- START: Dropdown 1 Section container -->
		<section>

	       	<div class="custom-select">
	       		<div class="selectTitle pb-20">
	       			<h2>STADT WÄHLEN</h2>
	       		</div>
	            <select>
	                <option value="0">Select car:</option>
	                <option value="1">Audi</option>
	                <option value="2">BMW</option>
	                <option value="3">Citroen</option>
	                <option value="4">Ford</option>
	                <option value="5">Honda</option>
	                <option value="6">Jaguar</option>
	                <option value="7">Land Rover</option>
	                <option value="8">Mercedes</option>
	                <option value="9">Mini</option>
	                <option value="10">Nissan</option>
	                <option value="11">Toyota</option>
	                <option value="12">Volvo</option>
	            </select>

	 	</section><!-- END: Dropdown 1 Section container -->




		<!-- START: Dropdown 2 Section container -->
		<section>
			
	       	<div class="custom-select">
	       		<div class="selectTitle mb-20">
	       			<h2>SCHULE WÄHLEN</h2>
	       		</div>
	            <select>
	                <option value="0">Select car:</option>
	                <option value="1">Audi</option>
	                <option value="2">BMW</option>
	                <option value="3">Citroen</option>
	                <option value="4">Ford</option>
	                <option value="5">Honda</option>
	                <option value="6">Jaguar</option>
	                <option value="7">Land Rover</option>
	                <option value="8">Mercedes</option>
	                <option value="9">Mini</option>
	                <option value="10">Nissan</option>
	                <option value="11">Toyota</option>
	                <option value="12">Volvo</option>
	            </select>

	 	</section><!-- END: Dropdown 2 Section container -->


		<!-- START: Input field and button Section container -->
	 	<section class="fls__modal">
	            <div class="fls__input">
	    
	              <form action="">
	                <ul>
	                  
	                    <li>
	                        <span>IHRE E-MAIL ADRESSE</span>
	                        <input type="text" placeholder="idle & filled">
	                    </li>
	                    
	                    <!-- <li><input class="error" type="text" placeholder="error">
	                    <span class="error__message">E-Mail ist nicht korrekt.</span>
	                    </li>
	                    <li><input class="good" type="text" placeholder="good"></li> -->
	                    
	                </ul>
	              
	                
	                <div class="fls__button">
	                  
	                    <input id="gdpr-button" type="submit" value="Senden" disabled>
	                    
	                </div>
	            
	                

	                <div class="fls__gdpr fls__checkbox">
	                        <input id="gdpr" type="checkbox" value="value3">
	                        <label for="gdpr">Ich habe die Datenschutzerklärung zur 
	                            Kenntnis genommen und bin mit Ihrer Geltung einverstanden.</label>

	                </div>

	              </form>
	    
	            </div>
	    

	        
	     </section><!-- END: Input field and button Section container -->
     </div><!-- END: class: ==== bg-grey === -->


     <div class="textContH mt-80">
     	<p>
     		Wir senden Ihnen gerne Musterproben zu. Pro Türmarker berechnen wir 20,00 € zuzüglich Mwst. und Versandkosten.
     	</p>
     </div>

 </div>
<!--    
		========================================================
		======================================================== 
				END: DROPDOWN container -> BESTELLEN PAGE 
		========================================================
		======================================================== 
-->


<script>

// Select Lists

var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < selElmnt.length; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h;
        
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
  
	    
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);

// Additions By Strahinja 02/04
var activeSelect = document.querySelector('.select-selected');
console.log(activeSelect);
function activeSelect() {
    activeSelect.innerHTML="testiranje";
}
activeSelect.addEventListener('click', activeSelect);


// GDPR Checkbox

var gdpr = document.getElementById('gdpr');

gdpr.addEventListener("change", gdprCheck);

function gdprCheck(){
    let gdprButton = document.getElementById('gdpr-button')
    gdprButton.disabled = !this.checked;
}


</script>

<?php include 'footer.php'; ?>
