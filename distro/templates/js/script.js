
function notifTambah(module, action)
{
      swal({
		  type: 'success',
		  title: module+' berhasil ditambahkan',
		  showConfirmButton: false,
		  timer: 2000
	},setTimeout(function(){ 

	   window.location.href = "profile.php?module="+module+"&action="+action;

	}, 2000))
}

function notifEdit(module, action)
{
      swal({
		  type: 'success',
		  title: module+' berhasil diupdate',
		  showConfirmButton: false,
		  timer: 2000
	},setTimeout(function(){ 

	   window.location.href = "profile.php?module="+module+"&action="+action;

	}, 2000))
}

function notifDelete(module, action)
{
      swal({
		  type: 'success',
		  title: module+' berhasil dihapus',
		  showConfirmButton: false,
		  timer: 2000
	},setTimeout(function(){ 

	   window.location.href = "profile.php?module="+module+"&action="+action;

	}, 2000))
}

function notifUpdateStatus(status, module, action)
{
      swal({
		  type: 'success',
		  title: 'Status User berhasil diubah menjadi '+status,
		  showConfirmButton: false,
		  timer: 2000
	},setTimeout(function(){ 

	   window.location.href = "profile.php?module="+module+"&action="+action;

	}, 2000))
}

function notifGagalTambah()
{
      const toast = swal.mixin({
	  toast: true,
	  position: 'top-end',
	  showConfirmButton: false,
	  timer: 5000
	});

	toast({
	  type: 'error',
	  title: 'Data gagal ditambahkan'
	})
}

function notifIdentitas()
{
      const toast = swal.mixin({
	  toast: true,
	  position: 'top-end',
	  showConfirmButton: false,
	  timer: 5000
	});

	toast({
	  type: 'success',
	  title: 'Data berhasil disimpan'
	})
}

function login(text)
{
	const toast = swal.mixin({
	  toast: true,
	  position: 'top-end',
	  showConfirmButton: false,
	  timer: 3000
	});

	toast({
	  type: 'success',
	  title: text
	});

}

function notifKeranjang()
{
    const toast = swal.mixin({
	  toast: true,
	  position: 'top-end',
	  showConfirmButton: false,
	  timer: 5000
	});

	toast({
	  type: 'error',
	  title: 'Barang ditambahkan ke keranjang'
	})
}

function cekUser()
	{
		swal(
	  'Anda harus login dahulu!',
	  'You clicked the button!',
	  'error'
	)
}
