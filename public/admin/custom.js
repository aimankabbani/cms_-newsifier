// Default Select2 Function
function selectDefault($selected,$selector){

  if($selected != undefined && $selected.val() && $selected.val().length){
    obj = JSON.parse($selected.val());
    name = obj.email ? obj.email : obj.name ? obj.name :  obj.name_ar ? obj.name_ar : obj.title_ar ? obj.title_ar : '' ;
    data ={text:name,id:obj.id};

    var option = new Option(data.text, data.id, true, true);
    $selector.append(option).trigger('change');

    // manually trigger the `select2:select` event
    $selector.trigger({
        type: 'select2:select',
        params: {
            data: data
        }
    });
  }
}
