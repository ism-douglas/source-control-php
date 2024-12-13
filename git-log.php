<?php 
function showCommitHistory($repoPath) {
    $gitDir = $repoPath . '/.mygit';
    $commitDir = $gitDir . '/refs/commits';

    $commitId = file_get_contents($gitDir . '/refs/heads/master');
    while ($commitId) {
        $commit = json_decode(file_get_contents($commitDir . '/' . $commitId), true);
        echo "Commit: $commitId\n";
        echo "Message: " . $commit['message'] . "\n\n";
        $commitId = $commit['parent'];
    }
}
;?>