var key="AIzaSyCRfALTO27KAX-v5LrCm2bMzppRuimHBGA";

var gplus=new function(){
	this.init=function(){

	}
	this.client_update=function(id,gid){
		$.getJSON("https://www.googleapis.com/plus/v1/people/"+gid+"?callback=?&key="+key,function(data){
			console.log(data);
			//Vf daca e user data.isPlusUser
			if(data.isPlusUser){
				alert("Eroare, utilizatorul nu exista");			
			}
			/*Actualizare tabel ws*/
			$("Cimage_"+id).html(data.image.url);
			$("Cfname_"+id).html(data.name.familyName+" "+data.name.givenName);
			
			$.ajax({
			  url: 'php/ajax.php?page=update&id='+id+'&gid='+gid+'&f='+data.name.familyName+'&n='+data.name.givenName+'&av='++data.image.url,
			  success: function(data){
			    $('.result').html(data);
			    //data.id + " "+data.gender+" "+data.name.familyName+" "+data.name.givenName+" "+data.image.url
			    
			  }
			});
		});
	}
	this.client_sterge=function(id){
		$.ajax({
			url: 'php/ajax.php?page=delete&id='+id,
			  success: function(data){
			    $('.result').html(data);
			    
			  }
		});
	}
	this.client_add=function(gid,pri){
		$.getJSON("https://www.googleapis.com/plus/v1/people/"+gid+"?callback=?&key="+key,function(data){
		if(data.isPlusUser){
			alert("Eroare, utilizatorul nu exista");			
		}
		
		$.ajax({
		url: 'php/ajax.php?page=adaugare&gid='+id+'&g='+data.gender+'&f='+data.name.familyName+'&n='+data.name.givenName+'&av='+data.image.url+'&pri='+pri,
			  success: function(data){
			    $('.result').html(data);
			    
			  }
		});
	}
}	


});
