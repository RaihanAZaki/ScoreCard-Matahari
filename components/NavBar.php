<?php
session_start(); // Mulai sesi

include "../modules/system.php";

if (isset($_POST["logout"])) {
    Logout();
}
?>

<nav class="bg-white-800 border border-b-black-200">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
      </div>
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex flex-shrink-0 items-center">
          <img class="h-10 w-auto" src="../assets/img/MPPA.png" alt="Your Company">
        </div>
        <div class="hidden sm:ml-6 sm:block">
          <div class="flex space-x-4">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="../pages/incumbents.php" class="bg-red-700 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Dashboard</a>
            <a href="../pages/kpi.php" class="text-black-300 hover:bg-red-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Daftar KPI</a>
            <a href="../pages/Tabel.php" class="text-black-300 hover:bg-red-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Tabel KPI</a>
            <a href="../pages/how.php" class="text-black-300 hover:bg-red-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">How To Setting</a>
          </div>
        </div>
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        <form action="" method="post">
          <button type="submit" value="Logout" name="logout" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
              <span class="absolute -inset-1.5"></span>
              <span class="sr-only">Logout</span>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
              </svg>
          </button>
        </form>
     

        <!-- Profile dropdown -->
        <div class="relative ml-3">
          <div>
            <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
              <span class="absolute -inset-1.5"></span>
              <span class="sr-only">Open user menu</span>
              <img class="h-8 w-8 rounded-full" src="../assets/img/MPPA.png" alt="">
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>
