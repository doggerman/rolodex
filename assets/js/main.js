'use strict';



// console.log(document.querySelector('.input'));
document.querySelector('#gear').addEventListener('click', function(){
  document.querySelector('.hide-people').style.display = "none";
  document.querySelector('.hide-socialmedia').style.display = "none";
  document.querySelector('.hide-accounts').style.display = "none";
  document.querySelector('.hide-gear').style.display = "block";
  // document.querySelector('.dropDown-content').style.display = "none";
});

document.querySelector('#people').addEventListener('click', function(){
  document.querySelector('.hide-socialmedia').style.display = "none";
  document.querySelector('.hide-accounts').style.display = "none";
  document.querySelector('.hide-gear').style.display = "none";
  document.querySelector('.hide-people').style.display = "block";
});

document.querySelector('#socialmedia').addEventListener('click', function(){
  document.querySelector('.hide-people').style.display = "none";
  document.querySelector('.hide-accounts').style.display = "none";
  document.querySelector('.hide-gear').style.display = "none";
  document.querySelector('.hide-socialmedia').style.display = "block";
});

document.querySelector('#accounts').addEventListener('click', function(){
  document.querySelector('.hide-people').style.display = "none";
  document.querySelector('.hide-socialmedia').style.display = "none";
  document.querySelector('.hide-gear').style.display = "none";
  document.querySelector('.hide-accounts').style.display = "block";
});

document.querySelector('.close').addEventListener('click', function(){
  document.querySelector('.massage').style.display = "none";
});




// document.querySelector('.error').addEventListener('click', function(){
//   // document.querySelector('.massage').style.display = "none";
// });
