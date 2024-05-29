// ( function () {
//   'use strict'


  let transid = document.querySelectorAll('[id*="transid-"]');    
  let inputTransId = document.querySelector('#addTransactionsId');
  let itemsRegistered = document.querySelector('#itemListRegistered')
  let registerTransaction = document.querySelector('#registerTransaction')
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
              itemsRegistered.innerHTML = '' 
              listTransId.forEach(id=>{
                  itemsRegistered.innerHTML += '<span class="badge text-bg-light fs-6 mr-1">'+id+'</span>';
              })
          }
          // this will clear the input on the field
          inputTransId.value = ""
      }
    })
  }

  if (registerTransaction) {
    registerTransaction.addEventListener('click', function() {
      // if(listTransId.length === 0) return;

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
        console.log('transactions.js' + data)
      });
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

// })