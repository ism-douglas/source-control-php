# source-control-php
A distributed source control system in the style of Git.

Here's a simplified directory structure done by Douglas Sabwa Indumwa:

.mygit/ (Hidden directory storing all repository data)
	config (Configuration file for repository info)
	refs/ (Branches and commits)
		heads/ (Branch references)
		commits/ (Commit object storage)
	staging/ (Staging area)
	objects/ (Git objects storage)
	index (The staging area index)
	logs/ (Commit logs)
	.gitignore (Files to ignore)

Key Operations
1.Initialize a repository (git init)
2.Stage files (git add)
3.Commit changes (git commit)
4.View commit history (git log)
5.Create branches and switch between them
6.Merge branches
7.Create diffs
8.Clone a repository (disk-based)
