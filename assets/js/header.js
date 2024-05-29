
function changeTextAnimate(_this, afterText, defaultText) {
  _this.innerText = afterText
  _this.disabled = true

  setTimeout(()=>{
      _this.disabled = false;
      _this.innerText = defaultText
  }, 3000)
}