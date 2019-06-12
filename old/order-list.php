<?php include 'header.php'; ?>


<!-- 
	========================================================
	======================================================== 
		START: DROPDOWN container -> BESTELL - LISTE PAGE 
	========================================================
	======================================================== 
-->
<div class="grid-960">

		<!-- START: Title container -->
		<div class="title-container grid-800">
			<h1>WARENKORB</h1>
		</div><!-- END: Title container -->

		
		<!-- START: class: ==== bg-grey === -->
		<div class="bg-grey mt-60">


			<!-- START: Table order row -->
			<section class="order-section">

				<!-- START: class: == fls__table == -->
				<div class="fls__table">
		
					<table>
		
						<thead>
							<tr>
		
								<th>RAUMNUMMER</th>
								<th>FARBE</th>
								<th>LASCHENTYP</th>
								<th>GEBÄUDE</th> 
								<th>ANZAHL</th>      
								<th>&nbsp;</th>
		
							</tr>
		
						</thead>
		
						<tbody>
						
							<tr>
			
								<td>Adalbert-Stifter-Schule</td>
								<td>Brunhildenstr. 2</td>
								<td>65189 Wiesbaden</td>
								<td>2015</td>
								<td>
								<div class="table__flex">
			
								<input type="text">
								<span class="icon-btn_refresh rotate"></span>
									
								</div>
								
								</td>
								<td><span class="icon-ic_delete"></span></td>
						
							</tr>  
									
						</tbody>
		
					</table>
					
				</div><!-- END: class: == fls__table == -->
		
			</section><!-- END: Table order row -->



			<!-- START: Input field Section -->
			<section class="fls__modal">

				<!-- START: class: == fls__input == -->
				<div class="fls__input">
					
					<!-- START: Input form -->
					<form action="">

						<ul>
							
							<li>
								<span>ANSPRECHPARTNER</span>
								<input type="text" placeholder="Ansprechpartner">
							</li>
							<li>
								<span>TELEFONNUMMER</span>
								<input type="text" placeholder="Nummer">
							</li>
							
							<li>
								<span>IHRE E-MAIL ADRESSE</span>
								<input type="text" placeholder="Enter e-mail address">
							</li>
							
							<!-- <li><input class="error" type="text" placeholder="error">
							<span class="error__message">E-Mail ist nicht korrekt.</span>
							</li>
							<li><input class="good" type="text" placeholder="good"></li> -->
							
				
						</ul>
	
					
						<!-- START: Radio buttons -->
						<div class="fls__radio filter__radios__basic">

							<!-- START: Text container -->
							<div class="textContH pb-20">
								<p>
									Wollen Sie die Beklebung selbst vornehmen?
								</p>
							</div><!-- END: Text container -->

							<form action="#">

								<ul>

									<li>
										<input type="radio" id="test1" name="radio-group" checked="">
										<label for="test1">Ja</label>
									</li>

									<li>
										<input type="radio" id="test2" name="radio-group">
										<label for="test2">Nein</label>
									</li>


								</ul>
								
							</form>
						</div><!-- END: Radio buttons -->



						<!-- START: Text field -->
						<form>
							<ul>
								<li>
									<span>KOMMENTAR</span>
									<textarea name="" rows="5" placeholder="Komentar"></textarea>
								</li>
							</ul>
							
						</form><!-- END: Text field -->




						<!-- START: Button form -->
						<form>
							<div class="fls__button">
							
								<input id="gdpr-button" type="submit" value="Senden" disabled="">
								
							</div>
						</form><!-- END: Button form -->
						

					</form><!-- END: Input form -->
					

		
				</div><!-- END: class: == fls__input == -->
			
		</section><!-- START: Input field Section -->
	</div><!-- END: class: ==== bg-grey === -->




</div>
<!--    
	========================================================
	======================================================== 
		END: DROPDOWN container -> BESTELL - LISTE PAGE 
	========================================================
	======================================================== 
-->


<script>
var iconRotate = document.querySelector('.rotate');
console.log(iconRotate);

iconRotate.addEventListener('click', rotateIcon);
function rotateIcon(){
     iconRotate.classList.toggle('down');
}
</script>


<?php include 'footer.php'; ?>