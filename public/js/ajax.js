


 $(document).ready(function(){
function add(){
 var name=$('#name').val();
 var address=$('#address').val();
var token=$('input[name=_token]').val();

 $.ajax({
 	type : 'POST',
 	url : '/people',
 	data : { token:token,name:name,address:address}
 })


 }

 });