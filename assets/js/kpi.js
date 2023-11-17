var tambahKPILink = document.getElementById("tambahKPI");
var daftarKPI = document.getElementById("daftarKPI");
var kolomKanan = document.getElementById("kolomKanan");
var kpiCounter = 1;
var inputanKPI = {};

tambahKPILink.addEventListener("click", function(e) {
    e.preventDefault();

    // Membuat elemen KPI baru
    var kpiDiv = document.createElement("div");
    kpiDiv.className = "text-lg bold text-red-700 text-center mt-4 p-1 font-medium border border-2 border-red-700 rounded-md hover:bg-red-700 hover:text-white";
    var kpiLink = document.createElement("a");
    kpiLink.href = "#";
    kpiLink.textContent = "KPI " + kpiCounter;
    kpiCounter++;

    // Menambahkan elemen KPI ke daftarKPI
    kpiDiv.appendChild(kpiLink);
    daftarKPI.appendChild(kpiDiv);

    // Mengganti konten kolom kanan dengan ID KPI yang baru
    kpiLink.addEventListener("click", function(e) {
        e.preventDefault();
        var clickedKPI = e.target; // Menggunakan e.target untuk mendapatkan elemen yang diklik

        if (inputanKPI[clickedKPI.textContent]) {
            // Jika sudah ada, isi kembali inputan dengan data yang sesuai
            kolomKanan.innerHTML = inputanKPI[clickedKPI.textContent];
        } else {
        axios.get("../api/api_kpi_user.php")
            .then((response) => {
                console.log(response.data);
                const data = response.data;
                var kpiContentHTML = `
                    <h1 class="font-medium text-2xl">Konten ${clickedKPI.textContent}</h1>
                    <div class="flex row justify-between">
                        <div>
                            <p class="mt-3">Nama</p>
                            <input class="p-1 border rounded border-1 border-red-700" type="text" value="${data.nama_user}" disabled/>
                        </div>
                        <div>
                            <p class="mt-3">Nama</p>
                            <input class="p-1 border rounded border-1 border-red-700" type="text" disabled/>
                        </div>
                        <div>
                            <p class="mt-3">Nama</p>
                            <input class="p-1 border rounded border-1 border-red-700" type="text" disabled/>
                        </div>
                    </div>
                    <div class="flex row justify-between">
                        <div>
                            <p class="mt-3">Nama</p>
                            <input class="p-1 border rounded border-1 border-red-700" type="text" />
                        </div>
                        <div>
                            <p class="mt-3">Nama</p>
                            <input class="p-1 border rounded border-1 border-red-700" type="text" />
                        </div>
                        <div>
                            <p class="mt-3">Nama</p>
                            <input class="p-1 border rounded border-1 border-red-700" type="text" />
                        </div>
                    </div>
                `;

                kolomKanan.innerHTML = kpiContentHTML;
                inputanKPI[clickedKPI.textContent] = kpiContentHTML;

                
            })
            .catch((error) => {
                console.error("Error:", error);
            });
        }
    });
});

var tambahKPILink = document.getElementById("tambahKPI");
var daftarKPI = document.getElementById("daftarKPI");
var kolomKanan = document.getElementById("kolomKanan");
var kpiCounter = 1;
var activeKPI = null; // Untuk melacak KPI yang aktif
var inputanKPI = {}; // Objek untuk menyimpan data input sementara

tambahKPILink.addEventListener("click", function(e) {
    e.preventDefault();

    // Membuat elemen KPI baru
    var kpiDiv = document.createElement("div");
    kpiDiv.className = "text-lg bold text-red-700 text-center mt-4 p-1 font-medium border border-2 border-red-700 rounded-md hover:bg-red-700 hover:text-white";
    var kpiLink = document.createElement("a");
    kpiLink.href = "#";
    kpiLink.textContent = "KPI " + kpiCounter;
    kpiCounter++;

    // Menambahkan elemen KPI ke daftarKPI
    kpiDiv.appendChild(kpiLink);
    daftarKPI.appendChild(kpiDiv);

    // Mengganti konten kolom kanan dengan ID KPI yang baru
    kpiLink.addEventListener("click", function(e) {
        e.preventDefault();
        var clickedKPI = e.target; // Menggunakan e.target untuk mendapatkan elemen yang diklik

        // Simpan data input dari KPI yang sedang aktif (jika ada)
        if (activeKPI && inputanKPI[activeKPI]) {
            inputanKPI[activeKPI] = kolomKanan.innerHTML;
        }

        // Periksa jika data input dari KPI yang baru sudah tersedia
        if (inputanKPI[clickedKPI.textContent]) {
            // Jika sudah ada, isi kembali inputan dengan data yang sesuai
            kolomKanan.innerHTML = inputanKPI[clickedKPI.textContent];
        } else {
            axios.get("../api/api_kpi_user.php")
                .then((response) => {
                    console.log(response.data);
                    const data = response.data;
                    var kpiContentHTML = `
                    <h1 class="font-medium text-2xl">Konten ${clickedKPI.textContent}</h1>
                    <div class="flex row justify-between">
                        <div>
                            <p class="mt-3">Nama</p>
                            <input class="p-1 border rounded border-1 border-red-700" type="text" value="${data.nama_user}" disabled/>
                        </div>
                        <div>
                            <p class="mt-3">Nama</p>
                            <input class="p-1 border rounded border-1 border-red-700" type="text" disabled/>
                        </div>
                        <div>
                            <p class="mt-3">Nama</p>
                            <input class="p-1 border rounded border-1 border-red-700" type="text" disabled/>
                        </div>
                    </div>
                    <div class="flex row justify-between">
                        <div>
                            <p class="mt-3">Nama</p>
                            <input class="p-1 border rounded border-1 border-red-700" type="text" />
                        </div>
                        <div>
                            <p class="mt-3">Nama</p>
                            <input class="p-1 border rounded border-1 border-red-700" type="text" />
                        </div>
                        <div>
                            <p class="mt-3">Nama</p>
                            <input class="p-1 border rounded border-1 border-red-700" type="text" />
                        </div>
                    </div>
                `;

                    kolomKanan.innerHTML = kpiContentHTML;
                    inputanKPI[clickedKPI.textContent] = kpiContentHTML;
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        }

        // Tetapkan KPI yang baru sebagai yang aktif
        activeKPI = clickedKPI.textContent;
    });
});

// Saat halaman dimuat, pastikan input dari KPI yang pertama dimuat
tambahKPILink.click();
