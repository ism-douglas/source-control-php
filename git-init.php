<?php 
function initRepo($repoPath) {
    $gitDir = $repoPath . '/.mygit';

    //Check if file exists
    if (file_exists($gitDir)) {
        echo "Repository already initialized.\n";
        return;
    }

    //Folder permissions
    mkdir($gitDir, 0777, true);
    mkdir($gitDir . '/refs/heads', 0777, true);
    mkdir($gitDir . '/refs/commits', 0777, true);
    mkdir($gitDir . '/staging', 0777, true);
    mkdir($gitDir . '/objects', 0777, true);
    mkdir($gitDir . '/logs', 0777, true);

    // Create a default branch (master)
    file_put_contents($gitDir . '/refs/heads/master', '0'); // Initial commit

    echo "Repository initialized.\n";
}
;?>