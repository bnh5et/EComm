function isEmpty(){
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value; 
    var address = document.getElementById("address").value;
    var city = document.getElementbyId("city").value;
    var state = document.getElementById("state").value;
    var confirm = document.getElementById("confirm").value;
    var ccNumber = document.getElementById("ccNumber").value;
    var ccType = document.getElementById("ccType").value;
    var expiration = document.getElementById("expiration").value;
    var securityCode = document.getElementById("security").value;
    if((name || email || username || password || address
       || city || state || confirm || ccNumber || ccType || expiration
	|| securityCode) == ""){
	alert ("Please complete all fields.");
    }
}

function ccNumber(){
  /**1. Determine if cc number has odd or even number of digits
     2. If even, double alternating digits starting with the first digit.
        If odd, double alternating digits starting with the second digit.
     3. If doubling results in number with two digits, add two digits together to get number with 1 digit.
     4. Replace digits you doubled with new values and add everything up
     5. If final result divisible by 10, the card number is valid.**/
    var cc = document.getElementById("ccNumber").value;
    var digits = [];
    var doubles = []
    int d;
    if(cc%2==0){
	for(int i=0;i<cc.length();i++){
	    if(i%2!=0){
		d=2*parseInt(cc.substring(i));
		if(d>9){
		    d=(d%10)+(d/10);
		}
		doubles.push(d);
	    }
	    else{
		digits.push(parseInt(cc.substring(i));
	}
    }
	    if(cc%2!=0){
		for(int i=1;i<cc.length();i++){
		    if(i%0!=0){
			d=2*parseInt(cc.substring(i));
			if(d>9){
			    d=(d%10)+(d/10);
			}
			doubles.push(d);
		    }
		    else{
			digits.push(parseInt(cc.substring(i));
				    }
		    }
		}
		int last;
		for(int i=0;i<digits.size();i++){
		    for(int j=0;j<doubles.size();j++){
			last=digits[i]+doubles[i];
		    }
		}
		if(last%10==0){
		    return true;
		}
		else{
		    return false;
		    alert("Please enter a valid credit card number.");
		}
}