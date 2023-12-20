function tambahForm() {
  var tambahPopupForm = document.getElementById("tambahPopupForm");
  tambahPopupForm.classList.add("show");
  tambahPopupForm.classList.remove("hide");
}

var tambahPopupForm = document.getElementById("tambahPopupForm");
tambahPopupForm.addEventListener("click", function (event) {
  if (event.target === this) {
    tambahPopupForm.classList.add("hide");
    setTimeout(function () {
      tambahPopupForm.classList.remove("show");
    }, 500);
  }
});

function updateForm(rowData) {
  var updatePopupForm = document.getElementById("updatePopupForm");
  updatePopupForm.classList.add("show");
  updatePopupForm.classList.remove("hide");

  var namaAnggotaInput = document.getElementById("nama_anggota");
  var judulBukuInput = document.getElementById("judul_buku");
  var tanggalPeminjamanInput = document.getElementById("tanggal_peminjaman");
  var tanggalPengembalianInput = document.getElementById(
    "tanggal_pengembalian"
  );
  var kondisiDipinjamInput = document.getElementById("kondisi_dipinjam");
  var kondisiDikembalikanInput = document.getElementById(
    "kondisi_dikembalikan"
  );

  // Set the values of the form fields
  namaAnggotaInput.value = rowData.nama_anggota;
  judulBukuInput.value = rowData.judul_buku;
  tanggalPeminjamanInput.value = rowData.tanggal_pinjam;
  tanggalPengembalianInput.value = rowData.tanggal_kembali;
  kondisiDipinjamInput.value = rowData.kondisi;
  kondisiDikembalikanInput.value = rowData.kondisi_akhir;

  // Show the update popup form
  document.getElementById("updatePopupForm").style.display = "block";
}

var updatePopupForm = document.getElementById("updatePopupForm");
updatePopupForm.addEventListener("click", function (event) {
  if (event.target === this) {
    updatePopupForm.classList.add("hide");
    setTimeout(function () {
      updatePopupForm.classList.remove("show");
    }, 500);
  }
});
