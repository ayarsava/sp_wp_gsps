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


Database
---------------

You could import database to be sent privately and after doing it, you could use WP-CLI to update the URL in the database:
`wp search-replace "http://gsp.ayarsava.com.ar/" "your-new-url or local-domain"`


Build CSS and JS
---------------

If you want to edit css styles or javascript files, you should run `npm run watch` or `npm run dev` for development stage or `npm run prod` for production. This latest will compress css js files. It should be run in `/wp-content/themes/gsps/`. Origin editable files are in `/wp-content/themes/gsps/resources` and and processed files are `/wp-content/themes/gsps/css/theme.css` and `/wp-content/themes/gsps/js/custom.js`.


Content
---------------

### Simple mode (importer)

You will be able to carry out an import of the initial profile of the project, which will create the categories, articles, menu items, etc. This is an easy way to initialize the project, although it will require removing those test run items that are generated automatically.
The file gsp.WordPress.2021-05-07.xml is attached with the content updated as of May 7, 2021.

### Manual mode

* Set permanent link in Name mode input from `/ wp-admin / options-permalink.php`
* Create content from different sections, associate categories, labels and other fields.

Content editing
---------------

* Wordpress offers the Gutemberg content editor, which provides all the necessary tools to present interactive content.
* You can find additional information for creating content in blocks at:
- https://wordpress.com/support/wordpress-editor/blocks/group-block/ 

