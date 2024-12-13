<?php 

function mergeBranch($repoPath, $branchName) {
    $gitDir = $repoPath . '/.mygit';
    $currentCommit = file_get_contents($gitDir . '/refs/heads/master');
    $branchCommit = file_get_contents($gitDir . '/refs/heads/' . $branchName);

    // Just overwrite the current commit with the branch commit for simplicity
    file_put_contents($gitDir . '/refs/heads/master', $branchCommit);

    echo "Merged branch '$branchName' into master.\n";
}
;?>