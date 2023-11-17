document.addEventListener("DOMContentLoaded", function () {
    DataUsers();
  });
  
  function DataUsers() {
    axios
      .get("../api/users_api.php")
      .then((response) => {
        console.log(response.data);
        const data = response.data;
  
        // Manipulasi HTML untuk menampilkan data portofolio
        const users = document.getElementById("users");
        let html = "";
  
        html += `
        <table id="example" class="display" style="width:100%">
          <thead>
              <tr>
                  <th class="text-left">Name</th>
                  <th class="text-left">Position</th>
                  <th class="text-left">Office</th>
                  <th class="text-left">Age</th>
                  <th class="text-left">Start date</th>
                  <th class="text-left">Salary</th>
              </tr>
          </thead>
          <tbody>`;

      data.forEach((data) => {
        // Perulangan hanya dimulai dari elemen <tr>
        html += `
              <tr>
                  <td>${data.nama_user}</td>
                  <td>${data.divisi_user}</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>`;
      });

      // Akhiri tabel di sini di luar perulangan
      html += `
          </tbody>
        </table>`;

        users.innerHTML = html;
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  }
  