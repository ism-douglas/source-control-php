<?php 

function createDiff($repoPath, $commitId1, $commitId2) {
    $gitDir = $repoPath . '/.mygit';
    $commit1 = json_decode(file_get_contents($gitDir . '/refs/commits/' . $commitId1), true);
    $commit2 = json_decode(file_get_contents($gitDir . '/refs/commits/' . $commitId2), true);

    $diff = [];
    foreach ($commit1['files'] as $file) {
        if (!in_array($file, $commit2['files'])) {
            $diff[] = "File '$file' is deleted in commit $commitId2";
        }
    }
    foreach ($commit2['files'] as $file) {
        if (!in_array($file, $commit1['files'])) {
            $diff[] = "File '$file' is added in commit $commitId2";
        }
    }

    echo implode("\n", $diff) . "\n";
}
;?>