function submitLogin(){
	var username=document.getElementById("user").value;
	var password=document.getElementById("pass").value;
	
	var message={};
	message['username']=username;
	message['password']=password;
	message['Controller']="Auth.php";
	

	$.ajax({
			type:"POST",
			url:"https://web.njit.edu/~hmd9/Codelet/Router.php?",
			data:{request: JSON.stringify(message)},
			success:function(results){
				$('#results').html(results);
			}
	});

}