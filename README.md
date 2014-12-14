Drupal Settings
===============

Initial settings.php and settings.local.php for a local Drupal 7 installation intended for deployment on Acquia Cloud.

Clone this repo into your sites/default or sites/`<sitename>`. 

* settings.php is the standard Drupal 7 settings file, stripped of comments.
  * fast_404 is enabled.
  * You can change the value of `$ac_docroot` to your Acquia Cloud docroot name to have the appropriate file included on
    Acquia Cloud.
* settings.local.php is for your local machine's install configuration
    * You can specify your MySQL credentials with environment variables (documented in settings.local.php), or you can specify
      them manually at the top of the file.
    * You'll need to provide a database name.
