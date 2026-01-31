$(function () {
  const baseUrl = typeof PATH_URL !== "undefined" ? PATH_URL : "";
  // ----- Hàm AJAX load module -----
  function loadModule(options = {}) {
    const containerId = options.containerId;
    const paginationId = options.paginationId;
    const module = options.module;
    const comp = options.comp;
    const sub = options.sub || "";
    const cate_id = options.cate_id || "";
    const page = options.page || 1;
    const sort = options.sort || "id_desc";
    //console.log(comp);
    $.ajax({
      url: baseUrl + "ajax/ajax_module.php",
      data: { module, page, sort, comp, sub, cate_id, lang: langPrefix },
      dataType: "json",
      success: function (res) {
        if (res.success) {
          // Cập nhật danh sách và phân trang
          $("#" + containerId).html(res.html);
          $("#" + paginationId).html(res.pagination);

          // --- Cập nhật URL ---
          // let newUrl = baseUrl + langPrefix + module;
          // if (page != 1) newUrl += "/page/" + page;
          // if (sort && sort !== "id_desc") newUrl += "/sort/" + sort;
          // history.pushState({ module, sort, page }, "", newUrl);

          let newUrl = baseUrl + langPrefix + module;
          if (page != 1) newUrl += "page/" + page;
          if (sort && sort !== "id_desc") newUrl += "sort/" + sort;
          history.pushState({ module, sort, page }, "", newUrl);

          // --- Đồng bộ data-sort container ---
          $("#" + containerId).attr("data-sort", sort);

          // ✅ Đặt lại active đúng trang hiện tại
          const $pagination = $("#" + paginationId);
          $pagination.find("li").removeClass("active");
          $pagination.find("a").each(function () {
            const href = $(this).attr("href");
            const match = href.match(/page\/(\d+)/);
            const linkPage = match ? parseInt(match[1]) : 1;
            if (linkPage === page) {
              $(this).closest("li").addClass("active");
            }
          });
          // Nếu là trang 1 (URL không có /page/1)
          if (page === 1) {
            $pagination
              .find("a[href='/" + module + "']")
              .closest("li")
              .addClass("active");
          }
        }
      },
      error: function (xhr, status, error) {
        console.error("AJAX Error:", status, error);
        console.log(xhr.responseText);
      },
    });
  }

  // ----- Click phân trang -----
  $(document).on("click", "#viewpage a", function (e) {
    e.preventDefault();
    const parent = $(this).closest(".pagination");
    const containerId = parent.data("container");
    const paginationId = parent.attr("id");
    const module = parent.data("module");
    const sub = parent.data("sub");
    const cate_id = parent.data("id") || ""; // nếu không có data-id thì thành rỗng
    const comp = parent.data("comp");

    const sort =
      $("#sortSelect").val() ||
      $("#" + containerId).attr("data-sort") ||
      "id_desc";

    const href = $(this).attr("href");
    const match = href.match(/page=([0-9]+)/) || href.match(/page\/([0-9]+)/);
    const page = match ? parseInt(match[1]) : 1;

    // // ✅ Cuộn mượt lên đầu danh sách
    const viewlist = $("#viewlist");
    if (viewlist.length) {
      $("html, body").animate({ scrollTop: viewlist.offset().top }, 500);
    }

    loadModule({
      containerId,
      paginationId,
      module,
      sub,
      comp,
      cate_id,
      sort,
      page,
    });
  });

  // ----- Chọn sort -----
  $("#sortSelect").on("change", function () {
    const sort = $(this).val();
    const containerId = "viewlist";
    const paginationId = "viewpage";
    const module = $("#" + containerId).data("module");
    const sub = $("#" + containerId).data("sub");
    const cate_id = $("#" + containerId).data("id");
    const comp = $("#" + containerId).data("comp") || "";

    $("#" + containerId).attr("data-sort", sort);
    loadModule({
      containerId,
      paginationId,
      module,
      sub,
      comp,
      cate_id,
      sort,
      page: 1,
    });
  });

  // ----- Load lần đầu dựa vào URL -----
  $("[data-ajax-load]").each(function () {
    const containerId = $(this).data("container");
    const paginationId = $(this).data("pagination");
    let module = $(this).data("module") || "";
    const comp = $(this).data("comp") || "";
    const sub = $(this).data("sub") || "";
    const cate_id = $(this).data("id") || "";
    const pathname = window.location.pathname; // ví dụ: /san-pham/page/3/sort/price_desc
    // console.log(comp);
    const segments = pathname.split("/").filter(Boolean);
    // Lấy page từ URL
    const pageIndex = segments.indexOf("page");
    const pageNumber =
      pageIndex !== -1 ? parseInt(segments[pageIndex + 1], 10) : 1;
    // Lấy sort từ URL
    const sortIndex = segments.indexOf("sort");
    const sortUrl = sortIndex !== -1 ? segments[sortIndex + 1] : "id_desc";

    // Lấy module từ URL nếu chưa có
    if (!module) module = segments[0] || "";

    // Đồng bộ select + data-sort container
    $("#sortSelect").val(sortUrl);
    $("#" + containerId).attr("data-sort", sortUrl);
    // Load module lần đầu
    loadModule({
      containerId,
      paginationId,
      module,
      sub,
      cate_id,
      comp,
      sort: sortUrl,
      page: pageNumber,
    });
  });
});
