'use strict';
console.log('reading js');

var navigation = document.querySelector('#navigation');
var hamburger = document.querySelector('#hamburger');
var topnews = document.querySelector('#topnews');

hamburger.addEventListener('click', function() {
  document.querySelector('#navigation').style.display = 'block';
  document.querySelector('#search').style.display = 'block';
  document.querySelector('#topnews').style.padding = '0';
});
