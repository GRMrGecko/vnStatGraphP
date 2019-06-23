I needed a tool like this for my pfSense router, so I decided to go ahead and write my own. I loved getting these graphs from [vnStat](http://humdi.net/vnstat/), and wanted it on my new router. Easy to share and nice to look at. Make sure you edit the config.php file to your liking.

# Installing tools on pfSense

1. Install Status_Traffic_Totals package in package manager.
2. In the Traffic Totals panel, enable graphing.
3. Edit `/usr/local/etc/pkg/repos/pfSense.conf` and `/usr/local/etc/pkg/repos/FreeBSD.conf` to enable FreeBSD packages.
4. Install git `pkg install git`

It is important to note that you should return the repo configurtation to have FreeBSD as off before upgrades otherwise upgrades may fail.

# Installation on pfSense


```bash
cd /usr/local/www
git clone https://github.com/GRMrGecko/vnStatGraphP.git
```