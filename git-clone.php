<?php 

function cloneRepo($sourceRepoPath, $targetRepoPath) {
    $sourceGitDir = $sourceRepoPath . '/.mygit';
    $targetGitDir = $targetRepoPath . '/.mygit';

    // Recursively copy the entire .mygit directory
    recurseCopy($sourceGitDir, $targetGitDir);
    echo "Repository cloned to $targetRepoPath\n";
}

function recurseCopy($src, $dst) {
    $dir = opendir($src);
    @mkdir($dst);

    while (($file = readdir($dir)) !== false) {
        if ($file == '.' || $file == '..') continue;
        $srcPath = $src . '/' . $file;
        $dstPath = $dst . '/' . $file;

        if (is_dir($srcPath)) {
            recurseCopy($srcPath, $dstPath);
        } else {
            copy($srcPath, $dstPath);
        }
    }

    closedir($dir);
}
;?>