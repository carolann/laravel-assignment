function post(url, method, data, callbackfn, completefn){
    $.ajax({
           type: method,
           url: url,
           headers: {'Authorization' : localStorage.headers},
           success: function (data) {
              callbackfn(data);
           },
           error: function (error) {
               // handle error
           },
           complete: function (data) {
               if(completefn != undefined) completefn(data);
           },
           async: true,
           data: data,
           cache: false,
           timeout: 60000
       });
   }