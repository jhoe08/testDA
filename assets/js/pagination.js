  let tbody = document.querySelector('tbody')
  let pages = document.querySelectorAll('.page-item a')
  let currentPage = 1;
  let perPages = 20;

  if (pages) {
    // console.log(pages)?
    return; // stop the callback

    pages.forEach(page => {
      page.addEventListener('click', function(e){
        e.preventDefault();
      
        fetch("/includes/test.php", {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            function: 'pagination',
            table: 'transid',
            offset: (parseInt(this.dataset.page) - 1) * perPages, 
            perPage: perPages
          })
        })
        .then(response => {
          return response.json()
        })
        .then(data => {
          if(!data) return;
          // console.log(data)
          let html = '';

          data.forEach(transdata => {
            let {approved_budget, bac_unit, banner_program, bid_notice_title, division, fund_source, pr_classification, pr_date, product_id, remarks,requisitioner,trans_code,trans_id} = transdata;
            
            html += '<tr class="align-middle" data-id="'+product_id+'">'+
                        '<td><div id="transid-'+product_id+'" class="qrcode" title="http://test.example.com/transactions/?id='+product_id+'"></div></td>'+
                        '<td class="col-sm-6">'+
                          '<div class="">'+
                            '<h4>'+pr_classification+', <small><em>'+bac_unit+'</em></small></h4>'+
                                '<div class="d-flex align-items-center text-italic fst-italic">'+
                                    '<span class="me-2">by </span>'+
                                    '<img src="/assets/images/avatar3.png" class="avatar sm rounded-pill me-3 flex-shrink-0" alt="Customer">'+
                                    '<div>'+
                                        '<div class="h6 mb-0 lh-1">'+requisitioner+', <small>'+division+'</small></div>'+
                                    '</div>'+
                                '</div>'+
                            '<p>'+bid_notice_title+'</p>'+
                            '<p class="blockquote-footer"><strong>Remarks: </strong>'+remarks+'</p>'+
                          '</div>'+
                        '</td>'+
                        '<td><span>₱'+approved_budget+'</span></td>'+
                        '<td>'+
                          pr_date+'<span data-count="1" class="badge rounded-pill text-bg-warning text-uppercase">Received</span></td>'+
                        '<td class="text-center">'+
                          '<div class="dropdown">'+
                            '<a data-bs-toggle="dropdown" href="#" class="btn p-1" aria-expanded="false">'+
                              '<i class="bi bi-list"></i>'+
                            '</a>'+
                            '<div class="dropdown-menu dropdown-menu-end" style="">'+
                                '<a href="?id='+product_id+'" class="dropdown-item">'+
                                  '<i class="bi bi-eye"></i> View Details</a>'+
                                '<a href="print/?id=17149" class="dropdown-item">'+
                                  '<i class="bi bi-printer"></i> Print</a>'+
                                '<hr>'+
                                '<a href="#!" class="dropdown-item text-danger"><i class="bi bi-trash"></i> Delete Transactions</a>'+
                            '</div>'+
                          '</div>'+
                        '</td>'+
                    '</tr>';
          });

          tbody.innerHTML = html;
        });
      });
    })
  }

