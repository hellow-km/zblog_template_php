$(function () {
  // 全选，反选
  $('#admin-table #selected_all').click(function () {
    $('input.selected_row').prop('checked', $(this).is(':checked'));
  });

  // 批量修改选中
  $('#update_button').click(function () {
    if (setCheckedItemsIds('update') && confirm('确定修改选中内容的属性吗 ？')) {
      $('#update_form').submit();
    }
  });

  // 批量删除选中
  $('#delete_button').click(function () {
    if (setCheckedItemsIds('delete') && confirm('确定删除选中内容吗 ？')) {
      $('#update_form').submit();
    }
  });

  function setCheckedItemsIds(type) {
    var selectedRows = $('input.selected_row:checked');

    if (!selectedRows.length) {
      alert('请选择要处理的文章');
      return false;
    }

    var postIds = '';

    selectedRows.each(function () {
      postIds += $(this).val() + ',';
    });

    $('input[name="handle_type"]').val(type);
    $('input[name="post_ids"]').val(postIds);

    return true;
  }

  $('#admin-table td.action span.del').click(function () {
    if (confirm('确定删除该内容吗 ?')) {
      var delete_url = $(this).attr('delete_url');
      var token = $('input[name="csrfToken"]').val();
      window.location.href = delete_url + '&csrfToken=' + token;
    }
  });
});
