function keluar() {
  Swal.fire({
    title: 'Keluar?',
    text: "Tekan tombol Keluar di bawah ini untuk mengakhiri sesi anda!",
    icon: 'question',
    showCancelButton: true,
      // confirmButtonColor: '#7066E0',
      // cancelButtonColor: '#6E7881',
    confirmButtonText: 'Keluar!',
    cancelButtonText: 'Batal'
  }).then((result) => {
    if (result.isConfirmed) {
      document.getElementById('keluar').submit();
    }
  })
}

function hapusData(id, title, text) {
  Swal.fire({
    title: title,
    text: text,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#FF5154',
    cancelButtonColor: '#6E7881',
    confirmButtonText: 'Ya, hapus!',
    cancelButtonText: 'Batal'
  }).then((result) => {
    if (result.isConfirmed) {
      document.getElementById(`hapus-${id}`).submit();
    }
  })
}

function copyToClipboard(text) {
  navigator.clipboard.writeText(text);
  Swal.fire({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000,
    icon: 'success',
    title: 'Disalin ke clipboard!',
  })
}