<?php include 'header.php'; ?>

<!-- 
	========================================================
	======================================================== 
	START: TABLE container -> SCHULEN DIE DAS FLS HABEN PAGE 
	========================================================
	======================================================== 
-->

<div class="grid-960" id="table">



		<!-- START: Title Table container -->
		<div class="title-container grid-800" v-show="!verified">
			<h1>SCHULEN DIE DAS FLS HABEN</h1>	
		</div><!-- END: Title Table container -->

		<!-- START: Title Order container -->
		<div class="title-container grid-800" v-show="orderVerified">
			<h1>WARENKORB</h1>	
		</div><!-- END: Title Order container -->


			<!-- START: cart start -->
			<div class="fls__filters cart-absolute" v-show="!buttonBackHide" id="cartID">
				<div class="fls__cart pos-relative">
											
					<div v-show="items.length > 0" class="cart__content pos-absolute"  @click="showCart = !showCart" v-show="!verified">
						<span class="icon-ic_cart_grey active"></span>
						<span class="sum">{{ items.length + (items.length > 0 || items.length === 0 ? "" : " Items") }}</span>
					</div>

					<!-- <div style="clear:both;margin-top:50px;"></div> -->
					<div class="cart__content" v-show="items.length === 0" @click="showCart = !showCart" v-show="!verified">
						<span class="icon-ic_cart_grey"></span>
					</div>
					
				</div>
				
				<div class="cart" v-show="showCart">
					<div v-show="items.length > 0">
						<p class="cart__header">Kurzlich hinzugefugte Artikel</p>
						<ul class="cart__container">
							<li v-for="item in items" transition="fade" class="cart__items">
								<p class="cart-text">
									
									<table>
										<tr>
											<th>{{ item.rumnummer }}</th>
											<td><img src="images/ic_remove_red.svg" alt="remove" @click="removeFromCart(item)"></td>
										</tr>

										<tr>
											<th>{{ item.farbe }}</th>
										</tr>
											
										<tr>
											<th>{{ item.laschentyp }}</th>
										</tr>
											
										<tr>
											<th>{{ item.gebaude }}</th>
											<td>
												<input type="text" :value="[[item.quantity]]">
												<span class="icon-btn_refresh rotate" @click='addAndRotate(item);'>
											</td>
										</tr>
										
									</table>
								</p>
							</li>
						</ul>
						
						<div class="cart__button-cont">
							<button class="button-cont__button" @click="orderVerified = true, verified = true, showCart = false, isHidden = true">
								<img src="images/ic_checkout.svg">ANGEBOT ANFORDERN
							</button>
						</div>

					</div>

					<div v-show="items.length === 0">
						<p>Your cart is empty!</p>
					</div>

				</div>
			</div><!-- END: cart start -->


			<!-- START: Filter section -->
			<section class="">

				<!-- START: fls__filters -->
				<div class="fls__filters" v-if="!isHidden">

		            <div class="fls__filter__header" >
						<div class="fls__indikator" @click="filterShow">filter</div>
					</div>
					
		            <!-- START: filters__content -->
		            <div class="filters__content">

						<!-- START: fls__flex -->
		                <div class="filter__flex">
							
							<!-- START: fls__radios -->
		                	<div class="fls__radios">
			                    <h3>Farbe</h3>
			                    
			                    <ul>

			                        <li>
										<input type="radio" id="radioGreen" name="marker-color" value="Gelb" @click="(setColorFilter('Grün'))">
										<label for="radioGreen"></label>
									</li>

			                        <li>
										<input type="radio" id="radioBlue" name="marker-color" value="Blau" @click="(setColorFilter('Blau'))">
										<label for="radioBlue"></label>
									</li>

			                        <li>
										<input type="radio" id="radioViolet" name="marker-color" value="Violett"  @click="(setColorFilter('Violett'))">
										<label for="radioViolet"></label>
									</li>

			                        <li>
										<input type="radio" id="radioOrange" name="marker-color" @click="(setColorFilter('Gelb'))">
										<label for="radioOrange"></label>
									</li>

			                        <li>
										<input type="radio" id="radioCrimson" name="marker-color" @click="(setColorFilter('Rot'))">
										<label for="radioCrimson"></label>
									</li>

			                        <li>
										<input type="radio" id="radioDarkOrange" name="marker-color" @click="(setColorFilter('Orange'))">
										<label for="radioDarkOrange"></label>
									</li>

			                        <li>
										<input type="radio" id="radioBordo" name="marker-color" @click="(setColorFilter('Braun'))">
										<label for="radioBordo"></label>
									</li>
			                       
			                    </ul>
								<p>{{filterColor}}</p>

		                  	</div><!-- END: fls__radios -->
						


							<!-- START: fls__checkbox -->
							<div class="fls__checkbox" id="markers">
								<h3>LASCHENTYP</h3>
								<ul class="fls__flex">
								<li>
									<input id="fls__checkbox-5" v-model="filterLabel" type="checkbox" value="Raumlasche">
									<label for="fls__checkbox-5"><img src="images/ic_kurze_laschen.svg" alt=""></label>
								</li>
								<li>
									<input id="fls__checkbox-6" v-model="filterLabel" type="checkbox" value="Kurze Laschen">
									<label for="fls__checkbox-6"><img src="images/ic_laschen.svg" alt=""></label>
								</li>
								
								</ul>
								<p>{{filterLabel}}</p>
							</div><!-- END: fls__checkbox -->


							
							<!-- START: fls__checkbox == Gebäude == -->
							<div class="fls__checkbox"> 
									<h3>Gebäude</h3>
								<ul>

									<li>
										<input id="fls__checkbox-7" type="checkbox" value="Hauptgebäude" v-model="filterBuilding">
										<label for="fls__checkbox-7">Gebäude A</label>
									</li>
									<li>
										<input id="fls__checkbox-18" type="checkbox" value="Neubau" v-model="filterBuilding">
										<label for="fls__checkbox-18">Gebäude B</label>
									</li>

									<li>
										<input id="fls__checkbox-19" type="checkbox" value="Nebengebäude" v-model="filterBuilding">
										<label for="fls__checkbox-19">Gebäude C</label>
									</li>
									<li>
										<input id="fls__checkbox-20" type="checkbox" value="Sporthalle" v-model="filterBuilding">
										<label for="fls__checkbox-20">Gebäude D</label>
									</li>
										
								</ul>
								<p>{{filterBuilding}}</p>
							</div><!-- END: fls__checkbox == Gebäude == -->


						</div><!-- END: fls__flex -->

		            </div><!-- END: filters__content -->

				</div><!-- END: fls__filters -->
				
			</section><!-- END: Filter section -->


			<!-- <div>
				<ul>
					<li v-for="row in filteredItems.slice(0, 15)">{{ row.farbe }}</li>
				</ul>
			</div> -->
			
			
	        <!-- START: Table content section -->
	        <section v-show="!verified">
		        <div class="fls__table" > 

	              	<table>

		                <thead>
		                    <tr>

		                        <th @click="sort('rumnummer')">RAUMNUMMER</th>
		                        <th @click="sort('farbe')">FARBE</th>
		                        <th @click="sort('laschentyp')">LASCHENTYP</th>
		                        <th @click="sort('gebaude')">GEBÄUDE</th>        
		                        <th>&nbsp;</th>

		                    </tr>
		                </thead>

		              	<tbody>
		            
				            <tr v-for='item in filteredItems.slice(0, 155)'>
                
				                <td>{{ item.rumnummer }}</td>
				                <td>{{ item.farbe }}</td>
				                <td>{{ item.laschentyp }}</td>
			                    <td>{{ item.gebaude }}</td>
				                <td>
			                      <div class="table__flex">

			                        <div class="table__cart" @click="addToCart(item)"><span class="icon-cart"></span></div>
			                        <div class="add">
			                            <div class="table__flex" v-if="item.quantity != 0">
			                                <div><span class="icon-ic_check"></span></div>
											<div class="counter">{{ item.quantity }}</div>
		
			                            </div>
									</div>
									
			                      </div>
			                    
			                    </td>
				         
			                </tr>   
		         
		              	</tbody>

		            </table>
	             
	          	</div><!-- END: Table content -->


				<!-- START: Pagination Bootstrap -->
				<section>
					<div class="fls__pagination">

						<template>
							<div class="overflow-auto">
								<b-pagination
									v-model="currentPage"
									:total-rows="500"
									:per-page="perPage"
									aria-controls="my-table"
								></b-pagination>
							</div>
						</template>

					</div>
				</section><!-- END: Pagination Bootstrap -->	

		</section><!-- END: Table section -->

<!-- 
	======================================================== 
	START: Order list INCLUDED
	========================================================
-->
				<?php include 'order-include.php'; ?>
<!-- 
	======================================================== 
	END: Order list INCLUDED
	========================================================
-->







    <div class="textContH mt-80">
     	<p>
     		* Falls sie eine Lasche vermissen bzw eine neue Lasche benötigen, die nicht im Verzeichnis zu finden ist, dann kontaktieren sie uns per E-mail.
     	</p>
 	</div>


</div>
<!-- 
	========================================================
	======================================================== 
	START: TABLE container -> SCHULEN DIE DAS FLS HABEN PAGE 
	========================================================
	======================================================== 
-->



<script src="js/vue/table_sort.js"></script>


<script>	

window.onscroll = function() {
	CartAddClass ()
};

var cartID 		= document.getElementById('cartID'),
	fixedCart	= cartID.offsetTop;	


function CartAddClass () {
	if (window.pageYOffset > fixedCart) {
		cartID.classList.add("pos-fixed-cart");
	} else {
		cartID.classList.remove("pos-fixed-cart");
	}
}
</script>




<script>
// UBACENO U VUE u fajlu table_sort.js funkcija se zove === filterShow === i pozivamo je u 99 liniji table.php fajla
// var filter = document.querySelector('.fls__indikator');
// function filterShow(){
//     let filterContent = document.querySelector('.filters__content');
//     filterContent.classList.toggle('showFilter');
// }

// function openClose(){
//   filter.classList.toggle('opened');
// }
// filter.addEventListener('click', openClose);
// filter.addEventListener('click', filterShow);

</script>



	<style>
	.fls__filters .cart__content .sum {
		right: 0px;
		bottom: -12px;
	}
	.pos-relative {
		position: relative;
	}
	.pos-absolute {
		position: absolute!important;
	    right: 0;
	}




		.error-m, .error-m li {
			color: red!important;
		}

		.is-invalid {
			border: solid 1px red!important;
		}

		.is-valid {
			border: solid 1px green!important;
			color: green!important;
		}

		.is-invalid-none {
			color: red!important;
			display: block!important;
		}
		.border-err {
			border: solid 1px red!important;
		}
		.border-err-good {
			border: solid 1px green!important;

		}
	</style>



<?php include 'footer.php'; ?>