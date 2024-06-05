

(()=>{

	let printBtn = document.querySelector('.btn-print')
	let saveRemarksBtn = document.querySelector('#post_remarks')
	let updateRemarksBtn = document.querySelector('#update_remarks')
	
	let addAllBtn =  document.querySelectorAll('.addBtn')
	let updateAllBtn = document.querySelectorAll('.updateBtn')
	let deleteBtn = document.querySelectorAll('.deleteBtn')
	let transAll = document.querySelector('#transAll');

	let messageContainer = document.querySelector('#message-text');
	let titleHeader = document.querySelector('#postRemarksModalLabel')
	let resultViews = document.querySelector('.result-views');

	const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
	const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

	let transid = document.querySelectorAll('[id*="transid-"]');    
  let inputTransId = document.querySelector('#addTransactionsId');
  let itemsRegistered = document.querySelector('#itemListRegistered')
  let registerTransaction = document.querySelector('#registerTransaction')
  let searchTransaction = document.querySelector('#searchTransaction')
  let updateTransaction = document.querySelector('#updateTransaction')
  let deleteTransaction = document.querySelectorAll('.deleteTransaction')
  let removeTransaction = document.querySelectorAll('removeTransaction')
  let addTransactionsRemarks = document.querySelector('#addTransactionsRemarks')
  let automateRemarks = document.querySelector('#automateRemarks')
  let createTransaction = document.querySelector('#createTransaction')
  let loadPsuedoData = document.querySelector('#loadPsuedoData')

  // let remarks = document.querySelector('#addTransactionsRemarks');
  let closeBtn = document.querySelectorAll('.btn-close, #closeBtn')
  let forms = document.querySelectorAll('.needs-validation')

  let listTransId = []
  let { origin } = window.location;
  let ids;

	if (printBtn) {
		printBtn.addEventListener('click', function() {
			let href = this.dataset.href;
			// alert(href);
			if(href) {
				window.location.href = href;
			}
		});
	}

	if (saveRemarksBtn) {
		saveRemarksBtn.addEventListener('click', function(){
			let closeBtn = document.querySelector('#closeBtn');
			let message = document.querySelector('#message-text');
			let user_id = 1234;
			let ref_id = this.dataset.refid;

			messages = message.value;
			ref_id = Number(ref_id) ;

			if(messages === '') return;

			let params = {
				message:messages,
				ref_id,
				user_id
			};

			let container = document.querySelectorAll('[id*="remarks-"]')
			let pointer = document.querySelector('.feed-activity-list')
			let newDiv = document.createElement('div');
			newDiv.className = 'feed-element'
			newDiv.id = 'remarks-'+Math.random()
			
			fetch("/includes/save.php", {
			// fetch("/includes/database.php", {
			  method: 'POST',
		    headers: {
		        'Content-Type': 'application/json'
		    },
		    body: JSON.stringify({
		        function: 'postRemarks',
		        parameters: params
		    })
			})
			.then(response => {
				this.innerText = "Saving..."
				this.disabled = true

				setTimeout(()=>{
					this.disabled = false;
					this.innerText = "Post Remarks"
					message.value = ""
				}, 3000)

			})
			.then(data => {
				setTimeout(()=>{
					newDiv.innerHTML = 
					                    '<a href="#" class="pull-left">'+
					                    '<img alt="image" class="img-circle" src="/assets/images/avatar1.png">'+
					                    '</a>'+

					                    '<div class="media-body ">'+
					                        '<!-- <small class="pull-right text-navy">5m ago</small> -->'+
					                        '<strong>1234</strong> from <strong></strong>.<br>'+
					                        '<small class="text-muted">May 16, 2024, 4:40 pm</small>'+
					                        
					                        '<div class="well"><strong>REMARKS: </strong>'+messages+'</div>'+
                                  '<!-- Friday 17th of May 2024 10:51:11 AM -->'+
					                    '</div>';
					                
					pointer.insertBefore(newDiv, container[0]);
				}, 4000)
			});

		});
	}

	if (deleteBtn) {

		deleteBtn.forEach(function(element, index){

			element.addEventListener('click', function(e){
				e.preventDefault();
				e.stopPropagation();
				let params = {
					id: this.dataset.id,
					user_id: this.dataset.userid,
				}

				fetch("/includes/delete.php", {
				  method: 'POST',
			    headers: {
			        'Content-Type': 'application/json'
			    },
			    body: JSON.stringify({
			        function: 'deleteRemarks',
			        parameters: params
			    })
				})
				.then(response => {
					changeTextAnimate(this, 'Deleting...', 'Delete Remarks')
				})
				.then(data => {
					setTimeout(()=>{
						document.querySelector('#remarks-'+params.id).remove()
					}, 4000)
				});
			});
		});
	}

	if (addAllBtn) {
		addAllBtn.forEach(function(element, index){
			element.addEventListener('click', function(e){
				messageContainer.innerText = ''
				postRemarksModal.dataset.method = 'POST';
				saveRemarksBtn.style.display = 'block'
				updateRemarksBtn.style.display = 'none'
				titleHeader.innerText = 'New Remarks';
			})
		})
	}

	if (updateAllBtn) {
		updateAllBtn.forEach(function(element, index){
			element.addEventListener('click', function(e){
				let messageText = this.closest('.media-body').querySelector('.well .msg')

				postRemarksModal.dataset.method = 'UPDATE';
				saveRemarksBtn.style.display = 'none'
				updateRemarksBtn.style.display = 'block'
				titleHeader.innerText = 'Update Remarks';
				messageContainer.innerText = messageText.innerText;

			})
		})
	}

	if(transAll) {
		transAll.addEventListener('click', function(){
			let params = {
				// table: 'remarks',
			};

			fetch("/includes/actions.php", {
			// fetch("/includes/database.php", {
			  method: 'POST',
		    headers: {
		        'Content-Type': 'application/json'
		    },
		    body: JSON.stringify({
		        function: 'viewAllTrans',
		        parameters: params
		    })
			})
			.then(response => {
				this.innerText = "Processing..."
				this.disabled = true

				setTimeout(()=>{
					this.disabled = false;
					this.innerText = "View All"
					message.value = ""
				}, 3000)

			})
			.then(data => {
				console.log(data);
			});
		});
	}

	if(resultViews) {
		let buttons = resultViews.querySelectorAll('button')

		function clearActiveClass() {
		  buttons.forEach(button => {
		    button.classList.remove('active');
		  });
		}

		function setActive(button) {
		  clearActiveClass();
		  button.classList.add('active');
		}

		buttons.forEach(button=>{
			button.addEventListener('click', () => setActive(button))
		})
	}

	// TRANSACTIONS
	
  if(closeBtn) {
    closeBtn.forEach(btn => {
      btn.addEventListener('click', function(){
        inputTransId.value = '';
        addTransactionsRemarks.value = '';
        itemsRegistered.innerHTML = '';
      })
    });
  }


  if(transid) {
    transid.forEach(element => {
      let id = element.getAttribute('id');
      id = id.split("-");
      new QRCode("transid-"+id[1], origin+"/transactions/?id="+id[1]+" ");
    });
  }

  if(inputTransId) {
    inputTransId.addEventListener('keypress', (e) => {
      if(e.charCode === 32) {
          let value = inputTransId.value;
          ids = value.split("?id=");
          console.log(ids)
          if(ids) {
              // listTransId.push(parseInt(inputTransId.value))
              listTransId.push(ids[1] ? ids[1]: parseInt(inputTransId.value))
              itemsRegistered.setAttribute('data-searchids', JSON.stringify(listTransId))
              itemsRegistered.innerHTML = '' 
              listTransId.forEach(id=>{
                  itemsRegistered.innerHTML += '<span class="badge text-bg-light fs-6 mr-1">'+id+'</span>';
              })
          }
          // this will clear the input on the field
          inputTransId.value = ""
      }
      // console.log(e)
    })
  }

  if (registerTransaction) {
    registerTransaction.addEventListener('click', function() {
      if(listTransId.length === 0) return;

      remarks = automateRemarks.checked ? 'Dispatch' : addTransactionsRemarks.value;

      fetch("/includes/actions.php", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            function: 'registerBatchTrans',
            parameters: listTransId,
            remarks: remarks,
        })
      })
      .then(response => {
        changeTextAnimate(this, "Registering...", "Register Transactions")
        return response.json()
      })
      .then(data => {
        console.log('register transactions.js')
        console.log(data)
      });
    })
  }

  if (searchTransaction) {
    searchTransaction.addEventListener('click', function(){
      let ids = document.querySelector('[data-searchids]')
      console.log(ids)
    })
  }

  if (loadPsuedoData) {
    loadPsuedoData.addEventListener('click', function() {
      let firstname = document.querySelector('#firstname')
      let lastname = document.querySelector('#lastname')
      // let trans_id = document.querySelector('#transid')
      let trans_code = document.querySelector('#transcode')
      let approved_budget = document.querySelector('#approvedbudget')
      let pr_classification = document.querySelector('#classification')
      // let division = document.querySelector('#division')
      let banner_program = document.querySelector('#bannerprogram')
      let fund_source = document.querySelector('#fundsource')
      let bac_unit = document.querySelector('#bacunit')
      let bid_notice_title = document.querySelector('#noticetitle')
      let remarks = document.querySelector('#remarks')

      firstname.value = 'Just'
      lastname.value = 'Joe'
      // trans_id = 
      // trans_code
      approved_budget.value = 123456
      pr_classification.value = 'Goods'
      // division.value = 'PMED'
      banner_program.value = 'SAAD'
      fund_source.value = 'Bisan Asa'
      bac_unit.value = 'Others'
      bid_notice_title.value = 'To be test on the field'
      remarks.value = 'Ready to Dispatch'

      console.log('Loading details...')
    })
  }

  if (createTransaction) {
    createTransaction.addEventListener('click', function() {
      let firstname = document.querySelector('#firstname')
      let lastname = document.querySelector('#lastname')
      let requisitioner = firstname.value + " " + lastname.value;
      let parameters = {
          // trans_id : document.querySelector('#transid').value,
          trans_code : document.querySelector('#transcode').value,
          // pr_date : '',
          approved_budget : document.querySelector('#approvedbudget').value,
          pr_classification : document.querySelector('#classification').value,
          requisitioner : requisitioner, 
          // division : document.querySelector('#division').value, 
          banner_program : document.querySelector('#bannerprogram').value, 
          fund_source : document.querySelector('#fundsource').value,
          bac_unit : document.querySelector('#bacunit').value, 
          bid_notice_title : document.querySelector('#noticetitle').value, 
          remarks : document.querySelector('#remarks').value,
      }

      Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.classList.add('was-validated')
        // console.log(form)
      })

      if(!firstname.value || !lastname.value || !parameters.bid_notice_title || !parameters.remarks || !parameters.pr_classification || !parameters.approved_budget) return;

      fetch("/includes/actions.php", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            function: 'saveTransaction',
            parameters: parameters,
        })
      })
      .then(response => {
          changeTextAnimate(this, "Creating...", "Redirecting")
          return response.json()
      })
      .then(data => {
          console.log(data)
          let {id, message, status} = data;
          if(data && status==200) {
            setTimeout(()=>{
              window.location.href = '/transactions/?id=' + id
            }, 3000)
          }
      });
    })
  }

  if (deleteTransaction) {
    deleteTransaction.forEach(item => {
      let id = item.getAttribute('data-id')
      item.addEventListener('click', function(){
        let transactionDeleteModal = document.querySelector('#transactionDeleteModal')
        transactionDeleteModal.setAttribute('data-id', id)

        let yesBtn = document.querySelector('#yesbtn')
        if(yesBtn) {
          yesBtn.addEventListener('click', function(event){
            let id = this.closest('.modal.show')
            id = id.getAttribute('data-id')   
            // console.log(id)

            let parameters = {
              product_id : id
            }

            fetch("/includes/actions.php", {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/json'
              },
              body: JSON.stringify({
                  function: 'deleteTransaction',
                  parameters,
              })
            })
            .then(response => {
              changeTextAnimate(this, "Deleting...", "Successfully Deleted")
              return response.json()
            })
            .then(data => {
              
              console.log(data)
            });
          })
        }
      })
    })
  }

  if (removeTransaction) {
    removeTransaction.forEach(item =>{
      item.addEventListener('click', function(){
        let id =  this.getAttribute('data-id');
        let parameters = {
          id, 
          category: 'transactions',
          data:'',

        }
        fetch("/includes/actions.php", {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/json'
              },
              body: JSON.stringify({
                  function: 'removeTransaction',
                  parameters,
              })
            })
            .then(response => {
              changeTextAnimate(this, "Deleting...", "Successfully Deleted")
              return response.json()
            })
            .then(data => {
              
              console.log(data)
            });
      })
    })
  }

  if(updateTransaction) {
    updateTransaction.addEventListener('click', function(){

      let parameters = {
          approved_budget : document.querySelector('#approvedbudget').value,
          pr_classification : document.querySelector('#classification').value,
          banner_program : document.querySelector('#bannerprogram').value, 
          fund_source : document.querySelector('#fundsource').value,
          bac_unit : document.querySelector('#bacunit').value, 
          bid_notice_title : document.querySelector('#noticetitle').value, 
          remarks : document.querySelector('#remarks').value,
      }

      fetch("/includes/actions.php", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            function: 'updateTransaction',
            parameters: parameters,
            id: this.getAttribute('data-id')
        })
      })
      .then(response => {
          changeTextAnimate(this, "Updating...", "Update")
          return response.json()
      })
      .then(data => {
          // console.log(data)
          if(!data) return;
          let {message, status} = data;
          if(data && status==200) {
            setTimeout(()=>{
              
              const toastTrigger = document.getElementById('updateTransaction')
              const toastLiveExample = document.getElementById('liveToast')

              if (toastTrigger) {
                const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
                      toastBootstrap.show()
                
                toastLiveExample.querySelector('.toast-body').innerHTML = message
                // toastTrigger.addEventListener('click', () => {
                //   // setTimeOut(()=>{
                //     toastBootstrap.show()
                //   // }, 3000)
                  
                // })
              }

            }, 3000)
          }
          

      });

    })
  }
})();