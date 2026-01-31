// ==================== Main Script ====================
(function ($) {
  // Chạy khi DOM sẵn sàng
  $(function () {
    const currentUrl = window.location.href;

    // ==================== CKEditor ====================
    ["content", "short"].forEach(function (baseId) {
      var textareas = document.querySelectorAll(
        "textarea[id^='" + baseId + "']"
      );

      textareas.forEach(function (el) {
        var langId = el.id.split("_").pop();
        CKEDITOR.replace(el.id, {
          language: langId === "2" ? "en" : "vi", // tùy theo lang_id
          removePlugins: "exportpdf",
          height: 600,
        });
      });
    });

    // ==================== Slug ====================
    function slugify(str) {
      return str
        .toLowerCase()
        .normalize("NFD")
        .replace(/[\u0300-\u036f]/g, "")
        .replace(/[đð]/g, "d")
        .replace(/[^a-z0-9\s-]/g, "")
        .trim()
        .replace(/\s+/g, "-")
        .replace(/-+/g, "-");
    }

    // Auto slug theo từng ngôn ngữ
    $(".title-input").on("input", function () {
      const lang = $(this).data("lang");
      const slugInput = $(`.slug-input[data-lang="${lang}"]`);

      // chỉ auto nếu chưa sửa tay
      if (!slugInput.data("edited")) {
        slugInput.val(slugify($(this).val()));
      }
    });

    // Khi tự chỉnh slug => đánh dấu đã sửa
    $(".slug-input").on("input", function () {
      $(this).data("edited", true);
    });

    // ==================== Checkbox tree ====================
    const parentCheckboxes = $('input[name="parentids[]"]');

    function checkAncestors(parentId) {
      let pid = parentId;
      while (pid && pid != 0) {
        const parent = parentCheckboxes.filter('[value="' + pid + '"]');
        parent
          .prop("checked", true)
          .attr("data-autocheck", "1")
          .prop("disabled", true);
        pid = parent.data("parent");
      }
    }

    function uncheckChildren(parentId) {
      parentCheckboxes
        .filter('[data-parent="' + parentId + '"]')
        .each(function () {
          $(this)
            .prop("checked", false)
            .removeAttr("data-autocheck")
            .prop("disabled", false);
          uncheckChildren($(this).val());
        });
    }

    parentCheckboxes.on("change", function () {
      const current = $(this);
      const currentId = current.val();
      const currentParent = current.data("parent");
      if (current.is(":checked")) {
        parentCheckboxes
          .not(current)
          .prop("checked", false)
          .removeAttr("data-autocheck")
          .prop("disabled", false);
        checkAncestors(currentParent);
      } else {
        uncheckChildren(currentId);
      }
    });

    parentCheckboxes.filter(":checked").each(function () {
      const pid = $(this).data("parent");
      if (pid && pid != 0) checkAncestors(pid);
    });

    // ==================== Form Submit ====================
    // $("#ArticleForm").on("submit", function (e) {
    //   const titleInput = $("#title_1");
    //   if (!titleInput.val().trim()) {
    //     e.preventDefault();
    //     titleInput.css("border", "1px solid #007bff");
    //     alert("Vui lòng nhập tiêu đề!");
    //     titleInput.focus();
    //     $("html, body").animate(
    //       { scrollTop: titleInput.offset().top - 100 },
    //       300
    //     );
    //     return false;
    //   } else {
    //     titleInput.css("border", "");
    //   }

    //   updateAllSlugs();

    //   $('input[name="parentids[]"][data-autocheck="1"]').prop("disabled", true);
    // });

    // ==================== Chọn tất cả ====================
    const checkAll = $("#checkAll");
    const items = $(".c-item");
    if (checkAll.length) {
      checkAll.on("change", function () {
        items.prop("checked", this.checked);
      });
      items.on("change", function () {
        checkAll.prop(
          "checked",
          items.toArray().every((i) => i.checked)
        );
      });
    }

    // ==================== AutoNumeric / Format giá ====================
    if ($(".autoNumeric").length)
      $(".autoNumeric").autoNumeric("init", { aSep: ".", aDec: "none" });
    $(".InputPrice").on("input", function () {
      const number = this.value.replace(/\D/g, "");
      this.value = number ? Number(number).toLocaleString("vi-VN") : "";
    });

    // ==================== Button actions ====================
    function ajaxButton(selector, urlSuffix, dataMapper, onSuccess) {
      $(document).on("click", selector, function () {
        const btn = $(this);
        const data = dataMapper(btn);

        // Nếu hàm dataMapper trả về false thì hủy
        if (data === false) return;

        const url = currentUrl + urlSuffix;

        $.ajax({
          url,
          type: "POST",
          data,
          dataType: "json",
          success: function (res) {
            onSuccess(res, btn);
          },
          error: function (xhr, status, error) {
            console.error(xhr.responseText);
            alert("Lỗi kết nối máy chủ: " + error);
          },
        });
      });
    }

    // --- XÓA 1 DÒNG ---
    ajaxButton(
      ".btnDeleteRow",
      "&act=dellistajax",
      (btn) => {
        if (!confirm("Bạn có chắc muốn xoá mục này không?")) return false;
        return { cid: btn.data("id") };
      },
      function (res, btn) {
        if (res.success) {
          $("#orderMsg")
            .addClass("show")
            .html('<span><i class="fa fa-check"></i> Xoá thành công!</span>');
          location.reload();
          let row = btn.closest("tr");
          if (!row.length) row = btn.closest(".item");
          if (!row.length) row = btn.closest(".gallery-item");

          if (row.length) {
            row.fadeOut(300, function () {
              $(this).remove();
            });
          } else {
            console.warn("Không tìm thấy phần tử để xoá");
          }

          setTimeout(() => $("#orderMsg").removeClass("show"), 2000);
        } else {
          alert(res.message || "Lỗi khi xoá!");
        }
      }
    );

    // --- XÓA NHIỀU DÒNG ---
    ajaxButton(
      "#btnDelete",
      "&act=dellistajax",
      () => {
        const ids = $('input[name="cid[]"]:checked')
          .map((_, el) => $(el).val())
          .get();

        if (ids.length === 0) {
          alert("Vui lòng chọn ít nhất một mục để xoá!");
          return false;
        }

        if (!confirm("Bạn có chắc muốn xoá các mục đã chọn không?"))
          return false;

        return { cid: ids.join(",") };
      },
      function (res) {
        if (res.success) {
          location.reload();
          $('input[name="cid[]"]:checked').each(function () {
            const id = $(this).val();
            const row = $('tr[data-id="' + id + '"]');
            if (row.length) {
              row.fadeOut(300, function () {
                $(this).remove();
              });
            }
          });
        } else {
          alert(res.message || "Không thể xoá các mục đã chọn!");
        }
      }
    );

    ajaxButton(
      "#btnRefresh",
      "&act=refreshlistajax",
      () => {
        const ids = $('input[name="cid[]"]:checked')
          .map((_, el) => $(el).val())
          .get();
        return { cid: ids.join(",") };
      },
      (res) => {
        if (res.success) location.reload();
        else alert(res.message || "Lỗi không xác định");
      }
    );

    $("#btnAddnew").on("click", function () {
      const comp = $(this).data("comp") || 0;
      window.location.href =
        currentUrl + "&act=add" + (comp ? "&comp=" + comp : "");
    });

    ajaxButton(
      ".btnUpdateNum",
      "&act=updatenumajax",
      (btn) => {
        // 🟡 Thông báo xác nhận
        if (!confirm("Bạn có chắc muốn làm mới không?")) return false;

        // Lấy toàn bộ giá trị trong các input class="numInput"
        const nums = $(".numInput")
          .map((_, el) => $(el).val())
          .get();

        // Lấy id của nút bấm (nếu có)
        const id = btn.data("id") || 0;

        return {
          id, // gửi id của nút
          num: nums, // gửi mảng num[]
        };
      },
      function (res) {
        if (res.success) {
          $("#orderMsg")
            .addClass("show")
            .html(
              '<span><i class="fa fa-check"></i> ✅ Cập nhật thành công!</span>'
            );

          setTimeout(() => $("#orderMsg").removeClass("show"), 1000);
          location.reload();
        } else {
          alert(res.message || "Lỗi khi cập nhật num!");
        }
      }
    );
    ajaxButton(
      "#saveOrderBtn",
      "&act=order",
      (btn) => {
        // 🟡 Thông báo xác nhận
        if (!confirm("Bạn có chắc muốn làm mới không?")) return false;

        // Lấy toàn bộ giá trị trong các input class="numInput"
        const ids = $(".numInput")
          .map((_, el) => $(el).closest("tr").data("id"))
          .get();

        const nums = $(".numInput")
          .map((_, el) => $(el).val())
          .get();
        return {
          id: ids,
          num: nums,
        };
      },
      function (res) {
        if (res.success) {
          $("#orderMsg")
            .addClass("show")
            .html(
              '<span><i class="fa fa-check"></i> ✅ Cập nhật thành công!</span>'
            );

          setTimeout(() => $("#orderMsg").removeClass("show"), 1000);
          location.reload();
        } else {
          alert(res.message || "Lỗi khi cập nhật num!");
        }
      }
    );
    //=======upload image đại diện======================

    const inputs = document.querySelectorAll(".img-thumb-input");
    if (inputs) {
      const preview = document.getElementById("preview-img");
      const current = document.getElementById("current-img");
      inputs.forEach((input) => {
        input.addEventListener("change", function () {
          const file = this.files[0];
          if (!file) {
            if (preview) preview.style.display = "none";
            if (current) current.style.display = "block";
            return;
          }

          if (!file.type.startsWith("image/")) {
            alert("Vui lòng chọn đúng định dạng ảnh (JPG, PNG, GIF)!");
            this.value = "";
            return;
          }

          const reader = new FileReader();
          reader.onload = function (e) {
            if (preview) {
              preview.src = e.target.result;
              preview.style.display = "block";
            }
            if (current) current.style.display = "none";
          };
          reader.readAsDataURL(file);
        });
      });
    }

    // ==================== Upload & Preview nhiều image ====================
    ////////di chuyển vị trí ảnh////////////////
    const gallery = document.querySelector(".preview-gallery");
    if (gallery) {
      // Khởi tạo SortableJS
      Sortable.create(gallery, {
        animation: 200,
        easing: "cubic-bezier(0.25, 1, 0.5, 1)",
        ghostClass: "sortable-ghost",
        swapThreshold: 0.65,
        onEnd: function () {
          collectGalleryNums(); // gọi luôn
        },
      });
    }

    function collectGalleryNums() {
      $(".preview-gallery .gallery-item").each(function (i) {
        const id = $(this).data("id");
        const num = i + 1; // thứ tự mới
        $(this).find("input[name='num_old[]']").val(num);
        $(this).find("input[name='id_old[]']").val(id);
      });
    }
    // Khi chọn nhiều ảnh mới

    let dt = new DataTransfer(); // quản lý file mới

    // Upload ảnh mới
    const $multiimages = $("#multiimages"); // jQuery object
    //const multiimages = document.getElementById("multiimages");
    if ($multiimages.length) {
      $multiimages.on("change", function () {
        const preview = $(".preview-gallery");

        for (const file of this.files) {
          if (!file.type.startsWith("image/")) continue;

          dt.items.add(file); // thêm vào DataTransfer

          const reader = new FileReader();
          reader.onload = function (e) {
            const html = `
              <div class="gallery-item" data-name="${file.name}">
                <img src="${e.target.result}">
                <div class="overlay">
                  <button type="button" class="remove-image">X</button>
                </div>
              </div>
            `;
            preview.append(html);
          };
          reader.readAsDataURL(file);
        }

        // cập nhật lại input
        this.files = dt.files;
      }); // Xóa ảnh

      // Trước khi submit form, rebuild file mới theo thứ tự DOM
      $("#ArticleForm").on("submit", function () {
        const newDt = new DataTransfer();
        $(".preview-gallery .gallery-item").each(function () {
          const name = $(this).data("name");
          if (name) {
            for (let i = 0; i < dt.files.length; i++) {
              if (dt.files[i].name === name) {
                newDt.items.add(dt.files[i]);
                break;
              }
            }
          }
        });
        dt = newDt;
        $("#multiimages")[0].files = dt.files;
      });
    }
    $(document).on("click", ".remove-image", function () {
      const galleryItem = $(this).closest(".gallery-item");
      const id = galleryItem.data("id");

      if (id) {
        // ảnh cũ → xóa bằng Ajax
        if (!confirm("Bạn có chắc muốn xóa ảnh này?")) return;
        $.post(
          "index.php?do=articlelist&act=deleteimage",
          { id },
          function (res) {
            if (res.success) galleryItem.remove();
            else alert("Xóa thất bại!");
          },
          "json"
        );
      } else {
        // ảnh mới → remove khỏi DataTransfer
        const name = galleryItem.data("name");
        for (let i = 0; i < dt.items.length; i++) {
          if (dt.items[i].getAsFile().name === name) {
            dt.items.remove(i);
            break;
          }
        }
        galleryItem.remove();
        multiimages[0].files = dt.files;
      }
    });
    /////////////////////MENU LEFT/////////////////////////
    $(".nav-toggle").on("click", function (e) {
      e.preventDefault();

      const $parent = $(this).closest(".nav-item");
      const $submenu = $parent.find(".list-sidebar");

      // Đóng các menu khác
      $(".list-sidebar").not($submenu).slideUp(200);
      $(".nav-item").not($parent).removeClass("active");

      // Toggle menu hiện tại
      $parent.toggleClass("active");
      $submenu.stop(true, true).slideToggle(200);
    });
    // ====== Khi click menu con ======
    $(document).on("click", ".list-sidebar a", function () {
      const href = $(this).attr("href");
      const $parent = $(this).closest(".nav-item");

      // Lưu trạng thái vào sessionStorage
      sessionStorage.setItem("activeMenuHref", href);
      sessionStorage.setItem("activeMenuParent", $parent.index());
    });

    // ====== Khi load lại trang ======
    const activeHref = sessionStorage.getItem("activeMenuHref");
    if (activeHref) {
      // Tìm link trùng với URL đã lưu
      const $activeLink = $(`.list-sidebar a[href='${activeHref}']`);
      if ($activeLink.length) {
        // Mở menu cha
        const $parent = $activeLink.closest(".nav-item");
        $parent.addClass("active");
        $parent.find(".list-sidebar").show();

        // Đánh dấu link con
        $(".list-sidebar a").removeClass("active");
        $activeLink.addClass("active");
      }
    }

    // ==================== Xóa trạng thái menu khi logout ====================
    $(document).on("click", 'a[href*="act=log_out"]', function () {
      sessionStorage.removeItem("activeMenu");
      sessionStorage.removeItem("activeSubmenu");
    });

    // Khi load trang login hoặc log_out
    if (
      window.location.href.includes("do=login") ||
      window.location.href.includes("act=log_out")
    ) {
      sessionStorage.removeItem("activeMenu");
      sessionStorage.removeItem("activeSubmenu");
    }
    /////////////////active-///////////////
    $(document).on("click", ".btn_toggle", function () {
      const btn = $(this);
      const id = btn.data("id");
      const table = btn.data("table");
      const column = btn.data("column");
      const currentValue = parseInt(btn.data("active"), 10);
      const newValue = currentValue === 1 ? 0 : 1;
      const msg = newValue === 0 ? "Ẩn" : "Hiển thị";

      if (confirm(`Bạn muốn ${msg}?`)) {
        $.ajax({
          type: "POST",
          url: "/admindir/functions/toggle.php",
          data: {
            id: id,
            value: newValue,
            table: table,
            column: column,
          },
          success: function () {
            // cập nhật lại UI
            btn.data("active", newValue);
            btn.find("img").attr("src", "images/" + newValue + ".png");
            btn
              .removeClass("btn-success btn-danger")
              .addClass(newValue === 1 ? "btn-success" : "btn-danger");
          },
          error: function (xhr, status, error) {
            alert("Lỗi AJAX: " + error);
          },
        });
      }
    });
    /////CẬP NHẬT TÊN
    // Bấm vào tên -> chuyển sang ô input
    $(document).on("click", ".editable-name .view-text", function () {
      const span = $(this).closest(".editable-name");
      span.find(".view-text").hide();
      span.find(".edit-input").show().focus();
    });

    // Nhấn Enter hoặc blur -> lưu AJAX
    $(document).on("keypress", ".editable-name .edit-input", function (e) {
      if (e.which === 13) {
        e.preventDefault();
        saveQuickEdit($(this));
      }
    });
    $(document).on("blur", ".editable-name .edit-input", function () {
      saveQuickEdit($(this));
    });
    function saveQuickEdit(input) {
      const span = input.closest(".editable-name");
      const id = span.data("id");
      const lang = span.data("lang");
      const newValue = input.val().trim();
      const oldValue = span.find(".view-text").text().trim();

      if (newValue === oldValue || newValue === "") {
        input.hide();
        span.find(".view-text").show();
        return;
      }

      $.ajax({
        url: "/admindir/functions/update_name.php",
        method: "POST",
        data: { id: id, lang: lang, name: newValue },
        dataType: "json",
        success: function (res) {
          if (res.success) {
            span.find(".view-text").text(newValue);
          } else {
            alert("❌ " + res.message);
            input.val(oldValue);
          }
          input.hide();
          span.find(".view-text").show();
        },
        error: function () {
          alert("Không thể cập nhật!");
          input.hide();
          span.find(".view-text").show();
        },
      });
    }
    ///////////////CẬP NHẬT GIÁ
    $(document).on("blur", ".editable-price", function () {
      let $this = $(this);
      let id = $this.data("id");
      let price = $(this).text().replace(/[^\d]/g, "");
      price = parseInt(price) || 0;

      $.ajax({
        url: "/admindir/functions/update_price.php",
        type: "POST",
        dataType: "json",
        data: { id: id, price: price },
        success: function (res) {
          if (res.success) {
            $this.text(new Intl.NumberFormat("vi-VN").format(price) + "₫");
            $this.css("background", "#e8ffe8");
            setTimeout(() => $this.css("background", ""), 600);
          } else {
            alert(res.message || "Không thể cập nhật giá");
          }
        },
        error: function (xhr) {
          console.error(xhr.responseText);
          alert("Lỗi AJAX khi cập nhật giá!");
        },
      });
    });
    // ✅ Xử lý Enter để blur (kích hoạt AJAX)
    $(document).on("keydown", ".editable-price", function (e) {
      if (e.key === "Enter") {
        e.preventDefault(); // ngăn xuống dòng
        $(this).blur(); // tự động blur => kích hoạt AJAX update
      }
    });
  }); // end ready
})(jQuery);
document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".tags-group").forEach((group) => {
    const lang = group.dataset.lang;
    const tagsInput = group.querySelector(`.tagsInput[data-lang="${lang}"]`);
    const tagInput = group.querySelector(`.tagInput[data-lang="${lang}"]`);
    const tagsWrapper = group.querySelector(
      `.tagsWrapper[data-lang="${lang}"]`
    );

    if (!tagsInput || !tagInput || !tagsWrapper) return;

    let tags = [];
    try {
      tags = JSON.parse(tagsInput.value); // parse JSON
      if (!Array.isArray(tags)) tags = [];
    } catch (e) {
      tags = [];
    }

    function renderTags() {
      tagsWrapper.innerHTML = "";
      tags.forEach((label) => {
        const div = document.createElement("div");
        div.className = "tag";
        div.textContent = label;

        const closeBtn = document.createElement("span");
        closeBtn.className = "remove-tag";
        closeBtn.textContent = "×";
        closeBtn.onclick = () => {
          tags = tags.filter((t) => t !== label);
          renderTags();
        };

        div.appendChild(closeBtn);
        tagsWrapper.appendChild(div);
      });

      tagsInput.value = JSON.stringify(tags);
    }

    tagInput.addEventListener("keydown", (e) => {
      if (e.key === "Enter" || e.key === ",") {
        e.preventDefault();
        const value = tagInput.value.trim();
        if (value && !tags.includes(value)) {
          tags.push(value);
          renderTags();
        }
        tagInput.value = "";
      }
    });

    tagInput.addEventListener("paste", (e) => {
      e.preventDefault();
      const paste = (e.clipboardData || window.clipboardData).getData("text");
      paste.split(/[\n,]+/).forEach((item) => {
        const value = item.trim();
        if (value && !tags.includes(value)) tags.push(value);
      });
      renderTags();
    });

    renderTags(); // render tag cũ ngay khi load page
  });
});

document.addEventListener("DOMContentLoaded", function () {
  // tất cả các tab: tab-list + các mirror
  const allTabs = document.querySelectorAll(".tab-list .tab, .tab-mirror .tab");
  const mainTabs = document.querySelectorAll(".tab-list .tab"); // tab chính
  const contents = document.querySelectorAll(".tab-content");

  mainTabs.forEach((tab) => {
    tab.addEventListener("click", function () {
      const langId = this.getAttribute("data-lang");

      // Active tất cả các tab (tab chính + mirror) cùng lang
      allTabs.forEach((t) => t.classList.remove("active"));
      allTabs.forEach((t) => {
        if (t.getAttribute("data-lang") === langId) {
          t.classList.add("active");
        }
      });

      // Active content tương ứng
      contents.forEach((c) => {
        c.classList.remove("active");
        if (c.getAttribute("data-lang") === langId) {
          c.classList.add("active");
        }
      });
    });
  });

  const form = document.getElementById("frmEdit");
  if (form) {
    form.addEventListener("keydown", function (e) {
      // Nếu nhấn Enter và KHÔNG phải textarea → chặn submit
      if (e.key === "Enter" && e.target.tagName.toLowerCase() !== "textarea") {
        e.preventDefault();
        return false;
      }
    });
  }
});
///Tạo password cho bài viết
$(".btnPassword").click(function () {
  let id = $(this).data("id");
  $("#article_id").val(id);
  loadPasswords(id);
  $("#generatedBox").hide();
  $("#passwordModal").show();
});

$("#passwordModal").on("click", function () {
  closeModal();
});
$(".modal-content").on("click", function (e) {
  e.stopPropagation();
});
function closeModal() {
  $("#passwordModal").hide();
}

function loadPasswords(articleId) {
  $.get(
    "/admindir/functions/article_password_list.php",
    {
      article_id: articleId,
    },
    function (html) {
      $("#passwordList").html(html);
    }
  );
}

$("#btnGeneratePassword").click(function () {
  $.post(
    "/admindir/functions/article_password_generate.php",
    { article_id: $("#article_id").val() },
    function (data) {
      if (!data.success) {
        alert(data.message);
        return;
      }

      $("#generatedBox").show();
      $("#generatedPassword").val(data.password);
      loadPasswords($("#article_id").val());
    },
    "json" // 🔥 QUAN TRỌNG
  );
});

function deletePassword(id) {
  $.post(
    "/admindir/functions/article_password_delete.php",
    {
      id: id,
    },
    function () {
      loadPasswords($("#article_id").val());
    }
  );
}

function copyPassword() {
  navigator.clipboard.writeText(
    document.getElementById("generatedPassword").value
  );
}
function copyRowPassword(btn, text) {
  var tempInput = document.createElement("textarea");
  tempInput.value = text;
  tempInput.style.position = "fixed";
  tempInput.style.opacity = "0";

  document.body.appendChild(tempInput);
  tempInput.select();

  var success = false;
  try {
    success = document.execCommand("copy");
  } catch (e) {}

  document.body.removeChild(tempInput);

  if (success) {
    var oldText = btn.innerHTML;
    btn.innerHTML = "✓ Đã copy";
    btn.disabled = true;

    setTimeout(function () {
      btn.innerHTML = oldText;
      btn.disabled = false;
    }, 1500);
  }
}
//////
var wrapper = document.getElementById("product-code-wrapper");
if (wrapper) {
  var productIndex = 0;
  var items = wrapper.querySelectorAll(".product-code");
  items.forEach(function (item) {
    var idx = parseInt(item.dataset.index || 0);
    if (idx > productIndex) productIndex = idx;
  });
  // event delegation
  wrapper.addEventListener("click", function (e) {
    // ➕ thêm màu
    if (e.target.classList.contains("add-variant")) {
      var productDiv = e.target.closest(".product-code");
      var variantWrapper = productDiv.querySelector(".variant-wrapper");
      var pIndex = productDiv.dataset.index;
      var vIndex = variantWrapper.children.length;

      var variantHTML = `
      <div class="variant-item">
      <div class="variant-handle" draggable="true">⇅</div>
       <!-- sort order -->
      <input type="hidden"
           class="variant-sort"
           name="products[${pIndex}][variants][${vIndex}][sort_order]"
           value="${vIndex}" />
      <div class="variant-item-flex">
         <input type="text"
               name="products[${pIndex}][variants][${vIndex}][color_name]"
               placeholder="Tên màu (Đỏ, Xanh...)"/>
                 <input type="text" class="price-input"
               name="products[${pIndex}][variants][${vIndex}][price]"
               placeholder="Giá"/>
        <div class="remove-variant">✖</div>
        </div>
       <div class="variant-item-flex">
           <input type="color"
               class="color-picker"
               name="products[${pIndex}][variants][${vIndex}][color_code]"
               value="#000000"/>

        <input type="text"
               class="color-code-text"
               value="#000000"
               style="width:90px"
               placeholder="#HEX"/>
               </div>
       <div class="color-upload-box">
            <strong>Ảnh màu: <span class="color-label">#000000</span></strong>
            <input type="file"
              name="images[000000][]"
              multiple
              accept="image/*">
              <div class="image-preview"></div>
          </div>
            </div>
    `;

      variantWrapper.insertAdjacentHTML("afterbegin", variantHTML);
    }
    // ❌ xoá toàn bộ variant-item
    if (e.target.classList.contains("remove-variant")) {
      var variantItem = e.target.closest(".variant-item");
      if (variantItem) {
        var wrapper = variantItem.closest(".variant-wrapper");

        variantItem.remove();

        // cập nhật lại sort_order
        // updateVariantSort(wrapper);
      }
    }
    // ❌ xoá MÃ sản phẩm
    if (e.target.classList.contains("remove-product")) {
      var productCode = e.target.closest(".product-code");
      if (!productCode) return;

      if (!confirm("Xoá mã sản phẩm này và toàn bộ màu + giá?")) return;

      productCode.remove();
    }
  });
  // 🎨 ĐỒNG BỘ MÀU ↔ MÃ HEX
  wrapper.addEventListener("input", function (e) {
    // đổi color → cập nhật text
    if (e.target.classList.contains("color-picker")) {
      var parent = e.target.closest(".variant-item");
      parent.querySelector(".color-code-text").value = e.target.value;
    }

    // nhập mã → đổi color
    if (e.target.classList.contains("color-code-text")) {
      var parent = e.target.closest(".variant-item");
      var colorInput = parent.querySelector(".color-picker");
      var val = e.target.value;

      if (/^#([0-9A-F]{3}){1,2}$/i.test(val)) {
        colorInput.value = val;
      }
    }
    if (e.target.classList.contains("price-input")) {
      var value = e.target.value.replace(/\D/g, ""); // chỉ lấy số

      if (value === "") {
        e.target.value = "";
        return;
      }

      e.target.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
    // ///đổi màu thì đổi mã màu của ảnh theo
    // if (!e.target.classList.contains("color-picker")) return;

    // var variantItem = e.target.closest(".variant-item");
    // var hex = e.target.value;
    // var key = hex.replace("#", "");

    // // lưu màu
    // variantItem.dataset.color = key;

    // // update text
    // variantItem.querySelector(".color-code-text").value = hex;
    // variantItem.querySelector(".color-label").textContent = hex;

    // // update name input file
    // variantItem.querySelector("input[type=file]").name = `images[${key}][]`;
    if (!e.target.classList.contains("color-code-text")) return;
    syncVariantColor(e.target.closest(".variant-item"), e.target.value);
  });
  wrapper.addEventListener("input", function (e) {
    if (!e.target.classList.contains("color-picker")) return;

    const variantItem = e.target.closest(".variant-item");
    syncVariantColor(variantItem, e.target.value);
  });
  // 📋 copy / paste từ bên ngoài
  wrapper.addEventListener("paste", function (e) {
    if (!e.target.classList.contains("color-code-text")) return;

    setTimeout(() => {
      syncVariantColor(e.target.closest(".variant-item"), e.target.value);
    }, 0);
  });
  ////đổi vị trí mã sản phẩm
  let draggedCode = null;
  let draggedVariant = null;

  /* =========================
   DRAG START
========================= */
  wrapper.addEventListener("dragstart", function (e) {
    const codeHandle = e.target.closest(".product-handle");
    const variantHandle = e.target.closest(".variant-handle");

    if (codeHandle) {
      draggedCode = codeHandle.closest(".product-code");
      draggedCode.classList.add("dragging");
      return;
    }

    if (variantHandle) {
      e.stopPropagation();
      draggedVariant = variantHandle.closest(".variant-item");
      draggedVariant.classList.add("dragging-variant");
      return;
    }

    e.preventDefault();
  });

  /* =========================
   DRAG OVER
========================= */
  wrapper.addEventListener("dragover", function (e) {
    e.preventDefault();

    /* ---- DRAG PRODUCT CODE ---- */
    if (draggedCode) {
      const target = e.target.closest(".product-code");
      if (!target || target === draggedCode) return;

      const rect = target.getBoundingClientRect();
      const after = e.clientY > rect.top + rect.height / 2;
      wrapper.insertBefore(draggedCode, after ? target.nextSibling : target);
      return;
    }

    /* ---- DRAG VARIANT ---- */
    if (draggedVariant) {
      const target = e.target.closest(".variant-item");
      if (!target || target === draggedVariant) return;

      const w1 = draggedVariant.closest(".variant-wrapper");
      const w2 = target.closest(".variant-wrapper");
      if (w1 !== w2) return;

      const rect = target.getBoundingClientRect();
      const after = e.clientY > rect.top + rect.height / 2;
      w1.insertBefore(draggedVariant, after ? target.nextSibling : target);
    }
  });

  /* =========================
   DRAG END (CHỈ 1 CÁI)
========================= */
  wrapper.addEventListener("dragend", function () {
    if (draggedCode) {
      draggedCode.classList.remove("dragging");
      updateCodeSort();
      draggedCode = null;
    }

    if (draggedVariant) {
      draggedVariant.classList.remove("dragging-variant");
      updateVariantSort(draggedVariant.closest(".variant-wrapper"));
      draggedVariant = null;
    }
  });
}

function syncVariantColor(variantItem, hex) {
  if (!variantItem) return;

  if (!hex) return;

  if (!hex.startsWith("#")) hex = "#" + hex;

  // chỉ validate đúng HEX
  if (!/^#[0-9a-fA-F]{6}$/.test(hex)) return;

  hex = hex.toLowerCase();
  const key = hex.slice(1);

  variantItem.dataset.color = key;

  const picker = variantItem.querySelector(".color-picker");
  const text = variantItem.querySelector(".color-code-text");
  const label = variantItem.querySelector(".color-label");
  const file = variantItem.querySelector('input[type="file"]');

  if (picker && picker.value !== hex) picker.value = hex;
  if (text && text.value !== hex) text.value = hex;
  if (label) label.textContent = hex;
  if (file) file.name = `images[${key}][]`;
}
var addcode = document.getElementById("add-product-code");
if (addcode) {
  addcode.onclick = function () {
    productIndex++;

    var html = `
      <div class="product-code" data-index="${productIndex}" style="border:1px solid #ccc;padding:10px;margin-top:10px">
       <div class="product-handle" draggable="true">⇅</div>
      <!-- sort order -->
      <input type="hidden"
             class="code-sort"
             name="products[${productIndex}][sort_order]"
             value="${items.length}" />  
        <div class="product-code-top">
          <label>Mã sản phẩm:</label>
          <input type="text" name="products[${productIndex}][code]" placeholder="VD: IP14-128" />
          </div>
          <button type="button" class="add-variant">➕ Thêm màu</button>
        
  
        <div class="variant-wrapper"></div>
      </div>
    `;

    wrapper.insertAdjacentHTML("afterbegin", html);
  };
}

/* =========================
   SORT UPDATE
========================= */
function updateCodeSort() {
  wrapper.querySelectorAll(".product-code").forEach((el, i) => {
    const input = el.querySelector(".code-sort");
    if (input) input.value = i;
  });
}

function updateVariantSort(wrapper) {
  wrapper.querySelectorAll(".variant-item").forEach((el, i) => {
    const input = el.querySelector(".variant-sort");
    if (input) input.value = i;
  });
}

//////status don hang
$(document).ready(function () {
  $(".status-select").change(function () {
    var orderId = $(this).data("id");
    var status = $(this).val();
    var selectElem = $(this);

    $.post(
      "index.php?do=orders&act=ajax_update_status",
      { id: orderId, status: status },
      function (res) {
        res = res.trim(); // loại bỏ khoảng trắng thừa
        if (res == "ok") {
          alert("Cập nhật trạng thái thành công");
          // Update thanh tiến trình ngay
          var steps = selectElem
            .find("option")
            .map(function () {
              return $(this).val();
            })
            .get();
          var currentIndex = steps.indexOf(status);
          var iconsDiv = selectElem.next("div");
          iconsDiv.html("");
          for (var i = 0; i < steps.length; i++) {
            iconsDiv.append(
              i <= currentIndex
                ? '<span class="step"></span>'
                : '<span class="none-step"></span>'
            );
          }
          location.reload();
        } else {
          alert("Lỗi cập nhật trạng thái");
        }
      }
    );
  });
});
////update image truc tiep

document.addEventListener("change", function (e) {
  if (!e.target.classList.contains("img-input")) return;

  const file = e.target.files[0];
  if (!file) return;

  const tr = e.target.closest("tr");
  const id = tr.dataset.id;
  const imgWrap = tr.querySelector(".c-img");
  const comp = imgWrap.dataset.comp; // CHUẨN
  const img = tr.querySelector("img");

  // preview
  const reader = new FileReader();
  reader.onload = (ev) => (img.src = ev.target.result);
  reader.readAsDataURL(file);

  const formData = new FormData();
  formData.append("id", id);
  formData.append("comp", comp);
  formData.append("img_thumb_vn", file);

  fetch("/admindir/functions/update_image.php", {
    method: "POST",
    body: formData,
  })
    .then((r) => r.json())
    .then((r) => {
      if (!r.success) alert(r.message);
    });
});
