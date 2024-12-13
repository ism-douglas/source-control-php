<?php 

function addIgnore($repoPath, $filePattern) {
    $gitDir = $repoPath . '/.mygit';
    file_put_contents($gitDir . '/.gitignore', $filePattern . "\n", FILE_APPEND);
    echo "Added ignore pattern: $filePattern\n";
}
;?>