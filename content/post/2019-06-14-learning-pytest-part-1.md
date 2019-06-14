---
title: Learning pytest using continuous integration with Azure Pipelines (or SSH key hell) - Part 1
author: Paul Cutler
type: post
date: 2019-06-014T14:00:00-06:00
categories:
  - Python
  - Pyramid
tags:
  - pytest
  - Python
  - Pyramid

---

## Introduction
I’m still on my quest to learn more Python and at the top of that list is learning [pytest](https://docs.pytest.org/en/latest/).  I just [can’t wrap my head around testing](https://paulcutler.org/blog/learning-how-to-test-in-python-and-pyramid/) and I know my two Pyramid apps aren’t “complete” until there are tests.  (I did write docs, so I have that going for me).

A couple months ago I (very easily) added continuous integration to NFLPool using Microsoft’s [Azure Pipelines](https://azure.microsoft.com/en-us/services/devops/pipelines/).  I, like many other people, have been blown away by the right turn Microsoft made a few years back to embrace open source, and wanted to give Azure Pipelines a try.  Every time I make a commit or [Pyup.io](https://pyup.io/) submits a pull request to update a Python package, Azure Pipelines builds NFLPool.  Of course it fails, because the tests I’ve written so far fail.  To end this cycle, I really need to learn how to write tests!

I have a domain I don’t use, silversaucer.com.  I have a few different ideas for some projects for the domain.  I’m going to build another web app using [Pyramid](https://www.trypyramid.com) to start, with a goal of properly using classes in Pyramid (and not Pyramid handlers) to start.  I’ve also been reading [Test-Driven Development with Python, 2nd Edition](https://www.obeythetestinggoat.com/), that I received from a recent Humble Bundle filled with Python books. 

I was thinking that this was a perfect opportunity to learn `pytest`.  I would create a new project in Pyramid and use TDD to write my tests as I write my code.  If I’m going to do that, I might as well set up continuous integration right away and pretend I’m a real developer.

## Setting up Pyramid

Since I’m going to be using a Test Driven Development philosophy, all I’m going to do is create a Pyramid project and not make any changes to it yet.  I used [Pyramid’s cookiecutter to create the project](https://docs.pylonsproject.org/projects/pyramid/en/1.10-branch/narr/project.html#project-narr) and then committed it to my Github repository.  That’s it!

## Hooking up Azure Pipelines

Here is where the fun starts.  I’m not going to go through this process as Microsoft has great documentation for Azure and [set up](#).

Walk through the setup and connect to your repository on Github.  Azure Pipelines will create the needed YAML file, commit it and run your first build.

Here is where my build failed for Silver Saucer.  I was getting the following error:

	Obtaining silversaucer from git+git@github.com:prcutler/silversaucer.git@75932f389536b59993fa780b281170849ff92238#egg=silversaucer (from -r requirements.txt (line 38))
	  Cloning git@github.com:prcutler/silversaucer.git (to revision 75932f389536b59993fa780b281170849ff92238) to ./src/silversaucer
	  Running command git clone -q git@github.com:prcutler/silversaucer.git /home/vsts/work/1/s/src/silversaucer
	  Host key verification failed.
	  fatal: Could not read from remote repository.

Here is where I first lost hours over the course of a few days.  Azure is pulling my repository using git, not https.  I would compare this to my Azure Pipeline for NFLPool, which for some reason pulls my repository using https and works fine.  I know a little bit about SSH keys.  I’m no expert, but all of my Digital Ocean and servers at home use SSH key authentication to log in and not passwords (yay me for good opsec!) and I have my SSH key on multiple computers without any issues.

Lots of search queries later, I learned how you can [change a git repository’s remote URL](https://help.github.com/en/articles/changing-a-remotes-url#switching-remote-urls-from-https-to-ssh), but this appears just to be on your local machine.  I’m sure I’m missing something simple to make it a global change, but I never figured it out.

Ok, let’s add my SSH key to Azure Pipelines.  Again, Microsoft has [good developer documentation on how to do this](https://docs.microsoft.com/en-us/azure/devops/repos/git/use-ssh-keys-to-authenticate?view=azure-devops#configuration).  

- Step 1:  Add your public key to your Azure profile.
- Step 2: In your projects in Azure Pipelines, go to Pipelines -\> Library and choose Secure files.  Add your private key (usually `id_rsa`). 
- Step 3: Add the SSH Task to Azure Pipelines and make sure you authorize the private key - follow [Microsoft’s developer documentation for the SSH Task](https://docs.microsoft.com/en-us/azure/devops/pipelines/tasks/utility/install-ssh-key?view=azure-devops).  Update your YAML file:

	# Install SSH Key
		# Install an SSH key prior to a build or release
		- task: InstallSSHKey@0
		  inputs:
		    hostName: 
		    sshPublicKey: 
		    #sshPassphrase: # Optional
		    sshKeySecureFile: 

The hostname input confused me at first, but here you’re going to go into your `~/.ssh` directory and copy and paste the Github entry in your `known_hosts` file.  (This is a hidden directory in your home folder on macOS or Linux.  I’m not sure where it is on Windows, sorry!) Paste your public key in `sshPublicKey:` and the name of your private key that you uploaded in Step 2 above.  If your repository is public on Github, you are not going to want to add your sshPassphrase to your YAML file.

## My SSH key fails

Again, I lost hours here.  I have no idea why, but the SSH key I’ve been using for the last couple of years will not work.  I had to create a second SSH key for Azure Pipelines and delete my `known_hosts` file, clone the repository again (which then updated `known_hosts`) and paste in the new fingerprint from `known_hosts` to the YAML file.  The new key works fine, but I’ll be damned if I can figure out why my normal key doesn’t work.  I’ve compared the fingerprint of my usual key, used it to clone other repositories, but Azure Pipelines refuses to work with it as I would just receive the above error over and over again.

I’m not thrilled with having a second SSH key, and now I have to go to the other two computers I work with and copy it over and add it to my keyring.  But it works.

## What’s next

Coming up in Part 2:  Pytest works in Azure Pipelines in Python 3.6 (but not Python 3.7!)

