document.getElementById("daftarForm").addEventListener("submit", function(event) {
  event.preventDefault(); // cegah form submit langsung

  let email = document.getElementById("email").value.trim();
  let password = document.getElementById("password").value.trim();

  // Validasi Email
  if (email === "") {
    alert("Alamat Email tidak boleh kosong!");
    return;
  }

  // Validasi Password
  if (password.length < 8) {
    alert("Password harus terdiri dari minimal 8 karakter.");
    return;
  }

  // Jika validasi berhasil
  alert("Pendaftaran berhasil! Terima kasih.");

  // Reset form
  document.getElementById("daftarForm").reset();
});