// ajx script
		function inNumRange( value ) 
{
	var digits="0123456789"
	var temp

	

	for (var i=0;i<value.length;i++){

		temp=value.substring(i,i+1)
	
		if (digits.indexOf(temp)==-1) 

		{ 
			return false
		}
	}


	return true 

}        // not allow empty
         function validateNotEmpty( input, id )
         {
            var errorDisplay =  document.getElementById( id );
		    var notEmpty;
			var strlength=input.length;
            if ( input == "" ) // check if input is empty
            {
               errorDisplay.innerHTML = "Not allow empty.";
               notEmpty = false; // update return value
            } // end if
			else if(inNumRange( input )) {
				errorDisplay.innerHTML = " Not allow empty.";
               notEmpty = false; // update return value
				}
			else if(strlength<1) {
				errorDisplay.innerHTML = " The minimum input is 2 characters.";
               notEmpty = false; // update return value
				}
            else
            {
               errorDisplay.innerHTML = ""; // clear the error area
               notEmpty = true; // update return value
            } // end else

            return notEmpty; // return whether the input is empty

         }// end function validateNotEmpty
		 function validateNotEmptyE( input, id )
         {
            var errorDisplay =  document.getElementById( id );
		    var notEmpty;
			var strlength=input.length;
            if ( input == "" ) // check if input is empty
            {
               errorDisplay.innerHTML = "Not allow empty.";
               notEmpty = false; // update return value
            } // end if
            else
            {
               errorDisplay.innerHTML = ""; // clear the error area
               notEmpty = true; // update return value
            } // end else

            return notEmpty; // return whether the input is empty

         }// end function validateNotEmptyE
		 
		  function validateCard( input, id )
         {
            var errorDisplay =  document.getElementById( id );
		    var notEmpty;
			var strlength=input.length;
            if ( input == "" ) // check if input is empty
            {
               errorDisplay.innerHTML = "Not allow empty with 16 characters.";
               notEmpty = false; // update return value
            } // end if
			else if(!inNumRange( input )) {
				errorDisplay.innerHTML = " The Card number must be numbers.";
               notEmpty = false; // update return value
				}
			else if(strlength!=16) {
				errorDisplay.innerHTML = " The card number input is 16 characters.";
               notEmpty = false; // update return value
				}
			
            else
            {
               errorDisplay.innerHTML = ""; // clear the error area
               notEmpty = true; // update return value
            } // end else

            return notEmpty; // return whether the input is empty

         }// end function validateCard
		  function validatepost( input, id )
         {
            var errorDisplay =  document.getElementById( id );
		    var notEmpty;
			var strlength=input.length;
            if ( input == "" ) // check if input is empty
            {
               errorDisplay.innerHTML = "Not allow empty.";
               notEmpty = false; // update return value
            } // end if
			else if(!inNumRange( input )) {
				errorDisplay.innerHTML = " The post code must be numerical.eg.3125";
               notEmpty = false; // update return value
				}
			else if(strlength!=4) {
				errorDisplay.innerHTML = " The post code input is 4 characters.eg.3125";
               notEmpty = false; // update return value
				}
			
            else
            {
               errorDisplay.innerHTML = ""; // clear the error area
               notEmpty = true; // update return value
            } // end else

            return notEmpty; // return whether the input is empty

         }// end function validatepost
		 function validateexpire( input, id )
         {
            var errorDisplay =  document.getElementById( id );
		    var notEmpty;
			var strlength=input.length;
            if ( input == "" ) // check if input is empty
            {
               errorDisplay.innerHTML = "Not allow empty.";
               notEmpty = false; // update return value
            } // end if
			
			else if(strlength!=2) {
				errorDisplay.innerHTML = " The expire mounth input is from 01~12.";
               notEmpty = false; // update return value
				}
			
            else
            {
               errorDisplay.innerHTML = ""; // clear the error area
               notEmpty = true; // update return value
            } // end else

            return notEmpty; // return whether the input is empty

         }// end function validateexpire
		 function validatescure( input, id )
         {
            var errorDisplay =  document.getElementById( id );
		    var notEmpty;
			var strlength=input.length;
            if ( input == "" ) // check if input is empty
            {
               errorDisplay.innerHTML = "Not allow empty.";
               notEmpty = false; // update return value
            } // end if
			else if(!inNumRange( input )) {
				errorDisplay.innerHTML = " The security code must be numbers.";
               notEmpty = false; // update return value
				}
			else if(strlength!=3) {
				errorDisplay.innerHTML = " The security code input is 3 characters.";
               notEmpty = false; // update return value
				}
			
            else
            {
               errorDisplay.innerHTML = ""; // clear the error area
               notEmpty = true; // update return value
            } // end else

            return notEmpty; // return whether the input is empty

         }// end function validatescurecode
		function validateAddress( input, id )
         {
            var errorDisplay =  document.getElementById( id );
		    var notEmpty;
			var strlength=input.length;
            if ( input == "" ) // check if input is empty
            {
               errorDisplay.innerHTML = "This is a requiered field, Please input.eg.32 xxx street xxxxxx burwood";
               notEmpty = false; // update return value
            } // end if
			else if(strlength<5) {
				errorDisplay.innerHTML = " The minimum input is 5 characters.eg.abcde123";
               notEmpty = false; // update return value
				}
            else
            {
               errorDisplay.innerHTML = ""; // clear the error area
               notEmpty = true; // update return value
            } // end else

            return notEmpty; // return whether the input is empty

         }// end function validateAddress
		 
         // validate that  the email has corect format and is allowed 
         function validateEmail( input )
         {
            if( validateNotEmptyE( input, 'emailEmptyError' ) )
            {
               if ( validateEmailFormat( input ) ) // if correct format
               {
                  // send the request for a list of emails that are not
                  // allowed ot post
                  try
                  {
                     asyncRequest = new XMLHttpRequest();

                     // register event handler
                     asyncRequest.onreadystatechange = function()
                     {
                        checkIfAllowed( input ); 
                     }; 
                     asyncRequest.open( 'GET', 'emails.xml', true ); 
                     asyncRequest.send( null ); 
                  } // end try
                  catch ( exception )
                  {
                     alert( 'Request Failed' );
                  } // end catch

               } // end if

            } // end if

         } // end function validateEmail


         // validate that the email has correct format
         function validateEmailFormat( input )
         {
            var valid = false; // tracks validity of the e-mail address
            var section = 'user'; // tracks the section of the address
            for( var i = 0; i < input.length && !valid; i++ )
            {
               // if we reach an "@" the user section is over
               
               if( section == "user" && input.charAt( i )  == '@' )
               {
                  section = "domain"; // update section variable
               } //  end if

               // if we reach a "." the domain section is over 
               else if ( section == "domain" && input.charAt( i ) == '.' )
               {
                  // if there is something after the "." the email has 
                  // valid format
                  if ( i != input.length - 1 )
                  {
                     valid = true; // update validity
                  } //  end if

               } // end else if

            } // end for

            var errorDisplay = 
               document.getElementById( 'emailFormatError' );
            
            // display error if email does not have valid format
            if ( !valid )
            {
               errorDisplay.innerHTML = "E-mail has incorrect format";
            } // end if
            else
            {
               errorDisplay.innerHTML = "";  // clear error area
            } // end else

            return valid; // return validity tracker
         }

         
         // check if the e-mail address user entered is not allowed
         // to post feedback
         function checkIfAllowed( input )
         {
            if ( asyncRequest.readyState == 4 && 
              asyncRequest.status == 200 &&  asyncRequest.responseXML )
            {
               // get the emails from the responseXML

               var emails = asyncRequest.responseXML.getElementsByTagName(
                  "email" )
               var allowed = true; // initialize return value
               

               // iterate over the list of e-mails not allowed to post
               // feedback and check if the input matches any of them

               for ( var i = 0; i < emails.length && allowed; i++ )
               {
                  var email = emails.item( i ).firstChild.nodeValue;

                  if ( input == email ) // if the input is on the list
                  {
                     allowed = false; // update return value
                  } // end if

               } //  end for

               var displayError = document.
                  getElementById( "emailNotAllowedError" );
               
               // display appropriate error message
               if( !allowed )
               {
                  displayError.innerHTML = input + 
                     " is not allowed to submnit feedback";
               } // end if

               // clear the error area
               else
               {
                  displayError.innerHTML = "";
               } // end else

            } // end if

         } // end function checkIfAllowed
