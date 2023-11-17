<?php
    $tabs = [
        'Tab 1' => 
        '<div>
            <div class="grid grid-cols-2 gap-2">
                <div class="border-2 rounded-sm border-red-900 p-2">
                    <p class="font-medium text-md">New Data</p>
                </div>
                <div class="border-2 rounded-sm border-red-900">
                <p class="font-medium text-md">Select Data</p>
                </div>
            </div>    
        </div>',
        // 'Tab 2' => '<p>Konten untuk Tab 2. Ini adalah konten Tab 2.</p>',
        // 'Tab 3' => '<p>Konten untuk Tab 3. Ini adalah konten Tab 3.</p>',
    ];

    $currentTab = isset($_GET['tab']) ? $_GET['tab'] : 'Tab 1';

    echo '<div class="tab-container mb-10">';
    foreach ($tabs as $tab => $content) {
        $isActive = ($currentTab === $tab) ? 'active' : '';
        echo '<button class="text-lg font-medium text-white text-center bg-red-700 rounded-md p-2"' . $isActive . '"><a href="?tab=' . $tab . '">' . $tab . '</a></button>';
    }
    echo '</div>';

    echo '<div class="content">' . $tabs[$currentTab] . '</div>';
?>
