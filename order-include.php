
        <!-- 
            ======================================================== 
            START: Order list
            ========================================================
        -->


        <div class="checkout" v-show="orderVerified">

            <div id="arrowBack" class="filter__flex-stefan" @click="goback">
                <img src="images/iconmonstr-arrow-72.svg" alt="arrow-back">
                <p>ZURÜCK</p>
            </div>

            <!-- START: Table order row -->
            <section>

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
                        
                            <tr v-for="item in items">

                                <td>{{ item.rumnummer }}</td>
                                <td>{{ item.farbe }}</td>
                                <td>{{ item.laschentyp }}</td>
                                <td>{{ item.gebaude }}</td>
                                <td>{{ new Date().getFullYear() }}</td><!-- Show current year -->
                                <td>
                                    <div class="table__flex">

                                        <input type="text" :value="[[item.quantity]]">
                                        <span class="icon-btn_refresh rotate" @click='addAndRotate(item);'></span>
                                        
                                    </div>
                                </td>
                                <td>
                                    <img src="images/ic_remove.svg" alt="remove ordered item" @click="removeFromCart(item)">
                                </td>
                        
                            </tr>  
                                    
                        </tbody>

                    </table>
                    
                </div><!-- END: class: == fls__table == -->

            </section><!-- END: Table order row -->



            <!-- START: Input field Section -->
            <section class="fls__modal">

            <!-- START: class: == fls__input == -->
            <div class="fls__input" >
                
                <!-- START: Input form -->
                <div class="fls__form">
                    <ul>
                        
                        <li>
                            <span for="contact">ANSPRECHPARTNER</span>
                            <input type="text" id="contact" v-model="newOrder.contact" placeholder="Ansprechpartner" v-bind:class="{ 'is-invalid': attemptSubmit && missingContact }">
                            <span style="display: none;" class="error__message" id="contact-error">Field is required</span>
                            
                        </li>
                        <li>
                            <span for="number">TELEFONNUMMER</span>
                            
                            <input type="number" id="number" v-model="newOrder.number" placeholder="Nummer" v-bind:class="{ 'is-invalid': attemptSubmit && missingNumber }">
                            <span style="display: none;" class="error__message" id="number-error">Field is required</span>

                            <!-- <li v-for="error in errors">
                                <span class="error__message">{{ error }}</span>
                            </li> -->

                            
                            
                        </li>
                        
                        <li>
                            <span for="email">IHRE E-MAIL ADRESSE</span>
                            <input type="text" id="email" v-model="newOrder.email" placeholder="Inhre e-mail adresse" v-bind:class="{ 'is-invalid': attemptSubmit && missingEmail }">
                            
                            <span style="display: none;" class="error__message" id="email-error">Field is required</span>
                        </li>
                        
                    <!--
                        <li><input class="error" type="text" placeholder="error">
                            <span class="error__message">E-Mail ist nicht korrekt.</span>
                        </li>
                        <li><input class="good" type="text" placeholder="good"></li> 
                    -->
                        

                    </ul>

                
                    <!-- START: Radio buttons -->
                    <div class="fls__radio filter__radios__basic">

                        <!-- START: Text container -->
                        <div class="textContH">
                            <p>
                                WOLLEN SIE DIE BEKLEBUNG SELBST VORNEHMEN?
                            </p>
                        </div><!-- END: Text container -->

                        

                            <ul>

                                <li>
                                    <input type="radio" v-model="newOrder.check" value="ja" id="test1" name="radio-group" checked="">
                                    <label for="test1">Ja</label>
                                </li>

                                <li>
                                    <input type="radio" v-model="newOrder.check" value="nein" id="test2" name="radio-group">
                                    <label for="test2">Nein</label>
                                </li>

                            </ul>
                            
                        
                        </div><!-- END: Radio buttons -->



                    <!-- START: Text field -->
                    <ul>
                        <li>
                            <span>KOMMENTAR / KOSTENSTELLEN</span>
                            <textarea name="" rows="5" placeholder="Komentar" v-model="newOrder.comment"></textarea>
                        </li>
                    </ul>
                    <!-- END: Text field -->



                    <!-- START: Button form -->
                    <div class="fls__button">
                        <input @click="OrderValidate()" id="gdpr-button" type="submit" value="Senden">
                    </div>
                    <!-- END: Button form -->
                    
                </div><!-- END: Input form -->  

            </div><!-- END: class: == fls__input == -->

            </section><!-- START: Input field Section -->

        </div>
        <!-- 
            ======================================================== 
            END: Order list
            ========================================================
        -->
        





<!-- 
    ======================================================== 
    START: Order list INCLUDED
    ========================================================
-->
                <?php include 'finished.php'; ?>
<!-- 
    ======================================================== 
    END: Order list INCLUDED
    ========================================================
-->