// ...
// Jika tidak ada data input sebelumnya, lakukan permintaan ke API atau sumber data lainnya
axios.get("../api/ambil_kpi.php")
    .then((response) => {
        console.log(response.data);
        const kpiData = response.data;

        // Loop melalui data KPI dan tampilkan atau lakukan apa yang Anda perlukan
        kpiData.forEach((kpi) => {
            var kpiContentHTML = `
                <h1 class="font-medium text-2xl">Konten KPI ${kpi.id}</h1>
                <form action="" method="POST" role="form">
                    <div class="flex row justify-between">
                        <div>
                            <p class="mt-3">ID</p>
                            <input class="p-1 border rounded border-1 border-red-700" type="text" name="id" disabled value="${kpi.id}"/>
                        </div>
                        <div>
                            <p class="mt-3">Nama KPI</p>
                            <input class="p-1 border rounded border-1 border-red-700" name="nama_kpi" type="text" required value="${kpi.nama_kpi}"/>
                        </div>
                        <div>
                            <p class="mt-3">Kategori KPI</p>
                            <input class="p-1 border rounded border-1 border-red-700" name="kategori_kpi" type="text" required value="${kpi.kategori_kpi}"/>
                        </div>
                    </div>
                    <!-- Sisipkan data lainnya dari objek kpi sesuai kebutuhan -->
                    <button type="submit" class="flex rounded-md border p-2 border-red-700 text-md font-medium items-right text-right hover:bg-red-700 hover:text-white">
                    Simpan
                    </button>
                </form>
            `;

            // Di sini, Anda dapat menambahkan elemen HTML ke daftar KPI atau melakukan apa yang Anda perlukan
            var kpiDiv = document.createElement("div");
            kpiDiv.className = "text-lg bold text-red-700 text-center mt-4 p-1 font-medium border border-2 border-red-700 rounded-md hover:bg-red-700 hover:text-white";
            var kpiLink = document.createElement("a");
            kpiLink.href = "#";
            kpiLink.textContent = "KPI " + kpi.id;

            // Menambahkan elemen KPI ke daftarKPI
            kpiDiv.appendChild(kpiLink);
            daftarKPI.appendChild(kpiDiv);

            kpiLink.addEventListener("click", function(e) {
                e.preventDefault();
                kolomKanan.innerHTML = kpiContentHTML;
            });

            // Simpan data input sementara
            inputanKPI["KPI " + kpi.id] = kpiContentHTML;
        });
    })
    .catch((error) => {
        console.error("Error:", error);
    });
// ...
