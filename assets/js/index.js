

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
})();