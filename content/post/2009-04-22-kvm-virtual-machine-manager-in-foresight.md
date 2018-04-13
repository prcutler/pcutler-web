---
title: 'KVM & Virtual Machine Manager in Foresight'
author: Paul Cutler
type: post
date: 2009-04-22T21:44:17+00:00
url: /blog/2009/04/kvm-virtual-machine-manager-in-foresight/
categories:
  - Foresight
  - Linux
tags:
  - devkit
  - fedora
  - Foresight
  - GNOME
  - kvm
  - VM

---
Foresight has long been a proponent of [KVM][1] over other virtualization technologies such as Xen or Virtualbox.

If you, like me, aren&#8217;t a guru on the command line and prefer using a GUI, [Virtual Machine Manager][2] is available in the Foresight repositories. If you&#8217;ve used Virtualbox or VMWare, you&#8217;ll find virtual-manager very familiar. The only downside (for some), is that you will need a modern processor that supports Intel VT or AMD-V.

Let&#8217;s get started:

In this example, we will use an ISO of a Linux distribution. Go ahead and download an ISO of a Linux distro you&#8217;d like to try out.

From a command line install the tools you&#8217;ll need:

`sudo conary update virt-manager libvirt` 

You&#8217;ll want to install it from the command line, as PackageKit has a bug that it doesn&#8217;t pull in libvirt:runtime for some reason. ([FL-2050][3])

Start the service:

`sudo service libvirtd start`

Go to Applications -> System Tools and choose Virtual Machine Manager.

PolicyKit will prompt you for your password. Enter it and Virtual Manager will start.

Click on localhost.

Then click File -> Add Connection and click Connect.

Click New in the bottom right hand corner. You will be prompted to enter the name of your new Virtual Machine.

You will now be present with 5 steps to create your Virtual Machine:

Step 1: Enter the name of VM you wan to create

Step 2: Click on &#8220;Use ISO Image&#8221; and then &#8220;Browse&#8221; and chose the ISO you downloaded earlier. Then from the drop down boxes choose Linux, and in the second drop down box you can check if the distro you&#8217;re trying is available.

Step 3: Choose how much RAM and how many CPUs the VM can use

Step 4: The defaults should work &#8211; choose to enable storage, and how much hard drive space the VM can use. (I&#8217;ve learned that hard drive space is important &#8211; these VMs need more than you think they will!)

Step 5: The defaults should work here as well, but you can click on Advanced Options if you want to change the Networking options. I&#8217;ve never had to change anything here, and Networking has worked out of the box.

And that&#8217;s it! Now under &#8220;localhost&#8221; double click the name of the VM you created, and it will boot up, just like a computer was booting up. You&#8217;ll install the Linux distro, just like you would on to a hard drive. One thing I&#8217;ve noticed, is that after an installation, it needs to reboot. My experience is the VM shuts down, rather than rebooting, but just starting it up again, the VM will boot up th eOS after your install.

To use the mouse, just click your mouse inside the virtual machine. To regain control of your mouse, press control and alt and your mouse will work normally inside Foresight again.

Here is a screenshot of Virtual Machine Manager running while the [GNOME Dev Kit][4] loads (note I have created VMs for the Dev Kit and the betas of Fedora 11 and Ubuntu 9.04:

[<img src="https://i1.wp.com/farm4.static.flickr.com/3554/3466022913_ea59b76f23.jpg?resize=500%2C320" width="500" height="320" alt="GNOME Dev Kit" data-recalc-dims="1" />][5]

This screenshot shows the GNOME Dev Kit and Fedora 11 running side by side (One interesting thing about running Fedora is that i don&#8217;t have to release the mouse via ctrl-alt, it&#8217;s automatic within the OS. I&#8217;m not sure why, maybe it&#8217;s because Virtual Machine Manager is developed by Red Hat?):

[<img src="https://i0.wp.com/farm4.static.flickr.com/3494/3466838632_f8ae862468.jpg?resize=500%2C372" width="500" height="372" alt="Virtual Machines" data-recalc-dims="1" />][6]

If you have a modern processor, the hard drive space, and some memory to spare, I highly recommend Virtual Machine Manager. It makes creating and running different operating systems a breeze.

 [1]: http://www.linux-kvm.org/page/Main_Page
 [2]: http://virt-manager.et.redhat.com/
 [3]: https://issues.foresightlinux.org/browse/FL-2050
 [4]: http://live.gnome.org/GnomeDeveloperKit
 [5]: http://www.flickr.com/photos/silwenae/3466022913/ "GNOME Dev Kit by silwenae, on Flickr"
 [6]: http://www.flickr.com/photos/silwenae/3466838632/ "Virtual Machines by silwenae, on Flickr"