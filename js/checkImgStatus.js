const imgToChecks = document.querySelectorAll('.imgToCheck');

imgToChecks.forEach(imgToCheck => {
  if ((imgToCheck.getAttribute("src")).split('/')[2] == 0){
    imgToCheck.classList.add('noShow')
  }
});