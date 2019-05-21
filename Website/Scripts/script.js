'use strict';
console.log('reading js');


var hamburger = document.querySelector('#open');
var hamburgerClose = document.querySelector('#close');


var mobileReports = document.querySelector('#mobileRep');
var mobileAbout = document.querySelector('#mobileAbt');
var mobileContact = document.querySelector('#mobileContact');

var facebook = document.querySelector('#fb');
var twitter = document.querySelector('#twitter');
var instagram = document.querySelector('#insta');
var email = document.querySelector('#mail');

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

// Share Buttons
facebook.addEventListener('mouseover', function() {
  document.getElementById('fb').src = "../media/fb-hover.png";
});

facebook.addEventListener('mouseout', function() {
  document.getElementById('fb').src = "../media/facebook.png";
});

twitter.addEventListener('mouseover', function() {
  document.getElementById('twitter').src = "../media/twitter-hover.png";
});

twitter.addEventListener('mouseout', function() {
  document.getElementById('twitter').src = "../media/twitter.png";
});

instagram.addEventListener('mouseover', function() {
  document.getElementById('insta').src = "../media/insta-hover.png";
});

instagram.addEventListener('mouseout', function() {
  document.getElementById('insta').src = "../media/instagram.png";
});

email.addEventListener('mouseover', function() {
  document.getElementById('mail').src = "../media/email-hover.png";
});

email.addEventListener('mouseout', function() {
  document.getElementById('mail').src = "../media/email.png";
});