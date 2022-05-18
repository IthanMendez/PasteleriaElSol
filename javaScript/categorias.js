$(document).ready(function(){
   document.cookie='idCat=0';
   $('#cat').change(function(){
     var value = $(this).val();
     document.cookie='idCat='+value+'';
     $('#products').load(location.href +' #products');
   });
 });
 