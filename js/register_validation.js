 function validateNotEmpty( input, id )
         {
            var errorDisplay =  document.getElementById( id );
		    var notEmpty;
			var strlength=input.length;
            if ( input == "" ) 
            {
               errorDisplay.innerHTML = "Not allow empty, Please input at least 4 characters.";
               notEmpty = false; 
            } 
			else if(strlength<4) {
				errorDisplay.innerHTML = " The minimum input is 4 characters";
               notEmpty = false; 
				}
            else
            {
               errorDisplay.innerHTML = ""; 
               notEmpty = true; 
            } 
            return notEmpty;

         }// end function validateNotEmpty
		 function validatePhone( input, id )
         {
            var errorDisplay =  document.getElementById( id );
		    var notEmpty;
			var strlength=input.length;
            if ( input == "" ) 
            {
               errorDisplay.innerHTML = "Not allow empty, Please input at least 8 characters.";
               notEmpty = false; 
            } 
			else if(strlength<10) {
				errorDisplay.innerHTML = " The minimum input is 10 characters.";
               notEmpty = false; 
				}
            else
            {
               errorDisplay.innerHTML = ""; 
               notEmpty = true; 
            } 

            return notEmpty; 

         }// end function validatePhone
		function validateAddress( input, id )
         {
            var errorDisplay =  document.getElementById( id );
		    var notEmpty;
			var strlength=input.length;
            if ( input == "" ) 
            {
               errorDisplay.innerHTML = "Not allow empty.";
               notEmpty = false; 
            } 
	
            else
            {
               errorDisplay.innerHTML = ""; 
               notEmpty = true; 
            } 

            return notEmpty; 

         }// end function validateAddress
		 function validateNotEmptyE( input, id )
         {
            var errorDisplay =  document.getElementById( id );
		    var notEmpty;
			var strlength=input.length;
            if ( input == "" ) 
            {
               errorDisplay.innerHTML = "Not allow empty.";
               notEmpty = false; 
            } 
            else
            {
               errorDisplay.innerHTML = ""; 
               notEmpty = true; 
            } 

            return notEmpty; 

         }
         // validate email
         function validateEmail( input )
         {
            if( validateNotEmptyE( input, 'emailEmptyError' ) )
            {
               if ( validateEmailFormat( input ) ) 
               { 
                  try
                  {
                     asyncRequest = new XMLHttpRequest();

                     asyncRequest.onreadystatechange = function()
                     {
                        checkIfAllowed( input ); 
                     }; 
                     asyncRequest.open( 'GET', 'emails.xml', true ); 
                     asyncRequest.send( null ); 
                  } 
                  catch ( exception )
                  {
                     alert( 'Request Failed' );
                  } 
               } 
            } 
         } 
		// formate checking 
         function validateEmailFormat( input )
         {
            var valid = false; 
            var section = 'user'; 
            for( var i = 0; i < input.length && !valid; i++ )
            {
               if( section == "user" && input.charAt( i )  == '@' )
               {
                  section = "domain"; 
               }
               else if ( section == "domain" && input.charAt( i ) == '.' )
               {
                  if ( i != input.length - 1 )
                  {
                     valid = true; 
                  } 

               } 

            } 

            var errorDisplay = 
               document.getElementById( 'emailFormatError' );
            
            if ( !valid )
            {
               errorDisplay.innerHTML = "E-mail has incorrect format";
            } 
            else
            {
               errorDisplay.innerHTML = "";  
            }

            return valid; 
         }
		 // checking submit
         function checkIfAllowed( input )
         {
            if ( asyncRequest.readyState == 4 && 
              asyncRequest.status == 200 &&  asyncRequest.responseXML )
            {

               var emails = asyncRequest.responseXML.getElementsByTagName(
                  "email" )
               var allowed = true; 

               for ( var i = 0; i < emails.length && allowed; i++ )
               {
                  var email = emails.item( i ).firstChild.nodeValue;

                  if ( input == email )
                  {
                     allowed = false;
                  } 
               } 

               var displayError = document.
                  getElementById( "emailNotAllowedError" );
               if( !allowed )
               {
                  displayError.innerHTML = input + 
                     " is not allowed to submnit feedback";
               } 

               else
               {
                  displayError.innerHTML = "";
               } 
            } 
         }
		 
		