<p align="center">
  <img alt=" Logo" src="https://github.com/vivdlf/covid-tracker/blob/main/images/favicon-logo.ico" width="100" />
</p>
<h1 align="center">
  COVID-19 Tracker
</h1>
<p align="center">
COVID-19 Tracker is a web application designed to track the whereabouts of its users.
Tracking of user's whereabouts is done effectively through the use of technology. In particular,
each user is granted a unique QR code which is then scanned by a business upon the user's entrance
into the business establishment. This process allows the system to effectively track a users whereabouts.  
Moreover, COVID-19 Tracker is also capable of quickly notifying a user when he/she is a close contact of 
a infected COVID-19 individual. Also, COVID-19 Tracker grants healthcare professionals the ability
to generate close-contact reports and send notifications to individuals who have tested positive for COVID-19 
and to people who have come in contact with them.

</p>
<p align="center">
  <a href="https://marketplace.visualstudio.com/items?itemName=brittanychiang.halcyon-vscode">
    <img alt="Version" src="https://vsmarketplacebadge.apphb.com/version/brittanychiang.halcyon-vscode.svg" />
  </a>
  <a href="https://marketplace.visualstudio.com/items?itemName=brittanychiang.halcyon-vscode">
    <img alt="Downloads" src="https://vsmarketplacebadge.apphb.com/downloads/brittanychiang.halcyon-vscode.svg" />
  </a>
  <a href="https://marketplace.visualstudio.com/items?itemName=brittanychiang.halcyon-vscode">
    <img alt="Installs" src="https://vsmarketplacebadge.apphb.com/installs/brittanychiang.halcyon-vscode.svg" />
  </a>
</p>

## Getting Started
The instructions below are based on the installation of XAMPP, an open source PHP server. However, you can use any open source PHP server.
1. Install xampp.
2. Download folder, covidtracker, and place it within the folder, htdocs, found within your xampp folder.
3. Open the xampp control panel and  click 'Config' next to to the module, Apache.
4. Select the option, 'php.ini' & ensure that your settings are cinfugured as below.
extension=bz2
extension=curl
extension=fileinfo
extension=gd2
extension=gettext
;extension=gmp
;extension=intl
;extension=imap
;extension=interbase
;extension=ldap
extension=mbstring
extension=exif      ; Must be after mbstring as it depends on it
extension=mysqli
;extension=oci8_12c  ; Use with Oracle Database 12c Instant Client
;extension=odbc
;extension=openssl
;extension=pdo_firebird
extension=pdo_mysql
;extension=pdo_oci
;extension=pdo_odbc
;extension=pdo_pgsql
extension=pdo_sqlite
;extension=pgsql
;extension=shmop
5. Start the modules, Apache and MySQL.
6. Download the file covidtracker.sql and upload it to phpmyadmin.
7. Open your browser and type in localhost/covidtracker
8. Log in with an existing account or create a new one.
