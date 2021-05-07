# wp_sp_gsps
GSP

PRODUCTION
---------------

* Access public folder
* `wget http://wordpress.org/latest.tar.gz`
* `$tar xfz latest.tar.gz`
* `mv wordpress/* ./`
* `rmdir ./wordpress/`
* `rm -f latest.tar.gz`
* Instal wordpress
* `git clone https://github.com/ayarsava/sp_wp_gsps`


General Setup
---------------

* Activate plugin `gsps` included on project repository
* Instal and activate plugins `Meta Box`, `Simple Custom Post Order` included in WP public library
* Activate theme `GSPs` included on project repository


Content
---------------

### Simple mode (importer)

You will be able to carry out an import of the initial profile of the project, which will create the categories, articles, menu items, etc. This is an easy way to initialize the project, although it will require removing those test run items that are generated automatically.
The file gsps.WordPress.2021-03-15.xml is attached with the content updated as of March 15, 2021.

### Manual mode

* Set permanent link in Name mode input from `/ wp-admin / options-permalink.php`
* Create content from different sections, associate categories, labels and other fields.

Content editing
---------------

* Wordpress offers the Gutemberg content editor, which provides all the necessary tools to present interactive content.
* You can find additional information for creating content in blocks at:
- https://wordpress.com/support/wordpress-editor/blocks/group-block/ 

