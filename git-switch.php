<?php 

function createBranch($repoPath, $branchName) {
    $gitDir = $repoPath . '/.mygit';
    $currentCommit = file_get_contents($gitDir . '/refs/heads/master');
    file_put_contents($gitDir . '/refs/heads/' . $branchName, $currentCommit);
    echo "Branch '$branchName' created.\n";
}
;?>