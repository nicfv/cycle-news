'use strict';
console.log('reading js');


var hamburger = document.querySelector('#open');
var hamburgerClose = document.querySelector('#close');


var mobileReports = document.querySelector('#mobileRep');
var mobileAbout = document.querySelector('#mobileAbt');
var mobileContact = document.querySelector('#mobileContact');



// Mobile Navigation Click
hamburger.addEventListener('click', function() {
  document.querySelector('#mobileNav').style.display = 'block';
  document.querySelector('#open').style.display = 'none';
  document.querySelector('#close').style.display = 'flex';
});

hamburgerClose.addEventListener('click', function() {
  document.querySelector('#mobileNav').style.display = 'none';
  document.querySelector('#open').style.display = 'block';
  document.querySelector('#close').style.display = 'none';
});

// Mobile Navigation Hovers For Submenu
mobileReports.addEventListener('mouseover', function() {
  document.querySelector('#reports').style.display = 'block';
});

mobileReports.addEventListener('mouseout', function() {
  document.querySelector('#reports').style.display = 'none';
})

mobileAbout.addEventListener('mouseover', function() {
  document.querySelector('#mobileabout').style.display = 'block';
});

mobileAbout.addEventListener('mouseout', function() {
  document.querySelector('#mobileabout').style.display = 'none';
})

mobileContact.addEventListener('mouseover', function() {
  document.querySelector('#mobilecont').style.display = 'block';
});

mobileContact.addEventListener('mouseout', function() {
  document.querySelector('#mobilecont').style.display = 'none';
})
