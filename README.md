<div align="center">

<!-- Module Image Here -->

</div>

<h1 align="center">element119 | CMS Identifier Markup</h1>

<div align="center">

![github release](https://img.shields.io/github/v/release/pykettk/module-cms-identifier-markup?color=ffbf00&label=version)
![github release date](https://img.shields.io/github/release-date/pykettk/module-cms-identifier-markup?color=8b32a8&label=last%20release)
![magento](https://img.shields.io/badge/Magento-^2.4.4-ec6611.svg)
![license](https://img.shields.io/badge/license-OSL-ff00dd.svg)
![packagist downloads](https://img.shields.io/packagist/dt/element119/module-cms-identifier-markup?color=ff0000)

</div>

---

## 📝 Features
✔️ Adds an additional HTML `data-` attribute to CMS blocks for ease of identification

✔️ Additional markup is added automatically, no manual intervention from admins required

✔️ Configurable `data-` attribute name to avoid conflicts with other customisations

<br/>

## 🔌 Installation
Run the following command to *install* this module:
```bash
composer require element119/module-cms-identifier-markup
php bin/magento setup:upgrade
```

<br/>

## ⏫ Updating
Run the following command to *update* this module:
```bash
composer update element119/module-cms-identifier-markup
php bin/magento setup:upgrade
```

<br/>

## ❌ Uninstallation
Run the following command to *uninstall* this module:
```bash
composer remove element119/module-cms-identifier-markup
php bin/magento setup:upgrade
```

<br/>

## 📚 User Guide
Module configuration can be found under `Stores -> Settings -> Configuration -> General -> Content Management -> Advanced Content Tools`.

`Add CMS Block Identifier to Markup` toggles this module's functionality on and off. When this option is set to `Yes`,
the custom HTML `data-` attribute that contains the CMS block's identifier will be added to the markup.

`CMS Block Identifier HTML data- Attribute Name` sets the name of the custom HTML `data-` attribute.

<br>

---

<div align="center">

[![paypal](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://paypal.me/pykettk)

For those that want to support this project.

</div>
