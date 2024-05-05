$("#login-form").submit(function (event) {
  event.preventDefault();
  var formData = $(this).serialize();

  $.ajax({
    type: "POST",
    url: "action/login.php", // Verilerin gönderileceği dosya
    data: formData, // Gönderilecek veriler
    success: function (response) {
      if (response.trim() === "onay") {
        alert("Giriş başarılı!");
        $("#login-form")[0].reset(); // Formu sıfırla
        window.location.href = "index.php";
      } else {
        alert(response);
      }
    },
    error: function (xhr, status, error) {
      console.error("Hata: " + error);
    },
  });
});

function cartToggle(element, mail, product, price, category, id) {
  $.ajax({
    type: "POST",
    url: "action/cartFav.php",
    data: {
      mail: mail,
      product: product,
      price: price,
      category: category,
      id: id,
      f: "card",
    },
    success: function (response) {
      // Başarılı cevap alındığında yapılacak işlemler
      //$("body").html("<div class='alert alert-primary'>" + response + "</div>");
      $(".message").fadeIn(300).html(response).fadeOut(1000);
      $(element).toggleClass("text-warning");
    },
    error: function (xhr, status, error) {
      // Hata durumunda yapılacak işlemler
      console.error("Hata: " + error);
    },
  });
}

function heartToggle(element, mail, product, price, category, id) {
  $.ajax({
    type: "POST",
    url: "action/cartFav.php",
    data: {
      mail: mail,
      product: product,
      price: price,
      category: category,
      id: id,
      f: "heart",
    },
    success: function (response) {
      // Başarılı cevap alındığında yapılacak işlemler
      //$("body").html("<div class='alert alert-primary'>" + response + "</div>");
      $(".message").fadeIn(300).html(response).fadeOut(1000);
      $(element).toggleClass("text-warning");
    },
    error: function (xhr, status, error) {
      // Hata durumunda yapılacak işlemler
      console.error("Hata: " + error);
    },
  });
}
