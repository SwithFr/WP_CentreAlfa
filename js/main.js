(function() {
  "user strict";
  var input, search;

  input = document.querySelector(".searchform__input");

  search = document.querySelector("#searchform");

  input.addEventListener('focus', function() {
    search.style.width = '100%';
    search.style.height = '100%';
    search.style.right = '0';
    search.style.backgroundColor = 'white';
    search.style.padding = '15%';
    input.style.fontSize = '3em';
    input.style.outline = 'none';
    input.style.borderTop = 'none';
    input.style.borderLeft = 'none';
    input.style.borderRight = 'none';
    input.style.borderBottom = '3px solid #8D6442';
    return input.style.padding = '.2em 0';
  }, false);

  input.addEventListener('focusout', function() {
    search.style.width = 'auto';
    search.style.height = 'auto';
    search.style.right = '2%';
    search.style.backgroundColor = 'transparent';
    search.style.padding = '0';
    input.style.fontSize = '1em';
    input.style.outline = 'initial';
    input.style.border = '1px solid #c2c2c2';
    input.style.padding = '.1em';
    return input.value = '';
  }, false);

}).call(this);
