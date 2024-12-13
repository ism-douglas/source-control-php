<?php
//Staging a file before add
function stageFile($repoPath, $filePath) {
    $stagingDir = $repoPath . '/.mygit/staging';
    $fileName = basename($filePath);
    if (!file_exists($filePath)) {
        echo "File does not exist.\n";
        return;
    }

    // Copy file to the staging area
    copy($filePath, $stagingDir . '/' . $fileName);
    echo "File staged: " . $fileName . "\n";
}
;?>