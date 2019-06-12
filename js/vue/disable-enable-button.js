


var app = new Vue({
  el: "#enableB",
  
  /*
      ======================                 ======================
      ======================   START: Data   ======================
      ======================                 ======================
  */
	data: {
		quantitytwo: 0,
    emptyTextEmail: '',
    emailRules:[],
    checkbox: 0,
    errors: [],

    country: 0,
    countries: '',
    school: 0,
    schools: ''
  },
  /*
      ======================                 ======================
      ======================    END: Data    ======================
      ======================                 ======================
  */




  /* 
    ======================                 ======================
    ====================== START: Computed ======================
    ======================                 ======================
  */
	computed: {
    // Submit button Function
    submitDisabled: function () {
      this.errors = [];
      if (!this.emptyTextEmail.length) {
        this.errors.push("");
      } 
      else if(!this.validEmail(this.emptyTextEmail)) {
        this.errors.push("E-Mail ist nicht korrekt.");        
      } 

      if(!this.errors.length || !this.checkbox.length === 0) {
        return true;
      }
    },
    // END: Submit button Function

  },
  /* 
    ======================                 ======================
    ====================== END: Computed   ======================
    ======================                 ======================
  */




  /*
    ======================                 ======================
    ====================== START: Methods  ======================
    ======================                 ======================
  */
  methods: {
    getCountries: function(){
      axios.get('php-scripts/bestellen-selectList/selectList.php', {
        params: {
          request: 'country'
        }
      })
      .then(function (response) {
         app.countries = response.data;
         
         app.schools = '';
         app.school  = 0;
         console.log(app.country);
      });
    },
    getSchool: function(){
      axios.get('php-scripts/bestellen-selectList/selectList.php', {
         params: {
           request: 'school',
           country_id: app.country
         } 
      })
      .then(function (response) {
         app.schools = response.data;

         app.school = 0;
         console.log(app.country);
      }); 
    }, 

    // Email function validation
    validEmail: function(emptyTextEmail) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(emptyTextEmail);
    },
    clickSubmit: function() {
      this.submitDisabled;
    }
    // END: Email function validation
  },
  /*
      ======================                 ======================
      ====================== END: Methods    ======================
      ======================                 ======================
  */


  // Select list Function -> When the page is loaded, the SCHOOL are displayed in the selected list
  created: function(){
    this.getCountries();
  }
  // END: Select list Function -> When the page is loaded, the SCHOOL are displayed in the selected list

})


