
var key="AIzaSyCRfALTO27KAX-v5LrCm2bMzppRuimHBGA";

function client_update(id,gid){
		$.getJSON("https://www.googleapis.com/plus/v1/people/"+gid+"?callback=?&key="+key,function(data){
			console.log(data);
			//Vf daca e user data.isPlusUser
			if(data.isPlusUser){
				alert("Eroare, utilizatorul nu exista");			
			}
			
			/*Actualizare tabel ws*/
			$("Cimage_"+id).attr('src',data.image.url);
			alert('Data Imagine'+data.image.url);
			$("Cfname_"+id).html(data.name.familyName+" "+data.name.givenName);
			
			$.ajax({
			  url: 'php/ajax.php?page=update&id='+id+'&gid='+gid+'&f='+data.name.familyName+'&n='+data.name.givenName+'&av='+data.image.url,
			  success: function(data){
			    $('.result').html(data);
			   	alert("Contul clientului a fost actualizat");
			  }
			});
		});
	}
function client_sterge(id){
		$.ajax({
			url: 'php/ajax.php?page=delete&id='+id,
			  success: function(data){
			    $('.result').html(data);
			    alert("Clientul a fost sters");
			  }
		});
	}
function client_add(gid,pri){
		$.getJSON("https://www.googleapis.com/plus/v1/people/"+gid+"?callback=?&key="+key,function(data){
		if(data.isPlusUser){
			alert("Eroare, utilizatorul nu exista");			
		}
			$.ajax({
			url: 'php/ajax.php?page=adaugare&gid='+id+'&g='+data.gender+'&f='+data.name.familyName+'&n='+data.name.givenName+'&av='+data.image.url+'&pri='+pri,
				success: function(data){
				    $('.result').html(data);
				    alert("Clientul a fost adaugat cu succes!");
				}
			});
		});
	}
function client_crawl(){
		$.ajax({
			url: 'php/ajax.php?page=cron',
			  success: function(data){
			    alert("Baza de date a fost actualizata cu succes!");
			    window.location="index.php?page=posts";
			  }
		});
	}
