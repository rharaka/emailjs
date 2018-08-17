var app = angular.module('myApp', []);

app.controller('customersCtrl', function($scope, $http, $interval) {

  $scope.showForm=function(formId){
    $(".account-form").hide();
    $("#"+formId).show();
    $("#closeForm-"+formId).show();
    $(".show-"+formId).hide();
  }
  
  $scope.hideForm=function(formId){
    $("#"+formId).hide();
    $("#closeForm-"+formId).hide();
    $(".show-"+formId).show();
  }

  $scope.selectData=function(){
   $http.get("helpers/select.php")
   .then(function (response) {
      $scope.names = response.data.records;
    });
  }

  $scope.greetingData=function(){
   $http.get("helpers/greeting.php")
   .then(function (response) {
      $scope.greetings = response.data.records;
    });
  }

  $scope.loginData=function(bid){  
    var nom = "#bname"+bid;
    var email = "#bemail"+bid;
    nom = $(nom).val();
    email = $(email).val();  
    if(bid=="" || nom=="" || email=="") {
      alert("Sorry! You have to fill all inputs!");
    }
    else {
      $http.post("helpers/login.php", {
          'bid':bid,
          'bname':nom,
          'bemail':email
      }).then(function(response){
              $interval($scope.selectData(), 1000);
              alert("Data Edited Successfully");
          },function(error){
              alert("Sorry! Data Couldn't be Edited!");
              console.error(error);

          });
    }
  }

  deleteData=function(bidd){      
    $http.post("helpers/delete.php", {
        'bidd':bidd
    }).then(function(response){
            //alert(bidd);
            $interval($scope.selectData(), 1000);
            alert("Data Deleted Successfully");
        },function(error){
            alert("Sorry! Data Couldn't be deleted!");
            console.error(error);

        });
  }

  $scope.insertData=function(){

    nom = $('#bnameInsert').val();
    email = $('#bemailInsert').val();  
        
    if(nom=="" || email=="") {
      alert("Sorry! You have to fill all inputs!");
    }
    else {
      $http.post("helpers/insert.php", {
          'bname':nom,
          'bemail':email
      }).then(function(response){
              $interval($scope.selectData(), 1000);
              alert("Data Inserted Successfully");
              $("#insertForm").hide("slow");
              $("#closeForm").hide("slow");
              $("#addItem").show("slow");
              $("#bnameInsert").val("");
              $("#bemailInsert").val("");
          },function(error){
              alert("Sorry! Data Couldn't be inserted!");
              console.error(error);

          });
    }
  }

  $scope.showEdit=function(bid){
    var trsh = "#tr"+bid;
    $(".tr-hidden").hide();
    $(trsh).show();
  }
  $scope.hideEdit=function(bid){
    var trsh = "#tr"+bid;
    $(".tr-hidden").hide();
    $(trsh).hide();
  }

  $scope.showEmail=function(bid){
    var trsh = "#e-tr"+bid;
    $(".tr-hidden").hide();
    $(trsh).show();
  }
  $scope.hideEmail=function(bid){
    var trsh = "#e-tr"+bid;
    $(".tr-hidden").hide();
    $(trsh).hide();
  }

  $scope.showEmails=function(bid){
    var trsh = "#es-tr"+bid;
    $(".tr-hidden").hide();
    $(trsh).show();
  }

  $scope.hideEmails=function(bid){
    var trsh = "#es-tr"+bid;
    $(".tr-hidden").hide();
    $(trsh).hide();
  }

  $scope.showEmailsi=function(bid){
    var trsh = "#ei-tr"+bid;
    $(".tr-hidden").hide();
    $(trsh).show();
  }

  $scope.hideEmailsi=function(bid){
    var trsh = "#ei-tr"+bid;
    $(".tr-hidden").hide();
    $(trsh).hide();
  }

  $scope.showDelete=function(bbid, role){
    if(role===7){
      if(confirm("Are you sure to delete this? "))
        deleteData(bbid);
    }
    else
      alert("You have no rights to do this!")
  }

  $scope.editData=function(bid){  
    var nom = "#bname"+bid;
    var email = "#bemail"+bid;
    nom = $(nom).val();
    email = $(email).val();  
    if(bid=="" || nom=="" || email=="") {
      alert("Sorry! You have to fill all inputs!");
    }
    else {
      $http.post("helpers/edit.php", {
          'bid':bid,
          'bname':nom,
          'bemail':email
      }).then(function(response){
              $interval($scope.selectData(), 1000);
              alert("Data Edited Successfully");
          },function(error){
              alert("Sorry! Data Couldn't be Edited!");
              console.error(error);

          });
    }
  }

  $scope.disableItem=function(bid, isv){   
    if(bid=="" || isv=="") {
      alert("Sorry! there is a problem, try again later!");
    }
    else {
      $http.post("helpers/valid.php", {
          'bid':bid,
          'isv':isv
      }).then(function(response){
              $interval($scope.selectData(), 1000);
          },function(error){
              alert("Sorry! Data Couldn't be selected!");
              console.error(error);

          });
    }
  }

  $scope.sendEmail=function(bid, fid, bname, bemail){  
    var email = "#email"+bid;
    email = $(email).val();  
    if(bid=="" || fid=="" || bname=="" || bemail=="" || email=="") {
      alert("Sorry! there is a problem, try again later!");
    }
    else {
      $http.post("helpers/email.php", {
          'bid':bid,
          'fid':fid,
          'bname':bname,
          'bemail':bemail,
          'email':email
      }).then(function(response){
              $interval($scope.selectData(), 1000);
              alert("Email sent Successfully");
          },function(error){
              alert("Sorry! Email Couldn't be sent!");
              console.error(error);

          });
    }
  }

  $scope.blockEmail=function(bid, fid){  
    // alert('SELECT id FROM blocking WHERE idBlocking='+fid+' AND idBlocked='+bid);
    if(bid=="" || fid=="") {
      alert("Sorry! there is a problem, try again later!");
    }
    else {
      $http.post("helpers/block.php", {
          'bid':bid,
          'fid':fid
      }).then(function(response){
              $interval($scope.selectData(), 1000);
              alert("Email is blocked/deblocked Successfully");
          },function(error){
              alert("Sorry! Email Couldn't be blocked/deblocked!");
              console.error(error);

          });
    }
  }

  $scope.greetingData();

  $scope.selectData();

});