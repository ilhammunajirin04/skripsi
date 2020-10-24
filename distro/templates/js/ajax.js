$(".update-quantity").on("input", function(e){
      var id_barang = $(this).attr("name");
      var value = $(this).val();

      $.ajax({
          method: "POST",
          url: "update_keranjang.php",
          data: "id_barang="+id_barang+"&value="+value
      })
      .done(function(data){
        location.reload();
      });

    });