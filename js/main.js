(function() {
  "user strict";
  var btn, close, errorMsg, fHideNav, fRestoreSearchform, fShowNav, fShowSearchform, hiddenNav, input, search;

  input = document.querySelector(".searchform__input");

  search = document.querySelector("#searchform");

  btn = document.querySelector("#searchsubmit");

  close = document.querySelector("#close");

  errorMsg = document.querySelector("#errorMsg");

  hiddenNav = document.querySelector("#hiddenNav");

  fRestoreSearchform = function(submited) {
    search.style.width = 'auto';
    search.style.height = 'auto';
    search.style.right = '2%';
    search.style.backgroundColor = 'transparent';
    search.style.padding = '0';
    input.style.fontSize = '1em';
    input.style.outline = 'initial';
    input.style.border = '1px solid #c2c2c2';
    input.style.padding = '.1em';
    if (!submited) {
      input.value = '';
    }
    btn.style.width = '15px';
    btn.style.height = '15px';
    btn.style.marginLeft = '5px';
    close.style.display = 'none';
    errorMsg.innerHTML = "";
    return fHideNav();
  };

  fShowSearchform = function() {
    search.style.width = window.innerWidth + 'px';
    search.style.height = window.innerHeight + 'px';
    search.style.right = '0';
    search.style.backgroundColor = 'white';
    search.style.padding = '15%';
    input.style.fontSize = '3em';
    input.style.outline = 'none';
    input.style.borderTop = 'none';
    input.style.borderLeft = 'none';
    input.style.borderRight = 'none';
    input.style.borderBottom = '3px solid #8D6442';
    input.style.padding = '.2em 0';
    btn.style.width = '50px';
    btn.style.height = '50px';
    btn.style.marginLeft = '50px';
    close.style.display = 'inline-block';
    return fShowNav();
  };

  fShowNav = function() {
    return hiddenNav.style.display = 'block';
  };

  fHideNav = function() {
    return hiddenNav.style.display = 'none';
  };

  input.addEventListener('focus', function() {
    return window.innerWidth > 930 && fShowSearchform();
  }, false);

  close.addEventListener('click', function(e) {
    e.preventDefault();
    return fRestoreSearchform();
  }, false);

  search.addEventListener('submit', function(e) {
    var val;
    val = input.value.trim();
    window.innerWidth > 930 && fShowSearchform();
    if (val === "") {
      e.preventDefault();
      errorMsg.innerHTML = "Veuillez saisir une recherche !";
      return input.style.borderColor = "#ef5143";
    } else {
      fRestoreSearchform(true);
      return this.submit();
    }
  }, false);

}).call(this);
