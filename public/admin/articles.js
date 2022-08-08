(function ($){
  loadArticles();
})(jQuery);

// load users
function loadArticles(){
  $('#article-grid').jsGrid({
        filtering: true,
        width: '100%',
        height: 'auto',
        autoload: true,
        paging: true,
        pageSize: 10,
        pageIndex: 1,
        pageLoading: true,
        editing: false,
        sorting:true,
        inserting: false,
        subGrid: true,
        controller: {
            updateItem: $.noop,
            loadData: function (filter) {
                var data = $.Deferred();
                $.ajax({
                    type: "POST",
                    url: ``,
                    data: {filter}, headers: {
                        "x-csrf-token": $("[name=_token]").val()
                    },
                }).done((response) => {
                  data.resolve({ data: response.data, itemsCount: [response.total] });
                });
                return data.promise();
            },
        },

        fields: [
            {name: "id", title: 'id', type: "number", width: 5},
            {name: "title_ar", title: 'Title AR', type: "text", width: 5},
            {name: "title_en", title: 'Title EN', type: "text", width: 5},
            {name: "created_at", title: 'Created at', type: "text", width: 5},
            {
              type: "control", width: 10, editButton: false, modeSwitchButton: false, deleteButton: false,
              itemTemplate: function (value, item) {
                var $result = jsGrid.fields.control.prototype.itemTemplate.apply(this, arguments);
                var $edit = $('<a class="btn btn-block btn-info btn-xs">Edit</a>');
                $edit.attr('href',`/admin/article/edit/${item.id}`);
                return $result.add($edit);
              },
            },
            {
                type: "control", width: 10, editButton: false, modeSwitchButton: false, deleteButton: false,
                itemTemplate: function (value, item) {
                  var $result = jsGrid.fields.control.prototype.itemTemplate.apply(this, arguments);
                  var $del = $('<a class="btn btn-block btn-danger btn-xs">Delete</a>');
                  $del.on('click', function (e) {
                      e.stopPropagation();
                      e.preventDefault();
                      deleteArticle(item.id);
                  });
                return $result.add($del);
              },
            },
        ]
    });
}

//delete user
function deleteArticle(articleId){
    swal({
    title: "Are you sure?",
    text: "Are you sure you want to delete this article!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Yes",
    cancelButtonText: "No"
  }).then((result) => {
    if(result.value){
      $.ajax({
          type: "POST",
          url: `article/delete/${articleId}`,
          headers: {
              "x-csrf-token": $("[name=_token]").val()
          },
      }).done(response => {
        if(response > 0){
          swal("Deleted!", "Article deleted successfully.", "success");
          $('#article-grid').jsGrid('render');
        }
      });
    }
  });
}
