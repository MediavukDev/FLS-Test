

var table = new Vue({
    el: '#table',
    data: {
      // Hide - Show 
      isHidden: false,
      isHback: false,
      finishedHidden: false,
      orderVerified: false,
      verified: false,
      buttonBackHide: false,

      // Table functions
      rows: [],
      currentSort: 'name',
      currentSortDir: 'asc',
      pageSize: 15,
      currentPage: 1,
        // BOOTSTRAP
        perPage: 13,
        // END: BOOTSTRAP
      // END: Table functions


      // Add to cart
      items: [],
      showCart: false,
      quantity: 1,
      // END: Add to cart


      // Validation form

        // errors: [],
        attemptSubmit: false,
        // reg: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/,

      // END: validation form

      newOrder: {
        contact: "",
        number: "",
        email: "",
        check: "",
        numberOrder: "",
        comment: "",
      },
   


      // Filters
      // checked: {
      //   categories: [],
      //   radio: '',
      // },

      filterColor: '',
      filterLabel: [],
      filterBuilding: [],
      // END: filters

      // Order finish
      order: [],
      // EDN: Order finish

    },

    // fetch table from Database
    created: function tableShow() {
        axios.get('php-scripts/table/table-fetch.php')
        .then(function (response) {
           table.rows = response.data;
          //  console.table(table.rows);
        })
        .catch(function (error) {
           console.log(error);
        })
    },
    // END: fetch table from Database



    /* 
      ======================                 ======================
      ====================== START: Computed ======================
      ======================                 ======================
    */
    computed:{
      // Sort function -> use 
      sortedRows: function() {
        return this.rows.sort((a,b) => {
          let modifier = 1;
          if(this.currentSortDir === 'desc') modifier = -1;
          if(a[this.currentSort] < b[this.currentSort]) return -1 * modifier;
          if(a[this.currentSort] > b[this.currentSort]) return 1 * modifier;
          return 0;
        }).filter((row, index) => {
          let start = (this.currentPage-1)*this.pageSize;
          let end = this.currentPage*this.pageSize;
          if(index >= start && index < end) return true;
        });
        // END: Sort function
        
      },
      

      
      // Filter COLOR
      filteredItems: function() {
        let checkedFilter = [];
        
        // IF click on color filter show clicked filter rows
        if (this.filterColor !== '' && this.filterLabel !== '' && this.filterBuilding !== '') {
          this.rows.forEach( item => {
            if (this.filterColor === item.farbe || this.filterLabel.includes(item.laschentyp) || this.filterBuilding.includes(item.gebaude)) {
              checkedFilter.push(item);
            }
          });
        } else {// Show all rows in table
          return this.sortedRows;
        } // END: Show all rows in table


        //END: IF click on color filter show clicked filter rows
        return checkedFilter; 
      },
      // END: Filter COLOR




    
      // Cart function (count total)
      total: function() {
        var total = 0;
        for (var i = 0;i < this.items.length; i++) {
          total += this.items[i].laschentyp;
        }
        return total;
      },
      // END: Cart function (count total)


      // Validation form Functions
      validateFunct: function () {

        var errorContact = document.getElementById('contact-error');
        var contactInput = document.getElementById('contact');

        var numberInput  = document.getElementById('number');
        var errorNumber  = document.getElementById('number-error');

        var emailInput  = document.getElementById('email');
        var errorEmail  = document.getElementById('email-error');

        var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

        if (this.newOrder.contact === ''  || 
            this.newOrder.number === '' || 
            this.newOrder.email === '' || !re.test(emailInput.value)) {
          errorContact.classList.add('is-invalid-none');
          contactInput.classList.add('border-err');
          
          errorNumber.classList.add('is-invalid-none');
          numberInput.classList.add('border-err');
          
          errorEmail.classList.add('is-invalid-none');
          emailInput.classList.add('border-err');

          this.finishedHidden = false;
          return false;

        } else {
          errorContact.classList.remove('is-invalid-none');
          contactInput.classList.add('border-err-good');  

          errorNumber.classList.remove('is-invalid-none');
          numberInput.classList.add('border-err-good');
          
          errorEmail.classList.remove('is-invalid-none');
          emailInput.classList.add('border-err-good');

          this.finishedHidden = true;
          this.verified = false;
          return true;
        }

      }
      // END: Validation form Functions   

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
        setColorFilter: function(color) {
          this.filterColor    = color;
          console.log(color);
        },

        // setLabelFilter: function(label) {
        //   this.filterLabel.push(label);
        //   console.log(label);
        // },

        // setBuildingFilter: function(building) {
        //   this.filterBuilding.push(building);
        //   console.log(building);
        // },



        // Rotate icon 
        rotate: function () {
          var iconRotate = document.querySelector('.rotate');
          console.log(iconRotate);

          iconRotate.addEventListener('click', rotateIcon);
          function rotateIcon(){
            iconRotate.classList.toggle('down');
          }
        },
        // END: Rotate icon



        // Sort function
        sort: function(s) {
            if (s === this.currentSort) {
              this.currentSortDir = this.currentSortDir === 'asc' ? 'desc':'asc';
            }
            this.currentSort = s;
        }, 
        // END: Sort function



        // Pagination
        nextPage:function() {
          if((this.currentPage * this.pageSize) < this.rows.length) this.currentPage++;
        },
        prevPage:function() {
          if(this.currentPage > 1) this.currentPage--;
        },
        // END: Pagination
        



    // ======= Validation form Functions =======
        // Add order
        addOrder: function () {
          var formData = table.toFormData(table.newOrder);
          axios.post('php-scripts/add/add.php?action=added', formData)
            .then(function(response){
              console.log(response);
            });
            return true;
        },    
        // END: Add order


        // Add order labels
        addOrderLabels: function () {
          var formDataLabels = table.toFormData(table.items);
          axios.post('php-scripts/add/add-order.php?action=added', formDataLabels)
            .then(function(response){
              console.log(response);
            });
            return true;
        },    
        // END: Add order labels
        

        // Pick -->addOrder<-- and -->validateForm<-- FUNCTIONS
        OrderValidate: function () {
          if (this.validateFunct) {
            this.addOrderLabels();
            this.addOrder(); 
            this.orderVerified = false; 
            this.verified = true;
            this.isHidden = true;
            this.buttonBackHide = true;
          }
        },


        // In -->addOrder<-- function
        toFormData: function(obj) {
          var form_data = new FormData();
          for (var key in obj) {
            form_data.append(key, obj[key]);
          }
          return form_data;
        },
    // ======= END: Validation form Functions =======



       // cart function (Add)
        addToCart(item) {
          var found = false;
          item.quantity++;
          
          this.items.forEach(itema => {
            if (itema.id === item.id) {
              found = true;
            }
          });
          if (found === false) {
            this.items.push(item);
            console.log("Added -> ", item);
          }
        },
        // END: cart function (Add)


        addRotataCart: function(item) {
          item.quantity++;
        },
    
        // (Remove)
        removeFromCart: function (item) {
          // item.quantity = 0;
          this.items.splice(this.items.indexOf(item), 1);
          console.log("Removed -> ", item);  
          
          return item.quantity = 0;
        },
        // END: (Remove)


        // Order list rotate button (icon)
        addAndRotate: function(item) {
          this.rotate();
          this.addRotataCart(item);
        },
        // END: Order list rotate button (icon)



        // Go back to table button ==> ZURÜCK <== 
        goback: function() {
            this.orderVerified = false;
            this.verified = false;
            this.isHidden = false;
        },
        // END: Go back to table button ==> ZURÜCK <==
        
        

        // START: Filters table
        filterShow: function () {
          let filterContent = document.querySelector('.filters__content');

          if (filterContent) {
            filterContent.classList.toggle('showFilter');
          } else {
            filter.classList.toggle('opened');
          }
        },
        // END: Filters table

    },
    /* ======================                ======================
      ====================== START: Methods  ======================
      ======================                 ======================
    */
   

})

