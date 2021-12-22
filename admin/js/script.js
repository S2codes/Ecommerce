/**
 * @name HttpRequest
 * @params url, request object
 * @description make ajax request and returns reponse
 */
 $(document).on('keyup keypress', 'form input[type="text"]', function(e) {
    if(e.which == 13) {
      console.log('enter pressed');
    }
  });
  
HttpRequest=function(url,request,callback){
    $.ajax({
        url:url,
        method:"POST",
        type:"POST",
        data:request,
        contentType:false,
        processData:false,
        success:function(data){
            callback(data);
        }
    })
}
HttpDataRequest=function(url,request,callback){
  $.ajax({
      url:url,
      method:"POST",
      type:"POST",
      data:request,
      success:function(data){
          callback(data);
      }
  })
}
