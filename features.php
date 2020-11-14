<?php include("header.php"); ?>

<h1>Features</h1>

<ul>
  <li>Only need a single Drive. A single Drive will support Data and OS</li>
  <li>Simple to use web interface for configuration</li>
  <li>Disk Management</li>
  <li>Disk Health monitoring using SMART</li>
  <li>Network Shares using SAMBA</li>
  <li>Group Access Control</li>
  <li>Remote Access with a VPN Server Using Wireguard</li>
  <li>Private Torrent Downloads using Transmission with VPN Support</li>
  <li>Media organization and sharing using Jellyfin</li>
  <li>Home Automation using Home Assistant</li>
  <li>Manage your unifi Network using Unifi Controller</li>
  <li>Manage your unifi cameras using Unifi Video</li>
  <li>File Sharing / Groupware using Nextcloud
    <ul>
      <li>Samba User Authentication</li>
      <li>Automatic SMB Mounts in Nextcloud folder</li>
      <li>Automount Users home Directory in nextcloud</li>
      <li>Automatic Initial Installation with MariaDB by default</li>
    </ul>
  </li>
  <li>Bitwarden Integrated</li>
  <li>NGINX proxy for External Webapps with LetsEncrypt Certificates such as jellyfin and Nextcloud</li>
  <li>Acrive Directory Support (Still WIP)
    <ul>
      <li>Password Policies</li>
      <li>Central Authentication</li>
      <li>Ability for Windows PCs to join domain</li>
      <li>Home Drive Automapping H: Users Home</li>
    </ul>
  </li>
</ul>

<h2>Planned Features</h2>
<ul>
  <li>LUKS Encrypted Volumes</li>
  <li>RAID Configuration</li>
  <li>Backups using RSYNC</li>
  <li>Email Notification / Alert</li>
    <ul>
      <li>SMART Check Fails</li>
      <li>Volume Running out of space</li>
      <li>High Load AVG</li>
      <li>Failed Backup Tasks</li>
      <li>OS Update Report</li>
    </ul>
  </li>
  <li>Installation ISO and images</li>
  <li>Network VLAN and Bonding support</li>
  <li>Quota Support for invidual users, groups and shares</li>
  <li>Samba Audit Log enable/disable with nice searchable/exportable UI</li> 
  <li>Dynamic DNS Client Support</li>
  <li>Wireguard Server with automatic individual user config thats in the VPN group</li>

  <li>Initial content creation and folder structures and groups based off use case Templates</li>
  <ul>
    <li>Small to Mid Size company Setup</li>
      <ul>
        <li>Create Groups with Shares  (HR, Finance(Budgets/2015,Invoices(2017/01 - January), Marketing, Sales, Vendors, Executive, IT, Research, Clients, Products, Install, Scans, General) Draft Final and Archive Subfolders</li>
        <li>Install Apps Bookstack (Company Intranet/ Documentation, Nextcloud, Wireguard Server)</li>
      </ul>
    <li>Doctors Office Company Setup</li>
      <ul>
        <li>Create Groups with Shares  (HR, Finance(Budgets/2015,Invoices(2017/01 - January), Marketing, Sales, Vendors, Executive, IT, Research, Clients, Products, Install, Scans, General) Draft Final and Archive Subfolders</li>
        <li>Install Apps Bookstack (Company Intranet/ Documentation, Nextcloud, Wireguard Server)</li>
      </ul>
    <li>Basic Home Setup for Families</li>
      <ul>
        <li>Create Groups with Shares  (HR, Finance(Budgets/2015,Invoices(2017/01 - January), Marketing, Sales, Vendors, Executive, IT, Research, Clients, Products, Install, Scans, General) Draft Final and Archive Subfolders</li>
        <li>Install Apps Bookstack (Company Intranet/ Documentation, Nextcloud, Wireguard Server)</li>
      </ul>
  </ul>
</ul>   

<?php include("footer.php"); ?>