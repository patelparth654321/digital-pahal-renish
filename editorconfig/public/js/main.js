$(function () {
  $(document.body).append('<div class="fixed inset-0 z-20 invisible w-screen h-screen transition-all duration-300 ease-linear bg-gray-600 opacity-0 pointer-events-auto drawer-overlay" tabindex="-1"></div>');

  $('[data-toggle="drawer"]').click(function (e) {
    var id = $(this).attr("data-target");
    $(".drawer" + id).addClass("active");
    $(".drawer" + id).attr("aria-hidden", "false");
    $("body").addClass("overflow-hidden");

    if (typeof $(".drawer" + id).attr("data-overlay") == "undefined") {
      $(".drawer-overlay").addClass("show");
    }
  });

  $('[data-dismiss="drawer"]').click(function (e) {
    $(this).parents(".drawer").removeClass("active");
    $(this).parents(".drawer").attr("aria-hidden", "true");
    $(".drawer-overlay").removeClass("show");
    $("body").removeClass("overflow-hidden");
  });

  $('[data-toggle="dropdown"]').click(function (e) {
    $(this).siblings(".dropdown-menu").toggleClass("active");
    // Close one dropdown when selecting another
    $(".dropdown-menu").not($(this).siblings()).removeClass("active");
    e.stopPropagation();
  });

  $(document).click(function (e) {
    var $trigger = $(".dropdown-toggle");
    if ($trigger !== e.target && !$trigger.has(e.target).length) {
      $(".dropdown-menu").removeClass("active");
    }
  });

  $(".accordion-header").on("click", function () {
    if ($(this).hasClass("active")) {
      $(this).removeClass("active");
      $(this).siblings(".accordion-collapse").slideUp(300);
    } else {
      $(".accordion-header").removeClass("active");
      $(this).addClass("active");
      $(".accordion-collapse").slideUp(300);
      $(this).siblings(".accordion-collapse").slideDown(300);
    }
  });

  $(document.body).append('<div class="overlay" tabindex="-1"></div>');

  $('[data-toggle="modal"]').click(function (e) {
    var id = $(this).attr("data-target");
    $(".modal" + id).addClass("active");
    $(".modal" + id).attr("aria-hidden", "false");
    $("body").addClass("overflow-hidden");
  });

  $('[data-dismiss="modal"]').click(function (e) {
    $(this).parents(".modal").removeClass("active");
    $(this).parents(".modal").attr("aria-hidden", "true");
    $("body").removeClass("overflow-hidden");
  });

  $(".tabs").on("click", ".tab-link", function (e) {
    e.preventDefault();
    $(".tab-link").removeClass("active");
    $(".tab-pane").removeClass("show");
    $(this).addClass("active");
    $($(this).attr("data-target")).addClass("show").fadeIn();
  });
});

$(document).mouseup(function (e) {
  if (!$(e.target).closest(".drawer").length) {
    $(".drawer").removeClass("active");
    $(".drawer").attr("aria-hidden", "true");
    $(".drawer-overlay").removeClass("show");
    $("body").removeClass("overflow-hidden");
  }
});

$(document).keyup(function (e) {
  if (e.keyCode === 27) {
    $(".drawer").removeClass("active");
    $(".drawer").attr("aria-hidden", "true");
    $(".drawer-overlay").removeClass("show");
    $("body").removeClass("overflow-hidden");
  }
});

$(document).keyup(function (e) {
  if (e.keyCode === 27) {
    $(".dropdown-menu").removeClass("active");
  }
});

$(document).mouseup(function (e) {
  if (!$(e.target).closest(".modal-dialog").length) {
    $(".modal").removeClass("active");
    $(".modal").attr("aria-hidden", "true");
    $(".overlay").removeClass("show");
    $("body").removeClass("overflow-hidden");
  }
});

$(document).keyup(function (e) {
  if (e.keyCode === 27) {
    $(".modal").removeClass("active");
    $(".modal").attr("aria-hidden", "true");
    $(".overlay").removeClass("show");
    $("body").removeClass("overflow-hidden");
  }
});

/* FILE INPUT */

$(function () {
  var inputs = document.querySelectorAll(".file-input");

  for (var i = 0, len = inputs.length; i < len; i++) {
    customInput(inputs[i]);
  }

  function customInput(el) {
    const fileInput = el.querySelector('[type="file"]');
    const label = el.querySelector("[data-js-label]");

    fileInput.onchange = fileInput.onmouseout = function () {
      if (!fileInput.value) return;

      var value = fileInput.value.replace(/^.*[\\\/]/, "");
      el.className += " -chosen";
      label.innerText = value;
    };
  }
});

$("#confirmDelete").unbind('click');
$(".deleteData").bind('click', function () {
  let id = $(this).attr('data-id');
  let type = $(this).attr('data-type');
  let isRefresh = $(this).attr('data-refresh');
  $("#confirmDelete").unbind('click');
  $("#confirmDelete").bind('click', function () {
    //deleteData(id, type);
    let url = config.route + '/' + type + "/delete";
    $.ajax({
      url: url,
      data: { id },
      type: "POST",
      success: function (result) {
        toastr.success(result.message);
        if (isRefresh) window.location.reload();
        else window.location.href = config.route + '/' + type;
      }
    });
  });
})

$(document).on('change', ".changeStatus", function () {
  let id = $(this).attr('data-id');
  let type = $(this).attr('data-type');
  let status = null;

  if ($(this).is(":checked")) {
    status = 1;
  } else {
    status = 0;
  }
  changeStatus(id, type, status);

})
$(document).on('click', ".documentChangeStatus", function () {
  let id = $(this).attr('data-id');
  let type = $(this).attr('data-type');
  changeStatus(id, type);

})
function changeStatus(id,type, status=null) {
  let url = config.route + '/' + type + "/change-status";
  $.ajax({
    url: url,
    data: { id, status },
    type: "POST",
    success: function (result) {
      toastr.success(result.message);
      window.location.reload();
    }
  });
}
