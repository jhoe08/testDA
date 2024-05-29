(()=>{
  
  let loginBtn = document.querySelector('#loginBtn')

  if (loginBtn) {
    loginBtn.addEventListener('click', function(e){
      console.log(e)
      changeTextAnimate(this, 'Redirecting...', 'Login Complete')
      // e.preventDefault();

    });
  }
})();