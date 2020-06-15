# Magento 2 Ip Security

The IpSecurity extension has opened a new door for business doers, especially Magento online merchants to a safer place in the battle with hackers. With numerous useful features offered by this extension, users are ensured to protect their stores better from being hacked. Among these outstanding features, Blacklist IPs seems to receive much attention from business doers.

# Block this IPs
In this field, all IPs entered here will be forbidden whenever there is someone who use them to login. There are several options can be chosen here regarding the number of IPs that will be forbidden. Admins are enabled to enter one IP, multiple IPs, or a range of IPs. In case there is more than one IP is chosen, each IP will be separated with each other by a pipeline(|).

## Installation without composer
* Download zip file of this extension
* Place all the files of the extension in your Magento 2 installation in the folder `app/code/Kashyap/IpSecurity`
* Enable the extension: `php bin/magento --clear-static-content module:enable Kashyap_IpSecurity`
* Upgrade db scheme: `php bin/magento setup:upgrade`
* Deply Static Content: `php bin/magento setup:static-content:deploy -f` Developer Mode
* Deply Static Content: `php bin/magento setup:static-content:deploy` Production Mode

---

![Alt text](KS_Ip_Configuration.png?raw=true "Magento2 Ip Security")

---

[![Alt text](https://www.kashyapsoftware.com/pub/media/logo/stores/1/ks_logo.png "kashyapsoftware.com")](https://www.kashyapsoftware.com/)
