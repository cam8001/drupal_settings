Drupal Settings
===============

Initial settings.php and settings.local.php for a local Drupal 8 installation
intended for deployment on Acquia Cloud.

Clone this repo into your sites/default or sites/`<sitename>`.

* settings.php is the standard Drupal 8 settings file, stripped of comments.
  * You can change the value of `$ac_docroot` to your Acquia Cloud docroot name
    to have the appropriate file included on Acquia Cloud.
* settings.local.php is for your local machine's install configuration
    * You can specify your MySQL credentials with environment variables
      (documented in settings.local.php), or you can specify them manually at
      the top of the file.
    * You'll need to provide a database name.

settings.local.php is added to `.gitignore` so that you don't check it into your
upstream repo.

You can check this out to your local machine like this:

# Drupal 8
`svn export https://github.com/cam8001/drupal_settings/trunk/ --force .`

# Drupal 7
`svn export https://github.com/cam8001/drupal_settings/branches/7.x/ --force . `
