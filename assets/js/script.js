jQuery( document ).ready(function() {
	/* Mobile Menu */

    jQuery("#primary-menu").mmenu({
	    "slidingSubmenus": false,
	
	    
		"extensions": [
        	"position-right",
			"theme-dark"
       ],
       "navbars": [ {
        	"title": false,
	        "position": "top",
	        "content": [
				"searchfield"
            ]
        },
        {
            "position": "top"
        },
        
        {
            "position": "bottom",
            "content": [
	           
	            "<a target='_blank' class='fab fa-facebook-f' href='#/'></a>",
	            "<a target='_blank' class='fab fa-twitter' href='#/'></a>"
            ]
        }
       ]
    });

});