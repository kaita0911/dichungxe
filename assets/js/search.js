$(document).ready(function () {
  const baseUrl = typeof PATH_URL !== "undefined" ? PATH_URL : "";

  function updateSearchResult(html, pagination, keyword) {
    $("#viewlist").html(html);
    $("#keyworded").html(keyword);
    $("#viewpage-search").html(pagination);
  }

  function loadSearch(keyword, page = 1) {
    $.ajax({
      url: baseUrl + "tim-kiem/",
      data: { ajax: 1, keyword: keyword, page: page },
      dataType: "json",
      success: function (data) {
        if (data.success) {
          updateSearchResult(data.html, data.pagination, data.keyword);

          // Cập nhật URL dạng /tim-kiem/<keyword>/page/<page>
          let newUrl = baseUrl + "tim-kiem/" + encodeURIComponent(keyword);
          if (page > 1) newUrl += "/page/" + page;
          history.pushState({ keyword, page }, "", newUrl);
        }
      },
      error: function (err) {
        console.error("Lỗi loadSearch:", err);
      },
    });
  }
  function getKeywordAndPageFromPath(pathname) {
    const segments = pathname.split("/").filter(Boolean);
    let keyword = "",
      page = 1;
    if (segments[0] === "tim-kiem") {
      keyword = decodeURIComponent(segments[1] || "");
      const pageIndex = segments.indexOf("page");
      if (pageIndex !== -1 && segments[pageIndex + 1]) {
        page = parseInt(segments[pageIndex + 1], 10);
      }
    }
    return { keyword, page };
  }

  $("#searchForm").on("submit", function (e) {
    e.preventDefault();
    const keyword = $("#keyword").val().trim();
    if (!keyword) return;
    // Chuyển sang trang /tim-kiem/keyword → AJAX sẽ load ở trang đó
    window.location.href = baseUrl + "tim-kiem/" + encodeURIComponent(keyword);
  });
  // Click phân trang
  $(document).on("click", "#viewpage-search a", function (e) {
    e.preventDefault();
    const href = $(this).attr("href");

    const { keyword, page } = getKeywordAndPageFromPath(href);
    if (keyword) loadSearch(keyword, page);

    if (keyword) loadSearch(keyword, page);

    $("html, body").animate(
      { scrollTop: $("#viewlist").offset().top - 80 },
      500
    );
  });

  // Back/forward browser
  window.addEventListener("popstate", function (e) {
    let keyword = "",
      page = 1;
    if (e.state) {
      keyword = e.state.keyword;
      page = e.state.page;
    } else {
      const result = getKeywordAndPageFromPath(window.location.pathname);
      keyword = result.keyword;
      page = result.page;
    }
    if (keyword) loadSearch(keyword, page);
  });

  // 🔹 Load trực tiếp khi mở trang /tim-kiem/...
  const { keyword: initialKeyword, page: initialPage } =
    getKeywordAndPageFromPath(window.location.pathname);
  if (initialKeyword) {
    $("#keywordInput").val(initialKeyword); // set input hiển thị
    loadSearch(initialKeyword, initialPage);
  }
});
