(function ($){
  let dataToSave =null;
  loadSelect2Users();
  let content_ar = $('input[name=content_ar_pre]').val();
  const editor = new EditorJS({
  holder: 'content_ar',
  tools: {
    gif: GifEditor,
  },
  onChange:() =>{
    editor.save().then((savedData) =>{
      $('input[name=content_ar_custom]').val(JSON.stringify(savedData));
      }).catch((error) =>{
          console.log("error: ",error)
      })
  }
});

$('form').on('submit',function(e){
  e.preventDefault();
  // this.submit();
})

})(jQuery);

function loadSelect2Users(){
  $('#user_id').off().on('select2:select', function (e) {
  }).select2({
      theme: 'classic',
      placeholder:'User',

      ajax: {
          url: '/api/admin/load-users',
          dataType: "json",
          method:'POST',
          cache:true,
          data: function (params) {
              var queryParameters = {
                  term: params.term
              };
              return queryParameters;
          },
          processResults: function (users) {
              return {
                  results: $.map(users, function (user) {
                      return {
                          text: user.email,
                          id: user.id
                      }
                  })
              };
          }
      }
  });
  selectDefault($('[name=selected_user]'),$('#user_id'));
}
