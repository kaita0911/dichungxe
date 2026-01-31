$(document).ready(function () {
  /////////////XOÁ/////////////
  $(document).on("click", ".btn-remove-item", function (e) {
    e.preventDefault();

    const key = $(this).data("key");
    const $item = $(this).closest(".cart-item");
    // 🔹 Hỏi xác nhận trước khi xoá
    if (!confirm(`Bạn có chắc muốn xoá sản phẩm khỏi giỏ hàng không?`)) {
      return; // ❌ Dừng lại nếu người dùng bấm "Hủy"
    }
    $.ajax({
      url: baseUrl + "ajax/remove_cart_item.php",
      type: "POST",
      data: { key: key },
      dataType: "json",
      success: function (res) {
        if (res.success) {
          // 🔹 Ẩn và xoá sản phẩm khỏi DOM
          $item.fadeOut(300, function () {
            $(this).remove();

            setTimeout(() => {
              updateCartSummary();

              // Cập nhật số lượng trên icon
              $("#num-cart").text(res.total_items);

              // Nếu giỏ trống
              if (res.total_items == 0) {
                $(".cart-box").hide();
                $(".cart-empty").show();
              }
            }, 100);
          });

          // ✅ Hiển thị thông báo
          showSuccessMessage("🗑️ Sản phẩm đã được xoá khỏi giỏ hàng!");
        } else {
          alert(res.message || "Không thể xoá sản phẩm.");
        }
      },
      error: function (xhr, status, error) {
        console.error("AJAX error:", status, error);
        alert("⚠️ Không thể gọi remove_cart_item.php");
      },
    });
  });

  // 🔸 Hàm hiển thị thông báo thành công
  function showSuccessMessage(message) {
    const $msg = $(`
    <div class="cart-message-success">
      ${message}
    </div>
  `).appendTo("body");

    // Hiện và tự ẩn sau 2.5s
    $msg.fadeIn(200);
    setTimeout(() => {
      $msg.fadeOut(400, function () {
        $(this).remove();
      });
    }, 2500);
  }

  // Khi nhấn nút tăng/giảm
  $(document).on("click", ".btn-qty", function () {
    const $item = $(this).closest(".cart-item");
    const $input = $item.find(".input-qty");
    let qty = parseInt($input.val()) || 1;
    const key = $input.data("key");

    const isChecked = $item.find(".cart-check-item").is(":checked");
    if (!isChecked) {
      console.log("Sản phẩm này chưa được chọn, bỏ qua update.");
      return;
    }

    if ($(this).hasClass("increase")) qty++;
    if ($(this).hasClass("decrease") && qty > 1) qty--;

    $input.val(qty);
    $.post(
      baseUrl + "ajax/update_cart_item.php",
      { key, quantity: qty },
      function () {
        updateCartSummary();
      },
      "json"
    );
  });

  ///////////Load tp, quan huyen
  // Khi chọn Tỉnh/TP
  $("#city").on("change", function () {
    const city_ID = $(this).val();

    if (city_ID) {
      $.ajax({
        type: "POST",
        url: baseUrl + "ajax/loaddistrict.php", // path_url = biến gốc của site
        data: { city_ID: city_ID },
        success: function (html) {
          $("#district").html(html);
          $("#wards").html('<option value="">Phường/Xã</option>'); // reset wards
        },
        error: function () {
          alert("Lỗi tải quận/huyện!");
        },
      });
    } else {
      $("#district").html('<option value="">Quận/Huyện</option>');
      $("#wards").html('<option value="">Phường/Xã</option>');
    }
  });

  // Khi chọn Quận/Huyện
  $("#district").on("change", function () {
    const district_ID = $(this).val();

    if (district_ID) {
      $.ajax({
        type: "POST",
        url: baseUrl + "ajax/loadphuongxa.php",
        data: { district_ID: district_ID },
        success: function (html) {
          $("#wards").html(html);
        },
        error: function () {
          alert("Lỗi tải phường/xã!");
        },
      });
    } else {
      $("#wards").html('<option value="">Phường/Xã</option>');
    }
  });
  ////////////////Dat hang
  $(function () {
    $("#formOrder").on("submit", function (e) {
      e.preventDefault();
      $("#c-loading").fadeIn(200);
      $.ajax({
        url: baseUrl + "/sources/cart.php?action=pay",
        type: "POST",
        data: $(this).serialize(),
        dataType: "json",
        success: function (res) {
          $("#c-loading").fadeOut(200); // ẩn loading
          if (res.success) {
            window.location.href = res.redirect;
          } else {
            $("#orderMessage").html("<p>" + res.message + "</p>");
          }
        },
        error: function (xhr) {
          $("#orderMessage").html(
            "<p>Lỗi: " + xhr.status + " - " + xhr.statusText + "</p>"
          );
          console.error(xhr.responseText);
        },
      });
    });
  });
});

//Tinh tổng sp đã check
$(document).on("change", ".cart-check-item", function () {
  const key = $(this).data("key");
  const checked = $(this).is(":checked") ? 1 : 0;

  $.post(
    baseUrl + "ajax/update_cart_checked.php",
    { key, checked },
    function (res) {
      if (res.success) {
        const allChecked =
          $(".cart-check-item").length === $(".cart-check-item:checked").length;
        $("#check-all-cart").prop("checked", allChecked);
        updateCartSummary(); // chỉ tính item được check
      }
    },
    "json"
  );
});

// Khi check hoặc bỏ check toàn bộ
$(document).on("change", "#check-all-cart", function () {
  const checked = $(this).is(":checked") ? 1 : 0;
  $.post(
    baseUrl + "ajax/update_cart_checked.php",
    { key: "all", checked },
    function (res) {
      if (res.success) {
        $(".cart-check-item").prop("checked", !!checked);
        updateCartSummary();
      }
    },
    "json"
  );
});

// Khi tăng/giảm số lượng
function updateCartSummary() {
  $.ajax({
    url: baseUrl + "ajax/get_cart_summary.php",
    type: "GET",
    dataType: "json",
    success: function (res) {
      if (res.success) {
        $(".cart-summary-total").text(
          res.total_old.toLocaleString("vi-VN") + "₫"
        );
        $(".cart-summary-sale").text(
          res.total_discount.toLocaleString("vi-VN") + "₫"
        );
        $(".cart-summary-quality").text(res.total_qty);
        $(".cart-pay-total").text(
          res.total_price.toLocaleString("vi-VN") + "₫"
        );
      }
    },
    error: function (xhr, status, err) {
      console.error("Lỗi lấy tổng giỏ hàng:", err);
    },
  });
}
