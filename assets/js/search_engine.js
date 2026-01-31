$(function () {
  $("#search-keyword").on("input", function () {
    // console.log("⚡ Keyup chạy!");
    let keyword = $(this).val().trim();
    //console.log("Từ khóa:", keyword);
    if (keyword.length > 1) {
      $.ajax({
        url: baseUrl + "ajax/ajax_search.php",
        type: "POST",
        data: { keyword: keyword },
        success: function (data) {
          // console.log("Response:", data); // 👈 xem có HTML không
          $("#suggestions").html(data).show();
        },
      });
    } else {
      $("#suggestions").hide();
    }
  });

  // click chọn gợi ý
  $(document).on("click", "#suggestions div", function () {
    $("#search-keyword").val($(this).text());
    $("#suggestions").hide();
  });

  // click ra ngoài ẩn gợi ý
  $(document).click(function (e) {
    if (!$(e.target).closest("#search-keyword, #suggestions").length) {
      $("#suggestions").hide();
    }
  });
});
