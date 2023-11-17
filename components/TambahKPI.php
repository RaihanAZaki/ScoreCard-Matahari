<?php
// Ambil data KPI dari database
// ...

// Generate daftar KPI
echo '<ul>';
foreach ($kpiData as $kpi) {
    echo '<li><a href="#" class="kpi-link" data-kpi-id="' . $kpi['id'] . '">KPI ' . $kpi['id'] . '</a></li>';
}
echo '</ul';

// Generate konten KPI
foreach ($kpiData as $kpi) {
    echo '<div class="kpi-content" id="kpi-content-' . $kpi['id'] . '">';
    // Tampilkan data KPI dari database di sini
    echo '</div>';
}
?>