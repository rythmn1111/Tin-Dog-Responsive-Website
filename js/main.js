// FORM POST
function post() {
  var comment = $('#userComment').val();
  var name = $('#userName').val();
    if(comment && name) {
      $.ajax ({
        type: 'post',
        url: 'post_comment.php',
        data: {
          user_comm: comment,
          user_name: name
        },
        success: function(response) {
          $('#all_comments').prepend( response );
          $('#userComment').val('');
          $('#userName').val('');
        }
      });
    }
  return false;
  }

$(document).ready(function() {
  'use strict';
  // RANDOM IMAGE ON DOCUMENT LOAD
  var images = ['img/cartman.png','img/stan.png','img/kyle.png'];
  $('#image').attr('src',images[Math.floor(Math.random()*images.length)]);
  // RANDOM IMAGE ON BUTTON CLICK OR ENTER
  $('#submitForm').on('submit',function(e) {
//    var userComment = $('#userComment').val();
//    var timeStamp = new Date();
//    $('ul').prepend('<li>' + userComment + '<br>' + '<span>' + timeStamp + '</span>' + '</li>');
//    $('#userComment').val('');
    $('#image').attr('src',images[Math.floor(Math.random()*images.length)]);
    e.preventDefault();
  });
});


// INSTANT COMMENT INSIDE BUBBLE
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope) {
  $scope.comment = "";
});
