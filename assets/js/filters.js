/* --------------------------------------------------------------- *
*                           search artists                         *
* ---------------------------------------------------------------- */
app.filter('search_artists', function($log) {
  return function(input, query) {
    // return all artists if nothing in query box
    if (!query) return input;

    //split query terms by space character
    var terms = query.split(' ');
    var output = [];

    // iterate through input array
    input.forEach(function(artist){
      var found = false;
      passTest = true;

      // iterate through terms found in query box
      terms.forEach(function(term){
       
        // if all terms are found set boolean to true
        found = (artist.fname.toLowerCase().indexOf(term.toLowerCase()) > -1) 
          || (artist.lname.toLowerCase().indexOf(term.toLowerCase()) > -1);
        
        passTest = passTest && found;
      });

      // Add artist to output array only if passTest is true -- all search terms were found in artist
      if (passTest) { output.push(artist); }
    });

    return output;
  }
});

/* --------------------------------------------------------------- *
*                           search products                        *
* ---------------------------------------------------------------- */
app.filter('search_products', function($log) {
  return function(input, query) {
    // return all artists if nothing in query box
    if (!query) return input;

    //split query terms by space character
    var terms = query.split(' ');
    var output = [];

    // iterate through input array
    input.forEach(function(product){
      var found = false;
      passTest = true;

      // iterate through terms found in query box
      terms.forEach(function(term){
       
        // if all terms are found set boolean to true
        found = (product.fname.toLowerCase().indexOf(term.toLowerCase()) > -1) 
          || (product.lname.toLowerCase().indexOf(term.toLowerCase()) > -1)
          || (product.title.toLowerCase().indexOf(term.toLowerCase()) > -1);
        
        passTest = passTest && found;
      });

      // Add product to output array only if passTest is true -- all search terms were found in product
      if (passTest) { output.push(product); }
    });

    return output;
  }
});