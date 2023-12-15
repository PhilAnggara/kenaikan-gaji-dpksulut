var typed = new Typed('#typed', {
  strings: [
    'Selamat Datang di Sistem Kenaikan Gaji DISDIKBUD SULUT..!',
    'Beranda'
  ],
  startDelay: 500,
  typeSpeed: 20,
  showCursor: true,
  backSpeed: 10,
  backDelay: 5000,
  onComplete: function() {
    // Menyembunyikan kursor setelah animasi selesai
    document.querySelector('.typed-cursor').style.display = 'none';
  }
  // loop: true,
  // loopCount: Infinity,
});