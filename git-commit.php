<?php 
function commitChanges($repoPath, $message) {
    $gitDir = $repoPath . '/.mygit';
    $stagingDir = $gitDir . '/staging';
    $commitDir = $gitDir . '/refs/commits';

    $stagedFiles = scandir($stagingDir);
    $commitFiles = [];

    foreach ($stagedFiles as $file) {
        if ($file === '.' || $file === '..') continue;
        $commitFiles[] = $file;
        // Move file to the object store and generate commit object
        copy($stagingDir . '/' . $file, $gitDir . '/objects/' . md5($file));
        unlink($stagingDir . '/' . $file);  // Remove from staging
    }

    $commitId = uniqid();
    file_put_contents($commitDir . '/' . $commitId, json_encode([
        'message' => $message,
        'files' => $commitFiles,
        'parent' => file_get_contents($gitDir . '/refs/heads/master') // Link to previous commit
    ]));

    // Update the branch head
    file_put_contents($gitDir . '/refs/heads/master', $commitId);

    echo "Committed: " . $message . "\n";
}
;?>